<?php 

class Barber {
 
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
            $strSql = "SELECT * FROM `peluqueria` p inner join mascotas m on m.ID_MASCOTA=p.ID_MASCOTA INNER JOIN inventario_vacunas iv on iv.ID_VACUNA=p.ID_VACUNA";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAllInventory()
    {
        try {
            $strSql = "SELECT * from peluqueria";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function createBarber($data)
    {
        try {
            $this->pdo->insert('peluqueria', $data);
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function createBarberAppointment($data)
    {
        try {
            $this->pdo->insert('peluqueria', $data);
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAllFive()
    {
        try {
            $strSql = "SELECT * from peluqueria LIMIT 5";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getByIdInventory($id){
        try { 
            $strSql = 'SELECT * FROM peluqueria WHERE ID_VACUNA = :id';
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
            $strSql = 'SELECT * FROM peluqueria WHERE ID_VACUNA = :id';
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql,$array);
            echo $query[0]->PRESENTACION;            
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function updateBarber($data){
        try { 
            //Ordena un array por su indice
			ksort($data);
			//Eliminar indices de un array
			unset($data['controller'], $data['method']);
            $strWhere = 'ID_VACUNA='.$data['ID_VACUNA'];
            $this->pdo->update('peluqueria', $data, $strWhere); 
            $data = json_encode($data);
            echo $data;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }
    
}