<?php	
	session_start();
			
	if (isset($_REQUEST["guardar1"])){
            $evento["ID_EVENTO"] = $_REQUEST["ID_EVENTO"];
			$evento["nombre"] = $_REQUEST["nombre"];
			$evento["fecha"] = $_REQUEST["fecha"];
			$evento["horaInicio"] = $_REQUEST["horaInicio"];
			$evento["horaFin"] = $_REQUEST["horaFin"];
			$evento["lugar"] = $_REQUEST["lugar"];
            $evento["numeroAsistentes"] = $_REQUEST["numeroAsistentes"];
            $evento["tipo"] = $_REQUEST["tipo"];
            $evento["cif"] = $_REQUEST["cif"];
		
			// Guardar la variable local con los datos del formulario en la sesión.
			$_SESSION["evento"] = $evento;
	
			// Validamos el formulario en servidor 
			$errores = validarDatosEvento($evento);
	
			// Si se han detectado errores
			if(count($errores)>0) {
		
				// Guardo en la sesión los mensajes de error
				$_SESSION["errores"] = $errores;
		
				// Redirigimos al usuario al formulario
				Header("Location:EventosPrivado.php#añadirEvento");

			// Si NO se han detectado errores
			} else 
				Header("Location: accion_add_evento.php");
		
		
	} else if(isset($_REQUEST["añadir1"])){
	//Lo guardamos en la variable global para poder comprobarlo en EmpleadosPrivado
			$_SESSION["añadir1"] = $_REQUEST["añadir1"];
						
			Header("Location: EventosPrivado.php#añadirEvento");
		
	} else if(isset($_REQUEST["editar1"])){
			$_SESSION["editar1"] = $_REQUEST["editar1"];		
			$evento["id"] = $_REQUEST["id"];
			$evento["nombre"] = $_REQUEST["nombre"];
			$evento["fecha"] = $_REQUEST["fecha"];
			$evento["horaInicio"] = $_REQUEST["horaInicio"];
			$evento["horaFin"] = $_REQUEST["horaFin"];
			$evento["lugar"] = $_REQUEST["lugar"];
            $evento["numeroAsistentes"] = $_REQUEST["numeroAsistentes"];
            $evento["tipo"] = $_REQUEST["tipo"];
            $evento["cif"] = $_REQUEST["cif"];
			$_SESSION["evento"] = $evento;

			Header("Location: EventosPrivado.php#añadirEvento");
		
	} else if(isset($_REQUEST["eliminar1"])){
			$evento["id"] = $_REQUEST["id"];
			$_SESSION["evento"] = $evento;
			
			Header("Location: accion_delete_evento.php");

	} else {
		Header("Location: EventosPrivado.php");
	}
			
function validarDatosEvento($evento){

	// Validación del NIF (opcional)
		if(empty($evento["nombre"])){
			$errores[]="El nombre no puede estar vacio";	
		} else if(validarUsuario(($evento["nombre"]))) {
        	$errores[]="El nombre no tiene el formato correcto";
        }else if(is_numeric($evento["nombre"])){
			$errores[]="El formato del nombre no es correcto" . $evento["nombre"];
		}
	// Validación del nombre 
		if(empty($evento["fecha"])){
			$errores[]="La fecha no puede estar vacia";
		}
	// Validación de apellidos 
		if(empty($evento["horaInicio"])){
			$errores[]="La horaInicio no puede estar vacia";
        }
        if(empty($evento["horaFin"])){
			$errores[]="La horaFin no puede estar vacia";
        }
        if(empty($evento["lugar"])){
			$errores[]="El lugar no puede estar vacio";
        }
        if(empty($evento["numeroAsistentes"])){
			$errores[]="El numeroAsistentes no puede estar vacio";
        } else if(!is_numeric($evento["numeroAsistentes"])){
			$errores[]="El formato del numeroAsistentes no es correcto" . $evento["numeroAsistentes"];
		}
        if($evento["tipo"] != "conferencia" && $evento["tipo"] != "grupoMusical" && $evento["tipo"] != "mago"){
			$errores[]="El tipo debe ser una de las opciones dadas";
		}
	
        if(empty($evento["cif"])){
			$errores[]="El cif no puede estar vacio";
		} 
		
	// Validación de turno
		

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
