<?php

require 'Models/Owner.php';
require 'Models/Departament.php';
require 'Models/City.php';
require 'Models/Patient.php';

require 'vendor/autoload.php';

/**
 * controlador propietarios
 */

class OwnerController
{
	private $model;
	

	public function __construct()
	{
		$this->model = new Owner;
		$this->departament = new Departament;
		$this->city = new City;
		$this->patient = new Patient;	
	}
    public function newOwner()
	{
	    $this->model->createOwner($_REQUEST);
	}
	
	public function editOwner()
	{
	    $this->model->updateOwner($_REQUEST);
		// var_dump($_REQUEST);
	}
	
	public function getList()
	{
		$list=$this->model->getList();
	}

	public function profileOwner()
	{
		require 'Views/Layout.php';
		require 'Views/Scripts.php';
		$pets=$this->patient->getByOwner($_GET['id']);
		$cpets=count($pets);
		$departament=$this->departament->getAll();
		$data=$this->model->getById($_GET['id']);

		require 'Views/Owner/profileOwner.php';
	}

	public function template()
	{
		require 'Views/Layout.php';
		require 'Views/Scripts.php';
		$departament=$this->departament->getAll();
        $owners=$this->model->getAll();
		require 'Views/Owner/list.php';
	}
}

?>