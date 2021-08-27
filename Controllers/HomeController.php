<?php

/**
 * Controlador Principal
 */
class HomeController
{
	public function index()
	{
		if (isset($_SESSION['user'])) {
			header('Location: ?controller=person&method=template');
		}else{
			?>
          <script type="text/javascript">
            alert("Su sesion se ha vencido, ingrese nuevamente por favor");
            location.href="Views/login.php";
          </script>
          <?php
		}
	}
}