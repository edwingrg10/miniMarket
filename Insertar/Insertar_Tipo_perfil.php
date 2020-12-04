<!--Conexión BD-->
<?php 
  
  
  include ("../conexion/conexion.php");
 
  class consultas{

    public function insertar_tipo_perfil($codigo,$desc,$estado){
      
      $modelo=new Db();
      $conexion=$modelo->conectar();
      $sentencia =  "INSERT INTO perfil (
        cod_perfil,
        descripcion,
        id_estado
        ) VALUES (:codigo,:nombre_perfil,:estado_perfil)";
      $resultado=$conexion->prepare($sentencia);
      $resultado->bindParam(':codigo',$codigo);
      $resultado->bindParam(':nombre_perfil',$desc);
      $resultado->bindParam(':estado_perfil',$estado);
      
      if (!$resultado){
        return "error al crear el registro";
      }
      else{
        $resultado->execute();
       
        return "registro exitoso!!";
      }

    }

    public function borrar_perfil($codigo){

      $modelo=new Db();
      $conexion=$modelo->conectar();
      $sentencia = "UPDATE perfil SET id_estado = 0 WHERE cod_perfil=:cod_perfil";
      $resultado=$conexion->prepare($sentencia);
      $resultado->bindParam(':cod_perfil',$codigo);
      $resultado->execute();
    }

    public function actualizar_tipo_perfil($codigo,$desc,$estado){
      $modelo=new Db();
      $conexion=$modelo->conectar();
      $sentencia = "UPDATE perfil SET descripcion=:nombre_perfil, id_estado=:estado_perfil WHERE cod_perfil=:codigo_tipo_perfil";
      $resultado=$conexion->prepare($sentencia);
      $resultado->bindParam(':codigo_tipo_perfil',$codigo);
      $resultado->bindParam(':nombre_perfil',$desc);
      $resultado->bindParam(':estado_perfil',$estado);
      
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
      $sentencia ="SELECT * FROM perfil WHERE cod_perfil=:codigo_tipo_perfil";
      $resultado=$conexion->prepare($sentencia);
      $resultado->bindParam(':codigo_tipo_perfil',$cod);
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
  if(isset($_GET['cod_perfil'])){
    $cod=$_GET['cod_perfil'];
    $accion=$_GET['accion'];
    
    if ($accion==2){

    //   echo($cod);
    $consultas=new consultas();
    $mensaje=$consultas->borrar_perfil($cod);
    header ("location: http://localhost/miniMarket/admin/tipo_perfil.php");  
        
       
    } 
}
  
  
  

 

      
 
  

  



?>