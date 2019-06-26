<?php

	session_start();


	if ($_SESSION['ROL']=="ADMIN") 
	{
		header("Location: ../views/dashboard.php");
		
	}else if ($_SESSION['ROL']=="USUARIO") 
			{
				header("Location: ../views/dashboardUser.php");
			}
			else
{
	session_destroy();
	header('Location: ../index.php');
}



?>