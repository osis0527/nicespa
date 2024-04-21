<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" href="fonts/css/all.css">

        <title>Proyecto SENA</title>
    </head>

    <body>

        <div class="container-fluid">
            <div class="row">

                <main role="main" class="container">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="inicio.php">Inicio</a></li>
                            <li class="breadcrumb-item"><a href="inicio.php?pag=pacientes">Pacientes</a></li>
                            <li class="breadcrumb-item active">Nuevo</li>
                        </ol>

                    </div>

                    <div class="card bg-light">
                        <form action= "../controlador/insertar_paciente.php" method= "POST">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="TipDocumento">Documento</label>
                                        <select class="form-control" name="TipDocumento" required>
                                            <option></option>
                                            <option>RC</option>
                                            <option>TI</option>
                                            <option>CC</option>
                                            <option>PA</option>
                                            <option>CE</option>
                                        </select>
                                    </div>
                                     <div class="col-md-2">
                                        <label for="Documento"><br></label>
                                        <input type="text" class="form-control" name="Documento" placeholder="Documento" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="Nombres">Nombres</label>
                                        <input type="text" class="form-control" name="Nombres" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="Apellidos">Apellidos</label>
                                        <input type="text" class="form-control" name="Apellidos" required>
                                    </div>
                                </div>



                                <div class="row">
                                   <div class="col-md-3">
                                        <label for="FechaNac">Fecha Nacimiento</label>
                                        <input type="date" class="form-control" name="FechaNac"required>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="Sexo">Sexo</label>
                                        <div>
                                            <select class="form-control" name="Sexo" required>
                                                <option></option>
                                                <option value="FEMENINO">FEMENINO</option>
                                                <option value="MASCULINO">MASCULINO</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="EstaCivil">Estado civil</label>
                                        <select class="form-control" name="EstaCivil" required>
                                            <option></option>
                                            <option value="Soltero">Soltero</option>
                                            <option value="Casado">Casado</option>
                                            <option value="Unión libre">Unión libre</option>
                                            <option value="Viudo">Viudo</option>
                                            <option value="Otro">Otro</option>
                                        </select>
                                    </div>
                                    <div class="col-md-5">
                                        <label for="Direccion">Dirección</label>
                                        <input type="text" class="form-control" name="Direccion">
                                    </div>
                                </div>
                        
                        
                                <div><label></label></div>
                        
                        
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="Barrio">Barrio</label>
                                        <input type="text" class="form-control" name="Barrio">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="Tele">Teléfono</label>
                                        <input type="number" class="form-control" name="Tele">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="Celu">Celular</label>
                                        <input type="number" class="form-control" name="Celu">
                                    </div>
                                    <div class="col-md-5">
                                        <label for="Mail">Email</label>
                                        <input type="email" class="form-control" name="Mail" placeholder="you@example.com">
                                    </div>
                                </div>
                                
                                
                                <div><label></label></div>

                            </div>
                            <div class="card-footer text-muted text-right">
                                <button type="submit" class="btn btn-sm btn-success">
                                    <i class="fas fa-save"></i> Guardar
                                </button>
                                <a href="inicio.php?pag=pacientes" class="btn btn-sm btn-danger">
                                    <i class="fas fa-window-close"></i> Cancelar
                                </a>
                            </div>
                        </form>
                    </div>
                    <br>
                </main>
            </div>
        </div>

        <script src="js/jquery-3.3.1.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.js"></script>

    </body>
</html>

<?php
if($msj==1){
  echo '<div class="alert alert-success text-center"> Se ha agregado el registro del Paciente correctamente </div>';
}
if($msj==2){
  echo '<div class="alert alert-danger text-center"> Error al registrar el Paciente. Verifique los datos  </div>';
}
?>
