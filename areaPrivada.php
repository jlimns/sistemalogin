<?php 
	
	session_start();
	if(!isset($_SESSION['id_usuario']))
	{
		header('location: https://site.gentenspace.com/');
		exit;
	}



 ?>


 SEJA BEM VINDO