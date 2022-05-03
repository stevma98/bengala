
    <style>
        .dataTables_wrapper .dataTables_filter input{width:80% !important}
        table.pi > th.pi, td.pi {
            border: 1px solid grey;
            border-collapse: collapse;
            padding: 8px;
        }
        strong{color:red}
    </style>
				<div class="inner-wrapper" style="padding:0px !important">
				<section role="main" class="content-body">
					<header class="page-header">
					<h2>Créditos</h2>
					
						<div class="right-wrapper text-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fas fa-home"></i>
									</a>
								</li>
								<li><span>Contabilidad</span></li>
								<li><span>Administrar Créditos</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
                                    <header class="card-header" style="padding:30px !important">
                                        <a class="modal-with-form btn btn-primary" href="#modalForm1" style="float:right;margin-left:5px"><i class="fas fa-plus-circle"></i> Registrar Abono</a>
										<h2 class="card-title">Administracion de Créditos</h2>
                                    </header>
                                    
									<div class="card-body">
                                    <div id="collapse1One" class="" data-parent="#accordion" style="">
															<div class="card-body" style="padding:0px !important">
																<header class="panel-heading tab-bg-dark-navy-blueee row">
																	<div class="col-md-4"></div>
																	<ul class="nav nav-tabs col-md-8" style="border-bottom:0px !important">
																		<li class="active">
																			<a class="btn btn-default" data-toggle="tab" href="#vig">Vigentes</a>
																		</li>
																		<li class="">
																			<a class="btn btn-default"  data-toggle="tab" href="#finished">Finalizados</a>
																		</li>																																		
                                                                        <li class="">
																			<a class="btn btn-default"  data-toggle="tab" href="#abonos">Abonos</a>
																		</li>																																		
																	</ul>
																</header>
																<a target="_blank" hidden="true" class="btn btn-success" href="https://web.whatsapp.com/send?phone='+573222390807'&amp;text=Hola%20cordial%20saludo%20de%20Demo Veterinaria '%20,%20para%20nosotros%20nuestros%20pacientes%20son%20importantes%20por%20eso%20te%20enviamos%20la%20formula%20de%20'Miel'%20cita%20a%20la%20cual%20asistio%20el%20'19-12-2021'%20FORMULA:%20'<p>prueba de redadcccion de formual</p>'">Whatsapp</a>
																<div class="tab-content" style="padding:10px !important;box-shadow:0 0 0 0 !important;border:0px !important">
																<!--pendientes-->
																<div id="vig" class="tab-pane active">
																		<div class="adv-table editable-table ">
                                                                        <table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>#</th>
                                                                                    <th>N° Factura</th>
                                                                                    <th>Valor Crédito</th>
                                                                                    <th>Valor Pendiente</th>
                                                                                    <th>Nombre</th>
                                                                                    <th>Estado</th>
                                                                                    <th>Opciones</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                    <?php 
                                                                                    $count=0;
                                                                                    foreach($credits as $credit){
                                                                                        if($credit->ESTADO=='Pendiente') {
                                                                                            $count+=1;
                                                                                    ?>
                                                                                    <tr id="<?php echo $credit->ID_CONSE_VENTA; ?>">
                                                                                    <td><?php echo $count; ?></td>
                                                                                    <td><?php echo $credit->ID_CONSE_VENTA; ?></td>
                                                                                    <td><?php echo "$".number_format($credit->VALOR,0,',','.'); ?></td>
                                                                                    <td><?php echo "$".number_format($credit->VALOR-$credit->INICIAL,0,',','.'); ?></td>
                                                                                    <td><?php echo $credit->ST_NOM." ".$credit->ND_NOM." ".$credit->ST_APE." ".$credit->ND_APE; ?></td>
                                                                                    <td><?php echo $credit->ESTADO ?></td>
                                                                                    <td><a href="#modalForm" class="modal-with-form btn btn-primary watchInfo"><i class="fas fa-eye"></i> ver</a></td>
                                                                                    </tr>
                                                                                    <?php 
                                                                                    }
                                                                                    } ?>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
																			</div>
																		</div><!--termina-->
								

																<!--pendientes hoy-->
																<div id="finished" class="tab-pane">
																	<div class="adv-table editable-table ">
                                                                    <table class="table table-bordered table-striped mb-0" id="datatable-tabletools1">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>#</th>
                                                                                    <th>N° Factura</th>
                                                                                    <th>Valor Crédito</th>
                                                                                    <th>Valor Pendiente</th>
                                                                                    <th>Nombre</th>
                                                                                    <th>Estado</th>
                                                                                    <th>Opciones</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                    <?php 
                                                                                    $count1=0;
                                                                                    foreach($credits as $credit){
                                                                                        if($credit->ESTADO=='Cerrado') {
                                                                                            $count1+=1;
                                                                                    ?>
                                                                                    <tr id="<?php echo $credit->ID_CONSE_VENTA; ?>">
                                                                                    <td><?php echo $count1; ?></td>
                                                                                    <td><?php echo $credit->ID_CONSE_VENTA; ?></td>
                                                                                    <td><?php echo "$".number_format($credit->VALOR,0,',','.'); ?></td>
                                                                                    <td><?php echo "$".number_format($credit->VALOR-$credit->INICIAL,0,',','.'); ?></td>
                                                                                    <td><?php echo $credit->ST_NOM." ".$credit->ND_NOM." ".$credit->ST_APE." ".$credit->ND_APE; ?></td>
                                                                                    <td><?php echo $credit->ESTADO ?></td>
                                                                                    <td><a href="#modalForm" class="modal-with-form btn btn-primary watchInfo"><i class="fas fa-eye"></i> ver</a></td>
                                                                                    </tr>
                                                                                    <?php 
                                                                                    }
                                                                                    } ?>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
																		</div>
																	</div><!--termina-->
                                                                    
                                                                    <div id="abonos" class="tab-pane">
																	<div class="adv-table editable-table ">
                                                                    <table class="table table-bordered table-striped mb-0" id="datatable-tabletools3">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>#</th>
                                                                                    <th>N° Factura</th>
                                                                                    <th>ID Abono</th>
                                                                                    <th>Fecha Abono</th>
                                                                                    <th>Valor Abono</th>
                                                                                    <th>Opciones</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                    <?php 
                                                                                    $count2=0;
                                                                                    foreach($abonos as $abono){
                                                                                        $count2+=1;
                                                                                    ?>
                                                                                    <tr id="<?php echo $abono->ID_VENTA; ?>">
                                                                                    <td><?php echo $count2; ?></td>
                                                                                    <td><?php echo $abono->ID_VENTA; ?></td>
                                                                                    <td><?php echo $abono->PAGO_COMP; ?></td>
                                                                                    <td><?php echo $abono->FECHA_PAGO; ?></td>
                                                                                    <td><?php echo "$".number_format($abono->VALOR_PAGO,0,',','.'); ?></td>
                                                                                    
                                                                                    <td><a href="#modalForm" class="modal-with-form btn btn-primary watchInfo"><i class="fas fa-eye"></i> ver</a></td>
                                                                                    </tr>
                                                                                    <?php 
                                                                                    }
                                                                                     ?>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
																		</div>
																	</div><!--termina-->
																</div><!--termina contenido tabs-->
															</div>
														</div>
									</div>
								</section>
							</div>
						</div>
						</div>
					</div>
								</div>
					<!-- end: page -->
				</section>
                <div id="modalForm" class="modal-block modal-block-primary mfp-hide">
										<section class="card">
											<header class="card-header">
												<h2 class="card-title">Detalle Crédito</h2>
											</header>
											<div class="card-body">
												<form>
													<div class="form-row">
                                                        <div class="col-md-12 mb-3 mb-lg-0">
                                                            <div class="toggle toggle-quaternary" data-plugin-toggle="">
                                                            <section class="toggle">
                                                                <label>Click aqui para ver información de la crédito</label>
                                                                <div class="toggle-content" style="display: none;" >
                                                                    <table id="purchaseInfo" style="width:100%" class="pi">
                                                                    </table>                                                                    
                                                                </div>
                                                                <br>
                                                                    <table class="table table-responsive-md table-sm mb-0">
                                                                        <thead>
                                                                            <tr class="info">
                                                                                <th class="center">#</th>
                                                                                <th class="center">Producto</th>
                                                                                <th class="center">Cantidad</th>
                                                                                <th class="center">Precio</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="watchInfoProducts">
                                                                        </tbody>
                                                                    </table>
                                                                    <table class="table table-responsive-md table-sm mb-0">
                                                                        <thead>
                                                                            <tr class="primary">
                                                                                <th class="center">#</th>
                                                                                <th class="center">Comprobante</th>
                                                                                <th class="center">Valor</th>
                                                                                <th class="center">Fecha</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="watchInfoCredit">
                                                                        </tbody>
                                                                    </table>
                                                                    <div id="total" class="pull-right">

                                                                    </div>
                                                            </section>                                                            
                                                            </div>
                                                        </div>
													</div>
												</form>
											</div>
											<input type="hidden" id="confirmer" value="0"><footer class="card-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														<button class="btn btn-default modal-dismiss" >Cerrar</button>
													</div>
												</div>
											</footer>
										</section>
									</div>

                <div id="modalForm1" class="modal-block modal-block-primary mfp-hide">
										<section class="card">
											<header class="card-header">
												<h2 class="card-title">Registro Abono</h2>
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
														<div class="col-md-12 mb-3 mb-lg-0">
															<label for="ID_VENTA">Destino <strong>*</strong></label>
                                                            <select name="ID_VENTA" id="ID_VENTA" class="form-control" placeholder="Propietario" required>
                                                                <option value="Seleccione..." Selected>Seleccione...</option>
																<?php foreach ($creditstp as $credit) {?>
																	<option value="<?php echo $credit->ID_CONSE_VENTA ?>"><?php echo $credit->ID_CONSE_VENTA." / ".$credit->ST_NOM." ".$credit->ND_NOM." ".$credit->ST_APE." ".$credit->ND_APE ?></option>
																<?php } ?>
                                                            </select>
														</div>
													</div>
													<div class="form-row">
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="VALOR_PAGO">Valor Abono <strong>*</strong></label>
															<input type="text" id="VALOR_PAGO" name="VALOR_PAGO" class="form-control" placeholder="Valor Abono" required>															
														</div>
                                                        <div class="col-md-6 mb-6 mb-lg-0 center" style="margin-top:6%">
                                                            <label for="TICKET">¿Ticket?</label>
									                        <input type="checkbox" id="TICKET" class="checkbox-custom checkbox-default" value="1">
														</div>
													</div>
												</form>
											</div>
											<input type="hidden" id="confirmer" value="0">
											<footer class="card-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														<button class="btn btn-primary modal-confirm" id="addPayment" >Guardar</button>
														<button class="btn btn-default modal-dismiss" >Cancelar</button>
													</div>
												</div>
											</footer>
										</section>
									</div>
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
        $('#VALOR_PAGO').mask('#.##0', {reverse: true});

        $('.watchInfo').click(function(){
				let element = $(this)[0].parentElement.parentElement;
				let id = $(element).attr('id');
				$.ajax({
					url:'?controller=inventory&method=watchInfoC',
					type:'POST',
					data: 'ID_CONSE_VENTA='+id,
					success:function(response){                        
                        var data = JSON.parse(response);
                        
                        if (data[0]['ST_NOM']!=null) {
                            $('#purchaseInfo').html('<tr><td class="pi"><b>CLIENTE</b></td><td class="pi">'+data[0]["ST_NOM"]+' '+data[0]["ST_APE"]+'</td><td class="pi"><b>IDENTIFICACION</b></td><td class="pi">'+data[0]['ID_PROP']+'</td></tr><tr><td class="pi"><b>FECHA VENTA</b></td><td class="pi">'+data[0]["FECHA_VENTA"]+'</td><td class="pi"><b>N° COMPROBANTE</b></td><td class="pi">'+data[0]['NUM_FAC']+'</td></tr>');    
                        }else{
                            $('#purchaseInfo').html('<tr><td class="pi"><b>CLIENTE</b></td><td class="pi">Unica Vez</td><td class="pi"><b>IDENTIFICACION</b></td><td class="pi">Unica Vez</td></tr><tr><td class="pi"><b>FECHA VENTA</b></td><td class="pi">'+data[0]["FECHA_VENTA"]+'</td><td class="pi"><b>N° COMPROBANTE</b></td><td class="pi">'+data[0]['NUM_FAC']+'</td></tr>');    
                        }
                        $.ajax({
                            url:'?controller=inventory&method=watchInfoProductsS',
                            type:'POST',
                            data:'NUM_FAC='+id,
                            success:function(responses){
                                var datas = JSON.parse(responses);
                                var count = 1;
                                var template ='';
                                var total=0;
                                datas.forEach(data => {
                                    var price = data.CANTIDAD_SALIDA*data.PRECIO;
                                    total += price;
                                    price = new Intl.NumberFormat('es-mx', { maximumSignificantDigits: 4 }).format(price);
                                    price = price.replace(",",".");
                                template +=   `
                                <tr>
                                <td class="center">${count}</td>
                                <td class="center">${data.NOM_PRO}</td>
                                <td class="center">${data.CANTIDAD_SALIDA}</td>
                                <td class="center">$${price}</td>
                                `;    
                                count+=1;
                                });
                                var totald= total - (total * parseFloat(data[0]['DESCUENTO']/100));
                                totald = new Intl.NumberFormat('es-mx', { maximumSignificantDigits: 4 }).format(totald);
                                totald = totald.replace(",",".");
                                total = new Intl.NumberFormat('es-mx', { maximumSignificantDigits: 4 }).format(total);
                                total = total.replace(",",".");
                                
                                $('#watchInfoProducts').html(template);
                                    $.ajax({
                                    url:'?controller=inventory&method=watchInfoCredit',
                                    type:'POST',
                                    data:'ID_VENTA='+id,
                                    success:function(responses1){
                                        var datas = JSON.parse(responses1);
                                        var count = 1;
                                        var template ='';
                                        var totalc = 0;
                                        datas.forEach(data => {
                                            var price = parseFloat(data.VALOR_PAGO);
                                            totalc += price;
                                            price = new Intl.NumberFormat('es-mx', { maximumSignificantDigits: 4 }).format(price);
                                            price = price.replace(",",".");
                                            
                                        template +=   `
                                        <tr>
                                        <td class="center">${count}</td>
                                        <td class="center">${data.PAGO_COMP}</td>
                                        <td class="center">$${price}</td>
                                        <td class="center">${data.FECHA_PAGO}</td>
                                        `;    
                                        count+=1;
                                        });
                                        totalc = new Intl.NumberFormat('es-mx', { maximumSignificantDigits: 4 }).format(totalc);
                                            totalc = totalc.replace(",",".");
                                        $('#watchInfoCredit').html(template);
                                        $('#total').html("<h3>Total $"+total+"</h3><h4>Descuento "+data[0]['DESCUENTO']+"%</h4><h3>Abono Total $"+totalc+"</h4><h3>Total Final $"+totald+"</h3>");
                                    }
                                });
                            }
                        });                      
					}
				})
			});
	</script>