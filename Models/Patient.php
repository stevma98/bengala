<?php 

class Patient {
 
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
            $strSql = "SELECT * from mascotas WHERE ID_EMPRESA = '{$_SESSION['user']->ID_EMPRESA}'";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function searchOwnerToCreate($id)
    {
        try { 
            $strSql = "SELECT * FROM propietarios WHERE ID_PROP = :id AND ID_EMPRESA='{$_SESSION['user']->ID_EMPRESA}'";
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql,$array);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function createPatient($data)
    {
        try {
            $nom=ucfirst(strtolower($data['NOMBRE']));
            $ra=ucfirst(strtolower($data['RAZA']));
            $col=ucfirst(strtolower($data['COLOR']));
		    unset($data['PHPSESSID'],$data['NOMBRE'],$data['RAZA'],$data['COLOR']);            
            $data += ['NOMBRE'=>$nom,'RAZA'=>$ra,'COLOR'=>$col];
            $query=$this->pdo->insert('mascotas' , $data);
            if ($query=='') {
                $strSql = "SELECT * FROM mascotas WHERE ID_PROP = :id AND ID_EMPRESA='{$_SESSION['user']->ID_EMPRESA}' order by ID_MASCOTA DESC LIMIT 1";
                $array = ['id' => $data['ID_PROP']];
                $query = $this->pdo->select($strSql,$array);
                $idm=$query[0]->ID_MASCOTA;
                $idp=$query[0]->ID_PROP;
                $date=date('Y-m-d H:s:i');
                $user=$_SESSION['user']->identyUser;
                $action="Ha Creado la mascota con id=".$data['ID_MASCOTA'];
                $ide=$_SESSION['user']->ID_EMPRESA;
                $sql="INSERT INTO `historial`(`FECHA_HISTORIAL`, `USUARIO_HISTORIAL`, `ACCION_HISTORIAL`,`ID_EMPRESA`) VALUES (:fecha,:user,:actioon,:ide)";
                $sentencia=$this->pdo->prepare($sql)->execute([
                    ':fecha' => $date ,
                    ':user' => $user,
                    ':actioon' => $action,
                    ':ide' => $ide
                ]);
                $sql2="INSERT INTO `prop_masc`(`ID_PROP_MASC`, `ID_MASCOTA`, `ID_PROP`, `TIPO_PROP`, `ESTADO_PROP_MASC`,`ID_EMPRESA`) VALUES ('',:idm,:idp,'1','Activo',:ide)";
                $sentencia=$this->pdo->prepare($sql2)->execute([
                    ':idm' => $idm ,
                    ':idp' => $idp,
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
            $strSql = "SELECT * from mascotas LIMIT 5";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getLastId()
    {
        try {
            $strSql = "SELECT ID_MASCOTA,NOMBRE from mascotas ORDER BY ID_MASCOTA DESC LIMIT 1";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getById($id){
        try { 
            $strSql = "SELECT * FROM mascotas WHERE ID_MASCOTA = :id AND ID_EMPRESA = '{$_SESSION['user']->ID_EMPRESA }'";
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql,$array);
            return $query;
            
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function updatePatient($data){
        try { 
            //Ordena un array por su indice
			ksort($data);
			//Eliminar indices de un array
			unset($data['controller'], $data['method'],$data['PHPSESSID']);
            $strWhere = 'ID_MASCOTA='.$data['ID_MASCOTA'];
            $query=$this->pdo->update('mascotas', $data, $strWhere);
            if ($query=='') {
                $date=date('Y-m-d H:s:i');
                $user=$_SESSION['user']->identyUser;
                $action="Ha actualizado la mascota con id=".$data['ID_MASCOTA'];
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

    public function getByOwner($id)
    {
        try {
            $strSql = "SELECT * from mascotas WHERE ID_PROP = :id AND ID_EMPRESA = '{$_SESSION['user']->ID_EMPRESA }'";
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql,$array);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getPayments($id)
    {
        try {
            $strSql = "SELECT * from carrito WHERE ID_MASCOTA = :id AND ID_EMPRESA = '{$_SESSION['user']->ID_EMPRESA }' AND ESTADO_CARRITO='Pendiente'";
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql,$array);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getPatients($id)
    {
        try {
            $strSql = "SELECT * from mascotas WHERE ID_PROP = :id AND ID_EMPRESA = '{$_SESSION['user']->ID_EMPRESA }'";
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql,$array);
            $query = json_encode($query);
            echo $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getProducts()
    {
        try {
            $strSql = "SELECT * from productos WHERE ID_EMPRESA = '{$_SESSION['user']->ID_EMPRESA }'";
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql,$array);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function saveNote()
    {
        try {
            //Ordena un array por su indice
			ksort($_REQUEST);
			//Eliminar indices de un array
			unset($_REQUEST['controller'], $_REQUEST['method'],$_REQUEST['PHPSESSID']);
            $_REQUEST += ['ID_USUARIO'=> $_SESSION['user']->identyUser];
            $query = $this->pdo->insert('notas' , $_REQUEST);
            if ($query=='') {
                $date=date('Y-m-d H:s:i');
                $user=$_SESSION['user']->identyUser;
                $action="Ha insertado una nota a mascota id=".$_REQUEST['ID_MASCOTA'];
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

    public function getNotesById($id)
    {
        try {
            $strSql = "SELECT * from notas WHERE ID_MASCOTA = :id AND ID_EMPRESA = '{$_SESSION['user']->ID_EMPRESA }'";
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql,$array);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function deleteNote($id)
    {
        try {
            $sql="DELETE FROM notas WHERE ID_NOTA= ?";
            $this->pdo->prepare($sql)->execute([$id]);
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function deleteCreated($id)
    {
        try {
            $sql="DELETE FROM mascotas WHERE ID_MASCOTA= '$id'";
            $this->pdo->prepare($sql)->execute([$id]); 
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }
}