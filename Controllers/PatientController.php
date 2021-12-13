<?php

require 'Models/Patient.php';
require 'Models/Owner.php';
require 'vendor/autoload.php';

/**
 * controlador propietarios
 */

class PatientController
{
	private $model;
	

	public function __construct()
	{
		$this->model = new Patient;
        $this->owner = new Owner;
		
	}
    public function newPatient()
	{
        var_dump($_REQUEST);
	    // $this->model->createPatient($_REQUEST);
	}
	
	public function editPatient()
	{
	    $this->model->updatePatient($_REQUEST);
		// var_dump($_REQUEST);
	}
	
	public function profilePatient()
	{
		require 'Views/Layout.php';
		require 'Views/Scripts.php';
		$data=$this->model->getById($_GET['id']);
		require 'Views/Owner/profilePatient.php';
	}

	public function template()
	{
		require 'Views/Layout.php';
		require 'Views/Scripts.php';
        $patients=$this->model->getAll();
        $owners=$this->owner->getAll();
		require 'Views/Patient/list.php';
	}

}

?>