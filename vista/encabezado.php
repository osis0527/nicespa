<?php
session_start();
$_SESSION['nombre'];
$_SESSION['apellido'];
$_SESSION['tipo'];
?>

<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" href="fonts/css/all.css">
        <script src="js/jquery-3.3.1.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.js"></script>

    </head>

    <body>
        <nav class="navbar navbar-expand flex-column flex-md-row bg-secondary navbar-dark site-header sticky-top">
            <div class="container d-flex justify-content-between">
                <img src="images/logo.png" alt="" width="170" height="80">

                <div class="btn-group-vertical">
                    <button id="btnGroupDrop1" type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php print $_SESSION['nombre'].' '.$_SESSION['apellido'].' - '.$_SESSION['tipo'];?>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <a class="dropdown-item" href="#">Modificar usuario</a>
                        <a class="dropdown-item" href="indexsis.php">Cerrar sesión</a>
                    </div>
                </div>
            </div>
        </nav>
    </body>
</html>
