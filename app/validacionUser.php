<?php

	session_start();


	if ($_SESSION['ROL']!="USUARIO") 
			{
				
			session_destroy();
			header('Location: ../index.php');
			}



?>