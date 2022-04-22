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
            date_default_timezone_set('America/Bogota');
            $pass=sha1($data['pwd']);
            $sql="SELECT * FROM admin WHERE identyUser = '{$data['username']}' && passwordUser = '{$pass}'";
            $query = $this->pdo->select($sql);

            $fecha=date("Y-m-d h:i:sa");
            $ip=$_SERVER['REMOTE_ADDR'];

            $update1=$ip." \n".$fecha."; \n";
            $lastupd=$query[0]->SESION;
            $explode= explode(" ", $update1.$lastupd);
            $update="";
            if (count($explode)>6) {
                $update= implode(" ", array_slice($explode, 0, 6));
            }else{
                $update=$update1.$lastupd;
            }
            $sql="UPDATE admin SET SESION='$update' WHERE identyUser='{$data['username']}'";
            $sentencia=$this->pdo->prepare($sql)->execute();


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
            date_default_timezone_set('America/Bogota');
            $pass=sha1($data['pwd']);
            // $strSql = "SELECT * from dtm_administrador
            // WHERE usuario = '{$data['correo']}' AND password = '{$pass}'";
            $sql="SELECT * FROM admin WHERE identyUser = '{$data['username']}' && passwordUser = '{$pass}'";
            $query = $this->pdo->select($sql);

            $fecha=date("Y-m-d h:i:sa");
            $ip=$_SERVER['REMOTE_ADDR'];

            $update1=$ip." \n".$fecha."; \n";
            $lastupd=$query[0]->SESION;
            $explode= explode(" ", $update1.$lastupd);
            $update="";
            if (count($explode)>6) {
                $update= implode(" ", array_slice($explode, 0, 6));
            }else{
                $update=$update1.$lastupd;
            }
            $sql="UPDATE admin SET SESION='$update' WHERE identyUser='{$data['username']}'";
            $sentencia=$this->pdo->prepare($sql)->execute();
            
            if (isset($query[0]->identyUser)) {
                $_SESSION['user'] = $query[0];
                return true;
            }
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }
}