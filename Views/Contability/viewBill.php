
    <style>
        .dataTables_wrapper .dataTables_filter input{width:80% !important}
    </style>
				<div class="inner-wrapper" style="padding:0px !important">
				<section role="main" class="content-body">
					<header class="page-header">
					<h2>Recibo Venta</h2>
					
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
                    <?php foreach ($datas as $data) {?>
					<!-- start: page -->
					<form class="order-details action-buttons-fixed" method="post">
						<div class="row">
							<div class="col-xl-4 mb-4 mb-xl-0">
								<div class="card card-modern">
									<div class="card-header">
										<h2 class="card-title">General</h2>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-lg-3">
												<h5><b>Estado</b></h5>
											</div>
											<div class="col-lg-9">
												<input type="text" class="form-control  text-center" name="orderTimeHour" value="<?php echo $data->ESTADO ?>" readonly id="estado" />
											</div>
										</div>
										<br>
										<div class="row">
											<div class="col-lg-3">
												<h5><b>Fecha</b></h5>
											</div>
											<div class="col-lg-9">
												<input type="text" class="form-control text-center" name="orderDate" value="<?php echo $data->FECHA_VENTA ?>" readonly/>
											</div>
										</div>
										<br>
										<div class="row">
											<div class="col-lg-3">
												<h5><b>Paciente</b></h5>
											</div>	
											<div class="col-lg-9">
												<input type="text" class="form-control  text-center" name="orderTimeHour" value="<?php echo $data->NOMBRE ?>" readonly />
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
											<div class="col-xl-4 mr-xl-5 pr-xl-5 mb-4 mb-xl-0">
												<h3 class="text-color-dark font-weight-bold text-4 line-height-1 mt-0 mb-3">Facturación</h3>
												<ul class="list list-unstyled list-item-bottom-space-0" style="font-size:16x !important">
                                                    <li><?php echo $data->DUENO ?></li>
													<li><?php echo $data->DIRECCION ?></li>
													<li><?php echo $data->depart ?></li>
													<li><?php echo $data->city ?></li>
													<li>Colombia</li>
												</ul>												
											</div>
											<div class="col-xl-4 mr-xl-5 pr-xl-5 mb-4 mb-xl-0" >
											<strong class="d-block text-color-dark">Correo Electrónico:</strong>
												<a href="mailto:<?php echo $data->EMAIL ?>"><?php echo $data->EMAIL ?></a>
												<strong class="d-block text-color-dark mt-3">Teléfono:</strong>
												<a href="tel:+5551234" class="text-color-dark"><?php echo $data->TELEFONO ?></a>
												<input type="hidden" value="<?php echo $_GET['idp'] ?>" id="idp">
												<input type="hidden" value="<?php echo $_GET['idc'] ?>" id="idm">
											</div>
										</div>
									</div>
								</div>
                            <?php } ?>
							</div>
						</div>
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
														<th width="8%" class="center">#</th>
														<th width="40%" class="center">Nombre</th>
                                                        <th width="20%" class="center">Realizado</th>
														<th width="15%" class="center">Precio</th>
													</tr>
												</thead>
												<tbody>
                                                    <?php 
                                                    $count=1;
													$total=0;
                                                    foreach ($procedures as $procedure) {?>
													<tr>
														<td class="center"><strong><?php echo $count ?></strong></td>
                                                        <?php if ($procedure->TIPO=='Vacuna') {?>
                                                            <td class="center"><strong><?php echo $procedure->TIPO." - ".$procedure->NOMBRE_VACUNA ?></strong></td>    
                                                        <?php } else {?>
                                                            <td class="center"><strong><?php echo $procedure->TIPO ?></strong></td>
                                                        <?php }
                                                         ?>
                                                        <td class="center"><?php echo $procedure->FECHA_ANADIDO ?></td>
														<td class="center"><?php echo "$".number_format($procedure->PRECIO,0,',','.') ?></td>
														
													</tr>
                                                    <?php $count+=1; 
													$total+=$procedure->PRECIO;
													} ?>
                                                    
												</tbody>
                                                
											</table>
                                            <input type="hidden" id="total1" value="<?php echo $total ?>">
											<input type="hidden" id="countpro" value="<?php echo $count-1 ?>" >
											<input type="hidden" id="countmed" >
										</div>
									</div>
								</div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card card-modern">
									<div class="card-header">
										<h2 class="card-title">Medicamentos/Productos</h2>
                                        <div class="form-group">
											<!-- <a type="button" class="modal-with-form btn btn-primary btn-xs mr-2" href="#modalForm1">+</a> -->
											<!-- <button type="button" class="btn btn-danger btn-xs" onclick="eliminarFila()">-</button> -->
											<input type="hidden" value="1" id="num">
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-ecommerce-simple table-ecommerce-simple-border-bottom table-striped mb-0" style="min-width: 380px;" >
												<thead>
													<tr>
														<th width="8%" class="pl-4">#</th>
														<th width="65%" class="pl-4">Nombre</th>
                                                        <th width="10%" class="pl-4">Cantidad</th>
														<th width="10%" class="pl-4">Precio</th>
														<th width="10%" class="pl-4">Total</th>
													</tr>
												</thead>
												<tbody id="tableProducts">
                                                                                                      
												</tbody>
                                                
											</table>
                                            <input type="hidden" id="total3">
										</div>

										
									</div>
								</div>
                            </div>
							
						</div>
						<br>
						<div class="row">
                            <div class="col-lg-12">
                                <div class="card card-modern">
									<div class="card-body">
										<div class="row justify-content-center flex-column flex-lg-row my-3">
											<div class="col-auto mr- 6">
												<h3 class="font-weight-bold text-color-dark text-4 mb-3">¿Descuentos?(%)</h3>
												<span class="d-flex align-items-center">
													<input type="number" class="form-control form-control-sm" id="discount" style="text-align:center;" min=0 max=100 value=<?php echo $datas[0]->DESCUENTO ?> readonly>
												</span>
											</div>
											<div class="col-auto mr-6">
												<h3 class="font-weight-bold text-color-dark text-4 mb-3">¿IVA?(%)</h3>
												<span class="d-flex align-items-center">
													<select id="IVA" class="form-control form-control-sm" style="text-align:center">
														<option value="0">No Responsable</option>
														<option value="0.05">5%</option>
														<option value="0.16">16%</option>
														<option value="0.19">19%</option>
													</select>
												</span>
											</div>
											<div class="col-auto mr-5">
												<h3 class="font-weight-bold text-color-dark text-4 mb-3">Sub-Total Procedimientos</h3>
												<span class="d-flex align-items-center">
													<span><?php echo $count-1 ?></span>
													<i class="fas fa-chevron-right text-color-primary px-3"></i>
													<b class="text-color-dark text-xxs"><?php echo "$".number_format($total,0,',','.') ?></b>
												</span>
											</div>
											<div class="col-auto mr-5">
												<h3 class="font-weight-bold text-color-dark text-4 mb-3">Sub-Total Medicamentos/productos</h3>
												<span class="d-flex align-items-center">
													<span id="subtotalpro"></span>
													<i class="fas fa-chevron-right text-color-primary px-3"></i>
													<b class="text-color-dark text-xxs" id="totalpro"></b>
												</span>
											</div>
											<div class="col-auto">
												<h3 class="font-weight-bold text-color-dark text-4 mb-3">Total Venta</h3>
												<span class="d-flex align-items-center">
													<span id="totalproducts"></span>
													<i class="fas fa-chevron-right text-color-primary px-3"></i>
													<b class="text-color-dark text-xxs" id="totalvent"></b>
													<input type="hidden" id="totalVenta1">
												</span>
											</div>
										</div>
									</div>
								</div>
                            </div>
							
						</div>
                        
						<div class="row action-buttons">
							<div class="col-12 col-md-auto">
								<a href="#" class="modal-with-form btn btn-primary btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1"><i class="bx bx-save text-4 mr-2"></i> Pagar</a>
									
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
			<div class="card-body">

			<!-- Modal Form -->
			<div id="modalForm1" class="modal-block modal-block-primary mfp-hide">
				<section class="card">
					<header class="card-header">
						<h2 class="card-title">Añadir Producto</h2>
					</header>
					<div class="card-body">
						<form id="anadir">
							<div class="form-row">
							<div class="alert alert-danger" id="alertif" style="display:none;width:100%;text-align:center">
								<strong>Oh que mal!</strong> Aun hay espacios por completar.
							</div>
							</div>
							<input type="hidden" value="<?php echo $procedures[0]->ID_CONSE_CARRITO ?>" id="consecutivo">
							<input type="hidden" value="<?php echo $procedures[0]->ID_MASCOTA ?>" id="ID_MASCOTA">
							<input type="hidden" value="<?php echo $procedures[0]->ID_PROP ?>" id="ID_PROP">
							<div class="form-row">
							<div class="col-md-6 mb-3 mb-lg-0">
									<label for="ID_PRO">Tipo Corte</label>
									<select name="ID_PRO" id="ID_PRO" class="form-control" required>
										<option value="Seleccione...">Seleccione...</option>
										<?php foreach ($products as $product) {?>
										<option value="<?php echo $product->ID_PRO ?>"><?php echo $product->NOM_PRO ?></option>	
										<?php } ?>
									</select>
								</div>
								<div class="col-md-2 mb-3 mb-lg-0 center">
								<label for="SALDO">Saldo </label>
								<input type="text" disabled id="SALDO" class="form-control">
								</div>
								<div class="col-md-4 mb-3 mb-lg-0">
									<label for="CANTIDAD">Cantidad </label>
									<input type="number" id="CANTIDAD" name="CANTIDAD" class="form-control" required min=0>															
									<input type="hidden" id="PRECIO">
								</div>
							</div>							
						</form>
					</div>
					<input type="hidden" id="confirmer" value="0">
					<footer class="card-footer">
						<div class="row">
							<div class="col-md-12 text-right">
								<button class="btn btn-primary modal-confirm" id="addCar" >Añadir</button>
								<button class="btn btn-default modal-dismiss" >Cancelar</button>
							</div>
						</div>
					</footer>
				</section>
			</div>

			<div id="modalForm2" class="modal-block modal-block-primary mfp-hide">
				<section class="card">
					<header class="card-header">
						<h2 class="card-title">Añadir Producto</h2>
					</header>
					<div class="card-body">
						<form id="anadir">
							<div class="form-row">
							<div class="alert alert-danger" id="alertif" style="display:none;width:100%;text-align:center">
								<strong>Oh que mal!</strong> Aun hay espacios por completar.
							</div>
							</div>
							<input type="hidden" value="<?php echo $procedures[0]->ID_CONSE_CARRITO ?>" id="consecutivo">
							<input type="hidden" value="<?php echo $procedures[0]->ID_MASCOTA ?>" id="ID_MASCOTA">
							<input type="hidden" value="<?php echo $procedures[0]->ID_PROP ?>" id="ID_PROP">
							<div class="form-row">
							<div class="col-md-6 mb-3 mb-lg-0">
									<label for="ID_PRO">Tipo Corte</label>
									<select name="ID_PRO" id="ID_PRO" class="form-control" required>
										<option value="Seleccione...">Seleccione...</option>
										<?php foreach ($products as $product) {?>
										<option value="<?php echo $product->ID_PRO ?>"><?php echo $product->NOM_PRO ?></option>	
										<?php } ?>
									</select>
								</div>
								<div class="col-md-2 mb-3 mb-lg-0 center">
								<label for="SALDO">Saldo </label>
								<input type="text" disabled id="SALDO" class="form-control">
								</div>
								<div class="col-md-4 mb-3 mb-lg-0">
									<label for="CANTIDAD">Cantidad </label>
									<input type="number" id="CANTIDAD" name="CANTIDAD" class="form-control" required min=0>															
									<input type="hidden" id="PRECIO">
								</div>
							</div>							
						</form>
					</div>
					<input type="hidden" id="confirmer" value="0">
					<footer class="card-footer">
						<div class="row">
							<div class="col-md-12 text-right">
								<button class="btn btn-primary modal-confirm" id="addCar" >Añadir</button>
								<button class="btn btn-default modal-dismiss" >Cancelar</button>
							</div>
						</div>
					</footer>
				</section>
			</div>
			</div>
		</section>	

		<!-- Examples -->.
		<!-- <script src="Assets/js/examples/examples.notifications.js"></script> -->
		<script src="Assets/js/examples/examples.modals.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
	<script>
				var count = "1";
					function agregarFila(){
						
						if (count == 10) {
							alert("Maximo de artículos alcanzados en una orden!");
						}else{
							document.getElementById("tableProducts").insertRow(-1).innerHTML = '<tr><d class="pl-4"><b>'+count+'</b></td><td><select name="article" class="form-control article" id="article" onchange="prueba(this)" ><?php foreach ($products as $product){ ?><option value="<?php echo $product->ID_PRO; ?>"><?php echo $product->NOM_PRO; ?></option> <?php } ?></select></td><td><input type="text" name="medicineFrequency'+count+'" id="medicineFrequency'+count+'" class="form-control" ></td><td><input type="text" name="medicineDays'+count+'" id="medicineDays'+count+'" class="form-control"></td></tr>';
							count= parseInt(count)+1;
							document.getElementById('num').value=count;   
						}
					}

					function eliminarFila(){
						var table = document.getElementById("tableProducts");
						var rowCount = table.rows.length;
						count= parseInt(count)-1;
						//console.log(rowCount);
					
						if(rowCount <= 1){
							alert('No se puede eliminar el encabezado');
							count= parseInt(count)+1;
						}else{
							table.deleteRow(rowCount -1);																			
							document.getElementById('num').value=count;  
						}
					}
	</script>
	<script>
		tableProducts();

		function tableProducts(){
			var idm = $('#idm').val();
			var idp = $('#idp').val();
			$.ajax({
				url:'?controller=contability&method=searchProductsxBillShow',
				type: 'GET',
				data: {idm,idp},
				success : function(response){
					console.log(response);
					var datas = JSON.parse(response);
					var template = '';
					var count = 1;
					var totalf = 0;
					var totalc = 0;
					datas.forEach(data=>{
						var total=parseInt(data.PRECIOF)*parseInt(data.CANTIDADP);
						totalf += total;
						total = new Intl.NumberFormat('es-mx', { maximumSignificantDigits: 4 }).format(total);
						total = total.replace(",",".");
						PRECIOF = new Intl.NumberFormat('es-mx', { maximumSignificantDigits: 4 }).format(data.PRECIOF);
						PRECIOF = PRECIOF.replace(",",".");
						template +=   `
							<tr id="${data.ID_CARRITO}">
							<td class="pl-4"><b>${count}</b></td>
							<td class="pl-4"><b>${data.NOM_PRO}</b></td>
							<td class="pl-4">${data.CANTIDADP}</td>
							<td class="pl-4">$${PRECIOF}</td>
							<td class="pl-4">$${total}</td>
							</tr>
						`
						count+=1;
						totalc += parseInt(data.CANTIDADP);
					})
					$('#countmed').val(count-1);
					$('#tableProducts').html(template);
					totalff= totalf;
					totalf = new Intl.NumberFormat('es-mx', { maximumSignificantDigits: 4 }).format(totalf);
					totalf = totalf.replace(",",".");
					$('#total3').val(totalff);
					$('#subtotalpro').html(totalc);
					$('#totalpro').html("$"+totalf)
					var totalArt=parseInt($('#countpro').val())+totalc;
					var totalVent=parseInt($('#total3').val())+parseInt($('#total1').val());
					$('#totalVenta1').val(totalVent);
					var d = parseFloat($('#discount').val()/100);
					if (d!=0) {
						var dis=totalVent*d;
						totalVent-=dis;
					}
					totalVent = new Intl.NumberFormat('es-mx', { maximumSignificantDigits: 4 }).format(totalVent);
					totalVent = totalVent.replace(",",".");
					$('#totalproducts').html(totalArt);
					$('#totalvent').html("$"+totalVent);
					$('#totalpagar').val("$"+totalVent);
				}
			});
		}
		
		$('#received').mask('#.##0', {reverse: true});

		$('#received').keyup(function(){
			var received= $('#received').val();
			for (let index = 0; index < 4 ; index++) {
				received = received.replace('.','');
			}
			var tv = parseInt($('#totalVenta1').val());
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

		$('#discount').keyup(function(){
			tableProducts();
		});

		$('#discount').change(function(){
			tableProducts();
		});

		// jQuery('.soloNumeros').keypress(function (tecla) {
		// 	if (tecla.charCode < 47 || tecla.charCode > 58) return false;
		// });

		function deleteRow(id){
			$.ajax({
				type:'POST',
				url:'?controller=contability&method=deleteRow',
				data:'ID_CARRITO='+id,
				success:function(response){
					new PNotify({
							title: 'Confirmado!',
							text: 'Producto Eliminado Exitosamente.',
							type: 'success'
					});
					tableProducts();
				},error: function(data){
						$.magnificPopup.close();
						new PNotify({
							title: 'Rechazado!',
							text: 'Hubo un error al borrar el producto',
							type: 'error',
							shadow: true
						});
					}
			})
		}

		$('#ID_PRO').change(function(){
			var id = $('#ID_PRO').val();
			$.ajax({
				type:'POST',
				url:'?controller=inventory&method=getDataArticle',
				data: 'ID_PRO='+id,
				success:function(response){
					data = JSON.parse(response);
					$('#SALDO').val(data[0].STOCK);
					$('#CANTIDAD').prop('max',data[0].STOCK);
					$('#PRECIO').val(data[0].PRECIO);
				}
			});
		});
	</script>
	<script>
		/*
	edit Article 
	*/

	$(document).on('click', '#addCar ', function (e) {
		var confirmer;
		e.preventDefault();
        e.stopImmediatePropagation();
			$('#confirmer').val("0");
			if($("#ID_PRO").val() == 'Seleccione...') {
				$('#alertif').css('display','block');
			}else{
				$('#alertif').css('display','none');
			} 
			if($("#CANTIDAD").val().length < 1) {
				$('#alertif').css('display','block');
			}else{
				$('#alertif').css('display','none');
			} 
			var a = parseInt($('#SALDO').val());
			var b = parseInt($('#CANTIDAD').val());
			if(b> a) {
				$('#alertif').css('display','block');				
			}else{
				$('#alertif').css('display','none');
				$('#confirmer').val("1");
			} 
			confirmer=$('#confirmer').val();
			if (confirmer=='1') {
				$.ajax({
					type: 'POST',
					url: '?controller=contability&method=addCar',
					data: 'ID_PRODUCTO='+$('#ID_PRO').val()+'&CANTIDAD='+$('#CANTIDAD').val()+'&ID_CONSE_CARRITO='+$('#consecutivo').val()+'&PRECIO='+$('#PRECIO').val()+'&ID_MASCOTA='+$('#ID_MASCOTA').val()+'&ID_PROP='+$('#ID_PROP').val(),
					success: function(data){
						new PNotify({
							title: 'Confirmado!',
							text: 'Producto Añadido Exitosamente.',
							type: 'success'
						});
						$.magnificPopup.close();
						$('#anadir').trigger("reset");
						tableProducts();
					},
					error: function(data){
						$.magnificPopup.close();
						new PNotify({
							title: 'Rechazado!',
							text: 'Hubo un error al añadir producto',
							type: 'error',
							shadow: true
						});
					}
					});	
				}
	});
	</script>