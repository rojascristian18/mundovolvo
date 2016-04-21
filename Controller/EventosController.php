<?php
App::uses('AppController', 'Controller');
class EventosController extends AppController
{
	public function admin_index()
	{
		$this->paginate		= array(
			'recursive'			=> 0
		);
		$eventos	= $this->paginate();
		$this->set(compact('eventos'));
	}

	public function admin_add()
	{
		if ( $this->request->is('post') )
		{
			$this->Evento->create();
			if ( $this->Evento->save($this->request->data) )
			{
				$this->Session->setFlash('Registro agregado correctamente.', null, array(), 'success');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('Error al guardar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
			}
		}
		$tipoEventos	= $this->Evento->TipoEvento->find('list');
		$campannas	= $this->Evento->Campanna->find('list');
		$marcas	= $this->Evento->Marca->find('list');
		$modelos	= $this->Evento->Modelo->find('list');
		$this->set(compact('tipoEventos', 'campannas', 'marcas', 'modelos'));
	}

	public function admin_edit($id = null)
	{
		if ( ! $this->Evento->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->request->is('post') || $this->request->is('put') )
		{
			if ( $this->Evento->save($this->request->data) )
			{
				$this->Session->setFlash('Registro editado correctamente', null, array(), 'success');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('Error al guardar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
			}
		}
		else
		{
			$this->request->data	= $this->Evento->find('first', array(
				'conditions'	=> array('Evento.id' => $id)
			));
		}
		$tipoEventos	= $this->Evento->TipoEvento->find('list');
		$campannas	= $this->Evento->Campanna->find('list');
		$marcas	= $this->Evento->Marca->find('list');
		$modelos	= $this->Evento->Modelo->find('list');
		$this->set(compact('tipoEventos', 'campannas', 'marcas', 'modelos'));
	}

	public function admin_delete($id = null)
	{
		$this->Evento->id = $id;
		if ( ! $this->Evento->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ( $this->Evento->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_exportar()
	{
		$datos			= $this->Evento->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->Evento->_schema);
		$modelo			= $this->Evento->alias;

		$this->set(compact('datos', 'campos', 'modelo'));
	}


	/**

		Registrar Solicitud
	
	*/
	public function crear(){

		if ( $this->request->is('post') ){
			$this->request->data['Evento']['campanna_id'] = 1;
			$this->request->data['Evento']['local'] = 1;
			$this->request->data['Evento']['google_conversion_code'] = '{"id":"971774512","language":"en","format":"3","color":"ffffff","label":"TogFCJD1zVcQsLSwzwM","remarketing_only":"false"}';
			
			switch ($this->request->data['Evento']['sucursal_id']) {
				case '1':
					$ciudad = "Santiago";
					break;
				case '2':
					$ciudad = "Antofagasta";
					break;
				case '3':
					$ciudad = "La serena";
					break;
				case '4':
					$ciudad = "Viña del Mar";
					break;
				case '5':
					$ciudad = "Concepción";
					break;
				case '6':
					$ciudad = "Osorno";
					break;
				default:
					$ciudad = "";
					break;
			}

			$this->request->data['Evento']['ciudad_usuario'] = $ciudad;
			$this->request->data['Evento']['vendedor'] = "servicioclientesvolvo@in-touch.cl";

			if($this->request->data['Evento']['financiamiento'] == 0){
				$eventoid = 3;//Cotización
			}else{
				$eventoid = 2;//Finaciamiento
			}
			$tipoEvento = $this->Evento->TipoEvento->find('first', array('conditions' => array('id' => $eventoid)));
			//$tipoEvento = $this->requestAction(array('controller' => 'TipoEventos', 'action' => 'getType', $eventoid));
			$this->request->data['Evento']['tipo_evento_id'] = $tipoEvento['TipoEvento']['id'];
			
			if ( $this->Evento->save($this->request->data) )
			{
				$this->sendEmail($this->request->data);
				$this->Session->setFlash('ok', 'enviado');
				$this->redirect(array('controller' => 'inicio','action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('Error al guardar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
			}
		}

	}



	/**

		Enviar Email
	
	*/
	public function sendEmail($data){
		if($data['Evento']['financiamiento'] == 0){
			$eventoid = 3;//Cotización
		}else{
			$eventoid = 2;//Finaciamiento
		}

		if(empty($data['Evento']['modelo_id'])) { 
			$modelo = "";
		}else{
			$modelo = $this->requestAction(array('controller' => 'modelos', 'action' => 'getModel', $data['Evento']['modelo_id']));
			$modelo = $modelo['Modelo']['nombre'];
		}

		$tipoEvento = $this->Evento->TipoEvento->find('first', array('conditions' => array('id' => $eventoid)));
		

		switch ($data['Evento']['sucursal_id']) {
			case '1':
				$ciudad = "Santiago";
				break;
			case '2':
				$ciudad = "Antofagasta";
				break;
			case '3':
				$ciudad = "La serena";
				break;
			case '4':
				$ciudad = "Viña del Mar";
				break;
			case '5':
				$ciudad = "Concepción";
				break;
			case '6':
				$ciudad = "Osorno";
				break;
			default:
				$ciudad = "";
				break;
		}

		$nombre = $data['Evento']['nombre_usuario'];
		$correo = $data['Evento']['email_usuario'];
		$fono = $data['Evento']['telefono_usuario'];
		if(isset($data['Evento']['cuotas'])){ $cuotas = $data['Evento']['cuotas']; }else{ $cuotas = ""; }
		if(isset($data['Evento']['pie'])){ $pie = $data['Evento']['pie']; }else{ $pie = "";}
		$mensaje = $data['Evento']['mensaje_usuario'];

		$this->sendEmails( $tipoEvento , $ciudad , $nombre , $correo , $fono , $modelo ,$cuotas , $pie , $mensaje );
	}

}
