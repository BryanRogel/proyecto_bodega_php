<?php 
define('HOST', "localhost");
define('USER', "root");
define('PASS', "");
define('BD', "BodegaProyecto");

	    function conectar()
		{
			$con = new mysqli(HOST, USER, PASS, BD);
			if ($con->connect_errno){
				echo "Error en la Conexion";
				die();
			}

			
			return $con;
		}


$manejador="mysql";
$servidor="localhost";
$usuario="root";
$pass="";
$base="bodegaproyecto";
$cadena="$manejador:host=$servidor;dbname=$base";
$cnx = new PDO($cadena,$usuario,$pass);

function getConn(){
  $mysqli = mysqli_connect('localhost', 'root', '', "bodegaproyecto");
  if (mysqli_connect_errno($mysqli))
    echo "Fallo al conectar a MySQL: " . mysqli_connect_error();
  $mysqli->set_charset('utf8');
  return $mysqli;
}

	

 ?>