<?php
require('functMysql.php');

session_start();

$rpe = $_SESSION["rpe"];
$Stipo = $_SESSION["id_tipo"];
if (isset($_POST['area'])) $Sarea = $_POST['area'];
if (isset($_POST['depto'])) $Sdepto = $_POST['depto'];
// Este post viene del modal de traspaso
$act = ((isset($_POST["action"])) ? $_POST["action"] : "");

// if (isset($_GET['rpe'])) 
// 	$sql=sprintf("SELECT * FROM usuario_scate WHERE rpe = '%s'", $_GET['rpe']);
// else

// if ($Sdepto == '99999')
// 	$sql = sprintf("SELECT * FROM usuario_scate WHERE area_clave LIKE ('%s') AND cenco = '' ORDER BY RPE", $Sarea, $Sdepto);
// else

if ($Stipo == 10 || $Stipo == 11 || $Stipo == 12 || $Stipo == 20 || $Stipo == 30 || $Stipo ==31)
	$sql = sprintf("SELECT * FROM usuario_scate WHERE area_clave LIKE ('%s') AND cenco LIKE ('%s') ORDER BY RPE", $Sarea, $Sdepto);
else
	$sql = sprintf("SELECT * FROM usuario_scate WHERE area_clave LIKE ('%s') AND cenco LIKE ('%s') AND	 rpe = ('%s') ORDER BY RPE", $Sarea, $Sdepto, $rpe);	
	
if ($act == "ShowAll") {
	$sql = "SELECT `rpe`, `nombre` FROM `usuario_scate` ORDER BY rpe  ASC";
}

$resArray = getArraySQL($sql, "usuarios", true);
header('Content-type: application/json; charset=utf-8');
echo json_encode($resArray);
