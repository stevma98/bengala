<style>
    li{padding:0px !important}
</style>
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
								<li><span>Pages</span></li>
								<li><span>User Profile</span></li>
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
                                    <img src="Pets/<?php echo $data->ID_MASCOTA ?>/<?php echo $data->NOMBRE ?>.jpg" alt="Foto Paciente" height="200" width="200" class="rounded">
										<div class="thumb-info-title">
												<span class="thumb-info-inner" id="name"><?php echo $data->NOMBRE ?></span>																						
												<span class="thumb-info-type"><?php echo $data->TIPO ?></span>
										</div>
									</div>
                                    <hr class="dotted short">

									<div class="widget-content-expanded">
											<ul class="simple-todo-list mt-3">
												<li class="far fa-heart"> Estado:</li> <?php echo $data->ESTADO_MASCOTA ?>
												<li class="">Change Personal Information</li>
												<li>Update Social Media</li>
												<li>Follow Someone</li>
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
										<span class="badge badge-primary label-sm font-weight-normal va-middle mr-3">298</span>
										<span class="va-middle">Friends</span>
									</h2>
								</header>
								<div class="card-body">
									<div class="content">
										<ul class="simple-user-list">
											<li>
												<figure class="image rounded">
													<img src="Assets/img/!sample-user.jpg" alt="Joseph Doe Junior" class="rounded-circle">
												</figure>
												<span class="title">Joseph Doe Junior</span>
												<span class="message truncate">Lorem ipsum dolor sit.</span>
											</li>
											<li>
												<figure class="image rounded">
													<img src="Assets/img/!sample-user.jpg" alt="Joseph Junior" class="rounded-circle">
												</figure>
												<span class="title">Joseph Junior</span>
												<span class="message truncate">Lorem ipsum dolor sit.</span>
											</li>
											<li>
												<figure class="image rounded">
													<img src="Assets/img/!sample-user.jpg" alt="Joe Junior" class="rounded-circle">
												</figure>
												<span class="title">Joe Junior</span>
												<span class="message truncate">Lorem ipsum dolor sit.</span>
											</li>
											<li>
												<figure class="image rounded">
													<img src="Assets/img/!sample-user.jpg" alt="Joseph Doe Junior" class="rounded-circle">
												</figure>
												<span class="title">Joseph Doe Junior</span>
												<span class="message truncate">Lorem ipsum dolor sit.</span>
											</li>
										</ul>
										<hr class="dotted short">
										<div class="text-right">
											<a class="text-uppercase text-muted" href="#">(View All)</a>
										</div>
									</div>
								</div>
								<div class="card-footer">
									<div class="input-group">
										<input type="text" class="form-control" name="s" id="s" placeholder="Search...">
										<span class="input-group-append">
											<button class="btn btn-default" type="submit"><i class="fas fa-search"></i>
											</button>
										</span>
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
						<div class="col-lg-10 col-xl-8">

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
											</div>
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
                                                <img src="Pets/<?php echo $data->ID_MASCOTA ?>/<?php echo $data->NOMBRE ?>.jpg" alt="Foto Paciente" height="150" width="150">
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
                                                        <option value="Macho">Macho</option>
                                                        <option value="Hembra">Hembra</option>
													</select>
												</div>
												<div class="col-md-6">
													<label for="TIPO">Tipo</label>
													<select id="TIPO" class="form-control" required="">
														<option selected value="<?php echo $data->TIPO ?>"><?php echo $data->TIPO ?></option>
														<option value="Perro">Perro</option>
                                                        <option value="Gato">Gato</option>
													</select>
												</div>
											</div>
											<div class="form-row">
												<div class="col-md-6">
                                                    <label for="RAZA">Raza</label>
													<select id="RAZA" class="form-control" required="">
														<option selected value="<?php echo $data->RAZA ?>"><?php echo $data->RAZA ?></option>
														<option value="Criollo">Criollo</option>
                                                        <option value="Otro">Otro...</option>
													</select>
												</div>
												<div class="col-md-6">
                                                    <label for="Color">Color</label>
                                                    <input type="text" class="form-control" id="COLOR" placeholder="Color" value="<?php echo $data->COLOR ?>" required="">
												</div>
											</div>
											<div class="form-row">
												<div class="col-md-12">
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
												<div class="col-md-12">
                                                    <label for="ESTADO">Estado:</label>
                                                        <select name="ESTADO" id="ESTADO" class="form-control" placeholder="Estado" required>
                                                            <option Selected value="<?php echo $data->ESTADO_MASCOTA?>"><?php echo $data->ESTADO_MASCOTA?></option>
                                                            <option value="Vivo">Vivo</option>
                                                            <option value="Muerto">Muerto</option>
                                                            <option value="Otro">Otro</option>
                                                        </select>
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
						<div class="col-xl-3">                        
					<!-- end: page -->
				</section>
                <script src="Assets/vendor/common/common.js"></script>
				<script>

			$('#DEPARTAMENTO').on('change',function(){
				id = $('#DEPARTAMENTO').val();
				getCity(id);
			});

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