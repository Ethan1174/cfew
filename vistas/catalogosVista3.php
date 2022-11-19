<?php
// session_start();
if (!isset($_SESSION)) {
    // echo '<script>alert("No tienes permitido navegar por URL"); window.location ="../."</script>';
    // die();
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
    <!-- Modal para operar Resguardos -->
    <!-- ---------------------------------------------------------------------------------------------------------------- -->
    <!-- ---------------------------------------------------------------------------------------------------------------- -->
    <div class="modal fade" id="modalOperarResguardo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Resguardo</h5>
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
                                            <td><label class="control-label"><strong>Clase: </strong></span></td>
                                            <td colspan="3">
                                                <select class="form-control" id="claseSelRes" name="listaClases" placeholder="Clase"></select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="control-label"><strong>Subclase: </strong></span></td>
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
                            <button type="submit" class="btn btn-success" id="btnguardarCambiosResguardos">Registrar Resguardo</button>
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

    <!-- ---------------------------------------------------------------------------------------------------------------- -->
    <!-- ---------------------------------------------------------------------------------------------------------------- -->
    <!-- Inicio del modal para traspasar reguardos -->
    <!-- ---------------------------------------------------------------------------------------------------------------- -->
    <!-- ---------------------------------------------------------------------------------------------------------------- -->
    <div class="modal fade" id="modalTraspasarResguardo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Traspasar Resguardo Id. N</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="form-horizontal" role="form" accept-charset="UTF-8" name="formTraspaso" id="formTraspaso" method="POST">
                    <div class="modal-body">
                        <div class="container">
                            <table class="table table-condensed">
                                <tr>
                                    <td><label class="control-label"><strong>RPE Actual: </strong></span></td>
                                    <td><input type="text" name="rpeRes" id="rpeAct" class="form-control" value="" disabled></input></td>
                                    <td><label class="control-label"><strong>Fecha de Captura: </strong></label></td>
                                    <td><input type="date" name="fechaCap" id="fechaCap" step="1" class="form-control" disabled></td>
                                </tr>
                                <tr>
                                    <td><label class="control-label"><strong>Nuevo RPE: </strong></span></td>
                                    <td>
                                        <select class="form-control" id="rpeNuevo" name="rpeNuevo" placeholder="Elige un RPE" data-search="true" data-silent-initial-value-set="true" require></select>
                                    </td>
                                    <td><label class="control-label"><strong>Fecha de Traspaso: </strong></label></td>
                                    <td><input type="date" name="fechaTras" id="fechaTras" step="1" class="form-control" required></td>
                                </tr>
                                <tr>
                                    <td><label class="control-label"><strong>Descripcion: </strong></span></td>
                                    <td colspan="3"><textarea rows="2" cols="40" name="desRes" id="desResTras" class="form-control" disabled></textarea></td>
                                </tr>
                                <tr>
                                    <td><label class="control-label"><strong>Marca: </strong></span></td>
                                    <td><input type="text" name="marcaRes1" id="marcaResTras" class="form-control" disabled></input></td>
                                    <td><label class="control-label"><strong>Modelo: </strong></label></td>
                                    <td><input type="text" name="modeloRes1" id="modeloResTras" class="form-control" disabled></input></td>
                                </tr>
                                <tr>
                                    <td><label class="control-label"><strong>Cantidad: </strong></span></td>
                                    <td><input type="number" min="1" name="cantidadRes" id="cantidadResTras" class="form-control" step="any" disabled></input></td>
                                    <td><label class="control-label"><strong>Importe $: </strong></label></td>
                                    <td><input type="number" min="1" name="importeRes" id="importeResTras" class="form-control" step="any" disabled></input></td>
                                </tr>
                                <tr>
                                    <td><label class="control-label"><strong>Nombre del Archivo: </strong></span></td>
                                    <td><input type="text" name="nomArchivo" id="nomArchivo" class="form-control" disabled></input></td>
                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-success" id="btntraspasarResguardo">Traspasar</button>
                            <input type="hidden" id="rpeRes2Tras" name="rpeRes" value="" />
                            <input type="hidden" id="idBienTras" name="idBien" value="" />
                            <input type="hidden" id="archivoTras" name="archivo" value="" />
                            <input type="hidden" id="accionResTras" name="accion" value="Traspasar" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ---------------------------------------------------------------------------------------------------------------- -->
    <!-- ---------------------------------------------------------------------------------------------------------------- -->
    <!-- Fin del modal para traspasar Resguardos -->
    <!-- ---------------------------------------------------------------------------------------------------------------- -->
    <!-- ---------------------------------------------------------------------------------------------------------------- -->



    <!-- ---------------------------------------------------------------------------------------------------------------- -->
    <!-- ---------------------------------------------------------------------------------------------------------------- -->
    <!-- Inicio del modal para dar de baja Resguardos -->
    <!-- ---------------------------------------------------------------------------------------------------------------- -->
    <!-- ---------------------------------------------------------------------------------------------------------------- -->
    <div class="modal fade" id="modalDarBajaResguardo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Dar de Baja Resguardo Id. N</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="form-horizontal" role="form" accept-charset="UTF-8" name="formDarBaja" id="formDarBaja" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="container-fluid">
                            <table class="table table-condensed">
                                <tr>
                                    <td><label class="control-label"><strong>Motivo Baja: </strong></span></td>
                                    <td><input type="text" name="motBaja" id="motBaja" class="inputMod form-control" value="" required></input></td>
                                    <td><label class="control-label"><strong>Fecha de Baja: </strong></label></td>
                                    <td><input type="date" name="fechaBaja" id="fechaBaja" step="1" class="inputMod form-control" required></input></td>
                                </tr>
                                <tr>
                                    <td><label class="control-label"><strong>Archivo Dictamen: </strong></span></td>
                                    <td><input class="form-control" type="file" id="fileToUploadDictamen" name="fileToUploadDictamen" required></input></td>
                                </tr>
                                <tr>
                                    <td><label class="control-label"><strong>RPE Actual: </strong></span></td>
                                    <td><input type="text" name="rpeRes" id="rpeActBaja" class="inputMod form-control" value="" disabled></input></td>
                                    <td><label class="control-label"><strong>Fecha de Captura: </strong></label></td>
                                    <td><input type="date" name="fechaCapBaja" id="fechaCapBaja" step="1" class="inputMod form-control" disabled></td>
                                </tr>
                                <tr>
                                    <td><label class="control-label"><strong>Descripcion: </strong></span></td>
                                    <td colspan="3"><textarea rows="2" cols="40" name="desResBaja" id="desResBaja" class="form-control" disabled></textarea></td>
                                </tr>
                                <tr>
                                    <td><label class="control-label"><strong>Marca: </strong></span></td>
                                    <td><input type="text" name="marcaResBaja" id="marcaResBaja" class="inputMod form-control" disabled></input></td>
                                    <td><label class="control-label"><strong>Modelo: </strong></label></td>
                                    <td><input type="text" name="modeloResBaja" id="modeloResBaja" class="inputMod form-control" disabled></input></td>
                                </tr>
                                <tr>
                                    <td><label class="control-label"><strong>Cantidad: </strong></span></td>
                                    <td><input type="number" min="1" name="cantidadResBaja" id="cantidadResBaja" class="inputMod form-control" step="any" disabled></input></td>
                                    <td><label class="control-label"><strong>Importe $: </strong></label></td>
                                    <td><input type="number" min="1" name="importeResBaja" id="importeResBaja" class="inputMod form-control" step="any" disabled></input></td>
                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-success" id="btndarDeBajaResguardo">Dar de Baja</button>
                            <input type="hidden" id="rpeRes3" name="rpeRes" value="" />
                            <input type="hidden" id="idBienBaja" name="idBien" value="" />
                            <input type="hidden" id="accionResBaja" name="accion" value="Bajar" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ---------------------------------------------------------------------------------------------------------------- -->
    <!-- ---------------------------------------------------------------------------------------------------------------- -->
    <!-- Fin del modal para dar de bajas Resguardos -->
    <!-- ---------------------------------------------------------------------------------------------------------------- -->
    <!-- ---------------------------------------------------------------------------------------------------------------- -->

    <!-- ---------------------------------------------------------------------------------------------------------------- -->
    <!-- ---------------------------------------------------------------------------------------------------------------- -->
    <!-- Inicio del modal para DETALLES reguardos -->
    <!-- ---------------------------------------------------------------------------------------------------------------- -->
    <!-- ---------------------------------------------------------------------------------------------------------------- -->

    <div class="modal fade" id="modalDetalles" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detalles</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <table class="table table-condensed">
                            <tr>
                                <td><label class="control-label"><strong>RPE: </strong></span></td>
                                <td><input type="text" id="rpeResDetalle" class="inputMod form-control" value="" disabled></input></td>
                                <td><label class="control-label"><strong>Fecha de Captura: </strong></label></td>
                                <td><input type="date" name="fechaCapDetalle" id="fechaCapDetalle" step="1" class="inputMod form-control" disabled></td>
                            </tr>
                            <tr>
                                <td><label class="control-label"><strong>Descripcion: </strong></span></td>
                                <td colspan="3">
                                    <textarea cols="40" id="desResDetalles" class="form-control" disabled></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" colspan="4">
                                    <label class="control-label"><strong>HISTORIAL DEL BIEN</strong></span>
                                </td>

                            </tr>
                            <tr>
                                <td colspan="4">
                                    <small>
                                        <table id="historico" class="table table-condensed table-bordered table-stripped">
                                            <thead>
                                                <tr>
                                                    <th>Fecha</th>
                                                    <th>Acción</th>
                                                    <th>Resguardante</th>
                                                    <th>Usuario</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </small>

                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ---------------------------------------------------------------------------------------------------------------- -->
    <!-- ---------------------------------------------------------------------------------------------------------------- -->
    <!-- Fin del modal para DETALLES Resguardos -->
    <!-- ---------------------------------------------------------------------------------------------------------------- -->
    <!-- ---------------------------------------------------------------------------------------------------------------- -->
    <div class="container" id="clusterModClase1">
        <h2 class="text-center" id="tituloDepto">Catálogo de Resguardos</h2>
    </div>
    <div class="container">
        <div class="row-fluid">
            <div class="panel panel-info" id="opciones">

                <div class="panelTopCatalogoResguardo">

                    <form role="formTopRes" id="formFiltro">
                        <div class="row">
                            <div class="col-xs-12 col-md-4 col-lg-4">
                                <select name="area" id="areaR" class="form-control" title="Seleccione la Zona"></select>
                            </div>
                            <div class="col-xs-12 col-md-4 col-lg-4">
                                <select name="depto" id="deptoR" class="form-control" title="Seleccione la especialidad"></select>
                            </div>
                            <div class="col-xs-12 col-md-4 col-lg-4">
                                <select name="rpe" id="Panelrpe" class="form-control" title="Seleccione el RPE"></select>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div id="toolbar">
            <button type="button" class="btn btn-success" id="btnAgregarResguardo" data-bs-toggle="modal" data-bs-target="#modalOperarResguardo"><i class="bi bi-plus-circle-fill"></i> Agregar</button>
            <button type="button" disabled class="btn btn-primary dropdown-toggle" id="btnOpcionesResguardos" data-bs-toggle="dropdown"> <i class="bi bi-pencil-fill"></i> Opciones</button>
            <ul class="dropdown-menu">
                <li><button type="button" class="btn btn-primary dropdown-item" id="btnEditarResguardo"> <i class="bi bi-pencil-fill"></i> Editar</button></li>
                <li><button type="button" class="btn btn-primary dropdown-item" id="btnDarBaja"><i class="bi bi-hand-thumbs-down"></i> Bajar</button></li>
                <li><button type="button" class="btn btn-primary dropdown-item" id="btnTraspasar"><i class="bi bi-arrow-left-right"></i> Traspasar</button></li>
                <li><button type="button" class="btn btn-primary dropdown-item" id="btnDetalles"><i class="bi bi-info-circle"></i> Detalles</button></li>
                <li><button type="button" class="btn btn-danger dropdown-item" id="btnEliminarResguardo"><i class="bi bi-trash3"></i> Eliminar</button></li>
            </ul>
            <button id="btnReportes" class="btn btn-secondary"><i class="bi bi-file-earmark-pdf-fill"></i> Generar Reporte</button>
        </div>
        <table id="tablaResguardo" data-show-columns="true" data-multiple-select-row="true" data-click-to-select="true" data-show-refresh="true" data-toolbar="#toolbar" data-pagination="true" data-search="true" data-method="post" data-ajax="ajaxRequest" data-query-params="queryParams">
            <thead>
                <tr>
                    <th class="d-none" data-field="state" data-checkbox="true" data-print-ignore="true"></th>
                    <th data-field="id_bien" data-sortable="true">ID</th>
                    <th data-field="descripcion" data-sortable="true">Descripcion</th>
                    <th data-field="serie" data-sortable="true">Serie</th>
                    <th data-field="cantidad" data-sortable="true">Can.</th>
                    <th data-field="unidad" data-sortable="true">Uni.</th>
                    <th data-field="importe" data-sortable="true">Importe</th>
                    <th data-field="fecha_captura" data-sortable="true">Fecha Captura</th>
                    <th data-field="rpe" data-sortable="true" data-visible="false">rpe</th>
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
        var $table = $('#tablaResguardo');
        var select = $('#btnOpcionesResguardos');
        var rpeR = "";

        $(function() {
            $table.bootstrapTable();
            var $btnReportes = $("#btnReportes");
            $btnReportes.click(() => {
                var reporte = {};
                var url = 'vistas/reportes/reportes.php';
                reporte.user = $("#Panelrpe option:selected").html();
                reporte.name = "Lista de bienes";
                reporte.tipo = "resguardo"
                reporte.data = $table.bootstrapTable('getData');
                console.log(reporte);
                open('POST', url, reporte, '_blank');
                // console.log(obtenerDataReporte);
            });
        });

        // -----------------------------------------------------------------------------------------------------------------------------------
        // -----------------------------------------------------------Funciones del Panel Resguardo---------------------------------------------------------
        // -----------------------------------------------------------------------------------------------------------------------------------

        f_datos("php/areas.php", {
            key: keySeguridad
        }, function(data) {
            $("#areaR").empty();
            // console.log(data);
            $.each(data, function(key, value) {
                $("#areaR").append('<option value="' + value.clave + '" >' + value.nombre_corto + '</option>');
            });
            $("#areaR").val(dataUser.area);
            $("#areaR").trigger("change");
        });

        $("#areaR").off("change").on("change", function(e) {
            if ($table) $table.bootstrapTable('removeAll');
            f_datos("php/deptos.php", {
                key: keySeguridad
            }, function(datDep) {
                // console.log(datDep);
                $("#deptoR").empty();
                $.each(datDep, function(key, value) {
                    $("#deptoR").append('<option value="' + value.cl_cenco + '" >' + value.Descripcion + '</option>');
                });
                $("#deptoR").trigger("change");
            });
        });

        $("#deptoR").off("change").on("change", function(e) {
            f_datos("php/empleados.php", {
                area: $("#areaR").val(),
                depto: $("#deptoR").val(),
                key: keySeguridad,
            }, function(datEmp) {
                // console.log(datEmp);
                $("#Panelrpe").empty();
                $.each(datEmp, function(key, value) {
                    $("#Panelrpe").append('<option value="' + value.rpe + '" >' + value.rpe + " " + value.nombre + '</option>');
                });
                $("#Panelrpe").trigger("change");

            });
        });

        $("#Panelrpe").off('change').on('change', function(e) {
            // console.log($(this).val());
            // $("#userPrint").val($("#Panelrpe option:selected")[0].textContent);
            // $usuarioElegido = $("#Panelrpe option:selected")[0].textContent;

            // Este rpe es capturado para enviarlo por post para agregar Resguardos
            rpeR = $("#Panelrpe").val();
            // console.log($("#Panelrpe option:selected").html());



            $table.bootstrapTable('refresh');
        });
        $(function() {
            $table.on('check.bs.table uncheck.bs.table check-all.bs.table uncheck-all.bs.table', function() {
                select.prop('disabled', !$table.bootstrapTable('getSelections').length);
            });

            select.click(function() {
                var ids = $.map($table.bootstrapTable('getSelections'), function(row) {
                    auxResguardos = row;
                    // console.log(auxResguardos);
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
        $('#btnAgregarResguardo').click(function() {
            agregar();
        });

        $("#btnguardarCambiosResguardos").click(function() {
            operarResguardo();
        });

        $('#btnEditarResguardo').click(function() {
            modificar();
        });

        $('#btnEliminarResguardo').click(function() {
            console.log("Archivo a eliminar " + auxResguardos.archivo);
            swal({
                title: "¿Estás seguro de eliminar la clase " + auxResguardos.id_bien + " ?",
                text: "El resguardo no se podrá recuperar una vez hecha esta operación.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {

                if (willDelete) {
                    eliminarResguardo(auxResguardos.id_bien, auxResguardos.rpe, auxResguardos.archivo);
                    $('#modalOperarResguardo').modal('hide');
                    $table.bootstrapTable('refresh');
                } else {
                    swal(
                        'Sin cambios',
                        'No se realizó ninguna operación.',
                        'error'
                    )
                }
            });
        });
        $('#btnTraspasar').click(function() {
            traspasar();
        });

        $("#btntraspasarResguardo").click(function() {
            traspasarResguardo();
        });
        $('#btnDarBaja').click(function() {
            bajar();
        });

        $("#btndarDeBajaResguardo").click(function() {
            bajarResguardo();
        });
        $("#btnDetalles").click(function() {
            detallesShow();
        });

        // -------------------------------------------------------------------------------------------
        // -------------------------------funciones CRUD Modal Resguardo----------------------------------------
        // -------------------------------------------------------------------------------------------
        function operarResguardo() {
            // Dentro de la funcion, se llega a iterar.
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
                                    })
                                .then(function() {
                                    $('#modalOperarResguardo').modal('hide');
                                    $table.bootstrapTable('refresh');

                                });
                        } else {
                            swal(
                                    'Error de Operacion',
                                    'Hubo un error en la base de datos. ' + data.message,
                                    'error'
                                )
                                .then(function() {
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


        function agregar() {
            f_datos("php/clases.php", {
                key: keySeguridad
            }, function(data) {
                $(" #claseSelRes").empty();
                $.each(data, function(key, value) {
                    $("#claseSelRes").append('<option value="' + value.id_clase + '" >' + value.id_clase + ' ' + value.descripcion + '</option>');
                });
                $("#claseSelRes").trigger("change");
            });
            $('#fileToUpload').removeAttr('disabled');
            $('#archivoPDF').html("");
            $("#eliminarPdf").html("");
            $('#rpeRes').attr("value", rpeR);
            $('#rpeRes2').val(rpeR);
            $('.modal-title').text('Agregar Resguardo');
            $('#formResguardo')[0].reset();
            $('#accionRes').val('Agregar');
            $('#btnguardarCambiosResguardos').text('Registrar Resguardo');
            $("#fechaCapRes").val(hoy_input_date());
            $("select#claseSelRes").trigger("change");
            $("#claseSelRes").change(function(event, valor) {
                // console.log(valor);
                f_datos("php/subclases.php", {
                    id_clase: $("#claseSelRes option:selected").val(),
                    key: keySeguridad
                }, function(data) {
                    $("#subClaseSelRes").empty();
                    $.each(data, function(key, value) {
                        // console.log(value);
                        $("#subClaseSelRes").append('<option value="' + value.id_subclase + '" >' + value.id_subclase + ' ' + value.descripcion + '</option>');
                    });

                });

            });
        }

        function modificar() {
            f_datos("php/clases.php", {
                key: keySeguridad
            }, function(data) {
                $(" #claseSelRes").empty();
                $.each(data, function(key, value) {
                    $("#claseSelRes").append('<option value="' + value.id_clase + '" >' + value.id_clase + ' ' + value.descripcion + '</option>');
                });
                // console.log(auxResguardos);
                //
                if (auxResguardos.archivo != "") {
                    $('#fileToUpload').attr('disabled', 'disabled');
                    $('#archivoPDF').html('<a href="pdf/' + auxResguardos.rpe + '/' + auxResguardos.archivo + '" target="_blank"><img src="imagenes/pdf.ico" title="pdf' + auxResguardos.archivo + '">' + auxResguardos.archivo + '</a>');
                    $("#eliminarPdf").html('<button id="botonEliminarPDF" type="button" class="btn btn-outline-danger"><svg xmlns = "http://www.w3.org/2000/svg"width = "16"height = "16"fill = "currentColor"class = "bi bi-trash3-fill"viewBox = "0 0 16 16" ><path d = "M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" / ></svg>Eliminar PDF </button>')
                } else {
                    $('#fileToUpload').removeAttr('disabled');
                    $('#archivoPDF').html("No se encontrarón archivos del bien " + auxResguardos.id_bien + " del trabajador " + auxResguardos.rpe);
                    $("#eliminarPdf").html("");
                }
                $("#fileToUpload").val("");
                $('#rpeRes').val(auxResguardos.rpe);
                $('#rpeRes2').val(auxResguardos.rpe);
                $('#modalOperarResguardo').modal('show');
                $('.modal-title').text('Editar resguardo');
                $('#btnguardarCambiosResguardos').text('Editar resguardo');
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
                        // console.log(value);
                        $("#subClaseSelRes").append('<option value="' + value.id_subclase + '" >' + value.id_subclase + ' ' + value.descripcion + '</option>');
                    });
                    if (valor)
                        $("#subClaseSelRes").val(valor);
                });
            });
        }

        function eliminarResguardo(id, rpe, archivo) {
            $.ajax({
                url: 'php/operacionesResguardo.php',
                method: 'POST',
                data: {
                    idBien: id,
                    rpeRes: rpe,
                    archivo: archivo,
                    accion: "Eliminar"
                },
                success: function(data) {
                    // console.log(data);
                    if (data.success) {
                        swal(
                            "El reguardo fue eliminado con exito.", {
                                icon: "success",
                            }
                        );
                    } else {
                        swal(
                                'Error de Operacion',
                                'Hubo un error en la base de datos. ' + data.message,
                                'error'
                            )
                            .then(function() {
                                $('#modalOperarResguardo').modal('hide');
                            });
                    }
                }
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

        function traspasar() {
            f_datos("php/empleados.php", {
                action: "ShowAll",
                key: keySeguridad
            }, function(data) {
                $("#rpeNuevo").empty();
                // console.log(auxResguardos);
                $.each(data, function(key, value) {
                    // console.log(value.rpe);
                    $("#rpeNuevo").append('<option value="' + value.rpe + '" >' + value.rpe + ' ' + value.nombre + '</option>');
                });
                $("#modalTraspasarResguardo #exampleModalLabel").html("Traspasar Resguardo Id." + auxResguardos.id_bien);
                $("#idBienTras").val(auxResguardos.id_bien);
                $('#rpeAct').val(auxResguardos.rpe);
                $('#rpeAct2').val(auxResguardos.rpe);
                $('#rpeRes2Tras').val(auxResguardos.rpe);
                $("#fechaCap").val(auxResguardos.fecha_captura);
                $("#fechaTras").val(hoy_input_date());
                $("#desResTras").val(auxResguardos.descripcion);
                $("#marcaResTras").val(auxResguardos.marca);
                $("#modeloResTras").val(auxResguardos.modelo);
                $("#cantidadResTras").val(auxResguardos.cantidad);
                $("#importeResTras").val(auxResguardos.importe);
                // console.log(auxResguardos.archivo);
                $("#nomArchivo").val(auxResguardos.archivo);
                $("#archivoTras").val(auxResguardos.archivo);
                $('#modalTraspasarResguardo').modal('show');
            });
        }

        function traspasarResguardo() {
            $('#formTraspaso').off("submit").on("submit", function(event) {
                event.preventDefault();
                parametros = formToObject($("#formTraspaso"));
                // console.log(parametros);
                $.ajax({
                    url: 'php/operacionesResguardo.php',
                    method: 'POST',
                    data: parametros,
                    success: function(data) {
                        // console.log(data);
                        if (data.success) {
                            swal(
                                    "El resguardo fue traspasado con exito.", {
                                        icon: "success",
                                    })
                                .then(function() {
                                    $('#modalTraspasarResguardo').modal('hide');
                                    $table.bootstrapTable('refresh');
                                });
                        } else {
                            swal(
                                    'Error de Operacion',
                                    'Hubo un error en la base de datos. ' + data.message,
                                    'error'
                                )
                                .then(function() {
                                    $('#modalTraspasarResguardo').modal('hide');
                                });
                        }
                    }
                });
            });
        }

        function bajar() {
            $("#modalDarBajaResguardo #exampleModalLabel").html("Dar de Baja Resguardo Id." + auxResguardos.id_bien);
            $("#motBaja").val("");
            $("#idBienBaja").val(auxResguardos.id_bien);
            $("#accionResBaja").val("Bajar");
            $('#rpeActBaja').val(auxResguardos.rpe);
            $('#rpeRes3').val(auxResguardos.rpe);
            $("#fechaCapBaja").val(auxResguardos.fecha_captura);
            $("#fechaBaja").val(hoy_input_date());
            $("#desResBaja").val(auxResguardos.descripcion);
            $("#marcaResBaja").val(auxResguardos.marca);
            $("#modeloResBaja").val(auxResguardos.modelo);
            $("#cantidadResBaja").val(auxResguardos.cantidad);
            $("#importeResBaja").val(auxResguardos.importe);

            $('#modalDarBajaResguardo').modal('show');
        }

        function bajarResguardo() {
            $('#formDarBaja').off("submit").on("submit", function(event) {
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
                        console.log(data);
                        if (data.success) {
                            swal(
                                    "El resguardo fue dado de baja con exito.", {
                                        icon: "success",
                                    })
                                .then(function() {
                                    $('#modalDarBajaResguardo').modal('hide');
                                    $table.bootstrapTable('refresh');

                                });
                        } else {
                            swal(
                                    'Error de Operacion',
                                    'Hubo un error en la base de datos. ' + data.message,
                                    'error'
                                )
                                .then(function() {
                                    $('#modalDarBajaResguardo').modal('hide');
                                });
                        }
                    }
                });
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

    function queryParams(params) {
        params.key = keySeguridad;
        params.rpe = $("#Panelrpe option:selected").val();
        // console.log(params);
        return params;
    }

    function ajaxRequest(params) {
        // console.log(params.data);
        var url = 'php/selectAllResguardos.php';
        var data = jQuery.parseJSON(params.data);
        $.post(url, data).then(function(res) {
            // console.log(res.data);
            if (res.success) {
                params.success(res.data);
            } else {
                params.error(res.message);
            }
        });
    }
</script>