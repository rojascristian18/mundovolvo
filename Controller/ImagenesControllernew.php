<?php
App::uses('AppController', 'Controller');
class ImagenesController extends AppController
{
	public function admin_index()
	{
		$this->paginate		= array(
			'recursive'			=> 0
		);
		$imagenes	= $this->paginate();
		$this->set(compact('imagenes'));
	}

	public function admin_add()
	{
		if ( $this->request->is('post') )
		{	
			$this->Imagen->create();
			if ( $this->Imagen->save($this->request->data) )
			{
				$this->Session->setFlash('Registro agregado correctamente.', null, array(), 'success');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('Error al guardar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
			}
		}
		$galerias	= $this->Imagen->Galeria->find('list');
		$this->set(compact('galerias'));
	}

	public function admin_edit($id = null)
	{
		if ( ! $this->Imagen->exists($id) )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		if ( $this->request->is('post') || $this->request->is('put') )
		{
			if ( $this->Imagen->save($this->request->data) )
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
			$this->request->data	= $this->Imagen->find('first', array(
				'conditions'	=> array('Imagen.id' => $id)
			));
		}

		$ImagenActual = $this->request->data['Imagen']['ruta']['mini'];
		$galerias	= $this->Imagen->Galeria->find('list');

		$this->set(compact('galerias','ImagenActual'));
	}

	public function admin_delete($id = null)
	{
		$this->Imagen->id = $id;
		if ( ! $this->Imagen->exists() )
		{
			$this->Session->setFlash('Registro inválido.', null, array(), 'danger');
			$this->redirect(array('action' => 'index'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ( $this->Imagen->delete() )
		{
			$this->Session->setFlash('Registro eliminado correctamente.', null, array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Error al eliminar el registro. Por favor intenta nuevamente.', null, array(), 'danger');
		$this->redirect(array('action' => 'index'));
	}

	public function admin_exportar()
	{
		$datos			= $this->Imagen->find('all', array(
			'recursive'				=> -1
		));
		$campos			= array_keys($this->Imagen->_schema);
		$modelo			= $this->Imagen->alias;

		$this->set(compact('datos', 'campos', 'modelo'));
	}


	public function admin_galleryBox($gallery){
		$imagenes = $this->Imagen->find('all', array('conditions' => array('galeria_id' => $gallery),'order' => 'orden ASC'));
		$this->layout = 'ajax';
		$this->set(compact('imagenes'));
	}


	public function admin_deleteImage(){

		$this->Imagen->id = $this->request->data['id'];
		if ( ! $this->Imagen->exists() )
		{
			echo 'error';
			exit;
		}

		$this->request->onlyAllow('post', 'delete');
		if ( $this->Imagen->delete() )
		{
			echo 'ok';
			exit;
		}
		echo 'error';
		exit;
	}


	public function admin_saveOrder(){
		$this->Imagen->id = $this->request->data['id'];
		
		if ( $this->request->is('post') || $this->request->is('put') )
		{	
			if ( $this->Imagen->saveField('orden', $this->request->data['orden']) )
			{
				echo $this->request->data['orden'];
				exit;
			}
			else
			{
				echo "error";
				exit;
			}
		}

	}


	public function admin_saveImage(){
		$file = $this->data;
		$ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
        $arr_ext = array('jpg', 'jpeg', 'gif'); //set allowed extensions
        if(in_array($ext, $arr_ext))
        {
            //do the actual uploading of the file. First arg is the tmp name, second arg is
            //where we are putting it
            if(move_uploaded_file($file['name'], WWW_ROOT . 'img/upload_folder' . DS . $file['name']))
            {
                //prepare the filename for database entry
                $this->request->data['Imagen']['ruta'] = $file['name'];
                
                if ($this->Imagen>save($this->request->data)) 
                {
                    echo "Guardado";
                    exit;
                }
                else
                {
                    echo "error";
                    exit;
                }
            }
        }
		/*
		if ( $this->request->is('post') )
		{	
			$this->Imagen->create();

			if ( $this->Imagen->save($this->request->data) )
			{
				echo "Guardado";
				exit;
			}
			else
			{
				echo "Error";
				exit;
			}
		}*/
	}

	public function admin_uploadImage(){
		//prx($this->RequestHandler);
		if ( $this->request->is('post') )
		{	
			$this->Imagen->create();
			if ( $this->Imagen->save($this->request->data) )
			{
				echo 'ok';
				exit;
				
			}
			else
			{
				echo 'error';
				exit;
				
			}
		}
	}

}
