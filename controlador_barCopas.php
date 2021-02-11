<?php
	session_start();
    	if(isset($_REQUEST["editar1"])){
			$_SESSION["editar1"] = $_REQUEST["editar1"];
			$barCopas["ID_BAR_C"] = $_REQUEST["ID_BAR_C"];	
			$barCopas["NUMEROMESAS"] = $_REQUEST["NUMEROMESAS"];
			$barCopas["NUMERORESERVAS"] = $_REQUEST["NUMERORESERVAS"];
			$barCopas["HORAAPERTURA"] = $_REQUEST["HORAAPERTURA"];
			$barCopas["HORACIERRE"] = $_REQUEST["HORACIERRE"];
			$_SESSION["barCopas"] = $barCopas;

			Header("Location: RestaurantePrivado.php#editarReservaBarCopas");
			
	} else if(isset($_REQUEST["guardarEdit1"])){
			$barCopas["ID_BAR_C"] = $_REQUEST["ID_BAR_C"];	
			$barCopas["NUMEROMESAS"] = $_REQUEST["NUMEROMESAS"];
			$barCopas["NUMERORESERVAS"] = $_REQUEST["NUMERORESERVAS"];
			$barCopas["HORAAPERTURA"] = $_REQUEST["HORAAPERTURA"];
			$barCopas["HORACIERRE"] = $_REQUEST["HORACIERRE"];
			$_SESSION["barCopas"] = $barCopas;


			echo $barCopas["ID_BAR_C"];
			
	} else {
			Header("Location: RestaurantePrivado.php");
	}
?>