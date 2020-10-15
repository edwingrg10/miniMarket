<!--Conexión BD-->
<?php 
  include '../conexion.php';


  class consultas{

    public function insertar_tipo_producto($codigo,$descripcion,$estado){

      $modelo=new Db();
      $conexion=$modelo->conectar();
      $sentencia =  "INSERT INTO tipo_producto (
        cod_tipo_producto,
        desc_tipo_producto,
        estado
        ) VALUES (:cod_tipo_producto,:desc_tipo_producto,:estado)";
      $resultado=$conexion->prepare($sentencia);
      $resultado->bindParam(':cod_tipo_producto',$codigo);
      $resultado->bindParam(':desc_tipo_producto',$descripcion);
      $resultado->bindParam(':estado',$estado);
      
      if (!$resultado){
        return "error al crear el registro";
      }
      else{
        $resultado->execute();
        return "registro exitoso!!";
      }

    }

    public function borrar_tipo_producto($codigo){

      //funcion para borar los tipos de productos
    }

    public function consultar_tipo_producto($codigo){

      //funcion para buscar los tipos de productos
    }


  }

  //formulario principal tipo de producto  
  if(isset($_POST["guardar_tipo_producto"])){

    //Inserta datos en tabla tipo_producto
    $codigo=$_POST["codigo_tipo_producto"];
    $desc=$_POST["desc_tipo_producto"];
    $estado=$_POST["estado_tipo_producto"];
    $mensaje=null;
    
    $consultas=new consultas();
    $mensaje=$consultas->insertar_tipo_producto($codigo,$desc,$estado);
    echo "<a href='../tipo_producto.html'> Nuevo tipo de producto </a>";
    echo $mensaje;
      
  }
    
?>