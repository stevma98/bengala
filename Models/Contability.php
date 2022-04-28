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
            $strSql = "SELECT * FROM ventas WHERE ID_EMPRESA='{$_SESSION['user']->ID_EMPRESA}'";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAllBox($id)
    {
        try {
            $strSql = "SELECT * FROM caja WHERE ID_EMPRESA='{$_SESSION['user']->ID_EMPRESA}' AND ID_CAJA ='$id'";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAllBoxes()
    {
        try {
            $strSql = "SELECT * FROM caja WHERE ID_EMPRESA='{$_SESSION['user']->ID_EMPRESA}'";
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

    public function getDataxBillShow($id,$idm)
    {
        try {
            $strSql = "SELECT * FROM carrito c LEFT JOIN inventario_vacunas v ON c.ID_PRODUCTO=v.ID_VACUNA WHERE c.ID_EMPRESA='{$_SESSION['user']->ID_EMPRESA}' AND c.ID_CONSE_CARRITO='$id' AND TIPO != 'Productos' AND c.ID_MASCOTA='$idm' ";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getDataByBill($id)
    {
        try {
            $strSql = "SELECT *,d.nombre as depart,mu.nombre as city FROM ventas v INNER JOIN mascotas m ON v.ID_MASCOTA=m.ID_MASCOTA INNER JOIN propietarios p ON p.ID_PROP=v.ID_PROP INNER JOIN departamentos d ON d.id=p.DEPARTAMENTO INNER JOIN municipios mu ON mu.id=p.ciudad WHERE v.ID_EMPRESA='{$this->ide}' AND ID_CONSE_VENTA='{$id}'";
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

    public function searchProductsxBillShow($data)
    {
        try {
            $strSql = "SELECT *,c.PRECIO as PRECIOF,c.CANTIDAD as CANTIDADP FROM carrito c INNER JOIN productos p ON c.ID_PRODUCTO=p.ID_PRO WHERE c.ID_EMPRESA='{$_SESSION['user']->ID_EMPRESA}' AND ID_CONSE_CARRITO='{$data['idm']}' AND TIPO='Productos'";
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

    public function getAllCredits()
    {
        try {
            $strSql = "SELECT * FROM ventas v INNER JOIN propietarios p ON v.ID_PROP=p.ID_PROP WHERE v.ID_EMPRESA='$this->ide' AND CREDITO = 1";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAllCreditstp()
    {
        try {
            $strSql = "SELECT * FROM ventas v INNER JOIN propietarios p ON v.ID_PROP=p.ID_PROP WHERE v.ID_EMPRESA='$this->ide' AND CREDITO = 1 AND ESTADO='Pendiente'";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAllAbonos()
    {
        try {
            $strSql = "SELECT * FROM pagos WHERE ID_EMPRESA='$this->ide'";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }
    
    public function deleteRow($data)
    {
        try { 
            $id=$data['ID_CARRITO'];
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

    public function closeSale($data)
    {
        
        try 
        {  
            $strSql = "SELECT * FROM ventas WHERE ID_EMPRESA='{$this->ide}' ORDER BY CON_VENTA DESC LIMIT 1";
            $query = $this->pdo->select($strSql);
            $s=explode('-',$query[0]->ID_CONSE_VENTA);
            $consecutive=$s[1]+1;
            $consecutive=str_pad($consecutive,6,'00000',STR_PAD_LEFT);
            $consecutive='FV-'.$consecutive;
            $date=date('Y-m-d H:s:i');
            $date1=explode('-',date('Y-m-d'));
            unset($data['PHPSESSID'],$data['FORMA_PAGO']);
            $data+=['USUARIO'=>$this->user,'ID_EMPRESA'=>$this->ide,'FECHA_VENTA'=>$date,'ANO_VENTA'=>$date1[0],'ID_CONSE_VENTA'=>$consecutive];
            $_REQUEST+=['USUARIO'=>$this->user,'ID_EMPRESA'=>$this->ide,'FECHA_VENTA'=>$date,'ANO_VENTA'=>$date1[0],'ID_CONSE_VENTA'=>$consecutive];            
            // $this->pdo->insert('ventas', $data);
            if ($_REQUEST['CREDITO']==1 && $_REQUEST['INICIAL']!=0) {
                $data3=['ID_VENTA'=>$consecutive,'FECHA_PAGO'=>$date,'ANO_PAGO'=>date('Y'),'VALOR_PAGO'=>$_REQUEST['INICIAL'],'USUARIO_ABONO'=>$this->user,'ID_EMPRESA'=>$this->ide,'PAGO_COMP'=>$consecutive];
                $this->pdo->insert('pagos',$data3);
            }
            $data1=['ESTADO_CARRITO'=>'Completado'];
            $strWhere2 = 'ID_EMPRESA='.$this->ide." AND ID_CONSE_CARRITO='{$data['ID_CARRITO']}' AND ID_MASCOTA='{$data['ID_MASCOTA']}'";
            // $query2=$this->pdo->update('carrito', $data1, $strWhere2);     
            $action="Ha concretado la venta del carrito".$data['ID_CARRITO'];
            $sql="INSERT INTO `historial`(`FECHA_HISTORIAL`, `USUARIO_HISTORIAL`, `ACCION_HISTORIAL`,`ID_EMPRESA`) VALUES (:fecha,:user,:actioon,:ide)";
            // $sentencia=$this->pdo->prepare($sql)->execute([
            //     ':fecha' => $date ,
            //     ':user' => $this->user,
            //     ':actioon' => $action,
            //     ':ide' => $this->ide
            // ]);
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function checkBox($date)
    {
        try {
            $strSql = "SELECT * FROM caja WHERE ID_EMPRESA='{$this->ide}' AND FECHA_CAJA='$date'";
            $query = $this->pdo->select($strSql);
            if(count($query)==0){
                $sql="INSERT INTO `caja`(`FECHA_CAJA`, `VALOR_APERTURA`, `ID_EMPRESA`, `ID_USUARIO`, `ESTADO_CAJA`) VALUES ('$date','0','{$this->ide}','{$this->user}','Abierta')";
                $this->pdo->prepare($sql)->execute();
                $strSql = "SELECT * FROM caja WHERE ID_EMPRESA='{$this->ide}' AND FECHA_CAJA='$date'";
                $query = $this->pdo->select($strSql);
                return $query;
            }else{ 
                return $query;
            }
        } catch ( PDOException $e) {
            die($e->getMessage());
        } 
    }

    public function getExpenses($date)
    {
        try {        
            $strSql = "SELECT * FROM movimientos WHERE ID_EMPRESA='{$this->ide}' AND FECHA_MOVIMIENTO='$date' AND TIPO_MOVIMIENTO='GASTO'";
            $query = $this->pdo->select($strSql);  
            return $query;          
        } catch ( PDOException $e) {
            die($e->getMessage());
        } 
    }

    public function addPayment($data)
    {
        try {     
            $strSql = "SELECT * FROM pagos WHERE ID_EMPRESA='{$this->ide}' AND PAGO_COMP LIKE '%ABONO%' ORDER BY ID_PAGO DESC LIMIT 1";
            $query = $this->pdo->select($strSql);
            $s=explode('-',$query[0]->PAGO_COMP);
            $consecutive=$s[1]+1;
            $consecutive=str_pad($consecutive,6,'00000',STR_PAD_LEFT);
            $consecutive='ABONO-'.$consecutive;
            $data['VALOR_PAGO'] = str_replace('.','',$data['VALOR_PAGO']);
            unset($data['PHPSESSID'],$data['controller'],$data['method'],$data['TICKET']);
            $date=date('Y-m-d H:s:i');
            $data+=['FECHA_PAGO'=>$date,'ID_EMPRESA'=>$this->ide,'USUARIO_ABONO'=>$this->user,'ANO_PAGO'=>date('Y'),'PAGO_COMP'=>$consecutive];
            $query2=$this->pdo->insert('pagos', $data);
            $strSql = "SELECT * FROM ventas WHERE ID_EMPRESA='{$this->ide}' AND ID_CONSE_VENTA='{$data['ID_VENTA']}'";
            $query = $this->pdo->select($strSql);
            $total=$query[0]->INICIAL+$data['VALOR_PAGO'];
            $strSql = "SELECT * FROM ventas WHERE ID_EMPRESA='{$this->ide}' AND ID_CONSE_VENTA='{$data['ID_VENTA']}'";
            $query = $this->pdo->select($strSql);
            $totalt=$query[0]->VALOR-$total;
            if ($totalt<=0) {
                $data1=['INICIAL'=>$total,'ESTADO'=>'Cerrado','PAGO'=>1];
            } else {
                $data1=['INICIAL'=>$total];
            }                    
            $strWhere2 = 'ID_EMPRESA='.$this->ide." AND ID_CONSE_VENTA='{$data['ID_VENTA']}'";
            $query2=$this->pdo->update('ventas', $data1, $strWhere2);     
            $action="Ha agregado un abono al credito ID= ".$data['ID_VENTA'];
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

    public function getIncomes($date)
    {
        try {        
            $strSql = "SELECT * FROM ventas WHERE ID_EMPRESA='{$this->ide}' AND FECHA_VENTA LIKE '%$date%' AND ESTADO='Cerrado'";
            $query = $this->pdo->select($strSql);  
            return $query;          
        } catch ( PDOException $e) {
            die($e->getMessage());
        } 
    }

    public function getPayments($date)
    {
        try {        
            $strSql = "SELECT * FROM pagos WHERE ID_EMPRESA='{$this->ide}' AND FECHA_PAGO LIKE '%$date%'";
            $query = $this->pdo->select($strSql);  
            return $query;          
        } catch ( PDOException $e) {
            die($e->getMessage());
        } 
    }

    public function getLoans($date)
    {
        try {        
            $strSql = "SELECT * FROM movimientos WHERE ID_EMPRESA='{$this->ide}' AND FECHA_MOVIMIENTO='$date' AND TIPO_MOVIMIENTO='PRESTAMO'";
            $query = $this->pdo->select($strSql);  
            return $query;          
        } catch ( PDOException $e) {
            die($e->getMessage());
        } 
    }

    public function editInitialBox($data)
    {
        try {
            $data['VALOR_APERTURA'] = str_replace('.','',$data['VALOR_APERTURA']);
            unset($data['PHPSESSID'],$data['controller'],$data['method']);
            $strWhere2 = "ID_EMPRESA=".$this->ide." AND ID_CAJA={$data['ID_CAJA']}";
            $query2=$this->pdo->update('caja', $data, $strWhere2);
            $action="Ha cambiado el valor inicial de la caja ID= ".$data['ID_CAJA'];
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

    public function closeBox($data)
    {
        try {
            $data['VALOR_CIERRE'] = str_replace('.','',$data['VALOR_CIERRE']);
            unset($data['PHPSESSID'],$data['controller'],$data['method']);
            $strWhere2 = "ID_EMPRESA=".$this->ide." AND ID_CAJA={$data['ID_CAJA']}";
            $query2=$this->pdo->update('caja', $data, $strWhere2);
            $action="Ha cerrado la caja ID= ".$data['ID_CAJA'];
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

    public function openBox($id)
    {
        try {
            $date=date('Y-m-d H:s:i');
            $data = ['ESTADO_CAJA'=>'Abierta'];
            unset($data['PHPSESSID'],$data['controller'],$data['method']);
            $strWhere2 = "ID_EMPRESA=".$this->ide." AND ID_CAJA={$id}";
            $query2=$this->pdo->update('caja', $data, $strWhere2);
            $action="Ha abierto la caja ID= ".$data['ID_CAJA'];
            $sql="INSERT INTO `historial`(`FECHA_HISTORIAL`, `USUARIO_HISTORIAL`, `ACCION_HISTORIAL`,`ID_EMPRESA`) VALUES (:fecha,:user,:actioon,:ide)";
            $sentencia=$this->pdo->prepare($sql)->execute([
                ':fecha' => $date ,
                ':user' => $this->user,
                ':actioon' => $action,
                ':ide' => $this->ide
            ]);
            header("Location: ?controller=contability&method=template");
        } catch ( PDOException $e) {
            die($e->getMessage());
        } 
    }

    public function addExpense($data)
    {
        try {
            $date=date('Y-m-d');
            $data['MONTO_MOVIMIENTO'] = str_replace('.','',$data['MONTO_MOVIMIENTO']);
            $data+=['FECHA_MOVIMIENTO'=>$date,'TIPO_MOVIMIENTO'=>'GASTO','ID_EMPRESA'=>$this->ide,'ID_USUARIO'=>$this->user];
            unset($data['PHPSESSID'],$data['controller'],$data['method']);
            $query=$this->pdo->insert('movimientos', $data);
            $action="Ha insertado un gasto para la caja con fecha ".$date;
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

    public function addLoan($data)
    {
        try {
            $date=date('Y-m-d');
            $data['MONTO_MOVIMIENTO'] = str_replace('.','',$data['MONTO_MOVIMIENTO']);
            $data+=['FECHA_MOVIMIENTO'=>$date,'TIPO_MOVIMIENTO'=>'PRESTAMO','ID_EMPRESA'=>$this->ide,'ID_USUARIO'=>$this->user];
            unset($data['PHPSESSID'],$data['controller'],$data['method']);
            $query=$this->pdo->insert('movimientos', $data);
            $action="Ha insertado un prestamo para la caja con fecha ".$date;
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