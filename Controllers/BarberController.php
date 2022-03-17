<?php

require 'Models/Barber.php';
require 'Models/Owner.php';
require 'vendor/autoload.php';

/**
 * controlador Peluqueria
 */

class BarberController
{
	private $model;
	private $owner;
	

	public function __construct()
	{
		$this->model = new Barber;
		$this->owner = new Owner;
		
	}
    public function newBarber()
	{
	    $this->model->createBarber($_REQUEST);
	}
	
	public function createBarberAppointment()
	{
		$this->model->createBarberAppointment($_REQUEST);
	}

	public function editBarber()
	{
	    $this->model->updateBarber($_REQUEST);
		// var_dump($_REQUEST);
	}

	public function template()
	{
		require 'Views/Layout.php';
		require 'Views/Scripts.php';
		$owners=$this->owner->getAll();
        $Barbers=$this->model->getAll();
		require 'Views/Barber/list.php';
	}

	public function getById()
	{
		$this->model->getByIdInventory($_POST['id']);
	}

	public function inventory()
	{
		require 'Views/Layout.php';
		require 'Views/Scripts.php';
		$Barbers=$this->model->getAllInventory();
		require 'Views/Barber/inventory.php';
	}

	public function getBarberByPatient()
	{
		$this->model->getBarberByPatient($_REQUEST);
	}

	public function checkBarber()
	{
		$data=['ESTADO_PELUQUERIA'=>'Realizado','ID_PELUQUERIA'=>$_GET['id'],'ID_EMPRESA'=>$_GET['ide']];
		$this->model->checkBarber($data);
	}

	public function cancelBarber()
	{
		$data=['ESTADO_PELUQUERIA'=>'Cancelado','ID_PELUQUERIA'=>$_GET['id'],'ID_EMPRESA'=>$_GET['ide']];
		$this->model->cancelBarber($data);
	}
}

?>