<?php

	session_start();


if (isset($_REQUEST["guardar2"])){
			$producto["nombre"] = $_REQUEST["nombre"];
			$producto["tipo"] = "bebidas";
			$producto["cantidad"] = $_REQUEST["cantidad"];
			$producto["umbral"] = $_REQUEST["umbral"];
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
				Header("Location:PrivadoProductos.php#añadirProducto");

			// Si NO se han detectado errores
			} else 
				Header("Location: accion_add_producto.php");
		
		
	} else if(isset($_REQUEST["añadir2"])){
	//Lo guardamos en la variable global para poder comprobarlo en PrivadoProductos.php
			$_SESSION["añadir2"] = $_REQUEST["añadir2"];
						
			Header("Location: PrivadoProductos.php#añadirProducto");
		
	} else if(isset($_REQUEST["guardarEdit2"])){
			
			$_SESSION["guardarEdit2"] = $_REQUEST["guardarEdit2"];
			$producto["cantidad"] = $_REQUEST["cantidad"];
			$producto["umbral"] = $_REQUEST["umbral"];
			$producto["id_Producto"] = $_REQUEST["id_Producto"];
			
			$_SESSION["producto"] = $producto;


			Header("Location: accion_modify_producto.php");
		
	} else if(isset($_REQUEST["editar2"])){
			$_SESSION["editar2"] = $_REQUEST["editar2"];		
			$producto["nombre"] = $_REQUEST["nombre"];
			$producto["cantidad"] = $_REQUEST["cantidad"];
			$producto["umbral"] = $_REQUEST["umbral"];
			$_SESSION["producto"] = $producto;

			Header("Location: PrivadoProductos.php#añadirProducto");
		
	} else if(isset($_REQUEST["eliminar2"])){
			$producto["id_Producto"] = $_REQUEST["id_Producto"];
			$_SESSION["producto"] = $producto;
			
			Header("Location: accion_delete_producto.php");

	} else {
		Header("Location: PrivadoProductos.php");
	}
			
function validarDatosProducto($producto){
	
	// Validación del nombre
		if(empty($producto["nombre"])){
			$errores[]="El nombre no puede estar vacio";	
		}else if(validarUsuario(($producto["nombre"]))) {
        	$errores[]="El nombre no tiene el formato correcto";
        }
	// Validación del nombre 
		if(empty($producto["cantidad"])){
			$errores[]="La cantidad no puede estar vacia";
		}else if(!is_numeric($producto["cantidad"])){
			$errores[]="El formato del cantidad no es correcto" . $producto["cantidad"];
		}
	// Validación de apellidos 
		if(empty($producto["umbral"])){
			$errores[]="El umbral no pueden estar vacio";
        }else if(!is_numeric($producto["umbral"])){
			$errores[]="El formato del umbral no es correcto" . $producto["umbral"];
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