<?php
App::uses('AppController', 'Controller');
class CategoriaSucursalesController extends AppController
{
	public function admin_index()
	{
		$this->paginate		= array(
			'recursive'			=> 0
		);
		$categoriaSucursales	= $this->paginate();
		$this->set(compact('categoriaSucursales'));
	}

	public function admin_add()
	{
		if ( $this->request->is('post') )
		{
			$this->CategoriaSucursal->create();
			if ( $this->CategoriaSucursal->save($this->request->data) )
			{
				$this->Session->setFlash('Registro agregado correctamente.', null, array(), 'success');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('Error al guardar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
			}
		}
	}

	public function admin_edit($id = null)
	{
		if ( ! $this->CategoriaSucursal->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->request->is('post') || $this->request->is('put') )
		{
			if ( $this->CategoriaSucursal->save($this->request->data) )
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
			$this->request->data	= $this->CategoriaSucursal->find('first', array(
				'conditions'	=> array('CategoriaSucursal.id' => $id)
			));
		}
	}

	public function admin_delete($id = null)
	{
		$this->CategoriaSucursal->id = $id;
		if ( ! $this->CategoriaSucursal->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ( $this->CategoriaSucursal->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_exportar()
	{
		$datos			= $this->CategoriaSucursal->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->CategoriaSucursal->_schema);
		$modelo			= $this->CategoriaSucursal->alias;

		$this->set(compact('datos', 'campos', 'modelo'));
	}
}
