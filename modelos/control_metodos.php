<?php
class InventarioMarca {
  private $pdo;
  
  public function __construct() {
    require_once '../conexion/conexion.php';
    try {
      $this->pdo = Db::conectar();
    } catch (Exception $ex) {
      die($ex->getMessage());
    }
  }
  
  public function obtenerTodos() {
    try {
      /*$busqueda=$_POST['busqueda'];*/
      $sql = "select * from marca where id_estado = 1";
      $prep = $this->pdo->prepare($sql);
      $prep->execute();
      return $prep->fetchAll(PDO::FETCH_OBJ);
    } catch (Exception $ex) {
      die($ex->getMessage());
    }
  }
  
  /*public function agregar($inventario) {
    try {
      $sql = "insert into inventario (cod_empleado, apellidos, nombres, ref_laptop, serial_laptop, serial_mouse, ref_diadema, site) values (?, ?, ?, ?, ?, ?, ?, ?)";
      $this->pdo->prepare($sql)->execute(array(
		  
          $inventario->getCod_empleado(),
          $inventario->getApellidos(),
          $inventario->getNombres(),
          $inventario->getRef_laptop(),
          $inventario->getSerial_laptop(),
          $inventario->getSerial_mouse(),
		  $inventario->getRef_diadema(),
		  $inventario->getSite()
      ));
    } catch (Exception $ex) {
      die($ex->getMessage());
    }
  }*/
  
    public function obtenerPorCodigo($cod_marca) {
    try {
      $sql = "select * from marca where cod_marca = ?";
      $prep = $this->pdo->prepare($sql);
      $prep->execute(array($cod_marca));
      return $prep->fetch(PDO::FETCH_OBJ);
    } catch (Exception $ex) {
      die($ex->getMessage());
    }
  }
  
  public function modificar($marca) {
    try {
      $sql = "update marca set nombre_marca = ?, id_estado = ? where cod_marca = ?";
      $this->pdo->prepare($sql)->execute(array(
            $marca->getNombre_marca(),
            $marca->getId_estado(),
            $marca->getCod_marca()

      ));
    } catch (Exception $ex) {
      die($ex->getMessage());
    }
  }

  public function eliminar($cod_marca) {
    try {
      $sql = "update marca set id_estado = 2 where cod_marca = ?";
      $prep = $this->pdo->prepare($sql);
      $prep->execute(array($cod_marca));
    } catch (Exception $ex) {
      die($ex->getMessage());
    }
  }
}