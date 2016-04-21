<?php
App::uses('AppController', 'Controller');
class CampannasController extends AppController
{
	public function admin_index()
	{
		$this->paginate		= array(
			'recursive'			=> 0
		);
		$campannas	= $this->paginate();
		$this->set(compact('campannas'));
	}

	public function admin_add()
	{
		if ( $this->request->is('post') )
		{
			$this->Campanna->create();
			if ( $this->Campanna->save($this->request->data) )
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
		if ( ! $this->Campanna->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->request->is('post') || $this->request->is('put') )
		{
			if ( $this->Campanna->save($this->request->data) )
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
			$this->request->data	= $this->Campanna->find('first', array(
				'conditions'	=> array('Campanna.id' => $id)
			));
		}
	}

	public function admin_delete($id = null)
	{
		$this->Campanna->id = $id;
		if ( ! $this->Campanna->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ( $this->Campanna->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_exportar()
	{
		$datos			= $this->Campanna->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->Campanna->_schema);
		$modelo			= $this->Campanna->alias;

		$this->set(compact('datos', 'campos', 'modelo'));
	}
}
