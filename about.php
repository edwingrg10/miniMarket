<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>MiniMarket</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Grocery Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/font-awesome.css" rel="stylesheet">
	<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/jquery-ui1.css">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
</head>

<body>
	<!-- LOGO E INGRESO-->
	<div class="header-bot">
		<div class="col-md-4 logo_agile">
			<h1>
				<span>M</span>ini
				<span>M</span>arket
				<span>App</span>
				<a href="index.html">
					<img src="images/logo2.png" alt=" ">
				</a>
			</h1>
		</div>
		<div class="header">
			<ul>
				<li>
					<a href="login.html">
						<span class="fa fa-unlock-alt"></span> Iniciar Sesión </a>
				</li>
				<li>
					<a href="#" data-toggle="modal" data-target="#myModal2">
						<span class="fa fa-pencil-square-o"></span> Registrarse </a>
				</li>
			</ul>
		</div>
		<div class="clearfix"></div>
	</div>

	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body modal-body-sub_agile">
					<div class="main-mailposi">
						<span class="fa fa-envelope-o" aria-hidden="true"></span>
					</div>
					<div class="modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Regístrate</h3>
						<p>
							<h4 class="agileinfo_sign">Vamos ! ... Crea tu cuenta.</h4>
						</p>
						<form action="Crear_Cuenta.php" method="post">
							<div class="styled-input agile-styled-input-top">
								<input type="text" name="cedula" placeholder="Cedula" required>
							</div>
							<div class="styled-input">
								<input type="text" name="primer_apellido" placeholder="Primer Apellido" required>
							</div>
							<div class="styled-input">
								<input type="text" name="segundo_apellido" placeholder="Segundo Apellido" required>
							</div>
							<div class="styled-input">
								<input type="text" name="primer_nombre" placeholder="Primer Nombre" required>
							</div>
							<div class="styled-input">
								<input type="text" name="segundo_nombre" placeholder="Segundo Nombre">
							</div>
							<div class="styled-input">
								<input type="text" name="direccion" placeholder="Dirección" required>
							</div>
							<div class="styled-input">
								<input type="text" name="celular" placeholder="Celular" required>
							</div>
							<div class="styled-input">
								<input type="text" name="telefono" placeholder="Teléfono" required>
							</div>
							<div class="styled-input">
								<label for="">Fecha Nacimiento</label>
								<input type="date" name="fecha_nacimiento" placeholder="Fecha Nacimiento" required>
							</div>
							<div class="styled-input">

							</div>
							<div class="styled-input">

							</div>
							<div class="styled-input">
								<input type="email" name="correo" aria-describedby="emailHelp" placeholder="Correo Electronico" required="">
							</div>
							<div class="styled-input">
								<input type="password" name="contrasena" placeholder="Contraseña" required>
							</div>
							<div class="styled-input">
								<input type="text" name="id_perfil" placeholder="Perfil" required>
							</div>

							<input type="submit" value="Crear Cuenta">
						</form>

					</div>
				</div>
			</div>
			<!-- //Modal content-->
		</div>
	</div>

	<!-- IMPORTANDO HEADER -->
	<div class="menu"></div>

	<!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="index.html">INICIO</a>
						<i>|</i>
					</li>
					<li>Acerca de nosotros</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->

	<!-- welcome -->
	<div class="welcome">
		<div class="container">
			<h3 class="tittle-w3l">Welcome to our Site
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<div class="w3l-welcome-info">
				<div class="col-sm-6 col-xs-6 welcome-grids">
					<div class="welcome-img">
						<img src="images/about.jpg" class="img-responsive zoom-img" alt="">
					</div>
				</div>
				<div class="col-sm-6 col-xs-6 welcome-grids">
					<div class="welcome-img">
						<img src="images/about2.jpg" class="img-responsive zoom-img" alt="">
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="w3l-welcome-text">
				<p>Nam libero tempore cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime
					placeat facere possimus
					omnis optio cumque nihil impedit quo minus id quod maxime placeat facere possimus.Sed ut
					perspiciatis unde omnis iste
					natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab
					illo inventore veritatis
					et quasi architecto beatae vitae </p>
				<p>libero tempore cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime
					placeat facere possimus
					omnis optio cumque nihil impedit </p>
			</div>
		</div>
	</div>
	<!-- //welcome -->

	<!-- video -->
	<div class="about">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Our Video
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<div class="about-tp">
				<div class="col-md-8 about-agileits-w3layouts-left">
					<iframe src="https://player.vimeo.com/video/15520702?color=ffffff&title=0&byline=0"></iframe>
				</div>
				<div class="col-md-4 about-agileits-w3layouts-right">
					<div class="img-video-about">
						<img src="images/videoimg2.png" alt="">
					</div>
					<h4>Grocery Shoppy</h4>
					<p>No.1 Leading E-commerce marketplace with over 70 million Products</p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!-- //video-->

	<!-- IMPORTANDO FOOTER -->
	<div class="footer"></div>


	<script src="js/jquery-2.1.4.min.js"></script>

	<!-- for bootstrap working -->
	<script src="js/bootstrap.js"></script>

	<!--IMPORTANDO COMPONENTES-->
	<script>
		$(document).ready(function() {
			$('.menu').load('./templates/header.html');
		});
	</script>

	<script>
		$(document).ready(function() {
			$('.footer').load('./templates/footer.php');
		});
	</script>

</body>

</html>