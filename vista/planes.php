<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" href="fonts/css/all.css">
    </head>

    <body>

        <div class="container-fluid">
            <div class="row">

                <main role="main" class="container">
                    
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="inicio.php">Inicio</a></li>
                            <li class="breadcrumb-item active">Planes</a></li>
                        </ol>

                        <div class="btn-group mr-2">
                            <button class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#individual">Nuevo plan</button>
                            <button class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#tipo">Nuevo tipo</button>
                          </div>
                    </div>

                    <div class="card border-info">
                        
                        <div class="card-header">
                            <ul class="nav nav-pills nav-justified mb-3">
                                <li class="nav-item">
                                    <a href="#home1" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                        <i class="fas fa-cube"></i> Planes
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#profile1" data-toggle="tab" aria-expanded="false" class="nav-link">
                                        <i class="fas fa-cubes"></i> Tipos de plan
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="card-body">

                            <?php
                            if($msj==1)
                              echo'<div class="alert alert-success text-center">El nuevo tipo fue creado con éxito </div>';
                            if($msj==2)
                              echo'<div class="alert alert-danger text-center">Error al crear el tipo de plan</div>';
                            if($msj==3)
                                echo'<div class="alert alert-success text-center">El nuevo plan fue creado con éxito</div>';
                            if($msj==4)
                              echo'<div class="alert alert-danger text-center">Error al crear el plan</div>';
                            if($msj==5)
                              echo'<div class="alert alert-success text-center">El tipo fue actualizado correctamente</div>';
                            if($msj==6)
                              echo'<div class="alert alert-danger text-center">Error al actualizar el tipo</div>';
                            if($msj==7)
                              echo'<div class="alert alert-warning text-center">El tipo fue eliminado correctamente</div>';
                            if($msj==8)
                              echo'<div class="alert alert-danger text-center">Error al eliminar el tipo</div>';
                            if($msj==9)
                              echo'<div class="alert alert-success text-center">El plan fue actualizado correctamente</div>';
                            if($msj==10)
                              echo'<div class="alert alert-danger text-center">Error al actualizar el plan</div>';
                            if($msj==11)
                              echo'<div class="alert alert-warning text-center">El plan fue eliminado correctamente</div>';
                            if($msj==12)
                              echo'<div class="alert alert-danger text-center">Error al eliminar el plan</div>';
                            ?>

                            <div class="tab-content">


                                <div class="tab-pane show active" id="home1">
                                    <table class="table table-hover table-sm">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Descripción</th>
                                                <th>Tipo de Plan</th>
                                                <th>Sesiones</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>

<?php
require"../modelo/conexion_bd.php";
require"../modelo/plan.php";
require"../modelo/tipo.php"; 
$PlanA = new plan();
$datosA = $PlanA->consultarPlan();
if (isset($datosA)) {
    if($datosA->num_rows >0 ){
        while($registroA=$datosA->fetch_assoc()){
?>

                                        <tbody class="">
                                            <tr>
                                                <td><?php echo $registroA['Nom_Pla']?></td>
                                                <td><?php echo $registroA['Tip_Nom']?></td>
                                                <td><?php echo $registroA['Cnt_Ses']?></td>
                                                <td><a class="btn btn-primary btn-sm" href="inicio.php?pag=planes1&id=<?php echo $registroA['Id_Pla']?>">Contenido</a></td>
                                                <td><button class="btn btn-sm btn-info" data-toggle="modal" data-target="#modificarP<?php echo $registroA['Id_Pla']?>">Modificar</button> <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#EliminarP<?php echo $registroA['Id_Pla']?>">Eliminar</button></td>


                                                <div class="modal fade" id="modificarP<?php echo $registroA['Id_Pla']?>" tabindex="-1" role="dialog" aria-labelledby="individual1" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <form action= "../controlador/actualizar_plan.php" method= "POST">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLongTitle">Modificar Plan</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <input name="Id_Pla" class="form-control" value="<?php echo $registroA['Id_Pla']?>" type="hidden"></input>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <label for="DescripcionP">Descripción</label>
                                                                            <input name="DescripcionP" class="form-control" value="<?php echo $registroA['Nom_Pla']?>"></input>
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                    <div class="row">
                                <?php
                                extract ($_POST);
                                $tipoA = new tipo();
                                $datosB = $tipoA->consultarTipo();
                                if (isset($datosB)) {
                                    if($datosB->num_rows >0 ){
                                ?>
                                                                        <div class="col-md-12">
                                                                            <label for="TipoP">Tipo de Plan</label>
                                                                            <select class='form-control' name="TipoP" id="" required>
                                                                                <option value="<?php echo $registroA['Tip_Pro']?>"><?php echo $registroA['Tip_Nom']?></option>
                                                                                
                                    <?php
                                    while($registroT=$datosB->fetch_object())
                                        {
                                    ?>
                                                                                <option value="<?php echo$registroT->Tip_Pro?>"><?php echo$registroT->Tip_Nom?></option>

                                    <?php 
                                            } 
                                        }
                                    }
                                    ?>

                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <label for="">Sesiones</label>
                                                                            <input type="number" class="form-control col-md-2" name="Sesion" value="<?php echo $registroA['Cnt_Ses']?>"></input>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-info">Modificar</button>
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal fade" id="EliminarP<?php echo $registroA['Id_Pla']?>" tabindex="-1" role="dialog" aria-labelledby="individual2" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <form action= "../controlador/eliminar_plan.php" method= "POST">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLongTitle">Eliminar Plan</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <input name="Id_Pla" class="form-control" value="<?php echo $registroA['Id_Pla']?>" type="hidden"></input>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <label for="DescripcionP">Descripción</label>
                                                                            <input name="DescripcionP" class="form-control" value="<?php echo $registroA['Nom_Pla']?>" readonly=""></input>
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <label for="TipoP">Tipo de Plan</label>
                                                                            <input name="DescripcionP" class="form-control" value="<?php echo $registroA['Tip_Nom']?>" readonly=""></input>
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <label for="Sesion">Sesiones</label>
                                                                            <input type="number" class="form-control col-md-2" name="Sesion" value="<?php echo $registroA['Cnt_Ses']?>" readonly=""></input>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                            </tr>
<?php
        }
    }
}
?>   
                                        </tbody>
                                    </table>
                                </div>


<?php
extract ($_POST);
$TipoB = new tipo();
$datosC = $TipoB->consultarTipo();
if (isset($datosC)) {
    if($datosC->num_rows >0 ){
    ?>

                                <div class="tab-pane" id="profile1">
                                    <table class="table table-hover table-sm">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Descripción</th>
                                                <th></th>
                                            </tr>
                                        </thead>

    <?php
    while($registroB=$datosC->fetch_assoc()) {
    ?>

                                        <tbody>
                                            <tr>
                                                <td><?php echo $registroB['Tip_Nom']?></td>
                                                <td><button class="btn btn-sm btn-info" data-toggle="modal" data-target="#modificarT<?php echo $registroB['Tip_Pro']?>">Modificar</button> <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#eliminarT<?php echo $registroB['Tip_Pro']?>">Eliminar</button></td>
                                                                                        
                                                <div class="modal fade" id="modificarT<?php echo $registroB['Tip_Pro']?>" tabindex="-1" role="dialog" aria-labelledby="tipo1" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <form action= "../controlador/actualizar_tipo.php" method= "POST">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLongTitle">Modificar tipo de plan</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <input name="Tip_Pro" type="hidden" value="<?php echo $registroB['Tip_Pro']?>" />
                                                                            <label for="DescripcionT">Descripción</label>
                                                                            <input name="DescripcionT" class="form-control" value="<?php echo $registroB['Tip_Nom']?>"></input>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-info">Modificar</button>
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal fade" id="eliminarT<?php echo $registroB['Tip_Pro']?>" tabindex="-1" role="dialog" aria-labelledby="tipo2" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <form action= "../controlador/eliminar_tipo.php" method= "POST">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLongTitle">Eliminar tipo de plan</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <input name="Tip_Pro" type="hidden" value="<?php echo $registroB['Tip_Pro']?>" />
                                                                            <label for="DescripcionT">Descripción</label>
                                                                            <input name="DescripcionT" class="form-control" value="<?php echo $registroB['Tip_Nom']?>" readonly=""></input>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

        <?php
        }
    }
}
?>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br>

                    <div class="modal fade" id="individual" tabindex="-1" role="dialog" aria-labelledby="individual" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <form action= "../controlador/insertar_plan.php" method= "POST">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Ingresar nuevo Plan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="DescripcionP">Descripción</label>
                                                <input name="DescripcionP" class="form-control"placeholder=""></input>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">



                                            <div class="col-md-12">
                                                <label for="TipoP">Tipo de Plan</label>
                                                <select class='form-control' name="TipoP" id="" required>
                                                    <option></option>
<?php
extract ($_POST); 
$TipoC = new tipo();
$datosD = $TipoC->consultarTipo();
if (isset($datosD)) {
    if($datosD->num_rows >0 ){
        while($registroC=$datosD->fetch_object()){
        ?>

                                                    <option value="<?php echo$registroC->Tip_Pro?>"><?php echo$registroC->Tip_Nom?></option>
        <?php 
        }
    } 
}
?>
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="Sesion">Sesiones</label>
                                                <input type="number" class="form-control col-md-2" name="Sesion"></input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Guardar</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="tipo" tabindex="-1" role="dialog" aria-labelledby="tipo" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <form action= "../controlador/insertar_tipo.php" method= "POST">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Nuevo tipo de plan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="DescripcionT">Descripción</label>
                                                <input name="DescripcionT" class="form-control"></input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Guardar</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </main>
            </div>
        </div>

        
        <script src="js/jquery-3.3.1.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.js"></script>

    </body>
</html>
