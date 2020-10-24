<?php


  require_once '../modelos/get_set.php';
  require_once '../modelos/control_metodos.php';
  $marca = new Marca();

  $marca->setCod_marca($_REQUEST['cod_marca']);
  $marca->setNombre_marca($_REQUEST['nombre_marca']);
  $marca->setId_estado($_REQUEST['id_estado']);
  


  $inventarioMarca = new InventarioMarca();
  
  if ($marca->getCod_marca() == 0) {
    $inventarioMarca->agregar($marca);
  }
  else {
      $inventarioMarca->modificar($marca);
  }


header('Location: ../admin/tipo_marca.php');

