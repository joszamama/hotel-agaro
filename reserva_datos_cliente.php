<?php
	session_start();	
	require_once("gestionBD.php");
	require_once("gestionarHabitaciones.php");


	if(isset($_REQUEST["datosIncorrectos"]) || isset($_SESSION["confirmar"])){ //Si los datos introducidos son incorrectos, aparecen los campos ya completos
		unset($_SESSION["confirmar"]);
		$pago = $_SESSION["pago"];		
		$_SESSION["pago"] = $pago;
		
	} else if(!isset($_REQUEST["continuar"])) { //Si no se ha pasado primero por el formulario anterior no se puede acceder a esta pagina
	
		header("Location: reserva_fecha.php");
	
	} else { //Si es la primera vez que accede al formulario
	
		unset($_SESSION["confirmar"]);
	
		$pago["fechaEntrada"] = $_REQUEST["fechaEntrada"];
		$pago["fechaSalida"] = $_REQUEST["fechaSalida"];
		$pago["tipoHabitacion"] = $_REQUEST["tipoHabitacion"];
		$pago["precio"] = $_REQUEST["precio"];	
		$pago["continuar"] = $_REQUEST["continuar"];

	//Para mostrar el formulario vacío
		$pago["dni"] = "";	
		$pago["nombre"] = "";	
		$pago["apellidos"] = "";	
		$pago["email"] = "";	
		$pago["telefono"] = "";	
		$pago["especificaciones"] = "";	
		
		$_SESSION["pago"] = $pago;
	}

?>

<!doctype html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="description" content="Página web del Hotel Agaró de Chipiona">
		<link rel="icon" href="imagenes/favicon_agaro.ico">
		<title>Habitaciones</title>
		<link rel="stylesheet" href="estilo_web.css">
		<script src="js/validacion.js" type="text/javascript"></script>
	</head>
	
	<body id="cuerpo">
		<header id="cabecera-habitaciones">
		
			<a href="hotel.php"><img id="imagenLogo" src="imagenes/logoAgaro.jpg" alt="Logo del Hotel"/></a> 
			
			<nav id="navegacion">
				<ul>
					<li><a href="hotel.php">Hotel</a></li>
					<li><a href="habitaciones.html" style="background-color:#52b6de">Habitaciones</a></li>
					<li><a href="servicios.html">Servicios</a></li>
					<li><a href="restaurante.html">Restaurante</a></li>
					<li><a href="eventos.html">Eventos</a></li>
				</ul>
			</nav>	
		
		</header>
		<section>
			<header id="titulopag">
					<h1>Finalizar Reserva</h1>
			</header>
			<form id="formulario" method="post" action="reserva_confirmar.php" onsubmit="return validateForm();">
				<fieldset>
					<legend>
                        Especifique sus datos:
					</legend>
					<h4>Nombre:<input id="nombre" name="nombre" type="text" value="<?php echo $pago["nombre"]?>" 
						required ></h4>
                    <h4>Apellidos:<input id="apellidos" name="apellidos" value="<?php echo $pago["apellidos"]?>" type="text" 
                    	required ></h4>
                    <h4>DNI:<input id="dni" name="dni" value="<?php echo $pago["dni"]?>" type="text" placeholder="12345678X" pattern="^[0-9]{8}[A-Z]"  
                    	required > </h4>
                    <h4>Email:<input id="email" name="email" value="<?php echo $pago["email"]?>" type="email" 
                    	required ></h4>
                    <h4>Teléfono:<input id="telefono" name="telefono" value="<?php echo $pago["telefono"]?>" type="tel" pattern="^[0-9]{9}" 
                    	required ></h4>
                    <h4>Especificaciones:<input id="especificaciones" value="<?php echo $pago["especificaciones"]?>" name="especificaciones" type="text"></h4>
					<input name="tipoHabitacion" value="<?php echo $pago["tipoHabitacion"]?>" type="hidden">
					<input name="precio" value="<?php echo $pago["precio"]?>" type="hidden">
					<input name="fechaSalida" value="<?php echo $pago["fechaSalida"]?>" type="hidden">
					<input name="fechaEntrada" value="<?php echo $pago["fechaEntrada"]?>" type="hidden">		
					<p>Precio: <?php echo $pago["precio"]?></p>
				
				
					<?php 
					$conexion = crearConexionBD();   // CREAR LA CONEXIÓN A LA BASE DE DATOS
						
					$habitacionesReservadas = consultarHabitacionesReservadas($conexion);
					cerrarConexionBD($conexion);
					$i = 1;			
					foreach ($habitacionesReservadas as $habitacion) {
						if($i > 0){?>
					<input id="numero" name="numero" type="hidden" value="<?php echo $habitacion["NUMERO"]; ?>"/>
					<?php 
						$i = 0;	
						}
					}
					?>
				</fieldset>

				
				<input type="submit" value="Continuar" name="confirmar"/>
			</form>
		</section>
	
		<footer id="pieDePagina">
			<h1>Política de privacidad</h1>
	
		</footer>
	</body>
</html>
