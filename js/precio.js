var entrada = new Date(document.getElementById("fechaEntrada").innerHTML);
var salida = new Date(document.getElementById("fechaSalida").innerHTML);


$habitacion = $(".tipoHabitacion");

//Pasamos a milisegundos, restamos, y pasamos a dias
var resta = salida.getTime() - entrada.getTime();
dias = Math.round(resta/ (1000*60*60*24));
$(".resultado").html(dias*parseInt($habitacion));


function calcular(){
	$precio = $(".tipoHabitacion");
	var coste_total = 0;
	coste_total = parteInt($precio)*resta;
	
$(".resultado").html(coste_tota);

	
}

