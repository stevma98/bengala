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

	public function __construct()
	{
		$this->model = new Person;
	}

	public function dashboard()
	{
		require 'Views/Layout.php';
		require 'Views/Scripts.php';
		require 'Views/Person/Dashboard.php';
	}
	
	public function users()
	{
		require 'Views/Layout.php';
		require 'Views/Scripts.php';
		$users = $this->model->getAllEmployees();
		require 'Views/Person/listUsers.php';
	}

	public function createUser()
	{
		$this->model->createUser($_REQUEST);
	}

	public function editUser()
	{
		$this->model->editUser($_REQUEST);
	}

	public function getDataById()
	{
		$this->model->getDataById($_REQUEST);
	}

}

?>