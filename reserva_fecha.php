<!doctype html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="description" content="Página web del Hotel Agaró de Chipiona">
		<link rel="icon" href="imagenes/favicon_agaro.ico">
		<title>Habitaciones</title>
		<link rel="stylesheet" href="estilo_web.css">
		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script>

$(function(){
	$("input[type=radio]").click(function(){
		calcular();
	}) 
})	
$(function(){
	$("input[type=submit]").click(function(){
		calcular();
	}) 
})	
$(function(){
	$("input[type=date]").click(function(){
		calcular();
		fechaCorregida();
	})
})	

function fechaCorregida(){
		document.getElementById("fechaEntrada").max = (document.getElementById("fechaSalida").value);
		document.getElementById("fechaSalida").min = (document.getElementById("fechaEntrada").value);
}

function calcular(){
	$precio = $("input[type=radio]:checked");
	$coste_total = 0;
	$entrada = new Date(document.getElementById("fechaEntrada").value).getTime();
	$salida = new Date(document.getElementById("fechaSalida").value).getTime();
		
	if($entrada > $salida){
		$d = new Date();
		$hola = 1;
		document.getElementById("fechaSalida").value = $d.getFullYear()+"-"+$d.getMonth()+"-"+$d.getDate();	
		
		alert("La fecha de entrada debe ser anterior a la fecha de salida.");
		
	} else{
		$resta = $salida - $entrada;
		$dias = Math.round($resta/ (1000*60*60*24));
		$coste_total = $precio.val()*$dias;
		
		$(".resultado").html($coste_total);
		document.getElementById("result").value= $coste_total;

	}
}

</script>

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
					<h1>Reserva de Habitaciones</h1>
			</header>
			<form id="pagoHabitacion" method="post" action="reserva_datos_cliente.php">
				<fieldset>
					<legend>
						Seleccione su Fecha de Estancia:
					</legend>
					<h4>Fecha de Entrada:</h4>
					<input id="fechaEntrada" name="fechaEntrada" type="date" min="<?php echo date("Y-m-d");?>" required>
					
					<h4>Fecha de Salida:</h4>
					<input id="fechaSalida" name="fechaSalida" type="date" min="<?php echo date("Y-m-d", strtotime("+1 day"));?>" required>

				</fieldset>
				<p></p>
				<fieldset>
					<legend>
						Seleccione Tipo de Habitación:
					</legend>
					<h4>Tipo de Habitación:</h4>

					<p><input value="45" type="radio" name="tipoHabitacion" class="tipoHabitacion">Habitación individual 45</p>
					<p><input value="60" type="radio" name="tipoHabitacion" class="tipoHabitacion">Habitación doble 60</p>
					<p><input value="70" type="radio" name="tipoHabitacion" class="tipoHabitacion">Habitación triple 70</p>
					<p><input value="85" type="radio" name="tipoHabitacion" class="tipoHabitacion">Habitación cuadruple 85</p>
					<p><input value="95" type="radio" name="tipoHabitacion" class="tipoHabitacion">Habitación conectada 95</p>
					<p><input value="120" type="radio" name="tipoHabitacion" class="tipoHabitacion">Habitación suite 120</p>

                    <input id="result" name="precio" type="hidden">
					
				</fieldset>
				<input type="submit" name="continuar" value="Continuar"/>
			</form>
		</section>

		<p class="resultado"></p>
	
	
		<footer id="pieDePagina">
			<h1>Política de privacidad</h1>
	
		</footer>

	</body>
</html>
