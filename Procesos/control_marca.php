<?php 
  
  
  include ("../conexion/conexion.php");
 
    class consultas{

        public function insertar_marca($codigo, $nombre_marca, $estado)
        {

            $modelo = new Db();
            $conexion = $modelo->conectar();
            $sentencia =  "INSERT INTO marca (
            cod_marca,
            nombre_marca,
            id_estado
            ) VALUES (:cod_marca,:nombre_marca,:estado)";
            $resultado = $conexion->prepare($sentencia);
            $resultado->bindParam(':cod_marca', $codigo);
            $resultado->bindParam(':nombre_marca', $nombre_marca);
            $resultado->bindParam(':estado', $estado);

            if (!$resultado) {
                return "error al crear el registro";
            } else {
                $resultado->execute();

                return "registro exitoso!!";
            }
        }

        public function borrar_marca($codigo)
        {

            $modelo = new Db();
            $conexion = $modelo->conectar();
            $sentencia = "DELETE FROM marca WHERE cod_marca=:cod_marca";
            $resultado = $conexion->prepare($sentencia);
            $resultado->bindParam(':cod_marca', $codigo);
            $resultado->execute();
        }

        public function actualizar_marca($codigo, $nombre_marca, $estado)
        {
            $modelo = new Db();
            $conexion = $modelo->conectar();
            $sentencia = "UPDATE marca SET nombre_marca=:nombre_marca, id_estado=:estado WHERE cod_marca=:cod_marca";
            $resultado = $conexion->prepare($sentencia);
            $resultado->bindParam(':cod_marca', $codigo);
            $resultado->bindParam(':nombre_marca', $nombre_marca);
            $resultado->bindParam(':estado', $estado);
            if (!$resultado) {
                return "error al crear el registro";
            } else {
                $resultado->execute();

                return "registro exitoso!!";
            }
        }
        public function buscar($codigo)
        {
            $modelo = new Db();
            $conexion = $modelo->conectar();
            $sentencia = "SELECT * FROM marca WHERE cod_marca=:cod_marca";
            $resultado = $conexion->prepare($sentencia);
            $resultado->bindParam(':cod_marca', $codigo);
            $resultado->execute();
            $lista = $resultado->fetch();
            return $lista;
        }

    }

  if(isset($_GET['cod_marca'])){
        $cod=$_GET['cod_marca'];
        $accion=$_GET['accion'];
        
        if ($accion==2){

            //   echo($cod);
            $consultas=new consultas();
            $mensaje=$consultas->borrar_marca($cod);
            header ("location: http://localhost:8000/minimarket/admin/tipo_pago.php"); 
        
            
       
        } 
    }
?>    
  