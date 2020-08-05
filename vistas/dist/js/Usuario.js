
$(document).ready(function () {
    //Subiendo foto
    $(".nuevaFoto").change(function () {
        var imagen = this.files;
        console.log("imagen", imagen);
    });

    //Editar Usuario
    /*
    $(".btnEditarUsuario").click(function () {
        console.log('Entrando al click');
        var idUsuario = $(this).attr("idUsuario");
        console.log(idUsuario);
        var datos = new FormData();
        datos.append("idUsuario", idUsuario);
        console.log(datos);
        $.ajax({
            url: "ajax/usuario.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {
                $("#EditDni").val(respuesta["ID_PERSONA"]);
                $("#id").val(respuesta["ID_USUARIO"]);
                $("#Per").val(respuesta["NOMBRE"] +", "+ respuesta["APELLIDO_P"]);
            }
        });
    });
*/
});   

function getUser(i){ 
    var datos = new FormData();
    datos.append("id", i); 
    $.ajax({
        url: "ajax/usuario.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            $("#EditDni").val(respuesta["ID_PERSONA"]);
            $("#id").val(respuesta["ID_USUARIO"]);
            $("#Per").val(respuesta["NOMBRE"] +", "+ respuesta["APELLIDO_P"]);
        }
    });
}