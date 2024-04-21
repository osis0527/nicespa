<?php
extract ($_REQUEST); 
require"../modelo/conexion_bd.php";
require"../modelo/paciente.php";

if (isset($_REQUEST['id'])) {
    $paciente= new paciente();
    $datos=$paciente->consultarPaciente($_REQUEST['id']);

    if (isset($datos)) {
        if($datos->num_rows >0 ){
            $registro=$datos->fetch_object()?>

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
                            <li class="breadcrumb-item active">Modificar</li>
                        </ol>

                    </div>

                    <div class="card bg-light">
                        <form action= "../controlador/actualizar_paciente.php" method= "POST">
                            <div class="card-body">
                                <div class="row">

                                    <input name="Num_Cit" type="hidden" value="<?php echo $registro->Num_Cit?>" />

                                    <div class="col-md-2">
                                        <label for="TipDocumento">Documento</label>
                                        <select class="form-control" name="TipDocumento" required>
                                            <option><?php echo $registro->Tip_Doc?></option>
                                            <option>RC</option>
                                            <option>TI</option>
                                            <option>CC</option>
                                            <option>PA</option>
                                            <option>CE</option>
                                        </select>
                                    </div>
                                     <div class="col-md-2">
                                        <label for="Documento"><br></label>
                                        <input type="text" class="form-control" name="Documento" value="<?php echo $registro->Nro_Doc?>" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="Nombres">Nombres</label>
                                        <input type="text" class="form-control" name="Nombres" value="<?php echo $registro->Nom_Pac?>" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="Apellidos">Apellidos</label>
                                        <input type="text" class="form-control" name="Apellidos" value="<?php echo $registro->Ape_Pac?>" required>
                                    </div>
                                </div>



                                <div class="row">
                                   <div class="col-md-3">
                                        <label for="FechaNac">Fecha Nacimiento</label>
                                        <input type="date" class="form-control" name="FechaNac" value="<?php echo $registro->Nac_Pac?>" required>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="Sexo">Sexo</label>
                                        <div>
                                            <select class="form-control" name="Sexo" required>
                                                <option><?php echo $registro->Sex_Pac?></option>
                                                <option value="F">FEMENINO</option>
                                                <option value="M">MASCULINO</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="EstaCivil">Estado civil</label>
                                        <select class="form-control" name="EstaCivil" required>
                                            <option><?php echo $registro->Civ_Pac?></option>
                                            <option value="S">Soltero</option>
                                            <option value="C">Casado</option>
                                            <option value="U">Unión libre</option>
                                            <option value="V">Viudo</option>
                                            <option value="O">Otro</option>
                                        </select>
                                    </div>
                                    <div class="col-md-5">
                                        <label for="Direccion">Dirección</label>
                                        <input type="text" class="form-control" name="Direccion" value="<?php echo $registro->Dir_Pac?>" >
                                    </div>
                                </div>
                        
                        
                                <div><label></label></div>
                        
                        
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="Barrio">Barrio</label>
                                        <input type="text" class="form-control" name="Barrio" value="<?php echo $registro->Bar_Pac?>">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="Tele">Teléfono</label>
                                        <input type="number" class="form-control" name="Tele" value="<?php echo $registro->Tel_Pac?>">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="Celu">Celular</label>
                                        <input type="number" class="form-control" name="Celu" value="<?php echo $registro->Cel_Pac?>">
                                    </div>
                                    <div class="col-md-5">
                                        <label for="Mail">Email</label>
                                        <input type="email" class="form-control" name="Mail" value="<?php echo $registro->Mai_Pac?>">
                                    </div>
                                </div>
                                
                                
                                <div><label></label></div>

                            </div>
                            <div class="card-footer text-muted text-right">
                                <button type="submit" class="btn btn-sm btn-info">
                                    <i class="fas fa-save"></i> Modificar
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
}
}
}
?>

<?php
if($msj==1)
  echo'<div class="alert alert-success text-center"> El paciente se actualizó correctamente</div>';
if($msj==2)
  echo'<div class="alert alert-danger text-center"> Error al actualizar el Registro, NO se guardaron los cambios</div>';

?>