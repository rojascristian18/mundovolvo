
/**
 * jQuery
 */
var EliminarImagenConfirmar = false;
var ImagenId;

$(document).ready(function(){

	getGalleryImage();

	$(document).on('click','#remove-img', function(){
		if (EliminarImagenConfirmar == false) {
			playAudio('alert');
			$('#mb-remove-image-gallery').addClass('open');
			EliminarImagenConfirmar = true;
			ImagenId = $(this).data('image');
		};
	});

	$(document).on('click','#aceptar', function(){
		if (EliminarImagenConfirmar == true) {
			$('#mb-remove-image-gallery').removeClass('open');
			deleteGalleryImage(ImagenId);
		};
	});

	$(document).on('click','#cancelar', function(){
		if (EliminarImagenConfirmar == true) {
			$('#mb-remove-image-gallery').removeClass('open');
			EliminarImagenConfirmar = false;
		};
	});

	$(document).on('click','#save-order', function(e){
		var esto = $(this);
		e.preventDefault();
		var imagen_id = $(this).parent().children('input').data('imagen');
		var imagen_data = $(this).parent().children('input').val();
		
		console.log(imagen_id + "-" + imagen_data);

		var url = webroot + "admin/imagenes/saveOrder";
		
		var data = "id=" + imagen_id;
		data += "&orden="+ imagen_data;
		var rotate = setInterval(function(){
			rotateIcon(esto);
		},10);
		$.post( url , data, function( response ){
			$(this).parent().children('input').val( response );
			getGalleryImage();
		});

	});

	$(document).on('click', '#remove-img-preview', function(){
		posicion = $(this).parent().children('img').data('posicion');
		removeNewImage(posicion);
		$(this).parent().parent().remove();

	});

});

function rotateIcon(obj){
	$(obj).children('i').css({
	 '-webkit-transform' : 'rotate(180deg)',
     '-moz-transform' : 'rotate(180deg)',
     '-ms-transform' : 'rotate(180deg)',
     'transform' : 'rotate(180deg)'});
}


//Función que elimina imágen de la galería
function deleteGalleryImage(img_id){
	var id =  'id=' + img_id;
	var url = webroot + "admin/imagenes/deleteImage";
	console.log(id);
	$.post( url , id ,function( response ){
		getGalleryImage();
		EliminarImagenConfirmar = false;
	});
}


//Función que obtiene las imágenes de una galería
function getGalleryImage(){

	var url = webroot + "admin/imagenes/galleryBox/" + $('#image-box').data('galeria');

	$.get( url , function( response ){

		$( '#image-box' ).html( response );

	});
}

function removeNewImage(posisicon){
	input = document.getElementById('ruta');
	for (var i = 0; i < input.files.length; i++) {
	 	console.log(input.files[i].name);
	};
}


//Preview de imágen nueva
 function showNewImage(input) {
    for(var i = 0; i < input.files.length; i++){
        if (input.files[i]) {
            var reader = new FileReader();
            reader.onload = function (e) {
               var container = '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" id="preview">';
				   container += '<div class="container-img">';
				   container += '<span id="remove-img-preview" class="btn btn-error"><i class="fa fa-times"></i></span>';
				   container += '<img src="' + e.target.result + '" class="img-responsive full-img" data-posicion="' + i + '">';
				   container += '<div class="preview-img-box"><label>No guardada</label></div>';
			       container += '</div>';
				   container += '</div>';
               $(container).appendTo('#preview');  
            }
            reader.readAsDataURL(input.files[i]);
       }
    }    
}


