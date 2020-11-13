<!--Conexión BD-->
<?php 
  
  
  include ("../conexion/conexion.php");
 
  class consultas{

    public function insertar_tipo_marca($codigo,$desc,$estado){
      
      $modelo=new Db();
      $conexion=$modelo->conectar();
      $sentencia =  "INSERT INTO marca (
        cod_marca,
        nombre_marca,
        id_estado
        ) VALUES (:cod_marca,:nombre_marca,:estado_marca)";
      $resultado=$conexion->prepare($sentencia);
      $resultado->bindParam(':cod_marca',$codigo);
      $resultado->bindParam(':nombre_marca',$desc);
      $resultado->bindParam(':estado_marca',$estado);
      
      if (!$resultado){
        return "error al crear el registro";
      }
      else{
        $resultado->execute();
       
        return "registro exitoso!!";
      }

    }

    public function borrar_marca($codigo){

      $modelo=new Db();
      $conexion=$modelo->conectar();
      $sentencia = "UPDATE marca SET id_estado = 0 WHERE cod_marca=:cod_marca";
      $resultado=$conexion->prepare($sentencia);
      $resultado->bindParam(':cod_marca',$codigo);
      $resultado->execute();
    }

    public function actualizar_tipo_marca($codigo,$desc,$estado){
      $modelo=new Db();
      $conexion=$modelo->conectar();
      $sentencia = "UPDATE marca SET nombre_marca=:nombre_marca, id_estado=:estado_marca WHERE cod_marca=:cod_marca";
      $resultado=$conexion->prepare($sentencia);
      $resultado->bindParam(':cod_marca',$codigo);
      $resultado->bindParam(':nombre_marca',$desc);
      $resultado->bindParam(':estado_marca',$estado);
      
      if (!$resultado){
        return "error al crear el registro";
      }
      else{
        $resultado->execute();
       
        return "registro exitoso!!";
      }
    }
  

    public function buscar($cod){
      $modelo=new Db();
      $conexion=$modelo->conectar();
      $sentencia ="SELECT * FROM marca WHERE cod_marca=:cod_marca";
      $resultado=$conexion->prepare($sentencia);
      $resultado->bindParam(':cod_marca',$cod);
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
  if(isset($_GET['cod_marca'])){
    $cod=$_GET['cod_marca'];
    $accion=$_GET['accion'];
    
    if ($accion==2){

    //   echo($cod);
    $consultas=new consultas();
    $mensaje=$consultas->borrar_marca($cod);
    header ("location: http://localhost:8000/miniMarket/admin/tipo_marca.php");  
        
       
    } 
}
  
  
  

 

      
 
  

  



?>