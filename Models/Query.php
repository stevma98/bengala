<?php 

class Query {
 
    private $pdo ; 

    public function __construct()
    {
        try {
            $this->pdo = new Conexion;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }
    
    public function createQueryAppointment($data)
    {
        try {
		    unset($data['PHPSESSID']);
            $this->pdo->insert('consultas', $data);
            $date=date('Y-m-d H:s:i');
            $user=$_SESSION['user']->identyUser;
            $action="Ha programado una consulta consecutivo=".$data['CONSECUTIVO_CONSULTA'];
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

    public function createImmediatelyQuery($data)
    {
        try {
            $price=str_replace('.','',$data['PRECIO_CONSULTA']);
		    unset($data['PHPSESSID'],$data['PRECIO_CONSULTA']);
            $data+=['PRECIO_CONSULTA'=>$price];
         $this->pdo->insert('consultas', $data);
            $idmascota=$data['ID_MASCOTA'];            
            $idprop=$data['ID_PROP'];
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
            $strSql = "SELECT * FROM consultas WHERE ID_MASCOTA = :id AND ID_EMPRESA='{$_SESSION['user']->ID_EMPRESA}' order by ID_CONSULTA DESC limit 1";
            $array = ['id' => $idmascota];
            $query = $this->pdo->select($strSql,$array);
            $idva=$query[0]->ID_CONSULTA;
            $carrito = ['ID_MASCOTA' => $idmascota,'ID_PROP' => $idprop, 'ID_EMPRESA' => $ide,'FECHA_ANADIDO'=>$date,'ID_USUARIO'=>$user,'TIPO'=>'Consulta','ID_PRODUCTO'=>$idva,'ESTADO_CARRITO'=>'Pendiente','ID_CONSE_CARRITO'=>$consecutivo,'PRECIO'=>$price];
            $this->pdo->insert('carrito',$carrito);
            $action="Ha programado una consulta consecutivo=".$data['CONSECUTIVO_CONSULTA'];
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

    public function getAll()
    {
        try {
            $strSql = "SELECT * FROM `consultas` p inner join mascotas m on m.ID_MASCOTA=p.ID_MASCOTA WHERE p.ID_EMPRESA='{$_SESSION['user']->ID_EMPRESA}'";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }


    public function searchConsecutive()
    {
        try {
            $strSql = "SELECT * from consultas WHERE ID_EMPRESA='{$_SESSION['user']->ID_EMPRESA}'";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function searchQuerysById($id)
    {
        try {
            $strSql = "SELECT * from consultas WHERE ID_EMPRESA='{$_SESSION['user']->ID_EMPRESA}' AND ID_MASCOTA='$id'";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function editQuery1($data){
        try { 
            $id=$data['id'];
            $price=str_replace('.','',$data['PRECIO_CONSULTA']);
            //Ordena un array por su indice
			ksort($data);
			// //Eliminar indices de un array
			unset($data['controller'], $data['method'],$data['id'],$data['PHPSESSID'],$data['PRECIO_CONSULTA']);
            $data+=['PRECIO_CONSULTA'=>$price];
            var_dump($data);
            $strWhere = 'ID_EMPRESA='.$data['ID_EMPRESA']." AND CONSECUTIVO_CONSULTA=".$id;
            $query=$this->pdo->update('consultas', $data, $strWhere); 
            $strSql = "SELECT * FROM consultas WHERE CONSECUTIVO_CONSULTA = :id AND ID_EMPRESA='{$_SESSION['user']->ID_EMPRESA}'";
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql,$array);
            $idmascota=$query[0]->ID_MASCOTA;            
            $idprop=$query[0]->ID_PROP;
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
            $carrito = ['ID_MASCOTA' => $idmascota,'ID_PROP' => $idprop, 'ID_EMPRESA' => $ide,'FECHA_ANADIDO'=>$date,'ID_USUARIO'=>$user,'TIPO'=>'Consulta','ID_PRODUCTO'=>$id,'ESTADO_CARRITO'=>'Pendiente','ID_CONSE_CARRITO'=>$consecutivo,'PRECIO'=>$price];
            $this->pdo->insert('carrito',$carrito);
            $action="Ha atendido la consulta consecutivo=".$data['CONSECUTIVO_CONSULTA'];
            $sql="INSERT INTO `historial`(`FECHA_HISTORIAL`, `USUARIO_HISTORIAL`, `ACCION_HISTORIAL`,`ID_EMPRESA`) VALUES (:fecha,:user,:actioon,:ide)";
            $sentencia=$this->pdo->prepare($sql)->execute([
                ':fecha' => $date ,
                ':user' => $user,
                ':actioon' => $action,
                ':ide' => $ide
            ]);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }
    
}