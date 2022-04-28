<?php

require 'Models/Person.php';
require 'Models/Owner.php';
require 'Models/Patient.php';
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
		$this->patient = new Patient;
		$this->owner = new Owner;
	}

	public function dashboard()
	{
		require 'Views/Layout.php';
		require 'Views/Scripts.php';
		$patients = $this->patient->getAll();
		$owners = $this->owner->getAll();
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