<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap/icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/plantilla.css" type="text/css">
    <title>Sistema de Resguardo BMPC v2.0</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark" id="navBarCustom403">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <a class="navbar-brand" href="#">
                    <img src="imagenes/logo.png" alt="Logo CFE" class="imgLogo" />
                </a>
                <?php
                if (isset($_SESSION["rpe"])) {
                ?>
                    <a class="navbar-brand syst" id="customNB" href="php/accederHome.php">
                        Sistema de Resguardo BMPC v2.0
                    </a>
                    <span>
                        <a class="nav-link active" id="customNB" aria-current="page" href="php/accederHome.php">
                            Regresar
                        </a>
                    </span>
                <?php
                } else {
                ?>

                    <a class="navbar-brand syst" id="customNB" href="#">
                        Sistema de Resguardo BMPC v2.0
                    </a>
                    <span>
                        <a class="nav-link active" id="customNB" aria-current="page" href="php/logout.php">
                            Iniciar Sesión
                        </a>
                    </span>
                <?php

                }

                ?>
            </div>
        </div>
    </nav>

    <div class="container-respons">
        <div class="container" id="cluster1">
            <h2>Error 403</h2>
            <h4>No podemos redirigirte a esta página.</h4>
            <img src="imagenes/llaveVerde.jpg" class="img401" alt="Imagen de un candado." />
        </div>
    </div>
    <footer class="footer mt-auto py-3 bg-dark">
        <div class="container">
            <span class="text-muted">
                Copyright © 2022 pk0e0.cfemex.com. All Rights Reserved.
            </span>
            <br>
            <span class="text-muted">
                Control e Informática - Zona de Transmisión Malpaso.
            </span>
        </div>
    </footer>
    <script src="js/popper.min.js"></script>
</body>

</html>