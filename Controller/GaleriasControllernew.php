<?php
App::uses('AppController', 'Controller');
class GaleriasController extends AppController
{
	public function admin_index()
	{
		$this->paginate		= array(
			'recursive'			=> 0
		);
		$galerias	= $this->paginate();
		$this->set(compact('galerias'));
	}

	public function admin_add()
	{
		if ( $this->request->is('post') )
		{
			$this->Galeria->create();

			foreach ($this->request->data['ruta'] as $imagen) {
				$this->request->data['Imagen'][]['ruta'] = $imagen;
			}

			foreach ($this->request->data['Imagen'] as $key => $value) {
				if ($value['ruta']['error'] > 0) {
					unset($this->request->data['Imagen'][$key]);
				}
			}

			unset($this->request->data['ruta']);

			if ( $this->Galeria->saveAll($this->request->data) )
			{
				$this->Session->setFlash('Registro agregado correctamente.', null, array(), 'success');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('Error al guardar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
			}
		}
		$modelos	= $this->Galeria->Modelo->find('list');
		$this->set(compact('modelos'));
	}

	public function admin_edit($id = null)
	{
		if ( ! $this->Galeria->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->request->is('post') || $this->request->is('put') )
		{	
			unset($this->request->data['galeria_id']);

			foreach ($this->request->data['Galeria']['ruta'] as $imagen) {
				$this->request->data['Imagen'][]['ruta'] = $imagen;
			}

			foreach ($this->request->data['Imagen'] as $key => $value) {
				if ($value['ruta']['error'] > 0) {
					unset($this->request->data['Imagen'][$key]);
				}
			}

			unset($this->request->data['ruta']);
		
			if ( $this->Galeria->saveAll($this->request->data) )
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
			$this->request->data	= $this->Galeria->find('first', array(
				'conditions'	=> array('Galeria.id' => $id)
			));
		}
		//$imagenes = $this->Galeria->Imagen->find('all',array('conditions' => array('galeria_id' => $id)));
		$modelos	= $this->Galeria->Modelo->find('list');
		$galeria_id = $id;
		$this->set(compact('modelos','galeria_id'));
	}

	public function admin_delete($id = null)
	{
		$this->Galeria->id = $id;
		if ( ! $this->Galeria->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ( $this->Galeria->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_exportar()
	{
		$datos			= $this->Galeria->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->Galeria->_schema);
		$modelo			= $this->Galeria->alias;

		$this->set(compact('datos', 'campos', 'modelo'));
	}



	public function getGalleryById($id){
		return $this->Galeria->find('first', array(
			'conditions' => array('modelo_id' => $id),
			'contain' => array('Imagen')));
	}
}
