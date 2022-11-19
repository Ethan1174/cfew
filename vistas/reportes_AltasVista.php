<?php
if (!isset($_SESSION)) {
    session_start();
    $_SESSION['Num'] = 403;
    session_write_close();
    header("Location: ../.");
    die();
}
?>
<div class="container-respons">
    <!-- ---------------------------------------------------------------------------------------------------------------- -->
    <!-- ---------------------------------------------------------------------------------------------------------------- -->
    <!-- Modal para operar resguardos -->
    <!-- ---------------------------------------------------------------------------------------------------------------- -->
    <!-- ---------------------------------------------------------------------------------------------------------------- -->
    <div class="modal fade" id="modalOperarResguardo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Resguardo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="form-horizontal" role="form" accept-charset="UTF-8" name="formResguardo" id="formResguardo" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="container">
                            <table class="table table-condensed">
                                <tr>
                                    <td><label class="control-label"><strong>RPE: </strong></span></td>
                                    <td><input type="text" name="rpeRes" id="rpeRes" class="form-control" value="" disabled></input></td>
                                    <td><label class="control-label"><strong>Fecha de Captura: </strong></label></td>
                                    <td><input type="date" name="fechaCapRes" id="fechaCapRes" step="1" class="inputMod form-control " required></td>
                                </tr>
                            </table>
                        </div>
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-link active" id="pesBien-tab" data-bs-toggle="tab" data-bs-target="#pesBien" role="tab" aria-controls="nav-home" aria-selected="true">Datos del Bien</a>
                                <a class="nav-link" id="pesFactura-tab" data-bs-toggle="tab" data-bs-target="#pesFactura" role="tab" aria-controls="nav-profile" aria-selected="false">Datos de Factura</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="pesOpeRes">
                            <div class="tab-pane fade show active" id="pesBien" role="tabpanel" aria-labelledby="pesBien-tab" tabindex="0">
                                <div class="container-fluid">
                                    <table class="table table-striped">
                                        <tr>
                                            <td>
                                                <label class="control-label"><strong>Clase: </strong></span>
                                            </td>
                                            <td colspan="3">
                                                <select class="form-control" id="claseSelRes" name="listaClases" placeholder="Clase"></select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="control-label"><strong>Subclase: </strong></span>
                                            </td>
                                            <td colspan="3">
                                                <select class="form-control" id="subClaseSelRes" name="listaSubClases" placeholder="SubClase" data-search="true" data-silent-initial-value-set="true"></select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="control-label"><strong>Descripcion: </strong></span></td>
                                            <td colspan="3"><textarea rows="2" cols="40" name="desRes" id="desRes" class="form-control" required></textarea></td>
                                        </tr>
                                        <tr>
                                            <td><label class="control-label"><strong>Marca: </strong></span></td>
                                            <td><input type="text" name="marcaRes" id="marcaRes" class="inputMod form-control" required></input></td>
                                            <td><label class="control-label"><strong>Modelo: </strong></label></td>
                                            <td><input type="text" name="modeloRes" id="modeloRes" class="inputMod form-control" required></input></td>
                                        </tr>
                                        <tr>
                                            <td><label class="control-label"><strong>Serie: </strong></span></td>
                                            <td><input type="text" name="serieRes" id="serieRes" class="inputMod form-control" required></input></td>
                                            <td><label class="control-label"><strong>Unidad: </strong></label></td>
                                            <td>
                                                <select class="inputMod form-control" id="unidadSelRes" name="unidadSelRes" placeholder="Unidad" data-search="true" data-silent-initial-value-set="true">
                                                    <option value="PIEZA">PIEZA</option>
                                                    <option value="KG">KG</option>
                                                    <option value="METRO">METRO</option>
                                                    <option value="LITRO">LITRO</option>
                                                    <option value="LOTE">LOTE</option>
                                                    <option value="CAJA">CAJA</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="control-label"><strong>Cantidad: </strong></span></td>
                                            <td><input type="number" min="1" name="cantidadRes" id="cantidadRes" class="inputMod form-control" value=1 step="any" required></input></td>
                                            <td><label class="control-label"><strong>Importe $: </strong></label></td>
                                            <td><input type="number" min="1" name="importeRes" id="importeRes" class="inputMod form-control" value=1 step="any" required></input></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pesFactura" role="tabpanel" aria-labelledby="pesFactura-tab" tabindex="0">
                                <div class="container">
                                    <table class="table table-striped">
                                        <tr>
                                            <td><label class="control-label"><strong>Número: </strong></span></td>
                                            <td><input type="text" name="numResFac" id="numResFac" class="inputMod form-control "></input></td>
                                            <td><label class="control-label"><strong>Fecha de Factura: </strong></label></td>
                                            <td><input type="date" name="fechaResFac" id="fechaResFac" step="1" class="inputMod form-control"></td>
                                        </tr>
                                        <tr>
                                            <td><label class="control-label"><strong>RFC: </strong></span></td>
                                            <td><input type="text" name="rfcResFac" id="rfcResFac" class="inputMod form-control"></input></td>
                                            <td><label class="control-label"><strong>Posición: </strong></label></td>
                                            <td><input type="number" name="posicionResFac" id="posicionResFac" class="inputMod form-control" min=0 value="0"></input></td>
                                        </tr>
                                        <tr>
                                            <td><label class="control-label"><strong>Archivo: </strong></span></td>
                                            <td><input class="form-control" type="file" id="fileToUpload" name="fileToUpload">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td id="tdPdf" colspan="3">
                                                <div id="archivoPDF"></div>
                                            </td>
                                            <td>
                                                <span id="eliminarPdf"></span>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-success" id="btnguardarCambiosResguardos">Editar Resguardo</button>
                            <input type="hidden" id="rpeRes2" name="rpeRes2" value="" />
                            <input type="hidden" id="idBien" name="idBien" value="" />
                            <input type="hidden" id="accionRes" name="accion" value="Agregar" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ---------------------------------------------------------------------------------------------------------------- -->
    <!-- ---------------------------------------------------------------------------------------------------------------- -->
    <!-- Fin del modal para operar Resguardos -->
    <!-- ---------------------------------------------------------------------------------------------------------------- -->
    <!-- ---------------------------------------------------------------------------------------------------------------- -->
    <div class="container" id="clusterModClase1">
        <h2 class="text-center" id="tituloDepto">Reportes por Altas</h2>
    </div>
    <div class="container">
        <div class="row-fluid">
            <div class="panel panel-info" id="opciones">
                <div class="panelTopCatalogoResguardo">
                    <form role="formTopRes" id="formFiltro">
                        <div class="row">
                            <div class="col-xs-12 col-md-4 col-lg-4">
                                <select name="areaRep" id="area" class="form-control" title="Seleccione la Zona"></select>
                            </div>
                            <div class="col-xs-12 col-md-4 col-lg-4">
                                <input type="date" name="fecha_inicioRep" id="fecha_inicioRep" class="form-control"></input>
                            </div>
                            <div class="col-xs-12 col-md-4 col-lg-4">
                                <input type="date" name="fecha_terminoRep" id="fecha_terminoRep" class="form-control"></input>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div id="toolbar">
            <button type="button" class="btn btn-primary" id="btnEditarResguardoClase" disabled><i class="bi bi-pencil-fill"></i> Editar</button>
            <button id="btnReportes" class="btn btn-secondary"><i class="bi bi-file-earmark-pdf-fill"></i> Generar Reporte</button>
        </div>
        <table id="tablaReporteAltas" data-show-columns="true" data-multiple-select-row="true" data-click-to-select="true" data-show-refresh="true" data-toolbar="#toolbar" data-pagination="true" data-search="true" data-method="post" data-ajax="ajaxRequest" data-query-params="queryParams">
            <thead>
                <tr>
                    <th class="d-none" data-checkbox="true"></th>
                    <th data-field="id_bien" data-sortable="true">ID</th>
                    <th data-field="descripcion" data-sortable="true">Descripcion</th>
                    <th data-field="serie" data-sortable="true">Serie</th>
                    <th data-field="rpe" data-sortable="true">RPE</th>
                    <th data-field="fecha_captura" data-sortable="true">Fecha Captura</th>
                    <th data-field="archivo" data-sortable="true" data-formatter="operateFormatter">Archivo del Bien</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <br>
</div>
<script>
    // -----------------------------------------------------------------------------------------------------------------------------------
    // -----------------------------------------------------------Tabla Resguardo---------------------------------------------------------
    // -----------------------------------------------------------------------------------------------------------------------------------
    $(document).ready(function() {
        var $table = $('#tablaReporteAltas');
        var select = $('#btnEditarResguardoClase');
        $(function() {
            $table.bootstrapTable();
            var $btnReportes = $("#btnReportes");
            $btnReportes.click(() => {
                var reporte = {};
                var url = 'vistas/reportes/reportes.php';
                reporte.user = dataUser.nombre;
                reporte.name = "Lista de bienes por Altas";
                reporte.tipo = "reporteAlta";
                reporte.fecha = fechaHoy;
                reporte.data = $table.bootstrapTable('getData');
                open('POST', url, reporte, '_blank');
            });
        });
        // -----------------------------------------------------------------------------------------------------------------------------------
        // -----------------------------------------------------------Funciones del Panel Resguardo---------------------------------------------------------
        // -----------------------------------------------------------------------------------------------------------------------------------
        f_datos("php/areas.php", {key: keySeguridad}, function(data) {
            $("#fecha_inicioRep").val(hoy_input_date());
            $("#fecha_terminoRep").val(hoy_input_date());
            $("#area").empty();
            $.each(data, function(key, value) {
                $("#area").append('<option value="' + value.clave + '" >' + value.nombre_corto + '</option>');
            });
            $("#area").val(dataUser.area);
            $("#area").trigger("change");
        });
        $("#fecha_inicioRep ,#fecha_terminoRep").off("change").on("change", function(e) {
            $table.bootstrapTable('refresh');
        });
        $(function() {
            $table.on('check.bs.table uncheck.bs.table check-all.bs.table uncheck-all.bs.table', function() {
                select.prop('disabled', !$table.bootstrapTable('getSelections').length);
            });
            select.click(function() {
                var ids = $.map($table.bootstrapTable('getSelections'), function(row) {
                    auxResguardos = row;
                    return row.id
                });
                $table.bootstrapTable('remove', {
                    field: 'id',
                    values: ids
                });
            });
            select.prop('disabled', true);
        });
        // -------------------------------------------------------------------------------------------
        // -------------------------------------CRUD Resguardos-------------------------------------
        // -------------------------------------------------------------------------------------------
        $("#btnguardarCambiosResguardos").click(function() {
            operarResguardo();
        });
        $('#btnEditarResguardoClase').click(function() {
            modificar();
        });
        // -------------------------------------------------------------------------------------------
        // -------------------------------funciones CRUD Modal Resguardo----------------------------------------
        // -------------------------------------------------------------------------------------------
        function operarResguardo() {
            $('#formResguardo').off("submit").on("submit", function(event) {
                event.preventDefault();
                $.ajax({
                    url: 'php/operacionesResguardo.php',
                    method: 'POST',
                    data: new FormData(this),
                    dataType: 'json',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        console.log(data["archivoResguardo"]);
                        if (data.success || data["archivoResguardo"]) {
                            swal(
                                "El resguardo fue operado con exito.", {
                                    icon: "success",
                                }
                            ).then(function() {
                                    $('#modalOperarResguardo').modal('hide');
                                    $table.bootstrapTable('refresh');
                                }
                            );
                        }
                        else {
                            swal(
                                'Error de Operacion',
                                'Hubo un error en la base de datos. ' + data.message,
                                'error'
                            ).then(function() {
                                $('#modalOperarResguardo').modal('hide');
                            });
                        }
                    }
                });
            });
        }
        // Funcion de validación de PDF por su extensión - Tamaño
        $("#fileToUpload").change(function() {
            let file = this.files[0];
            let fileType = file.type;
            // Sacamos el valor en megaBytes
            let fileSize = file.size / 1024;
            let extenOnlyPDF = ['application/pdf'];
            console.log(fileSize);
            if (!(fileType == extenOnlyPDF[0])) {
                swal(
                    'Verifica tu archivo',
                    'Hubo un error al cargar tu archivo, solo se aceptan PDF(s)',
                    'warning'
                );
                $("#fileToUpload").val('');
                return false;
            }
            if (fileSize > 5120) { //No mayor a 5mb
                swal(
                    'Límite de tamaño del archivo',
                    'El archivo es muy grande y no se pudo cargar',
                    'warning'
                );
                $("#fileToUpload").val('');
                return false;
            }
        });
        function modificar() {
            f_datos("php/clases.php", {
                key: keySeguridad
            }, function(data) {
                $(" #claseSelRes").empty();
                $.each(data, function(key, value) {
                    $("#claseSelRes").append('<option value="' + value.id_clase + '" >' + value.id_clase + ' ' + value.descripcion + '</option>');
                });
                if (auxResguardos.archivo != "") {
                    $('#fileToUpload').attr('disabled', 'disabled');
                    $('#archivoPDF').html('<a href="pdf/' + auxResguardos.rpe + '/' + auxResguardos.archivo + '" target="_blank"><img src="imagenes/pdf.ico" title="pdf' + auxResguardos.archivo + '">' + auxResguardos.archivo + '</a>');
                    $("#eliminarPdf").html('<button id="botonEliminarPDF" type="button" class="btn btn-outline-danger"><svg xmlns = "http://www.w3.org/2000/svg"width = "16"height = "16"fill = "currentColor"class = "bi bi-trash3-fill"viewBox = "0 0 16 16" ><path d = "M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" / ></svg>Eliminar PDF </button>')
                }
                else {
                    $('#fileToUpload').removeAttr('disabled');
                    $('#archivoPDF').html("No se encontrarón archivos del bien " + auxResguardos.id_bien + " del trabajador " + auxResguardos.rpe);
                    $("#eliminarPdf").html("");
                }
                $("#fileToUpload").val("");
                $('#rpeRes').val(auxResguardos.rpe);
                $('#rpeRes2').val(auxResguardos.rpe);
                $('#modalOperarResguardo').modal('show');
                $('#accionRes').val('Modificar');
                $("#idBien").val(auxResguardos.id_bien);
                $("#desRes").val(auxResguardos.descripcion);
                $("#marcaRes").val(auxResguardos.marca);
                $("#modeloRes").val(auxResguardos.modelo);
                $("#serieRes").val(auxResguardos.serie);
                $("#unidadSelRes").val(auxResguardos.unidad);
                $("#cantidadRes").val(auxResguardos.cantidad);
                $("#numResFac").val(auxResguardos.numero);
                $("#rfcResFac").val(auxResguardos.rfc);
                $("#fechaResFac").val(auxResguardos.fecha_factura);
                $("#fechaCapRes").val(auxResguardos.fecha_captura);
                $("#posicionResFac").val(auxResguardos.posicion);
                $("#claseSelRes").val(auxResguardos.clase);
                $("select#claseSelRes").trigger("change", auxResguardos.subclase);
                $('#botonEliminarPDF').click(function() {
                    swal({
                        title: "¿Estás seguro de eliminar el archivo " + auxResguardos.archivo + " ?",
                        text: "El archivo no se podrá recuperar una vez hecha esta operación.",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then((willDelete) => {
                        if (willDelete) {
                            eliminarPDF(auxResguardos.id_bien, auxResguardos.rpe, auxResguardos.archivo, "eliminarPDF");
                            swal(
                                "El archivo fue eliminado con exito.", {
                                    icon: "success",
                                }
                            );
                            $('#fileToUpload').removeAttr('disabled');
                            $('#archivoPDF').html("No se encontraron archivos del bien " + auxResguardos.id_bien + " del trabajador " + auxResguardos.rpe);
                            $("#eliminarPdf").html("");
                            $table.bootstrapTable('refresh');
                        } else {
                            swal(
                                'Sin cambios',
                                'Tu archivo sigue guardado',
                                'error'
                            )
                        }
                    });
                });
            });
            $("select#claseSelRes").change(function(event, valor) {
                f_datos("php/subclases.php", {
                    id_clase: $("#claseSelRes option:selected").val(),
                    key: keySeguridad
                }, function(data) {
                    $("#subClaseSelRes").empty();
                    $.each(data, function(key, value) {
                        $("#subClaseSelRes").append('<option value="' + value.id_subclase + '" >' + value.id_subclase + ' ' + value.descripcion + '</option>');
                    });
                    if (valor)
                        $("#subClaseSelRes").val(valor);
                });
            });
        }
        function eliminarPDF(id, rpe, nombreArchivo, accion) {
            $.ajax({
                url: 'php/operacionesResguardo.php',
                method: 'POST',
                data: {
                    idBien: id,
                    rpeRes: rpe,
                    archivo: nombreArchivo,
                    accion: accion
                },
                success: function(data) {
                    console.log(data);
                }
            });
        }
        function detallesShow() {
            $("#modalDetalles #exampleModalLabel").html("Detalles de resguardo Id." + auxResguardos.id_bien);
            $('#rpeResDetalle').val(auxResguardos.rpe);
            $("#fechaCapDetalle").val(auxResguardos.fecha_captura);
            $("#desResDetalles").val(auxResguardos.descripcion);
            $("#importeResBaja").val(auxResguardos.importe);
            $('#modalDetalles').modal('show');
            f_datos("php/selectBienesByHistorico.php", {
                id_bien: auxResguardos.id_bien
            }, function(datHist) {
                console.log(datHist);
                $("#historico tbody").empty();
                $.each(datHist, function(key, value) {
                    tr = $("<tr />").appendTo($("#historico tbody"));
                    $("<td>").html(value.fecha).appendTo(tr);
                    $("<td>").html(value.accion).appendTo(tr);
                    $("<td>").html(value.rpe + " " + value.nombrerpe).appendTo(tr);
                    $("<td>").html(value.usuario + " " + value.nombreusuario).appendTo(tr);
                });
            });
        }
    });
    function operateFormatter(value, row, index) {
        if (row.archivo == "") {
            return [
                '<a href="#"><img src="imagenes/pdfNoFile.ico"></a><span>Sin archivo</span>'
            ].join('')
        } 
        else {
            return [
                '<a href="pdf/' + row.rpe + '/'+row.archivo+'" target="_blank"><img src="imagenes/pdf.ico"></a><span>Ver archivo</span>'
            ].join('')

        }
    }
    function queryParams(params) {
        params.key = keySeguridad;
        params.fecha_inicio = $("#fecha_inicioRep").val();
        params.fecha_termino = $("#fecha_terminoRep").val();
        return params;
    }
    function ajaxRequest(params) {
        var url = 'php/selectAllResguardoAlta.php';
        var data = jQuery.parseJSON(params.data);
        $.post(url, data).then(function(res) {
            if (res.success) {
                params.success(res.data);
            }
            else {
                params.error(res.message);
            }
        });
    }
</script>