<!--Conexión BD-->
<?php 
  
  
  include ("../../conexion.php");
 
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

      $modelo=new Db();
      $conexion=$modelo->conectar();
      $sentencia = "DELETE FROM tipo_producto WHERE cod_tipo_producto=:cod_tipo_producto";
      $resultado=$conexion->prepare($sentencia);
      $resultado->bindParam(':cod_tipo_producto',$codigo);
      $resultado->execute();
    }

    public function actualizar_tipo_producto($codigo,$descripcion,$estado){
      $modelo=new Db();
      $conexion=$modelo->conectar();
      $sentencia = "UPDATE tipo_producto SET desc_tipo_producto=:desc_tipo_producto, estado=:estado WHERE cod_tipo_producto=:cod_tipo_producto";
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
    public function buscar($codigo){
      $modelo=new Db();
      $conexion=$modelo->conectar();
      $sentencia ="SELECT * FROM tipo_producto WHERE cod_tipo_producto=:cod_tipo_producto";
      $resultado=$conexion->prepare($sentencia);
      $resultado->bindParam(':cod_tipo_producto',$codigo);
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
  if(isset($_GET['cod_tipo_producto'])){
    $cod=$_GET['cod_tipo_producto'];
    $accion=$_GET['accion'];
    
    if ($accion==2){

    //   echo($cod);
    $consultas=new consultas();
    $mensaje=$consultas->borrar_tipo_producto($cod);
    header ("location: http://localhost/miniMarket/admin/tipo_producto.php");  
        
       
    } 
}
  
  
  

 

      
 
  

  



?>