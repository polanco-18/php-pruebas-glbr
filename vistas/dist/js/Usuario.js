

function getUser(i) {
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
            $("#Per").val(respuesta["NOMBRE"] + ", " + respuesta["APELLIDO_P"]);
            var ROL = respuesta["ROL"];
            if (ROL == 1) {
                ROL = "Admin";
            } else if (ROL == 2) {
                ROL = "Unidad Academica";
            } else if (ROL == 3) {
                ROL = "Recursos Humanos";
            } else {
                ROL = "Normal";
            }
            $("#ROL").val(respuesta["ROL"]);
            $("#ROL").text(ROL);
        }
    });
}

function getEstado(a, b) {
    if (a == 0) {
        $("#Estado").text("desactivar");
        $("#Estadobtn").text("desactivar");
        $("#valueEstado").val(a);
        $("#idEstado").val(b);
    } else {
        $("#idEstado").val(b);
        $("#valueEstado").val(a);
        $("#Estadobtn").text("activar");
        $("#Estado").text("activar");
    }
}
function getBorrar(a) {
    $("#idBorrar").val(a);
}