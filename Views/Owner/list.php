
    <style>
        .dataTables_wrapper .dataTables_filter input{width:80% !important}
    </style>
				<div class="inner-wrapper" style="padding:0px !important">
				<section role="main" class="content-body">
					<header class="page-header">
					<h2>Lista Propietarios</h2>
					
						<div class="right-wrapper text-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fas fa-home"></i>
									</a>
								</li>
								<li><span>Propietarios</span></li>
								<li><span>Lista</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
                                    <header class="card-header" style="padding:30px !important">
                                        <a class="modal-with-form btn btn-primary" href="#modalForm" style="float:right">Agregar</a>
										<h2 class="card-title">Propietarios</h2>
                                    </header>
                                    
								<div class="card-body">									
									<!-- Modal Form -->
									
									<div class="card-body">
										<table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
											<thead>
												<tr>
													<th>Identificacion</th>
													<th>Nombre</th>
													<th>Telefono</th>
													<th>Opciones</th>
												</tr>
											</thead>
											<tbody id="prueba">
                                                    <?php foreach($owners as $owner){ ?>
                                                    <tr>
													<td><?php echo $owner->ID_PROP; ?></td>
													<td><?php echo $owner->ST_NOM." ".$owner->ST_APE; ?></td>
													<td><?php echo $owner->TELEFONO;?></td>
													<td><a href="?controller=owner&method=profileOwner&id=<?php echo $owner->ID_PROP; ?>" class="btn btn-primary"><i class="fas fa-eye"></i> Ver Perfil</a></td>
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
									<a class="modal-with-form btn btn-default" href="#modalForm">Open Form</a>

									<!-- Modal Form -->
									<div id="modalForm" class="modal-block modal-block-primary mfp-hide">
										<section class="card">
											<header class="card-header">
												<h2 class="card-title">Formulario de Registro</h2>
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
																<option selected value="seleccione">Seleccione...</option>
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
															<input type="hidden" id="confirmer" value="0">
														</div>
													</div>
													<input type="hidden" value="<?php echo $_SESSION['user']->ID_EMPRESA; ?>" id="idEmp">
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
						$('#prueba').html(template);
						console.log(response);
					}
				});
	}
		</script> -->
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
		</script>