<?php
include("../Procesos/control_pedido.php");
$product = new pedido;
if (isset($_GET['id'])) {
  $id = $_GET['id'];
}
$lista = $product->buscar_tipo_est();
$error = "";
if (isset($_POST['enter'])) {
  $id = $_GET['id'];
  $est = $_POST['est'];
  $tipo_est = $_POST['tipo_est'];

  if ($est == 0) {
    $error = "Debe seleccionar un establecimiento";
  } else {
    header("Location: http://localhost/miniMarket/formularios/form_pedido.php?id=$id&est=$est");
  }
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
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <!-- Topbar Navbar -->
          <p>Bienvenido!</p>
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - User Information -->
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">

              <a class="nav-link dropdown-toggle" href=<?php echo "../vistas/vista_pedidos.php?id=$id"; ?> id="" role="button" aria-haspopup="true" aria-expanded="false">

                <h4><span class="mr-4 d-none d-lg-inline text-dark large" data-toggle="modal">Pedidos<i class="fas fa-history"></i></span></h4>
              </a>
              <!-- Dropdown - User Information -->

            </li>
            <li class="nav-item dropdown no-arrow">

              <a class="nav-link dropdown-toggle" href="../index.php" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                <h4><span class="mr-4 d-none d-lg-inline text-dark large" data-toggle="modal" data-target="#logoutModal">Salir <i class="fas fa-fw fa-power-off"></i></span></h4>
              </a>
              <!-- Dropdown - User Information -->

            </li>

          </ul>
        </nav>
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <!-- Topbar Navbar -->

          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - User Information -->
            <div class="topbar-divider d-none d-sm-block"></div>

          </ul>
        </nav>



        <!-- Begin Page Content -->
        <div class="container-fluid">
          <div class="form-wrapper">

            <h3>Bienvenido a MiniMarket</h3>


          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- FORMULARIO ESTABLECIMIENTO -->
  <br>
  <br>
  <div class="container">


    <div class="card-footer">

      <form class="p-5" action="" method="post">

        <input type="hidden" name="id" value=<?php echo $id ?>>



        <div class="form-group">
          <legend class="col-form-legend col-sm-1-4">Selecciona el tipo de establecimiento</legend>
        </div>

        <div class="form-group col-sm-4">

          <select class="form-control" name="tipo_est" id="tipo_est">
            <?php
            foreach ($lista as $dato) {  ?>
              <option value=<?php echo $dato['cod_tipo_est']; ?>><?php echo $dato['desc_tipo_est'];
                                                                } ?></option>
          </select>

        </div>

        <div class="form-group">
          <legend class="col-form-legend col-sm-1-4">Selecciona el establecimiento</legend>
        </div>

        <div class="form-group col-sm-4" id="select_est"></div>

        <div class="form-group col-md-4">

          <button type="submit" class="btn btn-primary " id="enter" name="enter">Entrar</button>

        </div>

        <span class="text-danger"><?php echo $error ?></span>



      </form>
    </div>

  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      recargar_lista();
      $('#tipo_est').change(function() {
        recargar_lista();

      })


    })
  </script>

  <script type="text/javascript">
    function recargar_lista() {
      $.ajax({
        type: "POST",
        url: "../Procesos/control_pedido.php",
        data: "establecimiento=" + $('#tipo_est').val(),
        success: function(r) {
          $('#select_est').html(r);
        }

      })


    }
  </script>
</body>




</html>