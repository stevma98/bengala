<?php

require 'Models/Patient.php';
require 'Models/Owner.php';
require 'Models/Vaccine.php';
require 'Models/Barber.php';
require 'Models/Query.php';
require 'Models/Consent.php';
require 'vendor/autoload.php';

/**
 * controlador Pacientes
 */

class PatientController
{
	private $model;
	

	public function __construct()
	{
		$this->model = new Patient;
        $this->owner = new Owner;
		$this->vaccine = new Vaccine;
		$this->barber = new Barber;
		$this->query = new Query;
		$this->consent = new Consent;
	}
	
	public function uploadPhoto()
	{
		$last=$this->model->getLastId();
		$lastId=$last[0]->ID_MASCOTA;
		$name=$last[0]->NOMBRE;
		if ($_FILES['file']['type']=='image/jpeg' || $_FILES['file']['type']=='image/png' || $_FILES['file']['type']=='image/jpg') {
			$root='./Pets/'.$lastId."/";
			if(!file_exists($root)){
				mkdir($root,0777,true);
			}
			$rootc=$root.$name.".jpg";
			if (copy($_FILES['file']['tmp_name'],$rootc)) {
				echo "true";
			}else{
				$this->model->deleteCreated($lastId);
				echo "false";
			}
		}else{
			$this->model->deleteCreated($lastId);
			echo "false";
		}
	}

	public function uploadPhotoEdited()
	{
		$id=$_GET['id'];
		$last=$this->model->getById($id);
		$lastId=$last[0]->ID_MASCOTA;
		$name=$last[0]->NOMBRE;
		if ($_FILES['file']['type']=='image/jpeg' || $_FILES['file']['type']=='image/png') {
			$root='./Pets/'.$lastId."/";
			if(!file_exists($root)){
				mkdir($root,0777,true);
			}
			$rootc=$root.$name.".jpg";
			if (copy($_FILES['file']['tmp_name'],$rootc)or die("noah")) {
				echo $name;
			}
		}
	}

	public function uploadArchive()
	{
		$ide=$_GET['ide'];
		$idm=$_GET['idm'];
		if ($_FILES['file']['type']=='application/pdf') {
			$root='./Pets/'.$idm."/";
			$date=date('Y-m-d');
			$rootc=$root.$date."@".$_FILES['file']['name'];
			copy($_FILES['file']['tmp_name'],$rootc);
		}
	}

    public function newPatient()
	{
		$data=$this->model->searchOwnerToCreate($_REQUEST['DUENO']);
		$replace=array('DUENO' => $data[0]->ST_NOM." ".$data[0]->ND_NOM." ".$data[0]->ST_APE." ".$data[0]->ND_APE);
		$va=array_replace($_REQUEST,$replace);
		$va += ['TEL_DUENO' => $data[0]->TELEFONO];
		$va += ['ID_PROP' => $data[0]->ID_PROP];
		$va += ['FEC_REG' => date('Y-m-d')];
	    $this->model->createPatient($va);
	}
	
	public function editPatient()
	{
	    $this->model->updatePatient($_REQUEST);
	}
	
	public function getPatient()
	{
		$this->model->getPatients($_GET['id']);
	}

	public function profilePatient()
	{
		require 'Views/Layout.php';
		require 'Views/Scripts.php';
		$data=$this->model->getById($_GET['id']);
		$owners=$this->owner->getAll();
		$ownerss=$this->owner->getAllById($_GET['id']);
		$ownersc=count($ownerss);
		$vaccinesI=$this->vaccine->getAllInventory();
		$vaccinesH=$this->vaccine->getVaccinesByPatient($_GET['id']);
		$barbery=$this->barber->getBarberByPatient($_GET['id']);
		$products=$this->model->getProducts();
		$queries=$this->query->searchQuerysById($_GET['id']);
		$notes=$this->model->getNotesById($_GET['id']);
		$consents1=$this->consent->getAll();
		$consents=$this->consent->getAllById($_GET['id']);
		$payments=$this->model->getPayments($_GET['id']);
		$paymentsc=count($payments);
		$birthday= new DateTime($data[0]->FEC_NAC);
		$today=new DateTime();
		$age = $today->diff($birthday);
		require 'Views/Patient/profilePatient.php';
	}

	public function template()
	{
		require 'Views/Layout.php';
		require 'Views/Scripts.php';
        $patients=$this->model->getAll();
        $owners=$this->owner->getAll();
		require 'Views/Patient/list.php';
	}

	public function saveNote()
	{
		$this->model->saveNote($_REQUEST);
	}

	public function deleteNote()
	{	
		$this->model->deleteNote($_GET['id']);
		header("Location:?controller=patient&method=profilePatient&id=".$_GET['idm']);
	}

}

?>