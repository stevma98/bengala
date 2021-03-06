    <style>
        .dataTables_wrapper .dataTables_filter input{width:80% !important}
		button{margin-left:5px}
		.dropdown-menu{min-width: 10%}
		.square{width:15px;font-size:20px}
		strong{color:red}
    </style>
				<div class="inner-wrapper" style="padding:0px !important">
				<section role="main" class="content-body">
					<header class="page-header">
					<h2>Administrar Caja</h2>
					
						<div class="right-wrapper text-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fas fa-home"></i>
									</a>
								</li>
								<li><span>Contabilidad</span></li>
								<li><span>Administrar Caja</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
                                    <header class="card-header" style="padding:30px !important">
									<?php 
								
									if ($check[0]->ESTADO_CAJA=='Abierta' && $check[0]->FECHA_CAJA==date('Y-m-d')) {?>
										<button type="button" class="btn btn-primary dropdown-toggle pull-right" data-toggle="dropdown" id="move"><i class="fas fa-dollar-sign"></i> Movimientos de Caja</button>
										<button type="button" class="btn btn-dark dropdown-toggle pull-right" data-toggle="dropdown" id="cuts"><i class="fas fa-wallet"></i> Cortes de Caja</button>
									<?php } ?>
									<button type="button" class="btn btn-success dropdown-toggle pull-right" data-toggle="dropdown" id="options"><i class="fas fa-bars"></i> Opciones</button>
									<div class="dropdown-menu" role="menu" >
										<a class="modal-with-form dropdown-item text-1 cutsMenu" href="#modalForm" style="display:none"><i class="far fa-flag"></i> Corte Z - Diario</a>
										<a class="modal-with-form dropdown-item text-1 cutsMenu" href="#modalForm" style="display:none"><i class="fas fa-flag"></i> Corte Z - Mensual</a>
									
										<?php if ($check[0]->ESTADO_CAJA=='Abierta' && $check[0]->FECHA_CAJA==date('Y-m-d')) {?>
											<a class="modal-with-form dropdown-item text-1 optionsMenu" href="#modalForm1" style="display:none"><i class="fas fa-pen"></i> Editar Monto Inicial</a>
											<a class="modal-with-form dropdown-item text-1 optionsMenu" href="#modalForm4" style="display:none"><i class="fas fa-download"></i> Cerrar Caja</a>
										<?php }else if($check[0]->ESTADO_CAJA=='Cerrada' && $check[0]->FECHA_CAJA==date('Y-m-d')){?>											
											<a class="dropdown-item text-1 optionsMenu" href="?controller=contability&method=openBox&id=<?php echo $check[0]->ID_CAJA ?>" style="display:none"><i class="fas fa-lock-open"></i> Abrir Caja</a>
										<?php }else if($check[0]->ESTADO_CAJA=='Cerrada' && $check[0]->FECHA_CAJA!=date('Y-m-d')) { ?>
											<a class="dropdown-item text-1 optionsMenu" style="display:none" href="#"><i class="fas fa-sad-cry"></i> No Hay</a>
										<?php }else{?>
											<a class="modal-with-form dropdown-item text-1 optionsMenu" href="#modalForm4" style="display:none"><i class="fas fa-download"></i> Cerrar Caja</a>
										<?php } ?>
										

										<a class="modal-with-form dropdown-item text-1 moveMenu" href="#modalForm2" style="display:none"><i class="far fa-money-bill-alt"></i> Gasto</a>
										<a class="modal-with-form dropdown-item text-1 moveMenu" href="#modalForm3" style="display:none"><i class="fas fa-money-bill-alt"></i> Pr??stamo</a>
									</div>
										<h2 class="card-title">Administrar Caja - Movimientos Caja</h2>
										<h4 class="card-title" style="font-size:14px">Fecha caja: <?php echo $check[0]->FECHA_CAJA ?> - <?php echo ($check[0]->ESTADO_CAJA=='Abierta') ? "<b style='color:#5cb85c'>Vigente/".$check[0]->ESTADO_CAJA."</b>" : "<b style='color:#e9573f'>".$check[0]->ESTADO_CAJA."</b>" ?></h4>
										<input type="hidden" value="<?php echo $check[0]->ID_CAJA ?>" id="ID_CAJA">
                                    </header>
                                    <div class="card-body">
										<br><br>
										<div class="row">
											<div class="col-lg-6">
												<table class="table table-responsive-lg ">
													<tr><td class="square"><i class="fas fa-square" style="color:#37474F;" ></i></td><td>MONTO INICIAL</td><td style="color:#37474F;">$<?php echo number_format($check[0]->VALOR_APERTURA,0,',','.') ?></td></tr>
													<tr><td class="square"><i class="fas fa-square" style="color:#5cb85c;" ></i></td><td>INGRESOS</td><td style="color:#5cb85c;">$<?php echo number_format($totali,0,',','.') ?></td></tr>
													<tr><td class="square"><i class="fas fa-square" style="color:#63d3e9;" ></i></td><td>PR??STAMOS</td><td style="color:#63d3e9;">$<?php echo number_format($totall,0,',','.') ?></td></tr>
													<tr><td class="square"><i class="fas fa-square" style="color:#e9573f;" ></i></td><td>GASTOS</td><td style="color:#e9573f;">$<?php echo number_format($totale,0,',','.') ?></td></tr>
													<tr><td></td><td class="center" style="color:#5cb85c"><b>INGRESOS TOTALES</b></td><td style="color:#5cb85c"><b>$<?php echo number_format($totali,0,',','.') ?></b></td></tr>
													<tr><td></td><td class="center" style="color:#e9573f"><b>EGRESOS TOTALES</b></td><td style="color:#e9573f"><b>$<?php echo number_format($totalee,0,',','.') ?></b></td></tr>
													<tr><td></td><td class="center"><b>SALDO</b></td><td><b>$<?php echo number_format($saldo,0,',','.') ?></b></td></tr>
													<tr><td></td><td class="center" style="color:#cc6600"><b>MONTO INICIAL + SALDO</b></td><td><?php echo ($final>0) ? '<b  style="color:#5cb85c">$'.number_format($final,0,',','.')	  : '<b  style="color:#e9573f">$'.number_format($final,0,',','.') ;   ?></b></td></tr>
												</table>
											</div>
											<div class="col-lg-6">
												<div class="chart chart-md" id="flotPie"></div>
												<script type="text/javascript">
								
													var flotPieData = [{
														label: "INGRESOS",
														data: [
															[1, <?php echo $incomesg ?>]
														],
														color: '#5cb85c'
													}, {
														label: "EGRESOS",
														data: [
															[1, <?php echo $expensesg ?>]
														],
														color: '#e9573f'
													}, {
														label: "PR??STAMOS",
														data: [
															[1, <?php echo $loansg ?>]
														],
														color: '#63d3e9'
													}, {
														label: "MONTO INICIAL",
														data: [
															[1, <?php echo $iniciog ?>]
														],
														color: '#37474F'
													}];
						
												// See: js/examples/examples.charts.js for more settings.
						
										</script>
											</div>
										</div>
										
										<div class="content" style="border:1px solid #e7e4e4;padding:5px">
														<div id="collapse1One" class="" data-parent="#accordion" style="">
															<div class="card-body" style="padding:0px !important">
																<header class="panel-heading tab-bg-dark-navy-blueee row">
																	<div class="col-md-1"></div>
																	<ul class="nav nav-tabs col-md-8" style="border-bottom:0px !important">
																		<li class="active">
																			<a class="btn btn-default" data-toggle="tab" href="#all"><i class="fas fa-square" style="color:#5cb85c;" ></i> INGRESOS (<?php echo $counti ?>)</a>
																		</li>
																		<li class="">
																			<a class="btn btn-default"  data-toggle="tab" href="#pending"><i class="fas fa-square" style="color:#63d3e9;" ></i> PR??STAMOS (<?php echo $countl ?>)</a>
																		</li>
																		<li class="">
																			<a class="btn btn-default"  data-toggle="tab" href="#confirmed"><i class="fas fa-square" style="color:#e9573f;" ></i> GASTOS (<?php echo $counte ?>)</a>
																		</li>
																	</ul>
																</header>
																<a target="_blank" hidden="true" class="btn btn-success" href="https://web.whatsapp.com/send?phone='+573222390807'&amp;text=Hola%20cordial%20saludo%20de%20Demo Veterinaria '%20,%20para%20nosotros%20nuestros%20pacientes%20son%20importantes%20por%20eso%20te%20enviamos%20la%20formula%20de%20'Miel'%20cita%20a%20la%20cual%20asistio%20el%20'19-12-2021'%20FORMULA:%20'<p>prueba de redadcccion de formual</p>'">Whatsapp</a>
																<div class="tab-content" style="padding:10px !important;box-shadow:0 0 0 0 !important;border:0px !important">
																<!--gastos-->
																<div id="pending" class="tab-pane">
																		<div class="adv-table editable-table ">
																			<table class="table table-striped table-hover table-bordered" id="datatable-tabletools5">                                     
                                                                                <thead>
                                                                                    <th>Descripcion</th>
                                                                                    <th>Monto</th>
                                                                                </thead>
																				<tbody>
																					<?php foreach ($loans as $loan) {?>
																						<tr>
																							<td><?php echo $loan->OBS_MOVIMIENTO ?></td>
																							<td><?php echo "$".number_format($loan->MONTO_MOVIMIENTO,0,',','.') ?></td>
																					<?php } ?>
																				</tbody>
																				</table>
																			</div>
																		</div><!--termina-->
								

																<!--pendientes hoy-->
																<div id="confirmed" class="tab-pane">
																	<div class="adv-table editable-table ">
																		<table class="table table-striped table-hover table-bordered" id="datatable-tabletools6">                                     
                                                                                <thead>
                                                                                    <th>Descripcion</th>
                                                                                    <th>Monto</th>
                                                                                </thead>
																				<tbody>
																					<?php foreach ($expenses as $expense) {?>
																						<tr>
																							<td><?php echo $expense->OBS_MOVIMIENTO ?></td>
																							<td><?php echo "$".number_format($expense->MONTO_MOVIMIENTO,0,',','.') ?></td>
																					<?php } ?>
																				</tbody>
																			</table>
																		</div>
																	</div><!--termina-->
																<!--todas-->
																<div id="all" class="tab-pane active">
																	<div class="adv-table editable-table ">
																	<table class="table table-striped table-hover table-bordered" id="datatable-tabletools7">                                     
                                                                            <thead>
                                                                                    <th>Descripcion</th>
                                                                                    <th>Monto</th>
                                                                                </thead>                                    
																			<tbody>
																			<?php foreach ($incomes as $income) {
																				$value=($income->DESCUENTO==0) ? $income->VALOR : $income->VALOR-($income->VALOR*($income->DESCUENTO/100));
																				?>
																						<tr>
																							<td><?php echo "VENTA N?? ".$income->ID_CONSE_VENTA ?></td>
																							<td><?php echo "$".number_format($value,0,',','.') ?></td>
																					<?php } ?>
																				<?php foreach ($incomesP as $incomep) {
																				?>
																						<tr>
																							<td><?php echo "Abono N?? ".$incomep->PAGO_COMP ?></td>
																							<td><?php echo "$".number_format($incomep->VALOR_PAGO,0,',','.') ?></td>
																					<?php } ?>																					
																			</tbody>
																			</table>
																		</div>
																	</div><!--termina-->
																</div><!--termina contenido tabs-->
															</div>
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

									<div id="modalForm1" class="modal-block modal-block-primary mfp-hide" style="max-width:300px !important">
										<section class="card">
											<header class="card-header">
												<h2 class="card-title">Editar Monto Inicial</h2>
											</header>
											<div class="card-body">
												
													<div class="form-row">
													<div class="alert alert-info" style="width:100%;text-align:center">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">??</button>
                                                            <b>Estimado usuario</b>, los campos marcados con <strong style="color:red">*</strong> son obligatorios.
                                                        </div>
													<div class="alert alert-danger" id="alertif" style="display:none;width:100%;text-align:center">
														<strong>Oh que mal!</strong> Aun hay espacios por completar.
													</div>
														<div class="form-group col-md-12">
															<label for="VALOR_APERTURA">Monto <strong>*</strong></label>
															<input type="text" class="form-control" id="VALOR_APERTURA" name="VALOR_APERTURA" placeholder="Monto Inicial" value="<?php echo $check[0]->VALOR_APERTURA ?>" required min=0>
															<input type="hidden" id="confirmer" value="0">
														</div>
													</div>
												
											</div>
											<footer class="card-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														<button class="btn btn-primary modal-confirm" id="editInitialBox" >Guardar</button>
														<button class="btn btn-default modal-dismiss" >Cancelar</button>
													</div>
												</div>
											</footer>
										</section>
									</div>

									<div id="modalForm2" class="modal-block modal-block-primary mfp-hide" style="max-width:300px !important">
										<section class="card">
											<header class="card-header">
												<h2 class="card-title">Gasto Efectivo de Caja</h2>
											</header>
											<div class="card-body">
												
													<div class="form-row">
													<div class="alert alert-info" style="width:100%;text-align:center">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">??</button>
                                                            <b>Estimado usuario</b>, los campos marcados con <strong style="color:red">*</strong> son obligatorios.
                                                        </div>
													<div class="alert alert-danger" id="alertif" style="display:none;width:100%;text-align:center">
														<strong>Oh que mal!</strong> Aun hay espacios por completar.
													</div>
														<div class="form-group col-md-12">
															<label for="MONTO_GASTO">Monto <strong>*</strong></label>
															<input type="text" class="form-control" id="MONTO_GASTO" name="MONTO_GASTO" placeholder="Monto Gasto">
															<input type="hidden" id="confirmer" value="0">
														</div>
														<div class="col-md-12">
															<label for="OBS_MOVIMIENTO">Descripcion de Movimiento <strong>*</strong></label>
															<textarea id="OBS_MOVIMIENTO" cols="30" rows="2" class="form-control" placeholder="Ingrese una descripcion breve"></textarea>
														</div>
													</div>
												
											</div>
											<footer class="card-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														<button class="btn btn-primary modal-confirm" id="addExpense" >Guardar</button>
														<button class="btn btn-default modal-dismiss" >Cancelar</button>
													</div>
												</div>
											</footer>
										</section>
									</div>

									<div id="modalForm3" class="modal-block modal-block-primary mfp-hide" style="max-width:300px !important">
										<section class="card">
											<header class="card-header">
												<h2 class="card-title">Pr??stamo Efectivo de Caja</h2>
											</header>
											<div class="card-body">
												
													<div class="form-row">
													<div class="alert alert-info" style="width:100%;text-align:center">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">??</button>
                                                            <b>Estimado usuario</b>, los campos marcados con <strong style="color:red">*</strong> son obligatorios.
                                                        </div>
													<div class="alert alert-danger" id="alertif" style="display:none;width:100%;text-align:center">
														<strong>Oh que mal!</strong> Aun hay espacios por completar.
													</div>
														<div class="form-group col-md-12">
															<label for="MONTO_PRESTAMO">Monto <strong>*</strong></label>
															<input type="text" class="form-control" id="MONTO_PRESTAMO" name="MONTO_PRESTAMO" placeholder="Monto Pr??stamo">
															<input type="hidden" id="confirmer" value="0">
														</div>
														<div class="col-md-12">
															<label for="OBS_MOVIMIENTOp">Descripcion de Movimiento <strong>*</strong></label>
															<textarea id="OBS_MOVIMIENTOp" cols="30" rows="2" class="form-control" placeholder="Ingrese una descripcion breve"></textarea>
														</div>
													</div>
												
											</div>
											<footer class="card-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														<button class="btn btn-primary modal-confirm" id="addLoan" >Guardar</button>
														<button class="btn btn-default modal-dismiss" >Cancelar</button>
													</div>
												</div>
											</footer>
										</section>
									</div>

									<div id="modalForm4" class="modal-block modal-block-primary mfp-hide" style="max-width:300px !important">
										<section class="card">
											<header class="card-header">
												<h2 class="card-title">Cierre de Caja</h2>
											</header>
											<div class="card-body">
												
													<div class="form-row">
														<?php
														if ($final>0) {?>
														<div class="alert alert-info" style="width:100%;text-align:center">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">??</button>
                                                            <b>Estimado usuario</b>, los campos marcados con <strong style="color:red">*</strong> son obligatorios.
                                                        </div>
															<div class="alert alert-danger" id="alertif" style="display:none;width:100%;text-align:center">
																<strong>Oh que mal!</strong> Aun hay espacios por completar.
															</div>
																<div class="form-group col-md-12">
																	<label for="VALOR_CIERRE">Valor Cierre <strong>*</strong></label>
																	<input type="text" class="form-control" id="VALOR_CIERRE" name="VALOR_CIERRE" placeholder="Monto Cierre" value="<?php echo $final ?>">
																	<input type="hidden" id="confirmer" value="0">
																</div>
															</div>
														<?php } else { ?>
															<div class="alert alert-danger" style="width:100%;text-align:center">
																<strong>Oh que mal!</strong> El cierre de caja no puede ser negativo.
															</div>
														<?php }	?>
													
												
											</div>
											<footer class="card-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														<?php 
														if ($final>0) {?>
															<a class="modal-with-form  btn btn-primary" href="#modalIcon"><i class="fas fa-check-circle" style="color:white"></i> Cerrar Caja</a>
														<?php }
														?>
														<button class="btn btn-default modal-dismiss" >Cancelar</button>
													</div>
												</div>
											</footer>
										</section>
									</div>



									<div id="modalIcon" class="modal-block modal-block-info mfp-hide">
										<section class="card">
											<header class="card-header">
												<h2 class="card-title">??Estas Seguro?</h2>
											</header>
											<div class="card-body">
												<div class="modal-wrapper">
													<div class="modal-icon">
														<i class="fas fa-question-circle"></i>
													</div>
													<div class="modal-text">
														<p class="mb-0">??Estas seguro de que quieres cerrar caja con el monto <span id="cierrecaja"><?php echo "$".number_format($final,0,',','.') ?></span> ?</p>
													</div>
												</div>
											</div>
											<footer class="card-footer">
												<div class="row">
													<div class="col-md-12 text-right">
													<button class="btn btn-primary modal-confirm" id="closeBox" >Cerrar</button>
														<button class="btn btn-default modal-dismiss">Cancelar</button>
													</div>
												</div>
											</footer>
										</section>
									</div>
		</section>	

		<!-- Examples -->
		<!-- <script src="Assets/js/examples/examples.notifications.js"></script> -->
		<script src="Assets/js/examples/examples.modals.js"></script>
		<script src="Assets/vendor/summernote/summernote-bs4.js"></script>
		<script src="Assets/js/examples/examples.charts.js"></script>
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
			$('#VALOR_APERTURA').mask('#.##0', {reverse: true});
			$('#MONTO_GASTO').mask('#.##0', {reverse: true});
			$('#MONTO_PRESTAMO').mask('#.##0', {reverse: true});
			$('#VALOR_CIERRE').mask('#.##0', {reverse: true});

			$('#VALOR_CIERRE').keyup(function(){
				var c = $('#VALOR_CIERRE').val();
				$('#cierrecaja').html("$"+c);
			});
			
			$('#options').click(function(){
				if ($('.optionsMenu').css('display')=='none') {
					$('.optionsMenu').css('display','block');	
					$('.moveMenu').css('display','none');
					$('.cutsMenu').css('display','none');
				} else {
					$('.optionsMenu').css('display','none');
				}
			});

			$('#move').click(function(){
				if ($('.moveMenu').css('display')=='none') {
					$('.moveMenu').css('display','block');	
					$('.cutsMenu').css('display','none');
					$('.optionsMenu').css('display','none');
				} else {
					$('.moveMenu').css('display','none');
				}
			});

			$('#cuts').click(function(){
				if ($('.cutsMenu').css('display')=='none') {
					$('.cutsMenu').css('display','block');	
					$('.optionsMenu').css('display','none');
					$('.moveMenu').css('display','none');
				} else {
					$('.cutsMenu').css('display','none');
				}
			});

			$('#editInitialBox').click(function(){
				if($("#VALOR_APERTURA").val().length < 1) {
					$('#VALOR_APERTURA').css('border','1px solid red');
					$('#alertif').css('display','block');
				}else{
					$('#VALOR_APERTURA').css('border','1px solid green');
					$('#alertif').css('display','none');
					$('#confirmer').val("1");
				}
				confirmer=$('#confirmer').val();
				if (confirmer=='1') {
					$.ajax({
						type:'POST',
						url:'?controller=contability&method=editInitialBox',
						data:'VALOR_APERTURA='+$('#VALOR_APERTURA').val()+'&ID_CAJA='+$('#ID_CAJA').val(),
						success:function(response){
							console.log(response);
							if (response=='true') {
								new PNotify({
									title: 'Confirmado!',
									text: 'Monto Inicial Modificado.',
									type: 'success'
								});
								$.magnificPopup.close();
								setTimeout(() => {
								location.reload();	
								}, 2000);
							} else {
								$.magnificPopup.close();
								new PNotify({
									title: 'Rechazado!',
									text: 'Hubo un error al modificar el monto inicial',
									type: 'error',
									shadow: true
								});	
							}
						}
					})
				}
			});

			$('#addExpense').click(function(){
				if($("#MONTO_GASTO").val().length < 1) {
					$('#MONTO_GASTO').css('border','1px solid red');
					$('#alertif').css('display','block');
				}else{
					$('#MONTO_GASTO').css('border','1px solid green');
					$('#alertif').css('display','none');
				}
				if($("#OBS_MOVIMIENTO").val().length < 4) {
					$('#OBS_MOVIMIENTO').css('border','1px solid red');
					$('#alertif').css('display','block');
				}else{
					$('#OBS_MOVIMIENTO').css('border','1px solid green');
					$('#alertif').css('display','none');
					$('#confirmer').val("1");
				}
				confirmer=$('#confirmer').val();
				if (confirmer=='1') {
					$.ajax({
						type:'POST',
						url:'?controller=contability&method=addExpense',
						data:'MONTO_MOVIMIENTO='+$('#MONTO_GASTO').val()+'&ID_CAJA='+$('#ID_CAJA').val()+'&OBS_MOVIMIENTO='+$('#OBS_MOVIMIENTO').val(),
						success:function(response){
							if (response=='true') {
								new PNotify({
									title: 'Confirmado!',
									text: 'Gasto A??adido con ??xito.',
									type: 'success'
								});
								$.magnificPopup.close();
								setTimeout(() => {
								location.reload();	
								}, 2000);
							} else {
								$.magnificPopup.close();
								new PNotify({
									title: 'Rechazado!',
									text: 'Hubo un error al a??adir el gasto',
									type: 'error',
									shadow: true
								});	
							}							
						}						
					})
				}
			});

			$('#addLoan').click(function(){
				if($("#MONTO_PRESTAMO").val().length < 1) {
					$('#MONTO_PRESTAMO').css('border','1px solid red');
					$('#alertif').css('display','block');
				}else{
					$('#MONTO_PRESTAMO').css('border','1px solid green');
					$('#alertif').css('display','none');
				}
				if($("#OBS_MOVIMIENTOp").val().length < 4) {
					$('#OBS_MOVIMIENTOp').css('border','1px solid red');
					$('#alertif').css('display','block');
				}else{
					$('#OBS_MOVIMIENTOp').css('border','1px solid green');
					$('#alertif').css('display','none');
					$('#confirmer').val("1");
				}
				confirmer=$('#confirmer').val();
				if (confirmer=='1') {
					$.ajax({
						type:'POST',
						url:'?controller=contability&method=addLoan',
						data:'MONTO_MOVIMIENTO='+$('#MONTO_PRESTAMO').val()+'&ID_CAJA='+$('#ID_CAJA').val()+'&OBS_MOVIMIENTO='+$('#OBS_MOVIMIENTOp').val(),
						success:function(response){
							if (response=='true') {
								new PNotify({
									title: 'Confirmado!',
									text: 'Prestamo A??adido con ??xito.',
									type: 'success'
								});
								$.magnificPopup.close();
								setTimeout(() => {
								location.reload();	
								}, 2000);
							} else {
								$.magnificPopup.close();
								new PNotify({
									title: 'Rechazado!',
									text: 'Hubo un error al a??adir el prestamo',
									type: 'error',
									shadow: true
								});	
							}							
						}						
					})
				}
			});

			$('#closeBox').click(function(){
				if($("#VALOR_CIERRE").val().length < 1) {
					$('#VALOR_CIERRE').css('border','1px solid red');
					$('#alertif').css('display','block');
				}else{
					$('#VALOR_CIERRE').css('border','1px solid green');
					$('#alertif').css('display','none');
					$('#confirmer').val("1");
				}
				confirmer=$('#confirmer').val();
				if (confirmer=='1') {
					$.ajax({
						type:'POST',
						url:'?controller=contability&method=closeBox',
						data:'VALOR_CIERRE='+$('#VALOR_CIERRE').val()+'&ID_CAJA='+$('#ID_CAJA').val(),
						success:function(response){
							if (response=='true') {
								new PNotify({
									title: 'Confirmado!',
									text: 'Cierre de caja realizado con ??xito.',
									type: 'success'
								});
								$.magnificPopup.close();
								setTimeout(() => {
								location.reload();	
								}, 2000);	
							} else {
								$.magnificPopup.close();
								new PNotify({
									title: 'Rechazado!',
									text: 'Hubo un error al cerrar caja',
									type: 'error',
									shadow: true
								});	
							}							
						}						
					})
				}
			});
		</script>