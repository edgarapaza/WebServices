<?php

session_start();
	require "../Model/validacion.model.php";

	$validacion = new Validacion();
	

	$user = trim($_REQUEST['usuario']);
	$pass = trim($_REQUEST['password']);

	$data = $validacion->ValidacionCuenta('edgar','edgar');

	switch ($data['nivel']) {
		case 1:
			$_SESSION['administrator'] = $data['idconductor'];
	    	header("Location: ../admin/index.html");
			break;
		case 2:
			$_SESSION['conductor'] = $data['idconductor'];
	    	header("Location: ../public/newSolicitudes.php");
			break;
		
		default:
			header("Location: ../public/info.html");
			break;
	}

?>