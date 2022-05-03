<?php 

class Consent {
 
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
            $strSql="SELECT * FROM inventario_consentimientos WHERE ID_EMPRESA='{$_SESSION['user']->ID_EMPRESA}' AND ESTADO_CONSEN='Activo'";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAllById($id)
    {
        try {
            $strSql="SELECT * FROM consentimientos c INNER JOIN inventario_consentimientos ic ON ic.ID_CONSEN=c.TIPO_CONSEN WHERE c.ID_EMPRESA='{$_SESSION['user']->ID_EMPRESA}' AND c.ESTADO_CONSENTIMIENTO='Activo' AND c.ID_MASCOTA='$id'";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAllC()
    {
        try {
            $strSql="SELECT *,m.NOMBRE,p.ST_NOM,p.ST_APE FROM consentimientos c INNER JOIN mascotas m ON c.ID_MASCOTA=m.ID_MASCOTA INNER JOIN propietarios p ON c.ID_PROP=p.ID_PROP INNER JOIN inventario_consentimientos ic ON c.TIPO_CONSEN=ic.ID_CONSEN WHERE c.ID_EMPRESA='{$_SESSION['user']->ID_EMPRESA}' AND ESTADO_CONSENTIMIENTO='Activo'";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAllT($data)
    {
        try {
            $strSql="SELECT * FROM consentimientos WHERE ID_CONSENTIMIENTO='{$data['ID_CONSEN']}' AND ID_EMPRESA='{$_SESSION['user']->ID_EMPRESA}'";
            $query = $this->pdo->select($strSql);
            $query = json_encode($query);
            echo $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function createConsent($data)
    {
        try {
            $date1=date('Y-m-d');
            $data += ['ID_EMPRESA' => $_SESSION['user']->ID_EMPRESA];
            $data += ['FECHA_CONSEN' => $date1];
            $data += ['ESTADO_CONSEN' => 'Activo'];
		    unset($data['PHPSESSID']);
            $query=$this->pdo->insert('inventario_consentimientos',$data);
            if ($query=='') {
                $date=date('Y-m-d H:s:i');
                $user=$_SESSION['user']->identyUser;
                $action="Ha creado un consentimiento";
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

    public function getDataConsent($data)
    {
        try {
            $strSql="SELECT * FROM inventario_consentimientos WHERE ID_EMPRESA='{$_SESSION['user']->ID_EMPRESA}' AND ID_CONSEN='{$data['ID_CONSEN']}'";
            $query = $this->pdo->select($strSql);
            $query= json_encode($query);
            echo $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getDataConsentText($data)
    {
        try {
            $strSql="SELECT * FROM inventario_consentimientos WHERE ID_EMPRESA='{$_SESSION['user']->ID_EMPRESA}' AND ID_CONSEN='{$data['ID_CONSEN']}'";
            $query = $this->pdo->select($strSql);
            $query= json_encode($query);
            echo $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function editConsent($data)
    {
        try {
            ksort($data);
            unset($data['controller'],$data['method'],$data['PHPSESSID']);
            $strWhere = 'ID_CONSENTIMIENTO='.$data['ID_CONSENTIMIENTO'];
            $query=$this->pdo->update('consentimientos', $data, $strWhere); 
            if ($query=='') {
                $date=date('Y-m-d H:s:i');
                $user=$_SESSION['user']->identyUser;
                $action="Ha Editado el consentimiento con id=".$data['ID_CONSENTIMIENTO'];
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

    public function editConsent1($data)
    {
        try {
            ksort($data);
            unset($data['controller'],$data['method'],$data['PHPSESSID']);
            $strWhere = 'ID_CONSEN='.$data['ID_CONSEN'];
            $query=$this->pdo->update('inventario_consentimientos', $data, $strWhere); 
            if ($query=='') {
                $date=date('Y-m-d H:s:i');
                $user=$_SESSION['user']->identyUser;
                $action="Ha Editado el consentimiento con id=".$data['ID_CONSEN'];
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

    public function inactiveConsent($id)
    {
        try { 
            $data=['ESTADO_CONSEN'=>'Inactivo'];
            $strWhere = 'ID_CONSEN='.$id['ID_CONSEN'];
            $this->pdo->update('inventario_consentimientos', $data, $strWhere); 
            $date=date('Y-m-d H:s:i');
            $user=$_SESSION['user']->identyUser;
            $action="Ha inactivado el consentimiento con id=".$id['ID_CONSEN'];
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

    public function inactiveConsentById($data)
    {
        try { 
            ksort($data);
            unset($data['controller'],$data['method']);
            $data+=['ESTADO_CONSENTIMIENTO'=>'Inactivo'];
            $strWhere = 'ID_CONSENTIMIENTO='.$data['ID_CONSENTIMIENTO'];
            $query=$this->pdo->update('consentimientos', $data, $strWhere); 
            if ($query=='') {
                $date=date('Y-m-d H:s:i');
                $user=$_SESSION['user']->identyUser;
                $action="Ha inactivado el consentimiento con id=".$data['ID_CONSENTIMIENTO'];
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

    public function createConsentIndirect($data)
    {
        try {
            $date1=date('Y-m-d');
            $data += ['FECHA_CONSENTIMIENTO' => $date1];
            $data += ['ESTADO_CONSENTIMIENTO' => 'Activo'];
            $ide=$_SESSION['user']->ID_EMPRESA;
            $user=$_SESSION['user']->identyUser;
            $data += ['ID_EMPRESA' => $ide];
            $data += ['ID_USUARIO' => $user];
		    unset($data['PHPSESSID']);
            $query = $this->pdo->insert('consentimientos',$data);
            if ($query=='') {
                $date=date('Y-m-d H:s:i');
                $action="Ha creado un consentimiento";
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

}