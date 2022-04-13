
    <style>
        .dataTables_wrapper .dataTables_filter input{width:80% !important}
    </style>
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
								<li><span>Peluqueria</span></li>
								<li><span>Listar</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
                                    <header class="card-header" style="padding:30px !important">
										<a class="modal-with-form btn btn-primary" href="#modalForm1" style="float:right;margin-left:5px">Registrar</a>
										<h2 class="card-title">Registro Consentimientos</h2>
                                    </header>
                                    
								<div class="card-body">									
									<!-- Modal Form -->
									
									<div class="card-body">
										<table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
											<thead>
												<tr>
													<th>Paciente</th>
													<th>Fecha Corte</th>
													<th>Largo Corte</th>
													<th>Medicado</th>
													<th>Corte de Uñas</th>
													<th>Accesorios</th>
													<th>Observaciones</th>
													<th>Estado</th>
													<th>Opciones</th>
												</tr>
											</thead>
											<tbody>
                                                    <?php foreach($Barbers as $Barber){ ?>
                                                    <tr>
													<td><?php echo $Barber->NOMBRE; ?></td>
													<td><?php echo $Barber->FEC_PELUQUERIA; ?></td>
													<td><?php echo $Barber->TIPO_CORTE; ?></td>
													<td><?php echo $Barber->BANO_MEDICADO; ?></td>
													<td><?php echo $Barber->CORTE_UNAS; ?></td>
													<td><?php echo $Barber->ACCESORIOS; ?></td>
													<td><?php echo $Barber->DETALLE; ?></td>
													<td><?php echo $Barber->ESTADO_PELUQUERIA; ?></td>
													<td><a href="?controller=patient&method=profilePatient&id=<?php echo $Barber->ID_MASCOTA; ?>" class="btn btn-primary"><i class="fas fa-eye"></i> Ver</a></td>
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
												<h2 class="card-title">Formulario de Registro Peluqueria</h2>
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
                                                            <label for="FEC_PELUQUERIA">Fecha Corte </label>
															<input type="date" id="FEC_PELUQUERIA" name="FEC_PELUQUERIA" class="form-control" required>															
														</div>
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="TIPO_CORTE">Tipo Corte</label>
															<select name="TIPO_CORTE" id="TIPO_CORTE" class="form-control" required>
                                                                <option value="Seleccione...">Seleccione...</option>
                                                                <option value="Largo">Largo</option>
                                                                <option value="Medio">Medio</option>
                                                                <option value="Bajo">bajo</option>
                                                            </select>
														</div>
													</div>
													<div class="form-row">
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="ACCESORIOS">Accesorios</label>
															<select name="ACCESORIOS" id="ACCESORIOS" class="form-control" required>
                                                                <option value="Seleccione...">Seleccione...</option>
                                                                <option value="Pañoleta">Pañoleta</option>
                                                                <option value="Camiseta">Camiseta</option>
                                                                <option value="Moño">Moño</option>
                                                                <option value="Corbatin">Corbatin</option>
                                                            </select>
														</div>
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="CORTE_UNAS">Corte de Uñas</label>
															<select name="CORTE_UNAS" id="CORTE_UNAS" class="form-control" required>
                                                                <option value="Seleccione...">Seleccione...</option>
                                                                <option value="Si">Si</option>
                                                                <option value="NO">NO</option>
                                                            </select>
														</div>														
													</div>
                                                    <div class="form-row">
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="BANO_MEDICADO">Baño Medicado</label>
															<select name="BANO_MEDICADO" id="BANO_MEDICADO" class="form-control" required>
                                                                <option value="Seleccione...">Seleccione...</option>
                                                                <option value="Si">Si</option>
                                                                <option value="NO">NO</option>
                                                            </select>
														</div>
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="PRECIO_PELUQUERIA">Precio</label>
															<input type="text" name="PRECIO_PELUQUERIA" id="PRECIO_PELUQUERIA" class="form-control" required>
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
														<button class="btn btn-primary modal-confirm" id="createBarberAppointment" >Crear</button>
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


        $('#PRECIO_PELUQUERIA').mask('#.##0', {reverse: true});
        $('#PRECIO_PELUQUERIA').change(function () {
			    var valor = $(this).val();  
			    $(this).val(valor);
			});	

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