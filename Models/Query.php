<?php 

class Query {
 
    private $pdo ; 

    public function __construct()
    {
        try {
            $this->pdo = new Conexion;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }
    
    public function createQueryAppointment($data)
    {
        try {
            $this->pdo->insert('consultas', $data);
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAll()
    {
        try {
            $strSql = "SELECT * FROM `peluqueria` p inner join mascotas m on m.ID_MASCOTA=p.ID_MASCOTA INNER JOIN inventario_vacunas iv on iv.ID_VACUNA=p.ID_VACUNA";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function searchConsecutive()
    {
        try {
            $strSql = "SELECT * from consultas WHERE ID_EMPRESA='{$_SESSION['user']->ID_EMPRESA}'";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }
}