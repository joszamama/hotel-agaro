<?php
    function consultarRestaurante($conexion) {
		$consulta = "SELECT * FROM RESTAURANTE";
		
		return $conexion->query($consulta);
	}
	
	function consultarBarDeCopas($conexion){
		$consulta = "SELECT * FROM BARDECOPAS";
		
		return $conexion->query($consulta);
			}
	function editarRestaurante($conexion, $ID_RESTAURANTE, $NUMERORESERVAS){
		
		try {
			$stmt=$conexion->prepare("CALL modificaRestaurante(:ID_RESTAURANTE, :NUMERORESERVAS)");
			
			$stmt->bindParam(':ID_RESTAURANTE', $ID_RESTAURANTE);
			$stmt->bindParam(':NUMERORESERVAS', $NUMERORESERVAS);
			
			$stmt->execute();
			return "";
			
		} catch(PDOException $e) {
			return $e->getMessage();
		}				
	
	};
	
	function editarBarCopas ($conexion, $NUMERORESERVAS){
		
		try {
			$stmt=$conexion->prepare("CALL modificaBarCopas(:ID_BAR_C, :NUMERORESERVAS)");
			
			$stmt->bindParam(':ID_BAR_C', $b = 1);
			$stmt->bindParam(':NUMERORESERVAS', $NUMERORESERVAS);
			
			$stmt->execute();
			return "";
			
		} catch(PDOException $e) {
			return $e->getMessage();
		}				
	
	};
?>