    <style>
        .dataTables_wrapper .dataTables_filter input{width:80% !important}
		button{margin-left:5px}
		.dropdown-menu{min-width: 10%}
		.square{width:15px;font-size:20px}
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
									<button type="button" class="btn btn-primary dropdown-toggle pull-right" data-toggle="dropdown" id="move"><i class="fas fa-dollar-sign"></i> Movimientos de Caja</button>
									<button type="button" class="btn btn-dark dropdown-toggle pull-right" data-toggle="dropdown" id="cuts"><i class="fas fa-wallet"></i> Cortes de Caja</button>
									<button type="button" class="btn btn-success dropdown-toggle pull-right" data-toggle="dropdown" id="options"><i class="fas fa-bars"></i> Opciones</button>
									<div class="dropdown-menu" role="menu" >
										<a class="modal-with-form dropdown-item text-1 cutsMenu" href="#modalForm" style="display:none"><i class="far fa-flag"></i> Corte Z - Diario</a>
										<a class="modal-with-form dropdown-item text-1 cutsMenu" href="#modalForm" style="display:none"><i class="fas fa-flag"></i> Corte Z - Mensual</a>
									
											
										<a class="modal-with-form dropdown-item text-1 optionsMenu" href="#modalForm1" style="display:none"><i class="fas fa-pen"></i> Editar Monto Inicial</a>
										<a class="modal-with-form dropdown-item text-1 optionsMenu" href="#modalForm" style="display:none"><i class="fas fa-download"></i> Cerrar Caja</a>

										<a class="modal-with-form dropdown-item text-1 moveMenu" href="#modalForm2" style="display:none"><i class="far fa-money-bill-alt"></i> Gasto</a>
										<a class="modal-with-form dropdown-item text-1 moveMenu" href="#modalForm3" style="display:none"><i class="fas fa-money-bill-alt"></i> Préstamo</a>
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
													<tr><td class="square"><i class="fas fa-square" style="color:#5cb85c;" ></i></td><td>INGRESOS</td><td style="color:#5cb85c;">10</td></tr>
													<tr><td class="square"><i class="fas fa-square" style="color:#63d3e9;" ></i></td><td>PRÉSTAMOS</td><td style="color:#63d3e9;">$<?php echo number_format($totall,0,',','.') ?></td></tr>
													<tr><td class="square"><i class="fas fa-square" style="color:#e9573f;" ></i></td><td>GASTOS</td><td style="color:#e9573f;">$<?php echo number_format($totale,0,',','.') ?></td></tr>
													<tr><td></td><td class="center" style="color:#5cb85c"><b>INGRESOS TOTALES</b></td><td style="color:#5cb85c">10</td></tr>
													<tr><td></td><td class="center" style="color:#e9573f"><b>EGRESOS TOTALES</b></td><td style="color:#e9573f">10</td></tr>
													<tr><td></td><td class="center"><b>SALDO</b></td><td>10</td></tr>
													<tr><td></td><td class="center" style="color:#cc6600"><b>MONTO INICIAL + SALDO</b></td><td style="color:#cc6600">10</td></tr>
												</table>
											</div>
											<div class="col-lg-6">
												<div class="chart chart-md" id="flotPie"></div>
												<script type="text/javascript">
								
													var flotPieData = [{
														label: "INGRESOS",
														data: [
															[1, 25]
														],
														color: '#5cb85c'
													}, {
														label: "EGRESOS",
														data: [
															[1, 35]
														],
														color: '#e9573f'
													}, {
														label: "PRÉSTAMOS",
														data: [
															[1, 30]
														],
														color: '#63d3e9'
													}, {
														label: "MONTO INICIAL",
														data: [
															[1, 10]
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
																			<a class="btn btn-default" data-toggle="tab" href="#all"><i class="fas fa-square" style="color:#5cb85c;" ></i> INGRESOS </a>
																		</li>
																		<li class="">
																			<a class="btn btn-default"  data-toggle="tab" href="#pending"><i class="fas fa-square" style="color:#63d3e9;" ></i> PRÉSTAMOS (<?php echo $countl ?>)</a>
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
													<div class="alert alert-danger" id="alertif" style="display:none;width:100%;text-align:center">
														<strong>Oh que mal!</strong> Aun hay espacios por completar.
													</div>
														<div class="form-group col-md-12">
															<label for="VALOR_APERTURA">Monto</label>
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
													<div class="alert alert-danger" id="alertif" style="display:none;width:100%;text-align:center">
														<strong>Oh que mal!</strong> Aun hay espacios por completar.
													</div>
														<div class="form-group col-md-12">
															<label for="MONTO_GASTO">Monto</label>
															<input type="text" class="form-control" id="MONTO_GASTO" name="MONTO_GASTO" placeholder="Monto Gasto">
															<input type="hidden" id="confirmer" value="0">
														</div>
														<div class="col-md-12">
															<label for="OBS_MOVIMIENTO">Descripcion de Movimiento</label>
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
												<h2 class="card-title">Préstamo Efectivo de Caja</h2>
											</header>
											<div class="card-body">
												
													<div class="form-row">
													<div class="alert alert-danger" id="alertif" style="display:none;width:100%;text-align:center">
														<strong>Oh que mal!</strong> Aun hay espacios por completar.
													</div>
														<div class="form-group col-md-12">
															<label for="MONTO_PRESTAMO">Monto</label>
															<input type="text" class="form-control" id="MONTO_PRESTAMO" name="MONTO_PRESTAMO" placeholder="Monto Préstamo">
															<input type="hidden" id="confirmer" value="0">
														</div>
														<div class="col-md-12">
															<label for="OBS_MOVIMIENTOp">Descripcion de Movimiento</label>
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
							new PNotify({
								title: 'Confirmado!',
								text: 'Monto Inicial Modificado.',
								type: 'success'
							});
							$.magnificPopup.close();
							setTimeout(() => {
							location.reload();	
							}, 2000);
						},
						error:function(response){
							$.magnificPopup.close();
							new PNotify({
								title: 'Rechazado!',
								text: 'Hubo un error al modificar el monto inicial',
								type: 'error',
								shadow: true
							});
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
							new PNotify({
								title: 'Confirmado!',
								text: 'Gasto Añadido con éxito.',
								type: 'success'
							});
							$.magnificPopup.close();
							setTimeout(() => {
							location.reload();	
							}, 2000);
						},
						error:function(response){
							$.magnificPopup.close();
							new PNotify({
								title: 'Rechazado!',
								text: 'Hubo un error al añadir el gasto',
								type: 'error',
								shadow: true
							});
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
							new PNotify({
								title: 'Confirmado!',
								text: 'Prestamo Añadido con éxito.',
								type: 'success'
							});
							$.magnificPopup.close();
							setTimeout(() => {
							location.reload();	
							}, 2000);
						},
						error:function(response){
							$.magnificPopup.close();
							new PNotify({
								title: 'Rechazado!',
								text: 'Hubo un error al añadir el prestamo',
								type: 'error',
								shadow: true
							});
						}
					})
				}
			});
		</script>