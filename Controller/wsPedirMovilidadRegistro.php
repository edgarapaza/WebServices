<?PHP
require_once "../Model/Conexion.php";

$conn = new Conexion();
$link = $conn->Conectar();

$json=array();

if(isset($_GET["idcliente"]) && isset($_GET["idauto"]) && isset($_GET["direccion"]) && isset($_GET["direccion"]) && isset($_GET['tipounidad']))
{
	$idcliente  = $_GET['idcliente'];
	$idauto     = $_GET['idauto'];
	$direccion  = $_GET['direccion'];
	$referencia = $_GET['referencia'];
	$otro       = $_GET['otros'];
	$tipounidad = $_GET['tipounidad'];
	$fecpedido  = date('Y-m-d h:i:s');

	echo $idcliente ."<br>";
	echo $idauto    ."<br>";
	echo $direccion ."<br>";
	echo $referencia."<br>";
	echo $otro      ."<br>"; 
	echo $tipounidad."<br>";
	echo $fecpedido ."<br>";
	
			
	$sql = "INSERT INTO pedirmovilidad VALUES (NULL,'$idcliente','$idauto','$direccion','$referencia','$otro','$tipounidad','$fecpedido',1,NULL,0,0,null);";
			
	if(!$link->query($sql))
	{
       	echo("Error description: " . $link->error);
		exit();

		$resulta["direccion"]     = 'Sin direccion';
		$resulta["referencia"]    = 'No Registra';
		$json['pedirMovilidad'][] = $resulta;
			
		echo json_encode($json);

    }else{
    	$sqlnotificaciones = "INSERT INTO notificaciones VALUES (NULL,'$idcliente','$direccion','$referencia','Mov','$tipounidad','$otro','$fecpedido',0);";
    	$link->query($sqlnotificaciones);

    	$consulta  = "SELECT idpedir, idcliente, direccion, referencia, tipouni, fecPedido FROM pedirmovilidad WHERE estado = true AND idcliente =" . $idcliente;
    	
		$resultado = $link->query($consulta);
				
		if($registro = $resultado->fetch_array()){
			$json['pedirMovilidad'][]=$registro;
		}
				
		mysqli_close($link);
		echo json_encode($json);	
		
    }
	
}else{
	$resulta["direccion"]     = 'No hay datos';
	$resulta["referencia"]    = 'No hay datos';
	$json['pedirMovilidad'][] = $resulta;
			
	echo json_encode($json);
}
