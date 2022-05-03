
    <style>
        .dataTables_wrapper .dataTables_filter input{width:80% !important}
        /* .modal-block{text-align:center} */
    </style>
				<div class="inner-wrapper" style="padding:0px !important">	
				<section role="main" class="content-body">
					<header class="page-header">
					<h2>Lista Proveedores</h2>
					
						<div class="right-wrapper text-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fas fa-home"></i>
									</a>
								</li>
								<li><span>Inventario</span></li>
								<li><span>Compras</span></li>
                                <li><span>Proveedores</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
                                    <header class="card-header" style="padding:30px !important">
                                        <a class="modal-with-form btn btn-primary" href="#modalForm" style="float:right"><i class="fas fa-plus-circle"></i> Agregar</a>
										<h2 class="card-title">Proveedores</h2>
                                    </header>

									<div class="card-body">
										<table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
											<thead>
												<tr>
													<th>#</th>
													<th>Nombre</th>
													<th>NIT</th>
													<th>Telefono</th>
                                                    <th>Nombre Contacto</th>
													<th>Telefono Contacto</th>
													<th>Opciones</th>
												</tr>
											</thead>
											<tbody>
                                                    <?php 
                                                    $count=1;
                                                    foreach($providers as $provider){ ?>
                                                    <tr id="<?php echo $provider->ID_PROVEEDOR ?>">
													<td><?php echo $count; ?></td>
													<td><?php echo $provider->PROVEEDOR?></td>
													<td><?php echo $provider->NIT?></td>
													<td><?php echo $provider->TELEFONO?></td>
                                                    <td><?php echo $provider->CONTACTO?></td>
													<td><?php echo $provider->TEL_CONTACTO;?></td>
													<td><a class="btn btn-danger inactivate-provider" href="#" style="color:white"><i class="fas fa-times"></i> Eliminar</a></td>
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
									<div id="modalForm" class="modal-block modal-block-primary mfp-hide">
										<section class="card">
											<header class="card-header">
												<h2 class="card-title">Formulario de Registro Proveedor</h2>
											</header>
											<div class="card-body">
													<div class="row">
                                                        <div class="alert alert-info" style="width:100%;text-align:center">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                            <strong>Estimado usuario</strong>, los campos marcados con <strong style="color:red">*</strong> son obligatorios.
                                                        </div>

                                                        <div class="alert alert-danger" id="alertif" style="display:none;width:100%;text-align:center">
                                                            <strong>Oh que mal!</strong> Aun hay espacios por completar.
                                                        </div>
														<div class="col-md-12">
															<label for="NOMBRE">Nombre <strong style="color:red">*</strong></label>
															<input type="text" class="form-control" id="NOMBRE" name="NOMBRE" placeholder="Nombre" required>
														</div>
													</div>
													<div class="row">
                                                        <div class="col-md-6">
                                                            <label for="NIT">NIT <strong style="color:red">*</strong></label>
                                                            <input type="text" id="NIT" class="form-control" placeholder="NIT">
                                                        </div>
                                                        <div class="col-md-6 mb-3 mb-lg-0">
                                                            <label for="TELEFONO">Teléfono <strong style="color:red">*</strong></label>
															<input type="text" name="TELEFONO" id="TELEFONO" class="form-control" placeholder="Telefono" required>
                                                        </div>
													</div>
													<div class="row">
														<div class="col-md-6">
															<label for="CONTACTO">Nombre Contacto</label>
															<input type="text" class="form-control" id="CONTACTO" name="CONTACTO" placeholder="Contacto" required>
														</div>
                                                        <div class="col-md-6">
															<label for="TEL_CONTACTO">Teléfono Contacto</label>
															<input type="text" class="form-control" id="TEL_CONTACTO" name="TEL_CONTACTO" placeholder="Telefono Contacto" required>
														</div>
													</div>
													
													<br>
                                                <div id="ver" class="center" style="margin:0 auto">

                                                </div>
												<input type="hidden" id="confirmer" value="0">
											</div>
											<footer class="card-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														<button class="btn btn-primary modal-confirm" id="createProvider">Crear</button>
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


		</section>	

		<!-- Examples -->
		<!-- <script src="Assets/js/examples/examples.notifications.js"></script> -->
		<script src="Assets/js/examples/examples.modals.js"></script>
		
		<!-- Listado con ajax -->

        <script>
            $(document).on('click','.inactivate-provider',function(){
						let element = $(this)[0].parentElement.parentElement;
						let id = $(element).attr('id');
                        $.ajax({
							type: 'POST',
							url: '?controller=inventory&method=inactivateProvider',
							data: 'ID_PROVEEDOR='+id,
							success: function(data){
								if (data=='true') {
									new PNotify({
										title: 'Confirmado!',
										text: 'Proveedor Desactivado Exitosamente.', 
										type: 'success'
									});
									setTimeout(() => {
									location.reload();	
									}, 2000);	
								} else {
									$.magnificPopup.close();	
									new PNotify({
										title: 'Rechazado!',
										text: 'Hubo un error al desactivar el proveedor',
										type: 'error',
										shadow: true
									});	
								}
							}
						});
					});
        </script>
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