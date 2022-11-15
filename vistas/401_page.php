<div class="container-respons">
    <div class="container" id="cluster1">
        <h2>Error 401</h2>
        <?php
        if (isset($_SESSION['nombre'])) {
        ?>
            <h4><?= $_SESSION["nombre"] ?> no tienes permitido acceder a este modulo, solicite el acceso con el Superadministrador.</h4>
            <img src="imagenes/candado.png" class="img401" alt="Imagen de un candado." />
            <br>
            <a href="php/accederHome.php" class="btn btn-success" role="button"><i class="bi bi-backspace-fill"></i> Regresar</a>
        <?php
        } else {
        ?>
            <h4> no tienes permitido acceder a este modulo, solicite el acceso con el Superadministrador.</h4>
            <img src="imagenes/candado.png" class="img401" alt="Imagen de un candado." />
            <br>
            <a href="php/logout.php" class="btn btn-success" role="button"><i class="bi bi-backspace-fill"></i> Regresar</a>
        <?php
        }
        ?>
    </div>
</div>