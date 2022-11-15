<?php
date_default_timezone_set('America/Mexico_City');
error_reporting(0);
session_start();
require('functMysql.php'); // Puedes cambuarlo a functMysql.php, solo marca mas errores pero hace las mismas consultas.
require_once('seguridad.php');

// Todas estas validaciones toman valor de acuerdo a las acciones AGREGAR - MODIFICAR -ELIMINAR - TRASPASAR - BAJAR
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

$rpeNuevo = (isset($_POST['rpeNuevo'])) ? $_POST['rpeNuevo'] : "";
$fechaTras = (isset($_POST['fechaTras'])) ? $_POST['fechaTras'] : "";

$motBaja = (isset($_POST['motBaja'])) ? $_POST['motBaja'] : "";
$fechaBaja = (isset($_POST['fechaBaja'])) ? $_POST['fechaBaja'] : "";


if($act == ""){
    $_SESSION['Num'] = 403;
    session_write_close();
    header("Location: ../.");
    die();
}
if ($act == "Agregar") {
    $sql = "INSERT INTO `bien`(`rpe`, `fecha_captura`, `clase`, `subclase`, `descripcion`, `marca`, `modelo`, `serie`, `unidad`, `cantidad`, `importe`, `numero`, `fecha_factura`, `rfc`, `posicion`, `archivo`, `status`) VALUES ('" . $rpe . "', '" . $fecha_captura . "', '" . $clase . "', '" . $subclase . "', '" . $descripcion . "', '" . $marca . "', '" . $modelo . "', '" . $serie . "', '" . $unidad . "', '" . $cantidad . "', '" . $importe . "', '" . $numero . "', '" . $fecha_factura . "', '" . $rfc . "', '" . $posicion . "', '', 1)";
    $resultado = getArraySQL($sql, "bmpc", true);
    $resultado["archivoResguardo"] = subirArchivo($resultado["id"],$rpe);
}

if ($act == "Eliminar") {
    // Eliminar el archivo pdf que le pertenece al bien que se va a eliminar
    // eliminarPDF($archivo, $rpe);
    $sql = "DELETE FROM `bien` WHERE `id_bien` = '" . $idBien . "'";
    $resultado = getArraySQL($sql, "bmpc", true);
    if($archivo != "") {
        eliminarPDF($archivo, $rpe);
    }
}
if ($act == "Modificar") {
    $sql = "UPDATE `bien` SET `fecha_captura`='" . $fecha_captura . "', `clase`='" . $clase . "', `subclase`='" . $subclase . "', `descripcion`='" . $descripcion . "', `marca`='" . $marca . "', `modelo`='" . $modelo . "', `serie`='" . $serie . "', `unidad`='" . $unidad . "', `cantidad`='" . $cantidad . "', `importe`='" . $importe . "', `numero`='" . $numero . "', `fecha_factura`='" . $fecha_factura . "', `rfc`='" . $rfc . "', `posicion`='" . $posicion . "' WHERE `id_bien` = '" . $idBien . "'";
    $resultado = getArraySQL($sql, "bmpc", true);
    $resultado["archivoResguardo"] = subirArchivo($idBien, $rpe);
}
if ($act == "Traspasar") {
    $sql = "UPDATE `bien` SET `rpe`='" . $rpeNuevo . "', `fecha_traspaso`='" . $fechaTras . "' WHERE `id_bien` = '" . $idBien . "'";
    $resultado = getArraySQL($sql, "bmpc", true);
}

if ($act == "Bajar") {
    $sql = "UPDATE bien SET motivo_baja ='$motBaja', fecha_baja ='$fechaBaja', status = 3 WHERE id_bien = '$idBien'";
    $resultado = getArraySQL($sql, "bmpc", true);
}

// Solo eliminar PDF desde el modal de Editar resguardo y tambien desde los reportes por baja
if ($act == "eliminarPDF") {
   
        eliminarPDF($archivo, $rpe);
        $sql = "UPDATE `bien` SET `archivo` = '' WHERE `id_bien` = '" .  $idBien . "'";
        $resultado = getArraySQL($sql, "bmpc", true);
}

$hoy = date("Y-m-d H:i:s");

if ($act == "Traspasar") {
    $fichero = "../pdf/" . $rpe . "/" . $archivo;
    $nuevo_fichero = "../pdf/" . $rpeNuevo . "/" . $archivo;
    if (!file_exists("../pdf/" . $rpeNuevo . "/"))
        mkdir("../pdf/" . $rpeNuevo . "/", 0777, true);
    if (copy($fichero, $nuevo_fichero)) {
        unlink($fichero);
    }
}
if ($act == "Bajar") {
    $fichero = "../pdf/" . $rpe . "/" . $archivo;
    $nuevo_fichero = "../pdf/" . $rpe . "/D" . $archivo;
    if (!file_exists("../pdf/" . $rpe . "/"))
        mkdir("../pdf/" . $rpe . "/", 0777, true);
    if (copy($fichero, $nuevo_fichero)) {
        unlink($fichero);
    }
}
if ($resultado["success"]) {
// Registramos en el historio toda la bitacora de las acciones del usuario
    $sqlBitacora =  sprintf("INSERT INTO historico VALUES (%d, '%s', '%s', '%s', '%s')", (($act == "Agregar") ? $resultado["id"] : $idBien), $rpe, $hoy, $act, $_SESSION["rpe"]);
    $bitacora = getArraySQL($sqlBitacora, "bmpc", true);
    $resultado["bitacora"] = $bitacora;
}

function subirArchivo($idBien, $rpe)
{
    
    if(isset($_FILES["fileToUpload"])){    
        $directorio = "../pdf/" . $rpe . "/";
        $nombreArchivo =  $idBien . "-" . $_FILES["fileToUpload"]["name"];
        $archivoSubir = $directorio . basename($nombreArchivo);

        // Creamo la carpeta del usuario que está guardando el bien y si ya existe entonces sigue el procedimiento de crea el archivo
        if (!file_exists($directorio))
            // se crea una carpeta con todos los permisos en caso de que no exista
            mkdir($directorio, 0777, true);
        //El archivo del input file es movido al directorio especificado de acuerdo al usario que está creando el resguardo
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $archivoSubir)) {
            // guardamos la ruta completa en la base de datos
            $sql2 = "UPDATE `bien` SET `archivo` = '" . $nombreArchivo . "' WHERE `id_bien` = '" .  $idBien . "'";
            // $sql2 = "UPDATE `bien` SET `archivo` = '".$nombreArchivo."' WHERE `id_bien` = '".$idBien."'";
            $res = getArraySQL($sql2, "bmpc", true);
            $res["message"] = "El documento " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " fue subido con exito.";
            return $res;
        }
    }
}

if(isset($_FILES["fileToUploadDictamen"])){

    $directorio = "../pdf/" . $rpe . "/D";
    $nombreArchivo = $idBien . "-" . $_FILES["fileToUploadDictamen"]["name"];
    $archivoSubir = $directorio . basename($nombreArchivo);
    if (move_uploaded_file($_FILES["fileToUploadDictamen"]["tmp_name"], $archivoSubir)) {
        $resultado["message"] = "El documento " . htmlspecialchars(basename($_FILES["fileToUploadDictamen"]["name"])) . " fue subido con exito.";
    }
}
// --------------------------------------------------
// ------------>>Eliminar Archivos<<<---------------
// --------------------------------------------------
function eliminarPDF($archivo, $rpe)
{
    $path = "../pdf/" . $rpe . "/" . $archivo;
    if(file_exists($path))
        unlink($path);
}

header('Content-type: application/json; charset=utf-8');
echo json_encode($resultado);




?>