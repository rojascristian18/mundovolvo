<?php
Router::connect('/admin', array('controller' => 'administradores', 'action' => 'index', 'admin' => true));
Router::connect('/admin/login', array('controller' => 'administradores', 'action' => 'login', 'admin' => true));
Router::connect('/', array('controller' => 'inicio', 'action' => 'index'));
//Show only the slug in the URL.
Router::connect('/:slug', array('controller' => 'modelos', 'action' => 'view'), array('pass' => array('slug')));
Router::connect('/seccion/*', array('controller' => 'pages', 'action' => 'display'));

CakePlugin::routes();
require CAKE . 'Config' . DS . 'routes.php';
