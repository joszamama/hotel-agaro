<?php	
	session_start();
			
	if (isset($_REQUEST["guardar"])){
            $habitacion["numero"] = $_REQUEST["numero"];
            $habitacion["tipo"] = $_REQUEST["tipo"];
			$habitacion["limpieza"] = $_REQUEST["limpieza"];
			$habitacion["terraza"] = $_REQUEST["terraza"];
			$habitacion["reservada"] = $_REQUEST["reservada"];
			$habitacion["ocupada"] = $_REQUEST["ocupada"];
		
			// Guardar la variable local con los datos del formulario en la sesión.
			$_SESSION["habitacion"] = $habitacion;
	
			// Validamos el formulario en servidor 
			$errores = validarDatosHabitacion($habitacion);
	
			// Si se han detectado errores
			if(count($errores)>0) {
		
				// Guardo en la sesión los mensajes de error
				$_SESSION["errores"] = $errores;
		
				// Redirigimos al usuario al formulario
				Header("Location:HabitacionesPrivado.php#añadirHabitacion");

			// Si NO se han detectado errores
            }else 
			Header("Location: accion_add_empleado.php");	
            
    } else if(isset($_REQUEST["guardarEdit"])){
			$_SESSION["guardarEdit"] = $_REQUEST["guardarEdit"];
			$habitacion["numero"] = $_REQUEST["numero"];
			$habitacion["limpieza"] = $_REQUEST["limpieza"];
			$habitacion["reservada"] = $_REQUEST["reservada"];
			$habitacion["ocupada"] = $_REQUEST["ocupada"];
			$_SESSION["habitacion"] = $habitacion;

			Header("Location: accion_modify_habitaciones.php");
		
	} else if(isset($_REQUEST["editar"])){
			$_SESSION["editar"] = $_REQUEST["editar"];
			$habitacion["numero"] = $_REQUEST["numero"];		
			$habitacion["limpieza"] = $_REQUEST["limpieza"];
			$habitacion["reservada"] = $_REQUEST["reservada"];
			$habitacion["ocupada"] = $_REQUEST["ocupada"];
			$_SESSION["habitacion"] = $habitacion;

            Header("Location: HabitacionesPrivado.php#añadirHabitacion");
            
	} else {
		Header("Location: HabitacionesPrivado.php");
	}
			
function validarDatosHabitacion($habitacion){

	// Validación del numero
	if(empty($habitacion["numero"])){
		$errores[]="El campo numero no puede estar vacion";	
	}
	// Validación del tipo de habitacion
	if(empty($habitacion["tipo"])){
		$errores[]="El campo tipo de habitacion no puede estar vacion";	
	}else if(is_numeric($habitacion["tipo"])){
		$errores[]="El formato del tipo no es correcto" . $habitacion["tipo"];
	}
	// Validación de la limpieza
	if(empty($habitacion["limpieza"])){
		$errores[]="El campo limpieza no puede estar vacion";	
	}else if(is_numeric($habitacion["limpieza"])){
		$errores[]="El formato del limpieza no es correcto" . $habitacion["limpieza"];
	}
	// Validación de la terraza
	if(empty($habitacion["terraza"])){
		$errores[]="El campo terraza no puede estar vacion";	
	}else if(is_numeric($habitacion["terraza"])){
		$errores[]="El formato del terraza no es correcto" . $habitacion["terraza"];
	}
	// Validación de reservada 
	if(empty($empleado["reservada"])){
		$errores[]="El campo reserva no puede estar vacio";
	}else if(is_numeric($habitacion["reservada"])){
		$errores[]="El formato del reservada no es correcto" . $habitacion["reservada"];
	}
	// Validación de ocupada 
	if(empty($empleado["ocupada"])){
		$errores[]="El campo ocupada no pueden estar vacios";
	}else if(is_numeric($habitacion["ocupada"])){
		$errores[]="El formato del ocupada no es correcto" . $habitacion["ocupada"];
	}

	return $errores;
}

function validarTelefono($numero){
  $reg = "#^\(?\d{2}\)?[\s\.-]?\d{4}[\s\.-]?\d{4}$#";
  return preg_match($reg, $numero);
}

function validarUsuario($nombre) {
  return preg_match("#^[a-z][\da-z_]{6,22}[a-z\d]\$#i", $nombre);
}

function validarDni($dni){

  return preg_match("^[0-9]{8}[A-Z]", $dni);
}

?>			
