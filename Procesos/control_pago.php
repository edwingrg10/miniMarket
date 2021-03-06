<?php


include ("../conexion/conexion.php");

class consultas
{

    public function insertar_pago($codigo, $descripcion, $estado)
    {

        $modelo = new Db();
        $conexion = $modelo->conectar();
        $sentencia =  "INSERT INTO tipo_pago (
            id_tipo_pago,
            descripcion,
            estado
            ) VALUES (:id_tipo_pago,:descripcion,:estado)";
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

    public function borrar_tipo_pago($codigo)
    {

        $modelo = new Db();
        $conexion = $modelo->conectar();
        $sentencia = "DELETE FROM tipo_pago WHERE id_tipo_pago=:id_tipo_pago";
        $resultado = $conexion->prepare($sentencia);
        $resultado->bindParam(':id_tipo_pago', $codigo);
        $resultado->execute();
    }

    public function actualizar_tipo_pago($codigo, $descripcion, $estado)
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

    public function buscar($codigo)
    {
        $modelo = new Db();
        $conexion = $modelo->conectar();
        $sentencia = "SELECT * FROM tipo_pago WHERE id_tipo_pago=:id_tipo_pago";
        $resultado = $conexion->prepare($sentencia);
        $resultado->bindParam(':id_tipo_pago', $codigo);
        $resultado->execute();
        $lista = $resultado->fetch();
        return $lista;
    }

    public function buscar_tipos()
    {
        $modelo = new Db();
        $conexion = $modelo->conectar();
        $sentencia = "SELECT * FROM tipo_pago";
        $resultado = $conexion->prepare($sentencia);

        $resultado->execute();
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function buscar_tipo_producto()
    {
        $modelo = new Db();
        $conexion = $modelo->conectar();
        $sentencia = "SELECT * FROM tipo_producto";
        $resultado = $conexion->prepare($sentencia);

        $resultado->execute();
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function buscar_productos()
    {
        $modelo = new Db();
        $conexion = $modelo->conectar();
        $sentencia = "SELECT * FROM tipo_producto";
        $resultado = $conexion->prepare($sentencia);

        $resultado->execute();
        $lista = $resultado->fetchAll();
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

}

class carrito_pago
{
    public function ver_carrito($cod_carrito)
    {
        $modelo = new Db();
        $conexion = $modelo->conectar();
        $sentencia = "SELECT productos.cod_producto,productos.nombre_producto,cantidad,valor from carrito_producto 
        JOIN productos ON productos.cod_producto=carrito_producto.cod_producto where carrito_producto.cod_carrito=(:cod_carrito) ";
        $resultado = $conexion->prepare($sentencia);
        $resultado->bindParam(':cod_carrito', $cod_carrito);
        $resultado->execute();
        $lista = $resultado->fetchAll();
        if (!$lista) {
            return "";
        } else {
            return $lista;
        }
    }

    public function carrito_cerrar($cod_carrito)
    {
        $modelo = new Db();
        $conexion = $modelo->conectar();
        $sentencia = "UPDATE carrito SET estado=0 where cod_carrito=(:cod_carrito)";
        $resultado = $conexion->prepare($sentencia);
        $resultado->bindParam('cod_carrito', $cod_carrito);
        $resultado->execute();
    }

    public function registro_pedido($cod_pedido, $fecha_pedido, $cod_carrito, $id_usuario, $valor_total, $estado_pedido,$cod_est)
    {
        $modelo = new Db();
        $conexion = $modelo->conectar();
        $sentencia = "INSERT INTO pedidos (cod_pedido,fecha_pedido,cod_carrito,id_usuario,valor_pedido,estado,cod_est) VALUES (:cod_pedido,:fecha_pedido,:cod_carrito,:id_usuario,:valor_total,:estado_pedido,:cod_est)";
        $resultado = $conexion->prepare($sentencia);
        $resultado->bindParam(':cod_pedido', $cod_pedido);
        $resultado->bindParam(':fecha_pedido', $fecha_pedido);
        $resultado->bindParam(':cod_carrito', $cod_carrito);
        $resultado->bindParam(':id_usuario', $id_usuario);
        $resultado->bindParam(':valor_total', $valor_total);
        $resultado->bindParam(':estado_pedido', $estado_pedido);
        $resultado->bindParam(':cod_est', $cod_est);
        $resultado->execute();
    }

    public function registro_pago($valor, $fecha_pago, $estado, $cod_pedido, $id_tipo_pago, $tipo_persona, $banco)
    {
        $modelo = new Db();
        $conexion = $modelo->conectar();
        $sentencia = "INSERT INTO pago (valor,fecha_pago,estado,cod_pedido,id_tipo_pago,tipo_persona,banco) VALUES 
        (:valor,:fecha_pago,:estado,:cod_pedido,:id_tipo_pago,:tipo_persona,:banco)";
        $resultado = $conexion->prepare($sentencia);
        $resultado->bindParam(':valor', $valor);
        $resultado->bindParam(':fecha_pago', $fecha_pago);
        $resultado->bindParam(':estado', $estado);
        $resultado->bindParam(':cod_pedido', $cod_pedido);
        $resultado->bindParam(':id_tipo_pago', $id_tipo_pago);
        $resultado->bindParam(':tipo_persona', $tipo_persona);
        $resultado->bindParam(':banco', $banco);
        $resultado->execute();
    }

    public function actualiza_inventario($cod_producto, $cantidad)
    {
        $modelo = new Db();
        $conexion = $modelo->conectar();
        $sentencia = "UPDATE productos SET cantidad_disponible=(:cantidad) where cod_producto=(:cod_producto)";
        $resultado = $conexion->prepare($sentencia);
        $resultado->bindParam('cod_producto', $cod_producto);
        $resultado->bindParam(':cantidad', $cantidad);
        $resultado->execute();
    }

    public function saldo_producto($cod_producto)
    {
        $modelo = new Db();
        $conexion = $modelo->conectar();
        $sentencia = "SELECT cantidad_disponible from productos where cod_producto=(:cod_producto) ";
        $resultado = $conexion->prepare($sentencia);
        $resultado->bindParam(':cod_producto', $cod_producto);
        $resultado->execute();
        $saldo = $resultado->fetch();
        return $saldo;
    }
}

if (isset($_GET['id_tipo_pago'])) {
    $cod = $_GET['id_tipo_pago'];
    $accion = $_GET['accion'];

    if ($accion == 2) {

        //   echo($cod);
        $consultas = new consultas();
        $mensaje = $consultas->borrar_tipo_pago($cod);
        header("location: http://localhost/minimarket/admin/tipo_pago.php");
    }
}
