<?php

require 'Models/Patient.php';
require 'Models/Owner.php';
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
	}
	
	public function uploadPhoto()
	{
		$last=$this->model->getLastId();
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

}

?>