<?php 
require_once "../Model/Conexion.php";

class Acciones
{
    private $conn;
    
    public function __construct()
	{
        $link = new Conexion();
		$this->conn = $link->Conectar();
		return $this->conn;
    }

    public function AceptarSolicitud($idpedir, $idauto)
    {
    	
    	$sql ="UPDATE pedirmovilidad SET idauto = '".$idauto."', aceptado = 1, fecAceptado = now()  WHERE idpedir = $idpedir LIMIT 1;";

    	if(!$this->conn->query($sql)){
    		echo "Error al Aceptar solicitud";
    		$res = false;
    	}

    	echo "Petición Aceptada con exito";
    	$res = true;

		mysqli_close($this->conn);

    	return $res;

    }

    public function AceptarDelivery($idpedir, $idauto)
    {
        
        $sql ="UPDATE pedirdelivery SET idauto = '".$idauto."', aceptado = 1, fecAceptado = now()  WHERE iddelivery = $idpedir LIMIT 1;";

        if(!$this->conn->query($sql)){
            echo "Error al Aceptar solicitud";
            $res = false;
        }

        echo "Petición Aceptada con exito";
        $res = true;

        mysqli_close($this->conn);

        return $res;

    }

    public function CerrarServicio($idpedir){
    	$sql = "UPDATE pedirmovilidad SET estado = 0, fecTermino = now() WHERE idpedir = $idpedir LIMIT 1;";

    	if(!$this->conn->query($sql)){
    		echo "Error al Cerrar el Servicio";
    		$res = false;
    	}

    	echo "Cerrado correctamente";
    	$res = true;

		mysqli_close($this->conn);

    	return $res;
    }
}

$acciones = new Acciones();
#$acciones->AceptarSolicitud('43','M15');
$acciones->CerrarServicio(12);

