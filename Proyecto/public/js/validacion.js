

function validacionLogin(){
    var datos = {
        username:  document.formulario.username.value,
        password: document.formulario.contra.value
    }
    $.ajax({
        method:"POST",
        data: datos,
        url:"php/validacion.php",
        success: function (response) {
            if(response!="*El usuario o la contra son erroneos"){
                window.location.assign("html/menu.html");
            }else{
                document.getElementById("warning").innerHTML = response;
            }
        },
        error: function(response){
            document.getElementById("warning").innerHTML = "*No ha sido posible conectar con la base";
        }
    })
}

function addProduct(){

    const datos ={
        nombre: document.formulario.nombre.value,
        precio: document.formulario.precio.value,
        stock: document.formulario.nombre.value,
        tipo: 1
    }

    $.ajax({
        method: "POST",
        data: datos,
        url: "../php/insertar.php",
        success: function(response){
            alert("Los datos han sido ingresados correctamente\n"+response)
        },
        error: function(response){
            alert("Existe un problema con la base de datos")
        }
    })
    
}
function addClient(){

    const datos ={
        nombre: document.formulario.nombre.value,
        cedula: document.formulario.cedula.value,
        direccion: document.formulario.direccion.value,
        tipo: 2
    }
    $.ajax({
        method: "POST",
        data: datos,
        url: "../php/insertar.php",
        success: function(response){
            alert("Los datos han sido ingresados correctamente")
        },
        error: function(response){
            alert("Existe un problema con la base de datos")
        }
    })
}

function addUser(){

    const datos ={
        username: document.formulario.username.value,
        contra: document.formulario.contra.value,
        tipo: 3
    }
    $.ajax({
        method: "POST",
        data: datos,
        url: "../php/insertar.php",
        success: function(response){
            alert("Los datos han sido ingresados correctamente")
        },
        error: function(response){
            alert("Existe un problema con la base de datos")
        }
    })
}

