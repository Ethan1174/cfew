<?php

require('functMysql.php');
require_once('seguridad.php');

$sql = "SELECT * FROM clase";
$resultado = getArraySQL($sql, "bmpc", true);
header('Content-type: application/json; charset=utf-8');

if($resultado["success"]){
	echo json_encode($resultado);
} else {
	echo "[]";
}

?>