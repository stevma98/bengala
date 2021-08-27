<?php

require 'Models/Login.php';

class LoginController
{
    private $model;

    public function __construct()
	{
		$this->model = new Login;
    }
    
    public function index()
	{
		if (!isset($_SESSION['user']) ) {
			require 'Views/login.php';
		}else{
			header('Location: ?controller=person&method=template');
		}
    }
    
    public function loginIn()
	{    
		
			$validateUserEmp = $this->model->validateUserEmp($_POST);
			$validateAdmin = $this->model->validateAdmin($_POST);
			if ($validateUserEmp === true || $validateAdmin === true) {
                echo $_SESSION['user']->identyUser;
				header('Location: ?controller=person&method=template');
		    }else {
				?>
                <script>
                    alert('¡Contraseña Incorrecta!');
                    location.href="Views/login.php";
                </script>
                <?php
                
			}
	
			
	}

	public function logout()
	{
		if ($_SESSION['user']) {
			session_destroy();
			?>
          <script type="text/javascript">
            alert("Su sesion se ha vencido, ingrese nuevamente por favor");
            location.href="index.php";
          </script>
          <?php
		} else {
			?>
          <script type="text/javascript">
            alert("Su sesion se ha vencido, ingrese nuevamente por favor");
            location.href="index.php";
          </script>
          <?php
		}
	}
}