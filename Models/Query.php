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
            $this->pdo->insert('consultas', $data);
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAll()
    {
        try {
            $strSql = "SELECT * FROM `peluqueria` p inner join mascotas m on m.ID_MASCOTA=p.ID_MASCOTA INNER JOIN inventario_vacunas iv on iv.ID_VACUNA=p.ID_VACUNA";
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
            //Ordena un array por su indice
			ksort($data);
			// //Eliminar indices de un array
			unset($data['controller'], $data['method'],$data['id']);
            
            $strWhere = 'ID_EMPRESA='.$data['ID_EMPRESA']." AND CONSECUTIVO_CONSULTA=".$id;
            $query=$this->pdo->update('consultas', $data, $strWhere); 
            return $query;
        } catch ( PDOException $e) {
            die($e->getMessage());
        }
    }
    
}