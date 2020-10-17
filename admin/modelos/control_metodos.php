<?php
class InventarioMarca {
  private $pdo;
  
  public function __construct() {
    require_once '../conexion.php';
    try {
      $this->pdo = Db::conectar();
    } catch (Exception $ex) {
      die($ex->getMessage());
    }
  }
  
  public function obtenerTodos() {
    try {
      /*$busqueda=$_POST['busqueda'];*/
      $sql = "select * from marca";
      $prep = $this->pdo->prepare($sql);
      $prep->execute();
      return $prep->fetchAll(PDO::FETCH_OBJ);
    } catch (Exception $ex) {
      die($ex->getMessage());
    }
  }
  
  public function agregar($inventario) {
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
  }
  
    public function obtenerPorCodigo($codigo) {
    try {
      $sql = "select * from inventario where codigo = ?";
      $prep = $this->pdo->prepare($sql);
      $prep->execute(array($codigo));
      return $prep->fetch(PDO::FETCH_OBJ);
    } catch (Exception $ex) {
      die($ex->getMessage());
    }
  }
  
  public function modificar($inventario) {
    try {
      $sql = "update inventario set cod_empleado = ?, apellidos = ?, nombres = ?, ref_laptop = ?, serial_laptop = ?, serial_mouse = ?, ref_diadema = ?, site = ?  where codigo = ?";
      $this->pdo->prepare($sql)->execute(array(
       $inventario->getCod_empleado(),
          $inventario->getApellidos(),
          $inventario->getNombres(),
          $inventario->getRef_laptop(),
          $inventario->getSerial_laptop(),
          $inventario->getSerial_mouse(),
		  $inventario->getRef_diadema(),
		  $inventario->getSite(),
		  $inventario->getCodigo()
		  
		  
      ));
    } catch (Exception $ex) {
      die($ex->getMessage());
    }
  }

  
  
  
  public function eliminar($codigo) {
    try {
      $sql = "delete from inventario where codigo = ?";
      $prep = $this->pdo->prepare($sql);
      $prep->execute(array($codigo));
    } catch (Exception $ex) {
      die($ex->getMessage());
    }
  }
}