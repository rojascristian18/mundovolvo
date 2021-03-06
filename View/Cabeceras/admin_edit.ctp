<div class="page-title">
	<h2><span class="fa fa-list"></span> Cabeceras</h2>
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Editar Cabecera</h3>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<?= $this->Form->create('Cabecera', array('class' => 'form-horizontal', 'type' => 'file', 'inputDefaults' => array('label' => false, 'div' => false, 'class' => 'form-control'))); ?>
				<table class="table">
					<?= $this->Form->input('id'); ?>
					<tr>
						<th><?= $this->Form->label('modelo_id', 'Modelo'); ?></th>
						<td><?= $this->Form->input('modelo_id', array('class' => 'form-control select' , 'empty'=>'No asignado')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('nombre', 'Nombre'); ?></th>
						<td><?= $this->Form->input('nombre'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('titulo', 'Titulo'); ?></th>
						<td><?= $this->Form->input('titulo'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('descripcion', 'Descripcion'); ?></th>
						<td><?= $this->Form->input('descripcion'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('', 'Imagen Actual'); ?></th>
						<td><?= $this->Html->image($fondo); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('imagen_fondo', 'Imagen fondo'); ?></th>
						<td><?= $this->Form->input('imagen_fondo',array('type' => 'file','class' => '')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('inicio', '¿Agregar al inicio?'); ?></th>
						<td><?= $this->Form->input('inicio', array('class' => 'icheckbox')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('link', 'Link'); ?></th>
						<td><?= $this->Form->input('link'); ?></td>
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
