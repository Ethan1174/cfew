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
</head>

<body>
  <?php

  if (isset($_SESSION['nombre'])) {

  ?>
    <nav class="navbar navbar-expand-lg navbar-dark" id="navBarCustom">
    <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <a class="navbar-brand" href="php/accederHome.php">
        <img src="http://localhost/respc_v2/imagenes/logo.png" alt="Logo CFE" class="imgLogo" />
        </a>
        <a class="navbar-brand syst" id="customNB" href="php/accederHome.php">
        Sistema de Resguardo BMPC v2.0
        </a>

        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

        <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-filter-square"></i>
            Catalogos
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li>
                    <a class="dropdown-item" href="php/accederClases.php" id="catalogoClaseDrop"><i class="bi bi-filter-square"></i>
                    Clases
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="php/accederSubClases.php" id="catalogoSubclaseDrop"><i class="bi bi-filter-square"></i>
                    Subclases
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="php/accederResguardos.php" id="catalogoResguardo"><i class="bi bi-filter-square"></i>
                    Resguardo
                    </a>
                </li>
            </ul>
            </li>

        <li class="nav-item dropdown" id="moduloReportes">
            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-card-list"></i>
                Reportes
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li>
                <a class="dropdown-item" href="php/accederReportesBajas.php">
                    <i class="bi bi-card-list"></i>
                    Bienes Bajas
                </a>
                </li>
                <li>
                <a class="dropdown-item" href="php/accederReportesAlta.php">
                    <i class="bi bi-card-list"></i>
                    Bienes Alta
                </a>
                </li>
                <li>
                <a class="dropdown-item" href="php/accederReportesClase.php">
                    <i class="bi bi-card-list"></i>
                    Bienes por Clase
                </a>
                </li>
            </ul>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-fill"></i>
                <span class="name" title=" <?= $_SESSION["nombre"] ?>"></span>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li>
                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalModUsuario" id="edit">
                    <i class="bi bi-pencil-fill"></i>
                    Editar perfil
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider" />
                </li>
                <li>
                    <a class="dropdown-item" href="php/logout.php">
                    <i class="bi bi-x-circle-fill"></i>
                    Cerrar sesión
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link active" id="disLink" aria-current="page" href="#">

            </a>
        </li>

          </ul>
        </div>
      </div>
    </nav>
  <?php
  } else {
  ?>
    <nav class="navbar navbar-expand-lg navbar-dark" id="navBarCustom">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <a class="navbar-brand" href="php/logout.php">
            <img src="http://localhost/respc_v2/imagenes/logo.png" alt="Logo CFE" class="imgLogo" />
          </a>
          <a class="navbar-brand syst" id="customNB" href="php/logout.php">
            Sistema de Resguardo BMPC v2.0
          </a>
        </div>
      </div>
    </nav>
  <?php

  }

  ?>
  <div class="modal fade" id="modalModUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
            Actualizar Perfil de Usuario
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form class="form-horizontal" role="form" accept-charset="UTF-8" name="formPerfil" id="formPerfil" method="POST">
            <table class="table table-condensed">
              <tr>
                <td align="right"><label class="control-label">Nombre de Usuario: </span></td>
                <td colspan="3"><input type="text" name="nombre" id="nombre" class="form-control input-sm"></input></td>
              </tr>
              <tr valign="baseline">
                <td align="right"><label class="control-label">Nueva Contraseña:</label></td>
                <td colspan="3"><input type="password" name="pass1" id="pass1" class="form-control input-sm"></input></td>
              </tr>
              <tr valign="baseline">
                <td align="right"><label class="control-label">Confirmar Contraseña:</label></td>
                <td colspan="3"><input type="password" name="pass2" id="pass2" class="form-control input-sm"></input></td>
              </tr>
            </table>
            <input type="hidden" id="rpe" name="rpe" />

          </form>

          <small>
            <div class="card border-success mb-3" style="max-width: auto;">
              <div class="card-header bg-success text-white">
                La contraseña debería cumplir con los siguientes requerimientos:
              </div>
              <div class="card-body text-black">
                <ul>
                  <li id="letras" class="text-danger">Al menos debería tener <strong>una letra</strong></li>
                  <li id="mayusculas" class="text-danger">Al menos debería tener <strong>una letra en mayúsculas</strong></li>
                  <li id="numero" class="text-danger">Al menos debería tener <strong>un número</strong></li>
                  <li id="longitud" class="text-danger">Debería tener <strong>8 carácteres</strong> como mínimo</li>
                  <li id="confirmacion" class="text-danger">Debe <strong>confirmar </strong> la contraseña</li>
                </ul>
              </div>
            </div>
          </small>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-success" id="guardarCambios" disabled>Guardar Cambios</button>
        </div>
      </div>
    </div>
  </div>