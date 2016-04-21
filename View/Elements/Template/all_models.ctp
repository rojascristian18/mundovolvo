<div id="menu-body">
	<div class="row">
		<div class="menu-container">
			<label class="titulo">Todos los modelos</label>
			<div class="separador"></div>
			<div class="container-model">
			<? foreach ($modelos as $modelo) { ?>
				<div class="col-5">
					<div class="container-item">
					<h4 class="item-title"><?=$modelo['Modelo']['nombre_menu']?></h4>
					<? 
					$contador = 1;
					foreach ($modelo['ImagenModelo'] as $imagen) {
						if ($contador == 2) {
							echo $this->Html->image( 'ImagenModelo/'. $imagen['id'] . '/' . $imagen['ruta'] , array( 'class' => 'img-responsive side' ) );
						}else{
							echo $this->Html->image( 'ImagenModelo/'. $imagen['id'] . '/' . $imagen['ruta'] , array( 'class' => 'img-responsive first' ) );
						}
						$contador++;

					}?>
					<?=$this->Html->link('más información', array('controller' => 'modelos', 'action' => 'view','slug' =>$modelo['Modelo']['nombre_corto']),array('class' => 'btn btn-default btn-lg')); ?>
					</div>
				</div>
			<? } ?>
			</div>
		</div>
	</div>
</div>