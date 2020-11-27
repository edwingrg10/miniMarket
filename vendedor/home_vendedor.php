<?php

include("../Procesos/control_vendedor.php");
$id = $_GET['id'];
// $id = 24;
$mercado = new mercado;

$lista = $mercado->buscar_establecimiento($id);
$nombre_est = $lista['nombre_est'];
$lista = $mercado->buscar_usuario($id);
$primer_nombre = $lista['primer_nombre'];
$primer_apellido = $lista['primer_apellido'];

if (isset($_POST['inventario'])) {
  $id = $_POST['id'];
  header("Location: http://localhost/miniMarket/vendedor/inventario.php?id=$id");
}

if (isset($_POST['pedido'])) {
  $id = $_POST['id'];
  header("Location: http://localhost/miniMarket/vendedor/pedido_vendedor.php?id=$id");
}



?>


<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>MiniMarket</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- <div class="menu"></div> -->

    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <!-- Topbar Navbar -->
          <p>Perfil Vendedor</p>
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

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <div class="form-wrapper">
            <center>
              <h3>Bienvenido a MiniMarket</h3>
            </center>
            <center>
              <h4>Vendedor </h4>
            </center>


          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container p-5">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-8">
            <h3><?php echo "Hola " . $primer_nombre . " " . $primer_apellido; ?></h3>

          </div>

        </div>
        <div class="row">
          <div class="col-8">
            <h3><?php echo "Establecimiento: " . $nombre_est; ?></h3>

          </div>

        </div>
      </div>
      <div class="card-body">
        <h4 class="card-title">Gestiona tu establecimiento</h4>
        <p class="card-text">Aqui podrás administrar tu establecimiento actualizando las cantidades de tu inventario, ademas puedes gestionar los pedidos que te recibas de tus clientes.</p>
        <form action="" method="post">
          <div class="row">
            <div class="col-6">
              <button type="submit" name="inventario" class="btn btn-success btn-lg btn-block">Gestionar inventario </button>
            </div>
            <div class="col-6">
              <button type="submit" name="pedido" class="btn btn-info btn-lg btn-block">Gestionar pedidos</button>
            </div>
          </div>
          <input type="hidden" name="id" value=<?php echo $id; ?>>
        </form>
      </div>
      <div class="card-footer text-muted">
        <span class="text-primary">
          Recuerda mantener tu inventario al dia!..
        </span>
      </div>
    </div>

  </div>

</body>

<!-- Bootstrap core JavaScript-->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="../js/sb-admin-2.min.js"></script>

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



</html>