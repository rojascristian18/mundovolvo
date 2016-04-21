<div id="footer">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<?
					foreach ($dealers as $dealer) { ?>
					<div class="sucursal-box">
						<h4><?=$dealer['Distribuidor']['nombre'];?></h4>
						<div class="separador"></div>
						<div class="row">
	
					<? foreach ($dealer['Sucursal'] as $sucursal) { ?>
							<div class="col-5">
								<p><strong><?=$sucursal['nombre'] . " (" . $sucursal['CategoriaSucursal']['nombre'];?>)</strong></p>
								<p><?=$sucursal['direccion'];?></p>
								<p><?=$sucursal['telefono'];?></p>
							</div>
					<? }?>
						</div>
					</div>
				<?	} ?>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="rrss">
					<div class="facebook">
						<?= $this->Html->link('<i class="fa fa-facebook-official"></i>','http://www.facebook.com/VolvoCarsCl',array('escape' => false)); ?>
					</div>
					<div class="twitter">
						<?= $this->Html->link('<i class="fa fa-twitter"></i>','http://twitter.com/VolvoCarsCL',array('escape' => false)); ?>
					</div>
					<div class="instagram">
						<?= $this->Html->link('<i class="fa fa-instagram"></i>','http://www.instagram.com',array('escape' => false)); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
				<span class="copy">Copyright @ 2014 Volvo Car Corporation (o sus empresas asociadas o licenciadas).</span>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
				<?= $this->Html->link( 
						$this->Html->image('Template/volvo_wordmark_white.png', array('class' => 'logo')), array('controller' => 'inicio', 'action' => 'index'), array('escape' => false) );?>
			</div>
		</div>
	</div>

</div>