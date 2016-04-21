<div class="container custom">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<? 	
				$sliders = $cabeceras;
				if( ! empty($ishome)) { $ishome = $ishome; }else{ $ishome = ""; }
				$this->set(compact('sliders','ishome'));
			?>
			<?= $this->element('Template/slider'); ?>
			<?= $this->element('Template/form'); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<?= $this->element('Inicio/all_models'); ?>
		</div>
	</div>
</div>
