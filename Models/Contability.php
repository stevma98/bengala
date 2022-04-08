<?php 

class Contability {
 
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

    public function getDataxBill($id)
    {
        try {
            $strSql = "SELECT * FROM carrito c LEFT JOIN inventario_vacunas v ON c.ID_PRODUCTO=v.ID_VACUNA WHERE c.ID_EMPRESA='{$_SESSION['user']->ID_EMPRESA}' AND ESTADO_CARRITO='Pendiente' AND c.ID_MASCOTA='$id' AND TIPO != 'Productos'";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }
    
    public function searchProductsxBill($data)
    {
        try {
            $strSql = "SELECT *,c.PRECIO as PRECIOF,c.CANTIDAD as CANTIDADP FROM carrito c INNER JOIN productos p ON c.ID_PRODUCTO=p.ID_PRO WHERE c.ID_EMPRESA='{$_SESSION['user']->ID_EMPRESA}' AND ESTADO_CARRITO='Pendiente' AND ID_MASCOTA='{$data['idm']}' AND TIPO='Productos'";
            $query = $this->pdo->select($strSql);
            $query = json_encode($query);
            echo $query;    
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function addCar($data)
    {
        try {
            $date=date('Y-m-d H:s:i');
            $data+=['ID_USUARIO'=>$this->user,'ID_EMPRESA'=>$this->ide,'ESTADO_CARRITO'=>'Pendiente','TIPO'=>'Productos','FECHA_ANADIDO'=>$date];
            var_dump($data);
		    unset($data['PHPSESSID']);
            $this->pdo->insert('carrito', $data);
            $action="Ha añadido un articulo al carrito=".$data['ID_CONSE_CARRITO'];
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
    
    public function deleteRow($data)
    {
        try { 
            $id=$data['ID_CARRITO'];
            var_dump($data);
            $sql1="DELETE FROM carrito WHERE ID_CARRITO=:id";
            $sentenciasql=$this->pdo->prepare($sql1)->execute([':id'=>$id]);
            $date=date('Y-m-d H:s:i');
            $action="Ha eliminado el producto del carrito con id=".$data['ID_CARRITO'];
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

    public function deleteProductsxCar($data)
    {
        try { 
            $id=$data['idc'];
            $sql1="DELETE FROM carrito WHERE ID_CONSE_CARRITO=:id AND TIPO ='Productos'";
            $sentenciasql=$this->pdo->prepare($sql1)->execute([':id'=>$id]);
            $date=date('Y-m-d H:s:i');
            $action="Intento agregar productos al carrito con id=".$data['idc'];
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


}