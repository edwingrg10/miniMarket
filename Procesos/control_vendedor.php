<?php 
  
  
  include ("../conexion/conexion.php");
 
    class mercado{
         public function buscar_productos()
        {
            $modelo = new Db();
            $conexion = $modelo->conectar();
            $sentencia = "SELECT * FROM productos";
            $resultado = $conexion->prepare($sentencia);
            
            $resultado->execute();
            $lista = $resultado->fetchAll();
            return $lista;

        }


    }

 
?>    
    
  