<?php
App::uses('AppController', 'Controller');
class CabecerasController extends AppController
{
	public function admin_index()
	{
		$this->paginate		= array(
			'recursive'			=> 0
		);
		$cabeceras	= $this->paginate();
		$this->set(compact('cabeceras'));
	}

	public function admin_add()
	{
		if ( $this->request->is('post') )
		{
			$this->Cabecera->create();
			if ( $this->Cabecera->save($this->request->data) )
			{
				$this->Session->setFlash('Registro agregado correctamente.', null, array(), 'success');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('Error al guardar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
			}
		}
		$modelos	= $this->Cabecera->Modelo->find('list');
		$this->set(compact('modelos'));
	}

	public function admin_edit($id = null)
	{
		if ( ! $this->Cabecera->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->request->is('post') || $this->request->is('put') )
		{
			if ( $this->Cabecera->save($this->request->data) )
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
			$this->request->data	= $this->Cabecera->find('first', array(
				'conditions'	=> array('Cabecera.id' => $id)
			));
		}
		$fondo = $this->request->data['Cabecera']['imagen_fondo']['mini'];
		$modelos	= $this->Cabecera->Modelo->find('list');
		$this->set(compact('modelos','fondo'));
	}

	public function admin_delete($id = null)
	{
		$this->Cabecera->id = $id;
		if ( ! $this->Cabecera->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ( $this->Cabecera->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_exportar()
	{
		$datos			= $this->Cabecera->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->Cabecera->_schema);
		$modelo			= $this->Cabecera->alias;

		$this->set(compact('datos', 'campos', 'modelo'));
	}

	/**

	Obtiene todos las cabeceras del inicio
	
	**/
	public function cabecerasInicio(){

		return $this->Cabecera->find('all', array(
			'conditions' => array('inicio' => 1),
			'contain' => array('Modelo')));

	}

	/**

	Obtiene todos las cabeceras del modelo
	
	**/
	public function cabecerasView($modelo_id){

		return $this->Cabecera->find('all', array(
			'conditions' => array('modelo_id' => $modelo_id ),
			'contain' => array('Modelo')));

	}
}
