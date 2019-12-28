<?php
session_start();
if($_SESSION['conductor']){
	
	$codConductor = $_SESSION['conductor'];
	
	require_once "../Model/Listados.model.php";
	$listas = new Listas();
	$data = $listas->ServiciosAbiertosConductor($codConductor);

	include "inc/header.php";

	//<link rel="stylesheet" href="css/pendientes.css">
?>

	<div class="container">
		<div class="row">
	      <div class="col s12">This div is 12-columns wide on all screen sizes</div>
	      <div class="col s6">6-columns (one-half)</div>
	      <div class="col s6">6-columns (one-half)</div>
	    </div>
	</div>

	<div class="header">
		<H3>Menu Conductor</H3>
		<div class="title">
			<i class="material-icons">storage</i>
			<p class="subtitle">Lista de solicitudes pendientes</p>
			<span>
				<a href="menu.php">MENU</a>
			</span>
		</div>
	</div>

	<h2>Servicios Atendiendo</h2>

	<table class="table">
		<?php 
			while ($row = $data->fetch_array()) {
		 ?>
		<tr>
			<td>
				<?php printf("Dirección: %s (%s)", $row[2], $row[3]); ?>
			</td>
			<td>
				<a href="../Control/cerrarServicio.php?idpedir=<?php echo $row[0]; ?>" class="boton-secundario">Cerrar Servicio</a>
				
			</td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>
<?php 
	include "footer.php";

}else{
	header('Location: index.html');
}
 ?>
