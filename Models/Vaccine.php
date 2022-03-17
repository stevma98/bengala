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
            $strSql = "SELECT * FROM `vacunas` v inner join mascotas m on m.ID_MASCOTA=v.ID_MASCOTA INNER JOIN inventario_vacunas iv on iv.ID_VACUNA=v.ID_VACUNA";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAllInventory()
    {
        try {
            $strSql = "SELECT * from inventario_vacunas WHERE ID_EMPRESA = '{$_SESSION['user']->ID_EMPRESA}'";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function createVaccine($data)
    {
        try {
            $this->pdo->insert('inventario_vacunas', $data);
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function createVaccineAppoinment($data)
    {
        try {
            $this->pdo->insert('vacunas', $data);
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

    public function getByIdInventory($id){
        try { 
            $strSql = 'SELECT * FROM inventario_vacunas WHERE ID_VACUNA = :id';
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql,$array);
            $query = json_encode($query);
            echo $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getPresentationById($id)
    {
        try { 
            $strSql = 'SELECT * FROM inventario_vacunas WHERE ID_VACUNA = :id';
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql,$array);
            echo $query[0]->PRESENTACION;            
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function updateVaccine($data){
        try { 
            //Ordena un array por su indice
			ksort($data);
			//Eliminar indices de un array
			unset($data['controller'], $data['method']);
            $strWhere = 'ID_VACUNA='.$data['ID_VACUNA'];
            $this->pdo->update('inventario_vacunas', $data, $strWhere); 
            $data = json_encode($data);
            echo $data;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function checkVaccine($data)
    {
        try {
            $dato=$data['ESTADO_VACUNA'];
            $strWhere = 'ID_VACUNA_PRO='.$data['ID_VACUNA_PRO'].' AND ID_EMPRESA='.$data['ID_EMPRESA'];
            $query=$this->pdo->update('vacunas', $data , $strWhere); 
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function cancelVaccine($data)
    {
        try {
            $dato=$data['ESTADO_VACUNA'];
            $strWhere = 'ID_VACUNA_PRO='.$data['ID_VACUNA_PRO'].' AND ID_EMPRESA='.$data['ID_EMPRESA'];
            $query=$this->pdo->update('vacunas', $data , $strWhere); 
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getVaccinesByPatient($id)
    {
        try { 
            $strSql = "SELECT * FROM vacunas v INNER JOIN inventario_vacunas iv on v.ID_VACUNA=iv.ID_VACUNA WHERE v.ID_MASCOTA='$id' AND v.ID_EMPRESA='{$_SESSION['user']->ID_EMPRESA}'";
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql,$array);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }
    
}