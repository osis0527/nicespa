<?php
extract ($_REQUEST);
if (!isset($_REQUEST['pag']))
    $pag='contenido';
?>

<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Proyecto SENA</title>
    </head>

    <body>
        <div id="divEncabezado"><?php include "encabezado.php";?></div>
        <div id="divContenido"> <?php include $pag.".php" ;?> </div>
        <div id="divEncabezado"><?php include "pie.php";?></div>
    </body>
</html>