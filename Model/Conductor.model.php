<?php 
require_once "../Model/Conexion.php";

class Conductor
{
   	private $conn;

    public function __construct()
    {
    	$link = new Conexion();
    	$this->conn= $link->Conectar();   
    	return $this->conn;
    }

    public function NuevoConductor($idconductor,$nombres,$apellidos,$dni,$telefono,$email,$direccion,$numlicencia,$fecnaci,$foto)
    {
    	$dupli = "SELECT idconductor,dni,numlicencia FROM conductor WHERE dni='$dni' and numlicencia = '$numlicencia';";
    	$res =$this->conn->query($dupli);


    	$sql = "INSERT INTO conductor VALUES ('$idconductor','$nombres','$apellidos','$dni','$telefono','$email','$direccion','$numlicencia','$fecnaci','$foto');";
    	if(!$this->conn->query($sql)){
    		echo("Error description: " . $this->conn->error);
    		exit();
    	}

    }

    public function EditarDatos(){

    }

    public function EliminarConductor(){

    }

    public function ListarTodos(){

    }

    public function MostrarConductor(){

    }
}
