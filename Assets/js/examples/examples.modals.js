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
					data: 'ID_PROP='+$('#idOwner').val()+'&ST_NOM='+$('#firstName').val()+'&ND_NOM='+$('#secondName').val()+'&ST_APE='+$('#firstLn').val()+'&ND_APE='+$('#secondLn').val()+'&DIRECCION='+$('#addres').val()+'&TELEFONO='+$('#phone').val()+'&EMAIL='+$('#email').val()+'&DEPARTAMENTO='+$('#department').val()+'&CIUDAD='+$('#city').val()+'&TIPO_DOC='+$('#document').val()+'&TELEFONO2='+$('#phone2').val()+'&ID_EMPRESA='+$('#idEmp').val(),
					success: function(data){
						new PNotify({
							title: 'Confirmado!',
							text: 'Propietario Creado Exitosamente.',
							type: 'success'
						});
						$.magnificPopup.close();
						setTimeout(() => {
						location.reload();	
						}, 2000);
						// reloadTable();
						
					},
					error: function(data){
						$.magnificPopup.close();
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
						$('#name').html(data['ST_NOM']+" "+data['ST_APE']);
					},
					error: function(data){
						$.magnificPopup.close();
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
					data: 'ID_MASCOTA='+$('#ID_MASCOTA').val()+'&NOMBRE='+$('#NOMBRE').val()+'&SEXO='+$('#SEXO').val()+'&TIPO='+$('#TIPO').val()+'&RAZA='+$('#RAZA').val()+'&DUENO='+$('#DUENO').val()+'&COLOR='+$('#COLOR').val()+'&FEC_NAC='+$('#FEC_NAC').val()+'&ESTADO_MASCOTA=Vivo&ID_EMPRESA='+$('#idEmp').val(),
					success: function(data){
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
						}, 2000);
					},
					error: function(data){
						$.magnificPopup.close();
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
	Create Consent
	*/

	$(document).on('click', '#createConsent', function (e) {
		var confirmer;
		e.preventDefault();
        e.stopImmediatePropagation();
			if($("#NOMBRE_CONSEN").val().length < 1) {
				$('#NOMBRE_CONSEN').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#alertif').css('display','none');
				$('#NOMBRE_CONSEN').css('border','1px solid green');
			}		
			if($("#OBSERVACIONES").html().length < 1) {
				$('#OBSERVACIONES').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#OBSERVACIONES').css('border','1px solid green');
				$('#alertif').css('display','none');
				$('#confirmer').val("1");
			}
			confirmer=$('#confirmer').val();

			if (confirmer=='1') {
				$.ajax({
					type: 'POST',
					url: '?controller=consent&method=createConsent',
					data: 'NOMBRE_CONSEN='+$('#NOMBRE_CONSEN').val()+'&TEXTO_CONSEN='+$('#OBSERVACIONES').html()+'&ID_EMPRESA='+$('#ID_EMPRESA').val(),
					success: function(data){
						new PNotify({
							title: 'Confirmado!',
							text: 'Consentimiento Creado Exitosamente.',
							type: 'success'
						});
						$.magnificPopup.close();
						setTimeout(() => {
						location.reload();	
						}, 2000);
					},
					error: function(data){
						$.magnificPopup.close();
						new PNotify({
							title: 'Rechazado!',
							text: 'Hubo un error al crear el consentimiento',
							type: 'error',
							shadow: true
						});
					}
					});	
			}
	});

	/* 
	upload Archive
	*/

	$(document).on('click', '#fileupload', function (e) {
		var confirmer;
		e.preventDefault();
        e.stopImmediatePropagation();
			var ide = $('#ID_EMPRESA').val();
			var idm = $('#ID_MASCOTA').val();
			var formData = new FormData();
			var filess = $('#archivetoupload')[0].files[0];
			formData.append('file',filess);
						$.ajax({
							url:'?controller=patient&method=uploadArchive&ide='+ide+'&idm='+idm,
							type:'POST',
							data: formData,
							contentType: false,
							cache: false,
							processData: false,
							success: function(response){
								new PNotify({
									title: 'Confirmado!',
									text: 'Archivo cargado correctamente',
									type: 'success'
								});
								$.magnificPopup.close();
								setTimeout(() => {
								location.reload();	
								}, 2000);
						},
						error: function(data){
							$.magnificPopup.close();
							new PNotify({
								title: 'Rechazado!',
								text: 'Hubo un error al cargar el archivo',
								type: 'error',
								shadow: true
							});
						}
						});	
	});

	/*
	Edit Patient
	*/

	$(document).on('click', '#editPatient', function (e) {
		var confirmer;
		var confirmerPhoto;
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
			}
			if($("#ESTADO_MASCOTA").val() == 'Seleccione...') {
				$('#ESTADO_MASCOTA').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#ESTADO_MASCOTA').css('border','1px solid green');
				$('#alertif').css('display','none');
			}
			if($("#PESO").val() == 'Seleccione...') {
				$('#PESO').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#PESO').css('border','1px solid green');
				$('#alertif').css('display','none');				
			}
			if($("#DIETA").val() == 'Seleccione...') {
				$('#DIETA').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#DIETA').css('border','1px solid green');
				$('#alertif').css('display','none');				
			}
			if($("#ANORMALIDADES").val() == 'Seleccione...') {
				$('#ANORMALIDADES').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#ANORMALIDADES').css('border','1px solid green');
				$('#alertif').css('display','none');
			}
			if($("#ANAMESIS").val() == 'Seleccione...') {
				$('#ANAMESIS').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#ANAMESIS').css('border','1px solid green');
				$('#alertif').css('display','none');
				$('#confirmer').val("1");
			}
			if($("#file").val().length < 1) {
				$('#file').css('border','1px solid red');
			}else{
				$('#file').css('border','1px solid green');
				$('#alertif').css('display','none');
				$('#confirmerPhoto').val("1");
			}
					
			var formData = new FormData();
			var filess = $('#file')[0].files[0];
			formData.append('file',filess);
			confirmer=$('#confirmer').val();
			confirmerPhoto=$('#confirmerPhoto').val();

			if (confirmer=='1') {
				$.ajax({
					type: 'POST',
					url: '?controller=patient&method=editPatient',
					data: 'ID_MASCOTA='+$('#ID_MASCOTA').val()+'&NOMBRE='+$('#NOMBRE').val()+'&SEXO='+$('#SEXO').val()+'&TIPO='+$('#TIPO').val()+'&RAZA='+$('#RAZA').val()+'&DUENO='+$('#DUENO').val()+'&COLOR='+$('#COLOR').val()+'&FEC_NAC='+$('#FEC_NAC').val()+'&ESTADO_MASCOTA='+$('#ESTADO_MASCOTA').val()+'&PESO='+$('#PESO').val()+'&DIETA='+$('#DIETA').val()+'&ANORMALIDADES='+$('#ANORMALIDADES').val()+'&ANAMESIS='+$('#ANAMESIS').val(),
					success: function(data){
						console.log(data);			
						new PNotify({
							title: 'Confirmado!',
							text: 'Mascota Editada Exitosamente.',
							type: 'success'
						});
						$.magnificPopup.close();
						setTimeout(() => {
						location.reload();	
						}, 2000);
					},
					error: function(data){
						$.magnificPopup.close();
						new PNotify({
							title: 'Rechazado!',
							text: 'Hubo un error al crear el propietario',
							type: 'error',
							shadow: true
						});
					}
					});	
				}
			if (confirmerPhoto=='1') {
				$.ajax({
					url:'?controller=patient&method=uploadPhotoEdited&id='+$('#ID_MASCOTA').val(),
				 	type:'POST',
					data: formData,
					contentType: false,
					cache: false,
					processData: false,
					success: function(response){
						console.log(response);
					}
				});
			}
			
	});

	/*
	Create Vaccine
	*/

	$(document).on('click', '#createVaccine', function (e) {
		var confirmer;
		e.preventDefault();
        e.stopImmediatePropagation();
			if($("#NOMBRE_VACUNA").val().length < 1) {
				$('#NOMBRE_VACUNA').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#alertif').css('display','none');
				$('#NOMBRE_VACUNA').css('border','1px solid green');
			}		
			if($("#PRESENTACION").val() == 'Seleccione...') {
				$('#PRESENTACION').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#PRESENTACION').css('border','1px solid green');
				$('#alertif').css('display','none');
				$('#confirmer').val("1");
			} 
			confirmer=$('#confirmer').val();
			if (confirmer=='1') {
				$.ajax({
					type: 'POST',
					url: '?controller=vaccine&method=newVaccine',
					data: 'NOMBRE_VACUNA='+$('#NOMBRE_VACUNA').val()+'&PRESENTACION='+$('#PRESENTACION').val(),
					success: function(data){
						console.log(data);			
						new PNotify({
							title: 'Confirmado!',
							text: 'Vacuna Creada Exitosamente.',
							type: 'success'
						});
						$.magnificPopup.close();
						setTimeout(() => {
						location.reload();	
						}, 2000);
					},
					error: function(data){
						$.magnificPopup.close();
						new PNotify({
							title: 'Rechazado!',
							text: 'Hubo un error al crear la vacuna',
							type: 'error',
							shadow: true
						});
					}
					});	
				}
	});


	/*
	Edit Vaccine
	*/

	$(document).on('click', '#editVaccine', function (e) {
		var confirmer;
		e.preventDefault();
        e.stopImmediatePropagation();
			if($("#NOMBRE_VACUNA_EDIT").val().length < 1) {
				$('#NOMBRE_VACUNA_EDIT').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#alertif').css('display','none');
				$('#NOMBRE_VACUNA_EDIT').css('border','1px solid green');
			}		
			if($("#PRESENTACION_EDIT").val() == 'Seleccione...') {
				$('#PRESENTACION_EDIT').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#PRESENTACION_EDIT').css('border','1px solid green');
				$('#alertif').css('display','none');
				$('#confirmer').val("1");
			} 
			confirmer=$('#confirmer').val();
			if (confirmer=='1') {
				$.ajax({
					type: 'POST',
					url: '?controller=vaccine&method=editVaccine',
					data: 'ID_VACUNA='+$('#ID_VACUNA_EDIT').val()+'&NOMBRE_VACUNA='+$('#NOMBRE_VACUNA_EDIT').val()+'&PRESENTACION='+$('#PRESENTACION_EDIT').val(),
					success: function(data){
						console.log(data);			
						new PNotify({
							title: 'Confirmado!',
							text: 'Vacuna Editada Exitosamente.',
							type: 'success'
						});
						$.magnificPopup.close();
						setTimeout(() => {
						location.reload();	
						}, 2000);
					},
					error: function(data){
						$.magnificPopup.close();
						new PNotify({
							title: 'Rechazado!',
							text: 'Hubo un error al editar la vacuna',
							type: 'error',
							shadow: true
						});
					}
					});	
				}
	});

	/* 
	function to call data for edit
	*/

	$(document).on('click','.idEdit',function(){
		let element = $(this)[0].parentElement.parentElement;
		let id = $(element).attr('Id');
		$.post('?controller=vaccine&method=getById',{id},function(response){
			const task = JSON.parse(response);
			$('#NOMBRE_VACUNA_EDIT').val(task[0].NOMBRE_VACUNA);
			$('#PRESENTACION_EDIT').val(task[0].PRESENTACION);
			$('#ID_VACUNA_EDIT').val(task[0].ID_VACUNA);
		})
		});


	
	/*
	create Vaccine Appointment 
	*/

	$(document).on('click', '#createVaccineAppointment ', function (e) {
		var confirmer;
		e.preventDefault();
        e.stopImmediatePropagation();
			if($("#ID_PROP").val() == 'Seleccione...') {
				$('#ID_PROP').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#ID_PROP').css('border','1px solid green');
				$('#alertif').css('display','none');
			} 
			if($("#ID_MASCOTA").val() == 'Seleccione...') {
				$('#ID_MASCOTA').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#ID_MASCOTA').css('border','1px solid green');
				$('#alertif').css('display','none');
			} 
			if($("#ID_VACUNA").val() == 'Seleccione...') {
				$('#ID_VACUNA').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#ID_VACUNA').css('border','1px solid green');
				$('#alertif').css('display','none');
			}
			if($("#LOTE").val().length < 1) {
				$('#LOTE').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#alertif').css('display','none');
				$('#LOTE').css('border','1px solid green');
			}	
			if($("#PRESENTACION").val().length < 1) {
				$('#PRESENTACION').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#alertif').css('display','none');
				$('#PRESENTACION').css('border','1px solid green');
			}		
			if($("#DOSIS").val().length < 1) {
				$('#DOSIS').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#alertif').css('display','none');
				$('#DOSIS').css('border','1px solid green');
			}
			if($("#VENCIMIENTO").val().length < 1) {
				$('#VENCIMIENTO').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#alertif').css('display','none');
				$('#VENCIMIENTO').css('border','1px solid green');
			}
			if($("#FEC_VACUNA").val().length < 1) {
				$('#FEC_VACUNA').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#alertif').css('display','none');
				$('#FEC_VACUNA').css('border','1px solid green');
			}
			if($("#FECHA_SIG_VACUNA").val().length < 1) {
				$('#FECHA_SIG_VACUNA').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#alertif').css('display','none');
				$('#FECHA_SIG_VACUNA').css('border','1px solid green');
			}			
			if($("#FECHA_ULT_VACUNA").val().length < 1) {
				$('#FECHA_ULT_VACUNA').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#alertif').css('display','none');
				$('#FECHA_ULT_VACUNA').css('border','1px solid green');
			}			
			if($("#PROXIMA_VACUNA").val() == 'Seleccione...') {
				$('#PROXIMA_VACUNA').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#PROXIMA_VACUNA').css('border','1px solid green');
				$('#alertif').css('display','none');
				$('#confirmer').val("1");
			} 
			confirmer=$('#confirmer').val();
			if (confirmer=='1') {
				$.ajax({
					type: 'POST',
					url: '?controller=vaccine&method=createVaccineAppoinment',
					data: 'ID_PROP='+$('#ID_PROP').val()+'&ID_MASCOTA='+$('#ID_MASCOTA').val()+'&ID_VACUNA='+$('#ID_VACUNA').val()+'&LOTE='+$('#LOTE').val()+'&PRESENTACION='+$('#PRESENTACION').val()+'&DOSIS='+$('#DOSIS').val()+'&VENCIMIENTO='+$('#VENCIMIENTO').val()+'&FEC_VACUNA='+$('#FEC_VACUNA').val()+'&FECHA_SIG_VACUNA='+$('#FECHA_SIG_VACUNA').val()+'&PROXIMA_VACUNA='+$('#PROXIMA_VACUNA').val()+'&DETALLE='+$('#DETALLE').val()+'&ID_EMPRESA='+$('#ID_EMPRESA').val()+'&ULTIMA_VACUNA='+$('#FECHA_ULT_VACUNA').val()+'&ESTADO_VACUNA=Pendiente',
					success: function(data){
						new PNotify({
							title: 'Confirmado!',
							text: 'Cita de Vacuna Creada Exitosamente.',
							type: 'success'
						});
						$.magnificPopup.close();
						setTimeout(() => {
						location.reload();	
						}, 2000);
					},
					error: function(data){
						$.magnificPopup.close();
						new PNotify({
							title: 'Rechazado!',
							text: 'Hubo un error al crea la cita de vacuna',
							type: 'error',
							shadow: true
						});
					}
					});	
				}
	});

	/* 
	Create schedule query
	*/
	$(document).on('click', '#scheduleQuery ', function (e) {
		var confirmer;
		e.preventDefault();
        e.stopImmediatePropagation();
			if($("#FECHA_CONSULTA").val().length < 1) {
				$('#FECHA_CONSULTA').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#FECHA_CONSULTA').css('border','1px solid green');
				$('#alertif').css('display','none');
			} 
			if($("#HORA_CONSULTA").val().length < 1) {
				$('#HORA_CONSULTA').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#HORA_CONSULTA').css('border','1px solid green');
				$('#alertif').css('display','none');
				$('#confirmer').val("1");
			} 
			confirmer=$('#confirmer').val();
			if (confirmer=='1') {
				$.ajax({
					type: 'POST',
					url: '?controller=query&method=createQueryAppointment',
					data: 'ID_PROP='+$('#ID_PROP').val()+'&ID_MASCOTA='+$('#ID_MASCOTA').val()+'&ID_EMPRESA='+$('#ID_EMPRESA').val()+'&FECHA_CONSULTA='+$('#FECHA_CONSULTA').val()+'&HORA_CONSULTA='+$('#HORA_CONSULTA').val()+'&OBSERVACIONES='+$('#OBSERVACIONES1').val()+'&ESTADO_CONSULTA=Pendiente',
					success: function(data){
						console.log(data);			
						new PNotify({
							title: 'Confirmado!',
							text: 'Cita de consulta Creada Exitosamente.', 
							type: 'success'
						});
						$.magnificPopup.close();
						setTimeout(() => {
						location.reload();	
						}, 2000);
					},
					error: function(data){
						$.magnificPopup.close();
						new PNotify({
							title: 'Rechazado!',
							text: 'Hubo un error al crea la cita de consulta',
							type: 'error',
							shadow: true
						});
					}
					});	
				}
	});

	/* 
	Save Note
	*/

	$(document).on('click', '#saveNote ', function (e) {
		var confirmer;
		e.preventDefault();
        e.stopImmediatePropagation();
			
			if($("#textNote").val().length < 1) {
				$('#textNote').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#textNote').css('border','1px solid green');
				$('#alertif').css('display','none');
				$('#confirmer').val("1");
			}
			confirmer=$('#confirmer').val();
			if (confirmer=='1') {
				$.ajax({
					type: 'POST',
					url: '?controller=patient&method=saveNote',
					data: 'ID_MASCOTA='+$('#ID_MASCOTA').val()+'&ID_EMPRESA='+$('#ID_EMPRESA').val()+'&FECHA_NOTA='+$('#FECHA_NOTA').val()+'&NOTA='+$('#textNote').val(),
					success: function(data){
						new PNotify({
							title: 'Confirmado!',
							text: 'Nota Creada Exitosamente.', 
							type: 'success'
						});
						$.magnificPopup.close();
						setTimeout(() => {
						location.reload();	
						}, 2000);
					},
					error: function(data){
						$.magnificPopup.close();
						new PNotify({
							title: 'Rechazado!',
							text: 'Hubo un error al crea la Nota',
							type: 'error',
							shadow: true
						});
					}
					});	
				}
	});

	/* 
	Create immediately query
	*/

	$(document).on('click', '#createQuery ', function (e) {
		var confirmer;
		e.preventDefault();
        e.stopImmediatePropagation();
			if($("#FECHA_CONSULTA1").val().length < 1) {
				$('#FECHA_CONSULTA1').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#FECHA_CONSULTA1').css('border','1px solid green');
				$('#alertif').css('display','none');
			}
			if($("#ANTECEDENTES").val().length < 1) {
				$('#ANTECEDENTES').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#ANTECEDENTES').css('border','1px solid green');
				$('#alertif').css('display','none');
			} 
			if($("#SINTOMAS").val().length < 1) {
				$('#SINTOMAS').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#SINTOMAS').css('border','1px solid green');
				$('#alertif').css('display','none');
			} 
			if($("#DIAGNOSTICO").val().length < 1) {
				$('#DIAGNOSTICO').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#DIAGNOSTICO').css('border','1px solid green');
				$('#alertif').css('display','none');
			}
			if($("#FORMULA").val().length < 1) {
				$('#FORMULA').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#FORMULA').css('border','1px solid green');
				$('#alertif').css('display','none');
			}
			if($("#medicineName").val()=='Ninguno') {
				$('#medicineName').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#medicineName').css('border','1px solid green');
				$('#alertif').css('display','none');
			}
			if($("#medicineDosis").val().length < 1) {
				$('#medicineDosis').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#medicineDosis').css('border','1px solid green');
				$('#alertif').css('display','none');
			}
			if($("#medicineFrequency").val().length < 1) {
				$('#medicineFrequency').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#medicineFrequency').css('border','1px solid green');
				$('#alertif').css('display','none');
			}
			if($("#medicineDays").val().length < 1) {
				$('#medicineDays').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#medicineDays').css('border','1px solid green');
				$('#alertif').css('display','none');
			}
			if($("#medicineInstruction").val().length < 1) {
				$('#medicineInstruction').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#medicineInstruction').css('border','1px solid green');
				$('#alertif').css('display','none');
				$('#confirmer').val("1");
			}
			var receta = $('#medicineName').val()+'<br> <b>Dosis:</b> '+$('#medicineDosis').val()+'<br> <b>Frecuencia:</b> '+$('#medicineFrequency').val()+'<br> <b>Dias:</b> '+$('#medicineDays').val()+'<br> <b>Uso:</b> '+$('#medicineInstruction').val();
			var num = $('#num').val();
				for (let index = 1; index < num ; index++) {
					var restrecet=$('#medicineName'+index).val()+'<br> <b>Dosis:</b> '+$('#medicineDosis'+index).val()+'<br> <b>Frecuencia:</b> '+$('#medicineFrequency'+index).val()+'<br> <b>Dias:</b> '+$('#medicineDays'+index).val()+'<br> <b>Uso:</b> '+$('#medicineInstruction'+index).val();
					receta+="-"+restrecet;
				}
			confirmer=$('#confirmer').val();
			if (confirmer=='1') {
				$.ajax({
					type: 'POST',
					url: '?controller=query&method=createImmediatelyQuery',
					data: 'ID_PROP='+$('#ID_PROP').val()+'&ID_MASCOTA='+$('#ID_MASCOTA').val()+'&ID_EMPRESA='+$('#ID_EMPRESA').val()+'&FECHA_CONSULTA='+$('#FECHA_CONSULTA1').val()+'&ANTECEDENTES='+$('#ANTECEDENTES').val()+'&OBSERVACIONES='+$('#OBSERVACIONES').html()+'&SINTOMAS='+$('#SINTOMAS').val()+'&DIAGNOSTICO='+$('#DIAGNOSTICO').val()+'&FORMULA='+$('#FORMULA').val()+'&RECETA='+receta+'&HORA_CONSULTA='+$('#HOURC').val()+'&ESTADO_CONSULTA=Realizado',
					success: function(data){
						console.log(data);			
						new PNotify({
							title: 'Confirmado!',
							text: 'Consulta Creada Exitosamente.', 
							type: 'success'
						});
						$.magnificPopup.close();
						setTimeout(() => {
						location.reload();	
						}, 2000);
					},
					error: function(data){
						$.magnificPopup.close();
						new PNotify({
							title: 'Rechazado!',
							text: 'Hubo un error al crea la consulta',
							type: 'error',
							shadow: true
						});
					}
					});	
				}
	});

	

	/*
	create Barber Appointment 
	*/

	$(document).on('click', '#createBarberAppointment ', function (e) {
		var confirmer;
		e.preventDefault();
        e.stopImmediatePropagation();
			if($("#ID_PROP").val() == 'Seleccione...') {
				$('#ID_PROP').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#ID_PROP').css('border','1px solid green');
				$('#alertif').css('display','none');
			} 
			if($("#ID_MASCOTA").val() == 'Seleccione...') {
				$('#ID_MASCOTA').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#ID_MASCOTA').css('border','1px solid green');
				$('#alertif').css('display','none');
			} 
			if($("#FEC_PELUQUERIA").val().length < 1) {
				$('#FEC_PELUQUERIA').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#alertif').css('display','none');
				$('#FEC_PELUQUERIA').css('border','1px solid green');
			}
			if($("#ACCESORIOS").val() == 'Seleccione...') {
				$('#ACCESORIOS').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#ACCESORIOS').css('border','1px solid green');
				$('#alertif').css('display','none');
			} 
			if($("#CORTE_UNAS").val() == 'Seleccione...') {
				$('#CORTE_UNAS').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#CORTE_UNAS').css('border','1px solid green');
				$('#alertif').css('display','none');
			} 
			if($("#BANO_MEDICADO").val() == 'Seleccione...') {
				$('#BANO_MEDICADO').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#BANO_MEDICADO').css('border','1px solid green');
				$('#alertif').css('display','none');
			} 	
			if($("#PRECIO_PELUQUERIA").val().length < 1) {
				$('#PRECIO_PELUQUERIA').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#alertif').css('display','none');
				$('#PRECIO_PELUQUERIA').css('border','1px solid green');
			}		
			if($("#DETALLE").val().length < 1) {
				$('#DETALLE').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#alertif').css('display','none');
				$('#DETALLE').css('border','1px solid green');
				$('#confirmer').val("1");
			} 
			confirmer=$('#confirmer').val();
			if (confirmer=='1') {
				$.ajax({
					type: 'POST',
					url: '?controller=barber&method=createBarberAppointment',
					data: 'ID_PROP='+$('#ID_PROP').val()+'&ID_MASCOTA='+$('#ID_MASCOTA').val()+'&FEC_PELUQUERIA='+$('#FEC_PELUQUERIA').val()+'&TIPO_CORTE='+$('#TIPO_CORTE').val()+'&ACCESORIOS='+$('#ACCESORIOS').val()+'&CORTE_UNAS='+$('#CORTE_UNAS').val()+'&BANO_MEDICADO='+$('#BANO_MEDICADO').val()+'&PRECIO_PELUQUERIA='+$('#PRECIO_PELUQUERIA').val()+'&DETALLE='+$('#DETALLE').val()+'&ESTADO_PELUQUERIA=Pendiente&ID_EMPRESA='+$('#ID_EMPRESA').val(),
					success: function(data){
						console.log(data);			
						new PNotify({
							title: 'Confirmado!',
							text: 'Registro de peluqueria Creada Exitosamente.',
							type: 'success'
						});
						$.magnificPopup.close();
						setTimeout(() => {
						location.reload();	
						}, 2000);
					},
					error: function(data){
						$.magnificPopup.close();
						new PNotify({
							title: 'Rechazado!',
							text: 'Hubo un error al crea la cita de peluqueria',
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