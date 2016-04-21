<?php
App::uses('AppController', 'Controller');
class ModelosController extends AppController
{
	public function admin_index()
	{
		$this->paginate		= array(
			'recursive'			=> 0
		);
		$modelos	= $this->paginate();
		$this->set(compact('modelos'));
	}

	public function admin_add()
	{
		if ( $this->request->is('post') )
		{
			$this->Modelo->create();
			if ( $this->Modelo->save($this->request->data) )
			{
				$this->Session->setFlash('Registro agregado correctamente.', null, array(), 'success');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('Error al guardar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
			}
		}
		$galerias = $this->Modelo->Galeria->find('list');
		$categoriaModelos	= $this->Modelo->CategoriaModelo->find('list');
		$marcas	= $this->Modelo->Marca->find('list');
		$this->set(compact('categoriaModelos', 'marcas','galerias'));
	}

	public function admin_edit($id = null)
	{
		if ( ! $this->Modelo->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->request->is('post') || $this->request->is('put') )
		{
			if ( $this->Modelo->saveAll($this->request->data) )
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
			$this->request->data	= $this->Modelo->find('first', array(
				'conditions'	=> array('Modelo.id' => $id)
			));
		}
		$modelo = $this->Modelo->find('first', array(
				'conditions'	=> array('Modelo.id' => $id)
			));
		$galerias = $this->Modelo->Galeria->find('list');
		$categoriaModelos	= $this->Modelo->CategoriaModelo->find('list');
		$marcas	= $this->Modelo->Marca->find('list');
		$this->set(compact('categoriaModelos', 'marcas','modelo','galerias'));
	}

	public function admin_delete($id = null)
	{
		$this->Modelo->id = $id;
		if ( ! $this->Modelo->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ( $this->Modelo->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_exportar()
	{
		$datos			= $this->Modelo->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->Modelo->_schema);
		$modelo			= $this->Modelo->alias;

		$this->set(compact('datos', 'campos', 'modelo'));
	}

	
	/**

	Obtiene todos los modelos
	
	**/
	public function admin_getAllModel(){

	}


	/**

	Obtiene todos los modelos
	
	**/
	public function getAllModel(){
		//prx($this->Modelo->find('all',array('contain' => array('ImagenModelo'))));
		return $this->Modelo->find('all',array('contain' => array('ImagenModelo')));

	}



	/**

	Obtiene un modelo
	
	**/
	public function getModel($id){
		//prx($this->Modelo->find('all',array('contain' => array('ImagenModelo'))));
		return $this->Modelo->find('first',array('conditions' => array('id' => $id),'fields' => array('nombre')));

	}



	/**

	Vista
	
	**/
	public function view($shortcode = null){
		$modelo = $this->Modelo->find('first',array('conditions' => array('nombre_corto' => $shortcode)));
		if (!empty($modelo)) {
			$cabeceras = $this->requestAction(array('controller' => 'cabeceras', 'action' => 'cabecerasView', $modelo['Modelo']['id']));
			$galeria = $this->requestAction(array('controller' => 'galerias', 'action' => 'getGalleryById', $modelo['Modelo']['id']));
				
			$this->set(compact('modelo','cabeceras','galeria'));
		}else{
			$this->redirect(array('controller' => 'inicio' , 'action' => 'index'));
		}
	}
}
