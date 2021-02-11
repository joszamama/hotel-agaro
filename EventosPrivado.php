<?php

	session_start();
	
	require_once("gestionBD.php");
	require_once("gestionarEventos.php");
	
	if(!isset($_SESSION["login"])){
			header("Location: hotel.php#paginaFormulario");
		} else {
			$conexion = crearConexionBD();
			$filas = consultarEventos($conexion);
			cerrarConexionBD($conexion);
		}
		
//Para guardar el boton de añadir, y borrarla de la variable $_SESSION;
if (isset($_SESSION["añadir"]))
$boton = $_SESSION["añadir"];
unset($_SESSION["añadir"]);

if (isset($_SESSION["añadir1"]))
$boton1 = $_SESSION["añadir1"];
unset($_SESSION["añadir1"]);

if (isset($_SESSION["editar1"]))
$editar1 = $_SESSION["editar1"];
unset($_SESSION["editar1"]);


if(isset($_SESSION["evento"]))
$evento = $_SESSION["evento"];
unset($_SESSION["evento"]);


// Si en la sesión hay errores, los guardamos en una variable local
if (isset($_SESSION["errores"]))
$errores = $_SESSION["errores"];

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Eventos</title>
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
					<li><a href="EventosPrivado.php" style="background-color:#af8d2a">Eventos</a></li>
					<li><a href="BicisPrivado.php">Bicicletas</a></li>
					<li><a href="RestaurantePrivado.php">Restauración</a></li>
				</ul>
			</nav>
	</div>
	</div>
	<main>
	<div class="tabla11">	
		<table id="listado_clientes" name="Clientes">
		<a name="añadirEvento"></a>
			<h2>Eventos</h2>

			<!-- MOSTRAR ERRORES -->
			<h3><?php	if (isset($errores) && count($errores)>0) { 
				    echo "<div id=\"div_errores\" class=\"error\">";
					echo "<h4> Errores en el formulario:</h4>";
   					foreach($errores as $error) echo $error; 
   					echo "</div>";
  				}?></h3>
		
			<tr><th> Nombre</th><th> Fecha</th><th> Hora de Inicio</th><th> Hora de Fin</th><th> Lugar</th><th> Numero de Asistentes</th>
            <th> Tipo</th><th> CIF</th></tr>
				
	<?php
	foreach($filas as $fila){
	?>
	
	<tr class= "restaurante">
		<td><?php echo $fila["NOMBRE"] ?></td>
		<td><?php echo $fila["FECHA"] ?></td>
		<td><?php echo $fila["HORAINICIO"] ?></td>
		<td><?php echo $fila["HORAFIN"] ?></td>
        <td><?php echo $fila["LUGAR"] ?></td>
        <td><?php echo $fila["NUMEROASISTENTES"] ?></td>
        <td><?php echo $fila["TIPO"] ?></td>
        <td><?php echo $fila["CIF"] ?></td>
		<td id="filaBotones">		
						<form id="formularioEditCamareros" method="post" action="controlador_eventos.php">
						<input id="id" name="id"
								type="hidden" value="<?php echo $fila["ID_EVENTOS"]; ?>"/>		
							<input id="nombre" name="nombre"
								type="hidden" value="<?php echo $fila["NOMBRE"]; ?>"/>
							<input id="fecha" name="fecha"
								type="hidden" value="<?php echo $fila["FECHA"]; ?>"/>
							<input id="horaInicio" name="horaInicio"
								type="hidden" value="<?php echo $fila["HORAINICIO"]; ?>"/>
							<input id="horaFin" name="horaFin"
								type="hidden" value="<?php echo $fila["HORAFIN"]; ?>"/>
							<input id="lugar" name="lugar"
								type="hidden" value="<?php echo $fila["LUGAR"]; ?>"/>
							<input id="numeroAsistentes" name="numeroAsistentes"
								type="hidden" value="<?php echo $fila["NUMEROASISTENTES"]; ?>"/>
							<input id="tipo" name="tipo"
								type="hidden" value="<?php echo $fila["TIPO"]; ?>"/>
							<input id="cif" name="cif"
								type="hidden" value="<?php echo $fila["CIF"]; ?>"/>

							<?php if(isset($editar1)){ ?>
								<button id="delete" name="eliminar1" type="submit" class="editar_fila">
									<img id="editCamareros" src="imagenes/delete.png" class="editar_fila" alt="Añadir cliente">
								</button>
							<?php } else { ?>
								<button id="delete" name="eliminar1" type="submit" class="editar_fila">
									<img id="editCamareros" src="imagenes/delete.png" class="editar_fila" alt="Añadir cliente">
								</button>
						</form>		
					</td>				
							<?php } ?>			
				</tr>
				
<?php } ?>

		</table>
		
		<form id="formularioAddCamareros" method="post" action="controlador_eventos.php">
			
<?php if (isset($boton1)) { ?>	
			<fieldset id="tablaAddCamareros">
				<legend>Añadir Evento</legend>
					<!-- Crea los datos de los eventos -->
					<h3><label for="nombre">Nombre: </label>
						<input id="nombre" name="nombre" type="text" required/></h3>
					<h3><label for="fecha">Fecha: </label>
						<input id="fecha" name="fecha" type="date" min="<?php echo date("Y-m-d");?>" required/></h3> 
					<h3><label for="horaInicio">Hora de Inicio: </label>
						<input id="horaInicio" name="horaInicio" type="number" required/></h3> 
					<h3><label for="horaFin">Hora de Fin: </label>
						<input id="horaFin" name="horaFin" type="number" required/></h3> 	
					<h3><label for="lugar">Lugar: </label>
						<input id="lugar" name="lugar" type="text" required/></h3> 	
					<h3><label for="numeroAsistentes">Numero de Asistentes: </label>
						<input id="numeroAsistentes" name="numeroAsistentes" type="number" required/></h3> 
					<h3><label for="tipo">Tipo: </label>
						<select id="tipo" name="tipo" required></h3> 
							<option value="conferencia">Conferencia</option>
							<option value="grupoMusical">Grupo Musical</option>
							<option value="mago">Mago</option>						
						</select>
					<h3><label for="cif">Cif: </label>
						<input id="cif" name="cif" pattern="^[0-9]{9}" type="text" required/></h3> 
			</fieldset>

<!-------  BOTÓN AÑADIR EVENTO  ------->
<button id="guardar" name="guardar1" type="submit" class="editar_fila">
	<img id="guardarCamareros" src="imagenes/guardar.png" class="editar_fila" alt="Guardar modificación">
</button>

<?php } else if(isset($editar1)) {?>	
<fieldset id="tablaEditCamarerosLimp">
				<legend>Editar Evento</legend>
<form action="controlador_eventos.php" method="post">
<input id="id" name="id" type="hidden" value="<?php echo $evento["ID_EVENTOS"]; ?>"/>
<input id="fecha" name="fecha" type="date" value="<?php echo $evento["FECHA"]; ?>"/>
<input id="horainicio" name="horainicio" type="number" value="<?php echo $evento["HORAINICIO"]; ?>"/>
<input id="horaFin" name="horaFin" type="nuumber" value="<?php echo $evento["HORAFIN"]; ?>"/>
<label for="tipo">Tipo: </label>
	<select id="tipo" name="tipo" required></h3>
		<option value="conferencia">Conferencia</option>
		<option value="grupoMusical">Grupo Musical</option>
		<option value="mago">Mago</option>
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