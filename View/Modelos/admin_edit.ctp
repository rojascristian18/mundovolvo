<div class="page-title">
	<h2><span class="fa fa-list"></span> Modelos</h2>
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Editar Modelo</h3>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<?= $this->Form->create('Modelo', array('class' => 'form-horizontal', 'type' => 'file', 'inputDefaults' => array('label' => false, 'div' => false, 'class' => 'form-control'))); ?>
				<table class="table">
					<?= $this->Form->input('id'); ?>
					<tr>
						<th><?= $this->Form->label('categoria_modelo_id', 'Categoria modelo'); ?></th>
						<td><?= $this->Form->input('categoria_modelo_id', array('class' => 'form-control select')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('marca_id', 'Marca'); ?></th>
						<td><?= $this->Form->input('marca_id', array('class' => 'form-control select')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('nombre', 'Nombre'); ?></th>
						<td><?= $this->Form->input('nombre'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('nombre_corto', 'Nombre corto'); ?></th>
						<td><?= $this->Form->input('nombre_corto'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('nombre_menu', 'Nombre menú'); ?></th>
						<td><?= $this->Form->input('nombre_menu'); ?></td>
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
						<th><?= $this->Form->label('', 'Banner Galería Actual'); ?></th>
						<td><?= $this->Html->image($modelo['Modelo']['imagen_1']['mini']); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('imagen_1', 'Banner Galería'); ?></th>
						<td><?= $this->Form->input('imagen_1',array('type' => 'file','class' => '')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('', 'Banner Footer Actual'); ?></th>
						<td><?= $this->Html->image($modelo['Modelo']['imagen_2']['mini'])?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('imagen_2', 'Banner Footer'); ?></th>
						<td><?= $this->Form->input('imagen_2',array('type' => 'file','class' => '')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('boton', 'Botón más información'); ?></th>
						<td><?= $this->Form->input('boton'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('gaelria_id', 'Seleccione Galería'); ?></th>
						<td><?= $this->Form->input('galeria_id', array('class' => 'form-control select')); ?></td>
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
