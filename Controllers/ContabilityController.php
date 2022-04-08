<?php

require 'Models/Contability.php';
require 'Models/Owner.php';
require 'Models/Patient.php';
require 'vendor/autoload.php';
require 'Models/Inventory.php';


/**
 * controlador Contabilidad
 */

class ContabilityController
{
	private $model;
	private $owner;
    private $patient;
	private $inventory;

	public function __construct()
	{
		$this->model = new Contability;
        $this->owner = new Owner;
        $this->patient = new Patient;
		$this->inventory = new Inventory;
	}
   
	public function template()
	{
		require 'Views/Layout.php';
		require 'Views/Scripts.php';
		require 'Views/Contability/list.php';
	}

    public function getDataxBill()
    {
        require 'Views/Layout.php';
		require 'Views/Scripts.php';
        $datas = $this->owner->getById($_GET['idp']);
        $patient = $this->patient->getById($_GET['id']);
        $procedures = $this->model->getDataxBill($_GET['id']);
		$products = $this->inventory->getAllArticle();
		require 'Views/Contability/checkout.php';
    }

	public function searchProductsxBill()
	{
		$this->model->searchProductsxBill($_REQUEST);
	}

	public function addCar()
	{
		$this->model->addCar($_REQUEST);
	}

	public function deleteRow()
	{
		$this->model->deleteRow($_REQUEST);
	}

	public function deleteProductsxCar()
	{
		$this->model->deleteProductsxCar($_REQUEST);
		header("Location:?controller=patient&method=profilePatient&id={$_REQUEST['id']}");
	}

}

?>