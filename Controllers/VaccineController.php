<?php

require 'Models/Vaccine.php';
require 'Models/Owner.php';
require 'vendor/autoload.php';

/**
 * controlador propietarios
 */

class VaccineController
{
	private $model;
	private $owner;
	

	public function __construct()
	{
		$this->model = new Vaccine;
		$this->owner = new Owner;
		
	}
    public function newVaccine()
	{
	    $this->model->createVaccine($_REQUEST);
	}
	
	public function createVaccineAppoinment()
	{
		$this->model->createVaccineAppoinment($_REQUEST);
	}

	public function editVaccine()
	{
	    $this->model->updateVaccine($_REQUEST);
		// var_dump($_REQUEST);
	}

	public function template()
	{
		require 'Views/Layout.php';
		require 'Views/Scripts.php';
		$owners=$this->owner->getAll();
        $Vaccines=$this->model->getAll();
		$vaccinesI=$this->model->getAllInventory();
		require 'Views/Vaccine/list.php';
	}

	public function getPresentation()
	{
		$this->model->getPresentationById($_GET['id']);
	}

	public function getById()
	{
		$this->model->getByIdInventory($_POST['id']);
	}

	public function inventory()
	{
		require 'Views/Layout.php';
		require 'Views/Scripts.php';
		$vaccines=$this->model->getAllInventory();
		require 'Views/Vaccine/inventory.php';
	}
}

?>