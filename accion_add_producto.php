<?php	
	session_start();	
	
	if (isset($_SESSION["producto"])) {
		$producto = $_SESSION["producto"];
		
		require_once("gestionBD.php");
		require_once("gestionarProductos.php");
		
		$conexion = crearConexionBD();   // CREAR LA CONEXIÓN A LA BASE DE DATOS
		
		$excepcion = añadirProducto($conexion, $producto["NOMBRE"], $producto["TIPO"], $producto["CANTIDAD"],
									$producto["UMBRAL"], $producto["CIFPROVEEDOR"]);


		cerrarConexionBD($conexion);     // CERRAR LA CONEXIÓN
		
		if($excepcion<>"") {
			$_SESSION["excepcion"] = $excepcion;
			$_SESSION["destino"] = "PrivadoProductos.php";
			Header("Location: excepcion.php");
			
		} else {
			Header("Location: PrivadoProductos.php");			
			
		}
		// SI LA FUNCIÓN RETORNÓ UN MENSAJE DE EXCEPCIÓN, ENTONCES REDIRIGIR A "EXCEPCION.PHP"
		// (NÓTESE QUE HAY QUE ASIGNAR ADECUADAMENTE LAS VARIABLES DE SESIÓN PARA "EXCEPCION.PHP")
		// EN OTRO CASO, VOLVER AL MAIN
	} 
	else // Se ha tratado de acceder directamente a este PHP 
		Header("Location: PrivadoProductos.php"); 
?>
