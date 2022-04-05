<?php 

class Inventory {
 
    private $pdo ; 
    private $user;
    private $ide;

    public function __construct()
    {
        try {
            $this->pdo = new Conexion;    
            $this->user = $_SESSION['user']->identyUser;
            $this->ide = $_SESSION['user']->ID_EMPRESA;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }
    
    public function createCategorie($data)
    {
        try {
            $data+=['ID_USUARIO'=>$this->user,'ID_EMPRESA'=>$this->ide,'ESTADO_CATEGORIA'=>'Activo'];
		unset($data['PHPSESSID']);
            $this->pdo->insert('categorias', $data);
            $date=date('Y-m-d H:s:i');
            $action="Ha creado una categoria Nombre=".$data['NOM_CATEGORIA'];
            $sql="INSERT INTO `historial`(`FECHA_HISTORIAL`, `USUARIO_HISTORIAL`, `ACCION_HISTORIAL`,`ID_EMPRESA`) VALUES (:fecha,:user,:actioon,:ide)";
            $sentencia=$this->pdo->prepare($sql)->execute([
                ':fecha' => $date ,
                ':user' => $this->user,
                ':actioon' => $action,
                ':ide' => $this->ide
            ]);
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAll()
    {
        try {
            $strSql = "SELECT * FROM categorias WHERE ID_EMPRESA='$this->ide' AND ESTADO_CATEGORIA='Activo'";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getDataCategorie($id)
    {
        try {
            $strSql = "SELECT * FROM categorias WHERE ID_EMPRESA='$this->ide' AND ID_CATEGORIA='{$id['ID_CATEGORIA']}'";
            $query = $this->pdo->select($strSql);
            $query = json_encode($query);
            echo $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getDataArticle($id)
    {
        try {
            $strSql = "SELECT * FROM productos WHERE ID_EMPRESA='$this->ide' AND ID_PRO='{$id['ID_PRO']}'";
            $query = $this->pdo->select($strSql);
            $query = json_encode($query);
            echo $query;
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
    
    public function getAllGroups()
    {
        try {
            $strSql = "SELECT * from categorias WHERE ID_EMPRESA='{$_SESSION['user']->ID_EMPRESA}'";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }
    
    public function getConsecutive()
    {
        try {
            $strSql = "SELECT * from productos WHERE ID_EMPRESA='{$_SESSION['user']->ID_EMPRESA}' order by ID_PRO DESC LIMIT 1";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function searchInventorysById($id)
    {
        try {
            $strSql = "SELECT * from consultas WHERE ID_EMPRESA='{$_SESSION['user']->ID_EMPRESA}' AND ID_MASCOTA='$id'";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function editCategorie($data){
        try { 
            $id=$data['ID_CATEGORIA'];
            //Ordena un array por su indice
			ksort($data);
			// //Eliminar indices de un array
			unset($data['controller'], $data['method'],$data['ID_CATEGORIA'],$data['PHPSESSID']);
            $strWhere = 'ID_EMPRESA='.$this->ide." AND ID_CATEGORIA=".$id;
            $query=$this->pdo->update('categorias', $data, $strWhere); 
            $date=date('Y-m-d H:s:i');
            $action="Ha editado la categoria id=".$data['ID_CATEGORIA'];
            $sql="INSERT INTO `historial`(`FECHA_HISTORIAL`, `USUARIO_HISTORIAL`, `ACCION_HISTORIAL`,`ID_EMPRESA`) VALUES (:fecha,:user,:actioon,:ide)";
            $sentencia=$this->pdo->prepare($sql)->execute([
                ':fecha' => $date ,
                ':user' => $this->user,
                ':actioon' => $action,
                ':ide' => $this->ide
            ]);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function inactivateCategorie($data)
    {
        try { 
            $id=$data['ID_CATEGORIA'];
            //Ordena un array por su indice
			ksort($data);
			// //Eliminar indices de un array
			unset($data['controller'], $data['method'],$data['ID_CATEGORIA'],$data['PHPSESSID']);
            $data+=['ESTADO_CATEGORIA'=>'Inactivo'];
            $strWhere = 'ID_EMPRESA='.$this->ide." AND ID_CATEGORIA=".$id;
            $query=$this->pdo->update('categorias', $data, $strWhere); 
            $date=date('Y-m-d H:s:i');
            $action="Ha inactivado la categoria id=".$data['ID_CATEGORIA'];
            $sql="INSERT INTO `historial`(`FECHA_HISTORIAL`, `USUARIO_HISTORIAL`, `ACCION_HISTORIAL`,`ID_EMPRESA`) VALUES (:fecha,:user,:actioon,:ide)";
            $sentencia=$this->pdo->prepare($sql)->execute([
                ':fecha' => $date ,
                ':user' => $this->user,
                ':actioon' => $action,
                ':ide' => $this->ide
            ]);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function createArticle($data)
    {
        try {
            $this->pdo->insert('productos', $data);
            $date=date('Y-m-d H:s:i');
            $action="Ha creado un producto Nombre=".$data['NOM_PRO'];
            $sql="INSERT INTO `historial`(`FECHA_HISTORIAL`, `USUARIO_HISTORIAL`, `ACCION_HISTORIAL`,`ID_EMPRESA`) VALUES (:fecha,:user,:actioon,:ide)";
            $sentencia=$this->pdo->prepare($sql)->execute([
                ':fecha' => $date ,
                ':user' => $this->user,
                ':actioon' => $action,
                ':ide' => $this->ide
            ]);
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function listArticles()
    {
        try {
            $strSql = "SELECT * from productos p INNER JOIN categorias c ON c.ID_CATEGORIA=p.ID_GRUPO WHERE p.ID_EMPRESA='{$_SESSION['user']->ID_EMPRESA}' AND ESTADO_PRODUCTO ='Activo' ";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function editArticle($data){
        try { 
            $id=$data['ID_PRO'];
            $strWhere = 'ID_EMPRESA='.$this->ide." AND ID_PRO=".$id;
            $query=$this->pdo->update('productos', $data, $strWhere); 
            $date=date('Y-m-d H:s:i');
            $action="Ha editado el producto id=".$data['ID_PRO'];
            $sql="INSERT INTO `historial`(`FECHA_HISTORIAL`, `USUARIO_HISTORIAL`, `ACCION_HISTORIAL`,`ID_EMPRESA`) VALUES (:fecha,:user,:actioon,:ide)";
            $sentencia=$this->pdo->prepare($sql)->execute([
                ':fecha' => $date ,
                ':user' => $this->user,
                ':actioon' => $action,
                ':ide' => $this->ide
            ]);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function inactivateArticle($data){
        try { 
            $id=$data['ID_PRO'];
            $strWhere = 'ID_EMPRESA='.$this->ide." AND ID_PRO=".$id;
            $query=$this->pdo->update('productos', $data, $strWhere); 
            $date=date('Y-m-d H:s:i');
            $action="Ha inactivado el producto id=".$data['ID_PRO'];
            $sql="INSERT INTO `historial`(`FECHA_HISTORIAL`, `USUARIO_HISTORIAL`, `ACCION_HISTORIAL`,`ID_EMPRESA`) VALUES (:fecha,:user,:actioon,:ide)";
            $sentencia=$this->pdo->prepare($sql)->execute([
                ':fecha' => $date ,
                ':user' => $this->user,
                ':actioon' => $action,
                ':ide' => $this->ide
            ]);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }
    
}