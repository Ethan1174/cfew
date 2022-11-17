<?php
$user = (isset($_POST['user'])) ? $_POST['user'] : "";
$reporteName = (isset($_POST['name'])) ? $_POST['name'] : "";
$data = (isset($_POST['data'])) ? $_POST['data'] : "";

ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../../js/jquery-3.6.1.min.js"></script>
    <link href="../../bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../bootstrap/bootstrap-table-master/dist/bootstrap-table.min.css">
    <title>Sistema de Resguardo BMPC v2.0</title>
</head>

<body>
    <br>
    <div class="container">
        <table id="tablaReportes">
            <thead>
                <tr>
                    <!-- Data formatter se encuentra en main.js lín.83 -->
                    <th data-field="id_bien">ID</th>
                    <th data-field="descripcion">Descripcion</th>
                    <th data-field="serie">Serie</th>
                    <th data-field="cantidad">Cantidad</th>
                    <th data-field="unidad">Unidad</th>
                    <th data-field="importe">Importe</th>
                    <th data-field="fecha_captura">Fecha Captura</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
<br>
</body>
<script>
    $(document).ready(function() {
        var $table = $('#tablaReportes');
        // var data = $("#dataRepo").val();
        // console.log(data);
        $(function() {
            $table.bootstrapTable({data: <?php echo $data; ?>});
        });
    });
</script>

<script src="../../bootstrap/bootstrap-table-master/dist/bootstrap-table.min.js"></script>

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
$dompdf->setOptions($options);

//contenido
$dompdf->loadHtml($html);
//estilo carta
$dompdf->setPaper('letter');

$dompdf->render();
// Evitamos descargar directamente el PDF.
$dompdf->stream($reporteName.".pdf", array("Attachment" => false));

?>
<?php



?>