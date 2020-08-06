function getAsigPlazaV(i) {
    var datos = new FormData();
    datos.append("idBuscar", i);
    $("#editId").val("");
    $("#editPersona").val("");
    $("#editSemestre").val("");
    $("#editCargo").val("");
    $("#editCH").val("");

    $('#TipoE').html("");

    $('#editArea').html("");
    $.ajax({
        url: "ajax/AsigPlazaVacante.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            $("#editId").val(respuesta["ID_ASIG_PLAZA_V"]);
            $("#editPersona").val(respuesta["NOMBRE"] + ", " + respuesta["APELLIDO_P"] + " " + respuesta["APELLIDO_M"]);
            $("#editSemestre").val(respuesta["SEMESTRE"]);
            $("#editCargo").val(respuesta["CARGO"]);
            $("#editCH").val(respuesta["POSICION_CH"]);
            let template = '';
            if (respuesta["ESTADO"] == 1) {
                template += `
                <option value="1">Activo</option> 
                <option value="0">Desactivo</option>
                `
            } else {
                template += `
                <option value="0">Desactivo</option>
                <option value="1">Activo</option> 
                `
            }
            $('#TipoE').html(template);
            $("#editObservacion").val(respuesta["OBSERVACION"]);  
            if (respuesta["ESTADO"]==0) {
                var element = document.getElementById("obArea");
                element.classList.remove("hide");
            } 
        }
    });
}
$(document).ready(function () {
    //validar tipo de documetno
    $("select.Tipo-Estado").change(function () {
        var selected = $(this).children("option:selected").val();
        if (selected == "0") {
            var element = document.getElementById("obArea");
            element.classList.remove("hide");
            $("#editObservacion").attr('required'); 
        }if (selected == "1") {
            var element = document.getElementById("obArea");
            element.classList.add("hide"); 
            $("#obArea").val(""); 
        }
    });

}); 
