$( document ).ready(function() {
crearmascota();
});
$( "#cliente").change(function() {
    cargarListaMascotas();
});

$( "#mascota").change(function() {
    cargarFormMascotas();
});

$( "#guardardatos").click(function() {
    guardarIngreso();
});




function crearmascota(){
$('#citamascota').hide();
$('#agregarmascota').show();
}
function crearingreso(){
    $('#citamascota').show();
$('#agregarmascota').hide();
}


function cargarListaMascotas(){
    var cliente = $( "#cliente").val();
    if(cliente>0){
    $("#mascota").empty();
    var url = "index.php/Welcome/mostrarMascotas"

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
} else{
    $("#mascota").empty();
}
}

function cargarFormMascotas(){
    var mascota = $( "#mascota").val();
    if(mascota=="0000"){

        crearmascota();
        return false;
    }
    if(mascota>0){
        crearingreso();
    $("#resumenMascota").empty();
    var url = "index.php/Welcome/MostrarResumenMascota"

$.ajax({
        type: "POST",
        url: url,
        data: {
            "mascota": mascota
        },
        async: false,
        success: function(msg) {
            $("#resumenMascota").append(msg);
        },
        error: function(msg) {
            alert("Error en llamado");
        }
    });
        }
}


function Eliminar (id){

    
     var url = "index.php/Welcome/Eliminar";
    $.ajax({
        type: "POST",
        url: url,
        data: {
            "id": id,
        },
        async: false,
        success: function(msg) {
            alert ('registro eliminado');
           Restaurar();
        },
        error: function(msg) {
            alert("Error en llamado");
        }
    });
    return false;


}
function guardarIngreso(){

    var idmascota= $("#mascota").val();
    var nuevacita= $("#agregartextare").val();
    if(nuevacita==""){
        alert("Descripcion Solicitud");
        return false;
    }

    
     var url = "index.php/Welcome/guardarIngreso";
    $.ajax({
        type: "POST",
        url: url,
        data: {
            "idmascota": idmascota,
            "nuevacita": nuevacita,
        },
        async: false,
        success: function(msg) {
            alert ('Ingreso Guardado');
           Restaurar();
        },
        error: function(msg) {
            alert("Error en llamado");
        }
    });
    return false;
}

function guardarunamascota(){


    var tipomascota= $("#tipomascota").val();
    var selectedci = $('input:radio[name=tamano]:checked').val();
    var nombremascotaform= $("#nombremascotaform").val();
    var idcliente= $("#cliente").val();
    if(nombremascotaform==""){
        alert("Ingrese Nombre de Mascota");
        return false;
    }

    
     var url = "index.php/Welcome/guardarMascota";
    $.ajax({
        type: "POST",
        url: url,
        data: {
            "tipomascota": selectedci,
            "selectedci": selectedci,
            "nombremascotaform":nombremascotaform,
            "idcliente":idcliente
        },
        async: false,
        success: function(msg) {

            alert ('Mascota Guardada');
           Restaurar();
        },
        error: function(msg) {
            alert("Error en llamado");
        }
    });
    return false;
}


function Restaurar() {
    window.location = "index.php";
}




