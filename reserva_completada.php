<?php

session_start();

session_destroy();

?>

<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, 
			initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="description" content="Página web del Hotel Agaró de Chipiona">
    <link rel="stylesheet" href="css/habitaciones.css">
    <link rel="stylesheet" href="css/header.css">
	<meta http-equiv="refresh" content="3;URL=hotel.php">

    <title>Habitaciones</title>
</head>

<body>
    <div class="container">
        <div class="header" style="background-image: url(imagenes/cabhabitaciones.jpg)">

            <a href="hotel.php"><img class="imagenLogo" src="imagenes/logoAgaro.jpg" alt="Logo del Hotel" /></a>

            <nav class="navegacion">
                <ul>
                    <li><a href="hotel.php">Hotel</a></li>
                    <li><a href="habitaciones.html" style="background-color:#52b6de">Habitaciones</a></li>
                    <li><a href="servicios.html">Servicios</a></li>
                    <li><a href="restaurante.html">Restaurante</a></li>
                    <li><a href="eventos.html">Eventos</a></li>
                </ul>
            </nav>
        	<div class="tituloPag">
            	<h1>Reserva exitosa</h1>
           </div>

        </div>

        <div class="titulo">
            	<h3>Reserva completada con éxito, se le redirigirá a la página principal del hotel en 3 segundos.</h3>
        </div>

        <div class="cuerpo">
        	
        	
       	</div>
    </div>
</body>
</html>
