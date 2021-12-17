
    <style>
        .dataTables_wrapper .dataTables_filter input{width:80% !important}
    </style>
				<div class="inner-wrapper" style="padding:0px !important">
				<section role="main" class="content-body">
					<header class="page-header">
					<h2>Lista Citas Vacunas</h2>
					
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
										<a class="modal-with-form btn btn-primary" href="#modalForm1" style="float:right;margin-left:5px">Programar</a>
                                        <a class="modal-with-form btn btn-primary" href="#modalForm" style="float:right">Agregar</a>
										<h2 class="card-title">Citas Vacunas</h2>
                                    </header>
                                    
								<div class="card-body">									
									<!-- Modal Form -->
									
									<div class="card-body">
										<table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
											<thead>
												<tr>
													<th>ID</th>
													<th>Paciente</th>
													<th>Dueño</th>
													<th>Nombre Vacuna</th>
													<th>Fecha Aplicada</th>
													<th>Opciones</th>
												</tr>
											</thead>
											<tbody>
                                                    <?php foreach($Vaccines as $Vaccine){ ?>
                                                    <tr>
													<td><?php echo $Vaccine->ID_VACUNA_PRO; ?></td>
													<td><?php echo $Vaccine->NOMBRE; ?></td>
													<td><?php echo $Vaccine->DUENO;?></td>
													<td><?php echo $Vaccine->NOMBRE_VACUNA;?></td>
													<td><?php echo $Vaccine->FEC_VACUNA;?></td>
													<td><a href="?controller=owner&method=profileOwner&id=<?php echo $owner->ID_PROP; ?>" class="btn btn-primary"><i class="fas fa-eye"></i> Ver</a></td>
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
												<h2 class="card-title">Formulario de Registro Cita</h2>
											</header>
											<div class="card-body">
												<form>
													<div class="form-row">
													<div class="alert alert-danger" id="alertif" style="display:none;width:100%;text-align:center">
														<strong>Oh que mal!</strong> Aun hay espacios por completar.
													</div>
														<div class="form-group col-md-6 mb-3 mb-lg-0">
															<label for="ID_PROP">Propietario:</label>
                                                            <select name="ID_PROP" id="ID_PROP" class="form-control" placeholder="Propietario" required>
                                                                <option value="Seleccione..." Selected>Seleccione...</option>
																<?php foreach ($owners as $owner) {?>
																	<option value="<?php echo $owner->ID_PROP ?>"><?php echo $owner->ST_NOM." ".$owner->ND_NOM." ".$owner->ST_APE." ".$owner->ND_APE ?></option>
																<?php } ?>
                                                            </select>
														</div>
														<div class="form-group col-md-6 mb-3 mb-lg-0">
															<label for="ID_MASCOTA">Paciente:</label>
                                                            <select name="ID_MASCOTA" id="ID_MASCOTA" class="form-control" placeholder="Paciente" required>
                                                            </select>
														</div>
													</div>
													<div class="form-row">
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="ID_VACUNA">Vacuna</label>
															<select name="ID_VACUNA" id="ID_VACUNA" class="form-control">
																<option value="Seleccione...">Seleccione...</option>
																<?php foreach ($vaccinesI as $vaccineI) {?>
																	<option value="<?php echo $vaccineI->ID_VACUNA ?>"><?php echo $vaccineI->NOMBRE_VACUNA ?></option>
																<?php } ?>
															</select>
														</div>
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="LOTE">Lote</label>
															<input type="text" id="LOTE" name="LOTE" class="form-control" required>															
														</div>
													</div>
													<div class="form-row">
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="PRESENTACION">Presentacion</label>
															<input type="text" id="PRESENTACION" name="PRESENTACION" class="form-control" value="0" disabled>
														</div>
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="DOSIS">Dosis</label>
															<input type="text" id="DOSIS" name="DOSIS" class="form-control" required>
														</div>														
													</div>
													<div class="form-row">
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="VENCIMIENTO">Vencimiento</label>
															<input type="date" id="VENCIMIENTO" name="VENCIMIENTO" class="form-control" required>
														</div>
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="FEC_VACUNA">Fecha Vacuna</label>
															<input type="date" id="FEC_VACUNA" name="FEC_VACUNA" class="form-control" required>
														</div>
													</div>
													<div class="form-row">
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="FECHA_SIG_VACUNA">Fecha Proxima Vacuna</label>
															<input type="date" id="FECHA_SIG_VACUNA" name="FECHA_SIG_VACUNA" class="form-control" required>															
														</div>
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="PROXIMA_VACUNA">Vacuna</label>
															<select name="PROXIMA_VACUNA" id="PROXIMA_VACUNA" class="form-control">
																<option value="Seleccione...">Seleccione...</option>
																<?php foreach ($vaccinesI as $vaccineI) {?>
																	<option value="<?php echo $vaccineI->ID_VACUNA ?>"><?php echo $vaccineI->NOMBRE_VACUNA ?></option>
																<?php } ?>
															</select>
														</div>
													</div>
													<div class="form-row">
														<div class="col-md-12 mb-6 mb-lg-0">
															<label for="DETALLE">Observaciones</label>
															<textarea class="form-control" rows="2" id="DETALLE" data-plugin-textarea-autosize="" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 60px;"></textarea>
														</div>
																</div>													
												</form>
											</div>
											<input type="hidden" id="confirmer" value="0">
											<footer class="card-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														<button class="btn btn-primary modal-confirm" id="createVaccineAppointment" >Crear</button>
														<button class="btn btn-default modal-dismiss" >Cancelar</button>
													</div>
												</div>
											</footer>
										</section>
									</div>

								</div>

								<div class="card-body">
									<a class="modal-with-form btn btn-default" href="#modalForm">Open Form</a>

									<!-- Modal Form -->
									<div id="modalForm" class="modal-block modal-block-primary mfp-hide">
										<section class="card">
											<header class="card-header">
												<h2 class="card-title">Programar Vacuna</h2>
											</header>
											<div class="card-body">
												<form>
													<div class="form-row">
													<div class="alert alert-danger" id="alertif" style="display:none;width:100%;text-align:center">
														<strong>Oh que mal!</strong> Aun hay espacios por completar.
													</div>
														<div class="form-group col-md-6">
															<label for="idOwner">Identificacion</label>
															<input type="text" class="form-control" id="idOwner" name="idOwner" placeholder="Identificacion" required>
														</div>
														<div class="form-group col-md-6 mb-3 mb-lg-0">
															<label for="document">Tipo Documento:</label>
                                                            <select name="document" id="document" class="form-control" placeholder="tipo Documento" required>
                                                                <option value="CC" Selected>Cedula de Ciudadania</option>
                                                                <option value="TI">Tarjeta de Identidad</option>
                                                                <option value="PSPT">Pasaporte</option>
                                                            </select>
														</div>
													</div>
													<div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="firstName">Primer Nombre:</label>
                                                            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Primer Nombre" required>
                                                        </div>
                                                        <div class="form-group col-md-6 mb-3 mb-lg-0">
                                                            <label for="secondName">Segundo Nombre</label>
                                                            <input type="text" class="form-control" id="secondName" placeholder="Segundo Nombre" name="secondName">
                                                        </div>
													</div>
													<div class="form-row">
                                                        <div class="form-group col-md-6">
															<label for="firstLn">Primer Apellido</label>
															<input type="text" class="form-control" id="firstLn" name="firstLn" required placeholder="Primer Apellido">
														</div>
														<div class="form-group col-md-6 mb-3 mb-lg-0">
															<label for="secondLn">Segundo Apellido</label>
															<input type="text" class="form-control" id="secondLn" name="secondLn" placeholder="Segundo Apellido">
														</div>
													</div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
															<label for="department">Departamento</label>
															<select name="department" id="department" class="form-control" placeholder="Departamento" required>
																<option selected value="seleccione...">Seleccione...</option>
                                                                <?php 
																	foreach ($departament as $departament) {
																		?>
																	<option value="<?php echo $departament->id ?>"><?php echo $departament->nombre ?></option>
																		<?php
																	}
																?>
                                                            </select>
														</div>
														<div class="form-group col-md-6 mb-3 mb-lg-0">
															<label for="city">Ciudad</label>
															<select name="city" id="city" class="form-control">
                                                                
                                                            </select>
														</div>
													</div>
                                                    <div class="form-row">
                                                    <div class="form-group col-md-6">
															<label for="addres">Direccion</label>
															<input type="text" class="form-control" id="addres" name="addres" required placeholder="Direccion">
														</div>
														<div class="form-group col-md-6 mb-3 mb-lg-0">
															<label for="phone">Telefono</label>
															<input type="text" class="form-control" id="phone" name="phone" required placeholder="Telefono">
														</div>
													</div>
                                                    <div class="form-row">
                                                    <div class="form-group col-md-6">
															<label for="phone2">Telefono Alternativo</label>
															<input type="text" class="form-control" id="phone2" name="phone2" placeholder="Telefono Alternativo">
														</div>
														<div class="form-group col-md-6 mb-3 mb-lg-0">
															<label for="email">Correo Electronico</label>
															<input type="text" class="form-control" id="email" name="email" required placeholder="Correo Electronico">
															<!-- <input type="hidden" id="confirmer" value="0"> -->
														</div>
													</div>
												</form>
											</div>
											<footer class="card-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														<button class="btn btn-primary modal-confirm" id="createOwner" >Crear</button>
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
		
		<!-- Listado con ajax -->

		<!-- <script>
			$(document).ready(function(){
				reloadTable();
			});
			function reloadTable() {
				$.ajax({
					url:'?controller=owner&method=getList',
					type:'GET',
					success:function(response){
						console.log(response);
						let datas = JSON.parse(response);
						let template = '';
						datas.forEach(data=>{
							template += `
						<tr >
							<td>${data.ID_PROP}</td>
							<td><a href="#" class="task-item">${data.ST_NOMBRE}</a></td>
							<td>${data.ND_NOMBRE}</td>
							<td>
								<button class="task-delete btn btn-danger">
									Delete
								</button>
							</td>
						</tr>
						`
						})
						$('#datatable-tabletools').html(template);
						console.log(response);
					}
				});
	}
		</script> -->
		<script>

			$('#ID_VACUNA').on('change',function(){
				id = $('#ID_VACUNA').val();
				getPresentation(id);
			});

			function getPresentation(id) {				
				$.ajax({
					url:'?controller=vaccine&method=getPresentation&id='+id,
					type:'GET',
					success:function(response){
						$('#PRESENTACION').val(response);
					}
				});
			}

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
		</script>