<?php
	
	function consultarDirectorGeneral($conexion) {
		$consulta = "SELECT * FROM DIRECTORGENERAL ORDER BY APELLIDOS, NOMBRE";
		
		return $conexion->query($consulta);
	}
	
	function consultarDirectorHabitaciones($conexion) {
		$consulta = "SELECT * FROM DIRECTORDEHABITACIONES ORDER BY APELLIDOS, NOMBRE";
		
		return $conexion->query($consulta);
	}
	
	function consultarDirectorAdministrativo($conexion) {
		$consulta = "SELECT * FROM DIRECTORADMINISTRATIVO ORDER BY APELLIDOS, NOMBRE";
		
		return $conexion->query($consulta);
	}
	
	function consultarDirectorMarketing($conexion) {
		$consulta = "SELECT * FROM DIRECTORDEMARKETING ORDER BY APELLIDOS, NOMBRE";
		
		return $conexion->query($consulta);
	}
	
	function consultarDirectorRestauracion($conexion) {
		$consulta = "SELECT * FROM DIRECTORRESTAURANTE ORDER BY APELLIDOS, NOMBRE";
		
		return $conexion->query($consulta);
	}
	//RF-03
	function consultarCamareros($conexion) {
		$consulta = "SELECT * FROM CAMAREROS ORDER BY APELLIDOS, NOMBRE";
		
		return $conexion->query($consulta);
	}
	//RF-02
	function consultarCamarerosLimpieza($conexion) {
		$consulta = "SELECT * FROM CAMAREROSDELIMPIEZA ORDER BY APELLIDOS, NOMBRE";
		
		return $conexion->query($consulta);
	}
	
	
	
	
	
// BOTONES: --------------------------------

	function añadirCamareros($conexion, $dni, $nombre, $apellidos, $email, $telefono, $turno){
		try {
			$stmt=$conexion->prepare("CALL creaCamareros(:DNI, :nombre, :apellidos, :email, :telefono, :turno, :jefe, :id_restaurante, :id_barDeCopas)");
			
			$stmt->bindParam(':DNI', $dni);
			$stmt->bindParam(':nombre', $nombre);
			$stmt->bindParam(':apellidos', $apellidos);
			$stmt->bindParam(':email', $email);
			$stmt->bindParam(':telefono', $telefono);
			$stmt->bindParam(':turno', $turno);
			$stmt->bindParam(':jefe', $b = 1);
			$stmt->bindParam(':id_restaurante', $c = null);
			$stmt->bindParam(':id_barDeCopas', $d = null);
			
			$stmt->execute();
			return "";
			
		} catch(PDOException $e) {
			return $e->getMessage();
		}				
	}	

	function editarCamareros($conexion, $dni, $email, $telefono, $turno){
		try {
			$stmt=$conexion->prepare("CALL modificaCamarero(:DNI, :email, :telefono, :turno)");
			
			$stmt->bindParam(':DNI', $dni);
			$stmt->bindParam(':email', $email);
			$stmt->bindParam(':telefono', $telefono);
			$stmt->bindParam(':turno', $turno);
			
			$stmt->execute();
			return "";
			
		} catch(PDOException $e) {
			return $e->getMessage();
		}				
	}	

	function eliminarCamareros($conexion, $dni){
		try {
			$stmt=$conexion->prepare("CALL eliminaCamarero(:DNI)");
			
			$stmt->bindParam(':DNI', $dni);
			
			$stmt->execute();
			return "";
			
		} catch(PDOException $e) {
			return $e->getMessage();
		}				
	}	




	function añadirCamarerosLimp($conexion, $dni, $nombre, $apellidos, $email, $telefono, $jefe, $turno){
		try {
			$stmt=$conexion->prepare("CALL creaCamarerosDeLimpieza(:DNI, :nombre, :apellidos, :email, :telefono, :jefe, :turno)");
			
			$stmt->bindParam(':DNI', $dni);
			$stmt->bindParam(':nombre', $nombre);
			$stmt->bindParam(':apellidos', $apellidos);
			$stmt->bindParam(':email', $email);
			$stmt->bindParam(':telefono', $telefono);
			$stmt->bindParam(':turno', $turno);
			$stmt->bindParam(':jefe', $b = 1);
			
			$stmt->execute();
			return "";
			
		} catch(PDOException $e) {
			return $e->getMessage();
		}				
	}	

	function editarCamarerosLimp($conexion, $dni, $email, $telefono, $turno){
		try {
			$stmt=$conexion->prepare("CALL modificaCamareroLimpieza(:DNI, :email, :telefono, :turno)");
			
			$stmt->bindParam(':DNI', $dni);
			$stmt->bindParam(':email', $email);
			$stmt->bindParam(':telefono', $telefono);
			$stmt->bindParam(':turno', $turno);
			
			$stmt->execute();
			return "";
			
		} catch(PDOException $e) {
			return $e->getMessage();
		}				
	}	

	function eliminarCamarerosLimp($conexion, $dni){
		try {
			$stmt=$conexion->prepare("CALL eliminaCamareroDeLimpieza(:DNI)");
			
			$stmt->bindParam(':DNI', $dni);
			
			$stmt->execute();
			return "";
			
		} catch(PDOException $e) {
			return $e->getMessage();
		}				
	}	

	
	
	
?>