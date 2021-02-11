<?php
	
	function consultarTodosClientes($conexion) {
		$consulta = "SELECT * FROM CLIENTES ORDER BY APELLIDOS, NOMBRE";
		
		return $conexion->query($consulta);
	}
	
	function añadirCliente($conexion, $dni, $nombre, $apellidos, $email, $telefono){
		try {
			$stmt=$conexion->prepare("CALL creaClientes(:DNI, :nombre, :apellidos, :email, :telefono, :supervisor)");
			
			$stmt->bindParam(':DNI', $dni);
			$stmt->bindParam(':nombre', $nombre);
			$stmt->bindParam(':apellidos', $apellidos);
			$stmt->bindParam(':email', $email);
			$stmt->bindParam(':telefono', $telefono);
			$stmt->bindParam(':supervisor', $b = 1);
			
			$stmt->execute();
			return "";
			
		} catch(PDOException $e) {
			return $e->getMessage();
		}				
	}	

	
?>