<?php 

class Owner {
 
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
            $strSql = "SELECT * from propietarios WHERE ID_EMPRESA = '{$_SESSION['user']->ID_EMPRESA}'";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAllById($id)
    {
        try {
            $strSql = "SELECT * from prop_masc pm INNER JOIN propietarios p on pm.ID_PROP=p.ID_PROP WHERE pm.ID_MASCOTA='$id' AND pm.ID_EMPRESA = '{$_SESSION['user']->ID_EMPRESA}'";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getList()
    {
        try {
            $strSql = "SELECT * from propietarios";
            $query = $this->pdo->select($strSql);
            $query = json_encode($query);
            echo $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getCreditById($id)
    {
        try {
            $strSql = "SELECT * FROM ventas v INNER JOIN propietarios p ON v.ID_PROP=p.ID_PROP WHERE v.ID_EMPRESA='{$_SESSION['user']->ID_EMPRESA}' AND CREDITO = 1 AND ESTADO='Pendiente' AND v.ID_PROP='$id'";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function createOwner($data)
    {
        try {
            $stn=ucfirst(strtolower($data['ST_NOM']));
            $ndn=ucfirst(strtolower($data['ND_NOM']));
            $sta=ucfirst(strtolower($data['ST_APE']));
            $nda=ucfirst(strtolower($data['ND_APE']));
            $email=strtolower($data['EMAIL']);
            unset($data['controller'], $data['method'],$data['PHPSESSID'],$data['ST_NOM'],$data['ND_NOM'],$data['ST_APE'],$data['ND_APE'],$data['EMAIL']);
            $data += ['ST_NOM'=>$stn,'ND_NOM'=>$ndn,'ST_APE'=>$sta,'ND_APE'=>$stn,'EMAIL'=>$email];
            $this->pdo->insert('propietarios' , $data);
            $date=date('Y-m-d H:s:i');
            $user=$_SESSION['user']->identyUser;
            $action="Ha insertado el propietario con id=".$data['ID_PROP'];
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

    public function getAllFive()
    {
        try {
            $strSql = "SELECT * from propietarios LIMIT 5";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getById($id){
        try { 
            $strSql = 'SELECT *,m.nombre city,d.nombre depart FROM propietarios p INNER JOIN departamentos d ON p.DEPARTAMENTO=d.id INNER JOIN municipios m ON p.CIUDAD=m.id WHERE ID_PROP = :id';
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
			unset($data['controller'], $data['method'],$data['PHPSESSID']);
            $idEmp=$_SESSION['user']->ID_EMPRESA;
            $strWhere = 'ID_PROP='.$data['ID_PROP'].' AND ID_EMPRESA='.$idEmp.'' ;
            $this->pdo->update('propietarios', $data, $strWhere); 
            $date=date('Y-m-d H:s:i');
            $user=$_SESSION['user']->identyUser;
            $action="Ha actualizado al propietario con id=".$data['ID_PROP'];
            $ide=$_SESSION['user']->ID_EMPRESA;
            $sql="INSERT INTO `historial`(`FECHA_HISTORIAL`, `USUARIO_HISTORIAL`, `ACCION_HISTORIAL`,`ID_EMPRESA`) VALUES (:fecha,:user,:actioon,:ide)";
            $sentencia=$this->pdo->prepare($sql)->execute([
                ':fecha' => $date ,
                ':user' => $user,
                ':actioon' => $action,
                ':ide' => $ide
            ]);
            $data = json_encode($data);
            echo $data;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }
    
}