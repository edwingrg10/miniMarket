<?php
include('dbcon.php');
include('session.php');

$result = mysqli_query($con, "select * from usuario where idUsuario='$session_id'") or die('Error In Session');
$row = mysqli_fetch_array($result);
$query = "SELECT * FROM perfil";
$usuarios = mysqli_query($con, $query);
$numfilas = mysqli_num_rows($usuarios);
?>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>MiniMarket</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-motorcycle"></i>
        </div>
        <div class="sidebar-brand-text mx-2">MiniMarket<sup>App</sup></div>
      </a>

      <hr class="sidebar-divider my-0">

      <li class="nav-item active">
        <a class="nav-link" href="home.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Inicio</span></a>
      </li>

      <hr class="sidebar-divider">

      <div class="sidebar-heading">
        Principal
      </div>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Gestiones</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Parametrizaciones</h6>
            <a class="collapse-item" href="tipo_persona.php">Tipo Personas</a>
            <a class="collapse-item" href="tipo_repuesto.php">Tipo Repuestos</a>
            <a class="collapse-item" href="tipo_cita.php">Tipo Citas</a>
            <a class="collapse-item" href="persona.php">Personas</a>
            <a class="collapse-item" href="garantia_repuesto.php">Garantías</a>
            <a class="collapse-item" href="repuesto.php">Repuestos</a>
            <a class="collapse-item" href="proveedor.php">Proveedores</a>
            <a class="collapse-item" href="marca.php">Marcas</a>
            <a class="collapse-item" href="moto.php">Motos</a>
            <a class="collapse-item" href="color.php">Colores</a>
            <a class="collapse-item" href="municipio.php">Municipios</a>
            <a class="collapse-item" href="sucursal.php">Sucursales</a>
            <a class="collapse-item" href="institucion.php">Institución</a>
            <a class="collapse-item" href="level.php">Nivel Estudio</a>
            <a class="collapse-item" href="titulo.php">Titulo</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Motivimientos</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Administraciones</h6>
            <a class="collapse-item" href="cita.php">Administración de citas</a>
            <a class="collapse-item" href="venta.php">Administración de ventas</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilitiess" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Herramientas</span>
        </a>
        <div id="collapseUtilitiess" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Opciones</h6>
            <a class="collapse-item" href="perfil.php">Perfil</a>
            <a class="collapse-item" href="usuario.php">Usuario</a>
            <a class="collapse-item" href="#">Copia de seguridad</a>
            <a class="collapse-item" href="#">Restauración</a>
          </div>
        </div>
      </li>

      <hr class="sidebar-divider">

      <div class="sidebar-heading">
        Salidas
      </div>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagess" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Informes</span>
        </a>
        <div id="collapsePagess" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Opciones</h6>
            <a class="collapse-item" href="#">Citas por fecha</a>
            <a class="collapse-item" href="#">Citas por usuario</a>
            <a class="collapse-item" href="#">Citas pendientes</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Consultas</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Opciones</h6>
            <a class="collapse-item" href="#">Citas por fecha</a>
            <a class="collapse-item" href="#">Citas por usuario</a>
            <a class="collapse-item" href="#">Citas pendientes</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Ayuda</span></a>
      </li>
    </ul>

    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Topbar Navbar -->
          <?php
          for ($i = 0; $i < $numfilas; $i++) {
          ?>
            <?php
            $roww = mysqli_fetch_array($usuarios);
            if ($roww['idPerfil'] == $row['idPerfil']) {
              echo "Perfil ";
              echo $roww['descripcion'];
            }
            ?>
          <?php } ?>
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - User Information -->
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $row['descripcion']; ?></span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Perfil
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Configuración
                </a>
                <div class="dropdown-divider"></div>
                <a href="logout.php" class="dropdown-item">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Cerrar sesión
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <div class="form-wrapper">
            <center>
              <h3>Bienvenido a MiniMarket</h3>
            </center>
            <center>
              <h4><?php echo $row['descripcion']; ?> </h4>
            </center>


          </div>
        </div>
      </div>
    </div>
  </div>
</body>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

</html>