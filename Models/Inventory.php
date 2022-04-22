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

    public function getAllArticle()
    {
        try {
            $strSql = "SELECT * FROM productos WHERE ID_EMPRESA='$this->ide' AND ESTADO_PRODUCTO='Activo'";
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

    public function addToPartial($data)
    {
        try {
            unset($data['PHPSESSID']);
            $this->pdo->insert('compras_idpro', $data);
            echo "1";
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function addToPartialSale($data)
    {
        try {
            unset($data['PHPSESSID']);
            $this->pdo->insert('ventas_idpro', $data);
            echo "1";
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getShopping()
    {
        try {
            $strSql = "SELECT * FROM compras c INNER JOIN entradas e ON c.ID_CONSE_COMPRA=e.NUM_FAC INNER JOIN proveedores p ON p.ID_PROVEEDOR=e.PROVEEDOR WHERE c.ID_EMPRESA='$this->ide' GROUP BY ID_CONSE_COMPRA";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }    
    }
    
    public function getSales()
    {
        try {
            $strSql = "SELECT * FROM ventas c INNER JOIN salidas e ON c.ID_CONSE_VENTA=e.NUM_FAC WHERE c.ID_EMPRESA='$this->ide' GROUP BY ID_CONSE_VENTA";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }    
    }

    public function watchInfo($id)
    {
        try {
            $id=$id['CON_COMPRA'];
            $strSql = "SELECT * FROM compras c INNER JOIN entradas e ON c.ID_CONSE_COMPRA=e.NUM_FAC INNER JOIN proveedores p ON p.ID_PROVEEDOR=e.PROVEEDOR WHERE c.ID_EMPRESA='$this->ide' AND CON_COMPRA='$id'";
            $query = $this->pdo->select($strSql);
            $query = json_encode($query);
            echo $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    

    public function watchInfoProducts($id)
    {
        try {
            $id=$id['NUM_FAC'];
            $strSql = "SELECT * FROM entradas e INNER JOIN proveedores p ON p.ID_PROVEEDOR=e.PROVEEDOR INNER JOIN productos pr ON pr.ID_PRO=e.CODIGO_PRODUCTO WHERE e.ID_EMPRESA='$this->ide' AND NUM_FAC='$id'";
            $query = $this->pdo->select($strSql);
            $query = json_encode($query);
            echo $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }
    
    public function watchInfoS($id)
    {
        try {
            $id=$id['ID_CONSE_VENTA'];
            $strSql = "SELECT * FROM ventas c INNER JOIN salidas e ON c.ID_CONSE_VENTA=e.NUM_FAC LEFT JOIN propietarios p ON p.ID_PROP=c.ID_PROP WHERE c.ID_EMPRESA='$this->ide' AND ID_CONSE_VENTA='$id'";
            $query = $this->pdo->select($strSql);
            $query = json_encode($query);
            echo $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function watchInfoProductsS($id)
    {
        try {
            $id=$id['NUM_FAC'];
            $strSql = "SELECT * FROM salidas e INNER JOIN productos pr ON pr.ID_PRO=e.CODIGO_PRODUCTO WHERE e.ID_EMPRESA='$this->ide' AND NUM_FAC='$id'";
            $query = $this->pdo->select($strSql);
            $query = json_encode($query);
            echo $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function searchProductsxShopping()
    {
        try {
            $strSql = "SELECT * FROM productos p INNER JOIN compras_idpro c ON c.ID_PRO=p.ID_PRO WHERE c.ID_EMPRESA='$this->ide'";
            $query = $this->pdo->select($strSql);
            $query = json_encode($query);
            echo $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }    
    }

    public function searchProductsxSale()
    {
        try {
            $strSql = "SELECT * FROM productos p INNER JOIN ventas_idpro c ON c.ID_PRO=p.ID_PRO WHERE c.ID_EMPRESA='$this->ide'";
            $query = $this->pdo->select($strSql);
            $query = json_encode($query);
            echo $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }    
    }   

    public function quantityUpdate($data)
    {
        try { 
            $id=$data['ID_PRO'];
            unset($data['controller'],$data['method'],$data['PHPSESSID']);            
            $strWhere = "ID_PRO=".$id;
            $query=$this->pdo->update('compras_idpro', $data, $strWhere); 
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function quantityUpdateSale($data)
    {
        try { 
            $id=$data['ID_PRO'];
            unset($data['controller'],$data['method'],$data['PHPSESSID']);            
            $strWhere = "ID_PRO=".$id;
            $query=$this->pdo->update('ventas_idpro', $data, $strWhere); 
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function searchProductsxShoppingById($data)
    {
        try {
            $strSql = "SELECT * FROM productos p INNER JOIN compras_idpro c ON c.ID_PRO=p.ID_PRO WHERE ID_EMPRESA='$this->ide' AND c.ID_PRO='{$data['ID_PRO']}'";
            $query = $this->pdo->select($strSql);
            $query = json_encode($query);
            echo $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }    
    }  

    public function closeShopping($data)
    {
        try {
            $datac=[];
            $total=0;
            unset($data['PHPSESSID']);
            $strSql = "SELECT * from compras_idpro WHERE ID_EMPRESA='{$_SESSION['user']->ID_EMPRESA}'";
            $query = $this->pdo->select($strSql);
            $date=date('Y-m-d H:s:i');
            foreach ($query as $dato) {
                $datos=['NUM_FAC'=>$data['NUM_FAC'],'FECHA_ENTRADA'=>$date,'FECHA_COMPROBANTE'=>$data['FECHA_COMPROBANTE'],'CODIGO_PRODUCTO'=>$dato->ID_PRO,'CANTIDAD_ENTRADA'=>$dato->CANTIDAD,'ID_EMPRESA'=>$this->ide,'ID_USUARIO'=>$this->user,'MOTIVO_ENTRADA'=> "POR COMPRA FACTURA: ".$data['NUM_FAC'],'PROVEEDOR'=>$data['PROVEEDOR']];
                $this->pdo->insert('entradas', $datos);
                $strSql1 = "SELECT * from productos WHERE ID_EMPRESA='{$_SESSION['user']->ID_EMPRESA}' AND ID_PRO='{$dato->ID_PRO}' ";
                $query1 = $this->pdo->select($strSql1);
                if (count($query1)==1) {
                    $salidas=$query1[0]->ENTRADAS_PRO+$datos['CANTIDAD_ENTRADA'];
                    $stock=$query1[0]->STOCK+$datos['CANTIDAD_ENTRADA'];
                    $data1=['STOCK'=>$stock,'ENTRADAS_PRO'=>$salidas];
                    $strWhere2 = 'ID_EMPRESA='.$this->ide." AND ID_PRO='{$dato->ID_PRO}'";
                    $query2=$this->pdo->update('productos', $data1, $strWhere2);     
                    $total+=$datos['CANTIDAD_ENTRADA']*$query1[0]->PRECIO_COMPRA;
                }
                $sql1="DELETE FROM compras_idpro WHERE ID_EMPRESA ='{$this->ide}'";
                $sentenciasql=$this->pdo->prepare($sql1)->execute();
            }
            $y=date('Y');
            $datac = ['ID_CONSE_COMPRA'=>$data['NUM_FAC'],'VALOR'=>$total,'FECHA_COMPRA'=>$date,'ANO_COMPRA'=>$y,'USUARIO'=>$this->user,'ESTADO'=>'Cerrado','ID_EMPRESA'=>$this->ide];
            $this->pdo->insert('compras', $datac);
            $date=date('Y-m-d H:s:i');
            $action="Ha cerrado la compra id=".$data['NUM_FAC'];
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

    public function closeSaleDirect($data)
    {
        try {
            $datac=[];
            $total=0;
            unset($data['PHPSESSID'],$data['controller'],$data['method']);
            $strSql = "SELECT * FROM ventas WHERE ID_EMPRESA='{$this->ide}' ORDER BY CON_VENTA DESC LIMIT 1";
            $query = $this->pdo->select($strSql);
            $s=explode('-',$query[0]->ID_CONSE_VENTA);
            $consecutive=$s[1]+1;
            $consecutive=str_pad($consecutive,6,'00000',STR_PAD_LEFT);
            $consecutive='FV-'.$consecutive;
            $strSql = "SELECT * from ventas_idpro WHERE ID_EMPRESA='{$_SESSION['user']->ID_EMPRESA}'";
            $query = $this->pdo->select($strSql);
            $date=date('Y-m-d H:s:i');
            foreach ($query as $dato) {
                $datos=['NUM_FAC'=>$consecutive,'FECHA_SALIDA'=>$date,'CODIGO_PRODUCTO'=>$dato->ID_PRO,'CANTIDAD_SALIDA'=>$dato->CANTIDAD,'ID_EMPRESA'=>$this->ide,'ID_USUARIO'=>$this->user,'MOTIVO_SALIDA'=> "POR VENTA FACTURA: ".$consecutive];                
                $this->pdo->insert('salidas', $datos);
                $strSql1 = "SELECT * from productos WHERE ID_EMPRESA='{$_SESSION['user']->ID_EMPRESA}' AND ID_PRO='{$dato->ID_PRO}' ";
                $query1 = $this->pdo->select($strSql1);
                if (count($query1)==1) {
                    $salidas=$query1[0]->SALIDAS_PRO+$datos['CANTIDAD_SALIDA'];
                    $stock=$query1[0]->STOCK-$datos['CANTIDAD_SALIDA'];
                    $data1=['STOCK'=>$stock,'SALIDAS_PRO'=>$salidas];
                    $strWhere2 = 'ID_EMPRESA='.$this->ide." AND ID_PRO='{$dato->ID_PRO}'";
                    $query2=$this->pdo->update('productos', $data1, $strWhere2);     
                    $total+=$datos['CANTIDAD_SALIDA']*$query1[0]->PRECIO;
                }
                $sql1="DELETE FROM ventas_idpro WHERE ID_EMPRESA ='{$this->ide}'";
                $sentenciasql=$this->pdo->prepare($sql1)->execute();
            }
            $y=date('Y');
            $datav = ['ID_CONSE_VENTA'=>$consecutive,'VALOR'=>$data['VALOR'],'FECHA_VENTA'=>$date,'ANO_VENTA'=>$y,'USUARIO'=>$this->user,'ESTADO'=>'Cerrado','ID_EMPRESA'=>$this->ide,'ID_PROP'=>$data['ID_PROP'],'CREDITO'=>$data['CREDITO'],'PLAZO'=>$data['PLAZO'],'PAGO'=>$data['PAGO'],'INICIAL'=>$data['INICIAL'],'OBS'=>$data['OBS'],'DESCUENTO'=>$data['DESCUENTO'],'METODO_PAGO'=>$data['METODO_PAGO']];
            $this->pdo->insert('ventas', $datav);
            $date=date('Y-m-d H:s:i');
            $action="Ha cerrado la venta id=".$consecutive;
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

    public function cancelShopping()
    {
        try {
            $sql1="DELETE FROM compras_idpro WHERE ID_EMPRESA ='{$this->ide}'";
            $sentenciasql=$this->pdo->prepare($sql1)->execute();
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }
    
    public function cancelSale()
    {
        try {
            $sql1="DELETE FROM ventas_idpro WHERE ID_EMPRESA ='{$this->ide}'";
            $sentenciasql=$this->pdo->prepare($sql1)->execute();
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
            unset($data['PHPSESSID']);
            $data+=['STOCK'=>$data['CANTIDAD']];
            $this->pdo->insert('productos', $data);
            $date=date('Y-m-d H:s:i');
            $action="Ha Creado un Producto Nombre=".$data['NOM_PRO'];
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
            unset($data['PHPSESSID']);
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
            unset($data['PHPSESSID']);
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

    
    public function addOutputs($data)
    {
        try {
            unset($data['PHPSESSID']);
            $strSql = "SELECT * from carrito WHERE ID_EMPRESA='{$_SESSION['user']->ID_EMPRESA}' AND ID_CONSE_CARRITO='{$data['ID_CARRITO']}' AND (TIPO !='Vacuna' AND TIPO!='Consulta' AND TIPO != 'Peluqueria') AND ID_MASCOTA='{$data['ID_MASCOTA']}' ";
            $query = $this->pdo->select($strSql);
            foreach ($query as $dato) {
                $datos=['NUM_FAC'=>$data['ID_CONSE_VENTA'],'FECHA_SALIDA'=>$data['FECHA_VENTA'],'CODIGO_PRODUCTO'=>$dato->ID_PRODUCTO,'CANTIDAD_SALIDA'=>$dato->CANTIDAD,'ID_EMPRESA'=>$data['ID_EMPRESA'],'ID_USUARIO'=>$data['USUARIO'],'MOTIVO_SALIDA'=> "POR VENTA FACTURA: ".$data['ID_CONSE_VENTA']];
                $this->pdo->insert('salidas', $datos);
                $strSql1 = "SELECT * from productos WHERE ID_EMPRESA='{$_SESSION['user']->ID_EMPRESA}' AND ID_PRO='{$dato->ID_PRODUCTO}' ";
                $query1 = $this->pdo->select($strSql1);
                if (count($query1)==1) {
                    $salidas=$query1[0]->SALIDAS_PRO+$datos['CANTIDAD_SALIDA'];
                    $stock=$query1[0]->STOCK-$datos['CANTIDAD_SALIDA'];
                    $data1=['STOCK'=>$stock,'SALIDAS_PRO'=>$salidas];
                    $strWhere2 = 'ID_EMPRESA='.$this->ide." AND ID_PRO='{$dato->ID_PRODUCTO}'";
                    $query2=$this->pdo->update('productos', $data1, $strWhere2);     
                }
            }
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function createProvider($data)
    {
        try {
            unset($data['PHPSESSID']);
            $date=date('Y-m-d H:s:i');
            $data+=['ID_EMPRESA'=>$this->ide,'ID_USUARIO'=>$this->user,'FECHA_CREADO'=>$date];
            $this->pdo->insert('proveedores', $data);
            $action="Ha Creado un proveedor Nombre=".$data['NOMBRE'];
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

    public function getAllProviders()
    {
        try {
            $strSql = "SELECT * from proveedores WHERE ID_EMPRESA='{$_SESSION['user']->ID_EMPRESA}' AND ESTADO_PROVEEDOR='Activo'";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function inactivateProvider($id)
    {
        try { 
            
            unset($id['controller'],$id['method'],$data['PHPSESSID']);
            $data=['ESTADO_PROVEEDOR'=>'Inactivo'];
            $strWhere = 'ID_PROVEEDOR='.$id['ID_PROVEEDOR'];
            var_dump($id);
            $this->pdo->update('proveedores', $data, $strWhere); 
            $date=date('Y-m-d H:s:i');
            $user=$_SESSION['user']->identyUser;
            $action="Ha inactivado el proveedor con id=".$id['ESTADO_PROVEEDOR'];
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
    
    public function deleteRow($data)
    {
        try { 
            unset($data['PHPSESSID']);
            $id=$data['ID_PRO'];
            $sql1="DELETE FROM compras_idpro WHERE ID_PRO=:id";
            $sentenciasql=$this->pdo->prepare($sql1)->execute([':id'=>$id]);
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function deleteRowSale($data)
    {
        try { 
            unset($data['PHPSESSID']);
            $id=$data['ID_PRO'];
            $sql1="DELETE FROM ventas_idpro WHERE ID_PRO=:id";
            $sentenciasql=$this->pdo->prepare($sql1)->execute([':id'=>$id]);
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function manualAddInput($data)
    {
        try {
            unset($data['PHPSESSID']);
            $date=date('Y-m-d H:s:i');
            $data+=['ID_EMPRESA'=>$this->ide,'ID_USUARIO'=>$this->user,'FECHA_ENTRADA'=>$date];
            $this->pdo->insert('entradas', $data);
            $strSql = "SELECT * from productos WHERE ID_EMPRESA='{$_SESSION['user']->ID_EMPRESA}' AND ID_PRO='{$data['CODIGO_PRODUCTO']}'";
            $query = $this->pdo->select($strSql);
            $input = $query[0]->ENTRADAS_PRO + $data['CANTIDAD_ENTRADA'];
            $stock = $query[0]->STOCK + $data['CANTIDAD_ENTRADA'];
            $datos=['ENTRADAS_PRO'=>$input,'STOCK'=>$stock];
            $strWhere = 'ID_PRO='.$data['CODIGO_PRODUCTO'];
            $this->pdo->update('productos', $datos, $strWhere); 
            $action="Ha modificado la entrada del producto=".$data['CODIGO_PRODUCTO'];
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

    public function manualAddOutput($data)
    {
        try {
            unset($data['PHPSESSID']);
            $date=date('Y-m-d H:s:i');
            $data+=['ID_EMPRESA'=>$this->ide,'ID_USUARIO'=>$this->user,'FECHA_SALIDA'=>$date];
            $this->pdo->insert('salidas', $data);
            $strSql = "SELECT * from productos WHERE ID_EMPRESA='{$_SESSION['user']->ID_EMPRESA}' AND ID_PRO='{$data['CODIGO_PRODUCTO']}'";
            $query = $this->pdo->select($strSql);
            $input = $query[0]->SALIDAS_PRO + $data['CANTIDAD_SALIDA'];
            $stock = $query[0]->STOCK - $data['CANTIDAD_SALIDA'];
            $datos=['SALIDAS_PRO'=>$input,'STOCK'=>$stock];
            $strWhere = 'ID_PRO='.$data['CODIGO_PRODUCTO'];
            $this->pdo->update('productos', $datos, $strWhere); 
            $action="Ha modificado la salida del producto=".$data['CODIGO_PRODUCTO'];
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