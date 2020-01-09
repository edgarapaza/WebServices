<?php 
require_once "../Model/Conexion.php";

class Listas
{
    private $conn;
    
    public function __construct()
	{
        $link = new Conexion();
		$this->conn = $link->Conectar();
		return $this->conn;
    }

    public function ServiciosAbiertosConductor($idauto)
    {
    	$sql="SELECT * FROM notificaciones WHERE estado = 0";
    	
    	if(!$res = $this->conn->query($sql)){
    		echo "Error mostrando servicios Abiertos";
    	}

		mysqli_close($this->conn);
		return $res;
	}

	public function ServiciosAbiertosTodos()
	{
    	$sql="SELECT * FROM notificaciones WHERE estado = 0;";
    	
    	if(!$res = $this->conn->query($sql)){
    		echo "Error mostrando servicios Abiertos";
    	}

		mysqli_close($this->conn);
		return $res;
	}

    public function SoloPedidos()
    {
        $sql="SELECT idpedir, idcliente, idauto, direccion, fecPedido, fecTermino FROM pedirmovilidad WHERE estado = 1;";
        
        if(!$res = $this->conn->query($sql)){
            echo "Error mostrando servicios Abiertos";
        }

        mysqli_close($this->conn);
        return $res;
    }
    public function SoloDelivery()
    {
        $sql="SELECT iddelivery,idcliente,idauto,direccion,referencia,delivery,otro,fecPedido FROM pedirdelivery WHERE estado = 1;";
        
        if(!$res = $this->conn->query($sql)){
            echo "Error mostrando servicios Abiertos";
        }

        mysqli_close($this->conn);
        return $res;
    }
    public function SoloReservas()
    {
        $sql="SELECT idreserva,idcliente,idauto,direccion,referencia,hora,otro,fecPedido FROM reservar WHERE estado = 1;";
        
        if(!$res = $this->conn->query($sql)){
            echo "Error mostrando servicios Abiertos";
        }

        mysqli_close($this->conn);
        return $res;
    }

	public function ServiciosConcluidos($idauto)
	{
    	$sql="SELECT idpedir, idcliente, direccion, fecPedido, fecTermino FROM pedirmovilidad WHERE estado = 0 AND idauto='$idauto';";
    	
    	if(!$res = $this->conn->query($sql)){
    		echo "Error mostrando Servicios Concluidos";
    	}

		mysqli_close($this->conn);
		return $res;
	}

}

#$listas = new Listas();
#$listas->ServiciosAbiertosConductor('M20');