<?php 
/**
  * @author Brian Steven Reyes Martinez
 
  */
date_default_timezone_set('America/Bogota');
class conexion{
	
    // private $host="localhost";
    // private $usuario_db="digitalmtx_dmtx";
    // private $contrasena_db="C,u/tA/?NRy><XT/4";
    // private $nombre_db="digitalmtx_dtmmtx";
    

    private $host="nous-boutique.com";
    private $usuario_db="nousbout_account";
    private $contrasena_db="StevenMartinez666";
    private $nombre_db="nousbout_accounts";
    

    //Getters
    public function gethost()
    {
    	return $this->host;
    }
	
	public function getusuario_db()
    {
    	return $this->usuario_db;
    } 

    public function getcontrasena_db()
    {
    	return $this->contrasena_db;
    }

    public function getnombre_db()
    {
    	return $this->nombre_db;
    }

    //Setters
    public function sethost($new_host)
    {
    	$this->host=$new_host;
    }
	
	public function setusuario_db($new_usuario_db)
    {
    	$this->usuario_db=$new_usuario_db;
    }

    public function setcontrasena_db($new_contrasena_db)
    {
    	$this->contrasena_db=$new_contrasena_db;
    }

    public function setnombre_db($new_nombre_db)
    {
    	$this->nombre_db=$new_nombre_db;
    }

}
?>