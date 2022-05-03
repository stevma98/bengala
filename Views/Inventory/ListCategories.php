
    <style>
        .dataTables_wrapper .dataTables_filter input{width:80% !important}
		strong{color:red}
    </style>
				<div class="inner-wrapper" style="padding:0px !important">
				<section role="main" class="content-body">
					<header class="page-header">
					<h2>Lista Categorias</h2>
					
						<div class="right-wrapper text-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fas fa-home"></i>
									</a>
								</li>
								<li><span>Inventario</span></li>
								<li><span>Categorias</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
                                    <header class="card-header" style="padding:30px !important">
										<a class="modal-with-form btn btn-primary" href="#modalForm1" style="float:right;margin-left:5px"><i class="fas fa-plus-circle"></i> Registrar</a>
										<h2 class="card-title">Registro Categorias</h2>
                                    </header>
                                    
									<div class="card-body">
										<table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
											<thead>
												<tr>
													<th>Nombre</th>
													<th style="width:50%">Descripcion</th>
													<th>Opciones</th>
												</tr>
											</thead>
											<tbody>
                                                    <?php foreach($categories as $categorie){ ?>
                                                    <tr id="<?php echo $categorie->ID_CATEGORIA ?>">
													<td><?php echo $categorie->NOM_CATEGORIA; ?></td>
													<td><?php echo $categorie->DETALLE_CATEGORIA; ?></td>
													<td class="actions" style="width:350px"><a class="modal-with-form btn btn-primary modal-edit-categorie" href="#modalForm4" style="color:white"><i class="fas fa-pen"></i> Editar</a><a class="btn btn-danger inactivate-categorie" href="#" style="color:white"><i class="fas fa-times"></i> Eliminar</a></td>
                                                    </tr>
                                                    <?php 
                                                    } ?>
												</tr>
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
												<h2 class="card-title">Registro Categoria</h2>
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
                                                    <div class="form-row">
                                                    <div class="col-md-12 mb-6 mb-lg-0">
                                                    <label for="NOM_CATEGORIA">Nombre <strong>*</strong></label>
                                                    <input type="text" id="NOM_CATEGORIA" name="NOM_CATEGORIA" class="form-control">
                                                    </div>
                                                    </div>
													<div class="form-row">
														<div class="col-md-12 mb-6 mb-lg-0">
															<label for="DETALLE_CATEGORIA">Observaciones <strong>*</strong></label>
															<textarea class="form-control" rows="2" id="DETALLE_CATEGORIA" data-plugin-textarea-autosize="" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 60px;"></textarea>
														</div>
																</div>													
												</form>
											</div>
											<input type="hidden" id="confirmer" value="0">
											<footer class="card-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														<button class="btn btn-primary modal-confirm" id="createCategorie" >Crear</button>
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
												<h2 class="card-title">Edición Categoria</h2>
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
                                                    <div class="form-row">
                                                    <div class="col-md-12 mb-6 mb-lg-0">
                                                    <label for="NOM_CATEGORIA">Nombre <strong>*</strong></label>
                                                    <input type="hidden" id="ID_CATEGORIA">
                                                    <input type="text" id="NOM_CATEGORIA" name="NOM_CATEGORIA" class="form-control">
                                                    </div>
                                                    </div>
													<div class="form-row">
														<div class="col-md-12 mb-6 mb-lg-0">
															<label for="DETALLE_CATEGORIA">Observaciones <strong>*</strong></label>
															<textarea class="form-control" rows="2" id="DETALLE_CATEGORIA" data-plugin-textarea-autosize="" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 60px;"></textarea>
														</div>
																</div>													
												</form>
											</div>
											<input type="hidden" id="confirmer" value="0">
											<footer class="card-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														<button class="btn btn-primary modal-confirm" id="editCategorie" >Crear</button>
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
		<!-- <script src="Assets/js/examples/examples.notifications.js"></script> -->
		<script src="Assets/js/examples/examples.modals.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>

        <script>
	            $(document).on('click','.modal-edit-categorie',function(){
						let element = $(this)[0].parentElement.parentElement;
						let id = $(element).attr('id');
                        $.ajax({
							type: 'POST',
							url: '?controller=inventory&method=getDataCategorie',
							data: 'ID_CATEGORIA='+id,
							success:function(response){
                                var data = $.parseJSON(response);
                                $('#NOM_CATEGORIA').val(data[0]['NOM_CATEGORIA']);
                                $('#DETALLE_CATEGORIA').val(data[0]['DETALLE_CATEGORIA']);
                                $('#ID_CATEGORIA').val(data[0]['ID_CATEGORIA']);
							}
						});
					});
                    
                    $(document).on('click','.inactivate-categorie',function(){
						let element = $(this)[0].parentElement.parentElement;
						let id = $(element).attr('id');
                        $.ajax({
							type: 'POST',
							url: '?controller=inventory&method=inactivateCategorie',
							data: 'ID_CATEGORIA='+id,
							success:function(response){
								if (response=='true') {
									new PNotify({
                                        title: 'Confirmado!',
                                        text: 'Categoria Creada Exitosamente.',
                                        type: 'success'
                                    });
                                    setTimeout(() => {
                                    location.reload();	
                                    }, 2000);
								} else {
									$.magnificPopup.close();
                                    new PNotify({
                                        title: 'Rechazado!',
                                        text: 'Hubo un error al crear la categoria',
                                        type: 'error',
                                        shadow: true
                                    });
								}
                                }
						});
					});

                    
        </script>