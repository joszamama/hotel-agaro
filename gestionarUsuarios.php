<?php
  	function comprobarUsuario($conexion, $email, $contraseña){
  		$consulta = "SELECT COUNT(*) AS TOTAL FROM USUARIOS WHERE EMAIL=:email AND CONTRASEÑA=:contraseña";
		$stmt = $conexion->prepare($consulta);
		$stmt->bindParam(':email',$email);
		$stmt->bindParam(':contraseña',$contraseña);
		$stmt->execute();
		
		return $stmt->fetchColumn();
  	}
?>