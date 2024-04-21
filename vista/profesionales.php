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
                            <li class="breadcrumb-item active">Esteticistas</a></li>
                        </ol>

                        <div class="btn-group mr-2">
                            <button class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#profesional">Nuevo esteticista</button>
                            <button class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#tipo">Nuevo tipo profesional</button>
                          </div>
                    </div>

                    <div class="card border-info">
                        
                        <div class="card-header">
                            <ul class="nav nav-pills nav-justified mb-3">
                                <li class="nav-item">
                                    <a href="#home1" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                        <i class="fas fa-cube"></i> Esteticistas
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#profile1" data-toggle="tab" aria-expanded="false" class="nav-link">
                                        <i class="fas fa-cubes"></i> Tipos de profesional
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
                              echo'<div class="alert alert-warning text-center">El profesional fue actualizado correctamente</div>';
                            if($msj==8)
                              echo'<div class="alert alert-danger text-center">Error al eliminar el profesional</div>';
                            ?>

                            <div class="tab-content">
                                <div class="tab-pane show active" id="home1">
                                    <table class="table table-hover table-sm">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Código</th>
                                                <th>Nombre</th>
                                                <th>Apellidos</th>
                                                <th>Tipo de profesional</th>
                                                <th></th>
                                            </tr>
                                        </thead>

                                        <?php
                                        require"../modelo/conexion_bd.php";
                                        require"../modelo/profesional.php";
                                        require"../modelo/tipo_prf.php"; 
                                        $ProfesionalA = new profesional();
                                        $datosA = $ProfesionalA->consultarProfesional();
                                        if (isset($datosA)) {
                                            if($datosA->num_rows >0 ){
                                                while($registroA=$datosA->fetch_assoc()){
                                        ?>

                                        <tbody class="">
                                            <tr>
                                                <td><?php echo $registroA['codigo']?></td>
                                                <td><?php echo $registroA['nombre']?></td>
                                                <td><?php echo $registroA['apellido']?></td>
                                                <td><?php echo $registroA['tipo']?></td>
                                                <td><button class="btn btn-sm btn-info" data-toggle="modal" data-target="#modificarP<?php echo $registroA['codigo']?>">Modificar</button></td>

                                                

                                                <div class="modal fade" id="modificarP<?php echo $registroA['codigo']?>" tabindex="-1" role="dialog" aria-labelledby="profesional1" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <form action= "../controlador/actualizar_profesional.php" method= "POST">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLongTitle">Modificar datos esteticista</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <label for="Cod_Prf">Código interno</label>
                                                                            <input name="Cod_Prf" class="form-control" value="<?php echo $registroA['codigo']?>" readonly=""></input>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <label for="Nom_Prf">Nombres</label>
                                                                            <input name="Nom_Prf" class="form-control" value="<?php echo $registroA['nombre']?>"></input>
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <label for="Ape_Prf">Apellidos</label>
                                                                            <input name="Ape_Prf" class="form-control" value="<?php echo $registroA['apellido']?>"></input>
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                    <div class="row">

                                                                    <?php
                                                                    extract ($_POST);
                                                                    $tipoA = new tipoPrf();
                                                                    $datosB = $tipoA->consultarTipoPrf();
                                                                    if (isset($datosB)) {
                                                                        if($datosB->num_rows >0 ){
                                                                    ?>

                                                                        <div class="col-md-12">
                                                                            <label for="Prf_Cod">Tipo de profesional</label>
                                                                            <select class='form-control' name="Prf_Cod" id="" required>
                                                                                <option value="<?php echo $registroA['tipo']?>"><?php echo $registroA['tipo']?></option>

                                                                            <?php
                                                                            while($registroT=$datosB->fetch_object())
                                                                            {
                                                                            ?>

                                                                                <option value="<?php echo$registroT->Prf_Nom?>"><?php echo$registroT->Prf_Nom?></option>

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
                                                                            <select class='form-control' name="Estado" id="Estado" required>
                                                                                <option value="<?php echo $registroA['estado']?>"><?php echo $registroA['estado']?></option>
                                                                                <option value="ACTIVO">ACTIVO</option>
                                                                                <option value="INACTIVO">INACTIVO</option>
                                                                            </select>
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
                                $TipoB = new tipoPrf();
                                $datosC = $TipoB->consultarTipoPrf();
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
                                                <td><?php echo $registroB['Prf_Nom']?></td>
                                                <td><button class="btn btn-sm btn-info" data-toggle="modal" data-target="#modificarT<?php echo $registroB['Prf_Cod']?>">Modificar</button></td>

                                                <div class="modal fade" id="modificarT<?php echo $registroB['Prf_Cod']?>" tabindex="-1" role="dialog" aria-labelledby="modificarT<?php echo $registroB['Prf_Cod']?>" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <form action= "../controlador/actualizar_tPrf.php" method= "POST">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLongTitle">Modificar tipo de profesional</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <input name="Prf_Cod" type="hidden" value="<?php echo $registroB['Prf_Cod']?>" />
                                                                            <label for="TipoProfesional">Descripción</label>
                                                                            <input name="TipoProfesional" class="form-control" value="<?php echo $registroB['Prf_Nom']?>"></input>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="Submit" class="btn btn-info">Modificar</button>
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

                    <div class="modal fade" id="profesional" tabindex="-1" role="dialog" aria-labelledby="profesional" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <form action= "../controlador/insertar_profesional.php" method= "POST">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Ingresar nuevo esteticista</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="Cod_Prf">Código interno</label>
                                                <input name="Cod_Prf" class="form-control"></input>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="Nom_Prf">Nombres</label>
                                                <input name="Nom_Prf" class="form-control"></input>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="Ape_Prf">Apellidos</label>
                                                <input name="Ape_Prf" class="form-control"></input>
                                            </div>
                                        </div>
                                        <br>

                                        <?php
                                        extract ($_POST); 
                                        $TipoC = new tipoPrf();
                                        $datosD = $TipoC->consultarTipoPrf();
                                        if (isset($datosD)) {
                                            if($datosD->num_rows >0 ){
                                            ?>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="Prf_Cod">Tipo de profesional</label>
                                                <select class='form-control' name="Prf_Cod" id="Prf_Cod" required>
                                                    <option></option>
                                                    
                                                    <?php
                                                    while($registroC=$datosD->fetch_object()){
                                                    ?>

                                                    <option value="<?php echo$registroC->Prf_Nom?>"><?php echo$registroC->Prf_Nom?></option>

                                                    <?php 
                                                            }
                                                        }
                                                    }
                                                    ?>

                                                </select>
                                            </div>
                                        </div>
                                        <br>
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
                                <form action= "../controlador/insertar_tprf.php" method= "POST">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Nuevo tipo de profesional</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="TipoProfesional">Descripción</label>
                                                <input name="TipoProfesional" class="form-control"></input>
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