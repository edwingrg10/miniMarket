<?php
$con = mysqli_connect("localhost","root","","minimarket");

// Conexión a bd
if (mysqli_connect_errno())
  {
  echo "Fallo la conexión: " . mysqli_connect_error();
  }
?>
