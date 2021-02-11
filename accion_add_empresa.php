<?php	
	session_start();	
	
	if (isset($_SESSION["empresa"])) {
		$empresa = $_SESSION["empresa"];
		unset($_SESSION["empresa"]);
		
		require_once("gestionBD.php");
		require_once("gestionarEmpresas.php");
		
		$conexion = crearConexionBD();   // CREAR LA CONEXIÓN A LA BASE DE DATOS
		
		$excepcion = añadirEmpresa($conexion,$empresa["cif"],$empresa["nombre"],$empresa["direccion"],
									$empresa["email"],$empresa["telefono"],$empresa["subcontratada"],
									$empresa["organizadora"],$empresa["supervisor"]);
		
		cerrarConexionBD($conexion);     // CERRAR LA CONEXIÓN
		
		if($excepcion<>"") {
			$_SESSION["excepcion"] = $excepcion;
			$_SESSION["destino"] = "PrivadoEmpresas.php";
			Header("Location: excepcion.php");
			
		} else {
			Header("Location: PrivadoEmpresas.php#añadirEmpresa");			
			
		}
		// SI LA FUNCIÓN RETORNÓ UN MENSAJE DE EXCEPCIÓN, ENTONCES REDIRIGIR A "EXCEPCION.PHP"
		// (NÓTESE QUE HAY QUE ASIGNAR ADECUADAMENTE LAS VARIABLES DE SESIÓN PARA "EXCEPCION.PHP")
		// EN OTRO CASO, VOLVER AL MAIN
	} 
	else // Se ha tratado de acceder directamente a este PHP 
		Header("Location: PrivadoEmpresas.php"); 
?>
