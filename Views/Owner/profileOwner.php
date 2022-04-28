<style>
	#profile_data > li {padding:0px !important}
</style>
<section role="main" class="content-body">
					<header class="page-header">
						<h2>Perfil del Propietario</h2>
					
						<div class="right-wrapper text-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fas fa-home"></i>
									</a>
								</li>
								<li><span>Propietarios</span></li>
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
										<img src="Assets/img/hombre.jpg" class="rounded img-fluid" alt="John Doe">
										<div class="thumb-info-title">
											<?php foreach($data as $data){?>
												<span class="thumb-info-inner" id="name"><?php echo $data->ST_NOM." ".$data->ST_APE ?></span>																						
												<span class="thumb-info-type"><?php echo $data->TIPO_DOC." ".$data->ID_PROP ?></span>
										</div>
									</div>
                                    <hr class="dotted short">

									<div class="widget-content-expanded">
											<ul class="simple-todo-list mt-3" id="profile_data">
												<li class="fa fa-mobile-alt"></li> <?php echo $data->TELEFONO ?><br>
												<li class="fa fa-home"></li> <?php echo $data->DIRECCION ?><br>
												<li class="fa fa-envelope"></li> <?php echo $data->EMAIL ?><br>
											</ul>
										</div>									
								</div>
							</section>
							<section class="card">
								<header class="card-header">
									<div class="card-actions">
										<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
									</div>

									<h2 class="card-title">
										<span class="badge badge-primary label-sm font-weight-normal va-middle mr-3"><?php echo $cpets ?></span>
										<span class="va-middle">Mascotas</span>
									</h2>
								</header>
								<div class="card-body">
									<div class="content">
										<ul class="simple-user-list">
											<?php foreach ($pets as $pet) {?>
												<a href="?controller=patient&method=profilePatient&id=<?php echo $pet->ID_MASCOTA ?>" style="color:grey;text-decoration:none"><li>
												<figure class="image rounded">
													<img src="Pets/<?php echo $pet->ID_MASCOTA ?>/<?php echo $pet->NOMBRE ?>.jpg" alt="Joseph Doe Junior" class="rounded-circle" height="50" width="50">
												</figure>
												<span class="title"><?php echo $pet->NOMBRE ?></span>
												<span class="message truncate"><?php echo $pet->TIPO ?></span>
											</li></a>
											<hr class="dotted short">
											<?php } ?>
										</ul>
									</div>
								</div>
							</section>

							<section class="card">
								<header class="card-header">
									<div class="card-actions">
										<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
										<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
									</div>

									<h2 class="card-title">Popular Posts</h2>
								</header>
								<div class="card-body">
									<ul class="simple-post-list">
										<li>
											<div class="post-image">
												<div class="img-thumbnail">
													<a href="#">
														<img src="Assets/img/post-thumb-1.jpg" alt="">
													</a>
												</div>
											</div>
											<div class="post-info">
												<a href="#">Nullam Vitae Nibh Un Odiosters</a>
												<div class="post-meta">
													 Jan 10, 2017
												</div>
											</div>
										</li>
										<li>
											<div class="post-image">
												<div class="img-thumbnail">
													<a href="#">
														<img src="Assets/img/post-thumb-2.jpg" alt="">
													</a>
												</div>
											</div>
											<div class="post-info">
												<a href="#">Vitae Nibh Un Odiosters</a>
												<div class="post-meta">
													 Jan 10, 2017
												</div>
											</div>
										</li>
										<li>
											<div class="post-image">
												<div class="img-thumbnail">
													<a href="#">
														<img src="Assets/img/post-thumb-3.jpg" alt="">
													</a>
												</div>
											</div>
											<div class="post-info">
												<a href="#">Odiosters Nullam Vitae</a>
												<div class="post-meta">
													 Jan 10, 2017
												</div>
											</div>
										</li>
									</ul>
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
												<?php if ($creditsc>0) {?>		
												<div class="accordion" id="accordion">																									
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
																	<th>N° Factura</th>
																	<th>Valor Crédito</th>
																	<th>Valor Pendiente</th>
																</tr>
															</thead>
															<tbody>
																<?php 
																$count=1;
																foreach ($credits as $credit) { ?>
																	<tr style="font-size:12px">
																	<td><?php echo $count; ?></td>
																		<td><?php echo $credit->ID_CONSE_VENTA?></td>
																		<td><?php echo "$".number_format($credit->VALOR,0,',','.'); ?></td>
                                                    					<td><?php echo "$".number_format($credit->VALOR-$credit->INICIAL,0,',','.'); ?></td>
																	</tr>
																<?php $count+=1; } ?>
															</tbody>
														</table>
																<a href="?controller=contability&method=adminCredi" class="btn btn-success pull-right"><i class="fa fa-plus-circle"></i> Abonar</a>
															</div>
														</div>

														
													</div>
												</div>
												<?php } ?>
										<div class="p-3">

											<h4 class="mb-3">Update Status</h4>

											<section class="simple-compose-box mb-3">
												<form method="get" action="/">
													<textarea name="message-text" data-plugin-textarea-autosize placeholder="What's on your mind?" rows="1"></textarea>
												</form>
												<div class="compose-box-footer">
													<ul class="compose-toolbar">
														<li>
															<a href="#"><i class="fas fa-camera"></i></a>
														</li>
														<li>
															<a href="#"><i class="fas fa-map-marker-alt"></i></a>
														</li>
													</ul>
													<ul class="compose-btn">
														<li>
															<a href="#" class="btn btn-primary btn-xs">Post</a>
														</li>
													</ul>
												</div>
											</section>

											<!-- Timeline

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
												<div class="col-lg-3">
												<input type="hidden" id="ID_PROP" value="<?php echo $data->ID_PROP ?>">
												<input type="hidden" id="TIPO_DOC" value="<?php echo $data->TIPO_DOC ?>">
												<label for="ST_NOM">Primer Nombre</label>
												<input type="text" class="form-control" id="ST_NOM" placeholder="Primer Nombre" value="<?php echo $data->ST_NOM ?>" required="">
												</div>
												<div class="col-lg-3">
												<label for="ND_NOM">Segundo Nombre</label>
												<input type="text" class="form-control" id="ND_NOM" placeholder="Segundo Nombre" value="<?php echo $data->ND_NOM ?>">
												</div>
												<div class="col-lg-3">
												<label for="ST_APE">Primer Apellido</label>
												<input type="text" class="form-control" id="ST_APE" placeholder="Primier Apellido" value="<?php echo $data->ST_APE ?>" required="">
												</div>
												<div class="col-lg-3">
												<label for="ND_APE">Segundo Apellido</label>
												<input type="text" class="form-control" id="ND_APE" placeholder="Segundo Apellido" value="<?php echo $data->ND_APE ?>" >
												</div>
											</div>
											<br>
											<div class="form-row">
												<div class="form-group col-md-6">
													<label for="DEPARTAMENTO">Departamento</label>
													<select id="DEPARTAMENTO" class="form-control" required="">
														<option selected value="<?php echo $data->DEPARTAMENTO; ?>"><?php echo $data->depart; ?></option>
														<?php 
															foreach ($departament as $departament) {
																?>
																<option value="<?php echo $departament->id ?>"><?php echo $departament->nombre ?></option>
																<?php
															}
														?>	
													</select>
												</div>
												<div class="form-group col-md-6">
													<label for="CIUDAD">CIUDAD</label>
													<select id="CIUDAD" class="form-control" required="">
														<option selected value="<?php echo $data->CIUDAD ?>"><?php echo $data->city ?></option>
														<option>...</option>
													</select>
												</div>
											</div>
											<div class="form-group">
												<label for="DIRECCION">Direccion</label>
												<input type="text" class="form-control" id="DIRECCION" placeholder="Direccion" value="<?php echo $data->DIRECCION ?>" required="">
											</div>
											<hr class="dotted tall">
											<div class="form-row">
												<div class="col-md-6">
													<label for="TELEFONO">Telefono</label>
													<input type="text" class="form-control" id="TELEFONO" placeholder="Telefono" required="" value="<?php echo $data->TELEFONO ?>">
												</div>
												<div class="col-md-6">
													<label for="TELEFONO2">Telefono Alternativo</label>
													<input type="text" class="form-control" id="TELEFONO2" placeholder="Telefono Alternativo" value="<?php echo $data->TELEFONO2 ?>">
												</div>
											</div>
											<div class="form-row">
												<div class="col-md-6">
													<label for="EMAIL">Email</label>
													<input type="text" class="form-control" id="EMAIL" placeholder="EMAIL" required="" value="<?php echo $data->EMAIL ?>">
													<input type="hidden" id="confirmer" value="0">
												</div>
											</div>

											<div class="form-row">
												<div class="col-md-12 text-right mt-3">
													<button class="btn btn-primary modal-confirm" id="editOwner">Guardar</button>
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
									<a class="btn btn-primary btn-block modal-with-form" href="#modalForm">Agregar Mascota </a>
									</div>																
								</div>
						</div>
					</div>	
					<div id="modalForm" class="modal-block modal-block-primary mfp-hide">
											<section class="card">
												<header class="card-header">
													<h2 class="card-title">Formulario de Registro</h2>
												</header>
												<div class="card-body">
													<form id="form" enctype="multipart/form-data" method="POST" onsubmit="upload(this);return false">
														<div class="form-row">
														<div class="alert alert-danger" id="alertif" style="display:none;width:100%;text-align:center">
															<strong>Oh que mal!</strong> Aun hay espacios por completar.
														</div>
															<div class="form-group col-md-6">
																<label for="NOMBRE">Nombre:</label>
																<input type="text" class="form-control" id="NOMBRE" name="NOMBRE" placeholder="Nombre" required>
															</div>
															<div class="form-group col-md-6 mb-3 mb-lg-0">
																<label for="SEXO">Sexo:</label>
																<select name="SEXO" id="SEXO" class="form-control" placeholder="Sexo" required>
																	<option Selected value="Seleccione...">Seleccione...</option>
																	<option value="Hembra">Hembra</option>
																	<option value="Hembra Esterilizada">Hembra Esterelizada</option>
																	<option value="Macho">Macho</option>
																	<option value="Macho Castrado">Macho Castrado</option>
																</select>
															</div>
														</div>
														<div class="form-row">
															<div class="form-group col-md-6">
																<label for="TIPO">Tipo:</label>
																<select name="TIPO" id="TIPO" class="form-control" placeholder="Tipo" required>
																	<option Selected value="Seleccione...">Seleccione...</option>
																	<option value="Canino">Canino</option>
																	<option value="Felino">Felino</option>
																	<option value="Silvestre">Silvestre</option>
																	<option value="Otros">Otros</option>
																</select>
															</div>
															<div class="form-group col-md-6 mb-3 mb-lg-0">
																<label for="RAZA">Raza:</label>
																<input type="text" name="RAZA" id="RAZA" class="form-control" placeholder="Raza" required>
															</div>
														</div>
														<div class="form-row">
															<div class="form-group col-md-6">
																<label for="COLOR">Color:</label>
																<input type="text" class="form-control" id="COLOR" name="COLOR" placeholder="Color" required>
															</div>
															<div class="form-group col-md-6">
																<label for="FEC_NAC">Fecha Nacimiento:</label>
																<input type="date" class="form-control" id="FEC_NAC" name="FEC_NAC" placeholder="Fecha Nacimiento" required>
															</div>
														</div>
														<input type="hidden" value="<?php echo $_SESSION['user']->ID_EMPRESA; ?>" id="idEmp">
														<input type="hidden" value="<?php echo $_GET['id']; ?>" id="DUENO">
														<br>
													<div id="ver" class="center" style="margin:0 auto">

													</div>
														<div class="form-group row">
													<label class="col-lg-6 center control-label text-lg-right pt-2 ">Cargar Foto Paciente</label>
													<div class="col-lg-12 center">
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
													</div>
													<input type="hidden" id="confirmer" value="0">
													
											
												</div>
													</form>
												</div>
												<footer class="card-footer">
													<div class="row">
														<div class="col-md-12 text-right">
															<button class="btn btn-primary modal-confirm" id="createPatient">Crear</button>
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
				<script>

			$('#DEPARTAMENTO').on('change',function(){
				id = $('#DEPARTAMENTO').val();
				getCity(id);
			});
			
            $('#file').change(function(){
              filePreview(this);
            });

			function filePreview(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.readAsDataURL(input.files[0]);
                    reader.onload = function (e) {
                        $('#ver + img').remove();
                        $('#ver').after('<img src="'+e.target.result+'" width="150" height="150"/>');
                    }					
                }
            }

			function getCity(id) {
				console.log(id);
				$.ajax({
					url:'?controller=owner&method=getCities&id='+id,
					type:'GET',
					success:function(response){
						let datas = JSON.parse(response);
						
						let template = '<option value="seleccione">Seleccione...</option>';
						datas.forEach(data=>{
							template += `
						<option value='${data.id}'>${data.nombre}</option>
						`
						})
						$('#CIUDAD').html(template);
					}
				});
	}
		</script>