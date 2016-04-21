<div class="page-title">
	<h2><span class="fa fa-list"></span> Eventos</h2>
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Nuevo Evento</h3>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<?= $this->Form->create('Evento', array('class' => 'form-horizontal', 'type' => 'file', 'inputDefaults' => array('label' => false, 'div' => false, 'class' => 'form-control'))); ?>
				<table class="table">
					<tr>
						<th><?= $this->Form->label('tipo_evento_id', 'Tipo evento'); ?></th>
						<td><?= $this->Form->input('tipo_evento_id', array('class' => 'form-control select')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('id_cdc', 'Id cdc'); ?></th>
						<td><?= $this->Form->input('id_cdc'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('origen', 'Origen'); ?></th>
						<td><?= $this->Form->input('origen'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('fuente', 'Fuente'); ?></th>
						<td><?= $this->Form->input('fuente'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('local', 'Local'); ?></th>
						<td><?= $this->Form->input('local'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('google_conversion_code', 'Google conversion code'); ?></th>
						<td><?= $this->Form->input('google_conversion_code'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('campanna_id', 'Campanna'); ?></th>
						<td><?= $this->Form->input('campanna_id', array('class' => 'form-control select')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('marca_id', 'Marca'); ?></th>
						<td><?= $this->Form->input('marca_id', array('class' => 'form-control select')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('nombre_usuario', 'Nombre usuario'); ?></th>
						<td><?= $this->Form->input('nombre_usuario'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('email_usuario', 'Email usuario'); ?></th>
						<td><?= $this->Form->input('email_usuario'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('telefono_usuario', 'Telefono usuario'); ?></th>
						<td><?= $this->Form->input('telefono_usuario'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('ciudad_usuario', 'Ciudad usuario'); ?></th>
						<td><?= $this->Form->input('ciudad_usuario'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('comuna_id', 'Comuna'); ?></th>
						<td><?= $this->Form->input('comuna_id'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('mensaje_usuario', 'Mensaje usuario'); ?></th>
						<td><?= $this->Form->input('mensaje_usuario'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('modelo_id', 'Modelo'); ?></th>
						<td><?= $this->Form->input('modelo_id', array('class' => 'form-control select')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('anno', 'Anno'); ?></th>
						<td><?= $this->Form->input('anno'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('pie', 'Pie'); ?></th>
						<td><?= $this->Form->input('pie'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('cuotas', 'Cuotas'); ?></th>
						<td><?= $this->Form->input('cuotas'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('vendedor', 'Vendedor'); ?></th>
						<td><?= $this->Form->input('vendedor'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('asignado', 'Asignado'); ?></th>
						<td><?= $this->Form->input('asignado', array('class' => 'icheckbox')); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('fecha_asignacion', 'Fecha asignacion'); ?></th>
						<td><?= $this->Form->input('fecha_asignacion'); ?></td>
					</tr>
					<tr>
						<th><?= $this->Form->label('creado', 'Creado'); ?></th>
						<td><?= $this->Form->input('creado'); ?></td>
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
