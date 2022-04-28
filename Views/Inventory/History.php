
    <style>
        .dataTables_wrapper .dataTables_filter input{width:80% !important}
        table.pi > th.pi, td.pi {
            border: 1px solid grey;
            border-collapse: collapse;
            padding: 8px;
        }
    </style>
				<div class="inner-wrapper" style="padding:0px !important">
				<section role="main" class="content-body">
					<header class="page-header">
					<h2>Historial Compras</h2>
						<div class="right-wrapper text-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fas fa-home"></i>
									</a>
								</li>
								<li><span>Inventario</span></li>
								<li><span>Compras</span></li>
                                <li><span>Historial</span></li>
							</ol>
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
						</div>
					</header>

                                 <div id="modalForm" class="modal-block modal-block-primary mfp-hide">
										<section class="card">
											<header class="card-header">
												<h2 class="card-title">Detalle Compra</h2>
											</header>
											<div class="card-body">
												<form>
													<div class="form-row">
                                                        <div class="col-md-12 mb-3 mb-lg-0">
                                                            <div class="toggle toggle-quaternary" data-plugin-toggle="">
                                                            <section class="toggle">
                                                                <label>Click aqui para ver información de la compra</label>
                                                                <div class="toggle-content" style="display: none;" >
                                                                    <table id="purchaseInfo" style="width:100%" class="pi">
                                                                    </table>                                                                    
                                                                </div>
                                                                <br>
                                                                    <table class="table table-responsive-md table-sm mb-0">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="center">#</th>
                                                                                <th class="center">Producto</th>
                                                                                <th class="center">Cantidad</th>
                                                                                <th class="center">Precio</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="watchInfoProducts">
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
														<button class="btn btn-primary modal-confirm" id="editUser" >Editar</button>
														<button class="btn btn-default modal-dismiss" >Cancelar</button>
													</div>
												</div>
											</footer>
										</section>
									</div>

					<!-- start: page -->
                                    <header class="card-header" style="padding:30px !important">
                                        <a class="btn btn-primary" href="?controller=inventory&method=shopping" style="float:right">Agregar</a>
										<h2 class="card-title">Compras</h2>
                                    </header>
									
									<div class="card-body">
										<table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
											<thead>
												<tr>
													<th>#</th>
													<th>N° Comprobante</th>
                                                    <th>Fecha Comprobante</th>
													<th>Proveedor</th>													
													<th>Total</th>
													<th>Estado</th>
													<th>Opciones</th>
												</tr>
											</thead>
											<tbody>
                                                    <?php 
                                                    $count=0;
                                                    foreach($datas as $data){
                                                    $count+=1; ?>
                                                    <tr id="<?php echo $data->CON_COMPRA; ?>" id2="<?php echo $data->ID_CONSE_COMPRA; ?>">
													<td><?php echo $count; ?></td>
													<td><?php echo $data->ID_CONSE_COMPRA ?></td>
													<td><?php echo $data->FECHA_COMPRA;?></td>
													<td><?php echo $data->PROVEEDOR;?></td>
													<td><?php echo "$".number_format($data->VALOR,0,',','.');?></td>
													<td><?php echo $data->ESTADO ;?></td>
													<td><a href="#modalForm" class="modal-with-form btn btn-primary watchInfo"><i class="fas fa-eye"></i> ver</a></td>
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
		<script>
			$('.watchInfo').click(function(){
				let element = $(this)[0].parentElement.parentElement;
				let id = $(element).attr('id');
                let id2 = $(element).attr('id2');
				$.ajax({
					url:'?controller=inventory&method=watchInfo',
					type:'POST',
					data: 'CON_COMPRA='+id,
					success:function(response){
                        var data = JSON.parse(response);
                        $('#purchaseInfo').html('<tr><td class="pi"><b>PROVEEDOR</b></td><td class="pi">'+data[0]["PROVEEDOR"]+'</td><td class="pi"><b>NIT</b></td><td class="pi">'+data[0]['NIT']+'</td></tr><tr><td class="pi"><b>FECHA COMPRA</b></td><td class="pi">'+data[0]["FECHA_COMPRA"]+'</td><td class="pi"><b>N° COMPROBANTE</b></td><td class="pi">'+data[0]['NUM_FAC']+'</td></tr>');
                        $.ajax({
                            url:'?controller=inventory&method=watchInfoProducts',
                            type:'POST',
                            data:'NUM_FAC='+id2,
                            success:function(responses){
                                var datas = JSON.parse(responses);
                                var count = 1;
                                var template ='';
                                var total=0;
                                datas.forEach(data => {
                                    var price = data.CANTIDAD_ENTRADA*data.PRECIO_COMPRA;
                                    total += price;
                                    price = new Intl.NumberFormat('es-mx', { maximumSignificantDigits: 4 }).format(price);
                                    price = price.replace(",",".");
                                template +=   `
                                <tr>
                                <td class="center">${count}</td>
                                <td class="center">${data.NOM_PRO}</td>
                                <td class="center">${data.CANTIDAD_ENTRADA}</td>
                                <td class="center">$${price}</td>
                                `;    
                                count+=1;
                                });
                                total = new Intl.NumberFormat('es-mx', { maximumSignificantDigits: 4 }).format(total);
                                total = total.replace(",",".");
                                $('#watchInfoProducts').html(template);
                                $('#total').html("<h3>Total $"+total+"</h3>");
                            }
                        });                      
					}
				})
			});
		</script>