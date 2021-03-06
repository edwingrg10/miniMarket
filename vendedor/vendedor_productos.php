<?php

include("../Procesos/control_vendedor.php");
$mercado = new mercado;
$id=$_GET['id'];
if (isset($_GET['cod'])){
  $cod_est=$_GET['est'];
  $cod_producto=$_GET['cod'];
  $cantidad=0;
  $id=$_GET['id'];
  $mercado->agregar_inventario($cod_est,$cod_producto,$cantidad);
  
}



$lista=$mercado->buscar_establecimiento($id);
$cod_est=$lista['codigo_est'];
$cod_tipo_pr=$lista['cod_tipo_est'];

$lista=$mercado->buscar_productos($cod_est,$cod_tipo_pr);






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

              <a class="nav-link dropdown-toggle" href=<?php echo "home_vendedor.php?id=$id"; ?> id="userDropdown" role="button" aria-haspopup="true" aria-expanded="false">

                <h4><span class="mr-4 d-none d-lg-inline text-dark large" data-toggle="modal">Inicio<i class="fas fa-fw fa-home"></i></span></h4>
              </a>
              <!-- Dropdown - User Information -->

            </li>
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
              <h4>Inventario </h4>
            </center>

          </div>

        </div>

      </div>

    </div>

   
  </div>

  <div class="card">
      <div class="card-body">
        <blockquote class="blockquote">
           
          
          <br>
          <a name="" id="" class="btn btn-primary" href=<?php echo "inventario.php?id=$id";?> role="button">Tu inventario</a>
        </blockquote>
      </div>
    </div>
 
  <div class="container-fluid p-5">
    <div class="agileinfo-ads-display col-md-12">
      <!-- codigo php aqui controlando filas y columnas -->

      <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Código</th>
                      <th>Descripción</th>
                      <th>Precio unitario</th>
                      <th>Unidad de medida</th>
                      <th>Acciones</th>

                    </tr>
                  </thead>

                  <!--Datos tomados de la base de datos-->
                  <tbody>

                    <?php
                    foreach ($lista as $dato) {
                    $cod=$dato["cod_producto"]
                    ?>
                  
                      <tr>
                        <td><?php echo $cod ?> </td>
                        <td><?php echo $dato["nombre_producto"] ?> </td>
                        <td><?php echo "$". number_format( $dato["precio_ud"] )?> </td>
                        <td><?php echo $dato["unidad_medida"] ?> </td>
                      
                      

                        <td>
                          
                          <button class="btn " title="Editar">Agregar <a class="fas fa-plus" href=<?php echo "vendedor_productos.php?est=$cod_est&cod=$cod&id=$id";?>></a></button>
                         
                         <!-- <button class="btn " title="Eliminar" data-toggle="modal" data-target="#myModal2"><a class="fa fa-trash-alt"></a></button></td> -->
                        </td>
                      </tr>

                    <?php } ?>




                  </tbody>
                </table>
              </div>
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