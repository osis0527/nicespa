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
                            <li class="breadcrumb-item active">Procedimientos</a></li>
                        </ol>

                        <div class="btn-group mr-2">
                            <button class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#individual">Nuevo</button>
                          </div>
                    </div>

                    <div class="card border-info">

                        <div class="card-body">

                            <?php
                            extract ($_POST); 
                            require"../modelo/conexion_bd.php";
                            require"../modelo/procedimiento.php";

                            $Procedimiento = new procedimiento();
                            $datos = $Procedimiento->consultarProcedimientos();
                            if (isset($datos)) {
                                if($datos->num_rows >0 ){
                                        ?>

                            <?php
                            if($msj==1)
                              echo'<div class="alert alert-success text-center">El nuevo procedimiento fue creado con éxito </div>';
                            if($msj==2)
                              echo'<div class="alert alert-danger text-center">Error al crear el registro</div>';
                            if($msj==3)
                                echo'<div class="alert alert-success text-center">El procedimiento se actualizó correctamente</div>';
                            if($msj==4)
                              echo'<div class="alert alert-danger text-center">Error al actualizar el registro</div>';
                            if($msj==5)
                              echo'<div class="alert alert-warning text-center">El procedimiento fue eliminado correctamente</div>';
                            if($msj==6)
                              echo'<div class="alert alert-danger text-center">Error al eliminar el registro</div>';
                            ?>

                            <table class="table table-hover table-sm">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Código</th>
                                        <th>Descripción</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <?php
                                while($registro=$datos->fetch_assoc())
                                    {
                                    ?>

                                <tbody class="">
                                    <tr>
                                        <th><?php echo $registro['Cod_Pro']?></th>
                                        <td><?php echo $registro['Nom_Pro']?></td>
                                        <td><button class="btn btn-sm btn-info" data-toggle="modal" data-target="#modificar<?php echo $registro['Cod_Pro']?>">Modificar</button> <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#eliminar<?php echo $registro['Cod_Pro']?>">Eliminar</button></td>


                                        <div class="modal fade" id="modificar<?php echo $registro['Cod_Pro']?>" tabindex="-1" role="dialog" aria-labelledby="modificar" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <form action= "../controlador/actualizar_procedimiento.php" method= "POST">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Modificar procedimiento</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label for="Codigo">Código</label>
                                                                    <input name="Codigo" class="form-control" value="<?php echo $registro['Cod_Pro']?>"></input>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <label for="NombrePro">Descripción</label>
                                                                    <input name="NombrePro" class="form-control" value="<?php echo $registro['Nom_Pro']?>"></input>
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


                                        <div class="modal fade" id="eliminar<?php echo $registro['Cod_Pro']?>" tabindex="-1" role="dialog" aria-labelledby="eliminar" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <form action= "../controlador/eliminar_procedimiento.php" method= "POST">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Eliminar procedimiento</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label for="Codigo">Código</label>
                                                                    <input name="Codigo" class="form-control" value="<?php echo $registro['Cod_Pro']?>" readonly=""></input>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <label for="NombrePro">Descripción</label>
                                                                    <input name="NombrePro" class="form-control" value="<?php echo $registro['Nom_Pro']?>" readonly=""></input>
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
                    </div>



                    <br>

                    <div class="modal fade" id="individual" tabindex="-1" role="dialog" aria-labelledby="individual" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <form action= "../controlador/insertar_procedimiento.php" method= "POST">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Ingresar nuevo procedimiento</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="Codigo">Código</label>
                                                <input name="Codigo" class="form-control"></input>
                                            </div>
                                            <div class="col-md-8">
                                                <label for="NombrePro">Descripción</label>
                                                <input name="NombrePro" class="form-control"></input>
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