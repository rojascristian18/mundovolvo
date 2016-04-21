<?php
App::uses('AppController', 'Controller');
class InicioController extends AppController
{

	/************************
		Public
	*/
	public function index(){
		$ishome = "inicio";
		$cabeceras = $this->requestAction(array('controller' => 'cabeceras', 'action' => 'cabecerasInicio'));
		$this->set(compact('cabeceras','ishome'));
	}
}
