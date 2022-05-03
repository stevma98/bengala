
    <style>
        .dataTables_wrapper .dataTables_filter input{width:80% !important}
    </style>
				<div class="inner-wrapper" style="padding:0px !important">
				<section role="main" class="content-body">
					<header class="page-header">
					<h2>Kardex de Inventario</h2>
					
						<div class="right-wrapper text-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fas fa-home"></i>
									</a>
								</li>
								<li><span>Inventario</span></li>
								<li><span>Kardex de Inventario</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
                                    <header class="card-header" style="padding:30px !important">
                                    <button type="button" class="btn btn-primary dropdown-toggle pull-right" data-toggle="dropdown"><i class="fas fa-pencil-alt"></i> Agregar Movimiento </button>
                                        <div class="dropdown-menu" role="menu" style="min-width:12% !important">
                                            <a class="modal-with-form dropdown-item text-1" href="#modalForm1"><i class="fas fa-hand-point-left"></i> Registrar Entrada</a>
                                            <a class="modal-with-form dropdown-item text-1" href="#modalForm2"><i class="fas fa-hand-point-right"></i> Registrar Salida</a>
                                        </div>
										<h2 class="card-title">Kardex</h2>
                                    </header>
									<div class="card-body">
										<table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
											<thead>
												<tr>
													<th>No</th>
													<th>Producto</th>
													<th>Saldo Inicial</th>
													<th>Entradas</th>
													<th>Salidas</th>
													<th>Saldo</th>
												</tr>
											</thead>
											<tbody>
                                                    <?php
                                                    $count=1;
                                                    foreach($products as $product){ ?>
                                                    <tr>
													<td><?php echo $count; ?></td>
													<td><?php echo $product->NOM_PRO; ?></td>
													<td><?php echo $product->CANTIDAD?></td>
													<td><?php echo $product->ENTRADAS_PRO ?></td>
													<td><?php echo $product->SALIDAS_PRO?></td>
                                                    <td><?php echo $product->STOCK?></td>
                                                    </tr>
                                                    <?php 
                                                    $count+=1;
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
												<h2 class="card-title">Formulario de Registro Entrada</h2>
											</header>
											<div class="card-body">
												<form>
													<div class="form-row">
                                                    <div class="alert alert-info" style="width:100%;text-align:center">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                            <strong>Estimado usuario</strong>, los campos marcados con <strong style="color:red">*</strong> son obligatorios.
                                                        </div>
													<div class="alert alert-danger" id="alertif" style="display:none;width:100%;text-align:center">
														<strong>Oh que mal!</strong> Aun hay espacios por completar.
													</div>
													</div>
													<div class="form-row">
														<div class="col-md-12 mb-6 mb-lg-0">
                                                            <label for="CODIGO_PRODUCTO">Producto <strong style="color:red">*</strong></label>
                                                            <select name="CODIGO_PRODUCTO" id="CODIGO_PRODUCTO" class="form-control">
                                                                <option value="Seleccione...">Seleccione...</option>
                                                                <?php foreach ($products as $product) {?>
                                                                    <option value="<?php echo $product->ID_PRO ?>"><?php echo $product->NOM_PRO ?></option>
                                                                <?php } ?>
                                                            </select>
														</div>
													</div>
                                                    <div class="row">
                                                        <div class="col-md-6 mb-6 mb-lg-0">
                                                            <label for="MOTIVO">Motivo <strong style="color:red">*</strong></label>
                                                            <select name="MOTIVO" id="MOTIVO" class="form-control">
                                                                <option value="Seleccione...">Seleccione...</option>
                                                                <option value="POR INVENTARIO INICIAL">POR INVENTARIO INICIAL</option>
                                                                <option value="POR AJUSTE INVENTARIO">POR AJUSTE INVENTARIO</option>
                                                                <option value="POR CANJE DE PROVEEDOR">POR CANJE DE PROVEEDOR</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6 mb-6 mb-lg-0">
                                                        <label for="CANTIDAD">Cantidad Movimiento <strong style="color:red">*</strong></label>
                                                            <input type="number" class="form-control" id="CANTIDAD" min=0 value=0>
                                                        </div>
                                                    </div>													
												</form>
											</div>
											<input type="hidden" id="confirmer" value="0">
											<footer class="card-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														<button class="btn btn-primary modal-confirm" id="addInput" >Guardar</button>
														<button class="btn btn-default modal-dismiss" >Cancelar</button>
													</div>
												</div>
											</footer>
										</section>
									</div>

                                    <div id="modalForm2" class="modal-block modal-block-primary mfp-hide">
										<section class="card">
											<header class="card-header">
												<h2 class="card-title">Formulario de Registro Salida</h2>
											</header>
											<div class="card-body">
												<form>
													<div class="form-row">
                                                    <div class="alert alert-info" style="width:100%;text-align:center">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                            <strong>Estimado usuario</strong>, los campos marcados con <strong style="color:red">*</strong> son obligatorios.
                                                        </div>
													<div class="alert alert-danger" id="alertif" style="display:none;width:100%;text-align:center">
														<strong>Oh que mal!</strong> Aun hay espacios por completar.
													</div>
													</div>
													<div class="form-row">
														<div class="col-md-12 mb-6 mb-lg-0">
                                                            <label for="CODIGO_PRODUCTOS">Producto <strong style="color:red">*</strong></label>
                                                            <select name="CODIGO_PRODUCTOS" id="CODIGO_PRODUCTOS" class="form-control">
                                                                <option value="Seleccione...">Seleccione...</option>
                                                                <?php foreach ($products as $product) {?>
                                                                    <option value="<?php echo $product->ID_PRO ?>"><?php echo $product->NOM_PRO ?></option>
                                                                <?php } ?>
                                                            </select>
														</div>
													</div>
                                                    <div class="row">
                                                        <div class="col-md-6 mb-6 mb-lg-0">
                                                            <label for="MOTIVOS">Motivo <strong style="color:red">*</strong></label>
                                                            <select name="MOTIVOS" id="MOTIVOS" class="form-control">
                                                                <option value="Seleccione...">Seleccione...</option>
                                                                <option value="POR INVENTARIO INICIAL">POR INVENTARIO INICIAL</option>
                                                                <option value="POR AJUSTE INVENTARIO">POR AJUSTE INVENTARIO</option>
                                                                <option value="POR CANJE DE PROVEEDOR">POR CANJE DE PROVEEDOR</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6 mb-6 mb-lg-0">
                                                        <label for="CANTIDADS">Cantidad Movimiento <strong style="color:red">*</strong></label>
                                                            <input type="number" class="form-control" id="CANTIDADS" min=0 value=0>
                                                        </div>
                                                    </div>													
												</form>
											</div>
											<input type="hidden" id="confirmer" value="0">
											<footer class="card-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														<button class="btn btn-primary modal-confirm" id="addOutput" >Guardar</button>
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