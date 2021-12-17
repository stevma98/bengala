
    <style>
        .dataTables_wrapper .dataTables_filter input{width:80% !important}
    </style>
				<div class="inner-wrapper" style="padding:0px !important">
				<section role="main" class="content-body">
					<header class="page-header">
					<h2>Lista Vacunas</h2>
					
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
                                        <a class="modal-with-form btn btn-primary" href="#modalForm1" style="float:right">Agregar</a>
										<h2 class="card-title">Vacunas</h2>
                                    </header>
                                    
								<div class="card-body">									
									<!-- Modal Form -->
									
									<div class="card-body">
										<table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
											<thead>
												<tr>
													<th>ID</th>
													<th>Nombre</th>
													<th>Presentacion</th>
													<th>Opciones</th>
												</tr>
											</thead>
											<tbody>
                                                    <?php foreach($vaccines as $vaccine){ ?>
                                                    <tr Id=<?php echo $vaccine->ID_VACUNA ?>>
													<td><?php echo $vaccine->ID_VACUNA; ?></td>
													<td><?php echo $vaccine->NOMBRE_VACUNA?></td>
													<td><?php echo $vaccine->PRESENTACION;?></td>
													<td><a href="#modalFormEdit" class="modal-with-form btn btn-primary idEdit" ><i class="fas fa-edit"></i> Editar</a></td>
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
									<a class="modal-with-form btn btn-default" href="#modalForm1">Open Form</a>

									<!-- Modal Form -->
									<div id="modalForm1" class="modal-block modal-block-primary mfp-hide">
										<section class="card">
											<header class="card-header">
												<h2 class="card-title">Formulario de Registro Vacuna</h2>
											</header>
											<div class="card-body">
												<form>
													<div class="form-row">
													<div class="alert alert-danger" id="alertif" style="display:none;width:100%;text-align:center">
														<strong>Oh que mal!</strong> Aun hay espacios por completar.
													</div>
                                                        <div class="col-md-6 mb-3 mb-lg-0">
															<label for="NOMBRE_VACUNA">Nombre</label>
															<input type="text" id="NOMBRE_VACUNA" name="NOMBRE_VACUNA" class="form-control" required>
														</div>
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="PRESENTACION">Dosis</label>
															<select name="PRESENTACION" id="PRESENTACION" class="form-control">
                                                                <option value="Seleccione...">Seleccione...</option>
                                                                <option value="Ol">Ol</option>
                                                                <option value="Gr">Gr</option>
                                                                <option value="Dosis">Dosis</option>
                                                            </select>
														</div>	
													</div>
                                                    <input type="hidden" id="confirmer" value="0">
													<!-- <div class="form-row">
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="FECHA_SIG">Fecha Proxima Vacuna</label>
															<input type="date" id="FECHA_SIG" name="FECHA_SIG" class="form-control" required>
														</div>
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="PROXIMA_VACUNA">Proxima Vacuna</label>
															<select name="PROXIMA_VACUNA" id="PROXIMA_VACUNA" class="form-control" required>
																	<option value="Seleccione">Seleccion...</option>
																	<option value="11">11</option>
																	<option value="22">22</option>
																	<option value="33">33</option>
															</select>
														</div>
													</div> -->
												</form>
											</div>
											<footer class="card-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														<button class="btn btn-primary modal-confirm" id="createVaccine" >Crear</button>
														<button class="btn btn-default modal-dismiss" >Cancelar</button>
													</div>
												</div>
											</footer>
										</section>
									</div>

								</div>

                                <div class="card-body">
									<a class="modal-with-form btn btn-default" href="#modalFormEdit">Open Form</a>

									<!-- Modal Form -->
									<div id="modalFormEdit" class="modal-block modal-block-primary mfp-hide">
										<section class="card">
											<header class="card-header">
												<h2 class="card-title">Formulario de Editar Vacuna</h2>
											</header>
											<div class="card-body">
												<form>
													<div class="form-row">
													<div class="alert alert-danger" id="alertif" style="display:none;width:100%;text-align:center">
														<strong>Oh que mal!</strong> Aun hay espacios por completar.
													</div>
                                                        <div class="col-md-6 mb-3 mb-lg-0">
															<label for="NOMBRE_VACUNA_EDIT">Nombre</label>
															<input type="text" id="NOMBRE_VACUNA_EDIT" name="NOMBRE_VACUNA_EDIT" class="form-control" required>
														</div>
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="PRESENTACION_EDIT">Dosis</label>
															<select name="PRESENTACION_EDIT" id="PRESENTACION_EDIT" class="form-control">
                                                                <option value="Seleccione...">Seleccione...</option>
                                                                <option value="Ol">Ol</option>
                                                                <option value="Gr">Gr</option>
                                                                <option value="Dosis">Dosis</option>
                                                            </select>
														</div>	
													</div>
                                                    <input type="hidden" id="ID_VACUNA_EDIT">
                                                    <input type="hidden" id="confirmer" value="0">
													<!-- <div class="form-row">
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="FECHA_SIG">Fecha Proxima Vacuna</label>
															<input type="date" id="FECHA_SIG" name="FECHA_SIG" class="form-control" required>
														</div>
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="PROXIMA_VACUNA">Proxima Vacuna</label>
															<select name="PROXIMA_VACUNA" id="PROXIMA_VACUNA" class="form-control" required>
																	<option value="Seleccione">Seleccion...</option>
																	<option value="11">11</option>
																	<option value="22">22</option>
																	<option value="33">33</option>
															</select>
														</div>
													</div> -->
												</form>
											</div>
											<footer class="card-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														<button class="btn btn-primary modal-confirm" id="editVaccine" >Editar</button>
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
		