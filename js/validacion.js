
function validateForm(){

    var noValidation = document.getElementById("formulario").noValidate;

    if(!noValidation){
        var error1 = dniValidation();
        var error2 = validacionNombre();
        var error3= validacionApellido();
        var error4 = validacionTelefono();
        var error5= emailValidacion();
        
        return (error1==0) && (error2==0) && (error3==0) && (error4==0) && (error5==0);

    }else{
        return true;
    }
};

function validateEmpresa(){
	var noValidation = document.getElementById("empresa").noValidate;
	
	if(!noValidation){
		var error1 = validacionCIF();
		var error2 = validacionNombre();
		var error3  = emailValidacion();
		var error4 = validacionTelefono();
		
		return (error1==0) && (error2==0) && (error3==0) && (error4==0);
	}else{
		
		return true;
	}
};
//--------------------------------------------------------------------------
function dniValidation(){
    var nom= document.getElementById("dni");
    var dni = nom.value;
    var lector = document.getElementById("dni").innerHTML;
    var enuso= lector.includes(dni);
    var patron= /^[0-9]{8}[A-Z]$/;

    if(dni==""){
        var error= "El campo DNI no puede estar vacío";
    }else if(enuso){
        var error= "El DNI ya está registrado";
    }else if(patron.test(dni)){
        var error="";
    }else{
        var error= "El DNI debe estar formado por 8 números y una letra";
    }
    nom.setCustomValidity(error);
    return error;
};

function validacionNombre(){
    var n=document.getElementById("nombre");
    var nombre=n.value;
    if(nombre==""){
           var error= "El campo nombre no puede estar en blanco";
        }else{
            var error = "";
        }
        n.setCustomValidity(error);
    return error;
};

function validacionApellido(){
    var ap=document.getElementById("apellidos");
    var apellido=ap.value;
    if(apellido==""){
           var error= "El campo apellidos no puede estar en blanco";
        }else{
            var error = "";
        }
        ap.setCustomValidity(error);
    return error;
};

function validacionTelefono(){
    var tr=document.getElementById("telefono");
    var telefono=tr.value;
    var regex= /^[0-9]{9}$/;
    if (regex.test(telefono)){
            var error="";
      }else if(telefono==""){
          var error = "El campo teléfono no puede estar en blanco";
        }else{
            var error = "El teléfono introducido no es válido";
        }
        tr.setCustomValidity(error);
    return error;
};

function emailValidacion(){
    var e=document.getElementById("email");
    var email=e.value;
    var regex= /\S+@\S+.\S+/;
    if (regex.test(email)){
            var error="";
            document.getElementById("band4").style.visibility = "visible";
       }else if(email==""){
           var error= "El campo email no puede estar en blanco";
       }else{
            var error = "El email introducido no es válido";
        }
        e.setCustomValidity(error);
    return error;
}
	
	function validacionCIF(){
		var nom= document.getElementById("cif");
    	var cif = nom.value;
   	 	var lector = document.getElementById("cif").innerHTML;
    	var enuso= lector.includes(cif);
    	var patron= /^([ABCDEFGHJKLMNPQRSUVW])(\d{7})([0-9A-J])$/;

    	if(dni==""){
        	var error= "El campo CIF no puede estar vacío";
    	}else if(enuso){
        	var error= "El CIF ya está registrado";
    	}else if(patron.test(cif)){
       	 	var error="";
    	}else{
        	var error= "Formato incorrecto del CIF";
    	}
    	nom.setCustomValidity(error);
    	return error;
};	

	
	
