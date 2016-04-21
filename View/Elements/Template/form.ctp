<div class="form-container">
	<div class="form-header">
		<h4>Cotiza tu volvo</h4>
		<a href="tel:+5626002300022" class="fono">600 230 0022</a>
	</div>
	<div class="form-body">
	
		<?= $this->Form->create('Evento', array('action' => 'crear','class' => 'form')); ?>
		<?= $this->Form->input('nombre_usuario', array('class' => 'form-control' , 'placeholder' => 'Nombre')); ?>
		<?= $this->Form->input('email_usuario', array('class' => 'form-control', 'type' => 'email' , 'placeholder' => 'Email')); ?>
		<?= $this->Form->input('telefono_usuario', array('class' => 'form-control' , 'placeholder' => 'Teléfono', 'type' => 'text' )); ?>
		<?= $this->Form->select('sucursal_id', array(
		    '1' => 'Santiago',
		    '2' => 'Antofagasta (AutoSummit)',
		    '3' => 'La Serena (Callegri)',
		    '4' => 'Viña del Mar (Rosselot)',
		    '5' => 'Concepción (Salazar Israel)',
		    '6' => 'Osorno (Barros Arena)',
		),array('empty' => 'Sucursal','class' => 'form-control')); ?>
		<?= $this->Form->checkbox('financiamiento',array('value' => 1,'class' => 'inline')); ?>
		<?= $this->Form->label('financiamiento', 'Financiamiento',array('class' => 'inline'));?>
		<?= $this->Form->select('cuotas', array(
		    '12' => '12x',
		    '24' => '24x',
		    '36' => '36x',
		    '48' => '48x',
		    '60' => '60x',
		),array('empty' => 'Cuotas')); ?>
		<?= $this->Form->input('pie', array('class' => 'form-control' , 'placeholder' => 'Pie', 'type' => 'text' )); ?>
		<?= $this->Form->textarea('mensaje_usuario', array('class' => 'form-control', 'placeholder' => 'Mensaje'));?>
		<? 
		if(!empty($modelo)){echo $this->Form->input('modelo_id', array('type' => 'hidden','class' => '','value' => $modelo['Modelo']['id']));}

		?>
		<?= $this->Form->button('Enviar', array('type' => 'submit', 'class' => 'btn btn-enviar')); ?>
		<?= $this->Form->end(); ?>	
	
	</div>
</div>