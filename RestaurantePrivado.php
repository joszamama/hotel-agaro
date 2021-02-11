<?php

	session_start();
	
	require_once("gestionBD.php");
	require_once("gestionarRestauracion.php");
	
	if(!isset($_SESSION["login"])){
			header("Location: hotel.php#paginaFormulario");
		} else {
			$conexion = crearConexionBD();
			$filas = consultarRestaurante($conexion);
			$copas = consultarBarDeCopas($conexion);
			cerrarConexionBD($conexion);
		}
		
	if (isset($_SESSION["editar"]))
		$editar = $_SESSION["editar"];
	unset($_SESSION["editar"]);
	
	if (isset($_SESSION["editar1"]))
		$editar1 = $_SESSION["editar1"];
	unset($_SESSION["editar1"]);
	
	
	if (isset($_SESSION["restaurante"]))
		$restaurante=$_SESSION["restaurante"];
	unset($_SESSION["restaurante"]);
	
	if (isset($_SESSION["barCopas"]))
		$barCopas=$_SESSION["barCopas"];
	unset($_SESSION["barCopas"]);
	
// Si en la sesión hay errores, los guardamos en una variable local
	if (isset($_SESSION["errores"]))
	$errores = $_SESSION["errores"];

?>	
		
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Clientes</title>
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
					<li><a href="HabitacionesPrivado.php">Habitaciones</a></li>
					<li><a href="ClientesPrivado.php">Clientes</a></li>
					<li><a href="PrivadoReservas.php">Reservas</a></li>
					<li><a href="PrivadoProductos.php" >Productos</a></li>
					<li><a href="EmpleadosPrivado.php">Empresas</a></li>
					<li><a href="EmpleadosPrivado.php">Eventos</a></li>
					<li><a href="EmpleadosPrivado.php">Bicicletas</a></li>
					<li><a href="RestaurantePrivado.php" style="background-color:#af8d2a">Restauración</a></li>
				</ul>
			</nav>
		</div>
	</div>
	<main>
		<div class="tabla1">
		<h2>Restaurante</h2>
		<table id="listado_clientes" name="Clientes">
			<a name="editarReservaRestaurante"></a>
			<tr><th> Numero de mesas</th><th> Numero de reservas</th><th> Hora Apertura</th>
				<th> Hora Cierre</th></tr>
				
	<?php
	foreach($filas as $fila){
	?>
	
	<tr class= "restaurante">
		<td><?php echo $fila["NUMEROMESAS"] ?></td>
		<td><?php echo $fila["NUMERORESERVAS"] ?></td>
		<td><?php echo $fila["HORAAPERTURA"] ?></td>
		<td><?php echo $fila["HORACIERRE"] ?></td>
		<td id="filaBotones">		
			<form id="formularioEditRestaurante" method="post" action="controlador_restaurante.php">		
				<input id="id_retaurante" name="ID_RESTAURANTE"
					type="hidden" value="<?php echo $fila["ID_RESTAURANTE"]; ?>"/>
				<input id="numeromesas" name="NUMEROMESAS"
					type="hidden" value="<?php echo $fila["NUMEROMESAS"]; ?>"/>
				<input id="numeroreservas" name="NUMERORESERVAS"
					type="hidden" value="<?php echo $fila["NUMERORESERVAS"]; ?>"/>
				<input id="horaapertura" name="HORAAPERTURA"
					type="hidden" value="<?php echo $fila["HORAAPERTURA"]; ?>"/>
				<input id="horacierre" name="HORACIERRE"
					type="hidden" value="<?php echo $fila["HORACIERRE"]; ?>"/>
			<?php if(!isset($editar)){ ?>
					<button id="edit" name="editar" type="submit" class="editar_fila">
						<img id="editCamareros" src="imagenes/edit.png" class="editar_fila" alt="Editar restaurante">
					</button>
			</form>		
		</td>				
		<?php } ?>
	</tr>
	<?php } ?>
</table>


<?php if(isset($editar)) {?>	
<fieldset id="tablaEditRestaurante">
			<legend>Editar Restaurante</legend>
<form action="controlador_restaurante.php" method="post">
<input id="id_restaurante" name="ID_RESTAURANTE" type="text" disabled value="<?php echo $restaurante["ID_RESTAURANTE"]; ?>"/>
<input id="numeroReservas" name="NUMERORESERVAS" type="text" value="<?php echo $restaurante["NUMERORESERVAS"]; ?>"/>	
<button id="guardar" name="guardarEdit" type="submit" class="editar_fila">
	<img id="guardarCamareros" src="imagenes/guardar.png" class="editar_fila" alt="Guardar modificación">
</button>

</form>
</fieldset>

<?php }?>
</div>
<!-- ------------------------BAR DE COPAS------------------------------ -->
<div class="tabla2">
<h2>Bar De Copas </h2>
		<table id="listado_clientes" name="Clientes">
			<a name="editarReservaBarCopas"></a>
			<tr><th> Numero de mesas</th><th> Numero de reservas</th><th> Hora Apertura</th>
				<th> Hora Cierre</th></tr>
				
	<?php
	foreach($copas as $fila){
	?>
	
	<tr class= "barCopas">
		<td><?php echo $fila["NUMEROMESAS"] ?></td>
		<td><?php echo $fila["NUMERORESERVAS"] ?></td>
		<td><?php echo $fila["HORAAPERTURA"] ?></td>
		<td><?php echo $fila["HORACIERRE"] ?></td>
		<td id="filaBotones">		
			<form id="formularioEditBarCopas" method="post" action="controlador_barCopas.php">	
				<input id="id_bar_c" name="ID_BAR_C"
					type="hidden" value="<?php echo $fila["ID_BAR_C"]; ?>"/>	
				<input id="numeromesas" name="NUMEROMESAS"
					type="hidden" value="<?php echo $fila["NUMEROMESAS"]; ?>"/>
				<input id="numeroreservas" name="NUMERORESERVAS"
					type="hidden" value="<?php echo $fila["NUMERORESERVAS"]; ?>"/>
				<input id="horaapertura" name="HORAAPERTURA"
					type="hidden" value="<?php echo $fila["HORAAPERTURA"]; ?>"/>
				<input id="horacierre" name="HORACIERRE"
					type="hidden" value="<?php echo $fila["HORACIERRE"]; ?>"/>
			<?php if(!isset($editar1)){ ?>
					<button id="edit" name="editar1" type="submit" class="editar_fila">
						<img id="editCamareros" src="imagenes/edit.png" class="editar_fila" alt="Añadir cliente">
					</button>
			<?php } else { ?>
			</form>		
		</td>				
		<?php } ?>
	</tr>
	<?php } ?>
</table>
<?php if(isset($editar1)) {?>	
<fieldset id="tablaEditBarCopas">
			<legend>Editar Bar de Copas</legend>
<form action="controlador_barCopas.php" method="post">
<input id="ID_BAR_C" name="ID_BAR_C" type="hidden" value="<?php echo $barCopas["ID_BAR_C"]; ?>"/>	
<input id="numeroReservas" name="NUMERORESERVAS" type="text" value="<?php echo $barCopas["NUMERORESERVAS"]; ?>"/>	
<button id="guardar" name="guardarEdit1" type="submit" class="editar_fila">
	<img id="guardarCamareros" src="imagenes/guardar.png" class="editar_fila" alt="Guardar modificación">
</button>

</form>
</fieldset>

<?php }?>
</div>

</main>
</div>
</body>
</html>