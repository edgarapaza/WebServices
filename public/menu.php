<?php
session_start();
if($_SESSION['conductor']){
	require "../Model/Listados.model.php";
	$listas = new Listas();
	$data1 = $listas->SoloPedidos();
	$data2 = $listas->SoloDelivery();
	$data3 = $listas->SoloReservas();

	$numPedidos = $data1->num_rows;
	$numDelivery = $data2->num_rows;
	$numReserva = $data3->num_rows;


	include "./inc/header.php";
?>
 <meta http-equiv="refresh" content="5">
<!--
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script language="javascript">
	var timestamp = null;

	function cargar_push(){
		$.ajax({
			type: 'POST',
			url: '../Controller/httpush.php',
			data: "&timestamp="+timestamp,
			dataType: 'html',
			success: function(data)
			{
				var json  =eval("("+ data +")");
				fecha      = json.fecha;
				direccion  = json.direccion;
				referencia = json.referencia;
				tipo       = json.tipo;
				delivery   = json.delivery;
				otro       = json.otro;
				idcliente  = json.idcliente;
				estado     = json.estado;

				if(timestamp == null)
				{

				}else{
					$.$.ajax({
						type: 'POST',
						url: '../Controller/mensajes.php',
						data: "",
						dataType: 'html',
						success:  function(data){
							$("#contenido").html(data);
						}
					})
					
				}
				setTimeout('cargar_push()', 1000);
			}
		})

		.done(function() {
			console.log("success final");
		})
		.fail(function() {
			console.log("error final");
		})
		.always(function() {
			console.log("complete final");
		});
		
	}

	jQuery(document).ready(function($) {
		cargar_push();
	});
	
</script>
-->

<div class="container">
	<div class="row">
		<div class="header">
			<H3>Menu Conductor</H3>
			<div class="title">
				<span>
					<a href="menu.php">MENU</a>
				</span>
			</div>
		</div>
	</div>

	<div class="row">
		<div id="contenido"></div>
		
		<div class="collection">
			<a href="#!" class="collection-item"><span class="badge"><?php echo $numPedidos; ?></span>Pedidos Delivery</a>
			<a href="#!" class="collection-item"><span class="badge"><?php echo $numDelivery; ?></span>Nuevas Solicitudes</a>
			<a href="#!" class="collection-item"><span class="badge"><?php echo $numReserva; ?></span>Reserva</a>
			
		</div>
		Tenemos <span class="numero"><?php echo $numTodos; ?></span> nuevas solicitudes de movilidad
		<div class="row">
				<div class="col s12 m6">
					<div class="card blue-grey darken-1">
						<div class="card-content white-text">
							<span class="card-title"><?php echo $numPedidos; ?> Pedidos de Taxi</span>
							<p>Ver la lista completa</p>
						</div>
						<div class="card-action">
							<a href="newSolicitudes.php">Ver Lista</a>
							<a href="#">Cerrar</a>
						</div>
					</div>
				</div>
  				
		</div>

		<div class="row">
				<div class="col s12 m6">
					<div class="card teal darken-2">
						<div class="card-content white-text">
							<span class="card-title"><?php echo $numDelivery; ?> Pedidos Delivery </span>
							<p>Ver la lista completa</p>
						</div>
						<div class="card-action">
							<a href="newPedidos.php">Ver Lista</a>
							<a href="#">Cerrar</a>
						</div>
					</div>
				</div>
  				
		</div>

		<div class="row">
				<div class="col s12 m6">
					<div class="card pink darken-3">
						<div class="card-content white-text">
							<span class="card-title"><?php echo $numReserva; ?> Reservas de Vehiculos </span>
							<p>Ver la lista completa</p>
						</div>
						<div class="card-action">
							<a href="newReserva.php">Ver Lista</a>
							<a href="#">Cerrar</a>
						</div>
					</div>
				</div>
  				
		</div>

			<br/>
			<a href="nocerradas.php" class="btn">Servicio en Curso</a>
			<br/>
			<a href="concluidos.php" class="btn">Servicios Concluidos</a>

		</div>
	</div>
</div>
	

<?php
include "./inc/footer.php";
}else{
	header("Location: ../index.html");
}
?>