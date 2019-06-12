$( document ).ready(function() {
    cargarlistaDuenos();

});
$( "#cliente").change(function() {
    cargarListaMascotas();
});

$( "#mascota").change(function() {
    cargarFormMascotas();
});

function cargarFormMascotas(){
    $("#formulario").empty();
    var mascota = $( "#mascota").val();
    var url = "http://localhost/PruebaTecnica/controlador.php?accion=cargarFormulario"
    $.ajax({
        type: "POST",
        url: url,
        data: {
            "mascota": mascota
        },
        async: false,
        success: function(msg) {
            $("#formulario").append(msg);
        },
        error: function(msg) {
            alert("Error en llamado");
        }
    });

}



function guardar(){

    var idmascota= $("#mascota").val();
    var nuevacita= $("#registronuevo").val();
    if(nuevacita==""){
        alert("Sin Mensaje para la cita");
        return false;
    }

    
     var url = "http://localhost/PruebaTecnica/controlador.php?accion=Guardar";
    $.ajax({
        type: "POST",
        url: url,
        data: {
            "idmascota": idmascota,
            "nuevacita": nuevacita,
        },
        async: false,
        success: function(msg) {
           cargarFormMascotas();
        },
        error: function(msg) {
            alert("Error en llamado");
        }
    });
    return false;
}

function eliminar(id) {

   var url = "http://localhost/PruebaTecnica/controlador.php?accion=Eliminar";
    $.ajax({
        type: "POST",
        url: url,
        data: {
            "segui": id
        },
        async: false,
        success: function(msg) {
           cargarFormMascotas();
        },
        error: function(msg) {
            alert("Error en llamado");
        }
    });
}

function cargarListaMascotas(){
    var cliente = $( "#cliente").val();
    $("#mascota").empty();
    var url = "http://localhost/PruebaTecnica/controlador.php?accion=mostrarmascotas"

$.ajax({
        type: "POST",
        url: url,
        data: {
            "cliente": cliente
        },
        async: false,
        success: function(msg) {
            $("#mascota").append(msg);
        },
        error: function(msg) {
            alert("Error en llamado");
        }
    });

}

function cargarlistaDuenos(){
    var url = "http://localhost/PruebaTecnica/controlador.php?accion=mostrarDuenos"
$.ajax({
        type: "POST",
        url: url,
        async: false,
        success: function(msg) {
            $("#cliente").append(msg);
        },
        error: function(msg) {
            alert("Error en llamado");
        }
    });

}

$("#guardar").click(function(){
	$("#registros").empty();
	var url = 'http://localhost/PruebaTecnica/controlador.php?accion=actualizar'
$.ajax({
        type: "POST",
        url: url,
        data: {
            "tabla": "ciclosfactsig",
            "campo": "nombreempresa",
            "retornos": "idciclo,labelciclo"
        },
        async: false,
        success: function(msg) {
        	$("#registros").append(msg);
          

        },
        error: function(msg) {
            alert("Error en llamado");
        }
    });

});

