<?php
// require_once('seguridad.php'); 
require('functMysql.php');
require_once('seguridad.php');

$Stipo = $_SESSION["id_tipo"];
if ($Stipo == 10 || $Stipo == 11|| $Stipo == 12) {
    $_SESSION['Num'] = 2;
    session_write_close();
    header("Location: ../.");
    die();
}
else {
    $_SESSION['Num'] = 401;
    session_write_close();
    header("Location: ../.");
    die();
}

