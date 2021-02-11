<?php
	session_start();
	
	require_once("gestionBD.php");
	require_once("gestionarReservas.php");
	
	
	// Comprobar que hemos llegado a esta página porque se ha completado el inicio de sesión
		if(!isset($_SESSION["login"])){
			header("Location: hotel.php#paginaFormulario");
		} else {
			$conexion = crearConexionBD();
			$reservas = consultarReservas($conexion);
			cerrarConexionBD($conexion);
		}
		
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Clientes</title>
  <link rel="icon" href="imagenes/favicon_agaro.ico">
  <link rel="stylesheet" href="css/headerPrivado.css">
  <link rel="stylesheet" href="css/partePrivada.css">

</head>
<body>
	<div class="container">
	<div class="header">
		<div class="cerrarSesion">
			<form id="formularioCerrarSesion" action="hotel.php" method="post">
				<input id="cerrarSesionPrivado" type="submit" name="cerrarSesion" value="Cerrar sesión"/>
			</form>
		</div>
		<div class="logoPrivado">
			<img id="imagenLogoPrivado" src="imagenes/logoAgaro.jpg" alt="Logo del Hotel"/>
		</div>
		<div class="navegacionPriv">
			<nav id="navegacionPrivada">
				<ul>
					<li><a href="EmpleadosPrivado.php" >Empleados</a></li>
					<li><a href="HabitacionesPrivado.php" >Habitaciones</a></li>
					<li><a href="ClientesPrivado.php">Clientes</a></li>
					<li><a href="PrivadoReservas.php" style="background-color:#af8d2a">Reservas</a></li>
					<li><a href="PrivadoProductos.php">Productos</a></li>
					<li><a href="PrivadoEmpresas.php">Empresas</a></li>
					<li><a href="EventosPrivado.php">Eventos</a></li>
					<li><a href="BicisPrivado.php">Bicicletas</a></li>
					<li><a href="RestaurantePrivado.php">Restauración</a></li>
				</ul>
			</nav>
	</div>
	</div>
	<main>
		
<!--------- ALIMENTOS --------->					
<div class="tabla1">
		<h2>Reservas</h2>
		<table>
			<tr><th> Fecha inicio</th><th> Fecha fin</th><th> Cliente</th><th> ID</th></tr>
			
			
<?php
	foreach($reservas as $fila){
?>

			<tr  class="cliente">
				<td><?php echo $fila["FECHAINICIO"] ?></td>
				<td><?php echo $fila["FECHAFIN"]?></td>
				<td><?php echo $fila["CLIENTE"]?></td>
				<td><?php echo $fila["ID_RESERVAS"]?></td>
			</tr>
			
<?php } ?>

		</table>
</div>