<?php

require 'Models/Query.php';
require 'Models/Patient.php';
require 'Models/Owner.php';
require 'vendor/autoload.php';

/**
 * controlador Query
 */

class QueryController
{
	private $model;
	private $owner;
	private $patient;
	

	public function __construct()
	{
		$this->model = new Query;
		$this->owner = new Owner;
		$this->patient = new Patient;
		
	}
    public function newQuery()
	{
	    $this->model->createQuery($_REQUEST);
	}
	
	public function createQueryAppointment()
	{
        $consecutive=$this->model->searchConsecutive();
        $count=count($consecutive);
        $count+=1;
        $_REQUEST += ['CONSECUTIVO_CONSULTA' => $count];
        $_REQUEST += ['USUARIO_CONSULTA' => $_SESSION['user']->identyUser];
        $this->model->createQueryAppointment($_REQUEST);
	}

    public function createImmediatelyQuery()
	{
        $consecutive=$this->model->searchConsecutive();
        $count=count($consecutive);
        $count+=1;
        $_REQUEST += ['CONSECUTIVO_CONSULTA' => $count];
        $_REQUEST += ['USUARIO_CONSULTA' => $_SESSION['user']->identyUser];
        $this->model->createImmediatelyQuery($_REQUEST);
	}

	public function editQuery()
	{
	    $this->model->updateQuery($_REQUEST);
		// var_dump($_REQUEST);
	}

	public function controlQuery()
	{
		require 'Views/Layout.php';
		require 'Views/Scripts.php';
		$queries=$this->model->getAll();
		$owners=$this->owner->getAll();
		$products=$this->patient->getProducts();
		require 'Views/Query/list.php';
	}

	public function getById()
	{
		$this->model->getByIdInventory($_POST['id']);
	}

	public function inventory()
	{
		require 'Views/Layout.php';
		require 'Views/Scripts.php';
		$Querys=$this->model->getAllInventory();
		require 'Views/Query/inventory.php';
	}

	public function getQueryByPatient()
	{
		$this->model->searchQuerysById($_REQUEST);
	}

	public function editQuery1()
	{
		$this->model->editQuery1($_REQUEST);
	}
	


}

?>