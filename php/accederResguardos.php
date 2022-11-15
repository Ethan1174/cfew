<?php
require('functMysql.php');
require_once('seguridad.php');
// session_start();
$Stipo = $_SESSION["id_tipo"];

if(empty($Stipo)){
    $_SESSION['Num'] = 401;
    session_write_close();
    header("Location: ../.");
    die();
}
$_SESSION['Num'] = 4;
session_write_close();
header("Location: ../.");
die();
?>