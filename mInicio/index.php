<?php 
    $fecha=date("Y-m-d");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beta 4</title>
    <!-- boostrap 4 -->
    <link rel="stylesheet" href="../plugins/bootstrap-4.0.0/dist/css/bootstrap.min.css">
    <!-- Estilo propio -->
    <link rel="stylesheet" href="../css/estilos.css">
    <!-- Animated -->
    <link rel="stylesheet" href="../plugins/animate/animate.css">
    <!-- Fontawesome 5 -->
    <link rel="stylesheet" href="../plugins/fontawesome-free-5.8.1-web/css/all.min.css">
    <!-- Alertify -->
    <link rel="stylesheet" href="../plugins/alertifyjs/css/alertify.min.css">
    <link rel="stylesheet" href="../plugins/alertifyjs/css/themes/bootstrap.min.css">
    <!-- Select 2 -->
    <link rel="stylesheet" href="../plugins/select2-master/dist/css/select2.min.css">
    <link rel="stylesheet" href="../plugins/select2-master/dist/css/select2-bootstrap4.min.css">
    <!-- DataTable -->
    <link rel="stylesheet" href="../plugins/dataTablesB4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/dataTablesB4/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/dataTablesB4/css/responsive.dataTables.min.css">
    <!-- Bootstrap Switch Button -->
    <link rel="stylesheet" href="../plugins/bootstrap4-toggle-master/css/bootstrap4-toggle.min.css">
</head>
<body>
    <div class="jumbotron jumbotron-fluid myJT animated flipInX">
        <div class="container">
            <h1 class="display-4"><i class="far fa-user-circle"></i>Datos Personales</h1>
            <p class="lead" id="titular">Formulario de Datos</p>
        </div>
    </div>

    <div class="container">
        
        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
            <li class="active">
                <a class="nav-link active" id="entradas-tab" data-toggle="tab" href="#entradas" role="tab" aria-controls="entradas" aria-selected="true">Registro de Entradas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="datos-tab" data-toggle="tab" href="#datos" role="tab" aria-controls="datos" aria-selected="false">Datos Personales</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="estadoCivil-tab" data-toggle="tab" href="#estadoCivil" role="tab" aria-controls="estadoCivil" aria-selected="false">Estado Civil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="usuarios-tab" data-toggle="tab" href="#usuarios" role="tab" aria-controls="usuarios" aria-selected="false">Usuarios</a>
            </li>
        </ul>

        <div class="tab-content">
        <!-- Tap para registro de entradas -->
            <div class="tab-pane fade show active animated  zoomIn" id="entradas" role="tabpanel" aria-labelledby="entradas-tab" >

            </div>
            <!-- Tap para datos personales -->
            <div class="tab-pane fade animated  zoomIn" id="datos" role="tabpanel" aria-labelledby="datos-tab">
                <section id="guardar" style="display:none;">
                    <form id="frmGuardar">
                        <div class="row">
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-2">
                                <div class="form-group">
                                    <label for="clave">clave:</label>
                                    <input type="number" class="form-control " id="clave"  maxlength="3" autofocus required >
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-4">
                                <div class="form-group">
                                    <label for="nombre">Nombre:</label>
                                    <input type="text" class="form-control " id="nombre" autofocus required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                <div class="form-group">
                                    <label for="apPaterno">Apellido Paterno:</label>
                                    <input type="text" class="form-control activo" id="apPaterno" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                <div class="form-group">
                                    <label for="apMaterno">Apellido Materno:</label>
                                    <input type="text" class="form-control activo" id="apMaterno" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                <div class="form-group">
                                    <label for="fNac">Nacimiento:</label>
                                    <input type="date" class="form-control activo" id="fNac" required value="<?php echo $fecha ?>">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">
                                <div class="form-group">
                                    <label for="edad">Edad:</label>
                                    <input type="text" class="form-control activo" id="edad" readonly value=0>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                <div class="form-group">
                                    <label for="correo">Correo:</label>
                                    <input type="text" class="form-control activo" id="correo" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="curp">Curp:</label>
                                    <input type="text" class="form-control activo" id="curp" required  maxlength="18">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                <div class="form-group">
                                    <label for="domicilio">Domicilio:</label>
                                    <input type="text" class="form-control activo" id="domicilio" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                <div class="form-group">
                                    <label for="sexo">Sexo:</label>
                                    <select id="sexo" class="select2" style="width: 100%" >
                                        <option value="M">Masculino</option>
                                        <option value="F">Femenino</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                <div class="form-group">
                                    <label for="ecivil">Estado Civil:</label>
                                    <select id="ecivil" class="select2" style="width: 100%" >

                                    </select>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col text-left">
                                        <button  type="button" class="btn btn-outline-danger  activo " id="btnCancelarG">
                                            <i class='fa fa-ban fa-lg'></i>
                                            Cancelar
                                        </button>
                                    </div>

                                    <div class="col text-right">
                                        <button  type="submit" class="btn btn-outline-primary  activo " id="btnGuardar">
                                            <i class='fa fa-save fa-lg'></i>
                                            Guardar Información
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </section>
                <section id="Listado1" class="animated fadeIn contenedor"></section>
            </div>
            <!-- Tap para datos de estado civil -->
            <div class="tab-pane fade animated  zoomIn" id="estadoCivil" role="tabpanel" aria-labelledby="estadoCivil-tab">
            <section id="guardar2" style="display:none;">
                    <form id="frmGuardar2">
                        <div class="row">
                            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-4">
                                <div class="form-group">
                                    <label for="descripcion">Estado Civil:</label>
                                    <input type="text" class="form-control " id="descripcion" autofocus required>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col text-left">
                                        <button  type="button" class="btn btn-outline-danger  activo " id="btnCancelar2">
                                            <i class='fa fa-ban fa-lg'></i>
                                            Cancelar
                                        </button>
                                    </div>

                                    <div class="col text-right">
                                        <button  type="submit" class="btn btn-outline-primary  activo " id="btnGuardar2">
                                            <i class='fa fa-save fa-lg'></i>
                                            Guardar Información
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </section>
                <section id="Listado2" class="animated fadeIn contenedor"></section>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="../plugins/jQuery/jquery-3.3.1.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap-4.0.0/dist/js/bootstrap.js"></script>
    <!-- Alertifyjs -->
    <script src="../plugins/alertifyjs/alertify.min.js"></script>
    <!-- Funciones Propias -->
    <script src="../mDatosPersonales/funciones.js"></script>
    <!-- select 2 -->
    <script type="text/javascript" src="../plugins/select2-master/dist/js/select2.full.min.js"></script>
    <!-- Datatables -->
    <script src="../plugins/dataTablesB4/js/jquery.dataTables.min.js"></script>
    <script src="../plugins/dataTablesB4/js/dataTables.bootstrap4.min.js"></script>
    <!-- DataTablesButtons -->
    <script type="text/javascript" src="../plugins/dataTableButtons/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="../plugins/dataTableButtons/buttons.flash.min.js"></script>
    <script type="text/javascript" src="../plugins/dataTableButtons/buttons.colVis.min.js"></script>
    <script type="text/javascript" src="../plugins/dataTableButtons/jszip.min.js"></script>
    <script type="text/javascript" src="../plugins/dataTableButtons/pdfmake.min.js"></script>
    <script type="text/javascript" src="../plugins/dataTableButtons/vfs_fonts.js"></script>
    <script type="text/javascript" src="../plugins/dataTableButtons/buttons.html5.min.js"></script>
    <script type="text/javascript" src="../plugins/dataTableButtons/buttons.print.min.js"></script>
    <!-- Bootstrap switch Button -->
    <script type="text/javascript" src="../plugins/bootstrap4-toggle-master/js/bootstrap4-toggle.min.js"></script>
    <script>
        selectTwo();
        llenar_lista();
        llenar_lista2();
        inputs();
        combo_ecivil();
    </script>
</body>
</html>