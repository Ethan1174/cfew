<?php
require('functMysql.php');
require_once('seguridad.php');
$fecha_inicio = (isset($_POST['fecha_inicio'])) ? $_POST['fecha_inicio'] : "";
$fecha_termino = (isset($_POST['fecha_termino'])) ? $_POST['fecha_termino'] : "";
$stmValidar = (isset($_POST["key"]))? $_POST["key"]: "";
if($stmValidar == ""){
 $_SESSION['Num'] = 403;
    session_write_close();
    header("Location: ../.");
    die();
}
$sql = sprintf("SELECT * FROM bien WHERE status = 1 AND fecha_captura BETWEEN '%s' AND '%s' ", $fecha_inicio, $fecha_termino);
$resultado = getArraySQL($sql, "bmpc", true);
header('Content-type: application/json; charset=utf-8');
echo json_encode($resultado);