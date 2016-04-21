<div class="page-title">
	<h2><span class="fa fa-list"></span> Galerias</h2>
</div>

<div class="panel panel-default ">
	<div class="panel-heading">
		<h3 class="panel-title">Editar Galeria</h3>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<?= $this->Form->create('Galeria', array('class' => 'form-horizontal', 'type' => 'file', 'inputDefaults' => array('label' => false, 'div' => false, 'class' => 'form-control'))); ?>
				<table class="table">
					<?= $this->Form->input('id'); ?>
					<tr>
						<th><?= $this->Form->label('modelo_id', 'Modelo'); ?></th>
						<td><?= $this->Form->input('modelo_id', array('class' => 'form-control select','empty' => '(No asignado)')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('nombre', 'Nombre'); ?></th>
						<td><?= $this->Form->input('nombre'); ?></td>
					</tr>
				</table>
				<div class="row">
					<h2>Actuales</h2>
					<!-- Load Gallery Images -->
					<div id="image-box" data-galeria="<?=$galeria_id;?>"></div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3><i class="fa fa-plus" aria-hidden="true"></i> Agregar nuevas imágenes</h3>
							</div>
					        <div class="panel-body">
					        	 <?= $this->Form->input('ruta.',array('type' => 'file','class' => 'file','accept' => 'image/*','multiple','data-preview-file-type' => 'any')); ?>
					        </div>
					    </div>
					</div>
				</div>
				<div class="pull-right">
					<input type="submit" class="btn btn-primary esperar-carga" autocomplete="off" data-loading-text="Espera un momento..." value="Guardar cambios">
					<?= $this->Html->link('Cancelar', array('action' => 'index'), array('class' => 'btn btn-danger')); ?>
				</div>
			<?= $this->Form->end(); ?>
		</div>
	</div>
</div>

