<?php

require 'Models/Departament.php';

require 'vendor/autoload.php';

/**
 * controlador Departamento
 */

class DepartamentController
{
	private $model;
	

	public function __construct()
	{
		$this->model = new Departament;
	}
    
    public function getList()
    {
        try {
            $departament=$this->model->getAll();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        
    }
}

?>