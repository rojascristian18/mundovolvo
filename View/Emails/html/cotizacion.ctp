	<table style="width:600px; max-width:100%;">
		<tr>
			<td colspan="2" style="background-color:#253C6B;padding:5px;text-align:centr"><h3 style="color:#fff;">Nueva cotización</h3></td>
		</tr>
		<tr>
			<td style="padding:5px;"><b>Tipo</b></td>
			<td style="padding:5px;"><?= $nombre_evento; ?></td>
		</tr>
		<tr>
			<td style="padding:5px;"><b>Nombre</b></td>
			<td style="padding:5px;"><?= $nombre; ?></td>
		</tr>
		<tr>
			<td style="padding:5px;"><b>Email</b></td>
			<td style="padding:5px;"><?= $correo; ?></td>
		</tr>
		<tr>
			<td style="padding:5px;"><b>Fono</b></td>
			<td style="padding:5px;"><?= $fono; ?></td>
		</tr>
		<? if( !empty($cuotas)){ ?>
				<tr>
					<td style="padding:5px;"><b>Cuotas</b></td>
					<td style="padding:5px;"><?= $cuotas; ?></td>
				</tr>
		<? } ?>
		<? if( !empty($pie)){ ?>
				<tr>
					<td style="padding:5px;"><b>Píe</b></td>
					<td style="padding:5px;"><?= $pie; ?></td>
				</tr>
		<? } ?>
		<? if( !empty($modelo)){ ?>
				<tr>
					<td style="padding:5px;"><b>Modelo</b></td>
					<td style="padding:5px;"><?= $modelo; ?></td>
				</tr>
		<? } ?>
		<tr>
			<td style="padding:5px;"><b>Mensaje</b></td>
			<td style="padding:5px;"><?= $mensaje; ?></td>
		</tr>
	</table>