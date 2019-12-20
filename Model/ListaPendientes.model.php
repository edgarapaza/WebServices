<?php 
require_once "../Model/Conexion.php";

class ListaPendientes
{
	private $conn;
    
    public function __construct()
	{
        $link = new Conexion();
		$this->conn = $link->Conectar();
		return $this->conn;
    }

    public function MostrarLista(){
    	$sql="SELECT idpedir,idcliente,idauto,direccion,referencia,tipouni,estado FROM taxiseguro.pedirmovilidad WHERE aceptado = 0 AND estado <> 0;";
    	
    	if(!$res = $this->conn->query($sql)){
    		echo "Error";
			//echo $registro['id'].' - '.$registro['nombre'].'<br/>';
    	}

		mysqli_close($this->conn);

		return $res;
	}
	
}

/*$pendientes = new ListaPendientes();
$datos = $pendientes->MostrarLista();

while ($row = $datos->fetch_array()) {
    echo $row[0];
    echo $row[1];
    echo $row[2];
    echo $row[3];
    echo $row[4];
    echo $row[5];
}
?>