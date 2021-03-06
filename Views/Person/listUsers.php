
    <style>
        .dataTables_wrapper .dataTables_filter input{width:80% !important}
		strong{color:red}
    </style>
				<div class="inner-wrapper" style="padding:0px !important">
				<section role="main" class="content-body">
					<header class="page-header">
					<h2>Lista Usuarios</h2>
					
						<div class="right-wrapper text-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fas fa-home"></i>
									</a>
								</li>
								<li><span>Usuarios</span></li>
								<li><span>Listar</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
						</div>
					</header>

									<div id="modalForm1" class="modal-block modal-block-primary mfp-hide">
										<section class="card">
											<header class="card-header">
												<h2 class="card-title">Registro de Usuario</h2>
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
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="ST_NOM">Primer Nombre <strong>*</strong></label>
															<input type="text" id="ST_NOM" class="form-control" placeholder="Ej: Peter">
														</div>
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="ND_NOM">Segundo Nombre <strong>*</strong></label>
															<input type="text" id="ND_NOM" class="form-control" placeholder="Ej: Jhon">
														</div>														
													</div>
													<div class="form-row">
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="ST_APE">Primer Apellido <strong>*</strong></label>
															<input type="text" id="ST_APE" class="form-control" placeholder="Ej: Doe">
														</div>
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="ND_APE">Segundo Apellido <strong>*</strong></label>
															<input type="text" id="ND_APE" class="form-control" placeholder="Ej: Necklace">
														</div>														
													</div>
													<div class="form-row">
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="TELEFONO">Teléfono <strong>*</strong></label>
															<input type="text" id="TELEFONO" class="form-control" maxlength="10" placeholder="Ej: 31525555555">
														</div>
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="EMAIL">Email <strong>*</strong></label>
															<input type="text" id="EMAIL" class="form-control" placeholder="Ej: correo@outlook.com">
														</div>														
													</div>
													<div class="form-row">
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="ID">Identificacion <strong>*</strong></label>
															<input type="text" id="ID" class="form-control" placeholder="Ej: 1110458694">
														</div>													
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="PERFIL">Tipo Usuario <strong>*</strong></label>
															<select id="PERFIL" class="form-control">		
																<option value="Seleccione...">Seleccione...</option>
																<option value="Admin">Administrador</option>
																<option value="Caja">Cajero/a</option>
															</select>
														</div>
													</div>

												</form>
											</div>
											<input type="hidden" id="confirmer" value="0">
											<footer class="card-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														<button class="btn btn-primary modal-confirm" id="createUser" >Crear</button>
														<button class="btn btn-default modal-dismiss" >Cancelar</button>
													</div>
												</div>
											</footer>
										</section>
									</div>

									<div id="modalForm2" class="modal-block modal-block-primary mfp-hide">
										<section class="card">
											<header class="card-header">
												<h2 class="card-title">Formulario de Edicion Usuario</h2>
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
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="ST_NOME">Primer Nombre <strong>*</strong></label>
															<input type="text" id="ST_NOME" class="form-control">
														</div>
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="ND_NOME">Segundo Nombre <strong>*</strong></label>
															<input type="text" id="ND_NOME" class="form-control">
														</div>														
													</div>
													<div class="form-row">
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="ST_APEE">Primer Apellido <strong>*</strong></label>
															<input type="text" id="ST_APEE" class="form-control">
														</div>
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="ND_APEE">Segundo Apellido <strong>*</strong></label>
															<input type="text" id="ND_APEE" class="form-control">
														</div>														
													</div>
													<div class="form-row">
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="TELEFONOE">Teléfono <strong>*</strong></label>
															<input type="text" id="TELEFONOE" class="form-control" maxlength="10">
														</div>
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="EMAILE">Email <strong>*</strong></label>
															<input type="text" id="EMAILE" class="form-control">
														</div>														
													</div>
													<div class="form-row">
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="IDE">Identificacion <strong>*</strong></label>
															<input type="text" id="IDE" class="form-control" readonly>
														</div>													
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="PERFILE">Tipo Usuario <strong>*</strong></label>
															<select id="PERFILE" class="form-control">		
																<option value="Seleccione...">Seleccione...</option>
																<option value="Admin">Administrador</option>
																<option value="Caja">Cajero/a</option>
															</select>
														</div>
													</div>

												</form>
											</div>
											<input type="hidden" id="confirmer" value="0">
											<footer class="card-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														<button class="btn btn-primary modal-confirm" id="editUser" >Editar</button>
														<button class="btn btn-default modal-dismiss" >Cancelar</button>
													</div>
												</div>
											</footer>
										</section>
									</div>

					<!-- start: page -->
                                    <header class="card-header" style="padding:30px !important">
                                        <a class="modal-with-form btn btn-primary" href="#modalForm1" style="float:right"><i class="fas fa-plus-circle"></i> Agregar</a>
										<h2 class="card-title">Usuarios</h2>
                                    </header>
									
									<div class="card-body">
										<table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
											<thead>
												<tr>
													<th>Identificacion</th>
													<th>Nombre</th>
													<th>Telefono</th>
													<th>Email</th>
													<th>Tipo</th>
													<th>Estado</th>
													<th>Opciones</th>
												</tr>
											</thead>
											<tbody>
                                                    <?php foreach($users as $user){ ?>
                                                    <tr id="<?php echo $user->identyUser; ?>">
													<td><?php echo $user->identyUser; ?></td>
													<td><?php echo $user->ST_NOM." ".$user->ND_NOM." ".$user->ST_APE." ".$user->ND_APE; ?></td>
													<td><?php echo $user->TELEFONO;?></td>
													<td><?php echo $user->EMAIL;?></td>
													<td><?php echo $user->PERFIL;?></td>
													<td><?php echo ($user->ESTADO_USER==1) ? 'Activo' : 'Inactivo' ;?></td>
													<td><a href="#modalForm2" class="modal-with-form btn btn-primary  edit-user"><i class="fas fa-pen"></i> Editar</a></td>
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
		
		<!-- Listado con ajax -->
		<script>

			$('#department').on('change',function(){
				id = $('#department').val();
				getCity(id);
			});

			function getCity(id) {				
				$.ajax({
					url:'?controller=city&method=getList&id='+id,
					type:'GET',
					success:function(response){
						console.log(response);
						let datas = JSON.parse(response);
						
						let template = '<option value="seleccione">Seleccione...</option>';
						datas.forEach(data=>{
							template += `
						<option value='${data.id}'>${data.nombre}</option>
						`
						})
						$('#city').html(template);
					}
				});
			}

			$('.edit-user').click(function(){
				let element = $(this)[0].parentElement.parentElement;
				let id = $(element).attr('id');
				$.ajax({
					url:'?controller=person&method=getDataById',
					type:'POST',
					data: 'identyUser='+id,
					success:function(response){
						var data = $.parseJSON(response);
						$('#ST_NOME').val(data[0]['ST_NOM']);
						$('#ND_NOME').val(data[0]['ND_NOM']);
						$('#ST_APEE').val(data[0]['ST_APE']);
						$('#ND_APEE').val(data[0]['ND_APE']);
						$('#TELEFONOE').val(data[0]['TELEFONO']);
						$('#EMAILE').val(data[0]['EMAIL']);
						$('#IDE').val(data[0]['identyUser']);
						$('#PERFILE').val(data[0]['PERFIL']);
					}
				})
			});
		</script>