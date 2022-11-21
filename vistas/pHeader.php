<?php
// session_start();
if (!isset($_SESSION)) {
      // echo '<script>alert("No tienes permitido navegar por URL"); window.location ="../."</script>';
      // die();
      session_start();
      $_SESSION['Num'] = 403;
      session_write_close();
      header("Location: ../.");
      die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="Sistema bienes muebles poca cuantia">
      <meta name="author" content="Admin CFE">
      <link rel="shortcut icon" href="imagenes/favicon.ico">
      <script src="js/jquery-3.6.1.min.js"></script>
      <script src="sweetalert/dist/sweetalert.min.js"></script>
      <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="bootstrap/icons/font/bootstrap-icons.css">
      <link rel="stylesheet" href="bootstrap/bootstrap-table-master/dist/bootstrap-table.min.css">
      <link rel="stylesheet" href="css/virtual-select.min.css" type="text/css">
      <link rel="stylesheet" href="css/plantilla.css" type="text/css">
      <title>Sistema de Resguardo BMPC v2.0</title>