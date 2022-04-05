<?php 

class Contability {
 
    private $pdo ; 

    public function __construct()
    {
        try {
            $this->pdo = new Conexion;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }
    
    public function getAll()
    {
        try {
            $strSql = "SELECT *,p.ID_MASCOTA as idm FROM `peluqueria` p inner join mascotas m on m.ID_MASCOTA=p.ID_MASCOTA WHERE p.ID_EMPRESA='{$_SESSION['user']->ID_EMPRESA}'";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getDataxBill($id)
    {
        try {
            $strSql = "SELECT * FROM carrito c LEFT JOIN inventario_vacunas v ON c.ID_PRODUCTO=v.ID_VACUNA WHERE c.ID_EMPRESA='{$_SESSION['user']->ID_EMPRESA}' AND ESTADO_CARRITO='Pendiente'";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }


}