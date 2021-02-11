<?php	
	session_start();
			
	if (isset($_REQUEST["guardar"])){
			$empleado["dni"] = $_REQUEST["dni"];
			$empleado["nombre"] = $_REQUEST["nombre"];
			$empleado["apellidos"] = $_REQUEST["apellidos"];
			$empleado["email"] = $_REQUEST["email"];
			$empleado["telefono"] = $_REQUEST["telefono"];
			$empleado["turno"] = $_REQUEST["turno"];
		
			// Guardar la variable local con los datos del formulario en la sesión.
			$_SESSION["empleado"] = $empleado;
	
			// Validamos el formulario en servidor 
			$errores = validarDatosEmpleado($empleado);
	
			// Si se han detectado errores
			if(count($errores)>0) {
		
				// Guardo en la sesión los mensajes de error
				$_SESSION["errores"] = $errores;
		
				// Redirigimos al usuario al formulario
				Header("Location:EmpleadosPrivado.php#añadirCamarero");

			// Si NO se han detectado errores
			} else {
				Header("Location: accion_add_empleado.php");
		
			}
	} else if(isset($_REQUEST["añadir"])){
	//Lo guardamos en la variable global para poder comprobarlo en EmpleadosPrivado
			$_SESSION["añadir"] = $_REQUEST["añadir"];
						
			Header("Location: EmpleadosPrivado.php#añadirCamarero");
		
	} else if(isset($_REQUEST["guardarEdit"])){
			$_SESSION["guardarEdit"] = $_REQUEST["guardarEdit"];		
			$empleado["dni"] = $_REQUEST["dni"];
			$empleado["email"] = $_REQUEST["email"];
			$empleado["telefono"] = $_REQUEST["telefono"];
			$empleado["turno"] = $_REQUEST["turno"];
			$_SESSION["empleado"] = $empleado;


			Header("Location: accion_modify_empleado.php");
		
	} else if(isset($_REQUEST["editar"])){
			$_SESSION["editar"] = $_REQUEST["editar"];		
			$empleado["dni"] = $_REQUEST["dni"];
			$empleado["email"] = $_REQUEST["email"];
			$empleado["telefono"] = $_REQUEST["telefono"];
			$empleado["turno"] = $_REQUEST["turno"];
			$_SESSION["empleado"] = $empleado;

			Header("Location: EmpleadosPrivado.php#añadirCamarero");
		
	} else if(isset($_REQUEST["eliminar"])){
			$empleado["dni"] = $_REQUEST["dni"];
			$_SESSION["empleado"] = $empleado;
			
			Header("Location: accion_delete_empleado.php");

	} else {
		Header("Location: EmpleadosPrivado.php");
	}
			
function validarDatosEmpleado($empleado){
	
	// Validación del NIF (opcional)
		if(empty($empleado["dni"])){
			$errores[]="El nif no puede estar vacio";	
		} else if(validarDni(($empleado["dni"]))) {
        	$errores[]="El dni no tiene el formato correcto";
        }
	// Validación del nombre 
		if(empty($empleado["nombre"])){
			$errores[]="El nombre no puede estar vacio";
		} else if(validarUsuario(($empleado["nombre"]))) {
        	$errores[]="El nombre no tiene el formato correcto";
        }
	// Validación de apellidos 
		if(empty($empleado["apellidos"])){
			$errores[]="Los apellidos no pueden estar vacios";
		} 
	// Validación de email
		if($empleado["email"]==""){ 
			$errores[] = "El email no puede estar vacío";
		}else if(!filter_var($empleado["email"], FILTER_VALIDATE_EMAIL)){
			$errores[] = "El email es incorrecto: " . $empleado["email"];
		}
		
	// Validación de teléfono 
		if(empty($empleado["telefono"])){
			$errores[]="El teléfono no puede estar vacio";
		}else if(!is_numeric($empleado["telefono"])){
			$errores[]="El formato del teléfono no es correcto" . $empleado["telefono"];
		}
	// Validación de turno
		if($empleado["turno"] != "mañana" && $empleado["turno"] != "tarde" && $empleado["turno"] != "noche"
			&& $empleado["turno"] != "diurno" && $empleado["turno"] != "nocturno"){
			$errores[]="El turno debe ser una de las opciones dadas";
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
