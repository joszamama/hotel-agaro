<?php
	session_start();
	
	require_once("gestionBD.php");
	require_once("gestionarHabitaciones.php");
	
	
	// Comprobar que hemos llegado a esta página porque se ha completado el inicio de sesión
		if(!isset($_SESSION["login"])){
			header("Location: hotel.php#paginaFormulario");
		} else {
			$conexion = crearConexionBD();
			$habitaciones = consultarHabitaciones($conexion);
			$habitacionesPorLimpiar = consultarHabitacionesPorLimpiar($conexion);
			$habitacionesReservadas = consultarHabitacionesReservadas($conexion);
			cerrarConexionBD($conexion);
		}
		
	//Para guardar el boton de añadir, y borrarla de la variable $_SESSION;

	if (isset($_SESSION["editar"]))
	$editar = $_SESSION["editar"];
	unset($_SESSION["editar"]);

	if(isset($_SESSION["habitacion"]))
	$habitacion = $_SESSION["habitacion"];
	unset($_SESSION["habitacion"]);


	// Si en la sesión hay errores, los guardamos en una variable local
	if (isset($_SESSION["errores"]))
	$errores = $_SESSION["errores"];

?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <link rel="icon" href="imagenes/favicon_agaro.ico">
  <link rel="stylesheet" href="css/headerPrivado.css">
  <link rel="stylesheet" href="css/partePrivada.css">
  <title>Habitaciones</title>
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
					<li><a href="HabitacionesPrivado.php" style="background-color:#af8d2a">Habitaciones</a></li>
					<li><a href="ClientesPrivado.php">Clientes</a></li>
					<li><a href="PrivadoReservas.php">Reservas</a></li>
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
		
<!-------------HABITACIONES------------->
<div class="tabla1">	
		<table id="habitacionesPriv" name="habitacionesPriv">
		<a name="añadirHabitacion"></a>
			<h2>Habitaciones</h2>
<!-- MOSTRAR ERRORES -->
			<h3><?php	if (isset($errores) && count($errores)>0) { 
				echo "<div id=\"div_errores\" class=\"error\">";
				echo "<h4> Errores en el formulario:</h4>";
   				foreach($errores as $error) echo $error; 
   				echo "</div>";
  			}?></h3>

			<tr><th> Número</th><th> Tipo</th><th> Limpieza</th><th> Terraza</th><th> Reservada</th><th> Ocupada</th></tr>
			
<?php foreach($habitaciones as $fila){ ?>
			<tr>
				<td><?php echo $fila["NUMERO"] ?></td>
				<td><?php echo $fila["TIPO"]?></td>
				<td><?php echo $fila["LIMPIEZA"]?></td>
				<td><?php echo $fila["TERRAZA"]?></td>
				<td><?php echo $fila["RESERVADA"]?></td>
				<td><?php echo $fila["OCUPADA"]?></td>
				<td id="filaBotones">				
						<form id="filaBotones" method="post" action="controlador_habitaciones.php">		
							<input id="numero" name="numero"
								type="hidden" value="<?php echo $fila["NUMERO"]; ?>"/>
							<input id="tipo" name="tipo"
								type="hidden" value="<?php echo $fila["TIPO"]; ?>"/>
							<input id="limpieza" name="limpieza"
								type="hidden" value="<?php echo $fila["LIMPIEZA"]; ?>"/>
							<input id="terraza" name="terraza"
								type="hidden" value="<?php echo $fila["TERRAZA"]; ?>"/>
							<input id="reservada" name="reservada"
								type="hidden" value="<?php echo $fila["RESERVADA"]; ?>"/>
							<input id="ocupada" name="ocupada"
								type="hidden" value="<?php echo $fila["OCUPADA"]; ?>"/>

							<?php if(isset($editar)){ ?>
								<button id="delete" name="eliminar" type="submit" class="editar_fila">
									<img id="editCamareros" src="imagenes/delete.png" class="editar_fila" alt="Añadir cliente">
								</button>
							<?php } else { ?>
								<button id="edit" name="editar" type="submit" class="editar_fila">
									<img id="editCamareros" src="imagenes/edit.png" class="editar_fila" alt="Añadir cliente">
								</button>
						</form>		
				</td>				
							<?php } ?>			
			</tr>		
<?php } ?>
		</table>


<!-- EDITAR HABITACION -->	
<?php if(isset($editar)) {?>	
	<form action="controlador_habitaciones.php" method="post">
	<input id="numero" name="numero" type="hidden" value="<?php echo $habitacion["numero"]; ?>"/>
	<?php echo "Editando Habitacion ", $habitacion["numero"], " :<br>"; ?>
	<label for="limpieza">Limpieza: </label>
		<select id="limpieza" name="limpieza" required></h3>
			<option value="Si">Si</option>
			<option value="No">No</option>
		</select>
	<label for="reservada">Reservada: </label>
		<select id="reservada" name="reservada" required></h3>
			<option value="Si">Si</option>
			<option value="No">No</option>
		</select>
	<label for="ocupada">Ocupada: </label>
		<select id="ocupada" name="ocupada" required></h3>
			<option value="Si">Si</option>
			<option value="No">No</option>
		</select>
		
	<button id="guardar" name="guardarEdit" type="submit" class="editar_fila">
		<img id="guardarCamareros" src="imagenes/guardar.png" class="editar_fila" alt="Guardar modificación">
	</button>

	</form>
<?php } ?>
	</form>

</div>	
<!-------------HABITACIONES POR LIMPIAR------------->	
<div class="tabla2">
		<table id="habitacionesPriv" name="habitacionesPriv">
		<a name="añadirHabitacion"></a>
			<h2>Habitaciones por limpiar</h2>
<!-- MOSTRAR ERRORES -->
			<h3><?php	if (isset($errores) && count($errores)>0) { 
				echo "<div id=\"div_errores\" class=\"error\">";
				echo "<h4> Errores en el formulario:</h4>";
   				foreach($errores as $error) echo $error; 
   				echo "</div>";
  			}?></h3>	

			<tr><th> Número</th><th> Tipo</th><th> Limpieza</th><th> Terraza</th><th> Reservada</th><th> Ocupada</th></tr>
			
<?php foreach($habitacionesPorLimpiar as $fila){ ?>

			<tr>
				<td><?php echo $fila["NUMERO"]?></td>
				<td><?php echo $fila["TIPO"]?></td>
				<td><?php echo $fila["LIMPIEZA"]?></td>
				<td><?php echo $fila["TERRAZA"]?></td>
				<td><?php echo $fila["RESERVADA"]?></td>
				<td><?php echo $fila["OCUPADA"]?></td>
				<td id="filaBotones">				
						<form id="filaBotones" method="post" action="controlador_habitaciones.php">		
							<input id="numero" name="numero"
								type="hidden" value="<?php echo $fila["NUMERO"]; ?>"/>
							<input id="tipo" name="tipo"
								type="hidden" value="<?php echo $fila["TIPO"]; ?>"/>
							<input id="limpieza" name="limpieza"
								type="hidden" value="<?php echo $fila["LIMPIEZA"]; ?>"/>
							<input id="terraza" name="terraza"
								type="hidden" value="<?php echo $fila["TERRAZA"]; ?>"/>
							<input id="reservada" name="reservada"
								type="hidden" value="<?php echo $fila["RESERVADA"]; ?>"/>
							<input id="ocupada" name="ocupada"
								type="hidden" value="<?php echo $fila["OCUPADA"]; ?>"/>

							<?php if(isset($editar)){ ?>
								<button id="delete" name="eliminar" type="submit" class="editar_fila">
									<img id="editCamareros" src="imagenes/delete.png" class="editar_fila" alt="Añadir cliente">
								</button>
							<?php } else { ?>
								<button id="edit" name="editar" type="submit" class="editar_fila">
									<img id="editCamareros" src="imagenes/edit.png" class="editar_fila" alt="Añadir cliente">
								</button>
						</form>		
					</td>				
							<?php } ?>	
			</tr>
		
<?php } ?>
		</table>
		
<!-- EDITAR HABITACION -->	
<?php if(isset($editar)) {?>	
	<form action="controlador_habitaciones.php" method="post">
	<input id="numero" name="numero" type="hidden" value="<?php echo $habitacion["numero"]; ?>"/>
	<?php echo "Editando Habitacion ", $habitacion["numero"], " :<br>"; ?>
	<label for="limpieza">Limpieza: </label>
		<select id="limpieza" name="limpieza" required></h3>
			<option value="Si">Si</option>
			<option value="No">No</option>
		</select>
	<label for="reservada">Reservada: </label>
		<select id="reservada" name="reservada" required></h3>
			<option value="Si">Si</option>
			<option value="No">No</option>
		</select>
	<label for="ocupada">Ocupada: </label>
		<select id="ocupada" name="ocupada" required></h3>
			<option value="Si">Si</option>
			<option value="No">No</option>
		</select>
		
	<button id="guardar" name="guardarEdit" type="submit" class="editar_fila">
		<img id="guardarCamareros" src="imagenes/guardar.png" class="editar_fila" alt="Guardar modificación">
	</button>

	</form>
<?php } ?>
	</form>

</div>	
<!-------------HABITACIONES RESERVADAS------------->	
<div class="tabla3">
		<table id="habitacionesPriv" name="habitacionesPriv">
		<a name="añadirHabitacion"></a>
			<h2>Habitaciones reservadas</h2>
<!-- MOSTRAR ERRORES -->
			<h3><?php	if (isset($errores) && count($errores)>0) { 
				echo "<div id=\"div_errores\" class=\"error\">";
				echo "<h4> Errores en el formulario:</h4>";
   				foreach($errores as $error) echo $error; 
   				echo "</div>";
  			}?></h3>	

			<tr><th> Número</th><th> Tipo</th><th> Limpieza</th><th> Terraza</th><th> Reservada</th><th> Ocupada</th></tr>
			
<?php foreach($habitacionesReservadas as $fila){ ?>

			<tr>
				<td><?php echo $fila["NUMERO"] ?></td>
				<td><?php echo $fila["TIPO"]?></td>
				<td><?php echo $fila["LIMPIEZA"]?></td>
				<td><?php echo $fila["TERRAZA"]?></td>
				<td><?php echo $fila["RESERVADA"]?></td>
				<td><?php echo $fila["OCUPADA"]?></td>
				<td id="filaBotones">	<form id="filaBotones" method="post" action="controlador_habitaciones.php">		
							<input id="numero" name="numero"
								type="hidden" value="<?php echo $fila["NUMERO"]; ?>"/>
							<input id="tipo" name="tipo"
								type="hidden" value="<?php echo $fila["TIPO"]; ?>"/>
							<input id="limpieza" name="limpieza"
								type="hidden" value="<?php echo $fila["LIMPIEZA"]; ?>"/>
							<input id="terraza" name="terraza"
								type="hidden" value="<?php echo $fila["TERRAZA"]; ?>"/>
							<input id="reservada" name="reservada"
								type="hidden" value="<?php echo $fila["RESERVADA"]; ?>"/>
							<input id="ocupada" name="ocupada"
								type="hidden" value="<?php echo $fila["OCUPADA"]; ?>"/>

							<?php if(isset($editar)){ ?>
								<button id="delete" name="eliminar" type="submit" class="editar_fila">
									<img id="editCamareros" src="imagenes/delete.png" class="editar_fila" alt="Añadir cliente">
								</button>
							<?php } else { ?>
								<button id="edit" name="editar" type="submit" class="editar_fila">
									<img id="editCamareros" src="imagenes/edit.png" class="editar_fila" alt="Añadir cliente">
								</button>
						</form>		
					</td>				
							<?php } ?>	
			</tr>
		
<?php } ?>
		</table>

<!-- EDITAR HABITACION -->	
<?php if(isset($editar)) {?>	
	<form action="controlador_habitaciones.php" method="post">
	<input id="numero" name="numero" type="hidden" value="<?php echo $habitacion["numero"]; ?>"/>
	<?php echo "Editando Habitacion ", $habitacion["numero"], " :<br>"; ?>
	<label for="limpieza">Limpieza: </label>
		<select id="limpieza" name="limpieza" required></h3>
			<option value="Si">Si</option>
			<option value="No">No</option>
		</select>
	<label for="reservada">Reservada: </label>
		<select id="reservada" name="reservada" required></h3>
			<option value="Si">Si</option>
			<option value="No">No</option>
		</select>
	<label for="ocupada">Ocupada: </label>
		<select id="ocupada" name="ocupada" required></h3>
			<option value="Si">Si</option>
			<option value="No">No</option>
		</select>
		
	<button id="guardar" name="guardarEdit" type="submit" class="editar_fila">
		<img id="guardarCamareros" src="imagenes/guardar.png" class="editar_fila" alt="Guardar modificación">
	</button>

	</form>
<?php } ?>
	</form>

</div>	
</body>
</html>