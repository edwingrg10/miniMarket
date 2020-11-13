
<!DOCTYPE html>
<html lang="es">

<?php 
require_once ( '../Insertar/Insertar_producto.php');
$consultas=new consultas();
if(isset($_GET['cod_producto'])){
    $codigo=$_GET['cod_producto'];
    $info=$consultas->buscar($codigo);
    
}

$error_codigo = "";
$error_nombre = "";
$error_tipo = "";
$error_precio = "";
$error_cantidad = "";
$frm_enviado=false;
if(isset($_POST["actualizar_producto"])){
        
    $codigo = $_POST["cod_producto"];
    $nombre = $_POST["nombre_producto"];
    $tipo = $_POST["cod_tipo_producto"];
    $precio = $_POST["precio"];
    $cantidad = $_POST["cantidad_disponible"];
    $estado=array();
    
    if (isset($_POST["estado_producto"])){
        $estado=1;
    }else{
        $estado=0;
    }
    $valido=0;  


    if (!$nombre==""){

        $valido=$valido+1;

    }else{
        $error_nombre="Por favor ingrese un nombre";
    
    }
    if($valido==1){
              
        $mensaje=$consultas->actualizar_producto($codigo,$nombre,$tipo,$precio,$cantidad,$estado);
        header ("location: http://localhost:8000/miniMarket/admin/tabla_producto.php");      
        
 
    }


}


?>

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
                                                        <h1 class="h4 text-gray-900 mb-4">Editar Producto</h1>
                                                    </div>

                                                    <!--FORMULARIO -->        

                                                    <form class="user" name="Insertar_Tipo_producto" action="" method="post">
                                                        <div class="form-group row">
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <input type="text" class="form-control form-control-user" value="<?php echo $info['cod_producto']; ?>" name="cod_producto" id="cod_producto"
                                                                value="<?= (isset($codigo) && !$frm_enviado)?$codigo : "" ?>" readonly="disabled" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <input type="text" class="form-control form-control-user" value="<?php echo $info['nombre_producto']; ?>" name="nombre_producto" id="nombre_producto" placeholder="Nombre producto"
                                                                value="<?= (isset($nombre) && !$frm_enviado)?$nombre : "" ?>">
                                                            </div>
                                                        </div>
                                                        <span class="text-danger"><?php echo $error_nombre; ?></span>
                                                        <div class="form-group row">
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <input type="text" class="form-control form-control-user" value="<?php echo $info['cod_tipo_producto']; ?>" name="cod_tipo_producto" id="cod_tipo_producto" placeholder="Tipo producto"
                                                                value="<?= (isset($nombre) && !$frm_enviado)?$nombre : "" ?>">
                                                            </div>
                                                        </div>
                                                        <span class="text-danger"><?php echo $error_nombre; ?></span>
                                                        <div class="form-group row">
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <input type="text" class="form-control form-control-user" value="<?php echo $info['precio_ud']; ?>" name="precio" id="Precio" placeholder="Precio"
                                                                value="<?= (isset($nombre) && !$frm_enviado)?$nombre : "" ?>">
                                                            </div>
                                                        </div>
                                                        <span class="text-danger"><?php echo $error_nombre; ?></span>
                                                        <div class="form-group row">
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <input type="text" class="form-control form-control-user" value="<?php echo $info['cantidad_disponible']; ?>" name="cantidad_disponible" id="cantidad_disponible" placeholder="Nombre producto"
                                                                value="<?= (isset($nombre) && !$frm_enviado)?$nombre : "" ?>">
                                                            </div>
                                                        </div>
                                                        <span class="text-danger"><?php echo $error_nombre; ?></span>
                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox">
                                                              
                                                                <input type="checkbox" class="custom-control-input" id="estado_producto" name="estado_producto" checked >
                                                                <label class="custom-control-label" for="estado_producto">Activo</label>
                                                            </div>
                                                        </div>
                                                        <a href="../tipo_producto.php" class="btn btn-secondary">
                                                            Cancelar
                                                        </a>

                                                   
                                                        <input type="submit" value="Guardar" class="btn btn-primary sm" name="actualizar_producto">
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
