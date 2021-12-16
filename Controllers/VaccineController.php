<?php

require 'Models/Vaccine.php';
require 'vendor/autoload.php';

/**
 * controlador propietarios
 */

class VaccineController
{
	private $model;
	

	public function __construct()
	{
		$this->model = new Vaccine;
		
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
        $owners=$this->model->getAll();
		require 'Views/Vaccine/list.php';
	}
}

?>