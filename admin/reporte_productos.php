<!DOCTYPE html>
<html lang="en">
<?php include("../conexion/conexion.php");

$modelo = new Db();
$conexion = $modelo->conectar();
$sentencia =  "SELECT * FROM productos ";
$resultado = $conexion->prepare($sentencia);
$resultado->execute();
$lista = $resultado->fetchAll(PDO::FETCH_ASSOC);


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
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Productos</h6>
              <div class="d-flex justify-content-end">
                <a class="btn btn-primary" href="reports_pdf/producto_pdf.php" target="_blank" role="button"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-down-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                    <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5A.5.5 0 0 1 8 4z" />
                  </svg>Exportar PDF</a>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Código</th>
                      <th>Descripción</th>
                      <th>Precio</th>
                      <th>Cantidad Disponible</th>
                      <th>Estado</th>
                    </tr>
                  </thead>

                  <!--Datos tomados de la base de datos-->
                  <tbody>

                    <?php
                    foreach ($lista as $dato) {
                    ?>

                      <tr>
                        <td><?php echo $dato["cod_producto"] ?> </td>
                        <td><?php echo $dato["nombre_producto"] ?> </td>
                        <td>$ <?php echo $dato["precio_ud"] ?> </td>
                        <td><?php echo $dato["cantidad_disponible"] ?> </td>
                        <td><?php echo $dato["estado"] ?> </td>
                      </tr>

                    <?php } ?>




                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>


      </div>

      <div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body modal-body-sub_agile">
              <div class="main-mailposi">
                <span class="fa fa-envelope-o" aria-hidden="true"></span>
              </div>
              <div class="modal_body_left modal_body_left1">

                <p>
                  <h4 class="agileinfo_sign">¿Seguro que desea eliminar el registro? </h4>
                </p>
                <form action="../Insertar/Insertar_Tipo_Establecimiento.php?accion=2 & cod_tipo_est=<?php echo $dato['cod_tipo_est'] ?>" method="post">
                  <input class="btn btn-primary" type="submit" value="Si">
                  <input class="btn btn-primary" type="submit" value="No" data-dismiss="modal">
                </form>

              </div>
            </div>
          </div>
          <!-- //Modal content-->
        </div>
      </div>
      <!-- Begin Page Content -->

      <!-- /.container-fluid -->

    </div>
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

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/jquery.dataTables.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../js/demo/datatables-demo.js"></script>

  <script>
    $(document).ready(function() {
      $('.menu').load('menu_component.php');
    });
  </script>

  <script>
    $(document).ready(function() {
      $('.nav').load('nav_component.php');
    });
  </script>

</body>

</html>