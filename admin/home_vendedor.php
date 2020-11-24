<?php

include("../Procesos/control_vendedor.php");

$mercado = new mercado;
$lista = $mercado->buscar_productos();

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
  <div class="container-fluid p-5">
    <div class="agileinfo-ads-display col-md-12">
      <!-- codigo php aqui controlando filas y columnas -->

      <?php

      $i = 0;
      while ($i <= (count($lista) - 1)) {
      ?>


        <!-- INICIO DE SECCION TABLA -->
       

          <!-- primera fila -->
          <div class="row">

            <?php

            for ($j = 1; $j <= 4; $j++) {

              if ($i <= count($lista) - 1) {
                $dato = $lista[$i];
                $img = $dato['img'];

            ?>

                <!-- columnas -->

                <div class="col-md-3 product-men">
                  <div class="men-pro-item simpleCart_shelfItem">
                    <div class="men-thumb-item">
                      <img src=<?php echo "../images/" . $img; ?> alt="">

                    </div>
                    <div class="item-info-product ">
                      <h4>
                        <?php echo $dato['nombre_producto']; ?>
                      </h4>
                      <h4>

                        <?php echo "Disponible " . $dato['cantidad_disponible']; ?>
                      </h4>



                      <div class="info-product-price">
                        <span class="item_price"><?php echo "$ " . number_format($dato['precio_ud']); ?></span>

                      </div>
                      <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                        <form action="" method="GET">
                          <fieldset>

                            <?php if ($dato['cantidad_disponible'] > 0) {
                              $agotado = False; ?>
                              <input type="number" min="0" name="cantidad" id="cantidad" style="width : 60px">
                            <?php } else {
                              $agotado = True; ?>

                              <div class="l">
                                <!-- <strong>Agotado</strong> -->
                                <span class="text-danger">Agotado</span>
                              </div>
                            <?php } ?>



                            <!--<input type="number" min="0" name="cantidad" id="cantidad" style="width : 60px"-->
                            <input type="hidden" name="codigo" id="codigo" value=<?php echo $dato['cod_producto'] ?>>

                            <input type="hidden" name="precio" id="precio" value=<?php echo $dato['precio_ud'] ?>>

                            <input type="hidden" name="nombre" id="nombre" value=<?php echo $dato['nombre_producto'] ?>>

                            <input type="hidden" name="disponible" id="disponible" value=<?php echo $dato['cantidad_disponible'] ?>>

                            <?php if ($agotado == False) {
                              echo '<a href="form_pedido.php?cod=codigo&cantidad=cantidad&precio=precio&disponible=disponible&nombre=nombre"> <button class="btn btn-primary"  title="Carrito" ><i class="fa fa-shopping-cart"> </i></button></a>';
                            } ?>

                          </fieldset>
                        </form>
                      </div>

                    </div>
                  </div>
                </div>

            <?php
                $i = $i + 1;
              }
            } ?>
            <div class="clearfix"></div>
          </div>

          <!-- FIN DE LA TABLA -->
        
        <!-- FIN DE SECCION TABLA -->
      <?php } ?>




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