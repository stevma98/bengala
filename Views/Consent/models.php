
    <style>
        .dataTables_wrapper .dataTables_filter input{width:80% !important}
    </style>
    <link rel="stylesheet" href="Assets/vendor/summernote/summernote-bs4.css" />
				<div class="inner-wrapper" style="padding:0px !important">
				<section role="main" class="content-body">
					<header class="page-header">
					<h2>Lista Registro Cortes</h2>
					
						<div class="right-wrapper text-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fas fa-home"></i>
									</a>
								</li>
								<li><span>Layouts</span></li>
								<li><span>Default</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
                                    <header class="card-header" style="padding:30px !important">
										<a class="modal-with-form btn btn-primary" href="#modalForm1" style="float:right;margin-left:5px">Registrar</a>
										<h2 class="card-title">Registro Cortes</h2>
                                    </header>
                                    
								<div class="card-body">									
									<!-- Modal Form -->
									
									<div class="card-body">
										<table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
											<thead>
												<tr>
													<th style="width:75%">Nombre</th>
                                                    <th>Fecha Creado</th>
													<th>Acciones</th>
												</tr>
											</thead>
											<tbody>
                                            <?php foreach ($consents as $consent) {?>
                                                <tr id="<?php echo $consent->ID_CONSEN ?>" ide="<?php echo $consent->ID_EMPRESA ?>">
                                                    <td><?php echo $consent->NOMBRE_CONSEN ?></td>
                                                    <td><?php echo $consent->FECHA_CONSEN ?></td>
                                                    <td class="actions"><a class="modal-with-form btn btn-primary modal-edit-consent" href="#modalForm4" style="color:white"><i class="fas fa-pen"></i> Editar</a></td>
                                                </tr>
                                            <?php } ?>
											</tbody>
										</table>
									</div>
								</section>
							</div>
						</div>
						</div>
					</div>
                                <div class="card-body">

									<!-- Modal Form -->
									<div id="modalForm1" class="modal-block modal-block-primary mfp-hide" style="max-width:1000px !important">
										<section class="card" >
											<header class="card-header">
												<h2 class="card-title">Formulario de Creacion Consentimiento</h2>
											</header>
											<div class="card-body">
												<form>
													<div class="form-row">
													<div class="alert alert-danger" id="alertif" style="display:none;width:100%;text-align:center">
														<strong>Oh que mal!</strong> Aun hay espacios por completar.
													</div>
                                                    <input type="hidden" id="ID_EMPRESA" value="<?php echo $_SESSION['user']->identyUser; ?>">
														<div class="form-group col-md-12 mb-3 mb-lg-0">
															<label for="NOMBRE_CONSEN">Nombre:</label>
                                                            <input type="text" name="NOMBRE_CONSEN" id="NOMBRE_CONSEN" class="form-control">
														</div>
													</div>
													<div class="form-row">
														<div class="col-md-12 mb-6 mb-lg-0">
															<label for="TEXTO_CONSEN">Detalle Consentimiento</label>
															<div class="summernote" data-plugin-summernote data-plugin-options='{ "height": 180,"codemirror": { "theme": "ambiance" } }'>
													        </div>
														</div>
																</div>													
												</form>
											</div>
											<input type="hidden" id="confirmer" value="0">
											<footer class="card-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														<button class="btn btn-primary modal-confirm" id="createConsent" >Crear</button>
														<button class="btn btn-default modal-dismiss" >Cancelar</button>
													</div>
												</div>
											</footer>
										</section>
									</div>

								</div>
                                
                                <div class="card-body">

									<!-- Modal Form -->
									<div id="modalForm4" class="modal-block modal-block-primary mfp-hide" style="max-width:1000px !important">
										<section class="card" >
											<header class="card-header">
												<h2 class="card-title">Formulario de edicion Consentimiento</h2>
											</header>
											<div class="card-body">
												<form>
													<div class="form-row">
													<div class="alert alert-danger" id="alertif" style="display:none;width:100%;text-align:center">
														<strong>Oh que mal!</strong> Aun hay espacios por completar.
													</div>
                                                    <input type="hidden" id="ID_EMPRESA" value="<?php echo $_SESSION['user']->identyUser; ?>">
														<div class="form-group col-md-12 mb-3 mb-lg-0">
															<label for="NOMBRE_CONSEN">Nombre:</label>
                                                            <input type="text" name="NOMBRE_CONSEN" id="NOMBRE_CONSEN" class="form-control">
														</div>
													</div>
													<div class="form-row">
														<div class="col-md-12 mb-6 mb-lg-0">
															<label for="TEXTO_CONSEN">Detalle Consentimiento</label>
															<div class="summernote" data-plugin-summernote data-plugin-options='{ "height": 180,"codemirror": { "theme": "ambiance" } }'>
													        </div>
														</div>
																</div>													
												</form>
											</div>
											<input type="hidden" id="confirmer" value="0">
											<footer class="card-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														<button class="btn btn-primary modal-confirm" id="createConsent" >Crear</button>
														<button class="btn btn-default modal-dismiss" >Cancelar</button>
													</div>
												</div>
											</footer>
										</section>
									</div>

								</div>
					<!-- end: page -->
				</section>
			</div>

			<aside id="sidebar-right" class="sidebar-right">
				<div class="nano">
					<div class="nano-content">
						<a href="#" class="mobile-close d-md-none">
							Collapse <i class="fas fa-chevron-right"></i>
						</a>
			
						<div class="sidebar-right-wrapper">
			
							<div class="sidebar-widget widget-calendar">
								<h6>Upcoming Tasks</h6>
								<div data-plugin-datepicker data-plugin-skin="dark"></div>
			
								<ul>
									<li>
										<time datetime="2017-04-19T00:00+00:00">04/19/2017</time>
										<span>Company Meeting</span>
									</li>
								</ul>
							</div>
			
							<div class="sidebar-widget widget-friends">
								<h6>Friends</h6>
								<ul>
									<li class="status-online">
										<figure class="profile-picture">
											<img src="img/!sample-user.jpg" alt="Joseph Doe" class="rounded-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
									<li class="status-online">
										<figure class="profile-picture">
											<img src="img/!sample-user.jpg" alt="Joseph Doe" class="rounded-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
									<li class="status-offline">
										<figure class="profile-picture">
											<img src="img/!sample-user.jpg" alt="Joseph Doe" class="rounded-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
									<li class="status-offline">
										<figure class="profile-picture">
											<img src="img/!sample-user.jpg" alt="Joseph Doe" class="rounded-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
								</ul>
							</div>
			
						</div>
					</div>
				</div>
			</aside>

		</section>	

		<!-- Examples -->
		<script src="Assets/js/examples/examples.modals.js"></script>
        <script src="Assets/vendor/summernote/summernote-bs4.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
        <script>
					(function($) {

						'use strict';

						if ( $.isFunction($.fn[ 'summernote' ]) ) {

							$(function() {
								$('[data-plugin-summernote]').each(function() {
									var $this = $( this ),
										opts = {};

									var pluginOptions = $this.data('plugin-options');
									if (pluginOptions)
										opts = pluginOptions;

									$this.themePluginSummerNote(opts);
								});
							});

						}

						}).apply(this, [jQuery]);
				</script>
                <script>
					$(document).on('click','.modal-edit-consent',function(){
						let element = $(this)[0].parentElement.parentElement;
						let id = $(element).attr('id');
						let ide= $(element).attr('ide');
                        $.ajax({
							type: 'POST',
							url: '?controller=consent&method=getDataConsent',
							data: 'ID_CONSEN='+id,
							success:function(response){
                                var data = $.parseJSON(response);
                                $('#NOMBRE_CONSEN').val(data[0]['NOMBRE_CONSEN']);
                                $('#OBSERVACIONES').html(data[0]['TEXTO_CONSEN']);
							}
						});
					});
					
					/* 
	Edit query
	*/

	function editQuery(id) {
		var confirmer;
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
					url: '?controller=query&method=editQuery1',
					data: 'ID_PROP='+$('#ID_PROP').val()+'&ID_MASCOTA='+$('#ID_MASCOTA').val()+'&ID_EMPRESA='+$('#ID_EMPRESA').val()+'&FECHA_CONSULTA='+$('#FECHA_CONSULTA1').val()+'&ANTECEDENTES='+$('#ANTECEDENTES').val()+'&OBSERVACIONES='+$('#OBSERVACIONES').html()+'&SINTOMAS='+$('#SINTOMAS').val()+'&DIAGNOSTICO='+$('#DIAGNOSTICO').val()+'&FORMULA='+$('#FORMULA').val()+'&RECETA='+receta+'&HORA_CONSULTA='+$('#HOURC').val()+'&ESTADO_CONSULTA=Realizado&id='+id,
					success: function(data){
						console.log(data);			
						new PNotify({
							title: 'Confirmado!',
							text: 'Consulta Editada Exitosamente.', 
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
							text: 'Hubo un error al Editar la consulta',
							type: 'error',
							shadow: true
						});
					}
					});	
				}
				};
				
				</script>