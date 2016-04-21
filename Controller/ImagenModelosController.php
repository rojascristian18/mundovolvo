<?php
App::uses('AppController', 'Controller');
class ImagenModelosController extends AppController
{
	public function admin_index()
	{
		$this->paginate		= array(
			'recursive'			=> 0
		);
		$imagenModelos	= $this->paginate();
		$this->set(compact('imagenModelos'));
	}

	public function admin_add()
	{
		if ( $this->request->is('post') )
		{
			$this->ImagenModelo->create();
			if ( $this->ImagenModelo->save($this->request->data) )
			{
				$this->Session->setFlash('Registro agregado correctamente.', null, array(), 'success');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('Error al guardar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
			}
		}
		$modelos	= $this->ImagenModelo->Modelo->find('list');
		$this->set(compact('modelos'));
	}

	public function admin_edit($id = null)
	{
		if ( ! $this->ImagenModelo->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->request->is('post') || $this->request->is('put') )
		{
			if ( $this->ImagenModelo->save($this->request->data) )
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
			$this->request->data	= $this->ImagenModelo->find('first', array(
				'conditions'	=> array('ImagenModelo.id' => $id)
			));
		}
		$ImagenActual = $this->request->data['ImagenModelo']['ruta']['mini'];
		$modelos	= $this->ImagenModelo->Modelo->find('list');
		$this->set(compact('modelos','ImagenActual'));
	}

	public function admin_delete($id = null)
	{
		$this->ImagenModelo->id = $id;
		if ( ! $this->ImagenModelo->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ( $this->ImagenModelo->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_exportar()
	{
		$datos			= $this->ImagenModelo->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->ImagenModelo->_schema);
		$modelo			= $this->ImagenModelo->alias;

		$this->set(compact('datos', 'campos', 'modelo'));
	}
}
