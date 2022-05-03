
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
								<li><span>Modelos</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
                                    <header class="card-header" style="padding:30px !important">
										<a class="modal-with-form btn btn-primary" href="#modalForm1" style="float:right;margin-left:5px"><i class="fas fa-plus-circle"></i> Registrar</a>
										<h2 class="card-title">Registro Modelos Consentimientos</h2>
                                    </header>
									<div class="card-body">
										<!-- <table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
											 -->
											 <table class="table table-bordered table-striped mb-0">
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
                                                    <td class="actions"><a class="modal-with-form btn btn-primary modal-edit-consent" href="#modalForm4" style="color:white"><i class="fas fa-pen"></i> Editar</a><a class="btn btn-danger inactivate-consent" href="#" style="color:white"><i class="fas fa-times"></i> Eliminar</a></td>
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
									<div id="modalForm1" class="modal-block modal-block-primary mfp-hide" style="max-width:1000px !important">
										<section class="card" >
											<header class="card-header">
												<h2 class="card-title">Creación Consentimiento</h2>
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
                                                    <input type="hidden" id="ID_EMPRESA" value="<?php echo $_SESSION['user']->identyUser; ?>">
														<div class="form-group col-md-12 mb-3 mb-lg-0">
															<label for="NOMBRE_CONSEN">Nombre <strong>*</strong></label>
                                                            <input type="text" name="NOMBRE_CONSEN" id="NOMBRE_CONSEN" class="form-control">
														</div>
													</div>
													<div class="form-row">
														<div class="col-md-12 mb-6 mb-lg-0">
															<label for="TEXTO_CONSEN">Detalle Consentimiento <strong>*</strong></label>
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
                                
									<!-- Modal Form -->
									<div id="modalForm4" class="modal-block modal-block-primary mfp-hide" style="max-width:1000px !important">
										<section class="card" >
											<header class="card-header">
												<h2 class="card-title">Edicion Consentimiento</h2>
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
													<input type="hidden" id="ID_CONSEN">
														<div class="form-group col-md-12 mb-3 mb-lg-0">
															<label for="NOMBRE_CONSEN">Nombre <strong>*</strong></label>
                                                            <input type="text" name="NOMBRE_CONSEN" id="NOMBRE_CONSEN" class="form-control">
														</div>
													</div>
													<div class="form-row">
														<div class="col-md-12 mb-6 mb-lg-0">
															<label for="TEXTO_CONSEN">Detalle Consentimiento <strong>*</strong></label>
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
														<button class="btn btn-primary modal-confirm" id="editConsent1" >Editar</button>
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
								$('#ID_CONSEN').val(data[0]['ID_CONSEN']);
                                $('#NOMBRE_CONSEN').val(data[0]['NOMBRE_CONSEN']);
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
							url: '?controller=consent&method=inactiveConsent',
							data: 'ID_CONSEN='+id,
							success: function(data){
						console.log(data);			
						new PNotify({
							title: 'Confirmado!',
							text: 'Consentimiento Desactivado Exitosamente.', 
							type: 'success'
						});
						setTimeout(() => {
						location.reload();	
						}, 2000);
					},
					error: function(data){
						$.magnificPopup.close();	
						new PNotify({
							title: 'Rechazado!',
							text: 'Hubo un error al desactivar el consentimiento',
							type: 'error',
							shadow: true
						});
					}
						});
					});

					        	/* 
	create consent indirect
	*/
	$(document).on('click', '#editConsent1', function (e) {
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
					url: '?controller=consent&method=editConsent1',
					data: 'TEXTO_CONSEN='+$('#OBSERVACIONES').html()+'&ID_CONSEN='+$('#ID_CONSEN').val()+'&NOMBRE_CONSEN='+$('#NOMBRE_CONSEN').val(),
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