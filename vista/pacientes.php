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
                            <li class="breadcrumb-item active">Pacientes</a></li>
                        </ol>


                        <div class="btn-toolbar mb-2 mb-md-0">
                            <div class="btn-group mr-2">
                                <input type="text" class="btn btn-sm btn-outline-info" name="Buscar" id="Buscar">
                                <button type="submit" class="btn btn-sm btn-outline-info">Buscar</button>
                            </div>

                            <a class="btn btn-sm btn-warning" href="inicio.php?pag=pacientes1">
                                <i class="fas fa-user-plus"></i> Nuevo usuario
                            </a>

                        </div>
                    </div>

                    <?php
                    extract ($_POST); 
                    require"../modelo/conexion_bd.php";
                    require"../modelo/paciente.php";

                    if (!isset($_POST['Buscar'])) {
                        $Paciente = new Paciente();
                        $datos = $Paciente->consultarPacientes($_POST['Buscar']);
                        if (isset($datos))  
                            {if($datos->num_rows >0 ){
                                ?>

                    <?php
                    if($msj==1)
                      echo'<div class="alert alert-success text-center"> La información del paciente fue eliminada con éxito </div>';
                    if($msj==2)
                      echo'<div class="alert alert-danger text-center"> Error al borrar el registro</div>';
                    ?>

                    <div class="card bg-light">
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Edad</th>
                                        <th>Telefono</th>
                                        <th>Celular</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                
                                <?php
                                while($registro=$datos->fetch_object())
                                    {
                                        ?>

                                <tbody>
                                    <tr>
                                        <th><?php echo $registro->Nro_Doc?></th>
                                        <td><?php echo $registro->Nom_Pac?></td>
                                        <td><?php echo $registro->Ape_Pac?></td>
                                        <td><?php echo $registro->Edad?></td>
                                        <td><?php echo $registro->Tel_Pac?></td>
                                        <td><?php echo $registro->Cel_Pac?></td>
                                        <td><a class="btn btn-info" href="inicio.php?pag=pacientes2&id=<?php echo $registro->Id_Pac?>">Modificar</a> <a class="btn btn-danger" href="inicio.php?pag=pacientes3&id=<?php echo $registro->Id_Pac?>">Eliminar</a></td>
                                    </tr>
                                     <?php
                                     }
                                     ?>
                                    
                                </tbody>
                            </table>

                            <?php
                                        }else{  echo '<div class="alert alert-danger text-center">No hay pacientes creados en la base de datos</div>';}
                                    }
                                }
                                else {
                                    $Paciente = new Paciente();
                                    $datos = $Paciente->consultarPaciente($_POST['Buscar']);
                                    if (isset($datos)) {
                                        if($datos->num_rows >0 ){
                                            ?>

                    

                    <div class="card bg-light">
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Edad</th>
                                        <th>Telefono</th>
                                        <th>Celular</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                
                                <?php
                               $registro=$datos->fetch_object()?>

                                <tbody>
                                    <tr>
                                        <th><?php echo $registro->Nro_Doc?></th>
                                        <td><?php echo $registro->Nom_Pac?></td>
                                        <td><?php echo $registro->Ape_Pac?></td>
                                        <td><?php echo $registro->Edad?></td>
                                        <td><?php echo $registro->Tel_Pac?></td>
                                        <td><?php echo $registro->Cel_Pac?></td>
                                        <td><a class="btn btn-info" href="inicio.php?pag=pacientes2&id=<?php echo $registro->Id_Pac?>">Modificar</a> <a class="btn btn-danger" href="inicio.php?pag=pacientes3&id=<?php echo $registro->Id_Pac?>">Eliminar</a></td>
                                    </tr>
                                     <?php
                                     }
                                     ?>
                                    
                                </tbody>
                            </table>

                            <?php
                                        }else{  echo '<div class="alert alert-danger text-center">No hay pacientes creados en la base de datos</div>';}
                                    }
                                ?>
                            

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