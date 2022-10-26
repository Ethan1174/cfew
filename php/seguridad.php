<?php
session_start();
if ($_SESSION["Num"] == 0) {
    $_SESSION['Num'] = 0;
    session_write_close();
    echo '<script>alert("Por favor inicia sesión"); window.location ="../."</script>';
    session_unset();
    session_destroy();
    die();
}
?>