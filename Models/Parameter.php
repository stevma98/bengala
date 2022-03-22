<?php 

class parameter {
 
    private $pdo ; 

    public function __construct()
    {
        try {
            $this->pdo = new Conexion;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }
    
    public function getAll($id)
    {
        try {
            $strSql="SELECT * FROM municipios WHERE codigodepartamento_fk = '$id'";
            $query = $this->pdo->select($strSql);
            $query= json_encode($query);
            echo $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

}