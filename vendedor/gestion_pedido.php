<?php
include("../Procesos/control_vendedor.php");



if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    $mercado = new mercado;
    $lista=$mercado->buscar_establecimiento($id);
    $cod_est=$lista['codigo_est'];
    $lista_pedidos = $mercado->buscar_pedidos($cod_est);
    }

 

?>


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
          <p>Perfil Vendedor</p>
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - User Information -->
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">

              <a class="nav-link dropdown-toggle" href=<?php echo "home_vendedor.php?id=$id"; ?> id="" role="button" aria-haspopup="true" aria-expanded="false">

                <h4><span class="mr-4 d-none d-lg-inline text-dark large" data-toggle="modal">Inicio<i class="fas fa-fw fa-home"></i></span></h4>
              </a>
              <!-- Dropdown - User Information -->

            </li>
          
          </ul>
        </nav>

        <div class="container-fluid">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Lista </h6>
              <div class="d-flex justify-content-end">
                
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Pedido</th>
                      <th>Fecha</th>
                      <th>Cliente</th>
                      <th>Direccion de envio</th>
                      <th>Valor total</th>
                      <th>Estado actual</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($lista_pedidos as $dato) {
                    ?>

                      <tr>
                        <td><?php echo $dato["cod_pedido"] ?> </td>
                        <td><?php echo $dato["fecha_pedido"] ?> </td>
                        <td><?php echo $dato["primer_nombre"]." ".$dato["primer_apellido"]." ".$dato["segundo_apellido"]  ?> </td>
                        <td><?php echo $dato["direccion"] ?> </td>
                        <td><?php echo "$ ". number_format($dato["valor_pedido"]) ?> </td>
                        <td><?php echo $dato["estado"] ?> </td>
                        <td>
                          <button class="btn " title="Editar"><a class="fas fa-pen" href="editar_pedido.php?cod_pedido=<?php echo $dato["cod_pedido"]."&id=".$id ?> "></a></button>
                          
                        </td>
                      </tr>

                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

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
        <span>Copyright &copy; Medik Farmacia Online</span>
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
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../js/demo/datatables-demo.js"></script>

  <script>
    $(document).ready(function() {
      $('.menu').load('../menu_component.php');
    });
  </script>

  <script>
    $(document).ready(function() {
      $('.nav').load('../nav_component.php');
    });
  </script>

</body>

</html>