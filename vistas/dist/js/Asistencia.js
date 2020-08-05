$(document).ready(function () {
    //Editar
    $(".btnEditar").click(function () {
        var idUsuario = $(this).attr("idEditar");
        var datos = new FormData();
        datos.append("idEditar", idUsuario);
        $.ajax({
            url: "ajax/asistencia.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {
                $("#idNewEditar").val(respuesta["ID_ASISTENCIA"]);
                $("#Entrada").val(respuesta["ENTRADA_HORA"]);
            }
        });
    });

});

function getObservacion(i) {
    var datos = new FormData();
    datos.append("observacion", i);
    $.ajax({
        url: "ajax/asistencia.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            $("#id").val(respuesta["ID_ASISTENCIA"]);
            $("#Per").val(respuesta["NOMBRE"] + ", " + respuesta["APELLIDO_P"] + " " + respuesta["APELLIDO_M"]);
            $("#Tur").val(respuesta["TURNO"] + " - " + respuesta["DIA"]);
            $("#Hora").val(respuesta["ENTRADA_HORA"]);
            $("#SALIDA").val(respuesta["HORA_SALIDA"]);
            //convercion de fecha 
            var texto = respuesta["ENTRADA_FECHA"];
            var salida = formato(texto); 
            $("#Fec").val(salida); 
            $('#selectv').val(respuesta["CATEGORIA"]);
            $('#selectId').val(respuesta["ID_CATEGORIA_ASI"]);
            $("#Obser").val(respuesta["OBSERVACION"]);

        }
    });
}
/**
 * Convierte un texto de la forma 2017-01-10 a la forma
 * 10/01/2017
 *
 * @param {string} texto Texto de la forma 2017-01-10
 * @return {string} texto de la forma 10/01/2017
 *
 */
function formato(texto) {
    return texto.replace(/^(\d{4})-(\d{2})-(\d{2})$/g, '$3/$2/$1');
}
//No esta en uso, es para Ajax
function getBuscar() {
    var FechaI = $('#FechaIn').val();
    var FechaF = $('#FechaFi').val();
    var datos = new FormData();
    datos.append("FechaIn", FechaI);
    datos.append("FechaFi", FechaF);
    $.ajax({
        url: "ajax/asistencia.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            alert(respuesta);
            let template = '';
            //CUERPO
            template += `
            <table class="table table-bordered table-hover Data-T table-sm dt-responsive text-center"
                style="width:100%">
            <thead>
                            <tr>
                                <th style="width: 10px">N°</th>
                                <th style="width: 10px">N° Documento</th>
                                <th>Personal</th>
                                <th style="width: 10px">Celular</th>
                                <th style="width: 10px">Turno</th>
                                <th style="width: 10px">Dia</th>
                                <th style="width: 10px">Fecha</th>
                                <th style="width: 10px">Entrada</th>
                                <th style="width: 10px">Salida</th>
                                <th style="width: 10px">Estado</th>
                                <th>Observación</th>
                            </tr>
                        </thead>
                        <tbody>
            `
            for (const [key, value] of Object.entries(respuesta)) {


                template += `
                <tr>                
                <td> ${key}</td>
                <td> ${value.ID_PERSONA}</td>
                `
                if (value.POSICION_CH > 0 && value.POSICION_CH < 10) {
                    template += `
                <td><a href="vistas/2020-I/JornadaLaboral/J0${value.POSICION_CH}.pdf" target="_blank"> ${value.NOMBRE}, ${value.APELLIDO_P} ${value.APELLIDO_M} </a></td>
                `
                } else if (value.POSICION_CH == null) {
                    template += `
                <td>${value.NOMBRE}, ${value.APELLIDO_P} ${value.APELLIDO_M}</td>
                `
                }
                else {
                    template += `
                <td><a href="vistas/2020-I/JornadaLaboral/J${value.POSICION_CH}.pdf" target="_blank"> ${value.NOMBRE}, ${value.APELLIDO_P} ${value.APELLIDO_M} </a></td>
                `
                }

                //arreglando fecha de hoy

                var date = value.ENTRADA_FECHA;
                var newdate = date.split("-").reverse().join("/");

                template += `
               
                <td> ${value.CELULAR}</td>
                <td> ${value.TURNO}</td>
                <td> ${value.DIA}</td>
                <td> ${newdate}</td>
                <td> ${value.ENTRADA_HORA}</td>
                
                `
                if (value.HORA_SALIDA == null) {
                    template += `               
                <td> </td>
                `}
                else {
                    template += `               
                <td>${value.HORA_SALIDA} </td>
                `}

                //validando fecha de hoy
                var f = new Date();
                var fecha = (f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear());
                if (value.CATEGORIA == 'En Turno' && newdate == fecha) {
                    template += `               
                <td><span class="badge badge-warning"> ${value.CATEGORIA} </span></td>
                
                `
                } else if (newdate != fecha && value.CATEGORIA == 'En Turno') {
                    template += `               
                    <td><span class="badge badge-danger"> Falto </span></td>
                    
                    `
                }
                else {
                    template += `               
                        <td><span class="badge badge-success"> ${value.CATEGORIA}</span></td>                        
                        `}

                template += `                
               
                <td><a class="text-primary" href="#"  onclick="getObservacion('.$value["ID_ASISTENCIA"].')" data-toggle="modal" data-target="#modalObservacion"><i class="fas fa-pen-square"></i></a>&nbsp;&nbsp; ${value.OBSERVACION}</td> 
                </tr> 
                </tbody>
                </table>
                `
            }
            $('#tabla').html(template);
        }
    });
}
