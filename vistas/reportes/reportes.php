<?php
date_default_timezone_set('America/Mexico_City');
// $diassemana = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado");
// $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

$user = (isset($_POST['user'])) ? $_POST['user'] : "";
$reporteName = (isset($_POST['name'])) ? $_POST['name'] : "";
$data = (isset($_POST['data'])) ? $_POST['data'] : "";
$hoy = date('d/m/Y') . " a la(s) " . date('h:i a');
$tipo = (isset($_POST['tipo'])) ? $_POST['tipo'] : "";
if ($user == "") {
    // echo '<script>alert("No tienes permitido navegar por URL"); window.location ="../."</script>';
    // die();
    session_start();
    $_SESSION['Num'] = 403;
    session_write_close();
    header("Location: ../.");
    die();
}
ob_start();
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Resguardo BMPC v2.0</title>
    <style>
        @page {
            margin: 0cm 0cm;
        }
        body {
            margin-top: 6cm;
            margin-left: 1.7cm;
            margin-right: 1.7cm;
            margin-bottom: 3cm;
        }
        header {
            position: fixed;
            top: 1cm;
            left: 0cm;
            right: 0cm;
            height: 3cm;
        }
        footer {
            position: absolute;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2.7cm;
        }
        #footer2 {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 3cm;
        }
        #imagen {
            position: absolute;
            left: 5%;
        }
        #grupo1 {
            position: absolute;
            left: 30%;
            text-align: center;
            top: 100%;
        }
        #grupo2 {
            position: absolute;
            right: 5%;
            top: 5%;
            text-align: right;
            font-size: 14px;
            color: #009b6e;
        }
        #grupo3 {
            position: absolute;
            left: 10%;
            border-top: 1px solid black;
            width: 25%;
            text-align: center;
        }
        #grupo4 {
            position: absolute;
            right: 10%;
            border-top: 1px solid black;
            width: 25%;
            text-align: center;
        }
        table {
            padding-top: 0cm;
            border-collapse: collapse;
            font-size: 12px;
            width: 100%;
            padding-bottom: 2%;
            /* margin-left: 3%;
            margin-right: 3%; */
        }
        table,
        th,
        td {
            border: 1px solid grey;
        }
        th,
        td {
            text-align: left;
            vertical-align: middle;
            font-size: 11px;
            padding: 5px;
        }
        .page-number {
            padding-right: 1.5cm;
            padding-top: 2cm;
            text-align: center;
            color: rgb(77, 76, 76);
        }
        .page-number:before {
            content: "Página "counter(page);
        }   
    </style>
</head>

<body>
    <!-- Define header and footer blocks before your content -->
    <header>
        <div id="imagen">
            <img src="http://localhost/respc_v2/imagenes/cfe.jpg" alt="Logo CFE" width="150" height="100">
        </div>
        <div id="grupo1">
            <p>Sistema de Control de Resguardo Poca Cuantía</p>
            <h4><?= $reporteName ?></h4>
        </div>
        <div id="grupo2">
            <p>Gerencia Regional de Transmisión Sureste</p>
            <p>Zona de Transmisión Malpaso</p>
            <p>Reporte generado el dia <?= $hoy ?> </p>
        </div>
    </header>
    <?php

    if ($tipo == "resguardo") {
    ?>
        <table id="tablaReportes">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descripcion</th>
                    <th>Serie</th>
                    <th>Cantidad</th>
                    <th>Unidad</th>
                    <th>Importe</th>
                    <th>Fecha Captura</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $dat1 = json_decode($data, true);
                foreach ($dat1 as $key => $value) {
                    echo "<tr>";
                    echo "<td>" . $value["id_bien"] . "</td>";
                    echo "<td>" . $value["descripcion"] . "</td>";
                    echo "<td>" . $value["serie"] . "</td>";
                    echo "<td>" . $value["cantidad"] . "</td>";
                    echo "<td>" . $value["unidad"] . "</td>";
                    echo "<td>" . $value["importe"] . "</td>";
                    echo "<td>" . $value["fecha_captura"] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    <?php
    } else if ($tipo == "reporteClase") {
    ?>
        <table id="tablaReportes">
            <thead>
                <tr>

                    <!-- Data formatter se encuentra en main.js lín.83 -->
                    <th>ID</th>
                    <th>Descripcion</th>
                    <th>Serie</th>
                    <th>Cantidad</th>
                    <th>Unidad</th>
                    <th>Importe</th>
                    <th>Fecha Captura</th>
                    <th>Clase</th>
                    <th>Subclase</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $dat1 = json_decode($data, true);

                foreach ($dat1 as $key => $value) {
                    echo "<tr>";
                    echo "<td>" . $value["id_bien"] . "</td>";
                    echo "<td>" . $value["descripcion"] . "</td>";
                    echo "<td>" . $value["serie"] . "</td>";
                    echo "<td>" . $value["cantidad"] . "</td>";
                    echo "<td>" . $value["unidad"] . "</td>";
                    echo "<td>" . $value["importe"] . "</td>";
                    echo "<td>" . $value["fecha_captura"] . "</td>";
                    echo "<td>" . $value["clase"] . "</td>";
                    echo "<td>" . $value["subclase"] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    <?php
    } else if ($tipo == "reporteBaja") {
    ?>
        <table id="tablaReportes">
            <thead>
                <tr>

                    <!-- Data formatter se encuentra en main.js lín.83 -->
                    <th>ID</th>
                    <th>Descripcion</th>
                    <th>Serie</th>
                    <th>RPE</th>
                    <th>Motivo de Baja</th>
                    <th>Fecha de baja</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $dat1 = json_decode($data, true);

                foreach ($dat1 as $key => $value) {
                    echo "<tr>";
                    echo "<td>" . $value["id_bien"] . "</td>";
                    echo "<td>" . $value["descripcion"] . "</td>";
                    echo "<td>" . $value["serie"] . "</td>";
                    echo "<td>" . $value["rpe"] . "</td>";
                    echo "<td>" . $value["motivo_baja"] . "</td>";
                    echo "<td>" . $value["fecha_baja"] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    <?php
    } else if ($tipo == "reporteAlta") {
    ?>
        <table id="tablaReportes">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descripcion</th>
                    <th>Serie</th>
                    <th>RPE</th>
                    <th>Fecha de captura</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $dat1 = json_decode($data, true);
                foreach ($dat1 as $key => $value) {
                    echo "<tr>";
                    echo "<td>" . $value["id_bien"] . "</td>";
                    echo "<td>" . $value["descripcion"] . "</td>";
                    echo "<td>" . $value["serie"] . "</td>";
                    echo "<td>" . $value["rpe"] . "</td>";
                    echo "<td>" . $value["fecha_captura"] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    <?php
    }
    ?>
    <div id="footer2">
        <div class="page-number"></div>
    </div>
    <footer>
        <div id="grupo3">
            <h4>Resguarda</h4>
            <small><?= $user ?></small>
        </div>
        <div id="grupo4">
            <h4>Administrador</h4>
        </div>
    </footer>
</body>

</html>

<?php
$html = ob_get_clean();

// para ver el contenido de la tabla antes de cargar el domPDF puedes descomentar este echo y comentar todo el código que procede
// echo $html;

require_once '../../dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

// Activamos opciones que permita obtener imagenes
$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));    
// $options->set(array('isJavascriptEnabled' => true));
// $options->set(array('isHtml5ParserEnabled' => true));
$dompdf->setOptions($options);

//contenido
$dompdf->loadHtml($html);

//estilo carta
$dompdf->setPaper('letter');

$dompdf->render();
// Evitamos descargar directamente el PDF.
$dompdf->stream($hoy . " " . $reporteName . " de " . $user . ".pdf", array("Attachment" => false));
?>