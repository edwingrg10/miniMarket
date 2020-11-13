<!--Conexión BD-->
<?php 
  
  
  include ("../conexion/conexion.php");
 
  class consultas{

    public function insertar_tipo_usuario($id_usuario, $cedula, $primer_apellido, $segundo_apellido, $primer_nombre, $segundo_nombre, $direccion, $celular, $telefono, $fecha_nacimiento, $correo, $contrasena, $cod_perfil, $id_estado ){

      $modelo=new Db();
      $conexion=$modelo->conectar();
      $sentencia =  "INSERT INTO usuario (
        id_usuario,
        cedula,
        primer_apellido,
        segundo_apellido,
        primer_nombre,
        segundo_nombre,
        direccion,
        celular,
        telefono,
        fecha_nacimiento,
        correo,
        contrasena,
        cod_perfil,
        id_estado
        ) VALUES (:id_usuario,:cedula,:primer_apellido,:segundo_apellido,:primer_nombre,:segundo_nombre,:direccion,:celular,:telefono,:fecha_nacimiento,:correo,:contrasena,:cod_perfil,:id_estado)";
      $resultado=$conexion->prepare($sentencia);
      $resultado->bindParam(':id_usuario',$id_usuario);
      $resultado->bindParam(':cedula',$cedula);
      $resultado->bindParam(':primer_apellido',$primer_apellido);
      $resultado->bindParam(':segundo_apellido',$segundo_apellido);
      $resultado->bindParam(':primer_nombre',$primer_nombre);
      $resultado->bindParam(':segundo_nombre',$segundo_nombre);
      $resultado->bindParam(':direccion',$direccion);
      $resultado->bindParam(':celular',$celular);
      $resultado->bindParam(':telefono',$telefono);
      $resultado->bindParam(':fecha_nacimiento',$fecha_nacimiento);
      $resultado->bindParam(':correo',$correo);
      $resultado->bindParam(':contrasena',$contrasena);
      $resultado->bindParam(':cod_perfil',$cod_perfil);
      $resultado->bindParam(':id_estado',$id_estado);
      
      if (!$resultado){
        return "error al crear el registro";
      }
      else{
        $resultado->execute();
       
        return "registro exitoso!!";
      }

    }

    public function borrar_usuario($codigo){

      $modelo=new Db();
      $conexion=$modelo->conectar();
      $sentencia = "UPDATE usuario SET id_estado = 0 WHERE id_usuario=:id_usuario";
      $resultado=$conexion->prepare($sentencia);
      $resultado->bindParam(':id_usuario',$codigo);
      $resultado->execute();
    }

    public function actualizar_tipo_usuario($id_usuario, $cedula, $primer_apellido, $segundo_apellido, $primer_nombre, $segundo_nombre, $direccion, $celular, $telefono, $fecha_nacimiento, $correo, $contrasena, $cod_perfil, $id_estado){
      $modelo=new Db();
      $conexion=$modelo->conectar();
      
      $sentencia = "UPDATE usuario SET cedula=:cedula, primer_apellido=:primer_apellido, segundo_apellido=:segundo_apellido, primer_nombre=:primer_nombre, segundo_nombre=:segundo_nombre, direccion=:direccion, celular=:celular, telefono=:telefono, fecha_nacimiento=:fecha_nacimiento, correo=:correo, contrasena=:contrasena, cod_perfil=:cod_perfil, id_estado=:id_estado WHERE id_usuario=:id_usuario";
      $resultado=$conexion->prepare($sentencia);
      $resultado->bindParam(':id_usuario',$id_usuario);
      $resultado->bindParam(':cedula',$cedula);
      $resultado->bindParam(':primer_apellido',$primer_apellido);
      $resultado->bindParam(':segundo_apellido',$segundo_apellido);
      $resultado->bindParam(':primer_nombre',$primer_nombre);
      $resultado->bindParam(':segundo_nombre',$segundo_nombre);
      $resultado->bindParam(':direccion',$direccion);
      $resultado->bindParam(':celular',$celular);
      $resultado->bindParam(':telefono',$telefono);
      $resultado->bindParam(':fecha_nacimiento',$fecha_nacimiento);
      $resultado->bindParam(':correo',$correo);
      $resultado->bindParam(':contrasena',$contrasena);
      $resultado->bindParam(':cod_perfil',$cod_perfil);
      $resultado->bindParam(':id_estado',$id_estado);
      
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
      $sentencia ="SELECT * FROM usuario WHERE id_usuario=:id_usuario";
      $resultado=$conexion->prepare($sentencia);
      $resultado->bindParam(':id_usuario',$cod);
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
  if(isset($_GET['id_usuario'])){
    $cod=$_GET['id_usuario'];
    $accion=$_GET['accion'];
    
    if ($accion==2){

    //   echo($cod);
    $consultas=new consultas();
    $mensaje=$consultas->borrar_usuario($cod);
    header ("location: http://localhost:8000/miniMarket/admin/usuarios.php");  
        
       
    } 
}
  
  
  

 

      
 
  

  



?>