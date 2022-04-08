<style>
	#profile_data > li {padding:0px !important}
</style>
<link rel="stylesheet" href="Assets/vendor/summernote/summernote-bs4.css" />
<section role="main" class="content-body">
					<header class="page-header">
						<h2>Perfil del Paciente</h2>
					
						<div class="right-wrapper text-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fas fa-home"></i>
									</a>
								</li>
								<li><span>Pacientes</span></li>
								<li><span>Perfil</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->

					<div class="row">
						<div class="col-lg-4 col-xl-3 mb-4 mb-xl-0">

							<section class="card">
								<div class="card-body">
									<div class="thumb-info mb-3">
                                    <?php foreach($data as $data){?>
                                    <img src="Pets/<?php echo $data->ID_MASCOTA ?>/<?php echo $data->NOMBRE ?>.jpg" alt="Foto Paciente" class="rounded img-fluid" >
										<div class="thumb-info-title">
												<span class="thumb-info-inner" id="name"><?php echo $data->NOMBRE ?></span>																						
												<span class="thumb-info-type"><?php echo $data->TIPO ?></span>
										</div>
									</div>
                                    <hr class="dotted short">

									<div class="widget-content-expanded">
											<ul class="simple-todo-list mt-3" id="profile_data">
												<li class="fa fa-heart"> Estado:</li> <?php echo $data->ESTADO_MASCOTA ?><br>
												<li class="fa fa-info-circle" style="color:red"> Edad:</li> <?php echo ($age->y == 0) ? $age->m." Meses" : $age->y." Años"; ?><br>
												<li class="fa fa-info-circle" style="color:blue"> Raza:</li> <?php echo $data->RAZA?><br>
												<li class="fa fa-info-circle" style="color:green"> Sexo:</li> <?php echo $data->SEXO?><br>
												<li class="fa fa-info-circle" style="color:orange"> Color:</li> <?php echo $data->COLOR?><br>
												<li class="fa fa-info-circle" style="color:pink"> Nacimiento:</li> <?php echo $data->FEC_NAC?><br>
												<li class="fa fa-info-circle" style="color:purple"> Peso(Kg):</li> <?php echo $data->PESO?><br>
												<li class="fa fa-info-circle" style="color:#16decd"> Dieta:</li> <?php echo $data->DIETA?><br>
												<li class="fa fa-info-circle" style="color:#de16de"> Anormalidades:</li> <?php echo $data->ANORMALIDADES?><br>
												<li class="fa fa-info-circle" style="color:black"> Anamnesis:</li> <?php echo $data->ANAMNESIS?>
											</ul>
										</div>
								</div>
							</section>
							<section class="card card-collapsed">
								<header class="card-header">
									<div class="card-actions">
										<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
									</div>

									<h2 class="card-title">
										<span class="badge badge-primary label-sm font-weight-normal va-middle mr-3"><?php echo $ownersc; ?></span>
										<span class="va-middle">Propietarios</span>
									</h2>
								</header>
								<div class="card-body">
									<div class="content">
										<ul class="simple-user-list">
											<?php foreach ($ownerss as $ownerl) {?>
												<a href="?controller=owner&method=profileOwner&id=<?php echo $ownerl->ID_PROP ?>" style="color:grey;text-decoration:none">
												<li>
												<figure class="image rounded">
													<img src="Assets/img/hombre.jpg" alt="Joseph Doe Junior" class="rounded-circle" height="50" width="50">
												</figure>
												<span class="title"><?php echo $ownerl->ST_NOM." ".$ownerl->ST_APE ?></span>
												<span class="message truncate">Propietario</span>
												</a>
											</li>
											<hr class="dotted short">
											<?php } ?>
										</ul>
									</div>
								</div>
							</section>
							<?php 
									$filess= scandir('pets/'.$data->ID_MASCOTA);
									$countf= count($filess);
							?>
							<section class="card card-collapsed">
								<header class="card-header">
									<div class="card-actions">
										<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
									</div>
									<h2 class="card-title">
										<span class="badge badge-primary label-sm font-weight-normal va-middle mr-3"><?php echo $countf-3; ?></span>
										<span class="va-middle">Archivos</span>
									</h2>
								</header>
								<div class="card-body">
										<ul class="simple-post-list">
									<?php
									for ($i=2; $i < $countf-1 ; $i++) {
									$name=explode('@',$filess[$i]);
									?>
										<a href="pets/<?php echo $data->ID_MASCOTA ?>/<?php echo $filess[$i] ?>" download="pets/<?php echo $data->ID_MASCOTA ?>/<?php echo $filess[$i] ?>" style="color:grey;text-decoration:none">
											<li>
												<div class="post-image">
													<div class="img-thumbnail">
															<img src="Assets/img/pdf.png" height="50" >
													</div>
												</div>
												<div class="post-info">
													<?php echo $name[1]; ?>
													<div class="post-meta">
														<?php echo "Creado: ".$name[0]; ?>
													</div>
												</div>
											</li>
										</a>
								<?php 
									}
								?>
										</ul>
									</div>
								

								<div class="card-footer">
									Cargar Archivo
										<div class="fileupload fileupload-new" data-provides="fileupload">
											<div class="input-append">
												<div class="uneditable-input">
													<span class="fileupload-preview"></span>
												</div>
												<span class="btn btn-default btn-file">
												<span class="fileupload-exists">Cambiar</span>
												<span class="fileupload-new">Seleccionar</span>
												<input type="file" id="archivetoupload">
												</span>
												<a href="#" class="btn btn-default fileupload-exists" id="fileupload">Guardar</a>
											</div>
										</div>
								</div>
							</section>

						</div>
						<div class="col-lg-8 col-xl-6">

							<div class="tabs">
								<ul class="nav nav-tabs tabs-primary">
									<li class="nav-item active">
										<a class="nav-link" href="#overview" data-toggle="tab">Información general</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#edit" data-toggle="tab">Editar</a>
									</li>
								</ul>
								<div class="tab-content">
									<div id="overview" class="tab-pane active">
										
										<div class="row">
											<div class="col">
												<div class="accordion" id="accordion">
													<div class="card card-default">
														<div class="card-header">
															<h4 class="card-title m-0">
																<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse1One" aria-expanded="false" id="hc">
																<i class="fa fa-plus"></i>
																	Historia Clinica
																</a>
															</h4>
														</div>
														<div id="collapse1One" class="collapse" data-parent="#accordion" style="">
															<div class="card-body" style="padding:0px !important">
																<header class="panel-heading tab-bg-dark-navy-blueee row">
																	<div class="col-md-2"></div>
																	<ul class="nav nav-tabs col-md-10">
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
																
																<!--pendientes-->
																<div id="pending" class="tab-pane">
																		<div class="adv-table editable-table ">
																			<table class="table table-striped table-hover table-bordered" id="">                                     
																				<tbody>
																				<?php foreach ($queries as $query) {
																					if ($query->ESTADO_CONSULTA=='Pendiente') {
																				?>																					
																				<tr id="<?php echo $query->CONSECUTIVO_CONSULTA; ?>" ide="<?php echo $query->ID_EMPRESA; ?>">
																					<td style="width:90px" class="hidden-print"> <a class="col-xs-12" target="_blank">
																						<i style="font-size:12px" class="fa fa-print"></i>Formula</a>
																						<?php if ($query->ESTADO_CONSULTA=='Pendiente') {?>
																						<a class="modal-with-form dropdown-item text-1 modal-edit-query" href="#modalForm4" style="background-color:#00b9ff;padding:1px 10px;border-radius:10px"><i class="fa fa-edit"></i>Atender</a>   
																					<?php } ?>
																					</td>
																					<td class="hidden-print"><b>N° de consulta:</b> <?php echo $query->CONSECUTIVO_CONSULTA; ?><br><br>
																						<b>Fecha de consulta: </b><?php echo $query->FECHA_CONSULTA ?><br>
																						<b>Hora Programada: </b><?php echo $query->HORA_CONSULTA ?>
																						<br><br>
																						<?php if ($query->ESTADO_CONSULTA=='Pendiente') {?>
																							<b style="background: #00b9ff;padding: 3px 8px;border-radius: 12px;color: #fff;font-weight: 100;"><?php echo $query->ESTADO_CONSULTA ?>
																						<?php } else if($query->ESTADO_CONSULTA=='Realizado') {?>
																							<b style="background: #1fa134;padding: 3px 8px;border-radius: 12px;color: #fff;font-weight: 100;"><?php echo $query->ESTADO_CONSULTA ?>
																						<?php }else if($query->ESTADO_CONSULTA=='Cancelado'){?>
																							<b style="background: #eb4b4b;padding: 3px 8px;border-radius: 12px;color: #fff;font-weight: 100;"><?php echo $query->ESTADO_CONSULTA ?>
																						<?php } ?>
																						
																					</td>  
																					<td class="hidden-print">
																						<h5><b>Sintomas:</b></h5> <?php echo $query->SINTOMAS ?>
																						<br>
																						<h5><b>Antecedentes:</b></h5> <?php echo $query->ANTECEDENTES ?>
																						<br>
																						<h5><b>Diagnostico:</b></h5> <?php echo $query->DIAGNOSTICO ?>
																						</td>
																						<td class="hidden-print" style="width:200px;font-size:12px"><h5><b>Observaciones:</b> </h5>
																						<?php echo $query->OBSERVACIONES ?>
																					</td>
																					<td class="hidden-print">
																					<?php 
																					$consulta=explode('-',$query->RECETA);
																					$count=count($consulta);
																					for ($j=0; $j < $count ; $j++) { ?>
																						<?php echo "<b>Nombre:</b> ".$consulta[$j]."<br>"?>
																					<?php } ?>
																					<br>
																						<b>Notas:</b> <?php echo $query->FORMULA ?>
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
																		<table class="table table-striped table-hover table-bordered" id="">                                     
																			<tbody>
																				<?php 
																				$datec=date('Y-m-d');
																				foreach ($queries as $query) {
																					if ($query->ESTADO_CONSULTA=='Pendiente' AND $query->FECHA_CONSULTA==$datec) {
																				?>																					
																				<tr id="<?php echo $query->CONSECUTIVO_CONSULTA; ?>" ide="<?php echo $query->ID_EMPRESA; ?>">
																					<td style="width:90px" class="hidden-print"> <a class="col-xs-12" target="_blank">
																						<i style="font-size:12px" class="fa fa-print"></i>Formula</a>
																						<?php if ($query->ESTADO_CONSULTA=='Pendiente') {?>
																						<a class="modal-with-form dropdown-item text-1 modal-edit-query" href="#modalForm4" style="background-color:#00b9ff;padding:1px 10px;border-radius:10px"><i class="fa fa-edit"></i>Atender</a>   
																					<?php } ?>
																					</td>
																					<td class="hidden-print"><b>N° de consulta:</b> <?php echo $query->CONSECUTIVO_CONSULTA; ?><br><br>
																						<b>Fecha de consulta: </b><?php echo $query->FECHA_CONSULTA ?><br>
																						<b>Hora Programada: </b><?php echo $query->HORA_CONSULTA ?>
																						<br><br>
																						<?php if ($query->ESTADO_CONSULTA=='Pendiente') {?>
																							<b style="background: #00b9ff;padding: 3px 8px;border-radius: 12px;color: #fff;font-weight: 100;"><?php echo $query->ESTADO_CONSULTA ?>
																						<?php } else if($query->ESTADO_CONSULTA=='Realizado') {?>
																							<b style="background: #1fa134;padding: 3px 8px;border-radius: 12px;color: #fff;font-weight: 100;"><?php echo $query->ESTADO_CONSULTA ?>
																						<?php }else if($query->ESTADO_CONSULTA=='Cancelado'){?>
																							<b style="background: #eb4b4b;padding: 3px 8px;border-radius: 12px;color: #fff;font-weight: 100;"><?php echo $query->ESTADO_CONSULTA ?>
																						<?php } ?>
																						
																					</td>  
																					<td class="hidden-print">
																						<h5><b>Sintomas:</b></h5> <?php echo $query->SINTOMAS ?>
																						<br>
																						<h5><b>Antecedentes:</b></h5> <?php echo $query->ANTECEDENTES ?>
																						<br>
																						<h5><b>Diagnostico:</b></h5> <?php echo $query->DIAGNOSTICO ?>
																						</td>
																						<td class="hidden-print" style="width:200px;font-size:12px"><h5><b>Observaciones:</b> </h5>
																						<?php echo $query->OBSERVACIONES ?>
																					</td>
																					<td class="hidden-print">
																					<?php 
																					$consulta=explode('-',$query->RECETA);
																					$count=count($consulta);
																					for ($j=0; $j < $count ; $j++) { ?>
																						<?php echo "<b>Nombre:</b> ".$consulta[$j]."<br>"?>
																					<?php } ?>
																					<br>
																						<b>Notas:</b> <?php echo $query->FORMULA ?>
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
																		<table class="table table-striped table-hover table-bordered" id="">                                     
																			<tbody>
																			<?php foreach ($queries as $query) {
																					if ($query->ESTADO_CONSULTA=='Realizado') {
																				?>																					
																				<tr id="<?php echo $query->CONSECUTIVO_CONSULTA; ?>" ide="<?php echo $query->ID_EMPRESA; ?>">
																					<td style="width:90px" class="hidden-print"> <a class="col-xs-12" target="_blank">
																						<i style="font-size:12px" class="fa fa-print"></i>Formula</a>
																						<?php if ($query->ESTADO_CONSULTA=='Pendiente') {?>
																						<a class="modal-with-form dropdown-item text-1 modal-edit-query" href="#modalForm4" style="background-color:#00b9ff;padding:1px 10px;border-radius:10px"><i class="fa fa-edit"></i>Atender</a>   
																					<?php } ?>
																					</td>
																					<td class="hidden-print"><b>N° de consulta:</b> <?php echo $query->CONSECUTIVO_CONSULTA; ?><br><br>
																						<b>Fecha de consulta: </b><?php echo $query->FECHA_CONSULTA ?><br>
																						<b>Hora Realizado: </b><?php echo $query->HORA_CONSULTA ?>
																						<br><br>
																						<?php if ($query->ESTADO_CONSULTA=='Pendiente') {?>
																							<b style="background: #00b9ff;padding: 3px 8px;border-radius: 12px;color: #fff;font-weight: 100;"><?php echo $query->ESTADO_CONSULTA ?>
																						<?php } else if($query->ESTADO_CONSULTA=='Realizado') {?>
																							<b style="background: #1fa134;padding: 3px 8px;border-radius: 12px;color: #fff;font-weight: 100;"><?php echo $query->ESTADO_CONSULTA ?>
																						<?php }else if($query->ESTADO_CONSULTA=='Cancelado'){?>
																							<b style="background: #eb4b4b;padding: 3px 8px;border-radius: 12px;color: #fff;font-weight: 100;"><?php echo $query->ESTADO_CONSULTA ?>
																						<?php } ?>
																						
																					</td>  
																					<td class="hidden-print">
																						<h5><b>Sintomas:</b></h5> <?php echo $query->SINTOMAS ?>
																						<br>
																						<h5><b>Antecedentes:</b></h5> <?php echo $query->ANTECEDENTES ?>
																						<br>
																						<h5><b>Diagnostico:</b></h5> <?php echo $query->DIAGNOSTICO ?>
																						</td>
																						<td class="hidden-print" style="width:200px;font-size:12px"><h5><b>Observaciones:</b> </h5>
																						<?php echo $query->OBSERVACIONES ?>
																					</td>
																					<td class="hidden-print">
																					<?php 
																					$consulta=explode('-',$query->RECETA);
																					$count=count($consulta);
																					for ($j=0; $j < $count ; $j++) { ?>
																						<?php echo "<b>Nombre:</b> ".$consulta[$j]."<br>"?>
																					<?php } ?>
																					<br>
																						<b>Notas:</b> <?php echo $query->FORMULA ?>
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
																		<table class="table table-striped table-hover table-bordered" id="">                                     
																			<tbody>
																			<?php foreach ($queries as $query) {
																					if ($query->ESTADO_CONSULTA=='Cancelado') {
																				?>																					
																				<tr id="<?php echo $query->CONSECUTIVO_CONSULTA; ?>" ide="<?php echo $query->ID_EMPRESA; ?>">
																					<td style="width:90px" class="hidden-print"> <a class="col-xs-12" target="_blank">
																						<i style="font-size:12px" class="fa fa-print"></i>Formula</a>
																						<?php if ($query->ESTADO_CONSULTA=='Pendiente') {?>
																						<a class="modal-with-form dropdown-item text-1 modal-edit-query" href="#modalForm4" style="background-color:#00b9ff;padding:1px 10px;border-radius:10px"><i class="fa fa-edit"></i>Atender</a>   
																					<?php } ?>
																					</td>
																					<td class="hidden-print"><b>N° de consulta:</b> <?php echo $query->CONSECUTIVO_CONSULTA; ?><br><br>
																						<b>Fecha de consulta: </b><?php echo $query->FECHA_CONSULTA ?><br>
																						<b>Hora Programada: </b><?php echo $query->HORA_CONSULTA ?>
																						<br><br>
																						<?php if ($query->ESTADO_CONSULTA=='Pendiente') {?>
																							<b style="background: #00b9ff;padding: 3px 8px;border-radius: 12px;color: #fff;font-weight: 100;"><?php echo $query->ESTADO_CONSULTA ?>
																						<?php } else if($query->ESTADO_CONSULTA=='Realizado') {?>
																							<b style="background: #1fa134;padding: 3px 8px;border-radius: 12px;color: #fff;font-weight: 100;"><?php echo $query->ESTADO_CONSULTA ?>
																						<?php }else if($query->ESTADO_CONSULTA=='Cancelado'){?>
																							<b style="background: #eb4b4b;padding: 3px 8px;border-radius: 12px;color: #fff;font-weight: 100;"><?php echo $query->ESTADO_CONSULTA ?>
																						<?php } ?>
																						
																					</td>  
																					<td class="hidden-print">
																						<h5><b>Sintomas:</b></h5> <?php echo $query->SINTOMAS ?>
																						<br>
																						<h5><b>Antecedentes:</b></h5> <?php echo $query->ANTECEDENTES ?>
																						<br>
																						<h5><b>Diagnostico:</b></h5> <?php echo $query->DIAGNOSTICO ?>
																						</td>
																						<td class="hidden-print" style="width:200px;font-size:12px"><h5><b>Observaciones:</b> </h5>
																						<?php echo $query->OBSERVACIONES ?>
																					</td>
																					<td class="hidden-print">
																					<?php 
																					$consulta=explode('-',$query->RECETA);
																					$count=count($consulta);
																					for ($j=0; $j < $count ; $j++) { ?>
																						<?php echo "<b>Nombre:</b> ".$consulta[$j]."<br>"?>
																					<?php } ?>
																					<br>
																						<b>Notas:</b> <?php echo $query->FORMULA ?>
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
																	<table class="table table-striped table-hover table-bordered">                                     
																			<tbody>
																				<?php foreach ($queries as $query) {?>																					
																				<tr id="<?php echo $query->CONSECUTIVO_CONSULTA; ?>" ide="<?php echo $query->ID_EMPRESA; ?>">
																					<td style="width:90px" class="hidden-print"> <a class="col-xs-12" target="_blank"><i style="font-size:12px" class="fa fa-print"></i>Formula</a>
																					<?php if ($query->ESTADO_CONSULTA=='Pendiente') {?>
																						<a class="modal-with-form dropdown-item text-1 modal-edit-query" href="#modalForm4" style="background-color:#00b9ff;padding:1px 10px;border-radius:10px"><i class="fa fa-edit"></i>Atender</a>   
																					<?php } ?>
																					</td>
																					<td class="hidden-print"><b>N° de consulta:</b> <?php echo $query->CONSECUTIVO_CONSULTA; ?><br><br>
																						<b>Fecha de consulta: </b><?php echo $query->FECHA_CONSULTA ?><br>
																						<b>Hora Realizado: </b><?php echo $query->HORA_CONSULTA ?>
																							<br><br>
																							<?php if ($query->ESTADO_CONSULTA=='Pendiente') {?>
																							<b style="background: #00b9ff;padding: 3px 8px;border-radius: 12px;color: #fff;font-weight: 100;"><?php echo $query->ESTADO_CONSULTA ?>
																						<?php } else if($query->ESTADO_CONSULTA=='Realizado') {?>
																							<b style="background: #1fa134;padding: 3px 8px;border-radius: 12px;color: #fff;font-weight: 100;"><?php echo $query->ESTADO_CONSULTA ?>
																						<?php }else if($query->ESTADO_CONSULTA=='Cancelado'){?>
																							<b style="background: #eb4b4b;padding: 3px 8px;border-radius: 12px;color: #fff;font-weight: 100;"><?php echo $query->ESTADO_CONSULTA ?>
																						<?php } ?>
																					</td>  
																					<td class="hidden-print">
																						<h5><b>Sintomas:</b></h5> <?php echo $query->SINTOMAS ?>
																						<br>
																						<h5><b>Antecedentes:</b></h5> <?php echo $query->ANTECEDENTES ?>
																						<br>
																						<h5><b>Diagnostico:</b></h5> <?php echo $query->DIAGNOSTICO ?>
																						</td>
																						<td class="hidden-print" style="width:200px;font-size:12px"><h5><b>Observaciones:</b> </h5>
																						<?php echo $query->OBSERVACIONES ?>
																					</td>
																					<td class="hidden-print" style="width:200px;font-size:12px">
																					<?php 
																					$consulta=explode('-',$query->RECETA);
																					$count=count($consulta);
																					for ($j=0; $j < $count ; $j++) { ?>
																						<?php echo "<b>Nombre:</b> ".$consulta[$j]."<br><br>"?>
																					<?php } ?>
																						<b>Notas:</b> <?php echo $query->FORMULA ?>
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
													<div class="card card-default">
														<div class="card-header">
															<h4 class="card-title m-0">
																<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse1Two" aria-expanded="false">
																<i class="fa fa-plus"></i>
																	Peluqueria
																</a>
															</h4>
														</div>
														<div id="collapse1Two" class="collapse" data-parent="#accordion" style="">
														<div class="card-body" style="padding:0px !important">
															<table class="table table-responsive-md mb-0">
															<thead>
																<tr style="font-size:10px">
																	<th>Fecha Corte</th>
																	<th>Detalles Corte</th>
																	<th>Estado</th>
																	<th>Acciones</th>
																</tr>
															</thead>
															<tbody>
																<?php foreach ($barbery as $barber) { ?>
																	<tr style="font-size:11px" id=<?php echo $barber->ID_PELUQUERIA; ?> ide=<?php echo $barber->ID_EMPRESA ?>>
																		<td><?php echo $barber->FEC_PELUQUERIA?></td>
																		<td><?php echo "<b>Tipo de corte:</b> ".$barber->TIPO_CORTE;?>
																			<br>
																			<?php echo "<b>Medicado:</b> ".$barber->BANO_MEDICADO;?>
																			<br>
																			<?php echo "<b>Corte Uñas:</b> ".$barber->CORTE_UNAS;?>
																			<br>
																			<?php echo "<b>Accesorios:</b> ".$barber->ACCESORIOS;?>
																			<br>
																			<?php echo "<b>Observaciones:</b> ".$barber->DETALLE;?>
																		</td>
																		<td>
																			<?php echo $barber->ESTADO_PELUQUERIA;?>
																		</td>
																		<td class="actions">
																			<?php if($barber->ESTADO_PELUQUERIA=='Pendiente'){?>
																			 <a href="#" class="update-barber"> <i class="fas fa-check" style="color:green"></i></a>
																				<a href="#" class="delete-row-barber"><i class="fas fa-times" style="color:red"></i></a>
																			<?php }else if($barber->ESTADO_PELUQUERIA=='Realizado'){?>
																				<i class="fa fa-hand-peace" style="color:green"></i>
																			<?php }else if($barber->ESTADO_PELUQUERIA=='Cancelado'){?>
																				<i class="fa fa-thumbs-down" style="color:red"></i>	
																			<?php } ?>
																		</td>
																	</tr>
																<?php } ?>
															</tbody>
														</table>
															</div>
														</div>
													</div>
													<div class="card card-default">
														<div class="card-header">
															<h4 class="card-title m-0">
																<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse1Three" aria-expanded="false">
																<i class="fa fa-plus"></i>
																Vacunas
																</a>
															</h4>
														</div>
														<div id="collapse1Three" class="collapse" data-parent="#accordion" style="">
															<div class="card-body" style="padding:0px !important">
															<table class="table table-responsive-md mb-0">
															<thead>
																<tr style="font-size:10px">
																	<th>Vacuna</th>
																	<th style="width:90px">Fecha Vacuna</th>
																	<th>Dosis</th>
																	<th>Lote</th>
																	<th style="width:90px">Fecha Ult Vacuna</th>
																	<th style="width: 90px">Fecha Prox Vacuna</th>
																	<th>Proxima Vacuna</th>
																	<th>Estado</th>
																	<th>Acciones</th>
																</tr>
															</thead>
															<tbody>
																<?php foreach ($vaccinesH as $vaccineh) { ?>
																	<tr style="font-size:12px" id="<?php echo $vaccineh->ID_VACUNA_PRO ?>" ide="<?php echo $barber->ID_EMPRESA ?>">
																		<td><?php echo $vaccineh->NOMBRE_VACUNA?></td>
																		<td ><?php echo $vaccineh->FEC_VACUNA?></td>
																		<td><?php echo $vaccineh->DOSIS?></td>
																		<td><?php echo $vaccineh->LOTE?></td>
																		<td ><?php echo $vaccineh->ULTIMA_VACUNA?></td>
																		<td ><?php echo $vaccineh->FECHA_SIG_VACUNA?></td>
																		<td><?php echo $vaccineh->PROXIMA_VACUNA?></td>
																		<td><?php echo $vaccineh->ESTADO_VACUNA?></td>
																		<td class="actions">
																		<?php if($vaccineh->ESTADO_VACUNA=='Pendiente'){?>
																				<a href="#" class="update-vaccine"><i class="fas fa-check" style="color:green"></i></a>
																				<a href="#" class="delete-row-vaccine"><i class="fas fa-times" style="color:red"></i></a>
																			<?php }else if($vaccineh->ESTADO_VACUNA=='Realizado'){?>
																				<i class="fa fa-hand-peace" style="color:green"></i>
																			<?php }else if($vaccineh->ESTADO_VACUNA=='Cancelado'){?>
																				<i class="fa fa-thumbs-down" style="color:red"></i>	
																			<?php } ?>
																		</td>
																	</tr>
																<?php } ?>
															</tbody>
														</table>
															</div>
														</div>
														<div class="card card-default">
														<div class="card-header">
															<h4 class="card-title m-0">
																<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse1Four" aria-expanded="false">
																<i class="fa fa-plus"></i>
																	Consentimientos
																</a>
															</h4>
														</div>
														<div id="collapse1Four" class="collapse" data-parent="#accordion" style="">
														<div class="card-body" style="padding:0px !important">
															<table class="table table-responsive-md mb-0">
															<thead>
																<tr style="font-size:10px">
																	<th>N° Documento</th>
																	<th>Nombre</th>
																	<th>Fecha Creado</th>
																	<th>Acciones</th>
																</tr>
															</thead>
															<tbody>
																<?php foreach ($consents as $consent) { ?>
																	<tr style="font-size:12px">
																		<td><?php echo $consent->ID_CONSENTIMIENTO?></td>
																		<td><?php echo $consent->NOMBRE_CONSEN?></td>
																		<td><?php echo $consent->FECHA_CONSENTIMIENTO?></td>
																		<td class="actions">
																		<a class="btn btn-success" style="color:white"><i class="fas fa-print"></i> Imprimir</a>
																		</td>
																	</tr>
																<?php } ?>
															</tbody>
														</table>
															</div>
														</div>

														
													</div>
													<?php if ($paymentsc>0) {?>																											
													<div class="card card-default">
														<div class="card-header">
															<h4 class="card-title m-0" style="background-color:#0088CC">
																<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse1Five" aria-expanded="false" style="color:white">
																<i class="fa fa-plus"></i>
																	Pagos Pendientes
																</a>
															</h4>
														</div>
														<div id="collapse1Five" class="collapse" data-parent="#accordion" style="">
														<div class="card-body" style="padding:0px !important">
															<table class="table table-responsive-md mb-0">
															<thead>
																<tr style="font-size:10px">
																	<th>#</th>
																	<th>Nombre Servicio</th>
																	<th>Fecha Realizado</th>
																</tr>
															</thead>
															<tbody>
																<?php 
																$count=1;
																foreach ($payments as $payment) { ?>
																	<tr style="font-size:12px">
																	<td><?php echo $count; ?></td>
																		<td><?php echo $payment->TIPO?></td>
																		<td><?php echo $payment->FECHA_ANADIDO?></td>
																	</tr>
																<?php $count+=1; } ?>
															</tbody>
														</table>
																<a href="?controller=contability&method=getDataxBill&id=<?php echo $payments[0]->ID_MASCOTA ?>&idp=<?php echo $payments[0]->ID_PROP ?>" class="btn btn-success pull-right">Cerrar Venta</a>
															</div>
														</div>

														
													</div>
													<?php } ?>
													</div>
													
												</div>
											</div>
										</div>

										<div class="p-3">

											<h4 class="mb-3">Agregar Notas</h4>

											<section class="simple-compose-box mb-3">
												<form method="get" action="/">
													<textarea name="message-text" data-plugin-textarea-autosize placeholder="Ingresa la nota..." rows="1" id="textNote"></textarea>
													<input type="hidden" id="FECHA_NOTA" value="<?php echo date('Y-m-d'); ?>">
												</form>
												<div class="compose-box-footer">
													<ul class="compose-btn">
														<li>
															<a href="#" id="saveNote" class="btn btn-primary btn-xs">Guardar</a>
														</li>
													</ul>
												</div>
											</section>

											<!-- Time Line									

											<h4 class="mb-3 pt-4">Timeline</h4>

											<div class="timeline timeline-simple mt-3 mb-3">
												<div class="tm-body">
													<div class="tm-title">
														<h5 class="m-0 pt-2 pb-2 text-uppercase">November 2017</h5>
													</div>
													<ol class="tm-items">
														<li>
															<div class="tm-box">
																<p class="text-muted mb-0">7 months ago.</p>
																<p>
																	It's awesome when we find a good solution for our projects, Porto Admin is <span class="text-primary">#awesome</span>
																</p>
															</div>
														</li>
														<li>
															<div class="tm-box">
																<p class="text-muted mb-0">7 months ago.</p>
																<p>
																	What is your biggest developer pain point?
																</p>
															</div>
														</li>
														<li>
															<div class="tm-box">
																<p class="text-muted mb-0">7 months ago.</p>
																<p>
																	Checkout! How cool is that!
																</p>
																<div class="thumbnail-gallery">
																	<a class="img-thumbnail lightbox" href="img/projects/project-4.jpg" data-plugin-options='{ "type":"image" }'>
																		<img class="img-fluid" width="215" src="Assets/img/projects/project-4.jpg">
																		<span class="zoom">
																			<i class="fas fa-search"></i>
																		</span>
																	</a>
																</div>
															</div>
														</li>
													</ol>
												</div>
											</div> -->
											
										</div>

									</div>
									
									<div id="edit" class="tab-pane">

										<form class="p-3">
											<h4 class="mb-3">Informacion Personal</h4>
											<div class="alert alert-danger" id="alertif" style="display:none;width:100%;text-align:center">
													<strong>Oh que mal!</strong> Aun hay espacios por completar.
											</div>
                                            
											<div class="form-row">
												<input type="hidden" id="ID_MASCOTA" value="<?php echo $data->ID_MASCOTA ?>">
                                                <div class="col-lg-12 center">
                                                <img src="Pets/<?php echo $data->ID_MASCOTA ?>/<?php echo $data->NOMBRE ?>.jpg" alt="Foto Paciente" height="150" width="150" id="ver">
                                                <br><br>
													<div class="fileupload fileupload-new" data-provides="fileupload">
														<div class="input-append">
															<div class="uneditable-input">
																<span class="fileupload-preview"></span>
															</div>
															<span class="btn btn-default btn-file">
																<span class="fileupload-exists">Cambiar</span>
																<span class="fileupload-new">Seleccione Imagen</span>
																<input type="file" id="file" />
															</span>
														</div>
													</div>
													<input type="hidden" id="confirmerPhoto" value="0">
												</div>
												<div class="col-lg-12">
												<label for="NOMBRE">Nombre</label>
												<input type="text" class="form-control" id="NOMBRE" placeholder="Nombre" value="<?php echo $data->NOMBRE ?>">
												</div>
											</div>
											<br>
											<div class="form-row">
												<div class="col-md-6">
													<label for="SEXO">Sexo</label>
													<select id="SEXO" class="form-control" required="">
                                                        <option value="<?php echo $data->SEXO ?>"><?php echo $data->SEXO ?></option>
														<option value="Hembra">Hembra</option>
														<option value="Hembra Esterilizada">Hembra Esterilizada</option>
                                                        <option value="Macho">Macho</option>
														<option value="Macho Castrado">Macho Castrado</option>
                                                        
													</select>
												</div>
												<div class="col-md-6">
													<label for="TIPO">Tipo</label>
													<select id="TIPO" class="form-control" required="">
														<option selected value="<?php echo $data->TIPO ?>"><?php echo $data->TIPO ?></option>
														<option value="Canino">Canino</option>
                                                        <option value="Felino">Felino</option>
														<option value="Silvestre">Silvestre</option>
														<option value="Otros">Otros</option>
													</select>
												</div>
											</div>
											<div class="form-row">
												<div class="col-md-6">
                                                    <label for="RAZA">Raza</label>
													<input type="text" value="<?php echo $data->RAZA ?>" name="RAZA" id="RAZA" required class="form-control">
												</div>
												<div class="col-md-6">
                                                    <label for="Color">Color</label>
                                                    <input type="text" class="form-control" id="COLOR" placeholder="Color" value="<?php echo $data->COLOR ?>" required="">
												</div>
											</div>
											<div class="form-row">
												<div class="col-md-6">
													<label for="FEC_NAC">Fecha Nacimiento</label>
                                                    <input type="Date" class="form-control" id="FEC_NAC" placeholder="Color" value="<?php echo $data->FEC_NAC ?>" required="">
													<input type="hidden" name="confirmer" id="confirmer" value="0">
												</div>
												<div class="col-md-6">
                                                    <label for="DUENO">Dueño:</label>
                                                        <select name="DUENO" id="DUENO" class="form-control" placeholder="Dueño" required>
                                                            <option Selected value="<?php echo $data->DUENO?>"><?php echo $data->DUENO?></option>
                                                            <?php 
													        	foreach ($owners as $owner) {
																?>
																	<option value="<?php echo $owner->ID_PROP ?>"><?php echo $owner->ST_NOM." ".$owner->ND_NOM." ".$owner->ST_APE." ".$owner->ND_APE ?></option>
																<?php
																}
															?>
                                                        </select>
												</div>
											</div>
                                            <hr class="dotted tall">
                                            <h4 class="mb-3">Datos Medicos</h4>
                                            <div class="form-row">
												<div class="col-md-6">
                                                    <label for="ESTADO_MASCOTA">Estado:</label>
                                                        <select name="ESTADO_MASCOTA" id="ESTADO_MASCOTA" class="form-control" placeholder="Estado" required>
                                                            <option Selected value="<?php echo $data->ESTADO_MASCOTA?>"><?php echo $data->ESTADO_MASCOTA?></option>
                                                            <option value="Vivo">Vivo</option>
                                                            <option value="Muerto">Muerto</option>
                                                            <option value="Otro">Otro</option>
                                                        </select>
												</div>
												<div class="col-md-6">
													<label for="PESO">Peso(Kg):</label>
													<?php $peso=(empty($data->PESO))? '0' : $data->PESO ;?>
													<input type="number" id="PESO" name="PESO" value="<?php echo $peso ?>" class="form-control">
												</div>
											</div>
											<br>
											<div class="form-row">
												<div class="col-md-6">
													<label for="DIETA">Dieta:</label>
													<textarea name="DIETA" id="DIETA" rows="3" class="form-control"><?php echo $data->DIETA; ?></textarea>
												</div>
												<div class="col-md-6">
													<label for="ANORMALIDADES">Anormalidades:</label>
													<textarea name="ANORMALIDADES" id="ANORMALIDADES" rows="3" class="form-control" ><?php echo $data->ANORMALIDADES; ?></textarea>
												</div>												
											</div>
											<div class="form-row">
												<div class="col-md-12">
													<label for="ANAMESIS">Anamesis:</label>
													<textarea name="ANAMESIS" id="ANAMESIS" rows="3" class="form-control"><?php echo $data->ANAMESIS; ?></textarea>
												</div>
											</div>
											<div class="form-row">
												<div class="col-md-12 text-right mt-3">
													<button class="btn btn-primary modal-confirm" id="editPatient">Guardar</button>
												</div>
											</div>

										</form>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-3">    
							<div class="card">
								<div class="card-body">
								<button type="button" class="btn btn-primary btn-block dropdown-toggle" data-toggle="dropdown">Nuevo </button>
									<div class="dropdown-menu" role="menu" style="min-width:90% !important">
									<a class="modal-with-form dropdown-item text-1" href="#modalForm6">Consentimiento</a>
										<a class="modal-with-form dropdown-item text-1" href="#modalForm3">Consulta</a>
										<a class="modal-with-form dropdown-item text-1" href="#modalForm2">Peluqueria</a>
										<a class="modal-with-form dropdown-item text-1" href="#modalForm1">Vacuna</a>
									</div>
								</div>																
							</div>
							<div class="card" style="margin-top:3% !important">
								<div class="card-header">
									<h2 class="card-title">Anotaciones</h2>
								</div>
								<div class="card-body">
									<?php foreach ($notes as $note) {?>
										<div class="col-sm-12 col-xs-12 col-lg-12">
										<div class="row">
											<div class="col-sm-9 col-xs-12 col-lg-9 " style="margin:0px !important;padding-left:0px !important">
												<small class="cal">Creado por: <?php echo $note->NOM_USER ?> </small><b style="font-size:12px"><small><?php echo $note->FECHA_NOTA ?></small></b>
													<span style="font-size:14px"><p><?php echo $note->NOTA ?></p></span>                                                 
											</div>
											<div class="col-sm-3 col-xs-12 col-lg-3">                                                         
												<a class="btn btn-info btn-xs btn_width" style="background-color:white;border-color:red;margin-top:50%" title="Borrar" href="?controller=patient&method=deleteNote&id=<?php echo $note->ID_NOTA ?>&idm=<?php echo $note->ID_MASCOTA?>" onclick="return confirm('La nota se eliminara ¿Desea continuar? ');"><i class="fa fa-trash" style="color:red"></i> </a>
											</div>
										</div>
										</div>	
									<hr>
									<?php }  ?>
								</div>	
						</div>   
						
									<div id="modalForm1" class="modal-block modal-block-primary mfp-hide">
										<section class="card">
											<header class="card-header">
												<h2 class="card-title">Formulario de Registro Vacuna</h2>
											</header>
											<div class="card-body">
												<form>
													<div class="form-row">
													<div class="alert alert-danger" id="alertif" style="display:none;width:100%;text-align:center">
														<strong>Oh que mal!</strong> Aun hay espacios por completar.
													</div>
													</div>
													<input type="hidden" name="ID_PROP" id="ID_PROP" value="<?php echo $owners[0]->ID_PROP ?>">
													<input type="hidden" name="ID_MASCOTA" id="ID_MASCOTA" value="<?php echo $data->ID_MASCOTA ?>">
													<input type="hidden" name="ID_EMPRESA" id="ID_EMPRESA" value="<?php echo $_SESSION['user']->ID_EMPRESA ?>">
													<div class="form-row">
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="ID_VACUNA">Vacuna</label>
															<select name="ID_VACUNA" id="ID_VACUNA" class="form-control">
																<option value="Seleccione...">Seleccione...</option>
																<?php foreach ($vaccinesI as $vaccineI) {?>
																	<option value="<?php echo $vaccineI->ID_VACUNA ?>"><?php echo $vaccineI->NOMBRE_VACUNA ?></option>
																<?php } ?>
															</select>
														</div>
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="LOTE">Lote</label>
															<input type="text" id="LOTE" name="LOTE" class="form-control" required>															
														</div>
													</div>
													<div class="form-row">
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="PRESENTACION">Presentacion</label>
															<input type="text" id="PRESENTACION" name="PRESENTACION" class="form-control" value="0" disabled>
														</div>
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="DOSIS">Dosis</label>
															<input type="text" id="DOSIS" name="DOSIS" class="form-control" required>
														</div>														
													</div>
													<div class="form-row">
														<div class="col-md-4 mb-3 mb-lg-0">
															<label for="VENCIMIENTO">Vencimiento</label>
															<input type="date" id="VENCIMIENTO" name="VENCIMIENTO" class="form-control" required>
														</div>
														<div class="col-md-4 mb-3 mb-lg-0">
															<label for="FEC_VACUNA">Fecha Vacuna</label>
															<input type="date" id="FEC_VACUNA" name="FEC_VACUNA" class="form-control" required>
														</div>
														<div class="col-md-4 mb-3 mb-lg-0">
															<label for="FECHA_ULT_VACUNA">Fecha Ultima Vacuna</label>
															<input type="date" id="FECHA_ULT_VACUNA" name="FECHA_ULT_VACUNA" class="form-control" required>
														</div>
													</div>
													<div class="form-row">
														<div class="col-md-4 mb-3 mb-lg-0">
															<label for="FECHA_SIG_VACUNA">Fecha Proxima Vacuna</label>
															<input type="date" id="FECHA_SIG_VACUNA" name="FECHA_SIG_VACUNA" class="form-control" required min=<?php echo date('Y-m-d'); ?>>															
														</div>
														<div class="col-md-4 mb-3 mb-lg-0">
															<label for="PROXIMA_VACUNA">Proxima Vacuna</label>
															<select name="PROXIMA_VACUNA" id="PROXIMA_VACUNA" class="form-control">
																<option value="Seleccione...">Seleccione...</option>
																<?php foreach ($vaccinesI as $vaccineI) {?>
																	<option value="<?php echo $vaccineI->NOMBRE_VACUNA ?>"><?php echo $vaccineI->NOMBRE_VACUNA ?></option>
																<?php } ?>
															</select>
														</div>
														<div class="col-md-4 mb-3 mb-lg-0">
															<label for="PRECIO_VACUNA">Precio</label>
															<input type="text" id="PRECIO_VACUNA" name="PRECIO_VACUNA" class="form-control">
														</div>
													</div>
													<div class="form-row">
														<div class="col-md-12 mb-6 mb-lg-0">
															<label for="DETALLE">Observaciones</label>
															<textarea class="form-control" rows="2" id="DETALLE" data-plugin-textarea-autosize="" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 60px;"></textarea>
														</div>
																</div>	
												</form>
											</div>
											<input type="hidden" id="confirmer" value="0">
											<footer class="card-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														<button class="btn btn-primary modal-confirm" id="createVaccineAppointment" >Crear</button>
														<button class="btn btn-default modal-dismiss" >Cancelar</button>
													</div>
												</div>
											</footer>
										</section>
									</div>

									<div id="modalForm2" class="modal-block modal-block-primary mfp-hide">
										<section class="card">
											<header class="card-header">
												<h2 class="card-title">Formulario de Registro Peluqueria</h2>
											</header>
											<div class="card-body">
												<form>
													<div class="form-row">
													<div class="alert alert-danger" id="alertif" style="display:none;width:100%;text-align:center">
														<strong>Oh que mal!</strong> Aun hay espacios por completar.
													</div>
													</div>
													<input type="hidden" name="ID_PROP" id="ID_PROP" value="<?php echo $owners[0]->ID_PROP ?>">
													<input type="hidden" name="ID_MASCOTA" id="ID_MASCOTA" value="<?php echo $data->ID_MASCOTA ?>">
													<input type="hidden" name="ID_EMPRESA" id="ID_EMPRESA" value="<?php echo $_SESSION['user']->ID_EMPRESA ?>">
													<div class="form-row">
														<div class="col-md-6 mb-3 mb-lg-0">
                                                            <label for="FEC_PELUQUERIA">Fecha Corte </label>
															<input type="date" id="FEC_PELUQUERIA" name="FEC_PELUQUERIA" class="form-control" required>															
														</div>
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="TIPO_CORTE">Tipo Corte</label>
															<select name="TIPO_CORTE" id="TIPO_CORTE" class="form-control" required>
                                                                <option value="Seleccione...">Seleccione...</option>
                                                                <option value="Largo">Largo</option>
                                                                <option value="Medio">Medio</option>
                                                                <option value="Bajo">bajo</option>
                                                            </select>
														</div>
													</div>
													<div class="form-row">
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="ACCESORIOS">Accesorios</label>
															<select name="ACCESORIOS" id="ACCESORIOS" class="form-control" required>
                                                                <option value="Seleccione...">Seleccione...</option>
                                                                <option value="Pañoleta">Pañoleta</option>
                                                                <option value="Camiseta">Camiseta</option>
                                                                <option value="Moño">Moño</option>
                                                                <option value="Corbatin">Corbatin</option>
                                                            </select>
														</div>
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="CORTE_UNAS">Corte de Uñas</label>
															<select name="CORTE_UNAS" id="CORTE_UNAS" class="form-control" required>
                                                                <option value="Seleccione...">Seleccione...</option>
                                                                <option value="Si">Si</option>
                                                                <option value="NO">NO</option>
                                                            </select>
														</div>														
													</div>
                                                    <div class="form-row">
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="BANO_MEDICADO">Baño Medicado</label>
															<select name="BANO_MEDICADO" id="BANO_MEDICADO" class="form-control" required>
                                                                <option value="Seleccione...">Seleccione...</option>
                                                                <option value="Si">Si</option>
                                                                <option value="NO">NO</option>
                                                            </select>
														</div>
														<div class="col-md-6 mb-3 mb-lg-0">
															<label for="PRECIO_PELUQUERIA">Precio</label>
															<input type="text" name="PRECIO_PELUQUERIA" id="PRECIO_PELUQUERIA" class="form-control" required>
														</div>														
													</div>
													<div class="form-row">
														<div class="col-md-12 mb-6 mb-lg-0">
															<label for="DETALLE">Observaciones</label>
															<textarea class="form-control" rows="2" id="DETALLE" data-plugin-textarea-autosize="" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 60px;"></textarea>
														</div>
																</div>													
												</form>
											</div>
											<input type="hidden" id="confirmer" value="0">
											<footer class="card-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														<button class="btn btn-primary modal-confirm" id="createBarberAppointment" >Crear</button>
														<button class="btn btn-default modal-dismiss" >Cancelar</button>
													</div>
												</div>
											</footer>
										</section>
									</div>

									<div id="modalForm3" class="modal-block modal-block-primary mfp-hide" style="max-width:800px !important">
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
													<input type="hidden" name="ID_PROP" id="ID_PROP" value="<?php echo $owners[0]->ID_PROP ?>">
													<input type="hidden" name="ID_MASCOTA" id="ID_MASCOTA" value="<?php echo $data->ID_MASCOTA ?>">
													<input type="hidden" name="ID_EMPRESA" id="ID_EMPRESA" value="<?php echo $_SESSION['user']->ID_EMPRESA ?>">
													<input type="hidden" name="HOURC" id="HOURC" value="<?php echo date('H:s'); ?>">
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
										</section>
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
													<input type="hidden" name="ID_PROP" id="ID_PROPE" value="<?php echo $owners[0]->ID_PROP ?>">
													<input type="hidden" name="ID_EMPRESA" id="ID_EMPRESAE" value="<?php echo $_SESSION['user']->ID_EMPRESA ?>">
													<input type="hidden" name="HOURC" id="HOURCE" value="<?php echo date('H:s'); ?>">
													<input type="hidden" id="confirmer" value="0">
											<div id="immediately">
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
															<label for="PRECIO_CONSULTAE">Precio</label>
															<input type="text" id="PRECIO_CONSULTAE" name="PRECIO_CONSULTAE" class="form-control">
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

									<!-- Modal Form -->
									<div id="modalForm6" class="modal-block modal-block-primary mfp-hide">
										<section class="card">
											<header class="card-header">
												<h2 class="card-title">Formulario de asignacion Consentimiento</h2>
											</header>
											<div class="card-body">
												<form>
													<div class="form-row">
													<div class="alert alert-danger" id="alertif" style="display:none;width:100%;text-align:center">
														<strong>Oh que mal!</strong> Aun hay espacios por completar.
													</div>
													</div>
													<input type="hidden" id="ID_MASCOTA" value="<?php echo $data->ID_MASCOTA; ?>">
													<input type="hidden" id="ID_PROP" value="<?php echo $data->ID_PROP; ?>">
                                                    <div class="form-row">
                                                        <div class="col-md-12 mb-6 mb-lg-0">
                                                            <label for="TIPO_CONSEN">Consentimiento:</label>
                                                            <select name="TIPO_CONSEN" id="TIPO_CONSEN" class="form-control">
                                                                <option value="Seleccione...">Seleccione...</option>
                                                                <?php foreach ($consents1 as $consent) {?>
                                                                    <option value="<?php echo $consent->ID_CONSEN ?>"><?php echo $consent->NOMBRE_CONSEN ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
													<div class="form-row">
														<div class="col-md-12 mb-6 mb-lg-0">
                                                            <label for="TEXTO_CONSEN">Detalle Consentimiento</label>
															<div class="summernote" data-plugin-summernote data-plugin-options='{ "height": 180,"codemirror": { "theme": "ambiance" } }'></div>
														</div>
																</div>													
												</form>
											</div>
											<input type="hidden" id="confirmer" value="0">
											<footer class="card-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														<button class="btn btn-primary modal-confirm" id="createConsentIndirect" >Crear</button>
														<button class="btn btn-default modal-dismiss" >Cancelar</button>
													</div>
												</div>
											</footer>
										</section>
									</div>


									
					<!-- end: page -->
				</section>
                <script src="Assets/vendor/common/common.js"></script>
				<script src="Assets/js/examples/examples.modals.js"></script>
				<script src="Assets/vendor/summernote/summernote-bs4.js"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
				<script>
					$('#PRECIO_PELUQUERIA').mask('#.##0', {reverse: true});
					$('#PRECIO_VACUNA').mask('#.##0', {reverse: true});
					$('#PRECIO_CONSULTA').mask('#.##0', {reverse: true});
					$('#PRECIO_CONSULTAE').mask('#.##0', {reverse: true});

					$('#file').change(function(){
					filePreview(this);
					});

					function filePreview(input) {
						if (input.files && input.files[0]) {
							var reader = new FileReader();
							reader.readAsDataURL(input.files[0]);
							reader.onload = function (e) {
								$('#ver + img').remove();
								$('#ver').after('<li class="fa fa-long-arrow-alt-right" style="padding:0 10px 0 10px">  </li> <img src="'+e.target.result+'" width="150" height="150"/>');
							}					
						}
					}
					$(document).on('change','#TIPO_CONSEN',function(){
						let id = $('#TIPO_CONSEN').val();
                        $.ajax({
							type: 'POST',
							url: '?controller=consent&method=getDataConsentText',
							data: 'ID_CONSEN='+id,
							success:function(response){
                                var data = $.parseJSON(response);
                                $('#OBSERVACIONES').html(data[0]['TEXTO_CONSEN']);
							}
						});
					});
				</script>
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
					$(document).on('click','.update-barber',function(){
						let element = $(this)[0].parentElement.parentElement;
						let id = $(element).attr('id');
						let ide= $(element).attr('ide');
						$.ajax({
							url:'?controller=barber&method=checkBarber&id='+id+'&ide='+ide,
							type:'GET',
							success:function(response){
								console.log(response);
								new PNotify({
									title: 'Confirmado!',
									text: 'Peluqueria Realizada con exito.',
									type: 'success'
								});
								setTimeout(() => {
								location.reload();	
								}, 2000);														
							}
						});
					});

					$(document).on('click','.delete-row-barber',function(){
						let element = $(this)[0].parentElement.parentElement;
						let id = $(element).attr('id');
						let ide= $(element).attr('ide');
						$.ajax({
							url:'?controller=barber&method=cancelBarber&id='+id+'&ide='+ide,
							type:'GET',
							success:function(response){
								new PNotify({
									title: 'Confirmado!',
									text: 'Peluqueria Cancelada con exito.',
									type: 'success'
								});
								setTimeout(() => {
								location.reload();	
								}, 2000);														
							}
						});
					});

					$(document).on('click','.delete-row-vaccine',function(){
						let element = $(this)[0].parentElement.parentElement;
						let id = $(element).attr('id');
						let ide= $(element).attr('ide');
						$.ajax({
							url:'?controller=vaccine&method=cancelVaccine&id='+id+'&ide='+ide,
							type:'GET',
							success:function(response){
								new PNotify({
									title: 'Confirmado!',
									text: 'Vacuna Cancelada con exito.',
									type: 'success'
								});
								setTimeout(() => {
								location.reload();	
								}, 2000);														
							}
						});
					});

					$(document).on('click','.update-vaccine',function(){
						let element = $(this)[0].parentElement.parentElement;
						let id = $(element).attr('id');
						let ide= $(element).attr('ide');
						$.ajax({
							url:'?controller=vaccine&method=checkVaccine&id='+id+'&ide='+ide,
							type:'GET',
							success:function(response){
								console.log(response);
								new PNotify({
									title: 'Confirmado!',
									text: 'Vacuna Realizada con exito.',
									type: 'success'
								});
								setTimeout(() => {
								location.reload();	
								}, 2000);														
							}
						});
					});

					
				</script>
				<script>
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
							
					$('#ID_VACUNA').on('change',function(){
						id = $('#ID_VACUNA').val();
						getPresentation(id);
					});

					function getPresentation(id) {				
						$.ajax({
							url:'?controller=vaccine&method=getPresentation&id='+id,
							type:'GET',
							success:function(response){
								$('#PRESENTACION').val(response);
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
			if($("#PRECIO_CONSULTAE").val().length < 1) {
				$('#PRECIO_CONSULTAE').css('border','1px solid red');
				$('#alertif').css('display','block');
			}else{
				$('#PRECIO_CONSULTAE').css('border','1px solid green');
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
					data: 'ID_PROP='+$('#ID_PROP').val()+'&ID_MASCOTA='+$('#ID_MASCOTA').val()+'&ID_EMPRESA='+$('#ID_EMPRESA').val()+'&FECHA_CONSULTA='+$('#FECHA_CONSULTA1').val()+'&ANTECEDENTES='+$('#ANTECEDENTES').val()+'&OBSERVACIONES='+$('#OBSERVACIONES').html()+'&SINTOMAS='+$('#SINTOMAS').val()+'&DIAGNOSTICO='+$('#DIAGNOSTICO').val()+'&FORMULA='+$('#FORMULA').val()+'&RECETA='+receta+'&HORA_CONSULTA='+$('#HOURC').val()+'&ESTADO_CONSULTA=Realizado&id='+id+'&PRECIO_CONSULTA='+$('#PRECIO_CONSULTAE').val(),
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
				
				</script>