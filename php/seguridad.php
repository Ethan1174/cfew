<?php
session_start();
if ($_SESSION["Num"] == 0) {
    $_SESSION['Num'] = 403;
    session_write_close();
    header("Location: ../.");
    die();
}
?>