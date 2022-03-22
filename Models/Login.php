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
            $date=date('Y-m-d H:s:i');
            $user=$_SESSION['user']->identyUser;
            $action="Ha Iniciado Sesion";
            $ide=$_SESSION['user']->ID_EMPRESA;
            $sql="INSERT INTO `historial`(`FECHA_HISTORIAL`, `USUARIO_HISTORIAL`, `ACCION_HISTORIAL`,`ID_EMPRESA`) VALUES (:fecha,:user,:actioon,:ide)";
            $sentencia=$this->pdo->prepare($sql)->execute([
                ':fecha' => $date ,
                ':user' => $user,
                ':actioon' => $action,
                ':ide' => $ide
            ]);
            if (isset($query[0]->idUser)) {
               $_SESSION['user'] = $query[0];
                return true;
            } 
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function validateAdmin($data)
    {
        try {
            $pass=sha1($data['pwd']);
            // $strSql = "SELECT * from dtm_administrador
            // WHERE usuario = '{$data['correo']}' AND password = '{$pass}'";
            $sql="SELECT * FROM admin WHERE identyUser = '{$data['username']}' && passwordUser = '{$pass}'";
            $query = $this->pdo->select($sql);
            if (isset($query[0]->identyUser)) {
                $_SESSION['user'] = $query[0];
                return true;
            }
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }
}