<?php

require 'Models/Contability.php';
require 'Models/Owner.php';
require 'Models/Patient.php';
require 'vendor/autoload.php';

/**
 * controlador Contabilidad
 */

class ContabilityController
{
	private $model;
	private $owner;
    private $patient;

	public function __construct()
	{
		$this->model = new Contability;
        $this->owner = new Owner;
        $this->patient = new Patient;
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
		require 'Views/Contability/checkout.php';
    }

}

?>