<?php

  require_once '../modelos/control_metodos.php';
  $inventarioMarca = new InventarioMarca();
  $inventarioMarca->eliminar($_REQUEST['cod_marca']);
  
  header('Location: ../admin/tipo_marca.php');


?>