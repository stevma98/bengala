<?php

require 'Models/Consent.php';
require 'Models/Owner.php';
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
		$this->owner = new Owner;
		
	}
	
	public function template()
	{
		require 'Views/Layout.php';
		require 'Views/Scripts.php';
		$owners=$this->owner->getAll();
        $consents=$this->model->getAll();
		$consentsm=$this->model->getAllC();
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

	public function getDataConsentText()
    {
        $this->model->getDataConsentText($_REQUEST);
    }

	public function inactiveConsent()
	{
		$this->model->inactiveConsent($_REQUEST);
	}

	public function inactiveConsentById()
	{
		$this->model->inactiveConsentById($_REQUEST);
	}

	public function createConsentIndirect()
	{
		$this->model->createConsentIndirect($_REQUEST);
	}

	public function getDataConsentText1()
    {
        $this->model->getAllT($_REQUEST);
    }

	public function editConsent()
	{
		$this->model->editConsent($_REQUEST);
	}

	public function editConsent1()
	{
		$this->model->editConsent1($_REQUEST);
	}
}

?>