<!--Conexión BD-->
<?php 
  
  
  include ("../../conexion.php");
 
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

  }
 
  
  //Recibe del formulario de creacion de nuevo tipo
  
  if(isset($_POST["guardar_tipo_est"])){

    $error_cod="sin inicio";
    $error_desc="";
    $codigo=$_POST["codigo_tipo_est"];
    $desc=$_POST["desc_tipo_est"];
    $estado=array();
      if (isset($_POST["estado_tipo_est"])){
        $estado=1;
      }else{
        $estado=0;
      }

    
    $valido=0;  

    if(!$codigo==""){
      
      $valido=$valido+1;
    }else{
      $error_cod= "ingrese un nombre";
      // echo "<p class='error'>Ingrese un codigo</p>";
    }

    if (!$desc==""){

      $valido=$valido+1;

    }else{
      $error_desc="Ingrese una descripcion";
      

    }
   

    if($valido==2){

      $consultas=new consultas();
      $mensaje=$consultas->insertar_tipo_establecimiento($codigo,$desc,$estado);
      header ("location: http://localhost/miniMarket/admin/tipo_establecimiento.php");  
      
      echo "<p>lo logramos</p>";
    }else{
      header ("location: http://localhost/miniMarket/admin/forms/nuevo_tipo_establecimiento.php"); 

    }
   
    
    
  } else{
      // echo $error_cod;
      
      // echo $error_desc;
      
      
      $error_cod="sin inicio";
      $error_desc="";

    } 

  //Recibe del formulario de actualizacion para hacer UPDATE en la base de datos
  if(isset($_POST["actualizar_tipo_est"])){
    
    // Inserta datos en tabla tipo_establecimiento
    $codigo=$_POST["codigo_tipo_est"];
    $desc=$_POST["desc_tipo_est"];
    $estado=array();
    if (isset($_POST["estado_tipo_est"])){
      $estado=1;
    }else{
      $estado=0;
    }
    
    $consultas=new consultas();
    $mensaje=$consultas->actualizar_tipo_establecimiento($codigo,$desc,$estado);
    
    
    
    header ("location: http://localhost/miniMarket/admin/tipo_establecimiento.php");  
    
  }
  //Recibe del formulario la accion 2 que significa borrar
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
  
  
  

 

      
 
  

  



?>