function getAdm(i) {
    var datos = new FormData();
    datos.append("id", i);
    $("#editCargo").val("");
    $("#editId").val("");
    $("#editPersona").val("");
    $('#editCondicion').html("");
    $.ajax({
        url: "ajax/administrativo.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            let template = '';
            $("#editId").val(respuesta["ID_ADMINISTRATIVO"]);
            $("#editPersona").val(respuesta["NOMBRE"] + ", " + respuesta["APELLIDO_P"] + " " + respuesta["APELLIDO_M"]);
            $("#editCargo").val(respuesta["CARGO"]);
            template += `
                <option>${respuesta["CONDICION"]}</option>
                `
            if (respuesta["CONDICION"] != "Contratado") {
                template += `
                <option>Contratado</option>
                `
            } if (respuesta["CONDICION"] != "Nombrado") {
                template += `
                <option>Nombrado</option>
                `
            } if (respuesta["CONDICION"] != "Tercero") {
                template += `
                <option>Tercero</option>
                `
            }
            $('#editCondicion').html(template);

        }
    });
}

function getBorrarAdm(a) {
    $("#idBorrar").val(a);
}