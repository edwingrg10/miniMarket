<?php 
  
  
  include ("../conexion/conexion.php");
 
    class pedido{


        public function actualizar_pedido($codigo, $descripcion, $estado)
        {
            $modelo = new Db();
            $conexion = $modelo->conectar();
            $sentencia = "UPDATE tipo_pago SET descripcion=:descripcion, estado=:estado WHERE id_tipo_pago=:id_tipo_pago";
            $resultado = $conexion->prepare($sentencia);
            $resultado->bindParam(':id_tipo_pago', $codigo);
            $resultado->bindParam(':descripcion', $descripcion);
            $resultado->bindParam(':estado', $estado);
            if (!$resultado) {
                return "error al crear el registro";
            } else {
                $resultado->execute();

                return "registro exitoso!!";
            }
        }

        public function buscar_pedidos($id_usuario)
        {
            $modelo = new Db();
            $conexion = $modelo->conectar();
            $sentencia = "SELECT * FROM pedidos where id_usuario=(:id_usuario)";
            $resultado = $conexion->prepare($sentencia);
            $resultado->bindParam(':id_usuario', $id_usuario);
            $resultado->execute();
            $lista = $resultado->fetchAll();
            return $lista;

        }

        public function actualizar_estado($cod_pedido,$estado_pedido)
        {
            $modelo = new Db();
            $conexion = $modelo->conectar();
            $sentencia = "UPDATE pedidos SET estado=(:estado_pedido) WHERE cod_pedido=(:cod_pedido)";
            $resultado = $conexion->prepare($sentencia);
            $resultado->bindParam(':cod_pedido',$cod_pedido);
            $resultado->bindParam(':estado_pedido',$estado_pedido);
            $resultado->execute();
           
            

        }


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


        public function buscar_establecimiento($tipo)
        {
            $modelo = new Db();
            $conexion = $modelo->conectar();
            $sentencia = "SELECT * FROM establecimiento where cod_tipo_est=(:tipo_est)";
            $resultado = $conexion->prepare($sentencia);
            $resultado->bindParam(':tipo_est', $tipo);
            $resultado->execute();
            $lista = $resultado->fetchAll();
            return $lista;

        }

        public function buscar_tipo_est()
        {
            $modelo = new Db();
            $conexion = $modelo->conectar();
            $sentencia = "SELECT * FROM tipo_establecimiento";
            $resultado = $conexion->prepare($sentencia);
            $resultado->execute();
            $lista = $resultado->fetchAll();
            return $lista;

        }

        public function buscar_inventario($cod_est)
        {
            $modelo = new Db();
            $conexion = $modelo->conectar();
            $sentencia = "SELECT productos.cod_producto,productos.nombre_producto,productos.cod_tipo_producto,productos.precio_ud,
            productos.estado,productos.img,productos.unidad_medida,establecimiento_producto.cantidad_disponible from establecimiento_producto JOIN productos 
            ON productos.cod_producto=establecimiento_producto.cod_producto where establecimiento_producto.cod_est=(:cod_est) ";
            $resultado = $conexion->prepare($sentencia);
            $resultado->bindParam(":cod_est",$cod_est);
            $resultado->execute();
            $lista = $resultado->fetchAll();
            return $lista;

        }



    }

    class carrito{
        public function crear_carrito($estado)
        {

            $modelo = new Db();
            $conexion = $modelo->conectar();
            $sentencia =  "INSERT INTO carrito (
            estado
            ) VALUES (:estado)";
            $resultado = $conexion->prepare($sentencia);
            $resultado->bindParam(':estado', $estado);
            $resultado->execute();
           

        }


        
        public function validar_ult_carrito(){
            $modelo = new Db();
            $conexion = $modelo->conectar();
            $sentencia = "SELECT * FROM carrito WHERE (SELECT MAX(cod_carrito) FROM carrito) = cod_carrito ";
            $resultado = $conexion->prepare($sentencia);
            
            $resultado->execute();
            $lista = $resultado->fetch();
            if (!$lista){
                return "sin carrito";

            }else{
                return $lista;
            }
           

        } 

        public function agregar_a_carrito($cod_carrito,$cod_producto,$cantidad,$valor){
            $modelo = new Db();
            $conexion = $modelo->conectar();
            $sentencia =  "INSERT INTO carrito_producto (cod_carrito,cod_producto,cantidad,valor) VALUES (:cod_carrito,:cod_producto,:cantidad,:valor)";
            $resultado = $conexion->prepare($sentencia);
            $resultado->bindParam(':cod_carrito', $cod_carrito);
            $resultado->bindParam(':cod_producto',$cod_producto);
            $resultado->bindParam(':cantidad',$cantidad);
            $resultado->bindParam(':valor', $valor);
            $resultado->execute();

        }

        public function contar_carrito_producto($cod_carrito,$cod_producto){
            $modelo = new Db();
            $conexion = $modelo->conectar();
            $sentencia = "SELECT count(*) FROM carrito_producto WHERE cod_carrito=(:cod_carrito) and cod_producto=(:cod_producto) ";
           
            $resultado = $conexion->prepare($sentencia);
            $resultado->bindParam(':cod_carrito', $cod_carrito);
            $resultado->bindParam(':cod_producto',$cod_producto);
            $resultado->execute();
            $count = $resultado->fetchColumn();
            return $count;

        }

        public function actualizar_carrito($cod_carrito,$cod_producto,$cantidad,$valor){
            $modelo = new Db();
            $conexion = $modelo->conectar();
            $sentencia = "UPDATE carrito_producto SET cantidad=(:cantidad), valor=(:valor) WHERE cod_carrito=(:cod_carrito) and cod_producto=(:cod_producto)  ";
            $resultado = $conexion->prepare($sentencia);
            $resultado->bindParam(':cod_carrito', $cod_carrito);
            $resultado->bindParam(':cod_producto',$cod_producto);
            $resultado->bindParam(':cantidad',$cantidad);
            $resultado->bindParam(':valor', $valor);
            $resultado->execute();
                     
        }
        
        public function actualiza_inventario($cod_producto,$cod_est,$cantidad){
            $modelo = new Db();
            $conexion = $modelo->conectar();
            $sentencia = "UPDATE establecimiento_producto SET cantidad_disponible=(:cantidad) where cod_producto=(:cod_producto) and cod_est=(:cod_est)";
            $resultado = $conexion->prepare($sentencia);
            $resultado->bindParam('cod_producto',$cod_producto);
            $resultado->bindParam('cod_est',$cod_est);
            $resultado->bindParam(':cantidad',$cantidad);
            $resultado->execute();

        }

        public function ver_carrito($cod_carrito){
            $modelo = new Db();
            $conexion = $modelo->conectar();
            $sentencia = "SELECT productos.nombre_producto,cantidad,valor,productos.cod_producto from carrito_producto JOIN productos ON productos.cod_producto=carrito_producto.cod_producto where carrito_producto.cod_carrito=(:cod_carrito) ";
            $resultado = $conexion->prepare($sentencia);
            $resultado->bindParam(':cod_carrito', $cod_carrito);
            $resultado->execute();
            $lista = $resultado->fetchAll();
            if (!$lista){
                return "";

            }else{
                return $lista;
            }

        }

        public function ver_carrito_producto($cod_carrito,$cod_producto){
            $modelo = new Db();
            $conexion = $modelo->conectar();
            $sentencia = "SELECT cantidad from carrito_producto where cod_carrito=(:cod_carrito) and cod_producto=(:cod_producto) ";
            $resultado = $conexion->prepare($sentencia);
            $resultado->bindParam(':cod_carrito', $cod_carrito);
            $resultado->bindParam(':cod_producto', $cod_producto);
            $resultado->execute();
            $lista = $resultado->fetch();
            if (!$lista){
                return "";

            }else{
                return $lista;
            }

        }

        

        public function carrito_cancelar($cod_carrito){
            

            $modelo = new Db();
            $conexion = $modelo->conectar();
            $sentencia = "DELETE FROM carrito_producto WHERE cod_carrito=(:cod_carrito)";
            $resultado = $conexion->prepare($sentencia);
            $resultado->bindParam(':cod_carrito', $cod_carrito);
            $resultado->execute();
            

        }

        public function disponible_producto($cod_producto,$cod_est){
            $modelo=new Db();
            $conexion=$modelo->conectar();
            $sentencia="SELECT cantidad_disponible FROM establecimiento_producto WHERE cod_producto=(:cod_producto) and cod_est=(:cod_est)";
            $resultado=$conexion->prepare($sentencia);
            $resultado->bindParam('cod_producto',$cod_producto);
            $resultado->bindParam('cod_est',$cod_est);
            $resultado->execute();
            $disponible=$resultado->fetch();
            return $disponible;

        }

 

    }   

    if(isset($_POST['establecimiento'])){
     $est=$_POST['establecimiento'];
     $query= new pedido;
     
     $result=$query->buscar_establecimiento($est);
     
     $cadena_a="<select class='form-control' id='est' name='est'>";
      $cadena="'<option value=0> Seleciona una opcion</option>";  
      foreach ($result as $dato){
          
        $cadena.='<option value='. $dato['codigo_est'].'>'. $dato['nombre_est'].'</option>';

      }        
        
      echo $cadena_a.$cadena.'</select>';

    }
