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
		$bills= $this->model->getAll();
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

	public function viewBill()
	{
		require 'Views/Layout.php';
		require 'Views/Scripts.php';
		$datas= $this->model->getDataByBill($_GET['id']);
		$procedures = $this->model->getDataxBillShow($_GET['idc']);
		require 'Views/Contability/viewBill.php';
	}

	public function searchProductsxBill()
	{
		$this->model->searchProductsxBill($_REQUEST);
	}

	public function searchProductsxBillShow()
	{
		$this->model->searchProductsxBillShow($_REQUEST);
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

	public function closeSale()
	{	
		$ticket=$_REQUEST['TICKET'];
		unset($_REQUEST['TICKET']);

		if ($_REQUEST['FORMA_PAGO']==1) {
			$_REQUEST+=['CREDITO'=>1,'PLAZO'=>0,'PAGO'=>0,'ESTADO'=>'Pendiente'];
		}else{
			$_REQUEST+=['CREDITO'=>0,'PLAZO'=>0,'PAGO'=>1,'ESTADO'=>'Cerrado'];
		}
		$this->model->closeSale($_REQUEST);
		$this->inventory->addOutputs($_REQUEST);
	}

}

?>