/*
Name: 			UI Elements / Modals - Examples
Written by: 	Okler Themes - (http://www.okler.net)
Theme Version: 	3.0.0
*/

(function($) {

	'use strict';

	/*
	Basic
	*/
	$('.modal-basic').magnificPopup({
		type: 'inline',
		preloader: false,
		modal: true
	});

	/*
	Sizes
	*/
	$('.modal-sizes').magnificPopup({
		type: 'inline',
		preloader: false,
		modal: true
	});

	/*
	Modal with CSS animation
	*/
	$('.modal-with-zoom-anim').magnificPopup({
		type: 'inline',

		fixedContentPos: false,
		fixedBgPos: true,

		overflowY: 'auto',

		closeBtnInside: true,
		preloader: false,
		
		midClick: true,
		removalDelay: 300,
		mainClass: 'my-mfp-zoom-in',
		modal: true
	});

	$('.modal-with-move-anim').magnificPopup({
		type: 'inline',

		fixedContentPos: false,
		fixedBgPos: true,

		overflowY: 'auto',

		closeBtnInside: true,
		preloader: false,
		
		midClick: true,
		removalDelay: 300,
		mainClass: 'my-mfp-slide-bottom',
		modal: true
	});

	/*
	Modal Dismiss
	*/
	$(document).on('click', '.modal-dismiss', function (e) {
		e.preventDefault();
		$.magnificPopup.close();
	});

	/*
	Modal Create Owner
	*/
	$(document).on('click', '#createOwner', function (e) {
		var confirmer;
		e.preventDefault();
        e.stopImmediatePropagation();
			if($("#idOwner").val().length < 1) {
				$('#idOwner').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#alertif').css('display','none');
				$('#idOwner').css('border','1px solid green');
			}		
			if($("#firstName").val().length < 1) {
				$('#firstName').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#firstName').css('border','1px solid green');
				$('#alertif').css('display','none');
			} 
			if($("#secondName").val().length < 1) {
				$('#secondName').css('border','1px solid red');
				$('#alertif').css('display','display');
			}else{
				$('#secondName').css('border','1px solid green');
				$('#alertif').css('display','none');
			} 
			if($("#firstLn").val().length < 1) {
				$('#firstLn').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#firstLn').css('border','1px solid green');
				$('#alertif').css('display','none');
			}
			if($("#secondLn").val().length < 1) {
				$('#secondLn').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#secondLn').css('border','1px solid green');
				$('#alertif').css('display','none');
			} 
			if($("#addres").val().length < 1) {
				$('#addres').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#addres').css('border','1px solid green');
				$('#alertif').css('display','none');
			}
			if($("#phone").val().length < 1) {
				$('#phone').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#phone').css('border','1px solid green');
				$('#alertif').css('display','none');
			}
			if($("#email").val().length < 1) {
				$('#email').css('border','1px solid red');
				$('#alertif').css('display','display');
			}else{
				$('#email').css('border','1px solid green');
				$('#alertif').css('display','none');
				$('#confirmer').val("1");
			}
			confirmer=$('#confirmer').val();
		
			if (confirmer=='1') {
				$.ajax({
					type: 'POST',
					url: '?controller=owner&method=newOwner',
					data: 'ID_PROP='+$('#idOwner').val()+'&ST_NOM='+$('#firstName').val()+'&ND_NOM='+$('#secondName').val()+'&ST_APE='+$('#firstLn').val()+'&ND_APE='+$('#secondLn').val()+'&DIRECCION='+$('#addres').val()+'&TELEFONO='+$('#phone').val()+'&EMAIL='+$('#email').val()+'&DEPARTAMENTO='+$('#department').val()+'&CIUDAD='+$('#city').val()+'&TIPO_DOC='+$('#document').val()+'&TELEFONO2='+$('#phone2').val(),
					success: function(data){
						new PNotify({
							title: 'Confirmado!',
							text: 'Propietario Creado Exitosamente.',
							type: 'success'
						});
						$.magnificPopup.close();
						setTimeout(() => {
						location.reload();	
						}, 3000);
						// reloadTable();
						
					},
					error: function(data){
						new PNotify({
							title: 'Rechazado!',
							text: 'Hubo un error al crear el propietario',
							type: 'error',
							shadow: true
						});
					}
					});	
			}
			
	});

	/*
	Edit Owner
	*/
	$(document).on('click', '#editOwner', function (e) {
		var confirmer;
		e.preventDefault();
			if($("#ST_NOM").val().length < 1) {
				$('#ST_NOM').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#ST_NOM').css('border','1px solid green');
				$('#alertif').css('display','none');
			} 
			if($("#ND_NOM").val().length < 1) {
				$('#ND_NOM').css('border','1px solid red');
				$('#alertif').css('display','display');
			}else{
				$('#ND_NOM').css('border','1px solid green');
				$('#alertif').css('display','none');
			} 
			if($("#ST_APE").val().length < 1) {
				$('#ST_APE').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#ST_APE').css('border','1px solid green');
				$('#alertif').css('display','none');
			}
			if($("#ND_APE").val().length < 1) {
				$('#ND_APE').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#ND_APE').css('border','1px solid green');
				$('#alertif').css('display','none');
			} 
			if($("#DIRECCION").val().length < 1) {
				$('#DIRECCION').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#DIRECCION').css('border','1px solid green');
				$('#alertif').css('display','none');
			}
			if($("#TELEFONO").val().length < 1) {
				$('#TELEFONO').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#TELEFONO').css('border','1px solid green');
				$('#alertif').css('display','none');
			}
			if($("#EMAIL").val().length < 1) {
				$('#EMAIL').css('border','1px solid red');
				$('#alertif').css('display','display');
			}else{
				$('#EMAIL').css('border','1px solid green');
				$('#alertif').css('display','none');
				$('#confirmer').val("1");
			}
			confirmer=$('#confirmer').val();
		
			if (confirmer=='1') {
				$.ajax({
					type: 'POST',
					url: '?controller=owner&method=editOwner',
					data: 'ID_PROP='+$('#ID_PROP').val()+'&TIPO_DOC='+$('#TIPO_DOC').val()+'&ST_NOM='+$('#ST_NOM').val()+'&ND_NOM='+$('#ND_NOM').val()+'&ST_APE='+$('#ST_APE').val()+'&ND_APE='+$('#ND_APE').val()+'&DIRECCION='+$('#DIRECCION').val()+'&TELEFONO='+$('#TELEFONO').val()+'&EMAIL='+$('#EMAIL').val()+'&DEPARTAMENTO='+$('#DEPARTAMENTO').val()+'&CIUDAD='+$('#CIUDAD').val()+'&TIPO_DOC='+$('#TIPO_DOC').val()+'&TELEFONO2='+$('#TELEFONO2').val(),
					success: function(data){
						new PNotify({
							title: 'Confirmado!',
							text: 'Propietario Editado Exitosamente.',
							type: 'success'
						});
						data= JSON.parse(data);
						console.log();
						$('#name').html(data['ST_NOM']+" "+data['ST_APE']);
					},
					error: function(data){
						new PNotify({
							title: 'Rechazado!',
							text: 'Hubo un error al editar el propietario',
							type: 'error',
							shadow: true
						});
					}
					});	
			}
			
	});
	
	
	/*
	Create Patient
	*/

	$(document).on('click', '#createPatient', function (e) {
		var confirmer;
		e.preventDefault();
        e.stopImmediatePropagation();
			if($("#NOMBRE").val().length < 1) {
				$('#NOMBRE').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#alertif').css('display','none');
				$('#NOMBRE').css('border','1px solid green');
			}		
			if($("#SEXO").val() == 'Seleccione...') {
				$('#SEXO').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#SEXO').css('border','1px solid green');
				$('#alertif').css('display','none');
			} 
			if($("#TIPO").val() == 'Seleccione...') {
				$('#TIPO').css('border','1px solid red');
				$('#alertif').css('display','display');
			}else{
				$('#TIPO').css('border','1px solid green');
				$('#alertif').css('display','none');
			} 
			if($("#RAZA").val() == 'Seleccione...') {
				$('#RAZA').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#RAZA').css('border','1px solid green');
				$('#alertif').css('display','none');
			}
			if($("#FEC_NAC").val() == '') {
				$('#FEC_NAC').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#FEC_NAC').css('border','1px solid green');
				$('#alertif').css('display','none');
			}
			if($("#COLOR").val().length < 1) {
				$('#COLOR').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#COLOR').css('border','1px solid green');
				$('#alertif').css('display','none');
			}
			if($("#DUENO").val() == 'Seleccione...') {
				$('#DUENO').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#DUENO').css('border','1px solid green');
				$('#alertif').css('display','none');
				$('#confirmer').val("1");
			}
			
			var formData = new FormData();
			var filess = $('#file')[0].files[0];
			formData.append('file',filess);
			confirmer=$('#confirmer').val();

			if (confirmer=='1') {
				$.ajax({
					type: 'POST',
					url: '?controller=patient&method=newPatient',
					data: 'ID_MASCOTA='+$('#ID_MASCOTA').val()+'&NOMBRE='+$('#NOMBRE').val()+'&SEXO='+$('#SEXO').val()+'&TIPO='+$('#TIPO').val()+'&RAZA='+$('#RAZA').val()+'&DUENO='+$('#DUENO').val()+'&COLOR='+$('#COLOR').val()+'&FEC_NAC='+$('#FEC_NAC').val()+'&ESTADO='+$('#ESTADO').val(),
					success: function(data){
						console.log(data);
						$.ajax({
							url:'?controller=patient&method=uploadPhoto',
							type:'POST',
							data: formData,
							contentType: false,
							cache: false,
							processData: false,
							success: function(response){
								var name1 = response;
								new PNotify({
									title: 'Confirmado!',
									text: 'Mascota '+name1+' Creado Exitosamente.',
									type: 'success'
								});
							}
						});
						// $.magnificPopup.close();
						// setTimeout(() => {
						// location.reload();	
						// }, 3000);
					},
					error: function(data){
						new PNotify({
							title: 'Rechazado!',
							text: 'Hubo un error al crear el propietario',
							type: 'error',
							shadow: true
						});
					}
					});	
			}
			
	});

		/*
	Create Patient
	*/

	$(document).on('click', '#editPatient', function (e) {
		var confirmer;
		e.preventDefault();
        e.stopImmediatePropagation();
			if($("#NOMBRE").val().length < 1) {
				$('#NOMBRE').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#alertif').css('display','none');
				$('#NOMBRE').css('border','1px solid green');
			}		
			if($("#SEXO").val() == 'Seleccione...') {
				$('#SEXO').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#SEXO').css('border','1px solid green');
				$('#alertif').css('display','none');
			} 
			if($("#TIPO").val() == 'Seleccione...') {
				$('#TIPO').css('border','1px solid red');
				$('#alertif').css('display','display');
			}else{
				$('#TIPO').css('border','1px solid green');
				$('#alertif').css('display','none');
			} 
			if($("#RAZA").val() == 'Seleccione...') {
				$('#RAZA').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#RAZA').css('border','1px solid green');
				$('#alertif').css('display','none');
			}
			if($("#FEC_NAC").val() == '') {
				$('#FEC_NAC').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#FEC_NAC').css('border','1px solid green');
				$('#alertif').css('display','none');
			}
			if($("#COLOR").val().length < 1) {
				$('#COLOR').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#COLOR').css('border','1px solid green');
				$('#alertif').css('display','none');
			}
			if($("#DUENO").val() == 'Seleccione...') {
				$('#DUENO').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#DUENO').css('border','1px solid green');
				$('#alertif').css('display','none');
				$('#confirmer').val("1");
			}
			
			var formData = new FormData();
			var filess = $('#file')[0].files[0];
			formData.append('file',filess);
			confirmer=$('#confirmer').val();

			if (confirmer=='1') {
				$.ajax({
					type: 'POST',
					url: '?controller=patient&method=editPatient',
					data: 'NOMBRE='+$('#NOMBRE').val()+'&SEXO='+$('#SEXO').val()+'&TIPO='+$('#TIPO').val()+'&RAZA='+$('#RAZA').val()+'&DUENO='+$('#DUENO').val()+'&COLOR='+$('#COLOR').val()+'&FEC_NAC='+$('#FEC_NAC').val()+'&ESTADO=Vivo',
					success: function(data){
						console.log(data);
						$.ajax({
							url:'?controller=patient&method=uploadPhoto',
							type:'POST',
							data: formData,
							contentType: false,
							cache: false,
							processData: false,
							success: function(response){
								var name1 = response;
								new PNotify({
									title: 'Confirmado!',
									text: 'Mascota '+name1+' Creado Exitosamente.',
									type: 'success'
								});
							}
						});
						$.magnificPopup.close();
						setTimeout(() => {
						location.reload();	
						}, 3000);
					},
					error: function(data){
						new PNotify({
							title: 'Rechazado!',
							text: 'Hubo un error al crear el propietario',
							type: 'error',
							shadow: true
						});
					}
					});	
			}
			
	});

	/*
	Form
	*/
	$('.modal-with-form').magnificPopup({
		type: 'inline',
		preloader: false,
		focus: '#name',
		modal: true,

		// When elemened is focused, some mobile browsers in some cases zoom in
		// It looks not nice, so we disable it:
		callbacks: {
			beforeOpen: function() {
				if($(window).width() < 700) {
					this.st.focus = false;
				} else {
					this.st.focus = '#name';
				}
			}
		}
	});

	/*
	Ajax
	*/
	$('.simple-ajax-modal').magnificPopup({
		type: 'ajax',
		modal: true
	});

}).apply(this, [jQuery]);