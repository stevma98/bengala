<?php 

class Owner {
 
    private $pdo ;
    private $ide; 

    public function __construct()
    {
        try {
            $this->pdo = new Conexion;
            $this->ide = $_SESSION['user']->ID_EMPRESA;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }
    
    public function getAll()
    {
        try {
            $strSql = "SELECT * from propietarios WHERE ID_EMPRESA = '$this->ide'";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAllById($id)
    {
        try {
            $strSql = "SELECT * from prop_masc pm INNER JOIN propietarios p on pm.ID_PROP=p.ID_PROP WHERE pm.ID_MASCOTA='$id' AND pm.ID_EMPRESA = '$this->ide'";
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
            $strSql = "SELECT * FROM ventas v INNER JOIN propietarios p ON v.ID_PROP=p.ID_PROP WHERE v.ID_EMPRESA='$this->ide' AND CREDITO = 1 AND ESTADO='Pendiente' AND v.ID_PROP='$id'";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function createOwner($data)
    {
        try {
            $strSql = "SELECT * FROM propietarios WHERE ID_PROP='{$data['ID_PROP']}' and ID_EMPRESA='$this->ide'";
            $query = $this->pdo->select($strSql);
            if(!count($query)){
                $stn=ucfirst(strtolower($data['ST_NOM']));
                $ndn=ucfirst(strtolower($data['ND_NOM']));
                $sta=ucfirst(strtolower($data['ST_APE']));
                $nda=ucfirst(strtolower($data['ND_APE']));
                $email=strtolower($data['EMAIL']);
                unset($data['controller'], $data['method'],$data['PHPSESSID'],$data['ST_NOM'],$data['ND_NOM'],$data['ST_APE'],$data['ND_APE'],$data['EMAIL']);
                $data += ['ST_NOM'=>$stn,'ND_NOM'=>$ndn,'ST_APE'=>$sta,'ND_APE'=>$nda,'EMAIL'=>$email];
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
                echo "true";
            }else{
                echo "false";
            }
            
            
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
            $query = $this->pdo->update('propietarios', $data, $strWhere);
            if ($query==NULL) {
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
                echo "true" ;
            }else{
                echo "false";
            }
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }
    
}