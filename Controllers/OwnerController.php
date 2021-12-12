<?php

require 'Models/Owner.php';
// require 'Models/User.php';
// require 'Models/Garanty.php';
// require 'Models/Rol.php';

require 'vendor/autoload.php';
/**
 * controlador personal
 */
class OwnerController
{
	private $model;
	

	public function __construct()
	{
		$this->model = new Owner;
		
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
	
	public function layoutOwner()
	{
		require 'Views/Layout.php';
		require 'Views/Scripts.php';
		$data=$this->model->getById($_GET['id']);
		require 'Views/Owner/profileOwner.php';
	}

	public function template()
	{
		require 'Views/Layout.php';
		require 'Views/Scripts.php';
        $owners=$this->model->getAll();
		require 'Views/Owner/list.php';
	}

}

?>