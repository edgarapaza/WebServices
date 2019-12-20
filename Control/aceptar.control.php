<?php 
require_once "../Model/Acciones.model.php";

$idpedir = $_REQUEST['idpedir'];
$idauto = $_REQUEST['idauto'];

$acciones = new Acciones();
$acciones->AceptarSolicitud($idpedir, $idauto);

header("Location: ../public/newSolicitudes.php");
?>