<?php

require_once('functMysql.php');

$sql ="";
if (isset($_POST['id_bien']))
	$sql = sprintf("SELECT * FROM historico WHERE id_bien = %d", $_POST['id_bien']);

$resArray = getArraySQL($sql, "bmpc", true);

foreach ($resArray["data"] as $key => &$val) {
	$val["nombrerpe"] = Nombre($val["rpe"]);
	$val["nombreusuario"] = Nombre($val["usuario"]);
}

header('Content-type: application/json; charset=utf-8');
echo json_encode($resArray);

function Nombre($rpe){
	$sql=sprintf("SELECT * FROM usuario_scate WHERE rpe = '%s'", $rpe);
	$res = getArraySQL($sql, "usuarios_mps", true);
	
	if ($res["success"]) {
		$nombre = $res["data"][0]["nombre"];
	} else {
		$nombre="S/N";
	}
	return $nombre;
}
