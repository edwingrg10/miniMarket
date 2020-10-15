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

      //funcion para borar los tipos de productos
    }

    public function consultar_tipo_establecimiento(){

      $modelo=new Db();
      $conexion=$modelo->conectar();
      $sentencia =  "SELECT * FROM tipo_establecimiento";
      $resultado=$conexion->prepare($sentencia);
      return $resultado;
    }


  }

  //formulario principal tipo de establecimiento
  

  if(isset($_POST["guardar_tipo_est"])){
    
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
    $mensaje=$consultas->insertar_tipo_establecimiento($codigo,$desc,$estado);
    // echo "<a href='../tipo_establecimiento.html'> Nuevo tipo de establecimiento </a>";
    // echo $mensaje;
    
    
    header ("location: http://localhost/miniMarket/admin/tipo_establecimiento_pr.php");  
    
  }
  

  if(isset($_POST["Consulta_tipo_est"])){

    $consultas=new consultas();
    
    $arreglo=$consultas->consultar_tipo_establecimiento();
    
    header ("location: http://localhost/miniMarket/vista_tipo_establecimiento.php");
    
  }
 

  // if(isset($_POST["consulta_tipo_est"])){

  //   echo "hola";
      
  // }


?>