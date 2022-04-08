
    <style>
        .dataTables_wrapper .dataTables_filter input{width:80% !important}
    </style>
	<link rel="stylesheet" href="Assets/vendor/summernote/summernote-bs4.css" />
				<div class="inner-wrapper" style="padding:0px !important">
				<section role="main" class="content-body">
					<header class="page-header">
					<h2>Lista Registro Consultas</h2>
					
						<div class="right-wrapper text-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fas fa-home"></i>
									</a>
								</li>
								<li><span>Consultas</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
                                    <header class="card-header" style="padding:30px !important">
										<a class="modal-with-form btn btn-primary" href="#modalForm1" style="float:right;margin-left:5px">Registrar</a>
										<h2 class="card-title">Registro Consultas</h2>
                                    </header>
                                    
								<div class="card-body">									
									<!-- Modal Form -->
									<div class="card-body">
                                    <div id="collapse1One" class="" data-parent="#accordion" style="">
															<div class="card-body" style="padding:0px !important">
																<header class="panel-heading tab-bg-dark-navy-blueee row">
																	<div class="col-md-4"></div>
																	<ul class="nav nav-tabs col-md-8">
																		<li class="active">
																			<a class="btn btn-default" data-toggle="tab" href="#all">Todas</a>
																		</li>
																		<li class="">
																			<a class="btn btn-default"  data-toggle="tab" href="#pending">Pendientes</a>
																		</li>
																		<li class="">
																			<a class="btn btn-default"  data-toggle="tab" href="#confirmed">Pendientes hoy</a>
																		</li>
																		<li class="">
																			<a class="btn btn-default"  data-toggle="tab" href="#treated">Atendidas</a>
																		</li>
																		<li class="">
																			<a class="btn btn-default"  data-toggle="tab" href="#cancelled">Canceladas</a>
																		</li>
																	</ul>
																</header>
																<a target="_blank" hidden="true" class="btn btn-success" href="https://web.whatsapp.com/send?phone='+573222390807'&amp;text=Hola%20cordial%20saludo%20de%20Demo Veterinaria '%20,%20para%20nosotros%20nuestros%20pacientes%20son%20importantes%20por%20eso%20te%20enviamos%20la%20formula%20de%20'Miel'%20cita%20a%20la%20cual%20asistio%20el%20'19-12-2021'%20FORMULA:%20'<p>prueba de redadcccion de formual</p>'">Whatsapp</a>
																<div class="tab-content" style="padding:0px !important">
																<br>
																<!--pendientes-->
																<div id="pending" class="tab-pane">
																		<div class="adv-table editable-table ">
																			<table class="table table-striped table-hover table-bordered" id="datatable-tabletools">                                     
                                                                                <thead>
                                                                                    <th>Consecutivo</th>
                                                                                    <th>Paciente</th>
                                                                                    <th>Fecha Consulta</th>
                                                                                    <th>Estado</th>
                                                                                    <th>Acciones</th>
                                                                                </thead>
																				<tbody>
																				<?php foreach ($queries as $query) {
																					if ($query->ESTADO_CONSULTA=='Pendiente') {
																				?>																					
																				<tr id="<?php echo $query->CONSECUTIVO_CONSULTA; ?>" ide="<?php echo $query->ID_EMPRESA; ?>">																					
																					<td class="hidden-print"><?php echo $query->CONSECUTIVO_CONSULTA; ?><br><br>
																					</td> 
                                                                                    <td><?php echo $query->NOMBRE ?></td> 
																					<td class="hidden-print">
                                                                                        <?php echo $query->FECHA_CONSULTA ?><br>
																						<b>Hora Realizado: </b><?php echo $query->HORA_CONSULTA ?>
																					</td>
																					<td class="hidden-print">
																					<?php if ($query->ESTADO_CONSULTA=='Pendiente') {?>
																							<b style="background: #00b9ff;padding: 3px 8px;border-radius: 12px;color: #fff;font-weight: 100;"><?php echo $query->ESTADO_CONSULTA ?>
																						<?php } else if($query->ESTADO_CONSULTA=='Realizado') {?>
																							<b style="background: #1fa134;padding: 3px 8px;border-radius: 12px;color: #fff;font-weight: 100;"><?php echo $query->ESTADO_CONSULTA ?>
																						<?php }else if($query->ESTADO_CONSULTA=='Cancelado'){?>
																							<b style="background: #eb4b4b;padding: 3px 8px;border-radius: 12px;color: #fff;font-weight: 100;"><?php echo $query->ESTADO_CONSULTA ?>
																						<?php } ?>
																					</td>
                                                                                    <td style="width:7%" class="hidden-print"> <a class="col-xs-12" target="_blank">
																						<i style="font-size:12px" class="fa fa-print"></i>Formula</a>
																						<?php if ($query->ESTADO_CONSULTA=='Pendiente') {?>
																						<a class="modal-with-form dropdown-item text-1 modal-edit-query" href="#modalForm4" style="background-color:#00b9ff;padding:1px 10px;border-radius:10px"><i class="fa fa-edit"></i>Atender</a>   
																					<?php } ?>
																					</td>
																				</tr>
																				<?php 
																				}
																					} ?>
																					</tbody>
																				</table>
																			</div>
																		</div><!--termina-->
								

																<!--pendientes hoy-->
																<div id="confirmed" class="tab-pane">
																	<div class="adv-table editable-table ">
																		<table class="table table-striped table-hover table-bordered" id="datatable-tabletools1">                                     
                                                                                <thead>
                                                                                    <th>Consecutivo</th>
                                                                                    <th>Paciente</th>
                                                                                    <th>Fecha Consulta</th>
                                                                                    <th>Estado</th>
                                                                                    <th>Acciones</th>
                                                                                </thead>
																			<tbody>
																				<?php 
																				$datec=date('Y-m-d');
																				foreach ($queries as $query) {
																					if ($query->ESTADO_CONSULTA=='Pendiente' AND $query->FECHA_CONSULTA==$datec) {
																				?>																					
																				<tr id="<?php echo $query->CONSECUTIVO_CONSULTA; ?>" ide="<?php echo $query->ID_EMPRESA; ?>">
																					
																					<td class="hidden-print"><?php echo $query->CONSECUTIVO_CONSULTA; ?><br><br>
																					</td>  
                                                                                    <td><?php echo $query->NOMBRE ?></td>
																					<td class="hidden-print">
                                                                                    <?php echo $query->FECHA_CONSULTA ?><br>
																					<b>Hora Programada: </b><?php echo $query->HORA_CONSULTA ?>
																					</td>
																					<td class="hidden-print">
																					<?php if ($query->ESTADO_CONSULTA=='Pendiente') {?>
																							<b style="background: #00b9ff;padding: 3px 8px;border-radius: 12px;color: #fff;font-weight: 100;"><?php echo $query->ESTADO_CONSULTA ?>
																						<?php } else if($query->ESTADO_CONSULTA=='Realizado') {?>
																							<b style="background: #1fa134;padding: 3px 8px;border-radius: 12px;color: #fff;font-weight: 100;"><?php echo $query->ESTADO_CONSULTA ?>
																						<?php }else if($query->ESTADO_CONSULTA=='Cancelado'){?>
																							<b style="background: #eb4b4b;padding: 3px 8px;border-radius: 12px;color: #fff;font-weight: 100;"><?php echo $query->ESTADO_CONSULTA ?>
																						<?php } ?>
																					</td>
                                                                                    <td style="width:7%" class="hidden-print"> <a class="col-xs-12" target="_blank">
																						<i style="font-size:12px" class="fa fa-print"></i>Formula</a>
																						<?php if ($query->ESTADO_CONSULTA=='Pendiente') {?>
																						<a class="modal-with-form dropdown-item text-1 modal-edit-query" href="#modalForm4" style="background-color:#00b9ff;padding:1px 10px;border-radius:10px"><i class="fa fa-edit"></i>Atender</a>   
																					<?php } ?>
																					</td>
																				</tr>
																				<?php 
																				}
																					} ?>
																				
																				
																				
																				</tbody>
																			</table>
																		</div>
																	</div><!--termina-->

																<!--atendidas-->
																<div id="treated" class="tab-pane">
																	<div class="adv-table editable-table ">
																		<table class="table table-striped table-hover table-bordered" id="datatable-tabletools2">                                     
                                                                        <thead>
                                                                                    <th>Consecutivo</th>
                                                                                    <th>Paciente</th>
                                                                                    <th>Fecha Consulta</th>
                                                                                    <th>Estado</th>
                                                                                    <th>Acciones</th>
                                                                                </thead>
																			<tbody>
																			<?php foreach ($queries as $query) {
																					if ($query->ESTADO_CONSULTA=='Realizado') {
																				?>																					
																				<tr id="<?php echo $query->CONSECUTIVO_CONSULTA; ?>" ide="<?php echo $query->ID_EMPRESA; ?>">
																					
																					<td class="hidden-print"><?php echo $query->CONSECUTIVO_CONSULTA; ?><br></td>  
                                                                                    <td><?php echo $query->NOMBRE ?></td>
																					<td class="hidden-print">
                                                                                        <?php echo $query->FECHA_CONSULTA ?><br>
																						<b>Hora Realizado: </b><?php echo $query->HORA_CONSULTA ?>
																					</td>
																					<td class="hidden-print">
																					<?php if ($query->ESTADO_CONSULTA=='Pendiente') {?>
																							<b style="background: #00b9ff;padding: 3px 8px;border-radius: 12px;color: #fff;font-weight: 100;"><?php echo $query->ESTADO_CONSULTA ?>
																						<?php } else if($query->ESTADO_CONSULTA=='Realizado') {?>
																							<b style="background: #1fa134;padding: 3px 8px;border-radius: 12px;color: #fff;font-weight: 100;"><?php echo $query->ESTADO_CONSULTA ?>
																						<?php }else if($query->ESTADO_CONSULTA=='Cancelado'){?>
																							<b style="background: #eb4b4b;padding: 3px 8px;border-radius: 12px;color: #fff;font-weight: 100;"><?php echo $query->ESTADO_CONSULTA ?>
																						<?php } ?>
																					</td>
                                                                                    <td style="width:7%" class="hidden-print"> <a class="col-xs-12" target="_blank">
																						<i style="font-size:12px" class="fa fa-print"></i>Formula</a>
																						<?php if ($query->ESTADO_CONSULTA=='Pendiente') {?>
																						<a class="modal-with-form dropdown-item text-1 modal-edit-query" href="#modalForm4" style="background-color:#00b9ff;padding:1px 10px;border-radius:10px"><i class="fa fa-edit"></i>Atender</a>   
																					<?php } ?>
																					</td>
																				</tr>
																				<?php 
																				}
																					} ?>
																				
																				
																				
																				</tbody>
																			</table>
																		</div>
																	</div><!--termina-->


																<!--canceladas-->
																<div id="cancelled" class="tab-pane">
																	<div class="adv-table editable-table ">
																		<table class="table table-striped table-hover table-bordered" id="datatable-tabletools3"> 
                                                                        <thead>
                                                                                    <th>Consecutivo</th>
                                                                                    <th>Paciente</th>
                                                                                    <th>Fecha Consulta</th>
                                                                                    <th>Estado</th>
                                                                                    <th>Acciones</th>
                                                                                </thead>                                    
																			<tbody>
																			<?php foreach ($queries as $query) {
																					if ($query->ESTADO_CONSULTA=='Cancelado') {
																				?>																					
																				<tr id="<?php echo $query->CONSECUTIVO_CONSULTA; ?>" ide="<?php echo $query->ID_EMPRESA; ?>">
																					
																					<td class="hidden-print"><?php echo $query->CONSECUTIVO_CONSULTA; ?>
																					</td>  
                                                                                    <td><?php echo $query->NOMBRE ?></td>
																					<td class="hidden-print">
                                                                                    <?php echo $query->FECHA_CONSULTA ?><br>
																						<b>Hora Cancelado: </b><?php echo $query->HORA_CONSULTA ?>
																					</td>
																					<td class="hidden-print">
																					<?php if ($query->ESTADO_CONSULTA=='Pendiente') {?>
																							<b style="background: #00b9ff;padding: 3px 8px;border-radius: 12px;color: #fff;font-weight: 100;"><?php echo $query->ESTADO_CONSULTA ?>
																						<?php } else if($query->ESTADO_CONSULTA=='Realizado') {?>
																							<b style="background: #1fa134;padding: 3px 8px;border-radius: 12px;color: #fff;font-weight: 100;"><?php echo $query->ESTADO_CONSULTA ?>
																						<?php }else if($query->ESTADO_CONSULTA=='Cancelado'){?>
																							<b style="background: #eb4b4b;padding: 3px 8px;border-radius: 12px;color: #fff;font-weight: 100;"><?php echo $query->ESTADO_CONSULTA ?>
																						<?php } ?>
																					</td>
                                                                                    <td style="width:7%" class="hidden-print"> <a class="col-xs-12" target="_blank">
																						<i style="font-size:12px" class="fa fa-print"></i>Formula</a>
																						<?php if ($query->ESTADO_CONSULTA=='Pendiente') {?>
																						<a class="modal-with-form dropdown-item text-1 modal-edit-query" href="#modalForm4" style="background-color:#00b9ff;padding:1px 10px;border-radius:10px"><i class="fa fa-edit"></i>Atender</a>   
																					<?php } ?>
																					</td>
																				</tr>
																				<?php 
																				}
																					} ?>
																				
																				
																				
																				</tbody>
																			</table>
																		</div>
																	</div><!--termina-->

																<!--todas-->
																<div id="all" class="tab-pane active">
																	<div class="adv-table editable-table ">
																	<table class="table table-striped table-hover table-bordered" id="datatable-tabletools4">                                     
                                                                            <thead>
                                                                                    <th>Consecutivo</th>
                                                                                    <th>Paciente</th>
                                                                                    <th>Fecha Consulta</th>
                                                                                    <th>Estado</th>
                                                                                    <th>Acciones</th>
                                                                                </thead>                                    
																			<tbody>
																				<?php foreach ($queries as $query) {?>																					
																				<tr id="<?php echo $query->CONSECUTIVO_CONSULTA; ?>" ide="<?php echo $query->ID_EMPRESA; ?>">
																					
																					<td class="hidden-print"><?php echo $query->CONSECUTIVO_CONSULTA; ?>
																					</td>  
                                                                                    <td><?php echo $query->NOMBRE ?></td>
																					<td class="hidden-print">
                                                                                        <?php echo $query->FECHA_CONSULTA ?><br>
																						<b>Hora Realizado: </b><?php echo $query->HORA_CONSULTA ?>
																					</td>
																					<td class="hidden-print" style="width:200px;font-size:12px">
																					<?php if ($query->ESTADO_CONSULTA=='Pendiente') {?>
																							<b style="background: #00b9ff;padding: 3px 8px;border-radius: 12px;color: #fff;font-weight: 100;"><?php echo $query->ESTADO_CONSULTA ?>
																						<?php } else if($query->ESTADO_CONSULTA=='Realizado') {?>
																							<b style="background: #1fa134;padding: 3px 8px;border-radius: 12px;color: #fff;font-weight: 100;"><?php echo $query->ESTADO_CONSULTA ?>
																						<?php }else if($query->ESTADO_CONSULTA=='Cancelado'){?>
																							<b style="background: #eb4b4b;padding: 3px 8px;border-radius: 12px;color: #fff;font-weight: 100;"><?php echo $query->ESTADO_CONSULTA ?>
																						<?php } ?>
																					</td>
                                                                                    <td style="width:7%" class="hidden-print"> <a class="col-xs-12" target="_blank"><i style="font-size:12px" class="fa fa-print"></i>Formula</a>
																					<?php if ($query->ESTADO_CONSULTA=='Pendiente') {?>
																						<a class="modal-with-form dropdown-item text-1 modal-edit-query" href="#modalForm4" style="background-color:#00b9ff;padding:1px 10px;border-radius:10px"><i class="fa fa-edit"></i>Atender</a>   
																					<?php } ?>
																					</td>
																				</tr>
																				<?php } ?>
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


                    <div class="card-body">

                    <div id="modalForm1" class="modal-block modal-block-primary mfp-hide" style="max-width:800px !important">
										<section class="card">
											<header class="card-header">
												<h2 class="card-title">Formulario de Registro Consulta</h2>
											</header>
											<div class="card-body">
												<form>
													<div class="form-row">
													<div class="alert alert-danger" id="alertif" style="display:none;width:100%;text-align:center">
														<strong>Oh que mal!</strong> Aun hay espacios por completar.
													</div>
													</div>
													<input type="hidden" name="ID_EMPRESA" id="ID_EMPRESA" value="<?php echo $_SESSION['user']->ID_EMPRESA ?>">
													<input type="hidden" name="HOURC" id="HOURC" value="<?php echo date('H:s'); ?>">
													<div class="form-row">
													<div class="form-group col-md-6 mb-3 mb-lg-0">
															<label for="ID_PROP">Propietario:</label>
                                                            <select name="ID_PROP" id="ID_PROP" class="form-control" placeholder="Propietario" required>
                                                                <option value="Seleccione..." Selected>Seleccione...</option>
																<?php foreach ($owners as $owner) {?>
																	<option value="<?php echo $owner->ID_PROP ?>"><?php echo $owner->ST_NOM." ".$owner->ND_NOM." ".$owner->ST_APE." ".$owner->ND_APE ?></option>
																<?php } ?>
                                                            </select>
														</div>
														<div class="form-group col-md-6 mb-3 mb-lg-0">
															<label for="ID_MASCOTA">Paciente:</label>
                                                            <select name="ID_MASCOTA" id="ID_MASCOTA" class="form-control" placeholder="Paciente" required>
                                                            </select>
														</div>
													</div>
													<div class="form-row">
														<div class="col-md-12">
															<label for="TIPO_CONSULTA">Tipo Consulta</label>
															<select name="TIPO_CONSULTA" id="TIPO_CONSULTA" class="form-control" required>
																<option value="Seleccione">Seleccione...</option>
																<option value="immediately">Inmediata</option>
																<option value="schedule">Programar</option>
															</select>
														</div>
													</div>
													<input type="hidden" id="confirmer" value="0">
													<div style="display:none" id="schedule">
														<form action="index.php" >
														<div class="form-row" >
															<div class="col-md-6 mb-3 mb-lg-0">
																<label for="FECHA_CONSULTA">Fecha Consulta </label>
																<input type="date" id="FECHA_CONSULTA" name="FECHA_CONSULTA" class="form-control" required min=<?php echo date('Y-m-d'); ?>>															
															</div>												
															<div class="col-md-6 mb-3 mb-lg-0">
																<label for="HORA_CONSULTA">Hora Consulta </label>
																<input type="time" id="HORA_CONSULTA" name="HORA_CONSULTA" class="form-control" required>															
															</div>												
														</div>
														<div class="form-row">
															<div class="col-md-12 mb-6 mb-lg-0">
																<label for="OBSERVACIONES1">Observaciones</label>
																<textarea class="form-control" rows="2" id="OBSERVACIONES1" data-plugin-textarea-autosize="" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 60px;"></textarea>
															</div>
														</div>	
														<br>
														<footer class="card-footer">
															<div class="row">
																<div class="col-md-12 text-right">
																	<button class="btn btn-primary modal-confirm" id="scheduleQuery">Agendar</button>
																	<button class="btn btn-default modal-dismiss" >Cancelar</button>
																</div>
															</div>
														</footer>
														</form>
													</div>
											<div style="display:none" id="immediately">
													<form action="index.php1" >
													<div class="form-row">
														<div class="col-md-12 mb-6 mb-lg-0">
															<input type="hidden" value="<?php echo date("Y-m-d"); ?>" id="FECHA_CONSULTA1" name="FECHA_CONSULTA1">
															<label for="ANTECEDENTES">Antecedentes</label>
															<textarea class="form-control" rows="3" id="ANTECEDENTES" data-plugin-textarea-autosize="" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 80px;"></textarea>
														</div>
													</div>	
													<br>
													<div class="form-row">
														<div class="col-md-12 mb-6 mb-lg-0">
															<label for="SINTOMAS">Sintomas</label>
															<textarea class="form-control" rows="3" id="SINTOMAS" data-plugin-textarea-autosize="" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 80px;"></textarea>
														</div>
													</div>	
													<br>
													<div class="form-row">
														<div class="col-md-12 mb-6 mb-lg-0">
															<label for="DIAGNOSTICO">Diagnostico</label>
															<textarea class="form-control" rows="3" id="DIAGNOSTICO" data-plugin-textarea-autosize="" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 80px;"></textarea>
														</div>
													</div>
													<br>	
													<div class="form-row">
														<div class="col-md-12 mb-6 mb-lg-0">
															<label for="OBSERVACIONES">Observaciones</label>
															<!-- <textarea class="form-control" rows="3" id="OBSERVACIONES" data-plugin-textarea-autosize="" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 120px;">
                                                                    FC:
                                                                    FR:
                                                                    Peso (Kg):
                                                                    C.C:
                                                                    Temperatura:
                                                                    Mucosas:
                                                                    Sistema Digestivo:
                                                                    Sistema Respiratorio:
                                                                    Sistema Circulatorio:
                                                                    Sistema Urinario:
                                                                    Sistema Genital:
                                                                    Sistema Nervioso:
                                                                    Sistema Locomotor:
                                                                    Sistema Tegumentario:
                                                                    Muestras remitidas:</textarea> -->
												<div class="col-lg-12">
													<div class="summernote" data-plugin-summernote data-plugin-options='{ "height": 180,"codemirror": { "theme": "ambiance" } }'>
														<p>FC: <br>
														FR: <br>
														Peso (Kg): <br>
														C.C: <br>
														Temperatura: <br>
														Mucosas: <br>
														Sistema Digestivo: <br>
														Sistema Respiratorio: <br>
														Sistema Circulatorio: <br>
														Sistema Urinario: <br>
														Sistema Genital: <br>
														Sistema Nervioso: <br>
														Sistema Locomotor: <br>
														Sistema Tegumentario: <br>
														Muestras remitidas:</p>
													</div>
												</div>
														</div>
													</div>
													<br>
													<div class="form-row">
														<div class="col-md-12 mb-6 mb-lg-0">
															<label for="FORMULA">Redaccion de Formula/Notas</label>
															<textarea class="form-control" rows="3" id="FORMULA" data-plugin-textarea-autosize="" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 80px;"></textarea>
														</div>
													</div>
													<br>
													<div class="form-row">
														<label class="col-lg-12 control-label pt-2">Receta de Medicamentos</label>
														<div class="form-group">
														<button type="button" class="btn btn-primary btn-xs mr-2" onclick="agregarFila()">+</button>
														<button type="button" class="btn btn-danger btn-xs" onclick="eliminarFila()">-</button>
														<input type="hidden" value="1" id="num">
													</div>
													</div>
													<br>
													<div class="row">
														<div class="col-lg-12 pull-right">
															<table id="tableMedicines" style="width:100%">
																<tbody>
																	<tr>
																		<td style="width:200px"><label for="medicineName">Medicina</label><select name="medicineName" id="medicineName" class="form-control"><option value="Ninguno">Ninguno</option><?php foreach ($products as $product) {?>
																			<option value="<?php echo $product->NOM_PRO ?>"><?php echo $product->NOM_PRO ?></option>
																		<?php } ?></select></td>
																		<td><label for="medicineDosis">Dosis</label><input type="text" name="medicineDosis" id="medicineDosis" class="form-control" placeholder="1cm3"></td>
																		<td><label for="medicineFrequency">Frecuencia</label><input type="text" name="medicineFrequency" id="medicineFrequency" class="form-control" placeholder="1xdia"></td>
																		<td><label for="medicineDays">Dias</label><input type="text" name="medicineDays" id="medicineDays" class="form-control" placeholder="x8dias"></td>
																		<td><label for="medicineInstruction">Instrucción</label><input type="text" name="medicineInstruction" id="medicineInstruction" class="form-control" placeholder=	"Despues de Comer"></td>
																	</tr>
																</tbody>
															</table>
														</div>
													</div>
													<div class="row">
														<div class="col-lg-4 pull-right">
															<label for="PRECIO_CONSULTA">Precio</label>
															<input type="text" id="PRECIO_CONSULTA" name="PRECIO_CONSULTA" class="form-control">
														</div>
													</div>
												<br><br>
													</form>			
												</form>
											
												<footer class="card-footer">
													<div class="row">
														<div class="col-md-12 text-right">
															<button class="btn btn-primary modal-confirm" id="createQuery" >Crear</button>
															<button class="btn btn-default modal-dismiss" >Cancelar</button>
														</div>
													</div>
												</footer>
											</div>

											<div id="modalForm4" class="modal-block modal-block-primary mfp-hide" style="max-width:800px !important">
										<section class="card">
											<header class="card-header">
												<h2 class="card-title">Formulario de Registro Consulta</h2>
											</header>
											<div class="card-body">
													<div class="form-row">
													<div class="alert alert-danger" id="alertif" style="display:none;width:100%;text-align:center">
														<strong>Oh que mal!</strong> Aun hay espacios por completar.
													</div>
													</div>
													<input type="hidden" name="HOURC" id="HOURCE" value="<?php echo date('H:s'); ?>">
													<input type="hidden" id="confirmer" value="0">
											<div id="immediately">
													<form action="" >
													<div class="form-row">
														<div class="col-md-12 mb-6 mb-lg-0">
															<input type="hidden" value="<?php echo date("Y-m-d"); ?>" id="FECHA_CONSULTA1" name="FECHA_CONSULTA1">
															<label for="ANTECEDENTES">Antecedentes</label>
															<textarea class="form-control" rows="3" id="ANTECEDENTES" data-plugin-textarea-autosize="" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 80px;"></textarea>
														</div>
													</div>	
													<br>
													<div class="form-row">
														<div class="col-md-12 mb-6 mb-lg-0">
															<label for="SINTOMAS">Sintomas</label>
															<textarea class="form-control" rows="3" id="SINTOMAS" data-plugin-textarea-autosize="" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 80px;"></textarea>
														</div>
													</div>	
													<br>
													<div class="form-row">
														<div class="col-md-12 mb-6 mb-lg-0">
															<label for="DIAGNOSTICO">Diagnostico</label>
															<textarea class="form-control" rows="3" id="DIAGNOSTICO" data-plugin-textarea-autosize="" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 80px;"></textarea>
														</div>
													</div>
													<br>	
													<div class="form-row">
														<div class="col-md-12 mb-6 mb-lg-0">
															<label for="OBSERVACIONES">Observaciones</label>
												<div class="col-lg-12">
													<div class="summernote" data-plugin-summernote data-plugin-options='{ "height": 180,"codemirror": { "theme": "ambiance" } }'>
														<p>FC: <br>
														FR: <br>
														Peso (Kg): <br>
														C.C: <br>
														Temperatura: <br>
														Mucosas: <br>
														Sistema Digestivo: <br>
														Sistema Respiratorio: <br>
														Sistema Circulatorio: <br>
														Sistema Urinario: <br>
														Sistema Genital: <br>
														Sistema Nervioso: <br>
														Sistema Locomotor: <br>
														Sistema Tegumentario: <br>
														Muestras remitidas:</p>
													</div>
												</div>
														</div>
													</div>
													<br>
													<div class="form-row">
														<div class="col-md-12 mb-6 mb-lg-0">
															<label for="FORMULA">Redaccion de Formula/Notas</label>
															<textarea class="form-control" rows="3" id="FORMULA" data-plugin-textarea-autosize="" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 80px;"></textarea>
														</div>
													</div>
													<br>
													<div class="form-row">
														<label class="col-lg-12 control-label pt-2">Receta de Medicamentos</label>
														<div class="form-group">
														<button type="button" class="btn btn-primary btn-xs mr-2" onclick="agregarFila()">+</button>
														<button type="button" class="btn btn-danger btn-xs" onclick="eliminarFila()">-</button>
														<input type="hidden" value="1" id="num">
													</div>
													</div>
													<br>
													<div class="row">
														<div class="col-lg-12 pull-right">
															<table id="tableMedicines" style="width:100%">
																<tbody>
																	<tr>
																		<td style="width:200px"><label for="medicineName">Medicina</label><select name="medicineName" id="medicineName" class="form-control"><option value="Ninguno">Ninguno</option><?php foreach ($products as $product) {?>
																			<option value="<?php echo $product->NOM_PRO ?>"><?php echo $product->NOM_PRO ?></option>
																		<?php } ?></select></td>
																		<td><label for="medicineDosis">Dosis</label><input type="text" name="medicineDosis" id="medicineDosis" class="form-control" placeholder="1cm3"></td>
																		<td><label for="medicineFrequency">Frecuencia</label><input type="text" name="medicineFrequency" id="medicineFrequency" class="form-control" placeholder="1xdia"></td>
																		<td><label for="medicineDays">Dias</label><input type="text" name="medicineDays" id="medicineDays" class="form-control" placeholder="x8dias"></td>
																		<td><label for="medicineInstruction">Instrucción</label><input type="text" name="medicineInstruction" id="medicineInstruction" class="form-control" placeholder=	"Despues de Comer"></td>
																	</tr>
																</tbody>
															</table>
														</div>
													</div>
													<div class="row">
														<div class="col-lg-4 pull-right">
															<label for="PRECIO_CONSULTA">Precio</label>
															<input type="text" id="PRECIO_CONSULTA" name="PRECIO_CONSULTA" class="form-control">
														</div>
													</div>
												<br><br>
													</form>			
											
												<footer class="card-footer">
													<div class="row">
														<div class="col-md-12 text-right">
															<button class="btn btn-primary modal-confirm" id="editQuery" >Crear</button>
															<button class="btn btn-default modal-dismiss" >Cancelar</button>
														</div>
													</div>
												</footer>
											</div>
										</section>
									</div>
										</section>
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
		<script src="Assets/js/examples/examples.modals.js"></script>
		<script src="Assets/vendor/summernote/summernote-bs4.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
		<script>
					(function($) {

						'use strict';

						if ( $.isFunction($.fn[ 'summernote' ]) ) {

							$(function() {
								$('[data-plugin-summernote]').each(function() {
									var $this = $( this ),
										opts = {};

									var pluginOptions = $this.data('plugin-options');
									if (pluginOptions)
										opts = pluginOptions;

									$this.themePluginSummerNote(opts);
								});
							});

						}

						}).apply(this, [jQuery]);
				</script>
    <script>

			$('#PRECIO_CONSULTA').mask('#.##0', {reverse: true});
			$('#PRECIO_CONSULTAE').mask('#.##0', {reverse: true});

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
		<script>
					$('#TIPO_CONSULTA').on('change',function(){
						var x = $('#TIPO_CONSULTA').val();
						if(x=='schedule'){
							$('#schedule').css('display','block');
							$('#immediately').css('display','none');
						}else if(x=='immediately'){
							$('#immediately').css('display','block');
							$('#schedule').css('display','none');
						}
					});
				</script>
				<script>
					$(document).on('click','.modal-edit-query',function(){
						let element = $(this)[0].parentElement.parentElement;
						let id = $(element).attr('id');
						let ide= $(element).attr('ide');
						$('#editQuery').click(function(){
							editQuery(id);
						}) ;

					});
					
					/* 
	Edit query
	*/

	function editQuery(id) {
		var confirmer;
			if($("#FECHA_CONSULTA1").val().length < 1) {
				$('#FECHA_CONSULTA1').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#FECHA_CONSULTA1').css('border','1px solid green');
				$('#alertif').css('display','none');
			}
			if($("#ANTECEDENTES").val().length < 1) {
				$('#ANTECEDENTES').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#ANTECEDENTES').css('border','1px solid green');
				$('#alertif').css('display','none');
			} 
			if($("#SINTOMAS").val().length < 1) {
				$('#SINTOMAS').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#SINTOMAS').css('border','1px solid green');
				$('#alertif').css('display','none');
			} 
			if($("#DIAGNOSTICO").val().length < 1) {
				$('#DIAGNOSTICO').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#DIAGNOSTICO').css('border','1px solid green');
				$('#alertif').css('display','none');
			}
			if($("#FORMULA").val().length < 1) {
				$('#FORMULA').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#FORMULA').css('border','1px solid green');
				$('#alertif').css('display','none');
			}
			if($("#medicineName").val()=='Ninguno') {
				$('#medicineName').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#medicineName').css('border','1px solid green');
				$('#alertif').css('display','none');
			}
			if($("#medicineDosis").val().length < 1) {
				$('#medicineDosis').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#medicineDosis').css('border','1px solid green');
				$('#alertif').css('display','none');
			}
			if($("#medicineFrequency").val().length < 1) {
				$('#medicineFrequency').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#medicineFrequency').css('border','1px solid green');
				$('#alertif').css('display','none');
			}
			if($("#medicineDays").val().length < 1) {
				$('#medicineDays').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#medicineDays').css('border','1px solid green');
				$('#alertif').css('display','none');
			}
			if($("#medicineInstruction").val().length < 1) {
				$('#medicineInstruction').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#medicineInstruction').css('border','1px solid green');
				$('#alertif').css('display','none');
				$('#confirmer').val("1");
			}
			var receta = $('#medicineName').val()+'<br> <b>Dosis:</b> '+$('#medicineDosis').val()+'<br> <b>Frecuencia:</b> '+$('#medicineFrequency').val()+'<br> <b>Dias:</b> '+$('#medicineDays').val()+'<br> <b>Uso:</b> '+$('#medicineInstruction').val();
			var num = $('#num').val();
				for (let index = 1; index < num ; index++) {
					var restrecet=$('#medicineName'+index).val()+'<br> <b>Dosis:</b> '+$('#medicineDosis'+index).val()+'<br> <b>Frecuencia:</b> '+$('#medicineFrequency'+index).val()+'<br> <b>Dias:</b> '+$('#medicineDays'+index).val()+'<br> <b>Uso:</b> '+$('#medicineInstruction'+index).val();
					receta+="-"+restrecet;
				}
			confirmer=$('#confirmer').val();
			if (confirmer=='1') {
				
				$.ajax({
					type: 'POST',
					url: '?controller=query&method=editQuery1',
					data: 'ID_EMPRESA='+$('#ID_EMPRESA').val()+'&FECHA_CONSULTA='+$('#FECHA_CONSULTA1').val()+'&ANTECEDENTES='+$('#ANTECEDENTES').val()+'&OBSERVACIONES='+$('#OBSERVACIONES').html()+'&SINTOMAS='+$('#SINTOMAS').val()+'&DIAGNOSTICO='+$('#DIAGNOSTICO').val()+'&FORMULA='+$('#FORMULA').val()+'&RECETA='+receta+'&HORA_CONSULTA='+$('#HOURC').val()+'&ESTADO_CONSULTA=Realizado&id='+id+'&PRECIO_CONSULTA='+$('#PRECIO_CONSULTAE').val(),
					success: function(data){
						console.log(data);			
						new PNotify({
							title: 'Confirmado!',
							text: 'Consulta Editada Exitosamente.', 
							type: 'success'
						});
						$.magnificPopup.close();
						setTimeout(() => {
						location.reload();	
						}, 2000);
					},
					error: function(data){
						$.magnificPopup.close();	
						new PNotify({
							title: 'Rechazado!',
							text: 'Hubo un error al Editar la consulta',
							type: 'error',
							shadow: true
						});
					}
					});	
				}
				};
				
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

				var count = "1";
					function agregarFila(){
						
						if (count == 10) {
							alert("Maximo de artículos alcanzados en una orden!");
						}else{

					document.getElementById("tableMedicines").insertRow(-1).innerHTML = '<tr><td style="width:200px"><label for="medicineName">Medicina</label><select name="medicineName'+count+'" id="medicineName'+count+'" class="form-control"><?php foreach ($products as $product) {?><option value="<?php echo $product->NOM_PRO ?>"><?php echo $product->NOM_PRO ?></option><?php } ?></select></td><td><label for="medicineDosis">Dosis</label><input type="text" name="medicineDosis'+count+'" id="medicineDosis'+count+'" class="form-control" placeholder="1cm3"></td><td><label for="medicineFrequency">Frecuencia</label><input type="text" name="medicineFrequency'+count+'" id="medicineFrequency'+count+'" class="form-control" placeholder="1xdia"></td><td><label for="medicineDays">Dias</label><input type="text" name="medicineDays'+count+'" id="medicineDays'+count+'" class="form-control" placeholder="x8dias"></td><td><label for="medicineInstruction">Instrucción</label><input type="text" name="medicineInstruction'+count+'" id="medicineInstruction'+count+'" class="form-control" placeholder="Despues de Comer"></td></tr>';
						count= parseInt(count)+1;
					document.getElementById('num').value=count;   
					}

						
					}

					function eliminarFila(){
					var table = document.getElementById("tableMedicines");
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