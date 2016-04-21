<?php
App::uses('AppController', 'Controller');
class CategoriaModelosController extends AppController
{
	public function admin_index()
	{
		$this->paginate		= array(
			'recursive'			=> 0
		);
		$categoriaModelos	= $this->paginate();
		$this->set(compact('categoriaModelos'));
	}

	public function admin_add()
	{
		if ( $this->request->is('post') )
		{
			$this->CategoriaModelo->create();
			if ( $this->CategoriaModelo->save($this->request->data) )
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
		if ( ! $this->CategoriaModelo->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->request->is('post') || $this->request->is('put') )
		{
			if ( $this->CategoriaModelo->save($this->request->data) )
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
			$this->request->data	= $this->CategoriaModelo->find('first', array(
				'conditions'	=> array('CategoriaModelo.id' => $id)
			));
		}
	}

	public function admin_delete($id = null)
	{
		$this->CategoriaModelo->id = $id;
		if ( ! $this->CategoriaModelo->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ( $this->CategoriaModelo->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_exportar()
	{
		$datos			= $this->CategoriaModelo->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->CategoriaModelo->_schema);
		$modelo			= $this->CategoriaModelo->alias;

		$this->set(compact('datos', 'campos', 'modelo'));
	}
}
