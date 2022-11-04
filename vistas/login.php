<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="css/plantilla.css" type="text/css">
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
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
              </svg>
            </span>
            <input type="text" id="rpe" name="rpe" placeholder="RPE" class="form-control" required="true" />
          </div>

          <label for="passw" class="form-label"><strong>Contraseña</strong></label>
          <div class="input-group mb-3">
            <span class="input-group-text">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z" />
              </svg>
            </span>
            <input type="password" id="pass" name="pass" placeholder="Contraseña" class="form-control" required="true" />
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


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>