<?php

	session_start();


	if ($_SESSION['ROL']!="ADMIN") 
			{
				
			session_destroy();
			header('Location: ../index.php');
			}



?>