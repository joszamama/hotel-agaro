<?php
	session_start();
	
	require_once("gestionBD.php");
	require_once("gestionarProductos.php");
	
	
	// Comprobar que hemos llegado a esta página porque se ha completado el inicio de sesión
		if(!isset($_SESSION["login"])){
			header("Location: hotel.php#paginaFormulario");
		} else {
			$conexion = crearConexionBD();
			$alimentos = consultarAlimentos($conexion);
			$bebidas = consultarBebidas($conexion);
			$mantenimiento = consultarMantenimiento($conexion);
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

	
	if(isset($_SESSION["producto"]))
		$producto = $_SESSION["producto"];
	unset($_SESSION["producto"]);
		
	
// Si en la sesión hay errores, los guardamos en una variable local
if (isset($_SESSION["errores"]))
	$errores = $_SESSION["errores"];

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Productos</title>
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
					<li><a href="PrivadoProductos.php" style="background-color:#af8d2a">Productos</a></li>
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
		
<!-------------PRODUCTO------------->	
		<div class="tabla1">	
			<table id="camareros" name="camareros">
			<a name="añadirCamarero"></a>
				<h2>Alimentos</h2>
<!-- MOSTRAR ERRORES -->
			  	<h3><?php	if (isset($errores) && count($errores)>0) { 
				    echo "<div id=\"div_errores\" class=\"error\">";
					echo "<h4> Errores en el formulario:</h4>";
   					foreach($errores as $error) echo $error; 
   					echo "</div>";
  				}?></h3>

			
				<tr><th> Nombre</th><th> Umbral</th><th> Cantidad</th><th> CIF Proveedor</th><th> ID</th></tr>
			
<?php foreach($alimentos as $fila){ ?>

				<tr class="cliente">
					<td><?php echo $fila["NOMBRE"] ?></td>
					<td><?php echo $fila["UMBRAL"]?></td>
					<td><?php echo $fila["CANTIDAD"]?></td>
					<td><?php echo $fila["CIFPROVEEDOR"]?></td>
					<td><?php echo $fila["ID_PRODUCTO"]?></td>


					<td id="filaBotones">		
						<form id="formularioEditCamareros" method="post" action="controlador_productos.php">		
							<input id="NOMBRE" name="NOMBRE"
								type="hidden" value="<?php echo $fila["NOMBRE"]; ?>"/>
							<input id="UMBRAL" name="UMBRAL"
								type="hidden" value="<?php echo $fila["UMBRAL"]; ?>"/>
							<input id="CANTIDAD" name="CANTIDAD"
								type="hidden" value="<?php echo $fila["CANTIDAD"]; ?>"/>
							<input id="CIFPROVEEDOR" name="CIFPROVEEDOR"
								type="hidden" value="<?php echo $fila["CIFPROVEEDOR"]; ?>"/>
							<input id="ID_PRODUCTO" name="ID_PRODUCTO"
								type="hidden" value="<?php echo $fila["ID_PRODUCTO"]; ?>"/>

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
		
			<form id="formularioAddCamareros" method="post" action="controlador_productos.php">
				
<?php if (isset($boton)) { ?>	
			<fieldset id="tablaAddCamareros">
				<legend>Añadir producto</legend>
					<!-- Crea los datos de los camareros -->
					<h3><label for="NOMBRE">NOMBRE: </label>
						<input id="NOMBRE" name="NOMBRE" type="text" required/></h3> 
					<h3><label for="UMBRAL">UMBRAL: </label>
						<input id="UMBRAL" name="UMBRAL" type="text" required/></h3> 
					<h3><label for="CANTIDAD">CANTIDAD: </label>
						<input id="CANTIDAD" name="CANTIDAD" type="text" required/></h3> 	
					<h3><label for="CIFPPROVEEDOR">CIF: </label>
						<input id="CIFPROVEEDOR" name="CIFPROVEEDOR" type="text" required/></h3> 


<!-------  BOTÓN AÑADIR CAMARERO  ------->
	<button id="guardar" name="guardar" type="submit" class="editar_fila">
		<img id="guardarCamareros" src="imagenes/guardar.png" class="editar_fila" alt="Guardar modificación">
	</button>
	</fieldset>
<?php } else if(isset($editar)) {?>	
	<fieldset id="tablaEditCamareros">
				<legend>Editar alimento</legend>
	<form action="controlador_productos.php" method="post">
	<input id="ID_PRODUCTO" name="ID_PRODUCTO" type="hidden" value="<?php echo $producto["ID_PRODUCTO"]; ?>"/>
	<input id="UMBRAL" name="UMBRAL" type="text" value="<?php echo $producto["UMBRAL"]; ?>"/>
	<input id="CANTIDAD" name="CANTIDAD" type="text" value="<?php echo $producto["CANTIDAD"]; ?>"/>
		
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


	</div>
		</main>
	</section>
	</div>
</body>
</html>

