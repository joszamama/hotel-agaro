const nombre = document.getElementById("name")
const email = document.getElementById("email")
const emailInicioSesion = document.getElementById("emailInicioSesion")
const dni = document.getElementById("dni")
const pass = document.getElementById("passInicioSesion")
const cif = document.getElementById("cifproveedor")
const form = document.getElementById("formularioEmpresa")
const parrafo = document.getElementById("warnings")

form.addEventListener("submit", e=>{
    e.preventDefault()
    let warnings = ""
    let entrar = false
    let regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
	let regexDNI = /^[0-9]{8}[A-Z]$/
    let regexCIF = /^([ABCDEFGHJKLMNPQRSUVW])(\d{7})([0-9A-J])$/
    parrafo.innerHTML = ""
    if(nombre.value.length <0 && nombre!=null){
        warnings += `El nombre no es valido <br>`
        entrar = true
    }
    if(apellidos.value.length <0 && apellidos!=null){
        warnings += `El nombre es demasiado corto <br>`
        entrar = true
    }
    if(!regexEmail.test(email.value) && email!=null){
        warnings += `El email no es valido <br>`
        entrar = true
    }
    if(!regexEmail.test(emailInicioSesion.value) && emailInicioSesion!=null){
        warnings += `El email no es valido <br>`
        entrar = true
    }
    if(!regexDNI.test(dni.value) && dni!=null){
        warnings += `El DNI no es valido <br>`
        entrar = true
    }
    if(passInicioSesion.value.length < 8 && passInicioSesion!=null){
        warnings += `La contraseña no es valida <br>`
        entrar = true
    }
    if(!regexCIF.test(cif.value) && cif!=null){
        warnings += `El CIF no es valido <br>`
        entrar = true
    }

    if(entrar){
        parrafo.innerHTML = warnings
    }
})