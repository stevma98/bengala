<?php

require 'Models/Consent.php';
require 'vendor/autoload.php';

/**
 * controlador Consent
 */

class ConsentController
{
	private $model;

	public function __construct()
	{
		$this->model = new Consent;
		
	}
	
	public function template()
	{
		require 'Views/Layout.php';
		require 'Views/Scripts.php';
        $consents=$this->model->getAll();
		require 'Views/Consent/list.php';
	}

    public function models()
	{
		require 'Views/Layout.php';
		require 'Views/Scripts.php';
        $consents=$this->model->getAll();
		require 'Views/Consent/models.php';
	}

    public function createConsent()
    {
        $this->model->createConsent($_REQUEST);
    }

    public function getDataConsent()
    {
        $this->model->getDataConsent($_REQUEST);
    }
}

?>