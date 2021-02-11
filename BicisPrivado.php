<?php

session_start();
	
	require_once("gestionBD.php");
	require_once("gestionarBicicletas.php");
	
	if(!isset($_SESSION["login"])){
			header("Location: hotel.php#paginaFormulario");
		} else {
			$conexion = crearConexionBD();
			$bicis = consultarBicis($conexion);
			cerrarConexionBD($conexion);
		}	
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Bicicletas</title>
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
					<li><a href="PrivadoReservas.php">Reservas</a></li>
					<li><a href="PrivadoProductos.php">Productos</a></li>
					<li><a href="PrivadoEmpresas.php">Empresas</a></li>
					<li><a href="EventosPrivado.php">Eventos</a></li>
					<li><a href="BicisPrivado.php" style="background-color:#af8d2a">Bicicletas</a></li>
					<li><a href="RestaurantePrivado.php">Restauración</a></li>
				</ul>
			</nav>
	</div>
	</div>
	<main>
		<div class="tabla1">
		<h2>Bicicletas</h2>
		<table id="listado_clientes" name="Clientes">
			<tr><th> ID</th><th> Estado</th></tr>
				
	<?php
	foreach($bicis as $fila){
	?>
	
	<tr class= "restaurante">
		<td><?php echo $fila["ID_BICICLETA"] ?></td>
		<td><?php echo $fila["ESTADO"] ?></td>
		
		
	</tr>
	<?php } ?>
</table>
</div>
</div>
</body>
</html>