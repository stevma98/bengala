<?php 

class Person {
 
    private $pdo ; 
    private $ide ;
    private $user ; 

    public function __construct()
    {
        try {
            $this->pdo = new Conexion;
            $this->ide = $_SESSION['user']->ID_EMPRESA;
            $this->user = $_SESSION['user']->identyUser;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }
    
    public function getDataById($data)
    {
        try {
            $strSql = "SELECT * from admin WHERE identyUser='{$data['identyUser']}'";
            $query = $this->pdo->select($strSql);
            $query = json_encode($query);
            echo $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function createUser($data)
    {
        try {
            $date=date('Y-m-d H:s:i');
            $pass=sha1($data['identyUser']);
            $stn=ucfirst(strtolower($data['ST_NOM']));
            $ndn=ucfirst(strtolower($data['ND_NOM']));
            $sta=ucfirst(strtolower($data['ST_APE']));
            $nda=ucfirst(strtolower($data['ND_APE']));
            $email=strtolower($data['EMAIL']);
            unset($data['controller'], $data['method'],$data['PHPSESSID'],$data['ST_NOM'],$data['ND_NOM'],$data['ST_APE'],$data['ND_APE'],$data['EMAIL']);
            $data += ['passwordUser'=>$pass,'ID_EMPRESA'=>$this->ide,'ESTADO_USER'=>1,'ST_NOM'=>$stn,'ND_NOM'=>$ndn,'ST_APE'=>$sta,'ND_APE'=>$sta,'EMAIL'=>$email];
            $query=$this->pdo->insert('admin', $data); 
            if ($query=='') {
                $action="Ha creado el usuario ".$data['identyUser'];
                $sql="INSERT INTO `historial`(`FECHA_HISTORIAL`, `USUARIO_HISTORIAL`, `ACCION_HISTORIAL`,`ID_EMPRESA`) VALUES (:fecha,:user,:actioon,:ide)";
                $sentencia=$this->pdo->prepare($sql)->execute([
                    ':fecha' => $date ,
                    ':user' => $this->user,
                    ':actioon' => $action,
                    ':ide' => $this->ide
                ]);
                echo "true";
            } else {
                echo "false";
            }
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function editUser($data)
    {
        try {
            $date=date('Y-m-d H:s:i');
            $stn=ucfirst(strtolower($data['ST_NOM']));
            $ndn=ucfirst(strtolower($data['ND_NOM']));
            $sta=ucfirst(strtolower($data['ST_APE']));
            $nda=ucfirst(strtolower($data['ND_APE']));
            $email=strtolower($data['EMAIL']);
            unset($data['controller'], $data['method'],$data['PHPSESSID'],$data['ST_NOM'],$data['ND_NOM'],$data['ST_APE'],$data['ND_APE'],$data['EMAIL']);
            $data += ['ST_NOM'=>$stn,'ND_NOM'=>$ndn,'ST_APE'=>$sta,'ND_APE'=>$nda,'EMAIL'=>$email];
            $strWhere = 'identyUser='.$data['identyUser'];
            $query=$this->pdo->update('admin', $data, $strWhere); 
            if ($query=='') {
                $action="Ha editado el usuario ".$data['identyUser'];
                $sql="INSERT INTO `historial`(`FECHA_HISTORIAL`, `USUARIO_HISTORIAL`, `ACCION_HISTORIAL`,`ID_EMPRESA`) VALUES (:fecha,:user,:actioon,:ide)";
                $sentencia=$this->pdo->prepare($sql)->execute([
                    ':fecha' => $date ,
                    ':user' => $this->user,
                    ':actioon' => $action,
                    ':ide' => $this->ide
                ]);
                echo "true";
            } else {
                echo "false";
            }
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }


    public function getAllEmployees()
    {
        try {
            $strSql = "SELECT * from admin WHERE ID_EMPRESA='{$this->ide}'";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getById($id){
        try { 
            $strSql = 'SELECT * FROM bgl_user WHERE id = :id';
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql,$array);
            return $query;
            
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function updatePerson($data){
        try { 
            $strWhere = 'id='.$data['id'];
            $this->pdo->update('bgl_user', $data, $strWhere); 
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }
    
}