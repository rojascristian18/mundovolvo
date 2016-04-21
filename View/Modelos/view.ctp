
<div class="container-fluid">
	<div class="custom">
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
		<div class="description-container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
					<h1 class="view-title"><?= $modelo['Modelo']['nombre'] ?></h1>
					<h3 class="view-subtitle"><?=$modelo['Modelo']['titulo'] ?></h3>
					<p class="view-p"><?=$modelo['Modelo']['descripcion'];?></p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container custom">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
			<?=$this->Html->image($modelo['Modelo']['imagen_1']['path'],array('class' => 'img-responsive full'));?>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="container-gallery">
				<? foreach ($galeria['Imagen'] as $imagen) {
					echo "<div class='item-image'>";
					echo "<div class='hover'><a class='fancybox' data-fancybox-group='gallery' href='".$this->webroot."img/Imagen/".$imagen['id']."/".$imagen['ruta']."'><i class='fa fa-plus'></i></a></div>";
					echo $this->Html->image('Imagen/'.$imagen['id']."/".$imagen['ruta'],array('class' => 'img-responsive'),array('full_base' => true));
					echo "</div>";
				}?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
			<?=$this->Html->image($modelo['Modelo']['imagen_2']['path'],array('class' => 'img-responsive full'));?>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
			
			<?=$this->Html->link('Más información',$modelo['Modelo']['boton'], array('class' => 'btn btn-mas-info', 'target' => '_blank'));?>
		</div>
	</div>
</div>