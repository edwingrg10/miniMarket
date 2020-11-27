<!--Conexión BD-->
<?php 
  
  
  include ("../conexion/conexion.php");
 
  class consultas{

    public function insertar_producto($codigo,$nombre,$tipo,$precio,$cantidad,$estado,$imagen){
      
      $modelo=new Db();
      $conexion=$modelo->conectar();
      $sentencia =  "INSERT INTO productos (
        cod_producto,
        nombre_producto,
        cod_tipo_producto,
        precio_ud,
        cantidad_disponible,
        estado,
        img
        ) VALUES (:codigo,:nombre_producto,:cod_tipo_producto,:precio,:cantidad_disponible,:estado_producto,:imagen)";
      $resultado=$conexion->prepare($sentencia);
      $resultado->bindParam(':codigo',$codigo);
      $resultado->bindParam(':nombre_producto',$nombre);
      $resultado->bindParam(':cod_tipo_producto',$tipo);
      $resultado->bindParam(':precio',$precio);
      $resultado->bindParam(':cantidad_disponible',$cantidad);
      $resultado->bindParam(':estado_producto',$estado);
      $resultado->bindParam(':imagen',$imagen);
      
      if (!$resultado){
        return "error al crear el registro";
      }
      else{
        $resultado->execute();
       
        return "registro exitoso!!";
      }

    }

    public function borrar_producto($codigo){

      $modelo=new Db();
      $conexion=$modelo->conectar();
      $sentencia = "UPDATE productos SET estado = 0 WHERE cod_producto=:cod_producto";
      $resultado=$conexion->prepare($sentencia);
      $resultado->bindParam(':cod_producto',$codigo);
      $resultado->execute();
    }


    public function actualizar_producto($codigo,$nombre,$tipo,$precio,$cantidad,$estado){
      $modelo=new Db();
      $conexion=$modelo->conectar();
      $sentencia = "UPDATE productos SET nombre_producto=:nombre_producto, cod_tipo_producto=:cod_tipo_producto, precio_ud=:precio, 
      cantidad_disponible=:cantidad_disponible, estado=:estado WHERE cod_producto=:cod_producto";
      $resultado=$conexion->prepare($sentencia);
      $resultado->bindParam(':cod_producto',$codigo);
      $resultado->bindParam(':nombre_producto',$nombre);
      $resultado->bindParam(':cod_tipo_producto',$tipo);
      $resultado->bindParam(':precio',$precio);
      $resultado->bindParam(':cantidad_disponible',$cantidad);
      $resultado->bindParam(':estado',$estado);
      
      if (!$resultado){
        return "error al crear el registro";
      }
      else{
        $resultado->execute();
       
        return "registro exitoso!!";
      }
    }
    public function buscar($codigo){
      $modelo=new Db();
      $conexion=$modelo->conectar();
      $sentencia ="SELECT * FROM productos WHERE cod_producto=:cod_producto";
      $resultado=$conexion->prepare($sentencia);
      $resultado->bindParam(':cod_producto',$codigo);
      $resultado->execute();
      $lista=$resultado->fetch();
      return $lista;
    }

  }

 
  
  // //Recibe del formulario de creacion de nuevo tipo
  // if(isset($_POST["guardar_tipo_producto"])){
    
  //   // Inserta datos en tabla tipo_establecimiento
  //   $codigo=$_POST["codigo_tipo_producto"];
  //   $desc=$_POST["desc_tipo_producto"];
  //   $estado=array();
  //   if (isset($_POST["estado_tipo_producto"])){
  //     $estado=1;
  //   }else{
  //     $estado=0;
  //   }
    
  //   $consultas=new consultas();
  //   $mensaje=$consultas->insertar_tipo_producto($codigo,$desc,$estado);
    
    
    
  //   header ("location: http://localhost/miniMarket/admin/tipo_producto.php");  
    
  // }

  // //Recibe del formulario de actualizacion para hacer UPDATE en la base de datos
  // if(isset($_POST["actualizar_tipo_producto"])){
    
  //   // Inserta datos en tabla tipo_establecimiento
  //   $codigo=$_POST["codigo_tipo_producto"];
  //   $desc=$_POST["desc_tipo_producto"];
  //   $estado=array();
  //   if (isset($_POST["estado_tipo_producto"])){
  //     $estado=1;
  //   }else{
  //     $estado=0;
  //   }
    
  //   $consultas=new consultas();
  //   $mensaje=$consultas->actualizar_tipo_producto($codigo,$desc,$estado);
    
    
    
  //   header ("location: http://localhost/miniMarket/admin/tipo_producto.php");  
    
  // }
  //Recibe del formulario la accion 2 que significa borrar
  if(isset($_GET['cod_producto'])){
    $cod=$_GET['cod_producto'];
    $accion=$_GET['accion'];
    
    if ($accion==2){

    //   echo($cod);
    $consultas=new consultas();
    $mensaje=$consultas->borrar_producto($cod);
    header ("location: http://localhost/miniMarket/admin/tabla_producto.php");  
        
       
    } 
}
  
  
  

 

      
 
  

  



?>