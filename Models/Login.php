<?php

class Login
{
    private $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new Conexion;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function validateUserEmp($data)
    {
        try {
            $pass=sha1($data['pwd']);
            $sql="SELECT * FROM admin WHERE identyUser = '{$data['username']}' && passwordUser = '{$pass}'";
            $query = $this->pdo->select($sql);
            if (isset($query[0]->idUser)) {
               $_SESSION['user'] = $query[0];
                return true;
            } else {
                return 'Correo y Contraseña incorrectas';
            }
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function validateAdmin($data)
    {
        try {
            // $pass=sha1($data['password']);
            // $strSql = "SELECT * from dtm_administrador
            // WHERE usuario = '{$data['correo']}' AND password = '{$pass}'";
            $sql="SELECT * FROM admin WHERE identyUser = '{$data['username']}' && passwordUser = '{$data['pwdd']}'";
            $query = $this->pdo->select($sql);
            if (isset($query[0]->id)) {
                $_SESSION['user'] = $query[0];
                return true;
            } else {
                return 'Correo y Contraseña incorrectas';
            }
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }
}