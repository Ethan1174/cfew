// variables globales de clases
var auxClases = [];
// variables globales de subclases
var auxIDSubC, auxDesSubC = "";
var dataUser = []
var fecha = new Date();
var fechaHoy = fecha.toLocaleDateString() + " a la(s) " + fecha.toLocaleTimeString("es-MX", {
    hour: "2-digit",
    minute: "2-digit",
});

// variables globales de reguardos
var auxResguardos = [];
// variables globales de reguardos bajas
var auxResguardosBajas = [];

function key(string_length) {
    var random_string = ''
    var char = 'abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ'
    var i

    for (i = 0; i < string_length; i++) {
        random_string = random_string + char.charAt(Math.floor(Math.random() * char.length))
    }
    return random_string
}
var keySeguridad = key(50);
// console.log(keySeguridad);
$.post("php/refrescarSesion.php", { key: keySeguridad }, function (data, status) {

    dataUser = data;
    // console.log(dataUser);
});

// -----------------------------------------------------------------------------------------------------------------------------------
// --------------------------------------------------------Helpers, AjaxRequest-------------------------------------------------------
// -----------------------------------------------------------------------------------------------------------------------------------
function messageNoData(titleMessage, text, icon, action) {
    swal({
        title: titleMessage,
        text: text,
        icon: icon,
        dangerMode: true,
    });
}
function f_datos(url, param, fn_cb, fn_err) {
    $.ajax({
        type: "POST",
        url: url,
        data: param
    })
        .done(function (resp) {
            // console.log(resp);
            if (!resp.success) {
                // alert(resp.message, 1);
                messageNoData(resp.message, "", "warning");
                if (fn_err)
                    fn_err(resp.data);
            }
            else {
                if (fn_cb)
                    fn_cb(resp.data);
            }
        });
}
function formToObject(form) {
    arrayForm = $(form).serializeArray();
    var objectForm = {};
    arrayForm.forEach(function (obj, index) {
        objectForm[obj.name] = obj.value;
    });
    return objectForm;
}
function hoy_input_date() {
    var d = new Date();
    var month = d.getMonth() + 1;
    var day = d.getDate();
    var year = d.getFullYear();
    var today = year + '-' + (month < 10 ? '0' : '') + month + '-' + (day < 10 ? '0' : '') + day;
    return today;
}
// // Se edita el formato de retorno de la primer columna de la tabla a imprimir, el resultado es una numeración de las filas
// function stateFormatter(value, row, index) {
//     // Iniciamos desde el numero 1
//     index = index + 1;
//     return index
// }

function cargarTablaBT(tablaDinamica, nombreTabla) {
    $(tablaDinamica).bootstrapTable({
        printPageBuilder: function (table) {
            if (nombreTabla == "Lista de bienes") {
                user = $("#Panelrpe option:selected").html();
            }
            else {
                user = $(".name").html();
            }
            return `
            <html>
                <head>
                    <style type="text/css" media="print">
                        @page {
                            size: auto;
                            margin: 25px 0 25px 0;
                        }
                    </style>
                    <style type="text/css" media="all">
                        body {
                            font-family: sans-serif;
                        }
                        table {
                            border-collapse: collapse;
                            font-size: 12px;
                        }
                        table, th, td {
                            border: 1px solid grey;
                        }
                        th, td {
                            text-align: left;
                            vertical-align: middle;
                            font-size: 15px;
                            padding: 5px;
                        }
                        p {
                            font-weight: bold;
                            margin-left:20px;
                        }
                        small {
                            margin-left:25px;
                            color: gray
                        }
                        table {
                            width:94%;
                            margin-left:3%;
                            margin-right:3%;
                        }
                        div.bs-table-print {
                            text-align:center;
                        }
                        .boxMod1 {
                            text-align: center;
                            border-bottom: 2.5px solid grey;
                        }
                        .boxMod1 small {
                            color: gray
                        }
                        .head {
                            padding: 3%; 
                            letter-spacing: 0.07em;
                           
                        }   
                        .firma{
                            padding:150px;
                        }                      
                        .line{
                            border-top: 1px solid black;
                            height: 2px;
                            width: 300px;
                            padding: 0;
                            margin: 50px auto 0 auto;
                        }    
                        .container-firmas{
                            display: grid;
                            grid-gap: 8px;
                            grid-template-columns: repeat(2, 1fr)
                        }                  
                    </style>
                </head>
                <title>Reporte BMPC</title>
                <header>
                    <small>Reporte generado el dia ${fechaHoy}</small>
                    <div class="row head">
                        <div class="col-md">
                            <img src="http://localhost/respc_v2.1/imagenes/logo2.png" alt="Logo CFE" width="150" height="100">
                        </div>
                        <div class="col-md boxMod1">
                            <small>
                                Gerencia Regional de Transmisión Sureste 
                                <br>
                                Zona de Transmisión Malpaso
                            </small>
                            <p>Sistema de Control de Resguardo Poca Cuantía</p>
                            <h4>${nombreTabla}</h4>
                        </div>
                    </div>
                </header>
                <body>
                    <div class="bs-table-print">${table}</div>
                    <center>
                        <div class="container-firmas">
                            <div class="firma">
                                <div class="line"><br>Resguarda</div>
                                <h5>
                                    <br>
                                    ${user}       
                                </h5>
                            </div>
                            <div class="firma">
                                <div class="line"><br>Administrador</div>
                            </div>
                        </div>
                    </center>
                </body>
            </html>
            `
        }
    });
}