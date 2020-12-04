<?php
include("../Procesos/control_vendedor.php");
$id = $_GET['id'];

$mercado = new mercado;
$lista = $mercado->buscar_tipos();

if(isset($_POST['crear'])){
  $nombre=$_POST['nombre'];
  $tipo_est=$_POST['tipo_est'];
  $mercado->crear_est($nombre,$tipo_est,$id,1);
 
  header("Location: http://localhost/miniMarket/vendedor/home_vendedor.php?id=$id");
  


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

          </ul>
        </nav>



        <!-- Begin Page Content -->
        <div class="container-fluid">
          <div class="form-wrapper">

            <h3>Bienvenido a MiniMarket</h3>
            <h4>Crea tu establecimiento para terminar el registro! </h4>

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
        <div class="form-group">
          <legend class="col-form-legend col-sm-1-4">Ingresa un nombre para tu establecimiento</legend>
        </div>

        <div class="form-group col-sm-4">
          <input type="text" class="form-control" name="nombre" id="nombre" placeholder="">
        </div>


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


        <div class="form-group col-md-4">
          <button type="submit" class="btn btn-primary " name="crear">Crear</button>
        </div>

      

      </form>
    </div>

  </div>

</body>




</html>