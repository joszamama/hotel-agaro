<?php	
	session_start();
			
	if (isset($_REQUEST["guardar"])){
			$empresa["cif"] = $_REQUEST["cif"];
			$empresa["nombre"] = $_REQUEST["nombre"];
			$empresa["direccion"] = $_REQUEST["direccion"];
			$empresa["email"] = $_REQUEST["email"];
			$empresa["telefono"] = $_REQUEST["telefono"];
			$empresa["subcontratada"] = $_REQUEST["subcontratada"];
			$empresa["organizadora"] = $_REQUEST["organizadora"];
			$empresa["supervisor"] = $_REQUEST["supervisor"];
		
			// Guardar la variable local con los datos del formulario en la sesión.
			$_SESSION["empresa"] = $empresa;
	
			// Validamos el formulario en servidor 
			$errores = validarDatosEmpresa($empresa);
	
			// Si se han detectado errores
			if(count($errores)>0) {
		
				// Guardo en la sesión los mensajes de error
				$_SESSION["errores"] = $errores;
		
				// Redirigimos al usuario al formulario
				Header("Location:PrivadoEmpresas.php#añadirEmpresa");

			// Si NO se han detectado errores
			} else 
				Header("Location: accion_add_empresa.php");
			
	} else if(isset($_REQUEST["añadir"])){
	//Lo guardamos en la variable global para poder comprobarlo en EmpleadosPrivado
			$_SESSION["añadir"] = $_REQUEST["añadir"];
						
			Header("Location: PrivadoEmpresas.php#añadirEmpresa");
		
				
	} else if(isset($_REQUEST["eliminar"])){
			$empresa["cif"] = $_REQUEST["cif"];
			$_SESSION["empresa"] = $empresa;
			
			Header("Location: accion_delete_empresa.php");

	} else if(isset($_REQUEST["activar"])){
			$empresa["cif"] = $_REQUEST["cif"];
			$_SESSION["empresa"] = $empresa;
			
			Header("Location: accion_activate_empresa.php");

	} else {
		Header("Location: PrivadoEmpresas.php");
	}
			
function validarDatosEmpresa($empresa){
	
	// Validación del NIF (opcional)
		if(empty($empresa["cif"])){
			$errores[]="El nif no puede estar vacío";	
		} 
	// Validación del nombre 
		if(empty($empresa["nombre"])){
			$errores[]="El nombre no puede estar vacío";
		} else if(validarUsuario(($empresa["nombre"]))) {
        	$errores[]="El nombre no tiene el formato correcto";
        }
	// Validación de la direccion 
		if(empty($empresa["direccion"])){
			$errores[]="La direccion no puede estar vacía";
		}
	// Validación de email
		if($empresa["email"]==""){ 
			$errores[] = "El email no puede estar vacío";
		}else if(!filter_var($empresa["email"], FILTER_VALIDATE_EMAIL)){
			$errores[] = "El email es incorrecto: " . $empresa["email"];
		}
		
	// Validación de teléfono 
		if(empty($empresa["telefono"])){
			$errores[]="El teléfono no puede estar vacío";
		}else if(!is_numeric($empresa["telefono"])){
			$errores[]="El formato del teléfono no es correcto" . $empresa["telefono"];
		}
	// Validación de organizadora
		if($empresa["organizadora"] != "Si" && $empresa["organizadora"] != "No"){
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
