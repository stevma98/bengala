<?php

require 'Models/Report.php';
require 'Models/Owner.php';
require 'vendor/autoload.php';

/**
 * controlador Peluqueria
 */

class ReportController
{
	private $model;
	private $owner;
	

	public function __construct()
	{
		$this->model = new Report;
		$this->owner = new Owner;
		
	}
    
	public function productsStockZero()
	{
		$datas=$this->model->productsStockZero();
		require 'Views/Report/productsStockZero.php';
	}
}

?>