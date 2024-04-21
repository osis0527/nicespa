<?php
extract ($_REQUEST); 
require"../modelo/conexion_bd.php";
require"../modelo/citas.php";

if (isset($_REQUEST['id'])) {
    $citas= new citas();
    $datos=$citas->consultarCita($_REQUEST['id']);

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
                            <li class="breadcrumb-item active">Cancelar</li>
                        </ol>

                    </div>

                    <div class="card bg-light">
                        <form action= "../controlador/cancelar_cita.php" method= "POST">
                            
                            <div class="card-body">
                                
                                <input name="Num_Cit" type="hidden" value="<?php echo $registro->Num_Cit?>" />
                                    
                                <div class="row col-md-12">
                                    <label for="Paciente">Paciente</label>
                                    <input name="Paciente" type="hidden" value="<?php echo $registro->Id_Pac?>" />
                                    <input type="text" class="form-control" name="Nombre_Pac" value="<?php echo $registro->Nombre?>" readonly="">
                                </div>
                                
                                <div>
                                    <div class="row">
                                        <div class="col-md-6">
                                                <label for="Fec_cita">Fecha de cita</label>
                                                <input type="date" class="form-control" name="Fec_cita" value="<?php echo $registro->Fec_Cit?>" readonly="">
                                            </div>
                                        <div class="col-md-5">
                                            <label for="Hora_Cita">Hora de la cita</label>
                                            <input type="text" class="form-control" name="Hora_Cita" value="<?php echo $registro->Hor_Cit?>" readonly="">
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="Plan">Plan</label>
                                            <input type="text" class="form-control" name="Plan" value="<?php echo $registro->Nom_Pla?>" readonly="">
                                        </div>
                                        <div class="col-md-5">
                                            <label for="Plan_Proc">Procedimiento</label>
                                            <input type="text" class="form-control" name="Plan_Proc" value="<?php echo $registro->Nom_Pro?>" readonly="">
                                        </div>
                                    </div>
                                </div>

                                <div class="row col-md-12">
                                    <label for="Profesional">Esteticista</label>
                                    <input type="text" class="form-control" name="Profesional" value="<?php echo $registro->Profesional?>" readonly="">
                                </div>
                                <br>
                                <div class="row col-md-12">
                                    <label for="Motivo">Motivo</label>
                                    <input type="text" id="Motivo" name="Motivo" class="form-control" placeholder="Describa motivo de cancelación" required autofocus>
                                </div>

                            </div>

                            <div class="card-footer text-muted text-right">
                                <button type="submit" class="btn btn-sm btn-warning">
                                    <i class="fas fa-save"></i> Cancelar
                                </button>
                                <a href="inicio.php" class="btn btn-sm btn-danger">
                                    <i class="fas fa-window-close"></i> Salir
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