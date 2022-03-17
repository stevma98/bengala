<?php

require 'Models/Query.php';
require 'Models/Owner.php';
require 'vendor/autoload.php';

/**
 * controlador Query
 */

class QueryController
{
	private $model;
	private $owner;
	

	public function __construct()
	{
		$this->model = new Query;
		$this->owner = new Owner;
		
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
        $this->model->createQueryAppointment($_REQUEST);
	}

	public function editQuery()
	{
	    $this->model->updateQuery($_REQUEST);
		// var_dump($_REQUEST);
	}
	
	public function template()
	{
		require 'Views/Layout.php';
		require 'Views/Scripts.php';
		$owners=$this->owner->getAll();
        $Querys=$this->model->getAll();
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