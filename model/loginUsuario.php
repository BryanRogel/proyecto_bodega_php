<?php 
require_once 'conexion.php';
/**
* Usuario
*/
class Usuario 
{
	private $username;
	private $password;
	
	public function __construct()
    {
            
        $this->db = conectar();
            
    }


    public function getDb()
    {
            return $this->db;
    }
    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    public function EncriptarPass($pass)
    {
    	$passEncrip= sha1($pass);
    	return $passEncrip;
    }


    public function IniciarSesion($user,$pass)
    {

    	$passEncrip = $this->EncriptarPass($pass);
    	$sql = "SELECT rol_id FROM usuario WHERE username='".$user."' AND password='".$passEncrip."' AND estado=1";

		$info = $this->db->query($sql);
		if ($info->num_rows>0) {
			$data = $info->fetch_assoc();
			session_start();
			$_SESSION['ROL']=$data['rol_id'];
            if ($_SESSION['ROL']==1) {
            header("Location: ../views/indexAdmin.php");
            }else if ($_SESSION['ROL']==2) {
            header("Location: ../views/indexUsuario.php");
            }
		}else{
			header("Location: ../indexLogin.php");
		}

    }
}
?>