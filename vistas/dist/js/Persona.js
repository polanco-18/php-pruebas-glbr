


$(document).ready(function () {
    //validar tipo de documetno
    $("select.Tipo-Nacionalidad").change(function () {
        var selected = $(this).children("option:selected").val();
        if (selected === "DNI") {//peruanos   
            //set nacionalidad
            $('#ingNacionalidad').val("Peruana");
            $('#ingDocumento').val("");
            //limitar input
            $("#ingDocumento").attr('maxlength', '8');
        } else {//estranjeros
            var element = document.getElementById("Peruana"); 
            //cleaning input
            $('#ingApellido_p').val("");
            $('#ingNombre').val("");
            $('#ingApellido_m').val("");
            $('#ingDocumento').val("");
            $('#ingNacionalidad').val("");
            //limitar input
            $("#ingDocumento").attr('maxlength', '15');
        }
    }); 
});

function getPer(i) {
    var datos = new FormData();
    datos.append("id", i);
    $.ajax({
        url: "ajax/persona.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) { 
            $("#NV-Nac").text(respuesta["NACIONALIDAD"]);
            $("#NV-NUM").text(respuesta["ID_PERSONA"]);
            $("#NV-DOC").text(respuesta["TIPO_DOCUMENTO"]);
            $("#NV-NOM").text(respuesta["NOMBRE"]);
            $("#NV-APE-P").text(respuesta["APELLIDO_P"]);
            $("#NV-APE-M").text(respuesta["APELLIDO_M"]);
            if (respuesta["SEXO"] == 0) {
                $("#NV-SEX").text('Femenino');
            } else {
                $("#NV-SEX").text('Masculino');
            }
            $("#NV-FECHA").text(respuesta["FECHA_NACIMIENTO"]);
            $("#NV-CORREO").text(respuesta["CORREO"]);
            $("#NV-CORREO_INST").text(respuesta["CORREO_INST"]); 
            $("#NV-TELEFONO").text(respuesta["TELEFONO"]);
            $("#NV-CELULAR").text(respuesta["CELULAR"]);  
        }
    });
}
