<?php 

class Report {
 
    private $pdo ; 

    public function __construct()
    {
        try {
            $this->pdo = new Conexion;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function productsStockZero()
    {
        try {
            $strSql="SELECT * FROM productos WHERE ID_EMPRESA='{$_SESSION['user']->ID_EMPRESA}' AND STOCK=0";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }
    
}