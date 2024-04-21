
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
                <nav class="col-md-2 d-none d-md-block bg-dark navbar-dark sidebar">
                    <div class="sidebar-sticky">
                        <ul class="nav flex-column mb-2n">
                            <li class="nav-item mt-4">
                                <a class="nav-link text-white" href="inicio.php?pag=pacientes">
                                    <i class="fas fa-users"></i> Pacientes
                                </a>
                            </li>
                             <li class="nav-item mt-4">
                                <a class="nav-link text-white" href="inicio.php?pag=citas1">
                                    <i class="fas fa-calendar-alt"></i> Agendar Citas
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Agenda de citas</h1>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <div class="btn-group mr-2">
                                <input type="date" class="btn btn-sm btn-info" >
                                <button type="button" class="btn btn-sm btn-outline-info">Ir</button>
                            </div>
                        </div>
                    </div>

                     <?php
                    extract ($_POST);
                    require"../modelo/conexion_bd.php";
                    require"../modelo/citas.php";

                    $citas = new citas();
                    $datos = $citas->consultarContenido();
                        if (isset($datos)) {
                            if($datos->num_rows >0 ){
                                ?>
                        <?php
                        if($msj==1)
                          echo'<div class="alert alert-success text-center"> La cita fue modificada con éxito </div>';
                        if($msj==2)
                          echo'<div class="alert alert-danger text-center"> Error al modificar el registro</div>';
                        if($msj==3)
                          echo'<div class="alert alert-warning text-center"> La cita fue cancelada con éxito </div>';
                        if($msj==4)
                          echo'<div class="alert alert-danger text-center"> Error al cancelar el registro</div>';
                        if($msj==5)
                          echo'<div class="alert alert-success text-center"> La consulta fue guardada con éxito </div>';
                        if($msj==6)
                          echo'<div class="alert alert-danger text-center"> Error al guardar datos de consulta el registro</div>';
                        ?>

                    <div class="card bg-light">



                        <div class="card-body">
                            <table class="table table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Hora</th>
                                        <th>Plan</th>
                                        <th>Procedimiento</th>
                                        <th>Estado</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <?php
                                while($registro=$datos->fetch_object()){
                                ?>

                                <tbody>
                                    <tr>
                                        <td><?php echo $registro->Num_Cit?></td>
                                        <td><?php echo $registro->Nom_Pac?></td>
                                        <td><?php echo $registro->Ape_Pac?></td>
                                        <td><?php echo $registro->Hor_Cit?></td>
                                        <td><?php echo $registro->Nom_Pla?></td>
                                        <td><?php echo $registro->Nom_Pro?></td>
                                        <th><?php echo $registro->Cit_Esta?></th>
                                        <th><a class="btn btn-md btn-success" href="inicio.php?pag=clinica&id=<?php echo $registro->Num_Cit?>&ses=<?php echo $registro->Id_Pla?>">Atender</a><a class="btn btn-md btn-info" href="inicio.php?pag=factura">Facturar</a></th>
                                        <th><a class="btn btn-md  btn-warning" href="inicio.php?pag=citas2&id=<?php echo $registro->Num_Cit?>">Modificar</a> <a class="btn btn-md btn-danger" href="inicio.php?pag=citas3&id=<?php echo $registro->Num_Cit?>">Cancelar</a></th>
                                    </tr>
                                </tbody>

                                <?php
                                        }
                                    }
                                }
                                
                                ?>
                            </table>
                        </div>
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