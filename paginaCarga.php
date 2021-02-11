<?php

if(!isset($_REQUEST["confirmPago"])){
	header("Location: reserva_fecha.php");
}

?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="description" content="Página web del Hotel Agaró de Chipiona">
		<link rel="icon" href="imagenes/favicon_agaro.ico">
		<title>Procesando su pago</title>
		<link rel="stylesheet" href="css/paginaCarga.css">
		<meta http-equiv="refresh" content="5;URL=accion_add_cliente.php">
		
	</head>

<body>
	<div class="container">	
		<div class="carga">
		<div class="loader-container">
			<div class="loader"></div>
			<div class="loader2"></div>	
		</div>	</div>	
	<div class="texto">
			<h1>Estamos procesando su pago. Por favor, espere...</h1>
		</div>
	</div>	
</body>
</html>
