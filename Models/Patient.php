<?php 

class Patient {
 
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
            $strSql = "SELECT * from mascotas";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function searchOwnerToCreate($id)
    {
        try { 
            $strSql = 'SELECT * FROM propietarios WHERE ID_PROP = :id';
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql,$array);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function createPatient($data)
    {
        try {
            $this->pdo->insert('mascotas' , $data);
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }


    public function getAllFive()
    {
        try {
            $strSql = "SELECT * from mascotas LIMIT 5";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getLastId()
    {
        try {
            $strSql = "SELECT ID_MASCOTA,NOMBRE from mascotas ORDER BY ID_MASCOTA DESC LIMIT 1";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getById($id){
        try { 
            $strSql = 'SELECT * FROM mascotas WHERE ID_MASCOTA = :id';
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql,$array);
            return $query;
            
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function updatePatient($data){
        try { 
            //Ordena un array por su indice
			ksort($data);
			//Eliminar indices de un array
			unset($data['controller'], $data['method']);
            $strWhere = 'ID_MASCOTA='.$data['ID_MASCOTA'];
            $this->pdo->update('mascotas', $data, $strWhere); 
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getByOwner($id)
    {
        try {
            $strSql = "SELECT * from mascotas WHERE ID_PROP = :id";
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql,$array);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getPatients($id)
    {
        try {
            $strSql = "SELECT * from mascotas WHERE ID_PROP = :id";
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql,$array);
            $query = json_encode($query);
            echo $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    
}