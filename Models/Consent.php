<?php 

class Consent {
 
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
            $strSql="SELECT * FROM inventario_consentimientos WHERE ID_EMPRESA='{$_SESSION['user']->identyUser}' AND ESTADO_CONSEN='Activo'";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function createConsent($data)
    {
        try {
            $date1=date('Y-m-d');
            $data += ['FECHA_CONSEN' => $date1];
            $data += ['ESTADO_CONSEN' => 'Activo'];
            $this->pdo->insert('inventario_consentimientos',$data);
            $date=date('Y-m-d H:s:i');
            $user=$_SESSION['user']->identyUser;
            $action="Ha creado un consentimiento";
            $ide=$_SESSION['user']->ID_EMPRESA;
            $sql="INSERT INTO `historial`(`FECHA_HISTORIAL`, `USUARIO_HISTORIAL`, `ACCION_HISTORIAL`,`ID_EMPRESA`) VALUES (:fecha,:user,:actioon,:ide)";
            $sentencia=$this->pdo->prepare($sql)->execute([
                ':fecha' => $date ,
                ':user' => $user,
                ':actioon' => $action,
                ':ide' => $ide
            ]);
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getDataConsent($data)
    {
        try {
            $strSql="SELECT * FROM inventario_consentimientos WHERE ID_EMPRESA='{$_SESSION['user']->identyUser}' AND ID_CONSEN='{$data['ID_CONSEN']}'";
            $query = $this->pdo->select($strSql);
            $query= json_encode($query);
            echo $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

}