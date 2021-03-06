<?php
require_once('../Insertar/Insertar_Tipo_Establecimiento.php');

$error_cod = "";
$error_desc = "";
$frm_enviado = false;
$consultas = new consultas();
if (isset($_POST["guardar_tipo_est"])) {

    $codigo = $_POST["codigo_tipo_est"];
    $desc = $_POST["desc_tipo_est"];
    $estado = array();

    if (isset($_POST["estado_tipo_est"])) {
        $estado = 1;
    } else {
        $estado = 0;
    }
    $valido = 0;

    if (!$codigo == "") {
        $exist = $consultas->buscar($codigo);
        if (!$exist) {

            $valido = $valido + 1;
        } else {
            $error_cod = "El código ya existe";
        }
    } else {
        $error_cod = "Por favor ingrese un código";
    }

    if (!$desc == "") {

        $valido = $valido + 1;
    } else {
        $error_desc = "Por favor ingrese una descripción";
    }

    if ($valido == 2) {


        $mensaje = $consultas->insertar_tipo_establecimiento($codigo, $desc, $estado);
        header("location: http://localhost/miniMarket/admin/tipo_establecimiento.php");
    }
} ?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MiniMarket</title>

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Menu -->
        <div class="menu"></div>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Topbar Navbar -->
                    <p>Perfil Administrador</p>
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">

                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                <h4><span class="mr-4 d-none d-lg-inline text-dark large" data-toggle="modal" data-target="#logoutModal">Salir <i class="fas fa-fw fa-power-off"></i></span></h4>
                            </a>
                            <!-- Dropdown - User Information -->

                        </li>
                    </ul>
                </nav>

                <!-- Logout Modal-->
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Desea cerrar sesión ?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Seleccione "Salir" si quiere cerrar sesión.</div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                                <a class="btn btn-primary" href="../login.html">Salir</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="form-wrapper">
                        <div id="wrapper">
                            <div id="content-wrapper" class="d-flex flex-column">
                                <div id="content">
                                    <app-nav></app-nav>
                                    <div class="container-fluid">
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-lg-8">
                                                <div class="p-5">
                                                    <div class="text-left">
                                                        <h1 class="h4 text-gray-900 mb-4">Creando Tipo Establecimiento</h1>
                                                    </div>

                                                    <!--FORMULARIO -->

                                                    <form class="user" name="Insertar_Tipo_est" action="" method="post">


                                                        <div class="form-group row">
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <input type="number" class="form-control form-control-user" name="codigo_tipo_est" id="codigo_tipo_est" placeholder="Código" value="<?= (isset($codigo) && !$frm_enviado) ? $codigo : "" ?>">
                                                            </div>

                                                        </div>

                                                        <span class="text-danger"><?php echo $error_cod; ?></span>



                                                        <div class="form-group row">
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <input type="text" class="form-control form-control-user" name="desc_tipo_est" id="desc_tipo_est" placeholder="Descripción" value="<?= (isset($desc) && !$frm_enviado) ? $desc : "" ?>">
                                                            </div>
                                                        </div>

                                                        <span class="text-danger"><?php echo $error_desc; ?></span>



                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox">

                                                                <input type="checkbox" class="custom-control-input" id="estado_tipo_est" name="estado_tipo_est" checked>
                                                                <label class="custom-control-label" for="estado_tipo_est">Activo</label>
                                                            </div>
                                                        </div>
                                                        <a href="../admin/tipo_establecimiento.php" class="btn btn-secondary">
                                                            Cancelar
                                                        </a>


                                                        <input type="submit" value="Guardar" class="btn btn-primary sm" name="guardar_tipo_est">
                                                        <hr>



                                                    </form>

                                                    <hr>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Begin Page Content -->

                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; MiniMarket 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>

    <script>
        $(document).ready(function() {
            $('.menu').load('../admin/menu_component.php');
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.nav').load('../admin/nav_component.php');
        });
    </script>

</body>

</html>