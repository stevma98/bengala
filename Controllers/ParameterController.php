<?php

require 'Models/Parameter.php';
require 'vendor/autoload.php';

/**
 * controlador Parameter
 */

class ParameterController
{
	private $model;

	public function __construct()
	{
		$this->model = new Parameter;
		
	}
	
	public function template()
	{
		require 'Views/Layout.php';
		require 'Views/Scripts.php';
        $Parameters=$this->model->getAll();
		require 'Views/Parameter/list.php';
	}

}

?>