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
                            <li class="breadcrumb-item active">Facturar</a></li>
                        </ol>

                    </div>

                    <div class="card border-info">
                        
                        <div class="card-header">
                            <ul class="nav nav-pills nav-justified mb-3">
                                <li class="nav-item">
                                    <a href="#home1" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                        <i class="fas fa-cube"></i> Facturar cita
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#profile1" data-toggle="tab" aria-expanded="false" class="nav-link">
                                        <i class="fas fa-cubes"></i> Consultar pagos paciente
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane show active" id="home1">

                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="">Cita numero</label>
                                            <input name="" class="form-control" readonly=""></input>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Procedimiento</label>
                                            <input name="" class="form-control" readonly=""></input>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Valor</label>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text bg-primary border-primary text-white">$</div>
                                                        <input type="number" class="form-control col-md-5" name="" readonly=""></input>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="">Fecha de pago</label>
                                            <input type="date" name="" class="form-control" required></input>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Forma de pago</label>
                                            <select class='form-control' name="" id="" required>
                                                <option>-</option>
                                                <option value="1">Efectivo</option>
                                                <option value="2">Tarjeta crédito</option>
                                                <option value="3">Tarjeta debito</option>
                                                <option value="4">Cheque</option>
                                                <option value="5">Bono</option>
                                                <option value="6">Cortesía</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="Obs">Observaciones</label>
                                            <textarea name="Obs" rows="2" cols="20" class="form-control" name="Obs" value="" ></textarea>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a role="button" class="btn btn-success" href=''>Facturar</a>
                                        </div>
                                    </div>

                                </div>

                                <div class="tab-pane" id="profile1">
                                    <table class="table table-hover table-sm">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Cita</th>
                                                <th>Procedimiento</th>
                                                <th>Fecha de cita</th>
                                                <th>Fecha de pago</th>
                                                <th>Valor</th>
                                                <th>Forma de pago</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>12</td>
                                                <td>1</td>
                                                <td>23/12/2019</td>
                                                <td>23/12/2019</td>
                                                <td>$45.00</td>
                                                <td>Efectivo</td>
                                            </tr>
                                            <tr>
                                                <td>12</td>
                                                <td>1</td>
                                                <td>23/12/2019</td>
                                                <td>23/12/2019</td>
                                                <td>$45.00</td>
                                                <td>Efectivo</td>
                                            </tr>
                                            <tr>
                                                <td>12</td>
                                                <td>1</td>
                                                <td>23/12/2019</td>
                                                <td>23/12/2019</td>
                                                <td>$45.00</td>
                                                <td>Efectivo</td>
                                            </tr>
                                            <tr>
                                                <td>12</td>
                                                <td>1</td>
                                                <td>23/12/2019</td>
                                                <td>23/12/2019</td>
                                                <td>$45.00</td>
                                                <td>Efectivo</td>
                                            </tr>
                                            <tr>
                                                <td>12</td>
                                                <td>1</td>
                                                <td>23/12/2019</td>
                                                <td>23/12/2019</td>
                                                <td>$45.00</td>
                                                <td>Efectivo</td>
                                            </tr>
                                            <tr>
                                                <td>12</td>
                                                <td>1</td>
                                                <td>23/12/2019</td>
                                                <td>23/12/2019</td>
                                                <td>$45.00</td>
                                                <td>Efectivo</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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