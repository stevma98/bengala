
    <style>
        .dataTables_wrapper .dataTables_filter input{width:80% !important}
		strong{color:red}
    </style>
    <link rel="stylesheet" href="Assets/vendor/summernote/summernote-bs4.css" />
				<div class="inner-wrapper" style="padding:0px !important">
				<section role="main" class="content-body">
					<header class="page-header">
					<h2>Lista Registro Consentimientos</h2>
					
						<div class="right-wrapper text-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fas fa-home"></i>
									</a>
								</li>
								<li><span>Consentimientos</span></li>
								<li><span>Listar</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
                                    <header class="card-header" style="padding:30px !important">
										<a class="modal-with-form btn btn-primary" href="#modalForm1" style="float:right;margin-left:5px"><i class="fas fa-plus-circle"></i> Registrar</a>
										<h2 class="card-title">Registro Consentimiento</h2>
                                    </header>
									<div class="card-body">
										<table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
											<thead>
												<tr>
                                                    <th>Paciente</th>
                                                    <th>Propietario</th>
                                                    <th>Consentimiento</th>
                                                    <th>Fecha Creado</th>
													<th>Acciones</th>
												</tr>
											</thead>
											<tbody>
                                            <?php foreach ($consentsm as $consent) {?>
                                                <tr id="<?php echo $consent->ID_CONSENTIMIENTO ?>" ide="<?php echo $consent->ID_EMPRESA ?>">
                                                    <td><?php echo $consent->NOMBRE ?></td>
                                                    <td><?php echo $consent->ST_NOM." ".$consent->ST_APE?></td>
                                                    <td><?php echo $consent->NOMBRE_CONSEN ?></td>
                                                    <td><?php echo $consent->FECHA_CONSENTIMIENTO ?></td>
                                                    <td class="actions" style="width:350px"><a class="modal-with-form btn btn-primary modal-edit-consent" href="#modalForm4" style="color:white"><i class="fas fa-pen"></i> Editar</a><a class="btn btn-danger inactivate-consent" href="#" style="color:white"><i class="fas fa-times"></i> Eliminar</a><a class="btn btn-success" href="#" style="color:white"><i class="fas fa-print"></i> Imprimir</a></td>
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
									<!-- Modal Form -->
									<div id="modalForm1" class="modal-block modal-block-primary mfp-hide">
										<section class="card">
											<header class="card-header">
												<h2 class="card-title">Asignacion Consentimiento</h2>
											</header>
											<div class="card-body">
												<form>
													<div class="form-row">
													<div class="alert alert-info" style="width:100%;text-align:center">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                            <b>Estimado usuario</b>, los campos marcados con <strong style="color:red">*</strong> son obligatorios.
                                                        </div>
													<div class="alert alert-danger" id="alertif" style="display:none;width:100%;text-align:center">
														<strong>Oh que mal!</strong> Aun hay espacios por completar.
													</div>
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="ID_PROP">Propietario <strong>*</strong></label>
                                                            <select name="ID_PROP" id="ID_PROP" class="form-control" placeholder="Propietario" required>
                                                                <option value="Seleccione..." Selected>Seleccione...</option>
																<?php foreach ($owners as $owner) {?>
																	<option value="<?php echo $owner->ID_PROP ?>"><?php echo $owner->ST_NOM." ".$owner->ND_NOM." ".$owner->ST_APE." ".$owner->ND_APE ?></option>
																<?php } ?>
                                                            </select>
														</div>
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="ID_MASCOTA">Paciente <strong>*</strong></label>
                                                            <select name="ID_MASCOTA" id="ID_MASCOTA" class="form-control" placeholder="Paciente" required>
                                                            </select>
														</div>
													</div><br>
                                                    <div class="form-row">
                                                        <div class="col-md-12 mb-6 mb-lg-0">
                                                            <label for="TIPO_CONSEN">Consentimiento <strong>*</strong></label>
                                                            <select name="TIPO_CONSEN" id="TIPO_CONSEN" class="form-control">
                                                                <option value="Seleccione...">Seleccione...</option>
                                                                <?php foreach ($consents as $consent) {?>
                                                                    <option value="<?php echo $consent->ID_CONSEN ?>"><?php echo $consent->NOMBRE_CONSEN ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
													<div class="form-row">
														<div class="col-md-12 mb-6 mb-lg-0">
                                                            <label for="TEXTO_CONSEN">Detalle Consentimiento <strong>*</strong></label>
															<div class="summernote" data-plugin-summernote data-plugin-options='{ "height": 180,"codemirror": { "theme": "ambiance" } }'></div>
														</div>
																</div>													
												</form>
											</div>
											<input type="hidden" id="confirmer" value="0">
											<footer class="card-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														<button class="btn btn-primary modal-confirm" id="createConsentIndirect" >Crear</button>
														<button class="btn btn-default modal-dismiss" >Cancelar</button>
													</div>
												</div>
											</footer>
										</section>
									</div>

								</div>
									<!-- Modal Form -->
									<div id="modalForm4" class="modal-block modal-block-primary mfp-hide">
										<section class="card">
											<header class="card-header">
												<h2 class="card-title">Edición Consentimiento</h2>
											</header>
											<div class="card-body">
												<form>
													<div class="form-row">
													<div class="alert alert-info" style="width:100%;text-align:center">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                            <b>Estimado usuario</b>, los campos marcados con <strong style="color:red">*</strong> son obligatorios.
                                                        </div>
													<div class="alert alert-danger" id="alertif" style="display:none;width:100%;text-align:center">
														<strong>Oh que mal!</strong> Aun hay espacios por completar.
													</div>
													</div>
                                                    <input type="hidden" id="ID_CONSENTIMIENTO">
													<div class="form-row">
														<div class="col-md-12 mb-6 mb-lg-0">
                                                            <label for="TEXTO_CONSEN">Detalle Consentimiento <strong>*</strong></label>
															<div class="summernote" data-plugin-summernote data-plugin-options='{ "height": 180,"codemirror": { "theme": "ambiance" } }'></div>
														</div>
																</div>													
												</form>
											</div>
											<input type="hidden" id="confirmer" value="0">
											<footer class="card-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														<button class="btn btn-primary modal-confirm" id="editConsent" >Crear</button>
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
							url: '?controller=consent&method=getDataConsentText1',
							data: 'ID_CONSEN='+id,
							success:function(response){
                                var data = $.parseJSON(response);
                                $('#ID_CONSENTIMIENTO').val(data[0]['ID_CONSENTIMIENTO']);
                                $('#OBSERVACIONES').html(data[0]['TEXTO_CONSEN']);
							}
						});
					});

                    $(document).on('click','.inactivate-consent',function(){
						let element = $(this)[0].parentElement.parentElement;
						let id = $(element).attr('id');
						let ide= $(element).attr('ide');
                        $.ajax({
							type: 'POST',
							url: '?controller=consent&method=inactiveConsentById',
							data: 'ID_CONSENTIMIENTO='+id,
							success: function(data){
								if (data=='true') {
									new PNotify({
										title: 'Confirmado!',
										text: 'Consentimiento Desactivado Exitosamente.', 
										type: 'success'
									});
									setTimeout(() => {
									location.reload();	
									}, 2000);	
								} else {
									$.magnificPopup.close();	
									new PNotify({
										title: 'Rechazado!',
										text: 'Hubo un error al desactivar el consentimiento',
										type: 'error',
										shadow: true
									});	
								}
							}
						});
					});

                    $(document).on('change','#TIPO_CONSEN',function(){
						let id = $('#TIPO_CONSEN').val();
                        $.ajax({
							type: 'POST',
							url: '?controller=consent&method=getDataConsentText',
							data: 'ID_CONSEN='+id,
							success:function(response){
                                var data = $.parseJSON(response);
                                $('#OBSERVACIONES').html(data[0]['TEXTO_CONSEN']);
							}
						});
					});
					
                    $('#ID_PROP').on('change',function(){
				id = $('#ID_PROP').val();
				getPatient(id);
			});

			function getPatient(id) {				
				$.ajax({
					url:'?controller=patient&method=getPatient&id='+id,
					type:'GET',
					success:function(response){
						let datas = JSON.parse(response);
						
						let template = '<option value="Seleccione...">Seleccione...</option>';
						datas.forEach(data=>{
							template += `
						<option value='${data.ID_MASCOTA}'>${data.NOMBRE}</option>
						`
						})
						$('#ID_MASCOTA').html(template);
					}
				});
			}

            	/* 
	create consent indirect
	*/
	$(document).on('click', '#editConsent', function (e) {
		var confirmer;
		e.preventDefault();
        e.stopImmediatePropagation();
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
					url: '?controller=consent&method=editConsent',
					data: 'TEXTO_CONSEN='+$('#OBSERVACIONES').html()+'&ID_CONSENTIMIENTO='+$('#ID_CONSENTIMIENTO').val(),
					success: function(data){
						if (data=='true') {
							new PNotify({
								title: 'Confirmado!',
								text: 'Consentimiento Editado Exitosamente.',
								type: 'success'
							});
							$.magnificPopup.close();
							setTimeout(() => {
							location.reload();	
							}, 2000);	
						} else {
							$.magnificPopup.close();
							new PNotify({
								title: 'Rechazado!',
								text: 'Hubo un error al editar el consentimiento',
								type: 'error',
								shadow: true
							});	
						}
					}
					});	
			}
        	});


				</script>