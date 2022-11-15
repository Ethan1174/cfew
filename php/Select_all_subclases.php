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

$sql = "SELECT * FROM subclase";
$resultado = getArraySQL($sql, "bmpc", true);
header('Content-type: application/json; charset=utf-8');

if($resultado["success"]){
	echo json_encode($resultado);
} else {
	echo "[]";
}

?>