<? $id_galeria = ""; ?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3><i class="fa fa-picture-o" aria-hidden="true"></i> Imágenes</h3>
		</div>
		<div class="panel-body">
			<? foreach ($imagenes as $key => $imagen) { ?>
			<? $id_galeria = $imagen['Imagen']['galeria_id'];?>
				<div class='col-lg-3 col-md-3 col-sm-3 col-xs-12'>
					<div class='container-img'>
						<span id='remove-img' data-image="<?=$imagen['Imagen']['id'];?>" class='btn btn-error'><i class='fa fa-times'></i></span>
						<?=$this->Html->image($imagen['Imagen']['ruta']['path'], array('class' => 'img-responsive full-img'));?>
						<div class='order-img'>
						<label>Modificar orden </label><input type="text" value="<?=$imagen['Imagen']['orden'];?>" data-imagen="<?=$imagen['Imagen']['id'];?>" class='orden-img'><!--
						--><button class="btn-save" id='save-order'><i class="fa fa-refresh"></i></button>
						</div>
					</div>
				</div>
			<? } ?>
		</div>
	</div>
</div>
<!--
<div id="preview"></div>
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
	<div class="panel panel-default">
        <div class="panel-body">
	        <div id="ImagenUploadImageForm" class="dropzone">
	            <?= $this->Form->input('galeria_id',array('type' => 'hidden','value' => $id_galeria)); ?>
	            <?= $this->Form->input('ruta.',array('type' => 'file','class' => '','accept' => 'image/*','onchange'=>'showNewImage(this)','multiple')); ?>
	            <span class='select-image'><i class="fa fa-camera-retro"></i></span>
	        </div>
        </div>
    </div>
</div>-->

<div class="message-box message-box-warning animated fadeIn" data-sound="alert" id="mb-remove-image-gallery">
	<div class="mb-container">
		<div class="mb-middle">
			<div class="mb-title"><span class="glyphicon glyphicon-remove"></span>¿Desea eliminar esta <strong>imágen</strong>?</div>
			<div class="mb-content">
				<p>¿Seguro que quieres elimnar esta imágen?</p>
				<p>Presiona NO para cancelar y SI para elimnar.</p>
			</div>
			<div class="mb-footer">
				<div class="pull-right">
					<a id='aceptar' class="btn btn-success btn-lg">Si</a>					
					<button class="btn btn-default btn-lg" id="cancelar">No</button>
				</div>
			</div>
		</div>
	</div>
</div>

<?= $this->Html->script(array(
			'/backend/js/plugins/dropzone/dropzone.min',
			'/backend/js/plugins/fileinput/fileinput.min',
			'/backend/js/plugins',
			'/backend/js/actions',
		)); ?>
<?= $this->fetch('script'); ?>