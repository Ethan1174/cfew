<?php
date_default_timezone_set('America/Mexico_City');
error_reporting(0);
session_start();
require('functMysql.php'); // Puedes cambuarlo a functMysql.php, solo marca mas errores pero hace las mismas consultas.
$idBien = (isset($_POST['idBien'])) ? $_POST['idBien'] : "";
$rpe = (isset($_POST['rpeRes'])) ? $_POST['rpeRes'] : $_POST['rpeRes2'];
$fecha_captura = (isset($_POST['fechaCapRes'])) ? $_POST['fechaCapRes'] : "";
$clase = (isset($_POST['listaClases'])) ? $_POST['listaClases'] : "";
$subclase = (isset($_POST['listaSubClases'])) ? $_POST['listaSubClases'] : "";
$descripcion = (isset($_POST['desRes'])) ? $_POST['desRes'] : "";
$marca = (isset($_POST['marcaRes'])) ? $_POST['marcaRes'] : "";
$modelo = (isset($_POST['modeloRes'])) ? $_POST['modeloRes'] : "";
$serie = (isset($_POST['serieRes'])) ? $_POST['serieRes'] : "";
$unidad = (isset($_POST['unidadSelRes'])) ? $_POST['unidadSelRes'] : "";
$cantidad = (isset($_POST['cantidadRes'])) ? $_POST['cantidadRes'] : "";
$importe = (isset($_POST['importeRes'])) ? $_POST['importeRes'] : "";
$numero = (isset($_POST['numResFac'])) ? $_POST['numResFac'] : "";
$fecha_factura = (isset($_POST['fechaResFac'])) ? $_POST['fechaResFac'] : "";
$rfc = (isset($_POST['rfcResFac'])) ? $_POST['rfcResFac'] : "";
$posicion = (isset($_POST['posicionResFac'])) ? $_POST['posicionResFac'] : "";
$act = (isset($_POST['accion'])) ? $_POST['accion'] : "";
$archivo = (isset($_POST['archivo'])) ? $_POST['archivo'] : "";


$idBienTras = (isset($_POST['idBienTras'])) ? $_POST['idBienTras'] : "";
$rpeNuevo = (isset($_POST['rpeNuevo'])) ? $_POST['rpeNuevo'] : "";
$fechaTras = (isset($_POST['fechaTras'])) ? $_POST['fechaTras'] : "";


$idBienBaja = (isset($_POST['idBienBaja'])) ? $_POST['idBienBaja'] : "";

// aun me falta extraer bien el nombre del archivo.
$motBaja = (isset($_POST['motBaja'])) ? $_POST['motBaja'] : "";
$fechaBaja = (isset($_POST['fechaBaja'])) ? $_POST['fechaBaja'] : "";

if ($act == "Agregar") {
    $sql = "INSERT INTO `bien`(`rpe`, `fecha_captura`, `clase`, `subclase`, `descripcion`, `marca`, `modelo`, `serie`, `unidad`, `cantidad`, `importe`, `numero`, `fecha_factura`, `rfc`, `posicion`, `archivo`, `status`) VALUES ('" . $rpe . "', '" . $fecha_captura . "', '" . $clase . "', '" . $subclase . "', '" . $descripcion . "', '" . $marca . "', '" . $modelo . "', '" . $serie . "', '" . $unidad . "', '" . $cantidad . "', '" . $importe . "', '" . $numero . "', '" . $fecha_factura . "', '" . $rfc . "', '" . $posicion . "', '', 1)";
}

if ($act == "Eliminar") {
    $sql = "DELETE FROM `bien` WHERE `id_bien` = '" . $idBien . "'";
}

if ($act == "Modificar") {
    $sql = "UPDATE `bien` SET `fecha_captura`='" . $fecha_captura . "', `clase`='" . $clase . "', `subclase`='" . $subclase . "', `descripcion`='" . $descripcion . "', `marca`='" . $marca . "', `modelo`='" . $modelo . "', `serie`='" . $serie . "', `unidad`='" . $unidad . "', `cantidad`='" . $cantidad . "', `importe`='" . $importe . "', `numero`='" . $numero . "', `fecha_factura`='" . $fecha_factura . "', `rfc`='" . $rfc . "', `posicion`='" . $posicion . "', `archivo`='" . $documento . "' WHERE `id_bien` = '" . $idBien . "'";
}
if ($act == "Traspasar") {
    $sql = "UPDATE `bien` SET `rpe`='" . $rpeNuevo . "', `fecha_traspaso`='" . $fechaTras . "' WHERE `id_bien` = '" . $idBienTras . "'";
}

if ($act == "Bajar") {
    $sql = "UPDATE `bien` SET `motivo_baja`='" . $motBaja . "', `fecha_baja`='" . $fechaBaja . "' WHERE `id_bien` = '" . $idBienBaja . "'";
}

if ($act == "eliminarPDF") {
   
        eliminarPDF($archivo, $rpe);
        $sql = "UPDATE `bien` SET `archivo` = '' WHERE `id_bien` = '" .  $idBien . "'";

}

$hoy = date("Y-m-d H:i:s");

$resultado = getArraySQL($sql, "bmpc", true);
if ($resultado["success"]) {

    if ($act == "Traspasar") {
        $fichero = "../pdf/" . $rpe . "/" . $archivo;
        $nuevo_fichero = "../pdf/" . $rpeNuevo . "/" . $archivo;
        if (!file_exists("../pdf/" . $rpeNuevo . "/"))
            mkdir("../pdf/" . $rpeNuevo . "/", 0777, true);
        if (copy($fichero, $nuevo_fichero)) {
            unlink($fichero);
        }
    }

    $sqlBitacora =  sprintf("INSERT INTO historico VALUES (%d, '%s', '%s', '%s', '%s')", $idBien, $rpe, $hoy, $act, $_SESSION["rpe"]);
    $bitacora = getArraySQL($sqlBitacora, "bmpc", true);
    $resultado["bitacora"] = $bitacora;
}
if (isset($_FILES["fileToUpload"])) {

    $directorio ="../pdf/" . $rpe . "/";
    $nombreArchivo = (($act == "Agregar") ? $resultado["id"] : $idBien) . "-" . $_FILES["fileToUpload"]["name"];
    $archivoSubir = $directorio . basename($nombreArchivo);

    // Creamo la carpeta del usuario que está guardando el bien y si ya existe entonces sigue el procedimiento de crea el archivo
    if (!file_exists("../pdf/" . $rpe . "/"))
        mkdir("../pdf/" . $rpe . "/", 0777, true);

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $archivoSubir)) {
        $resultado["message"] = "El documento " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " fue subido con exito.";
        // guardamos la ruta completa en la base de datos
        $sql2 = "UPDATE `bien` SET `archivo` = '" . $nombreArchivo . "' WHERE `id_bien` = '" . (($act == "Agregar") ? $resultado["id"] : $idBien) . "'";
        // $sql2 = "UPDATE `bien` SET `archivo` = '".$nombreArchivo."' WHERE `id_bien` = '".$idBien."'";
        $res = getArraySQL($sql2, "bmpc", true);
        $resultado["actualiza"] = $res;
    }
}

// --------------------------------------------------
// ------------>>Eliminar Archivos<<<---------------
// --------------------------------------------------
function eliminarPDF($archivo, $rpe)
{
    $archivoEliminar = "../pdf/" . $rpe . "/" . $archivo;
    unlink($archivoEliminar);
}

header('Content-type: application/json; charset=utf-8');
echo json_encode($resultado);




?>