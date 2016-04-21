<?php
App::uses('AppController', 'Controller');
class TipoeventosController extends AppController
{
	public function admin_index()
	{
		$this->paginate		= array(
			'recursive'			=> 0
		);
		$tipoEventos	= $this->paginate();
		$this->set(compact('tipoEventos'));
	}

	public function admin_add()
	{
		if ( $this->request->is('post') )
		{
			$this->TipoEvento->create();
			if ( $this->TipoEvento->save($this->request->data) )
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
		if ( ! $this->TipoEvento->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->request->is('post') || $this->request->is('put') )
		{
			if ( $this->TipoEvento->save($this->request->data) )
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
			$this->request->data	= $this->TipoEvento->find('first', array(
				'conditions'	=> array('TipoEvento.id' => $id)
			));
		}
	}

	public function admin_delete($id = null)
	{
		$this->TipoEvento->id = $id;
		if ( ! $this->TipoEvento->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ( $this->TipoEvento->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_exportar()
	{
		$datos			= $this->TipoEvento->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->TipoEvento->_schema);
		$modelo			= $this->TipoEvento->alias;

		$this->set(compact('datos', 'campos', 'modelo'));
	}


	public function getType($id){
		return $this->TipoEvento->find('first', array('conditions' => array('id' => $id)));
	}


}
