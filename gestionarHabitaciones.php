<?php
    
    //RF-10
	function consultarHabitaciones($conexion) {
		$consulta = "SELECT * FROM HABITACIONES ORDER BY NUMERO";
		
		return $conexion->query($consulta);
	}
	
	//RF-11
   	function consultarHabitacionesPorLimpiar($conexion) {
		$consulta = "SELECT * FROM HABITACIONES WHERE LIMPIEZA = 'No'";
		
		return $conexion->query($consulta);
	}
   
	//RF-12   
    function consultarHabitacionesReservadas($conexion) {
		$consulta = "SELECT * FROM HABITACIONES WHERE RESERVADA = 'No'";
		
		return $conexion->query($consulta);
	}
   
   
   	function reservarHabitacion($conexion, $numero){
		try {
			$stmt=$conexion->prepare("CALL reservarHabitacion(:numero, :reservada)");
			
			$stmt->bindParam(':numero', $numero);
			$stmt->bindParam(':reservada', $r = 'Si');
			
			$stmt->execute();
			return "";
			
		} catch(PDOException $e) {
			return $e->getMessage();
		}				
	}	
	
   	function ocuparHabitacion($conexion, $numero){
		try {
			$stmt=$conexion->prepare("CALL reservarHabitacion(:numero, :reservada)");
			
			$stmt->bindParam(':numero', $numero);
			$stmt->bindParam(':reservada', $reserva = 'Si');
			
			$stmt->execute();
			return "";
			
		} catch(PDOException $e) {
			return $e->getMessage();
		}				
	}	
	
   	function desreservarHabitacion($conexion, $numero){
		try {
			$stmt=$conexion->prepare("CALL ocuparHabitacion(:numero, :reservada)");
			
			$stmt->bindParam(':numero', $numero);
			$stmt->bindParam(':reservada', $reserva = 'No');
			
			$stmt->execute();
			return "";
			
		} catch(PDOException $e) {
			return $e->getMessage();
		}				
	}	
	
	   	function desocuparHabitacion($conexion, $numero){
		try {
			$stmt=$conexion->prepare("CALL ocuparHabitacion(:numero, :reservada)");
			
			$stmt->bindParam(':numero', $numero);
			$stmt->bindParam(':reservada', $reserva = 'No');
			
			$stmt->execute();
			return "";
			
		} catch(PDOException $e) {
			return $e->getMessage();
		}				
	}	
	   
   
   
   
    
?>