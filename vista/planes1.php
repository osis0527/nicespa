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
                            <li class="breadcrumb-item"><a href="inicio.php?pag=planes">Planes</a></li>
                            <li class="breadcrumb-item active">Contenido de plan</a></li>
                        </ol>

                        <div class="btn-group mr-2">
                            <button class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#contenido">Agregar procedimiento</button>
                          </div>
                    </div>

                    <div class="card border-info">

                        <div class="card-body">
                            <table class="table table-hover table-sm">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Procedimiento</th>
                                        <th>Valor</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody class="">
                                    <tr>
                                        <td>Procedimiento 1</td>
                                        <td>$45.000</td>
                                        <td><button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#contenido2">Eliminar</button></td>
                                    </tr>
                                    <tr>
                                        <td>Procedimiento 2</td>
                                        <td>$5.000</td>
                                        <td><button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#contenido2">Eliminar</button></td>
                                    </tr>
                                    <tr>
                                        <td>Procedimiento 6</td>
                                        <td>$50.000</td>
                                        <td><button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#contenido2">Eliminar</button></td>
                                    </tr>
                                    <tr>
                                        <td>Procedimiento 3</td>
                                        <td>$34.900</td>
                                        <td><button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#contenido2">Eliminar</button></td>
                                    </tr>
                                    <tr>
                                        <td>Procedimiento 7</td>
                                        <td>$23.000</td>
                                        <td><button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#contenido2">Eliminar</button></td>
                                    </tr>
                                    <tr>
                                        <td>Procedimiento 4</td>
                                        <td>$45.000</td>
                                        <td><button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#contenido2">Eliminar</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <br>

                    <div class="modal fade" id="contenido" tabindex="-1" role="dialog" aria-labelledby="contenido" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Ingresar nuevo procedimiento al plan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="">Procedimiento</label>
                                            <select class='form-control' name="" id="" required>
                                                <option>-</option>
                                                <option value="">1</option>
                                                <option value="">2</option>
                                                <option value="">3</option>
                                                <option value="">4</option>
                                                <option value="">5</option>
                                                <option value="">6</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="">Descripción</label>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text bg-primary border-primary text-white">$</div>
                                                    </div>
                                                    <input type="number" class="form-control col-md-4" id="Valor" name="Valor" required></input>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-success">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="contenido2" tabindex="-1" role="dialog" aria-labelledby="contenido2" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Eliminar Plan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="">Descripción</label>
                                            <input name="" class="form-control"placeholder=""></input>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="">Tipo de Plan</label>
                                            <select class='form-control' name="" id="" required>
                                                <option>-</option>
                                                <option value="">1</option>
                                                <option value="">2</option>
                                                <option value="">3</option>
                                                <option value="">4</option>
                                                <option value="">5</option>
                                                <option value="">6</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="">Sesiones</label>
                                            <input type="number" class="form-control col-md-2" placeholder=""></input>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-danger">Eliminar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="tipo" tabindex="-1" role="dialog" aria-labelledby="tipo" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Nuevo tipo de plan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="">Descripción</label>
                                            <input name="" class="form-control" name="" placeholder=""></input>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-success">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="tipo1" tabindex="-1" role="dialog" aria-labelledby="tipo1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Modificar tipo de plan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="">Descripción</label>
                                            <input name="" class="form-control" name="" placeholder=""></input>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-info">Modificar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="tipo2" tabindex="-1" role="dialog" aria-labelledby="tipo2" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Eliminar tipo de plan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="">Descripción</label>
                                            <input name="" class="form-control" name="" placeholder=""></input>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-danger">Eliminar</button>
                                </div>
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