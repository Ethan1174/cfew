<?php
require('functMysql.php');
require_once('seguridad.php');
session_start();
$stmValidar = (isset($_POST["key"]))? $_POST["key"]: "";
if($stmValidar == ""){
 $_SESSION['Num'] = 403;
    session_write_close();
    header("Location: ../.");
    die();
}
if (isset($_POST['rpe']))
	$sql = sprintf("SELECT * FROM bien WHERE status = 1 AND rpe IN ('%s')", $_POST['rpe']);
else
	$sql = sprintf("SELECT * FROM bien WHERE status = 1 AND rpe IN ('%s')", $_SESSION['rpe']);

$resArray = getArraySQL($sql, "bmpc", true);
header('Content-type: application/json; charset=utf-8');
echo json_encode($resArray);
