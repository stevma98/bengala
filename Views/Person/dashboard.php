
			<div class="inner-wrapper">
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Principal</h2>
					
						<div class="right-wrapper text-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fas fa-home"></i>
									</a>
								</li>
								<li><span>Principal</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
					<div class="row">
						<div class="col-lg-12 mb-3">
							<section class="card">
								<div class="card-body">
									<div class="row">
										<div class="col-lg-3 mb-3">
											<h3><b>Comunicados </b></h3>
											<img src="Assets/img/1.jpg" style="max-width:100%">
										</div>
										<div class="col-lg-1 mb-1"></div>
										<div class="col-lg-7 mb-7">
											<div class="row">
												<div class="col-lg-12 mb-12">
													<label for="FAST_SEARCH"><li class="fas fa-search"></li> Busqueda Rapida</label>
													<select data-plugin-selectTwo class="form-control populate" id="FAST_SEARCH">
														<option value="">Seleccione...</option>
														<?php foreach ($patients as $patient) { ?>
															<option value="?controller=patient&method=profilePatient&id=<?php echo $patient->ID_MASCOTA ?>">Paciente: <?php echo $patient->NOMBRE ?></option>
														<?php } ?>
														<?php foreach ($owners as $owner) { ?>
															<option value="?controller=owner&method=profileOwner&id=<?php echo $owner->ID_PROP ?>">Propietario: <?php echo $owner->ST_NOM." ".$owner->ST_APE ?></option>
														<?php } ?>
													</select>
												</div>
											</div>
												<br><br>
											<div class="row">
												<div class="col-lg-4 mb-4"><a href="?controller=vaccine&method=template" style="decoration-text:none;color:#787575"><div class="card"><div class="card-body" style="background-color:white;height:100px;background-image:url(Assets/img/vacuna.jpg);background-size:90px;background-repeat:no-repeat;border:1px solid #bfbfbf;box-shadow: 2px 2px 3px #bfbfbf"><h2 class="pull-right">Vacunas</h2></div></div></div></a>
												<div class="col-lg-4 mb-4"><a href="?controller=barber&method=template" style="decoration-text:none;color:#787575"><div class="card"><div class="card-body" style="background-color:white;height:100px;background-image:url(Assets/img/barbery.jpg);background-size:90px;background-repeat:no-repeat;border:1px solid #bfbfbf;box-shadow: 2px 2px 3px #bfbfbf"><h2 class="pull-right">Peluqueria</h2></div></div></div></a>
												<div class="col-lg-4 mb-4"><a href="?controller=query&method=controlQuery" style="decoration-text:none;color:#787575"><div class="card"><div class="card-body" style="background-color:white;height:100px;background-image:url(Assets/img/query.png);background-size:90px;background-repeat:no-repeat;border:1px solid #bfbfbf;box-shadow: 2px 2px 3px #bfbfbf"><h2 class="pull-right">Consultas</h2></div></div></div></a>
											</div>
											<div class="row">
												<div class="col-lg-4 mb-4"><a href="?controller=contability&method=template" style="decoration-text:none;color:#787575"><div class="card"><div class="card-body" style="background-color:white;height:100px;background-image:url(Assets/img/box.png);background-size:90px;background-repeat:no-repeat;border:1px solid #bfbfbf;box-shadow: 2px 2px 3px #bfbfbf"><h2 class="pull-right">Caja</h2></div></div></div></a>
												<div class="col-lg-4 mb-4"><a href="?controller=inventory&method=historySales" style="decoration-text:none;color:#787575"><div class="card"><div class="card-body" style="background-color:white;height:100px;background-image:url(Assets/img/receipt.png);background-size:90px;background-repeat:no-repeat;border:1px solid #bfbfbf;box-shadow: 2px 2px 3px #bfbfbf"><h2 class="pull-right">Ventas</h2></div></div></div></a>
												<div class="col-lg-4 mb-4"><a href="?controller=inventory&method=history" style="decoration-text:none;color:#787575"><div class="card"><div class="card-body" style="background-color:white;height:100px;background-image:url(Assets/img/purchase.png);background-size:90px;background-repeat:no-repeat;border:1px solid #bfbfbf;box-shadow: 2px 2px 3px #bfbfbf"><h2 class="pull-right">Compras</h2></div></div></div></a>
											</div>
										</div>
									</div>
								</div>
							</section>
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
		<script src="Assets/vendor/select2/js/select2.js"></script>
		<script>
			(function($) {

'use strict';

if ( $.isFunction($.fn[ 'select2' ]) ) {

	$(function() {
		$('[data-plugin-selectTwo]').each(function() {
			var $this = $( this ),
				opts = {};

			var pluginOptions = $this.data('plugin-options');
			if (pluginOptions)
				opts = pluginOptions;

			$this.themePluginSelect2(opts);
		});
	});

}

}).apply(this, [jQuery]);

$('#FAST_SEARCH').change(function(){
	var link = $('#FAST_SEARCH').val();
	location.href=link;
});
		</script>
