<?php

require 'Models/Contability.php';
require 'Models/Owner.php';
require 'Models/Patient.php';
require 'vendor/autoload.php';
require 'Models/Inventory.php';


/**
 * controlador Contabilidad
 */

class ContabilityController
{
	private $model;
	private $owner;
    private $patient;
	private $inventory;

	public function __construct()
	{
		$this->model = new Contability;
        $this->owner = new Owner;
        $this->patient = new Patient;
		$this->inventory = new Inventory;
	}
   
	public function template()
	{
		require 'Views/Layout.php';
		require 'Views/Scripts.php';
		if (isset($_GET['id'])) {
			$check= $this->model->checkBox($_GET['id']);	
		}else{
			$date=date('Y-m-d');
			$check= $this->model->checkBox($date);	
		}
		$data= $this->model->getAllBox($check[0]->ID_CAJA);
		$date=$data[0]->FECHA_CAJA;
		$expenses =$this->model->getExpenses($date);
		$totale=0;
		$totall=0;
		$totali=0;
		$counte=0;
		$countl=0;
		$counti=0;
		foreach ($expenses as $expense) {
			$counte += 1;
			$totale += $expense->MONTO_MOVIMIENTO;
		}
		$loans = $this->model->getLoans($date);
		foreach ($loans as $loan) {
			$countl +=1 ;
			$totall += $loan->MONTO_MOVIMIENTO;
		}
		$incomes=$this->model->getIncomes($date);	
		foreach ($incomes as $income) {
			$counti +=1;
			$adder = ($income->DESCUENTO==0) ? $income->VALOR : $income->VALOR-($income->VALOR*($income->DESCUENTO/100));
			$totali += $adder;
		}
		$incomesP=$this->model->getPayments($date);	
		foreach ($incomesP as $incomep) {
			$counti +=1;
			$totali += $incomep->VALOR_PAGO;
		}
		$totalee=$totale+$totall;
		$saldo=$totali-$totalee;
		$final=$check[0]->VALOR_APERTURA+$saldo;
		$totalg=$totale+$totali+$totall+$check[0]->VALOR_APERTURA;
		$iniciog=number_format($check[0]->VALOR_APERTURA*100/$totalg,2,',','.');
		$incomesg=number_format($totali*100/$totalg,2,',','.');
		$expensesg=number_format($totale*100/$totalg,2,',','.');
		$loansg=number_format($totall*100/$totalg,2,',','.');
		

		require 'Views/Contability/cashFlow.php';
	}

    public function getDataxBill()
    {
        require 'Views/Layout.php';
		require 'Views/Scripts.php';
        $datas = $this->owner->getById($_GET['idp']);
        $patient = $this->patient->getById($_GET['id']);
        $procedures = $this->model->getDataxBill($_GET['id']);
		$products = $this->inventory->getAllArticle();
		require 'Views/Contability/checkout.php';
    }
	
	public function adminCredi()
    {
        require 'Views/Layout.php';
		require 'Views/Scripts.php';
		$credits = $this->model->getAllCredits();
		$creditstp = $this->model->getAllCreditstp();
		$abonos = $this->model->getAllAbonos();
		require 'Views/Contability/adminCredi.php';
    }

	public function historyBox()
    {
        require 'Views/Layout.php';
		require 'Views/Scripts.php';
        $boxes = $this->model->getAllBoxes();
		require 'Views/Contability/historyBox.php';
    }

	public function viewBill()
	{
		require 'Views/Layout.php';
		require 'Views/Scripts.php';
		$datas= $this->model->getDataByBill($_GET['id']);
		$procedures = $this->model->getDataxBillShow($_GET['idc'],$datas[0]->ID_MASCOTA);
		require 'Views/Contability/viewBill.php';
	}

	public function searchProductsxBill()
	{
		$this->model->searchProductsxBill($_REQUEST);
	}

	public function addPayment()
	{
		$this->model->addPayment($_REQUEST);
	}

	public function openBox()
	{
		$this->model->openBox($_GET['id']);
	}

	public function editInitialBox()
	{
		$this->model->editInitialBox($_REQUEST);
	}

	public function addExpense()
	{
		$this->model->addExpense($_REQUEST);
	}

	public function closeBox()
	{
		$date=date('Y-m-d H:s:i');
		$_REQUEST += ['FECHA_CIERRE'=>$date,'ESTADO_CAJA'=>'Cerrada'];
		$this->model->closeBox($_REQUEST);
	}

	public function addLoan()
	{
		$this->model->addLoan($_REQUEST);
	}

	public function searchProductsxBillShow()
	{
		$this->model->searchProductsxBillShow($_REQUEST);
	}

	public function addCar()
	{
		$this->model->addCar($_REQUEST);
	}

	public function deleteRow()
	{
		$this->model->deleteRow($_REQUEST);
	}

	public function deleteProductsxCar()
	{
		$this->model->deleteProductsxCar($_REQUEST);
		header("Location:?controller=patient&method=profilePatient&id={$_REQUEST['id']}");
	}

	public function closeSale()
	{	
		$ticket=$_REQUEST['TICKET'];
		unset($_REQUEST['TICKET']);

		if ($_REQUEST['FORMA_PAGO']==1) {
			$_REQUEST+=['CREDITO'=>1,'PLAZO'=>0,'PAGO'=>0,'ESTADO'=>'Pendiente'];
		}else{
			$_REQUEST+=['CREDITO'=>0,'PLAZO'=>0,'PAGO'=>1,'ESTADO'=>'Cerrado'];
		}
		$this->model->closeSale($_REQUEST);
		$this->inventory->addOutputs($_REQUEST);
	}

}

?>