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
            $strSql = "SELECT * FROM `vacunas` v inner join mascotas m on m.ID_MASCOTA=v.ID_MASCOTA INNER JOIN inventario_vacunas iv on iv.ID_VACUNA=v.ID_VACUNA WHERE v.ID_EMPRESA='{$_SESSION['user']->ID_EMPRESA}'";
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
		unset($data['PHPSESSID']);
            $date=date('Y-m-d H:s:i');
            $ide=$_SESSION['user']->ID_EMPRESA;
            $data+=['ID_EMPRESA'=>$ide];
            $user=$_SESSION['user']->identyUser;
            $action="Ha creado una vacuna de id=".$data['ID_VACUNA'];
            $this->pdo->insert('inventario_vacunas', $data);
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

    public function createVaccineAppoinment($data)
    {
        try {
            $price=str_replace(".","",$data['PRECIO_VACUNA']); 
		    unset($data['PHPSESSID'],$data['PRECIO_VACUNA']);
            $ide=$_SESSION['user']->ID_EMPRESA;            
            $data+=['ID_EMPRESA'=>$ide,'PRECIO_VACUNA'=>$price];
            $query=$this->pdo->insert('vacunas', $data);
            if ($query=='') {
                $date=date('Y-m-d H:s:i');
                $user=$_SESSION['user']->identyUser;
                $action="Ha programado una vacuna para mascota id=".$data['ID_MASCOTA'];
                $sql="INSERT INTO `historial`(`FECHA_HISTORIAL`, `USUARIO_HISTORIAL`, `ACCION_HISTORIAL`,`ID_EMPRESA`) VALUES (:fecha,:user,:actioon,:ide)";
                $sentencia=$this->pdo->prepare($sql)->execute([
                    ':fecha' => $date ,
                    ':user' => $user,
                    ':actioon' => $action,
                    ':ide' => $ide
                ]);    
                echo "true";
            } else {
                echo "false";
            }
            
            
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAllFive()
    {
        try {
            $strSql = "SELECT * from vacunas WHERE ID_EMPRESA='{$_SESSION['user']->ID_EMPRESA}' LIMIT 5 ";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getByIdInventory($id){
        try { 
            $strSql = "SELECT * FROM inventario_vacunas WHERE ID_VACUNA = :id AND ID_EMPRESA='{$_SESSION['user']->ID_EMPRESA}'";
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
            $strSql = "SELECT * FROM inventario_vacunas WHERE ID_VACUNA = :id AND ID_EMPRESA='{$_SESSION['user']->ID_EMPRESA}'";
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
			unset($data['controller'], $data['method'],$data['PHPSESSID']);
            $strWhere = 'ID_VACUNA='.$data['ID_VACUNA'];
            $this->pdo->update('inventario_vacunas', $data, $strWhere); 
            $date=date('Y-m-d H:s:i');
            $user=$_SESSION['user']->identyUser;
            $action="Ha actualizado una vacuna id=".$data['ID_VACUNA'];
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

    public function checkVaccine($data)
    {
        try {
            $dato=$data['ESTADO_VACUNA'];
            $id=$data['ID_VACUNA_PRO'];
            unset($data['ID_EMPRESA'],$data['PHPSESSID']);
            $strWhere = 'ID_VACUNA_PRO='.$data['ID_VACUNA_PRO'].' AND ID_EMPRESA='.$_SESSION['user']->ID_EMPRESA;
            $query=$this->pdo->update('vacunas', $data , $strWhere);
            if ($query=='') {
                $strSql = "SELECT * FROM vacunas WHERE ID_VACUNA_PRO = :id AND ID_EMPRESA='{$_SESSION['user']->ID_EMPRESA}'";
                $array = ['id' => $id];
                $query = $this->pdo->select($strSql,$array);
                $idmascota=$query[0]->ID_MASCOTA;            
                $idprop=$query[0]->ID_PROP;
                $idva=$query[0]->ID_VACUNA;
                $price=str_replace('.','',$query[0]->PRECIO_VACUNA);
                $strSql = "SELECT * FROM carrito WHERE ID_MASCOTA = :id AND ID_EMPRESA='{$_SESSION['user']->ID_EMPRESA}' order by ID_CARRITO DESC limit 1";
                $array = ['id' => $idmascota];
                $query = $this->pdo->select($strSql,$array);
                if ($query[0]->ESTADO_CARRITO == 'Pendiente') {
                    $consecutivo=$query[0]->ID_CONSE_CARRITO;
                } else {
                    $consecutivo=$query[0]->ID_CONSE_CARRITO+1;
                }
                $date=date('Y-m-d H:s:i');
                $user=$_SESSION['user']->identyUser;
                $ide=$_SESSION['user']->ID_EMPRESA;
                $carrito = ['ID_MASCOTA' => $idmascota,'ID_PROP' => $idprop, 'ID_EMPRESA' => $ide,'FECHA_ANADIDO'=>$date,'ID_USUARIO'=>$user,'TIPO'=>'Vacuna','ID_PRODUCTO'=>$idva,'ESTADO_CARRITO'=>'Pendiente','ID_CONSE_CARRITO'=>$consecutivo,'PRECIO'=>$price,'CANTIDAD'=>1];
                $this->pdo->insert('carrito',$carrito);
                $action="Ha realizado una vacuna id=".$data['ID_VACUNA'];
                
                $sql="INSERT INTO `historial`(`FECHA_HISTORIAL`, `USUARIO_HISTORIAL`, `ACCION_HISTORIAL`,`ID_EMPRESA`) VALUES (:fecha,:user,:actioon,:ide)";
                $sentencia=$this->pdo->prepare($sql)->execute([
                    ':fecha' => $date ,
                    ':user' => $user,
                    ':actioon' => $action,
                    ':ide' => $ide
                ]);
                echo "true";
            } else {
                echo "false";
            }
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function cancelVaccine($data)
    {
        try {
            $dato=$data['ESTADO_VACUNA'];
            unset($data['ID_EMPRESA'],$data['PHPSESSID']);
            $strWhere = 'ID_VACUNA_PRO='.$data['ID_VACUNA_PRO'].' AND ID_EMPRESA='.$_SESSION['user']->ID_EMPRESA;
            $query=$this->pdo->update('vacunas', $data , $strWhere); 
            if ($query=='') {
                $date=date('Y-m-d H:s:i');
                $user=$_SESSION['user']->identyUser;
                $action="Ha cancelado una vacuna id=".$data['ID_VACUNA'];
                $ide=$_SESSION['user']->ID_EMPRESA;
                $sql="INSERT INTO `historial`(`FECHA_HISTORIAL`, `USUARIO_HISTORIAL`, `ACCION_HISTORIAL`,`ID_EMPRESA`) VALUES (:fecha,:user,:actioon,:ide)";
                $sentencia=$this->pdo->prepare($sql)->execute([
                    ':fecha' => $date ,
                    ':user' => $user,
                    ':actioon' => $action,
                    ':ide' => $ide
                ]);
                echo "true";
            } else {
                echo "false";
            }
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