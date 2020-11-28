<?php

include("../Procesos/control_vendedor.php");


if(isset($_GET['id'])){
$id = $_GET['id'];

$mercado = new mercado;
$lista=$mercado->buscar_establecimiento($id);
$cod_est=$lista['codigo_est'];
$lista = $mercado->buscar_inventario($cod_est);
}


if(isset($_GET['codigo'])){
  $cod_producto=$_GET['codigo'];
  $cod_est=$_GET['cod_est'];
  $cantidad=$_GET['cantidad'];
  $id=$_GET['id'];
  $mercado->actualiza_inventario($cod_producto,$cod_est,$cantidad);
  $lista = $mercado->buscar_inventario($cod_est);
 

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
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
           
          <footer class="card-blockquote">Explora <cite title="Source title">nuevos productos!</cite></footer>
          <br>
          <a name="" id="" class="btn btn-primary" href=<?php echo "vendedor_productos.php?id=$id";?> role="button">Agregar productos</a>
        </blockquote>
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
                    <span class="text-danger"><?php if($dato['cantidad_disponible']<10){ echo "Tienes pocas cantidades";}  ?></span>


                    <div class="info-product-price">
                      <span class="item_price"><?php echo "$ " . number_format($dato['precio_ud'])." por ".$dato['unidad_medida'] ; ?></span>

                    </div>
                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                      <form action="" method="GET">
                        <fieldset>

                            <input type="number" min="0" name="cantidad" id="cantidad" style="width : 60px">
                       
                       



                          <!--<input type="number" min="0" name="cantidad" id="cantidad" style="width : 60px"-->
                          <input type="hidden" name="codigo" id="codigo" value=<?php echo $dato['cod_producto'] ?>>

                          

                          

                          <input type="hidden" name="cod_est" id="cod_est" value=<?php echo $cod_est ?>>
                          <input type="hidden" name="id" id="id" value=<?php echo $id ?>>
                     

                          
                          <a href="inventario.php?cod=codigo&cantidad=cantidad&cod_est=cod_est&id=id"> <button class="btn btn-success"  title="inventario" ><i class="fas fa-redo"> </i></button></a>
                          

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