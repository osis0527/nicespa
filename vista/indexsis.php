<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/signin.css">
    <link rel="stylesheet" href="fonts/css/all.css">
    <title>Proyecto SENA</title>
  <head>

  <body class="bg-active">
    <form class="form-signin" method="post" action="../controlador/valida_inicio.php">
      <div class="jumbotron shadow" style="background-image: url('images/Consentido2.jpg'); background-size: 100% 100%">
        <h1 class="display-3">Bienvenidos</h1>
        <br>
        <br>
        <div class="media">
          <div class="media-body align-self-center mr-3">
            <label for="usuario"><i class="fas fa-user"></i> Usuario</label>
            <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Ingrese usuario" required autofocus>
            <br>
            <label for="contrasena"><i class="fas fa-lock"></i> Contraseña</label>
            <input type="password" id="contrasena" name="contrasena" class="form-control" placeholder="Digite contraseña" required>
            <br>
            <input type="submit" class="btn btn-primary btn-lg" role="button" value="Ingresar"></input>
          </div>
        </div>
      </div>
    </form>

  <body>
</html>

<?php
if ($x==1)
  echo "<br><p align='center'> BIENVENIDO";
if ($x==2)
  echo "<br><p align='center'> Error al iniciar Sesión, debe verificar usuario y contraseña";
if ($x==3)
  echo "<br><p align='center'> El Usuario ha cerrado la Sesión";
?>