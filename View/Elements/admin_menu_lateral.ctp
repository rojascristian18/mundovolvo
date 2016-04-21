<div class="page-sidebar">
	<ul class="x-navigation x-navigation-custom">
		<li class="xn-logo">
			<?= $this->Html->link(
				'<span class="fa fa-dashboard"></span> <span class="x-navigation-control">Backend</span>',
				'/admin',
				array('escape' => false)
			); ?>
			<a href="#" class="x-navigation-control"></a>
		</li>
		<li class="xn-title"></li>
		<li class="<?= ($this->Html->menuActivo(array('controller' => 'compras', 'action' => 'dashboard')) ? 'active' : ''); ?>">
			<?= $this->Html->link(
				'<span class="fa fa-dashboard"></span> <span class="xn-text">Dashboard</span>',
				'/admin',
				array('escape' => false)
			); ?>
		</li>
		<li class="xn-title">Administración</li>
		<li class="<?= ($this->Html->menuActivo(array('controller' => 'administradores', 'action' => 'index')) ? 'active' : ''); ?>">
			<?= $this->Html->link(
				'<span class="fa fa-list-ol"></span> <span class="xn-text">Administradores</span>',
				array('controller' => 'administradores', 'action' => 'index'),
				array('escape' => false)
			); ?>
		</li>
		<li class="xn-title">Productos</li>
		<li class="<?= ($this->Html->menuActivo(array('controller' => 'marcas', 'action' => 'index')) ? 'active' : ''); ?>">
			<?= $this->Html->link(
				'<span class="fa fa-shopping-bag"></span> <span class="xn-text">Marcas</span>',
				array('controller' => 'marcas', 'action' => 'index'),
				array('escape' => false)
			); ?>
		</li>
		<li class="<?= ($this->Html->menuActivo(array('controller' => 'modelos', 'action' => 'index')) ? 'active' : ''); ?>">
			<?= $this->Html->link(
				'<span class="fa fa-car"></span> <span class="xn-text">Modelos</span>',
				array('controller' => 'modelos', 'action' => 'index'),
				array('escape' => false)
			); ?>
		</li>
		<li class="<?= ($this->Html->menuActivo(array('controller' => 'imagenmodelos', 'action' => 'index')) ? 'active' : ''); ?>">
			<?= $this->Html->link(
				'<span class="fa fa-camera"></span> <span class="xn-text">Thumbnails</span>',
				array('controller' => 'imagenmodelos', 'action' => 'index'),
				array('escape' => false)
			); ?>
		</li>
		<li class="<?= ($this->Html->menuActivo(array('controller' => 'categoriamodelos', 'action' => 'index')) ? 'active' : ''); ?>">
			<?= $this->Html->link(
				'<span class="fa fa-list-ol"></span> <span class="xn-text">Categorías</span>',
				array('controller' => 'categoriamodelos', 'action' => 'index'),
				array('escape' => false)
			); ?>
		</li>
		<li class="<?= ($this->Html->menuActivo(array('controller' => 'cabeceras', 'action' => 'index')) ? 'active' : ''); ?>">
			<?= $this->Html->link(
				'<span class="fa fa-picture-o"></span> <span class="xn-text">Banner</span>',
				array('controller' => 'cabeceras', 'action' => 'index'),
				array('escape' => false)
			); ?>
		</li>
		<li class="xn-title">Imágenes</li>
		<li class="<?= ($this->Html->menuActivo(array('controller' => 'imagenes', 'action' => 'index')) ? 'active' : ''); ?>">
			<?= $this->Html->link(
				'<span class="fa fa-camera"></span> <span class="xn-text">Imágenes</span>',
				array('controller' => 'imagenes', 'action' => 'index'),
				array('escape' => false)
			); ?>
		<li class="<?= ($this->Html->menuActivo(array('controller' => 'galerias', 'action' => 'index')) ? 'active' : ''); ?>">
			<?= $this->Html->link(
				'<span class="fa fa-camera"></span> <span class="xn-text">Galerías</span>',
				array('controller' => 'galerias', 'action' => 'index'),
				array('escape' => false)
			); ?>
		</li>
		<li class="xn-title">Distribuidores</li>
		<li class="<?= ($this->Html->menuActivo(array('controller' => 'distribuidores', 'action' => 'index')) ? 'active' : ''); ?>">
			<?= $this->Html->link(
				'<span class="fa fa-truck"></span> <span class="xn-text">Distribuidores</span>',
				array('controller' => 'distribuidores', 'action' => 'index'),
				array('escape' => false)
			); ?>
		</li>
		<li class="<?= ($this->Html->menuActivo(array('controller' => 'sucursales', 'action' => 'index')) ? 'active' : ''); ?>">
			<?= $this->Html->link(
				'<span class="fa fa-location-arrow"></span> <span class="xn-text">Sucursales</span>',
				array('controller' => 'sucursales', 'action' => 'index'),
				array('escape' => false)
			); ?>
		</li>
		<li class="<?= ($this->Html->menuActivo(array('controller' => 'categoriasucursales', 'action' => 'index')) ? 'active' : ''); ?>">
			<?= $this->Html->link(
				'<span class="fa fa-list-ol"></span> <span class="xn-text">Categorías</span>',
				array('controller' => 'categoriasucursales', 'action' => 'index'),
				array('escape' => false)
			); ?>
		</li>
		<li class="xn-title">Cotizaciones</li>
		<li class="<?= ($this->Html->menuActivo(array('controller' => 'eventos', 'action' => 'index')) ? 'active' : ''); ?>">
			<?= $this->Html->link(
				'<span class="fa fa-archive"></span> <span class="xn-text">Cotizaciones</span>',
				array('controller' => 'eventos', 'action' => 'index'),
				array('escape' => false)
			); ?>
		</li>
		<li class="<?= ($this->Html->menuActivo(array('controller' => 'tipoeventos', 'action' => 'index')) ? 'active' : ''); ?>">
			<?= $this->Html->link(
				'<span class="fa fa-file-archive-o"></span> <span class="xn-text">Tipo de cotización</span>',
				array('controller' => 'tipoeventos', 'action' => 'index'),
				array('escape' => false)
			); ?>
		</li>
		<li class="xn-title">Campañas</li>
		<li class="<?= ($this->Html->menuActivo(array('controller' => 'campannas', 'action' => 'index')) ? 'active' : ''); ?>">
			<?= $this->Html->link(
				'<span class="fa fa-bell"></span> <span class="xn-text">Campañas</span>',
				array('controller' => 'campannas', 'action' => 'index'),
				array('escape' => false)
			); ?>
		</li>
		
		<li class="xn-title">Sección Expandible</li>
		<li class="xn-openable <?= (
			(
				$this->Html->menuActivo(array('controller' => 'controlador1')) ||
				$this->Html->menuActivo(array('controller' => 'controlador2'))
			)
			? 'active' : ''
		); ?>">
			<a href="#"><span class="fa fa-cog"></span> <span class="xn-text">Expandible 1</span></a>
			<ul>
				<li class="<?= ($this->Html->menuActivo(array('controller' => 'controlador1')) ? 'active' : ''); ?>">
					<?= $this->Html->link(
						'<span class="fa fa-user"></span> <span class="xn-text">Controlador 1</span>',
						array('controller' => 'controlador1', 'action' => 'index'),
						array('escape' => false)
					); ?>
				</li>
				<li class="<?= ($this->Html->menuActivo(array('controller' => 'controlador2')) ? 'active' : ''); ?>">
					<?= $this->Html->link(
						'<span class="fa fa-database"></span> <span class="xn-text">Controlador 2</span>',
						array('controller' => 'controlador2', 'action' => 'index'),
						array('escape' => false)
					); ?>
				</li>
			</ul>
		</li>

		<?
		$controladores		=  array_map(function($controlador)
		{
			return str_replace('Controller', '', $controlador);
		}, App::objects('controller'));
		?>
		<li class="xn-openable">
			<a href="#"><span class="fa fa-cog"></span> <span class="xn-text">Controladores</span></a>
			<ul>
				<? foreach ( $controladores as $controlador ) : ?>
				<? if ( $controlador === 'App' ) continue; ?>
				<li class="<?= ($this->Html->menuActivo(array('controller' => strtolower($controlador))) ? 'active' : ''); ?>">
					<?= $this->Html->link(
						sprintf('<span class="fa fa-list"></span> <span class="xn-text">%s</span>', ucfirst($controlador)),
						array('controller' => strtolower($controlador), 'action' => 'index'),
						array('escape' => false)
					); ?>
				</li>
				<? endforeach; ?>
			</ul>
		</li>

	</ul>
</div>
