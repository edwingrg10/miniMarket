<?php 
error_reporting(0);
include '../../conexion.php'; 
?>
<?php
$consulta_estado = $conn->query("SELECT * FROM estado ORDER BY descripcion ASC");
?>