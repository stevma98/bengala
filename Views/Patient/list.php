
    <style>
        .dataTables_wrapper .dataTables_filter input{width:80% !important}
        .modal-block{text-align:center}
    </style>
				<div class="inner-wrapper" style="padding:0px !important">	
				<section role="main" class="content-body">
					<header class="page-header">
					<h2>Lista Pacientes</h2>
					
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
                                        <a class="modal-with-form btn btn-primary" href="#modalForm" style="float:right">Agregar</a>
										<h2 class="card-title">Pacientes</h2>
                                    </header>
                                    
								<div class="card-body">									
									<!-- Modal Form -->
									
									<div class="card-body">
										<table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
											<thead>
												<tr>
													<th>Id Interno</th>
													<th>Nombre</th>
													<th>Raza</th>
													<th>Color</th>
                                                    <th>Nombre Propietario</th>
													<th>Telefono</th>
													<th>Opciones</th>
												</tr>
											</thead>
											<tbody>
                                                    <?php foreach($patients as $patient){ ?>
                                                    <tr>
													<td><?php echo $patient->ID_MASCOTA; ?></td>
													<td><?php echo $patient->NOMBRE?></td>
													<td><?php echo $patient->RAZA?></td>
													<td><?php echo $patient->COLOR?></td>
                                                    <td><?php echo $patient->DUENO?></td>
													<td><?php echo $patient->TEL_DUENO;?></td>
													<td><a href="?controller=patient&method=profilePatient&id=<?php echo $patient->ID_MASCOTA; ?>" class="btn btn-primary"><i class="fas fa-eye"></i> Ver Perfil</a></td>
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
									<a class="modal-with-form btn btn-default" href="#modalForm">Open Form</a>

									<!-- Modal Form -->
									<div id="modalForm" class="modal-block modal-block-primary mfp-hide">
										<section class="card">
											<header class="card-header">
												<h2 class="card-title">Formulario de Registro</h2>
											</header>
											<div class="card-body">
												<form id="form" enctype="multipart/form-data" method="POST" onsubmit="upload(this);return false">
													<div class="form-row">
													<div class="alert alert-danger" id="alertif" style="display:none;width:100%;text-align:center">
														<strong>Oh que mal!</strong> Aun hay espacios por completar.
													</div>
														<div class="form-group col-md-6">
															<label for="NOMBRE">Nombre:</label>
															<input type="text" class="form-control" id="NOMBRE" name="NOMBRE" placeholder="Nombre" required>
														</div>
														<div class="form-group col-md-6 mb-3 mb-lg-0">
															<label for="SEXO">Sexo:</label>
                                                            <select name="SEXO" id="SEXO" class="form-control" placeholder="Sexo" required>
                                                                <option Selected value="Seleccione...">Seleccione...</option>
                                                                <option value="Hembra">Hembra</option>
																<option value="Hembra Esterilizada">Hembra Esterelizada</option>
                                                                <option value="Macho">Macho</option>
																<option value="Macho Castrado">Macho Castrado</option>
                                                            </select>
														</div>
													</div>
													<div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="TIPO">Tipo:</label>
                                                            <select name="TIPO" id="TIPO" class="form-control" placeholder="Tipo" required>
                                                                <option Selected value="Seleccione...">Seleccione...</option>
																<option value="Canino">Canino</option>
                                                                <option value="Felino">Felino</option>
                                                                <option value="Silvestre">Silvestre</option>
																<option value="Otros">Otros</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6 mb-3 mb-lg-0">
                                                            <label for="RAZA">Raza:</label>
															<input type="text" name="RAZA" id="RAZA" class="form-control" placeholder="Raza" required>
                                                        </div>
													</div>
													<div class="form-row">
														<div class="form-group col-md-6">
															<label for="COLOR">Color:</label>
															<input type="text" class="form-control" id="COLOR" name="COLOR" placeholder="Color" required>
														</div>
                                                        <div class="form-group col-md-6">
															<label for="FEC_NAC">Fecha Nacimiento:</label>
															<input type="date" class="form-control" id="FEC_NAC" name="FEC_NAC" placeholder="Fecha Nacimiento" required>
														</div>
													</div>
													<input type="hidden" value="<?php echo $_SESSION['user']->ID_EMPRESA; ?>" id="idEmp">
													<div class="form-row">
														<div class="form-group col-md-12">
                                                            <label for="DUENO">Dueño:</label>
                                                            <select name="DUENO" id="DUENO" class="form-control" placeholder="Dueño" required>
                                                                <option Selected value="Seleccione...">Seleccione...</option>
                                                                <?php 
																	foreach ($owners as $owner) {
																		?>
																			<option value="<?php echo $owner->ID_PROP ?>"><?php echo $owner->ST_NOM." ".$owner->ND_NOM." ".$owner->ST_APE." ".$owner->ND_APE ?></option>
																		<?php
																	}
																?>
                                                            </select>
														</div>
													</div>
													<br>
                                                <div id="ver" class="center" style="margin:0 auto">

                                                </div>
                                                    <div class="form-group row">
												<label class="col-lg-6 center control-label text-lg-right pt-2 ">Cargar Foto Paciente</label>
												<div class="col-lg-12 center">
													<div class="fileupload fileupload-new" data-provides="fileupload">
														<div class="input-append">
															<div class="uneditable-input">
																<span class="fileupload-preview"></span>
															</div>
															<span class="btn btn-default btn-file">
																<span class="fileupload-exists">Cambiar</span>
																<span class="fileupload-new">Seleccione Imagen</span>
																<input type="file" id="file" />
															</span>
														</div>
													</div>
												</div>
												<input type="hidden" id="confirmer" value="0">
                                                
                                        
											</div>
												</form>
											</div>
											<footer class="card-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														<button class="btn btn-primary modal-confirm" id="createPatient">Crear</button>
														<button class="btn btn-default modal-dismiss" >Cancelar</button>
													</div>
												</div>
											</footer>
										</section>
									</div>
																
									<iframe src="?controller=patient&method=uploadImage" frameborder="0" height="100" width="400" name="iframe"></iframe>
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
			
			$('#department').on('change',function(){
				id = $('#department').val();
				getCity(id);
			});

            $('#file').change(function(){
              filePreview(this);
            });

            function filePreview(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.readAsDataURL(input.files[0]);
                    reader.onload = function (e) {
                        $('#ver + img').remove();
                        $('#ver').after('<img src="'+e.target.result+'" width="150" height="150"/>');
                    }					
                }
            }

			function getCity(id) {
				console.log(id);
				$.ajax({
					url:'?controller=owner&method=getCities&id='+id,
					type:'GET',
					success:function(response){
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