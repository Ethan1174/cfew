<?php
require('functMysql.php');
require_once('seguridad.php');
$Stipo = $_SESSION["id_tipo"];
$Sarea = $_SESSION["area"];

$stmValidar = (isset($_POST["key"]))? $_POST["key"]: "";

if($stmValidar == ""){
 $_SESSION['Num'] = 403;
    session_write_close();
    header("Location: ../.");
    die();
}

if ($Stipo == 10 || $Stipo == 11 ){
  $sql=sprintf("SELECT * FROM area");
}
else {
  $sql=sprintf("SELECT * FROM area WHERE clave LIKE('%s') ", $Sarea);
}

$resArray = getArraySQL($sql, "expediente", true);
header('Content-type: application/json; charset=utf-8');
echo json_encode($resArray);
?>