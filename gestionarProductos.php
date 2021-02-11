<?php

	function consultarAlimentos($conexion) {
		$consulta = "SELECT * FROM PRODUCTOS WHERE TIPO = 'alimento' ORDER BY NOMBRE";
		
		return $conexion->query($consulta);
	}

	function consultarBebidas($conexion) {
		$consulta = "SELECT * FROM PRODUCTOS WHERE TIPO = 'bebidas' ORDER BY NOMBRE";
		
		return $conexion->query($consulta);
	}

	function consultarMantenimiento($conexion) {
		$consulta = "SELECT * FROM PRODUCTOS WHERE TIPO = 'mantenimiento' ORDER BY NOMBRE";
		
		return $conexion->query($consulta);
	}


// BOTONES: --------------------------------

function añadirProducto($conexion, $nombre, $tipo, $cantidad, $umbral, $CIFPROVEEDOR){
	try {
		$stmt=$conexion->prepare("CALL creaProductos(:nombre, :tipo, :cantidad, :umbral, :supervisor, :CIFPROVEEDOR, :id_restaurante, :id_barDeCopas)");
		
		$stmt->bindParam(':nombre', $nombre);
		$stmt->bindParam(':tipo', $tipo);
		$stmt->bindParam(':cantidad', $cantidad);
		$stmt->bindParam(':umbral', $umbral);
		$stmt->bindParam(':supervisor', $b = 1);
		$stmt->bindParam(':CIFPROVEEDOR', $CIFPROVEEDOR);
		$stmt->bindParam(':id_restaurante', $c = 1);
		$stmt->bindParam(':id_barDeCopas', $d = 1);
		$stmt->execute();
		return "";
		
	} catch(PDOException $e) {
		return $e->getMessage();
	}				
}	

function editarProducto($conexion, $id, $cantidad, $umbral){
	try {
		$stmt=$conexion->prepare("CALL modificaProducto(:id, :cantidad, :umbral)");
		
		$stmt->bindParam(':id', $id);
		$stmt->bindParam(':cantidad', $cantidad);
		$stmt->bindParam(':umbral', $umbral);
		
		$stmt->execute();
		return "";
		
	} catch(PDOException $e) {
		return $e->getMessage();
	}				
}	

function eliminarProducto($conexion, $id){
	try {
		$stmt=$conexion->prepare("CALL eliminaProducto(:id)");
		
		$stmt->bindParam(':id', $id);
		
		$stmt->execute();
		return "";
		
	} catch(PDOException $e) {
		return $e->getMessage();
	}				
}	
?>