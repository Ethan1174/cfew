<?php
error_reporting(0);
require('usuarios.php');

$idClase =(isset($_POST['idClase'])) ? $_POST['idClase'] : $_POST['idClase2'];
$subclaseRef =(isset($_POST['subclaseRef'])) ? $_POST['subclaseRef'] : "";
$desClase =(isset($_POST['desClase'])) ? $_POST['desClase'] : "";
$act =(isset($_POST['accion'])) ? $_POST['accion'] : "";


    $resultado = array();
    $resultado["param"] = $_POST;
    if ($act == "Agregar") {
        
        $sql0 = "SELECT `id_clase` FROM `clase` WHERE `id_clase` = '".$idClase."'";
        $resultadoValidar = getArraySQL($sql0, "bmpc", false);
        
        if($resultadoValidar["success"]) {
            $resultado["success"] = false;
            $resultado["message"] = "Ya existe la ID ingresada en nuestra base de datos, registre la clase con otra ID.";
        }
        else {
            $sql = "INSERT INTO `clase` VALUES ('".$idClase."', '".$subclaseRef."', '".$desClase."')";
            $resultado = getArraySQL($sql, "bmpc", true);
        }
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