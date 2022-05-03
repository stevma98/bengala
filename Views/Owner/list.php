
    <style>
        .dataTables_wrapper .dataTables_filter input{width:80% !important}
		strong{color:red}
    </style>
				<div class="inner-wrapper" style="padding:0px !important">
				<section role="main" class="content-body">
					<header class="page-header">
					<h2>Lista Propietarios</h2>
					
						<div class="right-wrapper text-right">
							<ol class="breadcrumbs">
								<li>
									<a href="?controller=person&method=dashboard">
										<i class="fas fa-home"></i>
									</a>
								</li>
								<li><span>Propietarios</span></li>
								<li><span>Listar</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
                                    <header class="card-header" style="padding:30px !important">
                                        <a class="modal-with-form btn btn-primary" href="#modalForm" style="float:right"><i class="fas fa-plus-circle"></i> Agregar</a>
										<h2 class="card-title">Propietarios</h2>
                                    </header>
                                    
									<div class="card-body">
										<table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
											<thead>
												<tr>
													<th>#</th>
													<th>Identificacion</th>
													<th>Nombre</th>
													<th>Telefono</th>
													<th>Opciones</th>
												</tr>
											</thead>
											<tbody id="prueba">
                                                    <?php 
													$count=0;
													foreach($owners as $owner){ 
													$count+=1;	
													?>
                                                    <tr>
													<td><?=$count; ?></td>
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
						
									<!-- Modal Form -->
									<div id="modalForm" class="modal-block modal-block-primary mfp-hide">
										<section class="card">
											<header class="card-header">
												<h2 class="card-title">Registro Propietario</h2>
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
														<div class="col-md-6">
															<label for="idOwner">Identificacion <strong>*</strong></label>
															<input type="text" class="form-control" id="idOwner" name="idOwner" placeholder="EJ: 159374682" required>
														</div>
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="document">Tipo Documento <strong>*</strong></label>
                                                            <select name="document" id="document" class="form-control" placeholder="EJ: Cedula de .." required>
                                                                <option value="CC" Selected>Cedula de Ciudadania</option>
                                                                <option value="TI">Tarjeta de Identidad</option>
                                                                <option value="PSPT">Pasaporte</option>
                                                            </select>
														</div>
													</div>
													<div class="form-row">
                                                        <div class="col-md-6">
                                                            <label for="firstName">Primer Nombre <strong>*</strong></label>
                                                            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Ej: Peter" required>
                                                        </div>
                                                        <div class="col-md-6 mb-3 mb-lg-0">
                                                            <label for="secondName">Segundo Nombre </label>
                                                            <input type="text" class="form-control" id="secondName" placeholder="Ej: Jhon" name="secondName">
                                                        </div>
													</div>
													<div class="form-row">
                                                        <div class="col-md-6">
															<label for="firstLn">Primer Apellido <strong>*</strong></label>
															<input type="text" class="form-control" id="firstLn" name="firstLn" required placeholder="Ej: Doe">
														</div>
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="secondLn">Segundo Apellido</label>
															<input type="text" class="form-control" id="secondLn" name="secondLn" placeholder="Ej: Rings">
														</div>
													</div>
                                                    <div class="form-row">
                                                        <div class="col-md-6">
															<label for="department">Departamento <strong>*</strong></label>
															<select name="department" id="department" class="form-control" placeholder="Ej: Tolima" required>
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
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="city">Ciudad <strong>*</strong></label>
															<select name="city" id="city" class="form-control" placeholder="Ej: Ibague">
                                                                
                                                            </select>
														</div>
													</div>
                                                    <div class="form-row">
                                                    <div class="col-md-6">
															<label for="addres">Direccion <strong>*</strong></label>
															<input type="text" class="form-control" id="addres" name="addres" required placeholder="Ej: Calle 98A 32-15">
														</div>
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="phone">Telefono <strong>*</strong></label>
															<input type="text" class="form-control" id="phone" name="phone" required placeholder="Ej: 3153286595">
														</div>
													</div>
                                                    <div class="form-row">
                                                    <div class="col-md-6">
															<label for="phone2">Telefono Alternativo</label>
															<input type="text" class="form-control" id="phone2" name="phone2" placeholder="Ej: 3256984561">
														</div>
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="email">Correo Electronico <strong>*</strong></label>
															<input type="text" class="form-control" id="email" name="email" required placeholder="Ej: correo@outlook.com">
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