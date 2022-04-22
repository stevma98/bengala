
    <style>
        .dataTables_wrapper .dataTables_filter input{width:80% !important}
    </style>
				<div class="inner-wrapper" style="padding:0px !important">
				<section role="main" class="content-body">
					<header class="page-header">
					<h2>Registrar Venta</h2>
					
						<div class="right-wrapper text-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fas fa-home"></i>
									</a>
								</li>
								<li><span>Inventario</span></li>    
								<li><span>Ventas</span></li>
                                <li><span>Agregar Venta</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
						</div>
					</header>

                                    <div id="modalIcon" class="modal-block modal-block-info mfp-hide">
										<section class="card">
											<header class="card-header">
												<h2 class="card-title">¿Estas Seguro?</h2>
											</header>
											<div class="card-body">
												<div class="modal-wrapper">
													<div class="modal-icon">
														<i class="fas fa-question-circle"></i>
													</div>
													<div class="modal-text">
														<p class="mb-0">¿Estas seguro de que quieres eliminar esta venta?</p>
													</div>
												</div>
											</div>
											<footer class="card-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														<button class="btn btn-info" id="cancelShopping">Eliminar</button>
														<button class="btn btn-default modal-dismiss">Cancelar</button>
													</div>
												</div>
											</footer>
										</section>
									</div>

					<!-- start: page -->
                            <div class="row">
                                <div class="col-md-8 col-lg-8">
                                    <header class="card-header" style="padding:30px !important">
                                        <h2 class="card-title">Detalle de Venta</h2>
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
														<th class="center">Stock</th>
                                                        <th class="center" style="width:120px">Cantidad</th>
                                                        <th class="center">Precio</th>
                                                        <th class="center">Acciones</th>
                                                    </thead>
                                                    <tbody id="tableProducts">

                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-md-6 col-lg-6">
                                                <a href="#modalIcon" class="btn btn-danger btn-block modal-basic" id="cancelShoppingButton" style="display:none"><i class="fas fa-times-circle"></i> Cancelar Compra</a>
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
                                        <div class="alert alert-danger" id="alertif" style="display:none;width:100%;text-align:center">
														<strong>Oh que mal!</strong> Aun hay espacios por completar.
													</div>
                                            <div class="col-md-12 col-lg-12">
                                                <label for="CLIENTE">Cliente</label>
                                                <select name="CLIENTE" id="CLIENTE" class="form-control">
                                                <option value="Seleccione...">Seleccione...</option>
												<option value="Unica Vez">Unica Vez</option>
                                                <?php foreach ($owners as $owner) {?>
                                                    <option value="<?php echo $owner->ID_PROP ?>"><?php echo $owner->ST_NOM." ".$owner->ND_NOM." ".$owner->ST_APE." ".$owner->ND_APE ?></option>
                                                <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
								<div class="col-lg-4 col-md-4 mb-3 mb-lg-0">
									<label for="FORMA_PAGO">¿Descuento?(%)<label>
									<input type="number" class="form-control" id="discount" style="text-align:center;" min=0 max=100 value=0>
								</div>
								<div class="col-lg-8 col-md-4 mb-3 mb-lg-0">
									<label for="totalpagar">Total</label>
									<input type="text" class="form-control" id="totalpagar" style="text-align:center" disabled>
								</div>
							</div>							
							<div class="form-row">
								<div class="col-lg-4 col-md-4 mb-3 mb-lg-0">
									<label for="FORMA_PAGO">Forma Pago</label>
									<select name="FORMA_PAGO" id="FORMA_PAGO" class="form-control" required style="text-align:center">
										<option value="0">Contado</option>
										<option value="1">Crédito</option>
									</select>
								</div>
								<div class="col-lg-8 col-md-4 mb-3 mb-lg-0">
									<label for="received">Recibo</label>
									<input type="text" class="form-control" id="received" style="text-align:center">
									<input type="hidden" class="form-control" id="received1" style="text-align:center">
								</div>
							</div>							
							<div class="form-row">
								<div class="col-lg-4 col-md-4 mb-3 mb-lg-0">
								<label for="METODO_PAGO">Método Pago</label>
									<select name="METODO_PAGO" id="METODO_PAGO" class="form-control" required style="text-align:center">
										<option value="Banco">Banco</option>
										<option value="Local" selected>Local</option>
									</select>
								</div>
								<div class="col-lg-8 col-md-4 mb-3 mb-lg-0">
									<label for="return">Cambio</label>
									<input type="text" class="form-control" id="return" style="text-align:center" readonly>
								</div>
                                <input type="hidden" id="totalVenta1">
								<input type="hidden" id="totalVenta2">
								<input type="hidden" id="confirmer" value="0">
							</div>	
							<div class="form-row">
								 <div class="col-lg-8 col-md-8 mb-3 mb-lg-0" >
									 <label for="OBS">Observaciones</label>
									<textarea name="OBS" id="OBS" rows="1" class="form-control"></textarea>
								 </div>
								 <div class="col-lg-4 col-md-4 mb-3 mb-lg-0 center" style="margin-top:6%">
									 <label for="TICKET">¿Ticket?</label>
									<input type="checkbox" id="TICKET" class="checkbox-custom checkbox-default" value="1">
								 </div>
							</div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12 col-lg-12">
                                                    <button class="btn btn-success btn-block" id="closeSaleDirect"><i class="fas fa-save"></i> Guardar</button>
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
            var stack_bottomleft = {"dir1": "right", "dir2": "up", "push": "top"};

            $('#CODIGO_PRODUCTO').change(function(){
                var id = $('#CODIGO_PRODUCTO').val();
                $.ajax({
                    type: 'POST',
                    url : '?controller=inventory&method=addToPartialSale',
                    data: 'ID_PRO='+id,
                    success: function(response){
                        console.log(response);
                        if(response!='1'){
                            new PNotify({
                                title: 'Notification',
                                text: 'Ya existe el producto en la orden.',
                                type: 'error',
                                addclass: 'stack-bottomleft',
                                stack: stack_bottomleft
						    });
                        }
                        tableProducts();
					},
                });
            });
            
            $('#cancelShopping').click(function(){
                $.ajax({
                    url : '?controller=inventory&method=cancelSale',
                    success  : function(response){
                        console.log(response);
                        setTimeout(() => {
						location.reload();	
						}, 100);
                    }
                });
            });

            function deleteRow(id) {
                $.ajax({
                    type:'POST',
                    url:'?controller=inventory&method=deleteRowSale',
                    data : 'ID_PRO='+id, 
                    success : function(response){                        
                        tableProducts();
                    }
                });
            }

            function tableProducts(){
                $.ajax({
                    url:'?controller=inventory&method=searchProductsxSale',
                    success : function(response){
                        var datas = JSON.parse(response);
                        var template = '';
                        var count = 1;
                        var total = 0;
                        datas.forEach(data=>{
                            total += parseInt(data.CANTIDAD * data.PRECIO);                        
                            PRECIOF = new Intl.NumberFormat('es-mx', { maximumSignificantDigits: 4 }).format(data.PRECIO);
                            PRECIOF = PRECIOF.replace(",",".");
                            template +=   `
                                <tr id="${data.ID_PRO}">
                                <td class="center"><b>${count}</b></td>
                                <td class="center"><b>${data.NOM_PRO}</b></td>
								<td class="center">${data.STOCK}</td>
                                <td class="center"><input class="form-control" type="number" value="${data.CANTIDAD}" style="text-align:center" onchange="cantidad(${data.ID_PRO},this.value)" min=0 max=${data.STOCK}></td>
                                <td class="center">$${PRECIOF}</td>
                                <td class="center">
                                <a class="on-default" onclick="deleteRow(${data.ID_PRO})" style="color:black"><i class="far fa-trash-alt"></i></a></td>
                                </tr>
                            `;
                            count+=1;
                        })
                        $('#totalVenta1').val(total);
						var d = parseFloat($('#discount').val()/100);
						if (d!=0) {
							var dis=total*d;
							total-=dis;
						}
						$('#totalVenta2').val(total);
                        total = new Intl.NumberFormat('es-mx', { maximumSignificantDigits: 4 }).format(total);
                        total = total.replace(",",".");
                        $('#CODIGO_PRODUCTO').val($('#CODIGO_PRODUCTO > option:first').val());
                        $('#tableProducts').html(template);
                        $('#total').html("$"+total);
                        $('#totalpagar').val("$"+total);
                        if(total!=0){
                            $('#cancelShoppingButton').css('display','block');
                        }else{
                            $('#cancelShoppingButton').css('display','none');
                        }
                    }
                });
		    }

            function cantidad(id,cant) {
                $.ajax({
                    type:'POST',
                    url:'?controller=inventory&method=quantityUpdateSale',
                    data : 'ID_PRO='+id+'&CANTIDAD='+cant,
                    success : function(response){
                        tableProducts();
                    }
                });
            }

			$('#discount').keyup(function(){
			tableProducts();
			});

			$('#discount').change(function(){
				tableProducts();
			});

            $('#received').mask('#.##0', {reverse: true});

		$('#received').keyup(function(){
			var received= $('#received').val();
			for (let index = 0; index < 4 ; index++) {
				received = received.replace('.','');
			}
			var tv = parseInt($('#totalVenta2').val());
			var total = received - tv;
			if (total<0) {
				$('#return').val("Credito");	
				$('#received1').val(received);
			} else {
				$('#received1').val(received);
				total = new Intl.NumberFormat('es-mx', { maximumSignificantDigits: 4 }).format(total);
				total = total.replace(",",".");
				$('#return').val("$"+total);	
			}
			
		});

		$('#received').change(function () {
			    var valor = $(this).val();  
			    $(this).val('$' + valor);
			});
                
        </script>
        <script>
            
        </script>