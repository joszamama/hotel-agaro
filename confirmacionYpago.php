<?php
	include("calculaPrecio.php");

	if(!isset($_REQUEST["d"])){
		header("location: pago.php");
	}
	foreach($_REQUEST as $elem){
		if(!isset($elem)){
			header("location: pago.php");	
		}
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
            <fieldset>
				<legend>
					Datos del Usuario:
				</legend>
				<?php 
				echo "Nombre: " . $_POST["nombre"] . "<br>";
				echo "Apellidos: " . $_POST["apellidos"] . "<br>";
				echo "DNI: " . $_POST["dni"] . "<br>";
				echo "e-mail: " . $_POST["email"] . "<br>";
                echo "Teléfono: " . $_POST["telefono"] . "<br>";
                echo "Especificaciones: " . $_POST["especificaciones"] . "<br>";
				?>
            </fieldset>
            <!-- <fieldset>
                <legend>
					Resumen de la Reserva:
				</legend>
				<?php 
				echo "Tipo de Habitación: " . $_POST["tipoHabitacion"] . "<br>";
				$fechaDEentrada = date("d/m/Y", strtotime($_POST["fechaEntrada"]));
				$fechaDEsalida = date("d/m/Y", strtotime($_POST["fechaSalida"]));
				echo "Fecha de Entrada: " . $fechaDEentrada . "<br>";
				echo "Fecha de Salida: " . $fechaDEsalida . "<br>";
				echo "Precio Total de la Reserva: ";
				calculaPrecio($_POST["tipoHabitacion"]) . "<br>";
				?>
			</fieldset> -->
			<p>¿Son Correctos los Datos?</p>
			<form id="todoCorrecto" method="post" action="controlador_reservas.php">
				<input type="submit" value="Si "/>
			</form>
			<form id="noEsCorrecto" method="post" action="pago.php">
				<input type="submit" value="No"/>
			</form>

			
		</section>
	
	
		<footer id="pieDePagina">
			<h1>Política de privacidad</h1>
	
		</footer>
	</body>
</html>