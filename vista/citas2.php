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
                            <li class="breadcrumb-item active">Modificar</li>
                        </ol>

                    </div>

                    <div class="card bg-light">
                        <form action= "../controlador/actualizar_cita.php" method= "POST">
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
                                            <input type="date" class="form-control" name="Fec_cita" value="<?php echo $registro->Fec_Cit?>" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="Hora_Cita">Hora de la cita</label>
                                            <select class="form-control" name="Hora_Cita" required>
                                                <option value="<?php echo $registro->Hor_Cit?>"><?php echo $registro->Hor_Cit?></option>
                                                <option value="08:00">08:00</option>
                                                <option value="09:00">09:00</option>
                                                <option value="10:00">10:00</option>
                                                <option value="11:00">11:00</option>
                                                <option value="12:00">12:00</option>
                                                <option value="13:00">13:00</option>
                                                <option value="14:00">14:00</option>
                                                <option value="15:00">15:00</option>
                                                <option value="16:00">16:00</option>
                                                <option value="17:00">17:00</option>
                                                <option value="18:00">18:00</option>
                                                <option value="19:00">19:00</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div>
                                    <div class="row">
                                        <div class="col-md-6">

                                            <?php
                                            require"../modelo/plan.php";
                                            $PlanA = new plan();
                                            $datosA = $PlanA->consultarPlan();
                                            if (isset($datosA)) {
                                                if($datosA->num_rows >0 ){
                                            ?>

                                            <label for="Plan">Plan</label>
                                            <div>
                                                <select class="form-control" name="Plan" required>
                                                    <option value="<?php echo $registro->Id_Pla?>"><?php echo $registro->Nom_Pla?></option>

                                                    <?php
                                                    while($registroA=$datosA->fetch_object()){
                                                    ?>

                                                    <option value="<?php echo$registroA->Id_Pla?>"><?php echo$registroA->Nom_Pla?></option>
                                                    
                                                    <?php
                                                            }
                                                        }
                                                    }
                                                    ?>

                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-md-6">

                                            <?php
                                            require"../modelo/procedimiento.php";
                                            $PlanB = new procedimiento();
                                            $datosB = $PlanB->consultarProcedimientos();
                                            if (isset($datosB)) {
                                                if($datosB->num_rows >0 ){
                                            ?>

                                            <label for="Plan_Proc">Procedimiento</label>
                                            <select class="form-control" name="Plan_Proc" required>
                                                <option value="<?php echo $registro->Cod_Pro?>"><?php echo $registro->Nom_Pro?></option>

                                                <?php
                                                while($registroB=$datosB->fetch_object())
                                                    {
                                                ?>

                                                <option value="<?php echo$registroB->Cod_Pro?>"><?php echo$registroB->Nom_Pro?></option>
                                                <?php 
                                                        }
                                                    }
                                                }
                                                ?>

                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="row col-md-12">
                                    <label for="Profesional">Esteticista</label>

                                    <?php
                                    require"../modelo/profesional.php";
                                    $PlanC = new profesional();
                                    $datosC = $PlanC->consultarProfesional();
                                    if (isset($datosC)) {
                                        if($datosC->num_rows >0 ){
                                    ?>

                                    <select class="form-control" name="Profesional" required>
                                        <option value="<?php echo $registro->Cod_Prf?>"><?php echo $registro->Profesional?></option>

                                        <?php
                                        while($registroC=$datosC->fetch_object()){
                                        ?>

                                        <option value="<?php echo$registroC->codigo?>"><?php echo$registroC->profesional?></option>
                                        <?php
                                                }
                                            }
                                        }
                                        ?>

                                    </select>
                                </div>
                            </div>

                            <div class="card-footer text-muted text-right">
                                <button type="submit" class="btn btn-sm btn-info">
                                    <i class="fas fa-save"></i> Modificar
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