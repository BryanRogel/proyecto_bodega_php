<?php 
	require_once '../model/loginUsuario.php';

	if (isset($_POST['login'])) {
		login();
	}
	
	function login()
	{
		$username = $_POST['user'];
		$password = $_POST['pass'];
		
		$objUsuario = new Usuario();
		$objUsuario->IniciarSesion($username,$password);
	}


 ?>
