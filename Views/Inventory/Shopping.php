
    <style>
        .dataTables_wrapper .dataTables_filter input{width:80% !important}
    </style>
				<div class="inner-wrapper" style="padding:0px !important">
				<section role="main" class="content-body">
					<header class="page-header">
					<h2>Registrar Compra</h2>
					
						<div class="right-wrapper text-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fas fa-home"></i>
									</a>
								</li>
								<li><span>Inventario</span></li>    
								<li><span>Listar</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
                            <div class="row">
                                <div class="col-md-8 col-lg-8">
                                    <header class="card-header" style="padding:30px !important">
                                        <h2 class="card-title">Detalle de Compra</h2>
                                    </header>
                                    <div class="card-body">	
                                        <div class="row" style="padding:0 20px 0 20px">
                                            <label for="CODIGO_PRODUCTO">Producto</label>								
                                            <select name="CODIGO_PRODUCTO" id="CODIGO_PRODUCTO" class="form-control">
                                            <option value="Seleccione...">Seleccione...</option>
                                            <?php foreach ($products as $product) {?>
                                                <option value="<?php echo $product->ID_PRO ?>"><?php echo $product->NOM_PRO ?></option>
                                            <?php } ?>
                                            </select>
                                        </div>
                                        <br>
                                        <div class="form-row" style="padding:0 20px 0 20px">
                                            <div class="col-md-12 col-lg-12">
                                                <table class="table table-responsive-md mb-0">
                                                    <thead>
                                                        <th class="center">#</th>
                                                        <th class="center">Producto</th>
                                                        <th class="center" style="width:120px">Cantidad</th>
                                                        <th class="center">Precio Compra</th>
                                                        <th class="center">Acciones</th>
                                                    </thead>
                                                    <tbody id="tableProducts">

                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-md-6 col-lg-6">
                                                <button class="btn btn-danger btn-block"><i class="fas fa-times-circle"></i> Cancelar Compra</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4">
                                    <section class="card card-success">
                                    <header class="card-header center" style="padding:4px !important" >
                                    <h1 style="color:white" id="total">$0</h1>
                                    </header>
                                    <div class="card-body">									
                                        <div class="row">
                                            <div class="col-md-12 col-lg-12">
                                                <label for="PROVEEDOR">Proveedor</label>
                                                <select name="PROVEEDOR" id="PROVEEDOR" class="form-control">
                                                <option value="Seleccione...">Seleccione...</option>
                                                <?php foreach ($providers as $provider) {?>
                                                    <option value="<?php echo $provider->ID_PROVEEDOR ?>"><?php echo $provider->PROVEEDOR ?></option>
                                                <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-lg-6">
                                                    <label for="NUM_FAC">No Comprobante</label>
                                                    <input type="text" class="form-control" id="NUM_FAC">
                                            </div>
                                            <div class="col-md-6 col-lg-6">
                                                    <label for="FECHA_COMPROBANTE">Fecha Comprobante</label>
                                                    <input type="date" class="form-control" id="FECHA_COMPROBANTE">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12 col-lg-12">
                                                    <button class="btn btn-success btn-block"><i class="fas fa-save"></i> Guardar</button>
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
            //initialiazing the table
            tableProducts();


            $('#CODIGO_PRODUCTO').change(function(){
                var id = $('#CODIGO_PRODUCTO').val();
                $.ajax({
                    type: 'POST',
                    url : '?controller=inventory&method=addToPartial',
                    data: 'ID_PRO='+id,
                    success  : function(response){
                        tableProducts();
                    }
                });
            });

            function deleteRow(id) {
                $.ajax({
                    type:'POST',
                    url:'?controller=inventory&method=deleteRow',
                    data : 'ID_PRO='+id,
                    success : function(response){
                        tableProducts();
                    }
                });
            }

            function tableProducts(){
                $.ajax({
                    url:'?controller=inventory&method=searchProductsxShopping',
                    success : function(response){
                        var datas = JSON.parse(response);
                        var template = '';
                        var count = 1;
                        var total = 0;
                        datas.forEach(data=>{
                            total += parseInt(data.CANTIDAD * data.PRECIO_COMPRA);                        
                            PRECIOF = new Intl.NumberFormat('es-mx', { maximumSignificantDigits: 4 }).format(data.PRECIO_COMPRA);
                            PRECIOF = PRECIOF.replace(",",".");
                            template +=   `
                                <tr id="${data.ID_PRO}">
                                <td class="center"><b>${count}</b></td>
                                <td class="center"><b>${data.NOM_PRO}</b></td>
                                <td class="center"><input class="form-control" type="number" value="${data.CANTIDAD}" style="text-align:center" onchange="cantidad(${data.ID_PRO},this.value)" min=0></td>
                                <td class="center">$${PRECIOF}</td>
                                <td class="center">
                                <a class="on-default" onclick="deleteRow(${data.ID_PRO})" style="color:black"><i class="far fa-trash-alt"></i></a></td>
                                </tr>
                            `;
                            count+=1;
                        })
                        total = new Intl.NumberFormat('es-mx', { maximumSignificantDigits: 4 }).format(total);
                        total = total.replace(",",".");
                        $('#CODIGO_PRODUCTO').val($('#CODIGO_PRODUCTO > option:first').val());
                        $('#tableProducts').html(template);
                        $('#total').html("$"+total);
                    }
                });
		    }

            function cantidad(id,cant) {
                $.ajax({
                    type:'POST',
                    url:'?controller=inventory&method=quantityUpdate',
                    data : 'ID_PRO='+id+'&CANTIDAD='+cant,
                    success : function(response){
                        tableProducts();
                    }
                });
            }
                
        </script>
        <script>
            
        </script>