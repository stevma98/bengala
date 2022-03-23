<?php

require 'Models/Person.php';
// require 'Models/User.php';
// require 'Models/Garanty.php';
// require 'Models/Rol.php';




require 'vendor/autoload.php';
/**
 * controlador personal
 */
class PersonController
{
	private $model;
	private $rol;
	private $client;
	private $garanty;

	public function __construct()
	{
		$this->model = new Person;
		// $this->rol = new Rol;
		// $this->client = new User;
		// $this->garanty = new Garanty;
	}



	public function template()
	{
		require 'Views/Layout.php';
				require 'Views/Scripts.php';
				require 'Views/Person/list.php';
	}

}

?>