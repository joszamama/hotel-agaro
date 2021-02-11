<?php	

	session_start();
			
	if (isset($_REQUEST["guardar"])){
			$producto["NOMBRE"] = $_REQUEST["NOMBRE"];
			$producto["TIPO"] = 'alimento';
			$producto["CANTIDAD"] = $_REQUEST["CANTIDAD"];
			$producto["UMBRAL"] = $_REQUEST["UMBRAL"];
			$producto["CIFPROVEEDOR"] = $_REQUEST["CIFPROVEEDOR"];
	
		
						
			// Guardar la variable local con los datos del formulario en la sesión.
			$_SESSION["producto"] = $producto;
	
			// Validamos el formulario en servidor 
			$errores = validarDatosProducto($producto);
	
			// Si se han detectado errores
			if(count($errores)>0) {
		
				// Guardo en la sesión los mensajes de error
				$_SESSION["errores"] = $errores;
		
				// Redirigimos al usuario al formulario
				Header("Location:PrivadoProductos.php");

			// Si NO se han detectado errores
			} else {
				Header("Location: accion_add_producto.php");		
			}
	} else if(isset($_REQUEST["añadir"])){
	//Lo guardamos en la variable global para poder comprobarlo en EmpleadosPrivado
			$_SESSION["añadir"] = $_REQUEST["añadir"];
						
			Header("Location: PrivadoProductos.php#añadirProducto");
		
	} else if(isset($_REQUEST["guardarEdit"])){
			$_SESSION["guardarEdit"] = $_REQUEST["guardarEdit"];		
			$producto["ID_PRODUCTO"] = $_REQUEST["ID_PRODUCTO"];
			$producto["UMBRAL"] = $_REQUEST["UMBRAL"];
			$producto["CANTIDAD"] = $_REQUEST["CANTIDAD"];
			$_SESSION["producto"] = $producto;


			Header("Location: accion_modify_producto.php");
		
	} else if(isset($_REQUEST["editar"])){
			$_SESSION["editar"] = $_REQUEST["editar"];		
			$producto["ID_PRODUCTO"] = $_REQUEST["ID_PRODUCTO"];
			$producto["UMBRAL"] = $_REQUEST["UMBRAL"];
			$producto["CANTIDAD"] = $_REQUEST["CANTIDAD"];
			$_SESSION["producto"] = $producto;

			Header("Location: PrivadoProductos.php");
		
	} else if(isset($_REQUEST["eliminar"])){
			$producto["ID_PRODUCTO"] = $_REQUEST["ID_PRODUCTO"];
			$_SESSION["producto"] = $producto;
			
			Header("Location: accion_delete_producto.php");

	} else {
		Header("Location: PrivadoProductos.php");
	}
			
			
function validarDatosProducto($producto){
	
	// Validación del NOMBRE
		if(empty($producto["NOMBRE"])){
			$errores[]="El NOMBRE no puede estar vacio";	
		} else if(validarUsuario(($producto["NOMBRE"]))) {
        	$errores[]="El nombre no tiene el formato correcto";
        }
	// Validación del NOMBRE 
		if(empty($producto["CANTIDAD"])){
			$errores[]="La CANTIDAD no puede estar vacia";
		} else if(!is_numeric($producto["CANTIDAD"])){
			$errores[]="El formato del cantidad no es correcto" . $producto["CANTIDAD"];
		}
	// Validación de apellidos 
		if(empty($producto["UMBRAL"])){
			$errores[]="El umbral no pueden estar vacio";
        } else if(!is_numeric($producto["UMBRAL"])){
			$errores[]="El formato del umbral no es correcto" . $producto["UMBRAL"];
		}
	// Validación de teléfono 
		if(empty($producto["CIFPROVEEDOR"])){
			$errores[]="El proveedor no puede estar vacio";
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