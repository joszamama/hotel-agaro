<?php
	
	function consultarEmpresas($conexion) {
		$consulta = "SELECT * FROM EMPRESAS ORDER BY NOMBRE, CIF";
		
		return $conexion->query($consulta);
	}
	
// BOTONES: --------------------------------

	function añadirEmpresa($conexion, $cif, $nombre, $direccion, $email, $telefono, $subcontratada, $organizadora, $supervisor){
		try {
			$stmt=$conexion->prepare("CALL creaEmpresas(:cif, :nombre, :direccion, :email, :telefono, :subcontratada, :organizadora, :activa, :supervisor)");
			
			$stmt->bindParam(':cif', $cif);
			$stmt->bindParam(':nombre', $nombre);
			$stmt->bindParam(':direccion', $direccion);
			$stmt->bindParam(':email', $email);
			$stmt->bindParam(':telefono', $telefono);
			$stmt->bindParam(':subcontratada', $subcontratada);
			$stmt->bindParam(':organizadora', $organizadora);
			$stmt->bindParam(':activa', $n = 'Si');
			$stmt->bindParam(':supervisor', $b = 1);
			
			$stmt->execute();
			return "";
			
		} catch(PDOException $e) {
			return $e->getMessage();
		}				
	}	

	function desactivarEmpresa($conexion, $cif){
		try {
			$stmt=$conexion->prepare("CALL cambiarActividadEmpresa(:CIF, :actividad)");
			
			$stmt->bindParam(':CIF', $cif);
			$stmt->bindParam(':actividad', $n = 'No');
			
			$stmt->execute();
			return "";
			
		} catch(PDOException $e) {
			return $e->getMessage();
		}				
	}	

	function activarEmpresa($conexion, $cif){
		try {
			$stmt=$conexion->prepare("CALL cambiarActividadEmpresa(:CIF, :actividad)");
			
			$stmt->bindParam(':CIF', $cif);
			$stmt->bindParam(':actividad', $n = 'Si');
			
			$stmt->execute();
			return "";
			
		} catch(PDOException $e) {
			return $e->getMessage();
		}				
	}	
	
	
?>