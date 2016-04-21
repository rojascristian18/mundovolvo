/*
Script
*/

$(document).ready(function(){

	$('.fancybox').fancybox();

	$(document).on('click','#menu-principal',function(){
		if ( $('#menu-body').hasClass('expandir') == true) {
			$('#menu-body').removeClass('expandir');
		}else{
			$('#menu-body').addClass('expandir');
		}	
	});

	$(document).on('click','#btn-cotizar', function(){

		$("html, body").animate({ scrollTop: $(".form-container").offset().top - 50 }, 1000);
		$("#EventoNombreUsuario").focus();

	});

	/*
	 *  Button helper. Disable animations, hide close button, change title type and content
	 */

	$('.fancybox-buttons').fancybox({
		openEffect  : 'none',
		closeEffect : 'none',

		prevEffect : 'none',
		nextEffect : 'none',

		closeBtn  : false,

		helpers : {
			title : {
				type : 'inside'
			},
			buttons	: {}
		},

		afterLoad : function() {
			this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
		}
	});

	$('#EventoCuotas').attr('disabled','disabled');
	$('#EventoPie').attr('disabled','disabled');
	$( '#EventoFinanciamiento' ).removeAttr('checked');
	console.log($( '#EventoFinanciamiento:checked' ).length);
	

	/****************************************************
		Habilitar campos del formulario.
	****************************************************/
	$(document).on('click','#EventoFinanciamiento',function(){
		if ($( '#EventoFinanciamiento:checked' ).length == 1) {
			$('#EventoCuotas').removeAttr('disabled');
			$('#EventoPie').removeAttr('disabled');
		}else{
			$('#EventoCuotas').attr('disabled','disabled');
			$('#EventoPie').attr('disabled','disabled');
		};
	});


	/****************************************************
		Validar campos del formulario de contacto
	****************************************************/

	$( '.btn-enviar' ).click(function(event){

		var Nombre 		= document.getElementById('EventoNombreUsuario').value;
		var Email 		= document.getElementById('EventoEmailUsuario').value;   
		var Sucursal 	= document.getElementById('EventoSucursalId').value;   
		var Fono 		= document.getElementById('EventoTelefonoUsuario').value;   
		var Mensaje 	= document.getElementById('EventoMensajeUsuario').value;

		if (Nombre == "") {
			configModal('Error', 'Nombre vacio');
			event.preventDefault();
			return;
		}else{ 
			if(!Validations_IsValidText(Nombre)) {
				configModal('Alerta', 'Ingrese solo texto');
				event.preventDefault();
				return;
			};
		}

		if (Email == "") {
			console.log('email vacio');
			configModal('Error', 'Email vacio');
			event.preventDefault();
			return;
		}else{
			if(!Validations_IsValidEmail(Email)) {
				console.log('email invalido');
				configModal('Alerta', 'Ingrese un email válido');
				event.preventDefault();
				return;
			};
		};

		if (Sucursal == "") {
			configModal('Error','Seleccione Sucursal');
			event.preventDefault();
			return;
		};

		if (Fono == "") {
			configModal('Error', 'Ingrese teléfono');
			event.preventDefault();
			return;
		}else{
			if (!Validations_IsValidNumber(Fono)) {
				configModal('Alerta', 'Ingrese solo números');
				event.preventDefault();
				return;
			};
		}
		
		if (Mensaje == "") {
			configModal('Error', 'Complete el mensaje');
			event.preventDefault();
			return;
		};

		//Si todo esta bien se envia el formulario.

	});
});



function configModal( titulo, cuerpo){

	$('#modal .modal-title').text(titulo);
	$('#modal .modal-body').text(cuerpo);

	$('#modal').modal('show');
}