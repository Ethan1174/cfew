<?php
require('functMysql.php');
require_once('seguridad.php');
// session_start();
$stmValidar = (isset($_POST["key"]))? $_POST["key"]: "";
if($stmValidar == ""){
 $_SESSION['Num'] = 403;
    session_write_close();
    header("Location: ../.");
    die();
}
$clase = (isset($_POST["clase"]))? $_POST["clase"]: "";
$subclase = (isset($_POST["subclase"]))? $_POST["subclase"]: "";

$sql = sprintf("SELECT * FROM bien WHERE status = 1 AND clase = '%s' AND subclase LIKE ('%s')", $clase, $subclase);

$resArray = getArraySQL($sql, "bmpc", true);
header('Content-type: application/json; charset=utf-8');
echo json_encode($resArray);
