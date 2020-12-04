<?php 
  
  
  include ("../conexion/conexion.php");
 
    class mercado{

        public function buscar_productos($cod_est,$cod_tipo_pr)
        {
            $modelo = new Db();
            $conexion = $modelo->conectar();
            $sentencia = "SELECT * FROM productos where cod_tipo_producto=(:cod_tipo_pr) and cod_producto not in (select productos.cod_producto from productos JOIN establecimiento_producto 
            on establecimiento_producto.cod_producto=productos.cod_producto where establecimiento_producto.cod_est=(:cod_est))  ";
            $resultado = $conexion->prepare($sentencia);
            $resultado->bindParam(':cod_est',$cod_est);
            $resultado->bindParam(':cod_tipo_pr',$cod_tipo_pr);
            $resultado->execute();
            
            $lista = $resultado->fetchAll();
            return $lista;

        }

        public function buscar_medicamentos($cod_est)
        {
            $modelo = new Db();
            $conexion = $modelo->conectar();
            $sentencia = "SELECT * FROM productos where cod_producto not in (select productos.cod_producto from productos JOIN establecimiento_producto 
            on establecimiento_producto.cod_producto=productos.cod_producto where establecimiento_producto.cod_est=(:cod_est))";
            $resultado = $conexion->prepare($sentencia);
            $resultado->bindParam(':cod_est',$cod_est);
            $resultado->execute();
            
            $lista = $resultado->fetchAll();
            return $lista;

        }

        public function buscar_inventario($cod_est)
        {
            $modelo = new Db();
            $conexion = $modelo->conectar();
            $sentencia = "SELECT productos.cod_producto,productos.nombre_producto,productos.cod_tipo_producto,productos.precio_ud,
            productos.estado,productos.unidad_medida,productos.img,establecimiento_producto.cantidad_disponible from establecimiento_producto JOIN productos 
            ON productos.cod_producto=establecimiento_producto.cod_producto where establecimiento_producto.cod_est=(:cod_est) ";
            $resultado = $conexion->prepare($sentencia);
            $resultado->bindParam(":cod_est",$cod_est);
            $resultado->execute();
            $lista = $resultado->fetchAll();
            return $lista;

        }
   
        public function actualiza_inventario($cod_producto,$cod_est,$cantidad){
            $modelo = new Db();
            $conexion = $modelo->conectar();
            $sentencia = "UPDATE establecimiento_producto SET cantidad_disponible=(:cantidad) 
            where cod_producto=(:cod_producto) and cod_est=(:cod_est)";
            $resultado = $conexion->prepare($sentencia);
            $resultado->bindParam(':cod_producto',$cod_producto);
            $resultado->bindParam(':cod_est',$cod_est);
            $resultado->bindParam(':cantidad',$cantidad);
            $resultado->execute();

        }    


        public function buscar_establecimiento($cod_usuario)
        {
            $modelo = new Db();
            $conexion = $modelo->conectar();
            $sentencia = "SELECT * FROM establecimiento where cod_usuario=(:cod_usuario)";
            $resultado = $conexion->prepare($sentencia);
            $resultado->bindParam(":cod_usuario",$cod_usuario);
            
            $resultado->execute();
            $lista = $resultado->fetch();
            return $lista;

        }

        public function buscar_usuario($cod_usuario)
        {
            $modelo = new Db();
            $conexion = $modelo->conectar();
            $sentencia = "SELECT * FROM usuario where id_usuario=(:cod_usuario)";
            $resultado = $conexion->prepare($sentencia);
            $resultado->bindParam(":cod_usuario",$cod_usuario);
            $resultado->execute();
            $lista = $resultado->fetch();
            return $lista;

        }

        public function buscar_tipos()
        {
            $modelo = new Db();
            $conexion = $modelo->conectar();
            $sentencia = "SELECT * FROM tipo_establecimiento";
            $resultado = $conexion->prepare($sentencia);
            
            $resultado->execute();
            $lista = $resultado->fetchAll();
            return $lista;

        }

        public function crear_est($nombre,$cod_tipo_est,$cod_usuario,$estado){
            $modelo = new Db();
            $conexion = $modelo->conectar();
            $sentencia =  "INSERT INTO establecimiento (nombre_est,cod_tipo_est,cod_usuario,estado) VALUES (:nombre_est,:cod_tipo_est,:cod_usuario,:estado)";
            $resultado = $conexion->prepare($sentencia);
            $resultado->bindParam(':nombre_est', $nombre);
            $resultado->bindParam(':cod_tipo_est',$cod_tipo_est);
            $resultado->bindParam(':cod_usuario',$cod_usuario);
            $resultado->bindParam(':estado',$estado);
            $resultado->execute();

        }

        public function agregar_inventario($cod_est,$cod_producto,$cantidad){
            $modelo = new Db();
            $conexion = $modelo->conectar();
            $sentencia =  "INSERT INTO establecimiento_producto (cod_est,cod_producto,cantidad_disponible) VALUES (:cod_est,:cod_producto,:cantidad_disponible)";
            $resultado = $conexion->prepare($sentencia);
            $resultado->bindParam(':cod_est', $cod_est);
            $resultado->bindParam(':cod_producto',$cod_producto);
            $resultado->bindParam(':cantidad_disponible',$cantidad);
      
            $resultado->execute();

        }

        public function buscar_pedidos($cod_est){
            $modelo = new Db();
            $conexion = $modelo->conectar();
            $sentencia =  "SELECT usuario.primer_nombre, usuario.primer_apellido,usuario.segundo_apellido,usuario.direccion,pedidos.cod_pedido,pedidos.fecha_pedido,
            pedidos.valor_pedido,pedidos.estado from pedidos join usuario on usuario.id_usuario=pedidos.id_usuario where pedidos.cod_est=(:cod_est) ";
            $resultado = $conexion->prepare($sentencia);
            $resultado->bindParam(':cod_est', $cod_est);
            $resultado->execute();

            $lista = $resultado->fetchAll();
            return $lista;


        }

        public function actualizar_pedido($cod_est,$cod_ped,$estado){
            $modelo = new Db();
            $conexion = $modelo->conectar();
            $sentencia =  "UPDATE pedidos SET estado=(:estado) where cod_pedido=(:cod_pedido) and cod_est=(:cod_est)";
            $resultado = $conexion->prepare($sentencia);
            $resultado->bindParam(':cod_est', $cod_est);
            $resultado->bindParam(':estado', $estado);
            $resultado->bindParam(':cod_pedido', $cod_ped);
            $resultado->execute();

           


        }






    }



 
?>    
    
  