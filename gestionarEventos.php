<?php
    function consultarEventos($conexion) {
		$consulta = "SELECT * FROM EVENTOS";
		
		return $conexion->query($consulta);
	}


	// BOTONES: --------------------------------

	function añadirEvento($conexion, $nombre, $fecha, $horaInicio, $horaFin, $lugar, $numeroAsistentes, $tipo, $cif, $supervisor){
		try {
			$stmt=$conexion->prepare("CALL creaEventos(:nombre, :fecha, :horaInicio, :horaFin, :lugar, :numeroAsistentes, :tipo, :cif, :supervisor)");

			$inicio = strtotime($fecha); //Convierte el string a formato de fecha en php
 		
			$fecha1 = date('d/m/Y',$inicio); //Lo convierte a formato de fecha para Oracle
			
			$stmt->bindParam(':nombre', $nombre);
			$stmt->bindParam(':fecha', $fecha1);
			$stmt->bindParam(':horaInicio', $horaInicio);
			$stmt->bindParam(':horaFin', $horaFin);
			$stmt->bindParam(':lugar', $lugar);
			$stmt->bindParam(':numeroAsistentes', $numeroAsistentes);
			$stmt->bindParam(':tipo', $tipo);
			$stmt->bindParam(':cif', $cif);
			$stmt->bindParam(':supervisor', $b = 1);
			
			$stmt->execute();
			return "";
			
		} catch(PDOException $e) {
			return $e->getMessage();
		}				
	}	

	function eliminarEvento($conexion, $id){
		try {
			$stmt=$conexion->prepare("CALL eliminaEvento(:id)");
			
			$stmt->bindParam(':id', $id);
			
			$stmt->execute();
			return "";
			
		} catch(PDOException $e) {
			return $e->getMessage();
		}				
	}	
?>