<div id="header">
	<div class="container custom">
		<div class="row">

			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
				<div id="menu-principal">
					<span class="text-uppercase">Modelos</span>
					<?= $this->element('Template/all_models'); ?>
				</div>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center">
				<?= $this->Html->link( 
						$this->Html->image('Template/main-logo.png', array('class' => 'logo')), array('controller' => 'inicio', 'action' => 'index'), array('escape' => false) );?>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right">
				<span id="btn-cotizar" class="text-uppercase pull-right">Cotizar</span>
			</div>

		</div>
		<div class="row">
			
		</div>
	</div>
</div>