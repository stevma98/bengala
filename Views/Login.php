<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:100,300,400,600,800,900|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- ../Assets/vendor CSS -->
		<link rel="stylesheet" href="../Assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="../Assets/vendor/animate/animate.css">

		<link rel="stylesheet" href="../Assets/vendor/font-awesome/css/all.min.css" />
		<link rel="stylesheet" href="../Assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="../Assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />

		<!--(remove-empty-lines-end)-->

		<!-- Theme CSS -->
		<link rel="stylesheet" href="../Assets/css/theme.css" />


		<!--(remove-empty-lines-end)-->



		<!-- Skin CSS -->
		<link rel="stylesheet" href="../Assets/css/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="../Assets/css/custom.css">

		<!-- Head Libs -->
		<script src="../Assets/vendor/modernizr/modernizr.js"></script>
        <style>
            input{
                border-radius:50px !important;
                height:70px !important;
                opacity:0.5;
                background-color:black !important;
                color:white !important;
                text-align:center;
            }
            body {
                position: relative; 
                height: 100vh;
                width: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            body:before {
                content: "";
                background-image: url('../Assets/img/bengala.jpg');
                background-size: cover;
                background-position:center;
                position: absolute;
                top: 0px;
                right: 0px;
                bottom: 0px;
                left: 0px;
                opacity: 0.7;
            }
            ::-webkit-scrollbar {
                display: none;
            }
            .button1{
                width:100%;border-radius:50px;height:70px
            }
            ::placeholder {
                color: white !important;
            }
            .logo1{
                margin:0 auto 10px;
                opacity:1
            }
            .logo1{
                position: relative;
                color: #ffffff;  
                font-size: 14rem;
                line-height: 0.9;
                text-align: center;
            }
            a{
                position: relative;
                color: black;  
                font-size:24px;
                line-height: 0.9;
                text-align: center;
                text-decoration:none !important;
            }  
            p{
                position: relative;
                color: black;  
                font-size:15px;
                line-height: 0.9;
                text-align: center;
            }
        </style>
	</head>
	<body>  
		<!-- start: page -->
		<section class="body-sign">
			<div class="center-sign">
                <div class="row logo1">
                <a href="#" class="logo1">
					<img src="../Assets/img/logo-light.png" height="100" alt="Porto Admin" />
				</a>
                </div>
				
						<!-- <form action="index.html" method="post" autocomplete="off"> -->
                        <form action="../?controller=login&method=loginIn" method="POST">
                        <input style="display:none" type="text" name="falsocodigo" autocomplete="off" />
							<div class="form-group mb-3">
								<div class="input-group">
									<input autocomplete="new-text" name="username" type="text" class="form-control form-control-lg" placeholder="Usuario"/>
								</div>
							</div>  

							<div class="form-group mb-3">
								<div class="input-group">
									<input autocomplete="new-password"  name="pwd" type="password" class="form-control form-control-lg" placeholder="Contraseña"/>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-12">
									<button type="submit" class="btn btn-primary button1" style="font-size:20px"><b>Ingresar</b></button>
								</div>
							</div>
                            <div class="clearfix center" style="padding-top:25px">
									<a href="pages-recover-password.html">¿Olvidaste tu contraseña?</a>
								</div>
						</form>

			</div>
		</section>
		<!-- end: page -->

		<!-- ../Assets/vendor -->
		<script src="../Assets/vendor/jquery/jquery.js"></script>
		<script src="../Assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="../Assets/vendor/popper/umd/popper.min.js"></script>
		<script src="../Assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="../Assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="../Assets/vendor/common/common.js"></script>
		<script src="../Assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="../Assets/vendor/magnific-popup/jquery.magnific-popup.js"></script>
		<script src="../Assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Specific Page ../Assets/vendor -->


		<!--(remove-empty-lines-end)-->
		
		<!-- Theme Base, Components and Settings -->
		<script src="../Assets/js/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="../Assets/js/custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="../Assets/js/theme.init.js"></script>

	</body>
</html>