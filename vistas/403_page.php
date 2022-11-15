<!--  -->

    <div class="container-respons">
        <div class="container" id="cluster1">
            <h2>Error 403</h2>
            <h4>No podemos redirigirte a esta página.</h4>
            <img src="imagenes/llaveVerde.jpg" class="img401" alt="Imagen de una llave." />
            <br>
            <?php
            if (isset($_SESSION["rpe"])) {
            ?> 
                <a href="php/accederHome.php" class="btn btn-success" role="button"><i class="bi bi-backspace-fill"></i> Regresar</a>
            <?php
            } else {
            ?>
                <a href="php/logout.php" class="btn btn-success" role="button"><i class="bi bi-door-open-fill"></i> Iniciar Sesión</a>
            <?php
            }
            ?>
        </div>
    </div>
</body>

</html>