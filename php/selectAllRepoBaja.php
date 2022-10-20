<?php
require('functMysql.php');
session_start();

$fecha_inicio = (isset($_POST['fecha_inicio'])) ? $_POST['fecha_inicio'] : "";
$fecha_termino = (isset($_POST['fecha_termino'])) ? $_POST['fecha_termino'] : "";
$sql = sprintf("SELECT * FROM bien WHERE status = 3 AND fecha_baja BETWEEN '%s' AND '%s' ", $fecha_inicio, $fecha_termino);
$resultado = getArraySQL($sql, "bmpc", true);

// Usamos estas funciones para conseguir la url del dictamen ya que no se registra en la base de datos
$path = "pdf/";
$tipos = array("pdf");
if ($resultado["success"]) {
    foreach ($resultado["data"] as $key => &$val) {
        $val["url_dictamen"] = listar_ficheros($tipos, $path . $val["rpe"], $val["id_bien"]);
    }
}
header('Content-type: application/json; charset=utf-8');
echo json_encode($resultado);

function listar_ficheros($tipos, $path, $id)
{
    $carpeta = "../" . $path;
    //Comprobamos que la carpeta existe
    if (is_dir($carpeta)) {
        //Escaneamos la carpeta usando scandir
        $scanarray = scandir($carpeta);
        for ($i = 0; $i < count($scanarray); $i++) {
            //Verificamos que la extension se encuentre en $tipos y el nombre de archivo inicie con D de dictamen
            $thepath = pathinfo($carpeta . "/" . $scanarray[$i]);
            if (preg_match("/^D" . $id . "-/", $scanarray[$i]))
                if (in_array(strtolower($thepath['extension']), $tipos)) {
                    return "$path/$scanarray[$i]";
                }
        }
    } else {
        return "La carpeta no existe";
    }
}
