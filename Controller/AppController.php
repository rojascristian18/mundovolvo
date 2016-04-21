<?php
App::uses('Controller', 'Controller');
//App::uses('FB', 'Facebook.Lib');
class AppController extends Controller
{
	public $helpers		= array(
		'Session', 'Html', 'Form', 'PhpExcel', 'Js'
		//, 'Facebook.Facebook'
	);
	public $components	= array(
		'Session',
		'Auth'		=> array(
			'loginAction'		=> array('controller' => 'administradores', 'action' => 'login', 'admin' => true),
			'loginRedirect'		=> '/admin',
			'logoutRedirect'	=> '/admin',
			'authError'			=> 'No tienes permisos para entrar a esta sección.',
			'authenticate'		=> array(
				'Form'				=> array(
					'userModel'			=> 'Usuario',
					'fields'			=> array(
						'username'			=> 'email',
						'password'			=> 'clave'
					)
				)
			)
		),
		'DebugKit.Toolbar',
		'RequestHandler',
		//'Facebook.Connect'	=> array('model' => 'Usuario'),
		//'Facebook'
	);

	public function beforeFilter()
	{
		
		/**
		 * Layout administracion y permisos publicos
		 */
		if ( ! empty($this->request->params['admin']) )
		{
			$this->layoutPath				= 'backend';
			AuthComponent::$sessionKey		= 'Auth.Administrador';
			$this->Auth->authenticate['Form']['userModel']		= 'Administrador';
		}
		else
		{
			AuthComponent::$sessionKey	= 'Auth.Usuario';
			$this->Auth->allow();
		}

		/**
		 * Logout FB
		 */
		/*
		if ( ! isset($this->request->params['admin']) && ! $this->Connect->user() && $this->Auth->user() )
			$this->Auth->logout();
		*/

		/**
		 * Detector cliente local
		 */
		$this->request->addDetector('localip', array(
			'env'			=> 'REMOTE_ADDR',
			'options'		=> array('::1', '127.0.0.1'))
		);

		/**
		 * Detector entrada via iframe FB
		 */
		$this->request->addDetector('iframefb', array(
			'env'			=> 'HTTP_REFERER',
			'pattern'		=> '/facebook\.com/i'
		));

		/**
		 * Cookies IE
		 */
		header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"');

		/***
		*	Ejecutar y renderizar la función getAllModel().
		***/
		if ( empty($this->request->params['admin']) ){
			$modelos = $this->getAllModel();
			$dealers = $this->getAllDealers();
			$this->set(compact('modelos','dealers'));
		}

		if($this->request->params['controller'] == 'modelos'){
			$custom_class = "custom_class";
			$this->set(compact('custom_class'));
		}
		

	}

	/**
	 * Guarda el usuario Facebook
	 */
	public function beforeFacebookSave()
	{
		if ( ! isset($this->request->params['admin']) )
		{
			$this->Connect->authUser['Usuario']		= array_merge(array(
				'nombre_completo'	=> $this->Connect->user('name'),
				'nombre'			=> $this->Connect->user('first_name'),
				'apellido'			=> $this->Connect->user('last_name'),
				'usuario'			=> $this->Connect->user('username'),
				'clave'				=> $this->Connect->authUser['Usuario']['password'],
				'email'				=> $this->Connect->user('email'),
				'sexo'				=> $this->Connect->user('gender'),
				'verificado' 		=> $this->Connect->user('verified'),
				'edad'				=> $this->Session->read('edad')
			), $this->Connect->authUser['Usuario']);
		}

		return true;
	}


	/**

		Enviar email a propietario.

	*/
	public function sendEmails( $tipoEvento , $ciudad , $nombre , $correo , $fono , $modelo , $cuotas , $pie , $mensaje ){
		
		App::uses('CakeEmail', 'Network/Email');
		
		/**
		* Se envia el email
		*/
		$nombre_evento 	= $tipoEvento['TipoEvento']['nombre'];
		$cod_evento 	= $tipoEvento['TipoEvento']['codigo'];

		$this->Email = new CakeEmail();
		$this->Email->viewVars(compact('nombre_evento','nombre','ciudad','correo','modelo','fono','cuotas','pie','mensaje'));
		$this->Email->emailFormat('html');
		$this->Email->from(array('apps@brandon.cl' => 'Volvo Autos'));
		
		switch ($ciudad){

			case "Antofagasta":
				
				$this->Email->to( "csoto@autosummit.cl","Claudio Soto" );
				$this->Email->cc( "rgomez@autosummit.cl","Rodrigo Gómez");
				$this->Email->cc("ehidalgo@autosummit.cl","Eduardo Hidalgo");
				//$this->Email->to( "cristian.rojas@brandon.cl","Claudio Soto" );
				//$this->Email->cc( "cristian.rojas@brandon.cl","Claudio Soto" );
			break;
			case "La serena":

				$this->Email->to("eschaffhauser@callegari.cl");
				//$this->Email->to( "cristian.rojas@brandon.cl","La serena" );
			break;
			case "Viña del Mar":

				$this->Email->to("c.vega@rosselot.cl");
				//$this->Email->to( "cristian.rojas@brandon.cl","Viña" );
			break;
			case "Concepción":

				$this->Email->to("gmoraga@salazarisrael.cl");
				//$this->Email->to( "cristian.rojas@brandon.cl","Conce" );
			break;
			case "Osorno":

				$this->Email->to("crios@autobar.cl");
				//$this->Email->to( "cristian.rojas@brandon.cl","Osorno" );
			break;
		}
		$this->Email->to('contacto@clientevolvo.cl');
		$this->Email->bcc('leads@in-click.cl');
		$this->Email->template('cotizacion');
		$this->Email->subject( '[VOLV-AUTO-LP '. $cod_evento . '] Nueva Cotización');
		$this->Email->send();
		$this->sendFeedBack($nombre,$correo);
	}



	/**

		Enviar email de respuesta.

	*/
	public function sendFeedBack( $nombre , $correo ){
		
		App::uses('CakeEmail', 'Network/Email');
		
		/**
		* Se envia el email
		*/
		$this->Email = new CakeEmail();
		$this->Email->viewVars(compact('nombre'));
		$this->Email->emailFormat('html');
		$this->Email->from(array('apps@brandon.cl' => 'Volvo Autos'));
		$this->Email->to($correo);
		$this->Email->template('feedback');
		$this->Email->subject( 'Cotización recibida');
		$this->Email->send();
		
	}


	/**

		Retorna todos los modelos.

	*/
	public function getAllModel(){
		
		return $this->requestAction(array('controller' => 'modelos', 'action' => 'getAllModel'));

	}


	/**

		Retorna todos los distribuidores.

	*/
	public function getAllDealers(){
		
		$this->Distribuidor = $this->instanceModel( 'Distribuidor' );
		
		$info = $this->Distribuidor->getAllDealers();
		return $info;

	}

	/**

		Instanciar un modelo.
		
	*/
	private function instanceModel( $model ){
		return ClassRegistry::init( $model );
	}


	/**

		Facebook Conversion
		
	*/
	private function facebookConversion(){
		return "<!-- Facebook Conversion Code for Registros - Volvo Cars Chile -->
				<script>(function() {
				var _fbq = window._fbq || (window._fbq = []);
				if (!_fbq.loaded) {
				var fbds = document.createElement('script');
				fbds.async = true;
				fbds.src = '//connect.facebook.net/en_US/fbds.js';
				var s = document.getElementsByTagName('script')[0];
				s.parentNode.insertBefore(fbds, s);
				_fbq.loaded = true;
				}
				})();
				window._fbq = window._fbq || [];
				window._fbq.push(['track', '6028717374071', {'value':'0.00','currency':'CLP'}]);
				</script>
				<noscript><img height='1' width='1' alt='' style='display:none' src='https://www.facebook.com/tr?ev=6028717374071&amp;cd[value]=0.00&amp;cd[currency]=CLP&amp;noscript=1' /></noscript>
				";
	}



}
