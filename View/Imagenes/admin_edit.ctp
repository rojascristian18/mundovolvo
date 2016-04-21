<div class="page-title">
	<h2><span class="fa fa-list"></span> Imagenes</h2>
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Editar Imagen</h3>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<?= $this->Form->create('Imagen', array('class' => 'form-horizontal', 'type' => 'file', 'inputDefaults' => array('label' => false, 'div' => false, 'class' => 'form-control'))); ?>
				<table class="table">
					<?= $this->Form->input('id'); ?>
					<tr>
						<th><?= $this->Form->label('galeria_id', 'Galeria'); ?></th>
						<td><?= $this->Form->input('galeria_id', array('class' => 'form-control select')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('', 'Imágen actual'); ?></th>
						<td><?= $this->Html->image($ImagenActual); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('ruta', 'Ruta'); ?></th>
						<td><?= $this->Form->input('ruta',array('type' => 'file','class' => '')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('orden', 'Orden'); ?></th>
						<td><?= $this->Form->input('orden'); ?></td>
					</tr>
				</table>

				<div class="pull-right">
					<input type="submit" class="btn btn-primary esperar-carga" autocomplete="off" data-loading-text="Espera un momento..." value="Guardar cambios">
					<?= $this->Html->link('Cancelar', array('action' => 'index'), array('class' => 'btn btn-danger')); ?>
				</div>
			<?= $this->Form->end(); ?>
		</div>
	</div>
</div>
