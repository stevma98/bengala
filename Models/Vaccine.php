<?php 

class Vaccine {
 
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
            $strSql = "SELECT * from vacunas";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function createOwner($data)
    {
        try {
            $this->pdo->insert('vacunas' , $data);
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAllFive()
    {
        try {
            $strSql = "SELECT * from vacunas LIMIT 5";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getById($id){
        try { 
            $strSql = 'SELECT *,m.nombre city,d.nombre depart FROM vacunas p INNER JOIN departamentos d ON p.DEPARTAMENTO=d.id INNER JOIN municipios m ON p.CIUDAD=m.id WHERE ID_PROP = :id';
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql,$array);
            return $query;
            
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }
    public function updateOwner($data){
        try { 
            //Ordena un array por su indice
			ksort($data);
			//Eliminar indices de un array
			unset($data['controller'], $data['method']);
            $strWhere = 'ID_PROP='.$data['ID_PROP'];
            $this->pdo->update('vacunas', $data, $strWhere); 
            $data = json_encode($data);
            echo $data;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }
    
}