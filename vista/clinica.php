<?php
extract ($_REQUEST); 
require"../modelo/conexion_bd.php";
require"../modelo/citas.php";
require"../modelo/hclinica.php";

if (isset($_REQUEST['id'])) {
    $cita= new citas();
    $datos=$cita->consultarCita($_REQUEST['id']);

    $clinica= new clinica();
    $folio=$clinica->consultarFolio($_REQUEST['id']);
    $sesion=$cita->consultarSesion($_REQUEST['id'],$_REQUEST['ses']);

    if (isset($datos)) {
        if($datos->num_rows >0 ){
            $registro=$datos->fetch_object();
            
            $conteo=$folio->fetch_assoc();
            $conteof=$conteo['CONTEO']+1;

            $sesiones=$folio->fetch_assoc();
            $cuentas=$sesiones['CONTEO']+1;

?>

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
                            <li class="mt-4"><strong>Información de paciente</strong></li>
                            <li class="nav-item mt-2 text-white">Nombres: <strong><?php echo $registro->Nom_Pac?></strong></li>
                            <li class="nav-item mt-2 text-white">Apellido: <strong><?php echo $registro->Ape_Pac?></strong></li>
                            <li class="nav-item mt-0 text-white">Documento: <strong><?php echo $registro->Documento?></strong></li>
                            <li class="nav-item mt-0 text-white">Edad: <strong><?php echo $registro->Edad?> años</strong></li>
                            <li class="nav-item mt-0 text-white">Sexo: <strong><?php echo $registro->Sex_Pac?></strong></li>
                            <li class="nav-item mt-0 text-white">Teléfono: <strong><?php echo $registro->Tel_Pac?></strong></li>
                            <li class="nav-item mt-0 text-white">E-mail: <strong><?php echo $registro->Mai_Pac?></strong></li>
                        </ul>

                        <br>
                        <br>

                        <ul class="nav flex-column mb-2n">
                            <li class="mt-4"><strong>Información de cita</strong></li>
                            <li class="nav-item mt-2 text-white">Fecha: <strong><?php echo $registro->Fec_Cit?></strong></li>
                            <li class="nav-item mt-0 text-white">Hora: <strong><?php echo $registro->Hor_Cit?></strong></li>
                            <li class="nav-item mt-0 text-white">Folio: <strong><?php echo $conteof?></strong></li>
                            <br>
                            <li class="nav-item mt-0 text-white">Tratamiento: <strong><?php echo $registro->Nom_Pla?></strong></li>
                            <li class="nav-item mt-0 text-white">Procedimiento: <strong><?php echo $registro->Nom_Pro?></strong></li>
                            <br>
                            <li class="nav-item mt-0 text-white">Sesión <strong><?php echo $cuentas?></strong> de <strong><?php echo $registro->Cnt_Ses?></strong></li>
                        </ul>

                        <br>
                        <br>
                    </div>
                </nav>

                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="inicio.php">Inicio</a></li>
                            <li class="breadcrumb-item active">Atender cita</a></li>
                        </ol>
                    </div>

                    <div class="card mb-3 border-info">
                        <form action= "../controlador/insertar_hclinica.php" method= "POST">
                            <input name="Id_Pac" type="hidden" value="<?php echo $_REQUEST['id']?>"/>
                            <input name="Folio" type="hidden" value="<?php echo $conteof?>"/>
                            <input name="Cita" type="hidden" value="<?php echo $registro->Num_Cit?>"/>

                            <div class="card-header text-white bg-info text-white bg-info">
                                DESCRIPCIÓN ATENCIÓN
                            </div>
                            <div class="card-body">
                                <div>
                                    <label for="Aten_cita">Descripción de Atención</label>
                                    <textarea name="Aten_cita" rows="3" class="form-control" id="Aten_cita"></textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="Peso">Peso</label>
                                        <input type="number" class="form-control" name="Peso" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="Altura">Altura</label>
                                        <input type="number" class="form-control" name="Altura" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="IMC">IMC</label>
                                        <input type="number" class="form-control" name="IMC" required>
                                    </div>
                                </div>

                                <div>
                                    <label for="Ante_Per">Antecedentes Personales</label>
                                    <textarea name="Ante_Per" rows="3" class="form-control" id="Ante_Per"></textarea>
                                
                                    <label for="Ante_Fam">Antecedentes Familiares</label>
                                    <textarea name="Ante_Fam" rows="3" class="form-control" id="Ante_Fam"></textarea>
                                
                                    <label for="Obse_Cita">Observaciones de cita</label>
                                    <textarea name="Obse_Cita" rows="3" class="form-control" id="Obse_Cita"></textarea>
                                </div>
                            </div>

                            <div class="card-footer text-white bg-active text-right">
                                <button type="submit" class="btn btn-sm btn-success">
                                    <i class="fas fa-save"></i> Guardar
                                </button>
                                <a href="inicio.php" class="btn btn-sm btn-danger">
                                    <i class="fas fa-window-close"></i> Cancelar
                                </a>
                            </div>
                        </form>
                    </div>
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