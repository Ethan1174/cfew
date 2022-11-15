<?php
require('functMysql.php');
require_once('seguridad.php');
$stmValidar = (isset($_POST["key"]))? $_POST["key"]: "";

if($stmValidar == ""){
 $_SESSION['Num'] = 403;
    session_write_close();
    header("Location: ../.");
    die();
}
if (isset($_POST['id_clase']))
	$sql = sprintf("SELECT * FROM clase WHERE id_clase like ('%s')", $_POST['id_clase']);
else
	$sql = "SELECT * FROM clase";

$resArray = getArraySQL($sql, "bmpc", true);
header('Content-type: application/json; charset=utf-8');
echo json_encode($resArray);	
?>