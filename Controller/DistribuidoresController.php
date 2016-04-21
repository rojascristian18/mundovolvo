<?php
App::uses('AppController', 'Controller');
class DistribuidoresController extends AppController
{
	public function admin_index()
	{
		$this->paginate		= array(
			'recursive'			=> 0
		);
		$distribuidores	= $this->paginate();
		$this->set(compact('distribuidores'));
	}

	public function admin_add()
	{
		if ( $this->request->is('post') )
		{
			$this->Distribuidor->create();
			if ( $this->Distribuidor->save($this->request->data) )
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
		if ( ! $this->Distribuidor->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->request->is('post') || $this->request->is('put') )
		{
			if ( $this->Distribuidor->save($this->request->data) )
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
			$this->request->data	= $this->Distribuidor->find('first', array(
				'conditions'	=> array('Distribuidor.id' => $id)
			));
		}
	}

	public function admin_delete($id = null)
	{
		$this->Distribuidor->id = $id;
		if ( ! $this->Distribuidor->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ( $this->Distribuidor->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_exportar()
	{
		$datos			= $this->Distribuidor->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->Distribuidor->_schema);
		$modelo			= $this->Distribuidor->alias;

		$this->set(compact('datos', 'campos', 'modelo'));
	}

}
