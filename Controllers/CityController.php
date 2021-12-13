<?php

require 'Models/City.php';

require 'vendor/autoload.php';

/**
 * controlador propietarios
 */

class CityController
{
	private $model;
	

	public function __construct()
	{
		$this->model = new City;
	}
    
    public function getList()
    {
        $id=$_GET['id'];
        try {
            $cities=$this->model->getAll($id);
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }
}

?>