<!--Conexión BD-->
<?php 
  
  
  require_once ("../conexion/conexion.php");
 
  class consultas{

    

    public function insertar_tipo_establecimiento($codigo,$descripcion,$estado){
      
      $modelo=new Db();
      $conexion=$modelo->conectar();
      $sentencia =  "INSERT INTO tipo_establecimiento (
        cod_tipo_est,
        desc_tipo_est,
        estado
        ) VALUES (:cod_tipo_est,:desc_tipo_est,:estado)";
      $resultado=$conexion->prepare($sentencia);
      $resultado->bindParam(':cod_tipo_est',$codigo);
      $resultado->bindParam(':desc_tipo_est',$descripcion);
      $resultado->bindParam(':estado',$estado);
      
      if (!$resultado){
        return "error al crear el registro";
      }
      else{
        $resultado->execute();
       
        return "registro exitoso!!";
      }

    }

    public function borrar_tipo_establecimiento($codigo){
      
      $modelo=new Db();
      $conexion=$modelo->conectar();
      $sentencia = "DELETE FROM tipo_establecimiento WHERE cod_tipo_est=:cod_tipo_est";
      $resultado=$conexion->prepare($sentencia);
      $resultado->bindParam(':cod_tipo_est',$codigo);
      $resultado->execute();
    }

    public function actualizar_tipo_establecimiento($codigo,$descripcion,$estado){
      
      $modelo=new Db();
      $conexion=$modelo->conectar();
      $sentencia = "UPDATE tipo_establecimiento SET desc_tipo_est=:desc_tipo_est, estado=:estado WHERE cod_tipo_est=:cod_tipo_est";
      $resultado=$conexion->prepare($sentencia);
      $resultado->bindParam(':cod_tipo_est',$codigo);
      $resultado->bindParam(':desc_tipo_est',$descripcion);
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
      $sentencia ="SELECT * FROM tipo_establecimiento WHERE cod_tipo_est=:cod_tipo_est";
      $resultado=$conexion->prepare($sentencia);
      $resultado->bindParam(':cod_tipo_est',$codigo);
      $resultado->execute();
      $lista=$resultado->fetch();
      return $lista;
    }

  }
 

  if(isset($_GET['cod_tipo_est'])){
    $cod=$_GET['cod_tipo_est'];
    $accion=$_GET['accion'];
    
    if ($accion==2){

    //   echo($cod);
    $consultas=new consultas();
    $mensaje=$consultas->borrar_tipo_establecimiento($cod);
    header ("location: http://localhost/miniMarket/admin/tipo_establecimiento.php");  
        
       
    } 
  }
  
  
  

 

      
 
  

  



