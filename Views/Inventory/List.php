
    <style>
        .dataTables_wrapper .dataTables_filter input{width:80% !important}
    </style>
				<div class="inner-wrapper" style="padding:0px !important">
				<section role="main" class="content-body">
					<header class="page-header">
					<h2>Lista Registro Productos</h2>
					
						<div class="right-wrapper text-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fas fa-home"></i>
									</a>
								</li>
								<li><span>Inventario</span></li>
								<li><span>Listar</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
                                    <header class="card-header" style="padding:30px !important">
										<a class="modal-with-form btn btn-primary" href="#modalForm1" style="float:right;margin-left:5px">Registrar</a>
										<h2 class="card-title">Registro Articulos</h2>
                                    </header>
                                    
								<div class="card-body">									
									<!-- Modal Form -->
									
									<div class="card-body">
										<table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
											<thead>
												<tr>
													<th>Referencia</th>
													<th>Nombre</th>
													<th>Categoria</th>
													<th>Precio</th>
													<th>Cantidad</th>
													<th>Opciones</th>
												</tr>
											</thead>
											<tbody>
                                                    <?php foreach($articles as $article){ ?>
                                                    <tr id="<?php echo $article->ID_PRO; ?>">
													<td><?php echo $article->ID_PROD_INV; ?></td>
													<td><?php echo $article->NOM_PRO; ?></td>
													<td><?php echo $article->NOM_CATEGORIA; ?></td>
													<td><?php echo "$".number_format($article->PRECIO,0,',','.'); ?></td>
													<td><?php echo $article->CANTIDAD; ?></td>
													<td class="actions" style="width:200px"><a class="modal-with-form btn btn-primary modal-edit-article" href="#modalForm2" style="color:white"><i class="fas fa-pen"></i> Editar</a><a class="btn btn-danger inactivate-article" href="#" style="color:white"><i class="fas fa-times"></i> Eliminar</a></td>
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
                    <div class="card-body">

									<!-- Modal Form -->
									<div id="modalForm1" class="modal-block modal-block-primary mfp-hide">
										<section class="card">
											<header class="card-header">
												<h2 class="card-title">Formulario de Registro Productos</h2>
											</header>
											<div class="card-body">
												<form>
													<div class="form-row">
													<div class="alert alert-danger" id="alertif" style="display:none;width:100%;text-align:center">
														<strong>Oh que mal!</strong> Aun hay espacios por completar.
													</div>
													</div>
													<div class="form-row">
														<div class="col-md-6 mb-3 mb-lg-0">
                                                            <label for="NOM_PRO">Nombre Producto </label>
															<input type="text" id="NOM_PRO" name="NOM_PRO" class="form-control" required>															
														</div>
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="ID_GRUPO">Categoria</label>
															<select name="ID_GRUPO" id="ID_GRUPO" class="form-control">
																<option value="Seleccione...">Seleccione...</option>
																<?php foreach ($groups as $group ) {?>
																	<option value="<?php echo $group->ID_CATEGORIA ?>"><?php echo $group->NOM_CATEGORIA ?></option>
																<?php } ?>
															</select>
														</div>
														
													</div>
													<div class="form-row">
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="CANTIDAD">Cantidad</label>
															<input type="number" id="CANTIDAD" class="form-control">
														</div>												
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="PRECIO">Precio</label>
															<input type="text" id="PRECIO" class="form-control">
														</div>												
													</div>
												</form>
											</div>
											<input type="hidden" id="confirmer" value="0">
											<footer class="card-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														<button class="btn btn-primary modal-confirm" id="createArticle" >Crear</button>
														<button class="btn btn-default modal-dismiss" >Cancelar</button>
													</div>
												</div>
											</footer>
										</section>
									</div>

									<div id="modalForm2" class="modal-block modal-block-primary mfp-hide">
										<section class="card">
											<header class="card-header">
												<h2 class="card-title">Formulario de Editar Producto</h2>											</header>
											<div class="card-body">
												<form>
													<div class="form-row">
													<div class="alert alert-danger" id="alertif" style="display:none;width:100%;text-align:center">
														<strong>Oh que mal!</strong> Aun hay espacios por completar.
													</div>
													</div>
													<div class="form-row">
														<div class="col-md-6 mb-3 mb-lg-0">
															<input type="hidden" id="ID_PROE">
                                                            <label for="NOM_PROE">Nombre Producto </label>
															<input type="text" id="NOM_PROE" name="NOM_PROE" class="form-control" required>															
														</div>
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="ID_GRUPOE">Categoria</label>
															<select name="ID_GRUPO" id="ID_GRUPOE" class="form-control">
																<option value="Seleccione...">Seleccione...</option>
																<?php foreach ($groups as $group ) {?>
																	<option value="<?php echo $group->ID_CATEGORIA ?>"><?php echo $group->NOM_CATEGORIA ?></option>
																<?php } ?>
															</select>
														</div>
														
													</div>
													<div class="form-row">
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="CANTIDADE">Cantidad</label>
															<input type="number" id="CANTIDADE" class="form-control">
														</div>												
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="PRECIOE">Precio</label>
															<input type="text" id="PRECIOE" class="form-control">
														</div>												
													</div>
												</form>
											</div>
											<input type="hidden" id="confirmer" value="0">
											<footer class="card-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														<button class="btn btn-primary modal-confirm" id="editArticle" >Editar</button>
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
		<!-- <script src="Assets/js/examples/examples.notifications.js"></script> -->
		<script src="Assets/js/examples/examples.modals.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
    <script>


        $('#PRECIO').mask('#.##0', {reverse: true});
		$('#PRECIOE').mask('#.##0', {reverse: true});

		$(document).on('click','.modal-edit-article',function(){
						let element = $(this)[0].parentElement.parentElement;
						let id = $(element).attr('id');
                        $.ajax({
							type: 'POST',
							url: '?controller=inventory&method=getDataArticle',
							data: 'ID_PRO='+id,
							success:function(response){
                                var data = $.parseJSON(response);
                                $('#NOM_PROE').val(data[0]['NOM_PRO']);
                                $('#ID_GRUPOE').val(data[0]['ID_GRUPO']);
                                $('#CANTIDADE').val(data[0]['CANTIDAD']);
								$('#PRECIOE').val(data[0]['PRECIO']);
								$('#ID_PROE').val(data[0]['ID_PRO']);
							}
						});
					});

					$(document).on('click','.inactivate-article',function(){
						let element = $(this)[0].parentElement.parentElement;
						let id = $(element).attr('id');
                        $.ajax({
							type: 'POST',
							url: '?controller=inventory&method=inactivateArticle',
							data: 'ID_PRO='+id,
							success:function(response){
                                        new PNotify({
                                        title: 'Confirmado!',
                                        text: 'Producto Desactivado Exitosamente.',
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
                                        text: 'Hubo un error al desactivar el producto',
                                        type: 'error',
                                        shadow: true
                                    });
                                }
						});
					});
		</script>