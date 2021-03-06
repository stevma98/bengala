<!doctype html>
<html class="fixed sidebar-left-collapsed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Bengala Software</title>
		<meta name="keywords" content="bengala, software veterinario, software animal, animales, software" />
		<meta name="description" content="Software para veterinario donde podran gestionar todas las solicitudes de sus pacientes y propietarios">
		<meta name="author" content="Reyes Devs">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:100,300,400,600,800,900|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Assets/vendor CSS -->
		<link rel="stylesheet" href="Assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="Assets/vendor/animate/animate.css">

		<link rel="stylesheet" href="Assets/vendor/font-awesome/css/all.min.css" />
		<link rel="stylesheet" href="Assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="Assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />

		<!-- Specific Page Assets/vendor CSS -->
		<link rel="stylesheet" href="Assets/vendor/jquery-ui/jquery-ui.css" />
		<link rel="stylesheet" href="Assets/vendor/jquery-ui/jquery-ui.theme.css" />
		<link rel="stylesheet" href="Assets/vendor/bootstrap-multiselect/css/bootstrap-multiselect.css" />
		<link rel="stylesheet" href="Assets/vendor/morris/morris.css" />
		<link rel="stylesheet" href="Assets/vendor/pnotify/pnotify.custom.css" />
		<link rel="stylesheet" href="Assets/vendor/boxicons/css/boxicons.min.css" />
		<link rel="stylesheet" href="Assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css" />
		

		<!--(remove-empty-lines-end)-->

		<!-- Theme CSS -->
		<link rel="stylesheet" href="Assets/css/theme.css" />
<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="Assets/vendor/select2/css/select2.css" />
		<link rel="stylesheet" href="Assets/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
		<link rel="stylesheet" href="Assets/vendor/datatables/media/css/dataTables.bootstrap4.css" />


		<!--(remove-empty-lines-end)-->



		<!-- Skin CSS -->
		<link rel="stylesheet" href="Assets/css/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="Assets/css/custom.css">

		<!-- Head Libs -->
		<script src="Assets/vendor/modernizr/modernizr.js"></script>

	</head>
	<style>
				
	::-webkit-scrollbar {
    -webkit-appearance: none;
	}

	::-webkit-scrollbar:vertical {
		width:15px;
	}

	::-webkit-scrollbar-button:increment,::-webkit-scrollbar-button {
		display: none;
	} 

	::-webkit-scrollbar:horizontal {
		height: 10px;
	}

	::-webkit-scrollbar-thumb {
		background-color: #797979;
		border-radius: 20px;
		border: 2px solid #f1f2f3;
	}

	::-webkit-scrollbar-track {
		border-radius: 10px;  
	}
	</style>
	<body>
		<section class="body">

			<!-- start: header -->
			<header class="header">
				<div class="logo-container">
					<a href="../3.0.0" class="logo">
						<img src="Assets/img/logo.png" width="75" height="35" alt="Porto Admin" />
					</a>
					<div class="d-md-none toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fas fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
			
				<!-- start: search & user box -->
				<div class="header-right">
			
					<form action="pages-search-results.html" class="search nav-form">
						<div class="input-group">
							<input type="text" class="form-control" name="q" id="q" placeholder="Search...">
							<span class="input-group-append">
								<button class="btn btn-default" type="submit"><i class="fas fa-search"></i></button>
							</span>
						</div>
					</form>
			
					<span class="separator"></span>
			
					<ul class="notifications">
						<li>
							<a href="?controller=inventory&method=sale" class="notification-icon" style="background-color:#0088CC;border-radius:10% !important">
								<i class="fas fa-store" style="color:white"></i>
							</a>
						</li>
						<li>
							<a href="?controller=query&method=calendar" class="notification-icon" style="background-color:#c74a6f;border-radius:10% !important">
								<i class="far fa-calendar-alt" style="color:white"></i>
							</a>
						</li>
						<li>
							<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
								<i class="fas fa-tasks"></i>
								<span class="badge">3</span>
							</a>
			
							<div class="dropdown-menu notification-menu large">
								<div class="notification-title">
									<span class="float-right badge badge-default">3</span>
									Tasks
								</div>
			
								<div class="content">
									<ul>
										<li>
											<p class="clearfix mb-1">
												<span class="message float-left">Generating Sales Report</span>
												<span class="message float-right text-dark">60%</span>
											</p>
											<div class="progress progress-xs light">
												<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</li>
						<li>
							<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
								<i class="fas fa-envelope"></i>
								<span class="badge">4</span>
							</a>
			
							<div class="dropdown-menu notification-menu">
								<div class="notification-title">
									<span class="float-right badge badge-default">230</span>
									Messages
								</div>
			
								<div class="content">
									<ul>
										<li>
											<a href="#" class="clearfix">
												<figure class="image">
													<img src="img/!sample-user.jpg" alt="Joseph Doe Junior" class="rounded-circle" />
												</figure>
												<span class="title">Joseph Doe</span>
												<span class="message">Lorem ipsum dolor sit.</span>
											</a>
										</li>
									</ul>
			
									<hr />
			
									<div class="text-right">
										<a href="#" class="view-more">View All</a>
									</div>
								</div>
							</div>
						</li>
						<li>
							<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
								<i class="fas fa-bell"></i>
								<span class="badge">3</span>
							</a>
			
							<div class="dropdown-menu notification-menu">
								<div class="notification-title">
									<span class="float-right badge badge-default">3</span>
									Alerts
								</div>
								<div class="content">
									<ul>
										<li>
											<a href="#" class="clearfix">
												<div class="image">
													<i class="fas fa-thumbs-down bg-danger text-light"></i>
												</div>
												<span class="title">Server is Down!</span>
												<span class="message">Just now</span>
											</a>
										</li>
										<li>
											<a href="#" class="clearfix">
												<div class="image">
													<i class="fas fa-thumbs-down bg-danger text-light"></i>
												</div>
												<span class="title">Server is Down!</span>
												<span class="message">Just now</span>
											</a>
										</li>
									</ul>
			
									<hr />
			
									<div class="text-right">
										<a href="#" class="view-more">View All</a>
									</div>
								</div>
							</div>
						</li>
					</ul>
			
					<span class="separator"></span>
			
					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="Assets/img/!logged-user.jpg" alt="Joseph Doe" class="rounded-circle" data-lock-picture="img/!logged-user.jpg" />
							</figure>
							<div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
								<span class="name">John Doe Junior</span>
								<span class="role">Administrator</span>
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled mb-2">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="pages-user-profile.html"><i class="fas fa-user"></i> My Profile</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fas fa-lock"></i> Lock Screen</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="?controller=login&method=logOut"><i class="fas fa-power-off"></i> Logout</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- end: search & user box -->
			</header>
			<!-- end: header -->

			<div class="inner-wrapper" >
				<!-- start: sidebar -->
				<aside id="sidebar-left" class="sidebar-left">
				
				    <div class="sidebar-header">
				        <div class="sidebar-title">
				            Navigation
				        </div>
				        <div class="sidebar-toggle d-none d-md-block" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
				            <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
				        </div>
				    </div>
				
				    <div class="nano">
				        <div class="nano-content">
				            <nav id="menu" class="nav-main" role="navigation">
				            
				                <ul class="nav nav-main">
				                    <li>
				                        <a class="nav-link" href="?controller=person&method=dashboard">
				                            <i class="fas fa-home" aria-hidden="true"></i>
				                            <span>Dashboard</span>
				                        </a>                        
				                    </li>
				                    <li class="nav-parent">
				                        <a class="nav-link" href="#">
				                            <i class="fas fa-address-book" aria-hidden="true"></i>
				                            <span>Propietarios</span>
				                        </a>
				                        <ul class="nav nav-children">
				                            <li>
				                                <a class="nav-link" href="?controller=owner&method=template">
				                                    Listar
				                                </a>
				                            </li>
				                        </ul>
				                    </li>
									<li class="nav-parent">
				                        <a class="nav-link" href="#">
				                            <i class="fas fa-paw" aria-hidden="true"></i>
				                            <span>Mascotas</span>
				                        </a>
				                        <ul class="nav nav-children">
				                            <li>
				                                <a class="nav-link" href="?controller=patient&method=template">
				                                    Listar
				                                </a>
				                            </li>
				                        </ul>
				                    </li>
									<li class="nav-parent">
				                        <a class="nav-link" href="#">
				                            <i class="fas fa-syringe" aria-hidden="true"></i>
				                            <span>Vacunas</span>
				                        </a>
				                        <ul class="nav nav-children">
				                            <li>
				                                <a class="nav-link" href="?controller=vaccine&method=template">
				                                    Listar
				                                </a>
				                            </li>
											<li>
				                                <a class="nav-link" href="?controller=vaccine&method=inventory">
				                                    Inventario
				                                </a>
				                            </li>
				                        </ul>
				                    </li>
									<li class="nav-parent">
				                        <a class="nav-link" href="#">
				                            <i class="fas fa-cut" aria-hidden="true"></i>
				                            <span>Peluqueria</span>
				                        </a>
				                        <ul class="nav nav-children">
				                            <li>
				                                <a class="nav-link" href="?controller=barber&method=template">
				                                    Listar
				                                </a>
				                            </li>
				                        </ul>
				                    </li>
									<li class="">
				                        <a class="nav-link" href="?controller=query&method=controlQuery">
				                            <i class="fas fa-book" aria-hidden="true"></i>
				                            <span>Consultas</span>
				                        </a>
				                    </li>
									<li class="nav-parent">
				                        <a class="nav-link" href="#">
				                            <i class="fas fa-file" aria-hidden="true"></i>
				                            <span>Consentimientos</span>
				                        </a>
				                        <ul class="nav nav-children">
				                            <li>
				                                <a class="nav-link" href="?controller=consent&method=template">
				                                    Listar
				                                </a>
				                            </li>
											<li>
				                                <a class="nav-link" href="?controller=consent&method=models">
				                                    Modelos
				                                </a>
				                            </li>
				                        </ul>
				                    </li>
									<li class="nav-parent">
				                        <a class="nav-link" href="#">
				                            <i class="fas fa-hand-holding-usd" aria-hidden="true"></i>
				                            <span>Contabilidad</span>
				                        </a>
				                        <ul class="nav nav-children">
				                            <li>
				                                <a class="nav-link" href="?controller=contability&method=template">
				                                    Administrar Caja
				                                </a>
				                            </li>
											<li>
				                                <a class="nav-link" href="?controller=contability&method=historyBox">
				                                    Historial Caja
				                                </a>
				                            </li>
											<li>
				                                <a class="nav-link" href="?controller=contability&method=adminCredi">
				                                    Administrar Cr??ditos
				                                </a>
				                            </li>
				                        </ul>
				                    </li>
									<li class="nav-parent">
				                        <a class="nav-link" href="#">
				                            <i class="fas fa-cogs" aria-hidden="true"></i>
				                            <span>Parametros</span>
				                        </a>
				                        <ul class="nav nav-children">
				                            <li>
				                                <a class="nav-link" href="?controller=person&method=users">
				                                    Usuarios
				                                </a>
				                            </li>
				                        </ul>
				                    </li>
									<li class="nav-parent">
				                        <a class="nav-link" href="#">
				                            <i class="fas fa-archive" aria-hidden="true"></i>
				                            <span>Inventario</span>
				                        </a>
				                        <ul class="nav nav-children">
				                            <li>
				                                <a class="nav-link" href="?controller=inventory&method=template">
				                                    Articulo/Servicio
				                                </a>
				                            </li>
											<li>
				                                <a class="nav-link" href="?controller=inventory&method=categories">
				                                    Categorias
				                                </a>
				                            </li>
											<li class="nav-parent">
				                                <a class="nav-link" href="#">
				                                    Compras
				                                </a>
				                                <ul class="nav nav-children">
				                                    <li>
				                                        <a class="nav-link" href="?controller=inventory&method=providers">
				                                            Proveedores
				                                        </a>
				                                    </li>
													<li>
				                                        <a class="nav-link" href="?controller=inventory&method=shopping">
				                                            Agregar Compra
				                                        </a>
				                                    </li>
													<li>
				                                        <a class="nav-link" href="?controller=inventory&method=history">
				                                            Historial
				                                        </a>
				                                    </li>
				                                </ul>
				                            </li>
											<li class="nav-parent">
				                                <a class="nav-link" href="#">
				                                    Ventas
				                                </a>
				                                <ul class="nav nav-children">
				                                    <li>
				                                        <a class="nav-link" href="?controller=inventory&method=sale">
				                                            Agregar Venta
				                                        </a>
				                                    </li>
													<li>
				                                        <a class="nav-link" href="?controller=inventory&method=historySales">
				                                            Historial
				                                        </a>
				                                    </li>
				                                </ul>
				                            </li>
											<li>
				                                <a class="nav-link" href="?controller=inventory&method=kardex">
				                                    Kardex
				                                </a>
				                            </li>
				                        </ul>
										
				                    </li>
				                    <li class="nav-parent">
				                        <a class="nav-link" href="#">
				                            <i class="fas fa-align-left" aria-hidden="true"></i>
				                            <span>Menu Levels</span>
				                        </a>
				                        <ul class="nav nav-children">
				                            <li>
				                                <a>
				                                    First Level
				                                </a>
				                            </li>
				                            <li class="nav-parent">
				                                <a class="nav-link" href="#">
				                                    Second Level
				                                </a>
				                                <ul class="nav nav-children">
				                                    <li>
				                                        <a>
				                                            Second Level Link #1
				                                        </a>
				                                    </li>
				                                    <li>
				                                        <a>
				                                            Second Level Link #2
				                                        </a>
				                                    </li>
				                                    <li class="nav-parent">
				                                        <a class="nav-link" href="#">
				                                            Third Level
				                                        </a>
				                                        <ul class="nav nav-children">
				                                            <li>
				                                                <a>
				                                                    Third Level Link #1
				                                                </a>
				                                            </li>
				                                            <li>
				                                                <a>
				                                                    Third Level Link #2
				                                                </a>
				                                            </li>
				                                        </ul>
				                                    </li>
				                                </ul>
				                            </li>
				                        </ul>
				                    </li>
				                </ul>
				            </nav>
				
				            <hr class="separator" />
				
				            <div class="sidebar-widget widget-tasks">
				                <div class="widget-header">
				                    <h6>Projects</h6>
				                    <div class="widget-toggle">+</div>
				                </div>
				                <div class="widget-content">
				                    <ul class="list-unstyled m-0">
				                        <li><a href="#">Porto HTML5 Template</a></li>
				                        <li><a href="#">Tucson Template</a></li>
				                        <li><a href="#">Porto Admin</a></li>
				                    </ul>
				                </div>
				            </div>
				
				            <hr class="separator" />
				
				            <div class="sidebar-widget widget-stats">
				                <div class="widget-header">
				                    <h6>Company Stats</h6>
				                    <div class="widget-toggle">+</div>
				                </div>
				                <div class="widget-content">
				                    <ul>
				                        <li>
				                            <span class="stats-title">Stat 1</span>
				                            <span class="stats-complete">85%</span>
				                            <div class="progress">
				                                <div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%;">
				                                    <span class="sr-only">85% Complete</span>
				                                </div>
				                            </div>
				                        </li>
				                        <li>
				                            <span class="stats-title">Stat 2</span>
				                            <span class="stats-complete">70%</span>
				                            <div class="progress">
				                                <div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;">
				                                    <span class="sr-only">70% Complete</span>
				                                </div>
				                            </div>
				                        </li>
				                        <li>
				                            <span class="stats-title">Stat 3</span>
				                            <span class="stats-complete">2%</span>
				                            <div class="progress">
				                                <div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="width: 2%;">
				                                    <span class="sr-only">2% Complete</span>
				                                </div>
				                            </div>
				                        </li>
				                    </ul>
				                </div>
				            </div>
				        </div>
				
				        <script>
				            // Maintain Scroll Position
				            if (typeof localStorage !== 'undefined') {
				                if (localStorage.getItem('sidebar-left-position') !== null) {
				                    var initialPosition = localStorage.getItem('sidebar-left-position'),
				                        sidebarLeft = document.querySelector('#sidebar-left .nano-content');
				                    
				                    sidebarLeft.scrollTop = initialPosition;
				                }
				            }
				        </script>
				        
				
				    </div>
				
				</aside>
				<!-- end: sidebar -->