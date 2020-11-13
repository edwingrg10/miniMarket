
<!DOCTYPE html>
<html lang="es">

<?php 
require_once ( '../Insertar/Insertar_tipo_usuario.php');
$consultas=new consultas();
if(isset($_GET['id_usuario'])){
    $cod=$_GET['id_usuario'];
    $info=$consultas->buscar($cod);
    
}

$error_cod="";
$error_desc="";
$frm_enviado=false;
if(isset($_POST["actualizar_tipo_usuario"])){
        
    $id_usuario = $_POST["id_usuario"];
    $cedula = $_POST["cedula"];
    $primer_apellido = $_POST["primer_apellido"];
    $segundo_apellido = $_POST["segundo_apellido"];
    $primer_nombre = $_POST["primer_nombre"];
    $segundo_nombre = $_POST["segundo_nombre"];
    $direccion = $_POST["direccion"];
    $celular = $_POST["celular"];
    $telefono = $_POST["telefono"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];
    $cod_perfil = $_POST["cod_perfil"];
    $id_estado = array();
    
    if (isset($_POST["id_estado"])){
        $estado=1;
    }else{
        $estado=0;
    }
    $valido=0;  


    if (!$cedula==""){

        $valido=$valido+1;

    }else{
        $error_desc="Por favor ingrese una Cédula";
    
    }
    if($valido==1){
              
        $mensaje=$consultas->actualizar_tipo_usuario($id_usuario, $cedula, $primer_apellido, $segundo_apellido, $primer_nombre, $segundo_nombre, $direccion, $celular, $telefono, $fecha_nacimiento, $correo, $contrasena, $cod_perfil, $id_estado);
        header ("location: http://localhost:8000/miniMarket/admin/usuarios.php");      
        
 
    }


}


?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MiniMarket</title>

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Menu -->
        <div class="menu"></div>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
   <!-- Topbar Navbar -->
   <p>Perfil Administrador</p>
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                           
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                
                        <h4><span class="mr-4 d-none d-lg-inline text-dark large" data-toggle="modal" data-target="#logoutModal">Salir <i class="fas fa-fw fa-power-off"></i></span></h4>
                        </a>    
                            <!-- Dropdown - User Information -->
                            
                        </li>
                    </ul>
        </nav>

         <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Desea cerrar sesión ?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Seleccione "Salir" si quiere cerrar sesión.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary" href="../login.html">Salir</a>
        </div>
      </div>
    </div>
  </div>

                <div class="container-fluid">
                    <div class="form-wrapper">
                        <div id="wrapper">
                            <div id="content-wrapper" class="d-flex flex-column">
                                <div id="content">
                                    <app-nav></app-nav>
                                    <div class="container-fluid">
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-lg-8">
                                                <div class="p-5">
                                                    <div class="text-left">
                                                        <h1 class="h4 text-gray-900 mb-4">Editar Usuario</h1>
                                                    </div>

                                                    <!--FORMULARIO -->        

                                                    <form class="user" name="Insertar_tipo_usuario" action="" method="post">
                                                    <div class="form-group row">
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <input type="number" class="form-control form-control-user" name="id_usuario" id="id_usuario" placeholder="Código" value="<?php echo $info['id_usuario']; ?>" value="<?= (isset($id_usuario) && !$frm_enviado)?$id_usuario : "" ?>" readonly="disabled" >
                                                            </div>
                                                        </div>
                                                        <span class="text-danger"><?php echo $error_cod; ?></span>
                                                        <div class="form-group row">
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <input type="text" class="form-control form-control-user" name="cedula" id="cedula" placeholder="Cédula" value="<?php echo $info['cedula']; ?>" value="<?= (isset($cedula) && !$frm_enviado) ? $cedula : "" ?>">
                                                            </div>
                                                        </div>
                                                        <span class="text-danger"><?php echo $error_desc; ?></span>
                                                        <div class="form-group row">
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <input type="text" class="form-control form-control-user" name="primer_apellido" id="primer_apellido" placeholder="Primer Apellido" value="<?php echo $info['primer_apellido']; ?>" value="<?= (isset($primer_apellido) && !$frm_enviado) ? $primer_apellido : "" ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <input type="text" class="form-control form-control-user" name="segundo_apellido" id="segundo_apellido" placeholder="Segundo Apellido" value="<?php echo $info['segundo_apellido']; ?>" value="<?= (isset($segundo_apellido) && !$frm_enviado) ? $segundo_apellido : "" ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <input type="text" class="form-control form-control-user" name="primer_nombre" id="primer_nombre" placeholder="Primer Nombre" value="<?php echo $info['primer_nombre']; ?>" value="<?= (isset($primer_nombre) && !$frm_enviado) ? $primer_nombre : "" ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <input type="text" class="form-control form-control-user" name="segundo_nombre" id="segundo_nombre" placeholder="Segundo Nombre" value="<?php echo $info['segundo_nombre']; ?>" value="<?= (isset($segundo_nombre) && !$frm_enviado) ? $segundo_nombre : "" ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <input type="text" class="form-control form-control-user" name="direccion" id="direccion" placeholder="Dirección" value="<?php echo $info['direccion']; ?>" value="<?= (isset($direccion) && !$frm_enviado) ? $direccion : "" ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <input type="number" class="form-control form-control-user" name="celular" id="celular" placeholder="Celular" value="<?php echo $info['celular']; ?>" value="<?= (isset($celular) && !$frm_enviado) ? $celular : "" ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <input type="text" class="form-control form-control-user" name="telefono" id="telefono" placeholder="Teléfono" value="<?php echo $info['telefono']; ?>" value="<?= (isset($telefono) && !$frm_enviado) ? $telefono : "" ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <input type="date" class="form-control form-control-user" name="fecha_nacimiento" id="fecha_nacimiento" placeholder="Fecha Nacimiento" value="<?php echo $info['fecha_nacimiento']; ?>" value="<?= (isset($fecha_nacimiento) && !$frm_enviado) ? $fecha_nacimiento : "" ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <input type="text" class="form-control form-control-user" name="correo" id="correo" placeholder="Correo" value="<?php echo $info['correo']; ?>" value="<?= (isset($correo) && !$frm_enviado) ? $correo : "" ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <input type="password" class="form-control form-control-user" name="contrasena" id="contrasena" placeholder="Contraseña" value="<?php echo $info['contrasena']; ?>" value="<?= (isset($contrasena) && !$frm_enviado) ? $contrasena : "" ?>" readonly="disabled">
                                                            </div>
                                                        </div>
                                                        

                                                        <?php
                                                            $conn = mysqli_connect("localhost", "root", "", "minimarketapp");
                                                            $sql = "SELECT p.descripcion, p.cod_perfil, u.cod_perfil FROM perfil p , usuario u where p.cod_perfil = u.cod_perfil";
                                                            /*$sql = "SELECT * FROM perfil";*/
                                                            $result = mysqli_query($conn, $sql);

                                                            ?>
                                                            <div class="form-group row">
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <label for="cod_perfil">Perfil</label>
                                                                <select class="form-control" id="cod_perfil" name="cod_perfil">
                                                                    <?php
                                                                    while ($row = mysqli_fetch_array($result)) {
                                                                        echo '<option value=' . $row['cod_perfil'] . '>' . $row['descripcion'] . '</option>';
                                                                    }
                                                                    ?>
                                                                </select>
                                                                </div>
                                                            </div>

                                                        
                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox">

                                                                <input type="checkbox" class="custom-control-input" id="id_estado" name="id_estado" checked>
                                                                <label class="custom-control-label" for="id_estado">Activo</label>
                                                            </div>
                                                        </div>
                                                        <a href="../usuarios.php" class="btn btn-secondary">
                                                            Cancelar
                                                        </a>


                                                   
                                                        <input type="submit" value="Guardar" class="btn btn-primary sm" name="actualizar_tipo_usuario">
                                                        <hr>
                                                    </form>
                                                    <hr>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Begin Page Content -->

                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; MiniMarket 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>

    <script>
        $(document).ready(function() {
            $('.menu').load('../admin/menu_component.php');
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.nav').load('../admin/nav_component.php');
        });
    </script>

</body>

</html>
