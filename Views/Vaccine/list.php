
    <style>
        .dataTables_wrapper .dataTables_filter input{width:80% !important}
    </style>
				<div class="inner-wrapper" style="padding:0px !important">
				<section role="main" class="content-body">
					<header class="page-header">
					<h2>Lista Registro Vacunas</h2>
					
						<div class="right-wrapper text-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fas fa-home"></i>
									</a>
								</li>
								<li><span>Vacunas</span></li>
								<li><span>Listar</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
                                    <header class="card-header" style="padding:30px !important">
										<a class="modal-with-form btn btn-primary" href="#modalForm1" style="float:right;margin-left:5px">Registrar</a>
										<h2 class="card-title">Registro Vacunas</h2>
                                    </header>
                                    
								<div class="card-body">									
									<!-- Modal Form -->
									
									<div class="card-body">
										<table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
											<thead>
												<tr>
													<th>No</th>
													<th>Paciente</th>
													<th>Fecha Vacuna</th>
													<th>Vacuna</th>
													<th>Dosis</th>
													<th>Lote</th>
													<th>Proxima</th>
													<th>Proxima Vacuna</th>
													<th>Vencimiento</th>
													<th>Detalle</th>
													<th>Opciones</th>
												</tr>
											</thead>
											<tbody>
                                                    <?php foreach($Vaccines as $Vaccine){ ?>
                                                    <tr>
													<td><?php echo $Vaccine->ID_VACUNA_PRO; ?></td>
													<td><?php echo $Vaccine->NOMBRE; ?></td>
													<td><?php echo $Vaccine->FEC_VACUNA; ?></td>
													<td><?php echo $Vaccine->NOMBRE_VACUNA; ?></td>
													<td><?php echo $Vaccine->DOSIS." ".$Vaccine->PRESENTACION; ?></td>
													<td><?php echo $Vaccine->LOTE; ?></td>
													<td><?php echo $Vaccine->FECHA_SIG_VACUNA; ?></td>
													<td><?php echo $Vaccine->PROXIMA_VACUNA; ?></td>
													<td><?php echo $Vaccine->VENCIMIENTO; ?></td>
													<td><?php echo $Vaccine->DETALLE; ?></td>
													<?php if ($Vaccine->ESTADO_VACUNA=='No Aplicada') { ?>
														<td><a href="?controller=patient&method=profilePatient&id=<?php echo $Vaccine->ID_MASCOTA; ?>" class="btn btn-primary"><i class="fas fa-eye"></i> Ver</a> <a href="?controller=patient&method=profilePatient&id=<?php echo $Vaccine->ID_MASCOTA; ?>" class="btn btn-warning"><i class="fas fa-dollar-sign"></i> Pagar</a></td>
													<?php } else { ?>
														<td><a href="?controller=patient&method=profilePatient&id=<?php echo $Vaccine->ID_MASCOTA; ?>" class="btn btn-primary"><i class="fas fa-eye"></i> Ver</a> <a href="#" class="btn btn-success"><i class="fas fa-check"></i> Pagado</a></td>
													<?php } ?>
													
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
												<h2 class="card-title">Formulario de Registro Vacuna</h2>
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
														<div class="col-md-4 mb-3 mb-lg-0">
															<label for="VENCIMIENTO">Vencimiento</label>
															<input type="date" id="VENCIMIENTO" name="VENCIMIENTO" class="form-control" required>
														</div>
														<div class="col-md-4 mb-3 mb-lg-0">
															<label for="FEC_VACUNA">Fecha Vacuna</label>
															<input type="date" id="FEC_VACUNA" name="FEC_VACUNA" class="form-control" required>
														</div>
														<div class="col-md-4 mb-3 mb-lg-0">
															<label for="FECHA_ULT_VACUNA">Fecha Ultima Vacuna</label>
															<input type="date" id="FECHA_ULT_VACUNA" name="FECHA_ULT_VACUNA" class="form-control" required>
														</div>
													</div>
													<div class="form-row">
														<div class="col-md-4 mb-3 mb-lg-0">
															<label for="FECHA_SIG_VACUNA">Fecha Proxima Vacuna</label>
															<input type="date" id="FECHA_SIG_VACUNA" name="FECHA_SIG_VACUNA" class="form-control" required>															
														</div>
														<div class="col-md-4 mb-3 mb-lg-0">
															<label for="PROXIMA_VACUNA">Proxima Vacuna</label>
															<select name="PROXIMA_VACUNA" id="PROXIMA_VACUNA" class="form-control">
																<option value="Seleccione...">Seleccione...</option>
																<?php foreach ($vaccinesI as $vaccineI) {?>
																	<option value="<?php echo $vaccineI->NOMBRE_VACUNA ?>"><?php echo $vaccineI->NOMBRE_VACUNA ?></option>
																<?php } ?>
															</select>
														</div>
														<div class="col-md-4 mb-3 mb-lg-0">
															<label for="PRECIO_VACUNA">Precio</label>
															<input type="text" id="PRECIO_VACUNA" name="PRECIO_VACUNA" class="form-control">
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
		<script src="Assets/vendor/summernote/summernote-bs4.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
		
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
			
		$('#PRECIO_VACUNA').mask('#.##0', {reverse: true});
		
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