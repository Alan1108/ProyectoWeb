function seleccionarUser(){
    var code = {
        codigo: $("#codigo").val(),
        tipo: 1
    }
    $.ajax({
        method: 'POST',
        data: code,
        url: '../php/funcionesBase.php',
        success: function(data){
            var productos = data.split(";")
            document.getElementById("cliente").textContent = productos[0]
            document.getElementById("nombre").textContent = productos[1]
            document.getElementById("cedula").textContent = productos[2]
            document.getElementById("direccion").textContent = productos[3]
        },
        error: function(response){
            alert("No se pudo acceder a la base de productos")
        }
    })

}

function buscarProducto(){
    var code = {
        codigo: $('#cod1').val(),
        tipo: 2
    }
    $.ajax({
        method: 'POST',
        url: '../php/funcionesBase.php',
        data: code,
        success: function(data){
            var productos = data.split(";")
            document.getElementById("descripcion").textContent = productos[0]
            document.getElementById("precio").textContent = productos[1]
            document.getElementById("stock").textContent = productos[2]
        },
        error: function (response) {
            alert("Ha ocurrido un errore en la base de productos")
        }
    })

}

function establecerTotal(){
    if(parseInt($('#quantity').val())>=document.getElementById("stock").textContent){
        alert("No puede vender mas  o el mismo stock mostrado!!")
        inputAux = document.getElementById("quantity").value=""
    }else{
        document.getElementById("total").textContent = parseInt($('#quantity').val()) * parseFloat(document.getElementById("precio").textContent)
    }
}
var total=0
function factura() {
    var update = {
        stock: (document.getElementById("stock").textContent - $('#quantity').val()),
        codigo: document.getElementById("cod1").value,
        tipo: 3 
    }
    var tablaProductos = document.getElementById("productos")
    var trAux = document.createElement("tr")
    var productos = []
    productos.push(document.getElementById("descripcion").textContent)
    productos.push($('#quantity').val())
    productos.push(document.getElementById("precio").textContent)
    productos.push(document.getElementById("total").textContent)
    total+=parseFloat(document.getElementById("total").textContent)
    for (let i = 0; i < productos.length; i++) {
        var tdAux = document.createElement('td')
        tdAux.className= "border px-4 py-2"
        tdAux.textContent = productos[i]
        trAux.appendChild(tdAux)
    }
    tablaProductos.appendChild(trAux)
    document.getElementById("cod1").value=""
    inputAux = document.getElementById("quantity").value=""
    $("#descripcion").text("-")
    $("#stock").text("-")
    $("#precio").text("0.00")
    $("#total").text("0.00")
    
    $.ajax({
        method: 'POST',
        data: update,
        url:'../php/funcionesBase.php',
        error: function(response){
            alert("No se ha podido actualizar la base de productos")
        }
    })
}


function generarFactura() {
    $("#factura").show()
    var productos= document.getElementById("productos")
    document.getElementById("factura_detalle").appendChild(productos)
    $("#ced").text(document.getElementById("cedula").textContent)
    $("#nom").text(document.getElementById("nombre").textContent)
    $("#dir").text(document.getElementById("direccion").textContent)
    window.location.href = "/public/php/addFactura.php#factura"
    productos= document.getElementById("productos")
    $("#subtotal").text(total)
    $("#iva").text(total*0.12)
    $("#sumaTotal").text(total + (total*0.12))
}

function esconderFactura() {
    $("#factura").hide()
}