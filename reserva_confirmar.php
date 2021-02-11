<?php
	session_start();	

	if(!isset($_REQUEST["confirmar"])) {
		if(!isset($_SESSION["pago"])) {
			header("Location: reserva_fecha.php");
		} else {
			header("Location: reserva_datos_cliente.php");			
		}
	} else {
		$pago["fechaEntrada"] = $_REQUEST["fechaEntrada"];
		$pago["fechaSalida"] = $_REQUEST["fechaSalida"];
		$pago["tipoHabitacion"] = $_REQUEST["tipoHabitacion"];
		$pago["precio"] = $_REQUEST["precio"];	
		$pago["dni"] = $_REQUEST["dni"];	
		$pago["nombre"] = $_REQUEST["nombre"];	
		$pago["apellidos"] = $_REQUEST["apellidos"];	
		$pago["email"] = $_REQUEST["email"];	
		$pago["telefono"] = $_REQUEST["telefono"];	
		$pago["especificaciones"] = $_REQUEST["especificaciones"];	
		$pago["numero"] = $_REQUEST["numero"];	
		$_SESSION["confirmar"] = $_REQUEST["confirmar"];	
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
			<form id="pagoHabitacion" method="post" action="paginaCarga.php">
				<fieldset>
					<legend>
                        ¿Son correctos los datos?
					</legend>
					<h4>Nombre: <?php echo $pago["nombre"]?></h4>
                    <h4>Apellidos: <?php echo $pago["apellidos"]?></h4>
                    <h4>DNI: <?php echo $pago["dni"]?></h4>
                    <h4>Email: <?php echo $pago["email"]?></h4>
                    <h4>Teléfono: <?php echo $pago["telefono"]?></h4>
                    <h4>Fecha de entrada: <?php echo $pago["fechaEntrada"]?></h4>
                    <h4>Fecha de salida: <?php echo $pago["fechaSalida"]?></h4>
                    <h4>Tipo de habitación: <?php echo $pago["tipoHabitacion"]?></h4>
                    <h4>Precio: <?php echo $pago["precio"]?></h4>
                    <h4>N Habitacion: <?php echo $pago["numero"]?></h4>


				</fieldset>
				
				<input type="submit" value="Pagar" name="confirmPago"/>
			</form>

				<form action="reserva_datos_cliente.php" method="post">
				<input type="submit" value="No" name="datosIncorrectos"/>
				</form>
		</section>
	
	
		<footer id="pieDePagina">
			<h1>Política de privacidad</h1>
	
		</footer>
	</body>
</html>
