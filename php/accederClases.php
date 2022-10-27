<?php
// require_once('seguridad.php'); 
require('functMysql.php');
require_once('seguridad.php');

session_start();
$Stipo = $_SESSION["id_tipo"];
if($Stipo == 10 || $Stipo == 11){
    $_SESSION['Num'] = 2;
    session_write_close();
    header("Location: ../.");
    die();
}else{
    session_write_close();
    header("Location: ../.");
    die();
}

