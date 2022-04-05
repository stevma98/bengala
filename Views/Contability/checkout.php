
    <style>
        .dataTables_wrapper .dataTables_filter input{width:80% !important}
    </style>
				<div class="inner-wrapper" style="padding:0px !important">
				<section role="main" class="content-body">
					<header class="page-header">
					<h2>Lista Registro Recibos</h2>
					
						<div class="right-wrapper text-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fas fa-home"></i>
									</a>
								</li>
								<li><span>Contabilidad</span></li>
								<li><span>Verificación</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
					<form class="order-details action-buttons-fixed" method="post">
						<div class="row">
							<div class="col-xl-4 mb-4 mb-xl-0">
                            <?php 
                                        $date=date('Y-m-d');
                            foreach ($datas as $data) {?>

								<div class="card card-modern">
									<div class="card-header">
										<h2 class="card-title">General</h2>
									</div>
									<div class="card-body">
										<div class="form-row">
											<div class="form-group col mb-3">
												<label>Estado</label>
												<input type="text" class="form-control form-control-modern text-center" name="orderTimeHour" value="Pendiente Cerrar" readonly />
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col mb-3">
												<label>Fecha</label>
												<div class="date-time-field">
													<div class="date">
														<input type="text" class="form-control form-control-modern" name="orderDate" value="<?php echo $date ?>" readonly/>
													</div>
												</div>
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col mb-3">
												<label>Paciente</label>
												<input type="text" class="form-control form-control-modern text-center" name="orderTimeHour" value="<?php echo $patient[0]->NOMBRE ?>" readonly />
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-8">
								
								<div class="card card-modern">
									<div class="card-header">
										<h2 class="card-title">Datos</h2>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-xl-auto mr-xl-5 pr-xl-5 mb-4 mb-xl-0">
												<h3 class="text-color-dark font-weight-bold text-4 line-height-1 mt-0 mb-3">Facturación</h3>
												<ul class="list list-unstyled list-item-bottom-space-0">
                                                    <li><?php echo $patient[0]->DUENO ?></li>
													<li><?php echo $data->DIRECCION ?></li>
													<li><?php echo $data->depart ?></li>
													<li><?php echo $data->city ?></li>
													<li>Colombia</li>
												</ul>
												<strong class="d-block text-color-dark">Correo Electrónico:</strong>
												<a href="mailto:<?php echo $data->EMAIL ?>"><?php echo $data->EMAIL ?></a>
												<strong class="d-block text-color-dark mt-3">Teléfono:</strong>
												<a href="tel:+5551234" class="text-color-dark"><?php echo $data->TELEFONO ?></a>
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>
                        <?php } ?>
                        <br>
						<div class="row">
							<div class="col-lg-6">
								<div class="card card-modern">
									<div class="card-header">
										<h2 class="card-title">Procedimientos</h2>
									</div>
                                    
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-ecommerce-simple table-ecommerce-simple-border-bottom table-striped mb-0" style="min-width: 380px;">
												<thead>
													<tr>
														<th width="8%" class="pl-4">#</th>
														<th width="40%">Nombre</th>
                                                        <th width="20%">Realizado</th>
														<th width="15%" class="center">Precio</th>
													</tr>
												</thead>
												<tbody>
                                                    <?php 
                                                    $count=1;
                                                    foreach ($procedures as $procedure) {?>
													<tr>
														<td class="pl-4"><strong><?php echo $count ?></strong></td>
                                                        <?php if ($procedure->TIPO=='Vacuna') {?>
                                                            <td><strong><?php echo $procedure->TIPO." - ".$procedure->NOMBRE_VACUNA ?></strong></td>    
                                                        <?php } else {?>
                                                            <td><strong><?php echo $procedure->TIPO ?></strong></td>
                                                        <?php }
                                                         ?>
                                                        <td class="text-right"><?php echo $procedure->FECHA_ANADIDO ?></td>
														<td class="text-right"><input type="text" class="form-control procedure-price"></td>
														
													</tr>
                                                    <?php $count+=1; } ?>
                                                    
												</tbody>
                                                
											</table>
                                            <div class="text-right"><h3>Total: <span id="total">???</span> </h3></div>
                                            <input type="hidden" id="total1">
										</div>
									</div>
								</div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card card-modern">
									<div class="card-header">
										<h2 class="card-title">Medicamentos/Productos</h2>
                                        <div class="form-group">
														<button type="button" class="btn btn-primary btn-xs mr-2" onclick="agregarFila()">+</button>
														<button type="button" class="btn btn-danger btn-xs" onclick="eliminarFila()">-</button>
														<input type="hidden" value="1" id="num">
													</div>
									</div>
                                    
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-ecommerce-simple table-ecommerce-simple-border-bottom table-striped mb-0" style="min-width: 380px;">
												<thead>
													<tr>
														<th width="8%" class="pl-4">#</th>
														<th width="65%">Nombre</th>
                                                        <th width="10%">Cantidad</th>
														<th width="10%" class="center">Precio</th>
													</tr>
												</thead>
												<tbody>
                                                    <?php 
                                                    $count=1;
                                                    foreach ($procedures1 as $procedure) {?>
													<tr>
														<td class="pl-4"><strong><?php echo $count ?></strong></td>
                                                        <?php if ($procedure->TIPO=='Vacuna') {?>
                                                            <td><strong><?php echo $procedure->TIPO." - ".$procedure->NOMBRE_VACUNA ?></strong></td>    
                                                        <?php } else {?>
                                                            <td><strong><?php echo $procedure->TIPO ?></strong></td>
                                                        <?php }
                                                         ?>
                                                        <td class="text-right"><?php echo $procedure->FECHA_ANADIDO ?></td>
														<td class="text-right"><input type="text" class="form-control procedure-price"></td>
														
													</tr>
                                                    <?php $count+=1; } ?>
                                                    
												</tbody>
                                                
											</table>
                                            <div class="text-right"><h3>Total: <span id="total">???</span> </h3></div>
                                            <input type="hidden" id="total1">
										</div>

										<div class="row justify-content-end flex-column flex-lg-row my-3">
											<div class="col-auto mr-5">
												<h3 class="font-weight-bold text-color-dark text-4 mb-3">Items Subtotal</h3>
												<span class="d-flex align-items-center">
													3 Items
													<i class="fas fa-chevron-right text-color-primary px-3"></i>
													<b class="text-color-dark text-xxs">$298.00</b>
												</span>
											</div>
											<div class="col-auto mr-5">
												<h3 class="font-weight-bold text-color-dark text-4 mb-3">Shipping</h3>
												<span class="d-flex align-items-center">
													Flat Rate
													<i class="fas fa-chevron-right text-color-primary px-3"></i>
													<b class="text-color-dark text-xxs">$20.00</b>
												</span>
											</div>
											<div class="col-auto">
												<h3 class="font-weight-bold text-color-dark text-4 mb-3">Order Total</h3>
												<span class="d-flex align-items-center justify-content-lg-end">
													<strong class="text-color-dark text-5">$318.00</strong>
												</span>
											</div>
										</div>
									</div>
								</div>
                            </div>
							
						</div>
                        
						<div class="row action-buttons">
							<div class="col-12 col-md-auto">
								<button type="submit" class="submit-button btn btn-primary btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1" data-loading-text="Loading...">
									<i class="bx bx-save text-4 mr-2"></i> Save Order
								</button>
							</div>
							<div class="col-12 col-md-auto px-md-0 mt-3 mt-md-0">
								<a href="ecommerce-orders-list.html" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">Cancel</a>
							</div>
							<div class="col-12 col-md-auto ml-md-auto mt-3 mt-md-0">
								<a href="#" class="delete-button btn btn-danger btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1">
									<i class="bx bx-trash text-4 mr-2"></i> Delete Order
								</a>
							</div>
						</div>
					</form>
					<!-- end: page -->
				</section>
			</div>
		

		</section>	

		<!-- Examples -->
		<!-- <script src="Assets/js/examples/examples.notifications.js"></script> -->
		<script src="Assets/js/examples/examples.modals.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script>
    $('.table').on('change', '.procedure-price',function(){
            ActualizarMonto();
        });

        function ActualizarMonto(){
            var valor = 0;
            var temp = 0;
            $('.procedure-price').each(function(indice,elemento){
                temp = parseInt($(this).val());
                valor += temp;
            });
            $('#total').html(" $"+valor);
            $('#total1').val(valor);
        }
    
</script>