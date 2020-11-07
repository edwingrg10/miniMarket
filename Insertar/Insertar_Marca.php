<!--Conexión BD-->
<?php 
include '../conexion/conexion.php';

  //var_dump($conn);
    
  if(isset($_POST["guardar_marca"])){

    //Inserta datos en tabla "marca"
    $insertar_marca = "INSERT INTO marca (
      cod_marca,
      nombre_marca,
      id_estado
      ) VALUES (
      '".$_POST["codigo_marca"]."',
      '".$_POST["nombre_marca"]."',
      '".$_POST["estado_marca"]."'
    )";
    echo $insertar_marca;
    if (!$crear_marca = $conn -> query($insertar_marca)) {
      echo "Marca ingresada correctamente";
      echo $insertar_marca;
      header("Location: http://localhost/miniMarket/admin/tipo_marca.php"); 
  } else {
      echo "Error: " . $insertar_marca . "<br>" . $conn->error;
      header("Location:http://localhost/miniMarket/admin/tipo_marca.php");
  }
   

    $conn->close();
  }
?>