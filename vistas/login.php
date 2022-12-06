<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Sistema bienes muebles poca cuantia">
  <meta name="author" content="Admin CFE">
  <link rel="shortcut icon" href="imagenes/favicon.ico">
  <script src="js/jquery-3.6.1.min.js"></script>
  <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="bootstrap/icons/font/bootstrap-icons.css">
  <link rel="stylesheet" href="css/plantilla.css" type="text/css">
  <title>Sistema de Resguardo BMPC v2.0</title>
  <title>Inicio de sesión</title>
  <style>
    form {
      border: 1px solid #198754;
      width: fit-content;
      padding: 50px 50px;
    }

    .container {
      padding: 16px;
    }


    input[type=text],
    input[type=password] {
      width: 100%;
      padding: 12px 20px;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }
  </style>
</head>

<body>
  <div class="container-fluid">

    <div class="row head">
      <div class="col-md-3">
        <img src="imagenes/cfe.jpg" alt="Logo CFE" class="img-fluid">
      </div>

      <div class="col-md-9 boxMod1">
        <small>Gerencia Regional de Transmisión Sureste
          <br>
          Zona de Transmisión Malpaso</small>
        <p>Sistema de Control de Resguardo Poca Cuantia</p>
      </div>
    </div>
    <center>

      <form id="cardLogin" name="cardLogin" method="post" action="php/login.php">
        <div class="container">
          <label for="user" class="form-label"><strong>Usuario</strong></label>
          <div class="input-group mb-3">
            <span class="input-group-text">
              <i class="bi bi-person-fill"></i>
            </span>
            <input type="text" id="rpe" name="rpe" placeholder="RPE" pattern="[A-Za-z0-9_-]{1,15}" class="form-control" required="true" />
          </div>

          <label for="passw" class="form-label"><strong>Contraseña</strong></label>
          <div class="input-group mb-3">
            <span class="input-group-text">
              <i class="bi bi-lock-fill"></i>
            </span>
            <input type="password" id="pass" name="pass" pattern="[A-Za-z0-9_-]{1,15}" placeholder="Contraseña" class="form-control" required="true" />
          </div>
          <div class="text-center">
            <button id="submit" type="submit" class="btn btn-success">Iniciar Sesión</button>
          </div>
        </div>
        <?php
        if (isset($_SESSION["message"])) { ?>
          <div class="alert alert-warning alert-dismissible fade show" id="message" role="alert">
            <?php echo $_SESSION["message"]; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php
        }
        ?>
      </form>
    </center>

<script src="js/popper.min.js"></script>
<script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>