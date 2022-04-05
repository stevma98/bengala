<?php 

class Barber {
 
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
            $strSql = "SELECT *,p.ID_MASCOTA as idm FROM `peluqueria` p inner join mascotas m on m.ID_MASCOTA=p.ID_MASCOTA WHERE p.ID_EMPRESA='{$_SESSION['user']->ID_EMPRESA}'";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAllInventory()
    {
        try {
            $strSql = "SELECT * from peluqueria WHERE ID_EMPRESA='{$_SESSION['user']->ID_EMPRESA}'";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function createBarberAppointment($data)
    {
        try {
            $ide=$_SESSION['user']->ID_EMPRESA;
            $data+=['ID_EMPRESA'=>$ide];
		unset($data['PHPSESSID']);
            $this->pdo->insert('peluqueria', $data);
            $date=date('Y-m-d H:s:i');
            $user=$_SESSION['user']->identyUser;
            $action="Ha creado una peluqueria para mascota id=".$data['ID_MASCOTA'];
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

    public function checkBarber($data)
    {
        try {
            $dato=$data['ESTADO_PELUQUERIA'];
            $id=$data['ID_PELUQUERIA'];
            $strWhere = 'ID_PELUQUERIA='.$data['ID_PELUQUERIA'].' AND ID_EMPRESA='.$data['ID_EMPRESA'];
		    unset($data['PHPSESSID']);
            $query=$this->pdo->update('peluqueria', $data , $strWhere); 
            $strSql = "SELECT * FROM peluqueria WHERE ID_PELUQUERIA = :id AND ID_EMPRESA='{$_SESSION['user']->ID_EMPRESA}'";
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
            $carrito = ['ID_MASCOTA' => $idmascota,'ID_PROP' => $idprop, 'ID_EMPRESA' => $ide,'FECHA_ANADIDO'=>$date,'ID_USUARIO'=>$user,'TIPO'=>'Peluqueria','ID_PRODUCTO'=>$id,'ESTADO_CARRITO'=>'Pendiente','ID_CONSE_CARRITO'=>$consecutivo];
            $this->pdo->insert('carrito',$carrito);
            $action="Ha realizado la peluqueria de id=".$data['ID_PELUQUERIA'];            
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

    public function cancelBarber($data)
    {
        try {
            $dato=$data['ESTADO_PELUQUERIA'];
            $strWhere = 'ID_PELUQUERIA='.$data['ID_PELUQUERIA'].' AND ID_EMPRESA='.$data['ID_EMPRESA'];
		unset($data['PHPSESSID']);
            $query=$this->pdo->update('peluqueria', $data , $strWhere); 
            $date=date('Y-m-d H:s:i');
            $user=$_SESSION['user']->identyUser;
            $action="Ha Cancelado una peluqueria de id=".$data['ID_PELUQUERIA'];
            $ide=$_SESSION['user']->ID_EMPRESA;
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
    public function getAllFive()
    {
        try {
            $strSql = "SELECT * from peluqueria LIMIT 5";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getByIdInventory($id){
        try { 
            $strSql = 'SELECT * FROM peluqueria WHERE ID_VACUNA = :id';
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql,$array);
            $query = json_encode($query);
            echo $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getBarberByPatient($id)
    {
        try { 
            $strSql = "SELECT * FROM peluqueria WHERE ID_MASCOTA = :id AND ID_EMPRESA='{$_SESSION['user']->ID_EMPRESA}'";
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql,$array);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

}