<?php
	session_start();
	
	require_once("gestionBD.php");
	require_once("gestionarEmpleados.php");
	
	
	// Comprobar que hemos llegado a esta página porque se ha completado el inicio de sesión
		if(!isset($_SESSION["login"])){
			header("Location: hotel.php#paginaFormulario");
		} else {
			$conexion = crearConexionBD();
			$dgeneral = consultarDirectorGeneral($conexion);
			$dadm = consultarDirectorAdministrativo($conexion);
			$drest = consultarDirectorRestauracion($conexion);
			$dmark = consultarDirectorMarketing($conexion);
			$dhabit = consultarDirectorHabitaciones($conexion);
			$camareros = consultarCamareros($conexion);
			$cdelimpieza = consultarCamarerosLimpieza($conexion);
			cerrarConexionBD($conexion);
		}
	
//Para guardar el boton de añadir, y borrarla de la variable $_SESSION;
	if (isset($_SESSION["añadir"]))
		$boton = $_SESSION["añadir"];
	unset($_SESSION["añadir"]);
	
	if (isset($_SESSION["editar"]))
		$editar = $_SESSION["editar"];
	unset($_SESSION["editar"]);


	if (isset($_SESSION["añadir1"]))
		$boton1 = $_SESSION["añadir1"];
	unset($_SESSION["añadir1"]);
	
	if (isset($_SESSION["editar1"]))
		$editar1 = $_SESSION["editar1"];
	unset($_SESSION["editar1"]);

	
	if(isset($_SESSION["empleado"]))
		$empleado = $_SESSION["empleado"];
	unset($_SESSION["empleado"]);
		
	
// Si en la sesión hay errores, los guardamos en una variable local
if (isset($_SESSION["errores"]))
	$errores = $_SESSION["errores"];

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Empleados</title>
  <link rel="icon" href="imagenes/favicon_agaro.ico">
  <link rel="stylesheet" href="css/headerPrivado.css">
  <link rel="stylesheet" href="css/partePrivada.css">
  <script src="js/validacion.js" type="text/javascript"></script>

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
					<li><a href="EmpleadosPrivado.php" style="background-color:#af8d2a">Empleados</a></li>
					<li><a href="HabitacionesPrivado.php" >Habitaciones</a></li>
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
	
	
	<section>
		<main>
		
<!-------------DIRECTOR GENERAL------------->		
	<div class="tabla1">	
			<table id="director_general" name="director_general">
				<h2>Director general</h2>
				<tr><th> Apellidos</th><th> Nombre</th><th> DNI</th><th> Email</th><th> Teléfono</th><th> Turno</th></tr>
			
<?php foreach($dgeneral as $fila){ ?>

				<tr class="cliente">
					<td><?php echo $fila["APELLIDOS"] ?></td>
					<td><?php echo $fila["NOMBRE"]?></td>
					<td><?php echo $fila["DNI"]?></td>
					<td><?php echo $fila["EMAIL"]?></td>
					<td><?php echo $fila["TELEFONO"]?></td>
					<td><?php echo "--"?></td>
								
				</tr>
		
<?php } ?>

			</table>
	</div>	
<!-------------DIRECTOR DE HABITACIONES------------->	
	<div class="tabla2">	
			<table id="director_habitaciones" name="director_habitaciones">
				<h2>Directores de habitaciones</h2>
				<tr><th> Apellidos</th><th> Nombre</th><th> DNI</th><th> Email</th><th> Teléfono</th><th> Turno</th></tr>
			
<?php foreach($dadm as $fila){ ?>

				<tr class="cliente">
					<td><?php echo $fila["APELLIDOS"] ?></td>
					<td><?php echo $fila["NOMBRE"]?></td>
					<td><?php echo $fila["DNI"]?></td>
					<td><?php echo $fila["EMAIL"]?></td>
					<td><?php echo $fila["TELEFONO"]?></td>
					<td><?php echo $fila["TURNO"]?></td>
									
				</tr>
		
<?php } ?>

			</table>
		</div>
<!-------------DIRECTOR ADMINISTRATIVO------------->
	<div class="tabla3">	
			<table id="director_administrativo" name="director_administrativo">
				<h2>Directores administrativos</h2>
				<tr><th> Apellidos</th><th> Nombre</th><th> DNI</th><th> Email</th><th> Teléfono</th><th> Turno</th></tr>
			
<?php foreach($drest as $fila){ ?>

				<tr class="cliente">
					<td><?php echo $fila["APELLIDOS"] ?></td>
					<td><?php echo $fila["NOMBRE"]?></td>
					<td><?php echo $fila["DNI"]?></td>
					<td><?php echo $fila["EMAIL"]?></td>
					<td><?php echo $fila["TELEFONO"]?></td>
					<td><?php echo $fila["TURNO"]?></td>
								
				</tr>
		
<?php } ?>

			</table>
		</div>
<!-------------DIRECTOR MARKETING------------->		
		<div class="tabla4">
			<table id="director_marketing" name="director_marketing">
				<h2>Directores de marketing</h2>
				<tr><th> Apellidos</th><th> Nombre</th><th> DNI</th><th> Email</th><th> Teléfono</th><th> Turno</th></tr>
			
<?php foreach($dmark as $fila){ ?>

				<tr class="cliente">
					<td><?php echo $fila["APELLIDOS"] ?></td>
					<td><?php echo $fila["NOMBRE"]?></td>
					<td><?php echo $fila["DNI"]?></td>
					<td><?php echo $fila["EMAIL"]?></td>
					<td><?php echo $fila["TELEFONO"]?></td>
					<td><?php echo $fila["TURNO"]?></td>
							
				</tr>
		
<?php } ?>

			</table>
		</div>
<!-------------DIRECTOR RESTAURACION------------->		
		<div class="tabla5">
			<table id="director_restauracion" name="director_restauracion">
				<h2>Directores de restauracion</h2>
				<tr><th> Apellidos</th><th> Nombre</th><th> DNI</th><th> Email</th><th> Teléfono</th><th> Turno</th></tr>
			
<?php foreach($dhabit as $fila){ ?>

				<tr class="cliente">
					<td><?php echo $fila["APELLIDOS"] ?></td>
					<td><?php echo $fila["NOMBRE"]?></td>
					<td><?php echo $fila["DNI"]?></td>
					<td><?php echo $fila["EMAIL"]?></td>
					<td><?php echo $fila["TELEFONO"]?></td>
					<td><?php echo $fila["TURNO"]?></td>
								
				</tr>
		
<?php } ?>

			</table>
		</div>
<!-------------CAMAREROS------------->	
		<div class="tabla6">	
			<table id="camareros" name="camareros">
			<a name="añadirCamarero"></a>
				<h2>Camareros</h2>
<!-- MOSTRAR ERRORES -->
			  	<h3><?php	if (isset($errores) && count($errores)>0) { 
				    echo "<div id=\"div_errores\" class=\"error\">";
					echo "<h4> Errores en el formulario:</h4>";
   					foreach($errores as $error) echo $error; 
   					echo "</div>";
  				}?></h3>

			
				<tr><th> Apellidos</th><th> Nombre</th><th> DNI</th><th> Email</th><th> Teléfono</th><th> Turno</th></tr>
			
<?php foreach($camareros as $fila){ ?>

				<tr class="cliente">
					<td><?php echo $fila["APELLIDOS"] ?></td>
					<td><?php echo $fila["NOMBRE"]?></td>
					<td><?php echo $fila["DNI"]?></td>
					<td><?php echo $fila["EMAIL"]?></td>
					<td><?php echo $fila["TELEFONO"]?></td>
					<td><?php echo $fila["TURNO"]?></td>		
					<td id="filaBotones">		
						<form id="formulario" method="post" action="controlador_empleados.php" > 		
							<input id="apellidos" name="apellidos"
								type="hidden" value="<?php echo $fila["APELLIDOS"]; ?>"/>
							<input id="nombre" name="nombre"
								type="hidden" value="<?php echo $fila["NOMBRE"]; ?>"/>
							<input id="dni" name="dni"
								type="hidden" value="<?php echo $fila["DNI"]; ?>"/>
							<input id="email" name="email"
								type="hidden" value="<?php echo $fila["EMAIL"]; ?>"/>
							<input id="telefono" name="telefono"
								type="hidden" value="<?php echo $fila["TELEFONO"]; ?>"/>
							<input id="turno" name="turno"
								type="hidden" value="<?php echo $fila["TURNO"]; ?>"/>

							<?php if(isset($editar)){ ?>
								<button id="delete" name="eliminar" type="submit" class="editar_fila">
									<img id="editCamareros" src="imagenes/delete.png" class="editar_fila" alt="Añadir cliente">
								</button>
							<?php } else { ?>
								<button id="edit" name="editar" type="submit" class="editar_fila">
									<img id="editCamareros" src="imagenes/edit.png" class="editar_fila" alt="Añadir cliente">
								</button>
								<button id="delete" name="eliminar" type="submit" class="editar_fila">
									<img id="editCamareros" src="imagenes/delete.png" class="editar_fila" alt="Añadir cliente">
								</button>
						</form>		
					</td>				
							<?php } ?>

					
				</tr>


<?php } ?>
			</table>
		
			<form id="formulario" method="post" action="controlador_empleados.php" onsubmit="return validateForm()">
				
<?php if (isset($boton)) { ?>	
			<fieldset id="tablaAddCamareros">
				<legend>Añadir camarero</legend>
					<!-- Crea los datos de los camareros -->
					<h3><label for="dni">DNI: </label>
						<input id="dni" name="dni"/></h3>
					<h3><label for="nombre">Nombre: </label>
						<input id="nombre" name="nombre" type="text" 
						 ></h3> 
					<h3><label for="apellidos">Apellidos: </label>
						<input id="apellidos" name="apellidos" type="text" 
						 /></h3> 
					<h3><label for="email">Email: </label>
						<input id="email" name="email" type="email" 
						/></h3> 	
					<h3><label for="telefono">Teléfono: </label>
						<input id="telefono" name="telefono" 
						 /></h3> 
					<h3><label for="turno">Turno: </label>
						<select id="turno" name="turno" required></h3>
							<option value="mañana">Mañana</option>
							<option value="tarde">Tarde</option>
							<option value="diurno">Diurno</option>
							<option value="nocturno">Nocturno</option>
						</select>
			

<!-------  BOTÓN AÑADIR CAMARERO  ------->
	<button id="guardar" name="guardar" type="submit" class="editar_fila">
		<img id="guardarCamareros" src="imagenes/guardar.png" class="editar_fila" alt="Guardar modificación">
	</button>
	</fieldset>
<?php } else if(isset($editar)) {?>	
	<fieldset id="tablaEditCamareros">
				<legend>Editar camarero</legend>
	<form action="controlador_empleados.php" method="post">
	<input id="dni" name="dni" type="hidden" value="<?php echo $empleado["dni"]; ?>"/>
	<input id="email" name="email" type="email" value="<?php echo $empleado["email"]; ?>"/>
	<input id="telefono" name="telefono" type="tel" value="<?php echo $empleado["telefono"]; ?>"/>
	<label for="turno">Turno: </label>
		<select id="turno" name="turno" required></h3>
			<option value="mañana">Mañana</option>
			<option value="tarde">Tarde</option>
			<option value="diurno">Diurno</option>
			<option value="nocturno">Nocturno</option>
		</select>
		
	<button id="guardar" name="guardarEdit" type="submit" class="editar_fila">
		<img id="guardarCamareros" src="imagenes/guardar.png" class="editar_fila" alt="Guardar modificación">
	</button>

	</form>
	</fieldset>
<?php } else { ?>
	<button id="add" name="añadir" type="submit" class="editar_fila">
		<img id="addCamareros" src="imagenes/add.png" class="editar_fila" alt="Añadir cliente">
	</button>
<?php }?>
	</form>

</div>


<!-------------CAMAREROS DE LIMPIEZA------------->	
	<div class="tabla7">	
		<table id="camareros_limpieza" name="camareros_limpieza">
			<a name="añadirCamareroLimpieza"></a>
			<h2>Camareros de limpieza</h2>
			<tr><th> Apellidos</th><th> Nombre</th><th> DNI</th><th> Email</th><th> Teléfono</th><th> Turno</th></tr>
			
<?php foreach($cdelimpieza as $fila){ ?>

				<tr class="cliente">
					<td><?php echo $fila["APELLIDOS"] ?></td>
					<td><?php echo $fila["NOMBRE"]?></td>
					<td><?php echo $fila["DNI"]?></td>
					<td><?php echo $fila["EMAIL"]?></td>
					<td><?php echo $fila["TELEFONO"]?></td>
					<td><?php echo $fila["TURNO"]?></td>	
					<td id="filaBotones">		
						<form id="formulario" method="post" action="controlador_limpiadores.php" >		
							<input id="apellidos" name="apellidos"
								type="hidden" value="<?php echo $fila["APELLIDOS"]; ?>"/>
							<input id="nombre" name="nombre"
								type="hidden" value="<?php echo $fila["NOMBRE"]; ?>"/>
							<input id="dni" name="dni"
								type="hidden" value="<?php echo $fila["DNI"]; ?>"/>
							<input id="email" name="email"
								type="hidden" value="<?php echo $fila["EMAIL"]; ?>"/>
							<input id="telefono" name="telefono"
								type="hidden" value="<?php echo $fila["TELEFONO"]; ?>"/>
							<input id="turno" name="turno"
								type="hidden" value="<?php echo $fila["TURNO"]; ?>"/>

							<?php if(isset($editar1)){ ?>
								<button id="delete" name="eliminar1" type="submit" class="editar_fila">
									<img id="editCamareros" src="imagenes/delete.png" class="editar_fila" alt="Añadir cliente">
								</button>
							<?php } else { ?>
								<button id="edit" name="editar1" type="submit" class="editar_fila">
									<img id="editCamareros" src="imagenes/edit.png" class="editar_fila" alt="Añadir cliente">
								</button>
								<button id="delete" name="eliminar1" type="submit" class="editar_fila">
									<img id="editCamareros" src="imagenes/delete.png" class="editar_fila" alt="Añadir cliente">
								</button>
						</form>		
					</td>				
							<?php } ?>			
				</tr>
				
<?php } ?>

		</table>
		
		<form id="formulario" method="post" action="controlador_limpiadores.php" onsubmit="return validateForm()">
			
<?php if (isset($boton1)) { ?>	
			<fieldset id="tablaAddCamareros">
				<legend>Añadir camarero de Limpieza</legend>
					<!-- Crea los datos de los camareros -->
					<h3><label for="dni">DNI: </label>
						<input id="dni" name="dni"  type="text" pattern="^[0-9]{8}[A-Z]"
						required /></h3>
					<h3><label for="nombre">Nombre: </label>
						<input id="nombre" name="nombre" type="text" 
						required ></h3> 
					<h3><label for="apellidos">Apellidos: </label>
						<input id="apellidos" name="apellidos" type="text" 
						required /></h3> 
					<h3><label for="email">Email: </label>
						<input id="email" name="email" type="email" 
						required /></h3> 	
					<h3><label for="telefono">Teléfono: </label>
						<input id="telefono" name="telefono" pattern="^[0-9]{9}"type="tel" 
						required /></h3> 
					<h3><label for="turno">Turno: </label>
						<select id="turno" name="turno" required></h3>
							<option value="mañana">Mañana</option>
							<option value="tarde">Tarde</option>
							<option value="diurno">Diurno</option>
							<option value="nocturno">Nocturno</option>
						</select>
			</fieldset>

<!-------  BOTÓN AÑADIR CAMARERO  ------->
<button id="guardar" name="guardar1" type="submit" class="editar_fila">
	<img id="guardarCamareros" src="imagenes/guardar.png" class="editar_fila" alt="Guardar modificación">
</button>

<?php } else if(isset($editar1)) {?>	
<fieldset id="tablaEditCamarerosLimp">
				<legend>Editar camarero de Limpieza</legend>
<form action="controlador_limpiadores.php" method="post">
<input id="dni" name="dni" type="hidden" value="<?php echo $empleado["dni"]; ?>"/>
<input id="email" name="email" type="email" value="<?php echo $empleado["email"]; ?>"/>
<input id="telefono" name="telefono" type="tel" value="<?php echo $empleado["telefono"]; ?>"/>
<label for="turno">Turno: </label>
	<select id="turno" name="turno" required></h3>
		<option value="mañana">Mañana</option>
		<option value="tarde">Tarde</option>
		<option value="diurno">Diurno</option>
		<option value="nocturno">Nocturno</option>
	</select>
	
<button id="guardar" name="guardarEdit1" type="submit" class="editar_fila">
	<img id="guardarCamareros" src="imagenes/guardar.png" class="editar_fila" alt="Guardar modificación">
</button>

</form>
</fieldset>
<?php } else { ?>
<button id="add" name="añadir1" type="submit" class="editar_fila">
	<img id="addCamareros" src="imagenes/add.png" class="editar_fila" alt="Añadir cliente">
</button>
<?php }?>
</form>
	</div>
		</main>
	</section>
	</div>
</body>
</html>

