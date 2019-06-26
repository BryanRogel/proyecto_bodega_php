<?php 
        require_once 'Conexion.php';
        require_once 'Conexion.php';
        require_once 'rb.php';
        R::setup('mysql:host=localhost;dbname=bodegaproyecto','root','');
class Usuario
{
  private $nombre;
  private $apellido;
  private $email;
  private $username;
  private $password;
  private $salt;
  private $estado;
  private $rol;
  public $db;
  
  public function __construct()
  {
    
    $this->db = conectar();
    }


public function getDb()
{
    return $this->db;
}


    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     *
     * @return self
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     *
     * @return self
     */
    public function setPassword($password)
    {
        $passEncode = sha1($password);
        $this->password = $passEncode;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * @param mixed $salt
     *
     * @return self
     */
    public function setSalt()
    {
        $this->salt = $this->generateSalt();

        return $this;
    }

    public function generateSalt()
    {
        $salt = $this->password;
        for ($i=1; $i<=12 ; $i++) { 
            $salt = sha1($salt);
        }
        return $salt;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     *
     * @return self
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * @param mixed $rol
     *
     * @return self
     */
    public function setRol($rol)
    {
        $this->rol = $rol;

        return $this;
    }


    public function ingresar()
    {
        $sql = "SELECT u.username as usuario , r.nombre as rol FROM usuario u
        INNER JOIN rol r ON u.rol_id = r.id WHERE u.estado = 1 AND r.estado =1 and u.username = '".$this->username."' and u.password='".$this->password."'";

        $info = $this->db->query($sql);

        if ($info->num_rows>0) 
        {

            $data = $info->fetch_assoc();

            session_start();
            $_SESSION['ROL']=$data['rol'];

            $data['estado'] = true;
            $data['descripcion'] = "Datos Correctos";

            header("Location: ../app/validacionGeneral.php");
            
            
        }
        else
        {
            $data['estado'] = false;
            $data['descripcion'] = "Datos Incorrectos".$this->db->error;
            session_destroy();
            die();
        }
        
        

        return $data;
        
        
    }
    

    public function getAll()
    {
        $sqlAll = "SELECT * from usuario WHERE estado = 1";
        $info = $this->db->query($sqlAll);
        if ($info->num_rows>0) {
            
            $dato = $info;
        }else{

            $dato = false;
        }
        return $dato;
    }

    public function getAllRol()
    {
        $sql = "SELECT r.id, r.nombre FROM rol r WHERE r.estado=1";
        $info = $this->db->query($sql);
        if($info->num_rows>0){
            $data = $info;
        }else{
            $data=false;
        }

        return $data;
    }

    public function saveUser()
    {
        $now = date('Y-m-d');

        $user = R::dispense('usuario');
        $user->username = $this->username;
        $user->password = sha1($this->password);
        $user->estado = $this->estado;
        $user->rol_id = $this->rol;
        $user->creacion = $now;

        $res = R::store($user);

        if($res){
            $data['estado'] = true;
            $data['descripcion'] = "Datos ingresados exitosamente";
        }else{
            $data['estado'] = false;
            $data['descripcion'] = "Error al ingresar los datos".$this->db->error;
        }

        return json_encode($data);
    }   

    public function findUser($user)
    {
        $sql = "SELECT COUNT(u.id) as numero from usuario u WHERE u.username='".$user."'";
        $info = $this->db->query($sql);
        $data =$info->fetch_assoc();
        $datos = array();
        if($data['numero']>0){
            $datos['estado']=false;
            $datos['descripcion']="Usuario ya registrado, intenta con otro.";
        }else{
            $datos['estado']=true;
            $datos['descripcion']="Usuario disponible";
        }
        return json_encode($datos);
    }
    public function getInfo($idUsuario)
    {
            $sql = "SELECT * FROM usuario WHERE id=".$idUsuario;
            $result = $this->db->query($sql);
            $res = $result->fetch_assoc();

            $data['username'] = $res['username'];
            $data['rol_id'] = $res['rol_id'];

            return json_encode($data);
    }

    public function eliminarUser($idUser)
    {
        $sql = "update usuario set estado = 0, eliminacion = NOW() where id = ".$idUser;
        $info = $this->db->query($sql);

        if($info)
        {
            $data['estado'] = true;
            $data['descripcion'] = "Datos Eliminados exitosamente";
        }
        else
        {
            $data['estado'] = false;
            $data['descripcion'] = "Error al eliminar los datos".$this->db->error;
        }

        return $data;
    }

    public function editUser($idUser)
    {
        $sql = "UPDATE usuario SET username='".$this->username."',password='".$this->password."' ,rol_id=".$this->rol." ,modificacion=NOW() WHERE id=".$idUser;

        $res = $this->db->query($sql);

        if ($res) {
            $data['estado']=true;
            $data['descripcion']="Datos modificados exitosamente";
        }else{
            $data['estado']=false;
            $data['descripcion']="Error en la modificacion ".$this->db->error;
        }

    return json_encode($data);
       
    }

//Fin de la clase usuario


    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     *
     * @return self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * @param mixed $apellido
     *
     * @return self
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
}


?>