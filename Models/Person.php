<?php 

class Person {
 
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
            $strSql = "SELECT * from bgl_user";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function newPerson($data)
    {
        try {
            $this->pdo->insert('bgl_user' , $data);
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }


    public function getAllFive()
    {
        try {
            $strSql = "SELECT * from bgl_user LIMIT 5";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getById($id){
        try { 
            $strSql = 'SELECT * FROM bgl_user WHERE id = :id';
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql,$array);
            return $query;
            
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function updatePerson($data){
        try { 
            $strWhere = 'id='.$data['id'];
            $this->pdo->update('bgl_user', $data, $strWhere); 
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }
    
}