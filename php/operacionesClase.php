<?php
error_reporting(0);
require('functMysql.php');
require_once('seguridad.php');

$idClase =(isset($_POST['idClase'])) ? $_POST['idClase'] : $_POST['idClase2'];
$subclaseRef =(isset($_POST['subclases'])) ? $_POST['subclases'] : "";
$desClase =(isset($_POST['desClase'])) ? $_POST['desClase'] : "";
$act =(isset($_POST['accion'])) ? $_POST['accion'] : "";

if($act == ""){
    $_SESSION['Num'] = 403;
    session_write_close();
    header("Location: ../.");
    die();
}
if ($act == "Agregar") {
$sql = "INSERT INTO `clase` VALUES ('".$idClase."', '".$subclaseRef."', '".$desClase."')";
$resultado = getArraySQL($sql, "bmpc", true);
}
if ($act == "Modificar") {
$sql = "UPDATE `clase` SET `descripcion`='".$desClase."', `subclase`='".$subclaseRef."' WHERE `id_clase`='".$idClase."'";
$resultado = getArraySQL($sql, "bmpc", true);
}
if ($act == "Eliminar") {
    $sql = "DELETE FROM `clase` WHERE `id_clase` = '".$idClase."'"; 
    $resultado = getArraySQL($sql, "bmpc", true);
}

header('Content-type: application/json; charset=utf-8');
echo json_encode($resultado);
    
?>