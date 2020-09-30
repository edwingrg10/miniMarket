<?php session_start(); ?>
<?php include('dbcon.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>MiniMarket</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body style="background-image: url(img/login.png);
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
    overflow: hidden;">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div><img src="img/person.jpg" width="450px" height="490px"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Iniciar Sesión</h1>
                  </div>
                  <form class="user" action="#" method="post">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="user" id="user" required="required" placeholder="Usuario" autofocus required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="pass" id="pass" placeholder="Contraseña" required>
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Recuérdame</label>
                      </div>
                    </div>
                    <center>
                      <?php
                      if (isset($_POST['login'])) {
                        $username = mysqli_real_escape_string($con, $_POST['user']);
                        $password = mysqli_real_escape_string($con, $_POST['pass']);

                        $query     = mysqli_query($con, "SELECT * FROM usuario WHERE  contrasena='$password' and nombreUsuario='$username'");
                        $row    = mysqli_fetch_array($query);
                        $num_row   = mysqli_num_rows($query);

                        if ($num_row > 0) {
                          $_SESSION['idUsuario'] = $row['idUsuario'];
                          if ($row['idPerfil'] == 0) {
                            header('location:home.php');
                          } else if ($row['idPerfil'] == 1) {
                            header('location:vendedor.php');
                          } else if ($row['idPerfil'] == 2) {
                            header('location:client.php');
                          }
                        } else {
                          echo 'Usuario y/o contraseña incorrectos';
                        }
                      }
                      ?>
                    </center><br>
                    <div class="button-panel">
                      <input class="btn btn-primary btn-user btn-block" type="submit" class="button" title="Log In" name="login" value="Iniciar Sesión"></input>
                    </div>
                    <hr>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="#">¿Olvido su contraseña?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="create_account.php">Crea un cuenta</a>
                  </div><br>
                  <div class="text-center">
                    <a class="small" href="index.html">Ir al Inicio</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>