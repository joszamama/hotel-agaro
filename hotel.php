<?php
	session_start();
  	
  	include_once("gestionBD.php");
 	include_once("gestionarUsuarios.php");
	
		if (isset($_POST['cerrarSesion'])){
			session_destroy();
		}
	
	// SI HAY INFORMACIÓN EN $_POST ENTONCES ES QUE SE HA INTRODUCIDO EMAIL Y CONTRASEÑA
	if (isset($_POST['submit'])){
		$email= $_POST['email'];
		$contraseña = $_POST['contraseña'];

		$conexion = crearConexionBD(); 
		$num_usuarios = comprobarUsuario($conexion, $email, $contraseña); 
		cerrarConexionBD($conexion); 

		if ($num_usuarios == 0){ // SI NO EXISTE EL USUARIO Y CONTRASEÑA SE ASIGNA ADECUADAMENTE LA VARIABLE $login
			$login = "Error";
		 
		} else { // EN CASO CONTRARIO:		
			$_SESSION["login"] = $email; // -	SE ASIGNA EMAIL A LA VARIABLE DE SESION
			Header("Location: EmpleadosPrivado.php"); // - 	SE REDIRIGE A EMPLEADOSPRIVADO.PHP
		}	
	}

// FIN APARTADO 4.2

?>

<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="description" content="Página web del Hotel Agaró de Chipiona">
		<link rel="icon" href="imagenes/favicon_agaro.ico">
		<title>Hotel Agaró</title>
		<link rel="stylesheet" href="css/hotel.css">
		
	</head>
	
	<body>
		<div class="container">
		<div class="headerInicial">
			
		<div class="logoHotel">
			<a href="hotel.php"><img class="imagenLogo" src="imagenes/logoAgaro.jpg" alt="Logo del Hotel"/></a>
		</div>
		<div class="iniciarSesion">
			<a href="#paginaFormulario" id="abrirInicioDeSesion">Iniciar sesión</a>
		</div>
		<div id="paginaFormulario">
			<div id="formulario">
				
				<form id="formularioInicioDeSesion" action="hotel.php#paginaFormulario" method="post">
					<h2>Iniciar sesión</h2>
					<a href="#" id="cerrarInicioDeSesion">X</a>
                        <?php if (isset($login)) {
                                echo "<div id=\"error\">"; ?>
                          <p id="errorPass"><strong>El usuario o la contraseña son incorrectos</strong></p>
                      <?php     echo "</div>";
                       }?>
                  
					<label for="emailInicioSesion"><strong>Email: </strong></label>
					<input type="email" name="email" id="emailInicioSesion"
						placeholder="Email" required/>
			
					<label for="passInicioSesion"><strong>Contraseña: </strong></label>
					<input type="password" name="contraseña" id="passInicioSesion" 
						pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$"
						placeholder="Mínimo 8 caracteres entre letras mínusculas, mayúsculas y dígitos" required/>
					
				 	<input id="botonIniciarSesionDentroDelFormulario" type="submit" name="submit" value="Iniciar sesión"/>
				</form>
			</div>
		</div>
		<div class="navegacionHotel">
			<nav class="navegacion">
				<ul>
					<li><a href="hotel.php" style="background-color:#52b6de">Hotel</a></li>
					<li><a href="habitaciones.html">Habitaciones</a></li>
					<li><a href="servicios.html">Servicios</a></li>
					<li><a href="restaurante.html">Restaurante</a></li>
					<li><a href="eventos.html">Eventos</a></li>
				</ul>
			</nav>
		</div>	
		<div class="nombreDelHotel"
			<h1 class="nombreHotel">Hotel Agaró</h1>
		</div>
		</div>
		<div class="cuerpo">
			<div class="descripcionHotel">
				<div class="tituloDescripcion">
					<h1>Descripción</h1>
				</div>
				<div class="cuerpoDescripcion">
					
					<p>El Hotel Agaró Chipiona abrió sus puertas en junio 2017, en primera línea de la Playa de Regla,
					la mejor de Chipiona. Con una decoración fresca y moderna, sus 102 habitaciones cuentan con todas las 
					comodidades para hacer de su estancia las vacaciones perfectas.</p>
					<p>
					Hotel Agaró Chipiona es el referente gastronómico en la zona. Podrá disfrutar de unas imponentes vistas en su Gastrobar Agaró, mientras 
					se deleita con los platos de su carta, lo mejor de la cocina andaluza fusionada con las últimas 
					tendencias gastronómicas.</p>
					<p>
					Pero sobre todo, Hotel Agaró Chipiona es un lugar donde relajarse en 
					primera línea de playa, disfrutando de los mejores atardeceres de Cádiz en su espectacular piscina 
					infinity donde el agua se funde con las olas del Atlántico.</p>
				</div>
				<div class="fotoDescripcion">
				<img class="fotoHotel" src="imagenes/frontal-hotel.png" alt="Foto de la fachada del hotel"/>
				</div>
			</div>
		
			<div class="vistazoHotel">
				<div class="tituloVistazoHotel">
					<h1>Échele un vistazo a nuestro hotel</h1>
				</div>
				<div class="foto1">
					<img class="agaro1" src="imagenes/agaro1.jpg" alt="Foto de la fachada del hotel"/>
				</div>	
				<div class="foto2">
					<img class="agaro2" src="imagenes/agaro2.jpg" alt="Foto de una terraza del hotel"/>
				</div>	
				<div class="foto3">
					<img class="agaro3" src="imagenes/agaro3.png" alt="Foto de la recepción del hotel"/>
				</div>	
				<div class="foto4">
					<img class="agaro4" src="imagenes/agaro4.jpg" alt="Foto de otra terraza del hotel"/>
				</div>						
			</div>
		
			<div class="contactoHotel">
				<div class="tituloContactoHotel">
					<h1>Contacto</h1>
				</div>	
				<div class="cuerpoContactoHotel">		
					<p><strong>Dirección: </strong>Avenida Cruz Roja 38, 11550 Chipiona (Cádiz)</p>
					<p><strong>Teléfono: </strong>(+34) 856 920 042</p>
					<p><strong>Email: </strong>info@hotelagarochipiona.com</p>
					<p><strong>Reservas: </strong>reservas@hotelagarochipiona.com</p>
					<p><strong>Eventos y Reuniones: </strong>comercial@hotelagarodchipiona.com</p>
					<p><strong>Coordenadas GPS: </strong>36.734698, -6.440024</p>
				</div>	
			</div>
	
			<div class="localizacionHotel">
				<div class="tituloLocalizacionHotel">
					<h1>Localización</h1>
				</div>
				<div class="mapaLocalizacionHotel">
					<a href="https://www.google.es/maps/place/Hotel+Agar%C3%B3/@36.7352239,-6.4409019,15.5z/data=!4m9!3m8!1s0xd0e75a877424e37:0xd2c95b55050b656f!5m3!1s2020-05-25!4m1!1i2!8m2!3d36.7347141!4d-6.4400335"
						target="_blank"><img class="mapaChipiona" src="imagenes/mapaChipiona.PNG"
						alt="Localización del hotel en el mapa de Chipiona"/></a>
				</div>	
			</div>
		</div>
	
	
	
		<div class="pieDePagina">
			
	
		</div>
		</div>
	</body>
</html>