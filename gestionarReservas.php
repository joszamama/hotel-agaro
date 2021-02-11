<?php

	function consultarReservas($conexion) {
		$consulta = "SELECT * FROM RESERVAS ORDER BY FECHAINICIO";
		
		return $conexion->query($consulta);
	}


	function añadirReserva($conexion, $fInicio, $fFin, $dni){
		try {
			$stmt=$conexion->prepare("CALL creaReservas(:fInicio, :fFin, :DNI)");
			
			 
			$inicio = strtotime($fInicio); //Convierte el string a formato de fecha en php
			$fin = strtotime($fFin); //Convierte el string a formato de fecha en php
 		
			$fecha1 = date('d/m/Y',$inicio); //Lo convierte a formato de fecha para Oracle
			$fecha2 = date('d/m/Y',$fin); //Lo convierte a formato de fecha para Oracle
		
			$stmt->bindParam(':DNI', $dni);
			$stmt->bindParam(':fInicio', $fecha1);
			$stmt->bindParam(':fFin', $fecha2);
			
			$stmt->execute();
			return "";
			
		} catch(PDOException $e) {
			return $e->getMessage();
		}				
	}	



?>