<?php

require 'Models/Inventory.php';
require 'Models/Owner.php';
require 'vendor/autoload.php';

/**
 * controlador Inventory
 */

class InventoryController
{
	private $model;

	public function __construct()
	{
		$this->model = new Inventory;
		$this->owner = new Owner;
		
	}
	
	public function template()
	{
		require 'Views/Layout.php';
		require 'Views/Scripts.php';
        $groups = $this->model->getAllGroups();
        $articles = $this->model->listArticles();
		require 'Views/Inventory/list.php';
	}

    public function categories()
	{
		require 'Views/Layout.php';
		require 'Views/Scripts.php';
        $categories=$this->model->getAll();
		require 'Views/Inventory/ListCategories.php';
	}

    public function kardex()
	{
		require 'Views/Layout.php';
		require 'Views/Scripts.php';
        $products=$this->model->getAllArticle();
		require 'Views/Inventory/kardex.php';
	}

    public function providers()
	{
		require 'Views/Layout.php';
		require 'Views/Scripts.php';
        $providers=$this->model->getAllProviders();
		require 'Views/Inventory/ListProviders.php';
	}

    public function shopping()
	{
		require 'Views/Layout.php';
		require 'Views/Scripts.php';
        $providers=$this->model->getAllProviders();
        $products=$this->model->getAllArticle();
		require 'Views/Inventory/Shopping.php';
	}

    public function createProvider()
    {
        $this->model->createProvider($_REQUEST);
    }

    public function inactivateProvider()
    {
        $this->model->inactivateProvider($_REQUEST);
    }

    public function createCategorie()
    {
        $this->model->createCategorie($_REQUEST);
    }

    public function editCategorie()
    {
        $this->model->editCategorie($_REQUEST);
    }


    public function getDataCategorie()
    {
        $this->model->getDataCategorie($_REQUEST);
    }

    public function getDataArticle()
    {
        $this->model->getDataArticle($_REQUEST);
    }

    public function addToPartial()
    {
        $this->model->addToPartial($_REQUEST);
    }

    public function deleteRow()
	{
		$this->model->deleteRow($_REQUEST);
	}
    
    public function searchProductsxShopping()
    {
        $this->model->searchProductsxShopping();
    }

    public function searchProductsxShoppingById()
    {
        $this->model->searchProductsxShoppingById($_REQUEST);
    }

    public function quantityUpdate()
    {
        $this->model->quantityUpdate($_REQUEST);
    }

    public function inactivateCategorie()
    {
        $this->model->inactivateCategorie($_REQUEST);
    }

    public function inactivateArticle()
    {
        //Ordena un array por su indice
		ksort($_REQUEST);
		// //Eliminar indices de un array
		unset($_REQUEST['controller'], $_REQUEST['method'],$_REQUEST['PHPSESSID']);
        $_REQUEST += ['ESTADO_PRODUCTO' => 'Inactivo'];
        $this->model->inactivateArticle($_REQUEST);
    }

    public function createArticle()
    {
        //Ordena un array por su indice
		ksort($_REQUEST);
		// //Eliminar indices de un array
        $price=str_replace('.','',$_REQUEST['PRECIO']);
        $pricec=str_replace('.','',$_REQUEST['PRECIO_COMPRA']);
		unset($_REQUEST['controller'], $_REQUEST['method'],$_REQUEST['ID_CATEGORIA'],$_REQUEST['PHPSESSID'],$_REQUEST['PRECIO'],$_REQUEST['PRECIO_COMPRA']);
        $consecutive=$this->model->getConsecutive();
        $consecutive=$consecutive[0]->ID_PROD_INV + 1;
        $_REQUEST+=['ID_PROD_INV' => $consecutive,'ID_EMPRESA' => $_SESSION['user']->ID_EMPRESA,'ID_USUARIO' => $_SESSION['user']->identyUser,'ESTADO_PRODUCTO'=>'Activo','PRECIO'=>$price,'PRECIO_COMPRA'=>$pricec];
        $this->model->createArticle($_REQUEST);
    }

    public function editArticle()
    {
        //Ordena un array por su indice
		ksort($_REQUEST);
		// //Eliminar indices de un array
        $price=str_replace('.','',$_REQUEST['PRECIO']);
        $pricec=str_replace('.','',$_REQUEST['PRECIO_COMPRA']);
		unset($_REQUEST['controller'], $_REQUEST['method'],$_REQUEST['PHPSESSID'],$_REQUEST['PRECIO'],$_REQUEST['PRECIO_COMPRA']);
        $_REQUEST+=['PRECIO'=>$price,'PRECIO_COMPRA'=>$pricec];
        $this->model->editArticle($_REQUEST); 
    }

    public function manualAddInput()
    {
        $this->model->manualAddInput($_REQUEST);
    }
    
    public function manualAddOutput()
    {
        $this->model->manualAddOutput($_REQUEST);
    }

}

?>