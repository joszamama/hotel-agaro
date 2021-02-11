<?php
	session_start();
	
	require_once("gestionBD.php");
	require_once("gestionarEmpresas.php");
	
	
	// Comprobar que hemos llegado a esta página porque se ha completado el inicio de sesión
		if(!isset($_SESSION["login"])){
			header("Location: hotel.php#paginaFormulario");
		} else {
			$conexion = crearConexionBD();
			$empresas = consultarEmpresas($conexion);
			$as = consultarEmpresas($conexion);
			cerrarConexionBD($conexion);
		}
	
//Para guardar el boton de añadir, y borrarla de la variable $_SESSION;
	if (isset($_SESSION["añadir"]))
		$boton = $_SESSION["añadir"];
	unset($_SESSION["añadir"]);
	
	
	if(isset($_SESSION["empresa"]))
		$empresa = $_SESSION["empresa"];
	unset($_SESSION["empresa"]);
		
	
// Si en la sesión hay errores, los guardamos en una variable local
if (isset($_SESSION["errores"]))
	$errores = $_SESSION["errores"];

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Empresas</title>
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
					<li><a href="EmpleadosPrivado.php" >Empleados</a></li>
					<li><a href="HabitacionesPrivado.php" >Habitaciones</a></li>
					<li><a href="ClientesPrivado.php">Clientes</a></li>
					<li><a href="PrivadoReservas.php">Reservas</a></li>
					<li><a href="PrivadoProductos.php">Productos</a></li>
					<li><a href="PrivadoEmpresas.php" style="background-color:#af8d2a">Empresas</a></li>
					<li><a href="EventosPrivado.php">Eventos</a></li>
					<li><a href="BicisPrivado.php">Bicicletas</a></li>
					<li><a href="RestaurantePrivado.php">Restauración</a></li>
				</ul>
			</nav>
	</div>
	</div>
	
	
	<section>
		<main>
		
<!--EMPRESAS ACTIVAS------------------------------------------->	
<div class="tabla1">
			<table id="camareros" name="camareros">
			<a name="añadirEmpresa"></a>
				<h2>Empresas</h2>
<!-- MOSTRAR ERRORES ------------------------------------------>
			  	<h3><?php	if (isset($errores) && count($errores)>0) { 
				    echo "<div id=\"div_errores\" class=\"error\">";
					echo "<h4> Errores en el formulario:</h4>";
   					foreach($errores as $error) echo $error; 
   					echo "</div>";
  				}?></h3>

			
				<tr><th> CIF</th><th> Nombre</th><th> Direccion</th><th> Email</th><th> Teléfono</th><th> Subcontratada</th><th> Organizadora</th><th> Activa</th><th> Supervisor</th></tr>
			
<?php foreach($empresas as $fila){ 
	if($fila["ACTIVA"] == 'Si') {?>
			
				<tr class="cliente">
					<td><?php echo $fila["CIF"] ?></td>
					<td><?php echo $fila["NOMBRE"]?></td>
					<td><?php echo $fila["DIRECCION"]?></td>
					<td><?php echo $fila["EMAIL"]?></td>
					<td><?php echo $fila["TELEFONO"]?></td>
					<td><?php echo $fila["SUBCONTRATADA"]?></td>		
					<td><?php echo $fila["ORGANIZADORA"]?></td>
					<td><?php echo $fila["ACTIVA"]?></td>
					<td><?php echo $fila["SUPERVISOR"]?></td>									
					<td id="filaBotones">		
						<!-- PARA PODER BORRAR HACE FALTA EL CIF-->
						<form method="post" action="controlador_empresas.php">
							<input name="cif" type="hidden" value="<?php echo $fila["CIF"]; ?>"/>
							<button id="delete" name="eliminar" type="submit" class="editar_fila">
								<img id="editCamareros" src="imagenes/delete.png" class="editar_fila" alt="Añadir cliente">
							</button>
						</form>		
					</td>								
				</tr>
<?php }} ?>
			</table>
		
			<form id="empresa" method="post" action="controlador_empresas.php" onsubmit="return validateEmpresa()">

<!-------------  DATOS AÑADIR EMPRESAS  --------------->				
<?php if (isset($boton)) { ?>	
			<fieldset id="tablaAddEmpresa">
				<legend>Añadir empresa</legend>
					<h3><label for="cif">CIF: </label>
						<input id="cif" name="cif"  type="text" pattern="^([ABCDEFGHJKLMNPQRSUVW])(\d{7})([0-9A-J])"
						required /></h3>
					<h3><label for="nombre">Nombre: </label>
						<input id="nombre" name="nombre" type="text" 
						required /></h3> 
					<h3><label for="direccion">Dirección: </label>
						<input id="direccion" name="direccion" type="text" required/></h3> 
					<h3><label for="email">Email: </label>
						<input id="email" name="email" type="email" 
						required /></h3> 	
					<h3><label for="telefono">Teléfono: </label>
						<input id="telefono" name="telefono" pattern="^[0-9]{9}"type="tel" 
						required /></h3> 
					<h3><label for="subcontratada">Subcontratada: </label>
						<select id="subcontratada" name="subcontratada" required></h3>
							<option value="Si">Sí</option>
							<option value="No">No</option>
						</select>
					<h3><label for="organizadora">Organizadora: </label>
						<select id="organizadora" name="organizadora" required></h3>
							<option value="Si">Sí</option>
							<option value="No">No</option>
						</select>
			</fieldset>

<!-------------  BOTÓN GUARDAR EMPRESAS  --------------->
	<button id="guardar" name="guardar" type="submit" class="editar_fila">
		<img id="guardarCamareros" src="imagenes/guardar.png" class="editar_fila" alt="Guardar modificación">
	</button>
<?php } else {?>

<!-------------  BOTÓN AÑADIR EMPRESAS  --------------->
	<button id="add" name="añadir" type="submit" class="editar_fila">
		<img id="addCamareros" src="imagenes/add.png" class="editar_fila" alt="Añadir cliente">
	</button>
<?php } ?>
	</form>



</div>	

<!-- EMPRESAS NO ACTIVAS ---------------------->
	<div class="tabla2">
			<table id="camareros" name="camareros">
			<a name="añadirEmpresa"></a>
					<tr><th> CIF</th><th> Nombre</th><th> Direccion</th><th> Email</th><th> Teléfono</th><th> Subcontratada</th><th> Organizadora</th><th> Activa</th><th> Supervisor</th></tr>

<?php foreach($as as $fila){ 
	if($fila["ACTIVA"] == 'No') {?>
				<tr class="cliente">
					<td><?php echo $fila["CIF"] ?></td>
					<td><?php echo $fila["NOMBRE"]?></td>
					<td><?php echo $fila["DIRECCION"]?></td>
					<td><?php echo $fila["EMAIL"]?></td>
					<td><?php echo $fila["TELEFONO"]?></td>
					<td><?php echo $fila["SUBCONTRATADA"]?></td>		
					<td><?php echo $fila["ORGANIZADORA"]?></td>
					<td><?php echo $fila["ACTIVA"]?></td>
					<td><?php echo $fila["SUPERVISOR"]?></td>									
					<td id="filaBotones">		
						<form method="post" action="controlador_empresas.php">
							<input id="cif" name="cif" type="hidden" value="<?php echo $fila["CIF"]; ?>"/>
							<button id="delete" name="activar" type="submit" class="editar_fila">
								<img id="editCamareros" src="imagenes/activar.png" width="1%" class="editar_fila" alt="Añadir cliente">
							</button>
						</form>		
					</td>								
				</tr>
<?php }} ?>
			</table>
</div>
		</main>
	</section>
</body>
</html>

