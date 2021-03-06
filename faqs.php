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
				<a href="index.php">
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
								<input type="text" name="cedula" placeholder="Cédula" required>
							</div>
							<div class="styled-input">
								<input type="text" name="primer_nombre" placeholder="Primer Nombre" required>
							</div>
							<div class="styled-input">
								<input type="text" name="segundo_nombre" placeholder="Segundo Nombre">
							</div>
							<div class="styled-input">
								<input type="text" name="primer_apellido" placeholder="Primer Apellido" required>
							</div>
							<div class="styled-input">
								<input type="text" name="segundo_apellido" placeholder="Segundo Apellido" required>
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
								<input type="email" name="correo" aria-describedby="emailHelp" placeholder="Correo electrónico" required="">
							</div>
							<div class="styled-input">
								<input type="password" name="contrasena" placeholder="Contraseña" required>
							</div>

							<?php
							$conn = mysqli_connect("localhost", "root", "", "minimarketapp");
							$sql = "SELECT * FROM perfil";
							$result = mysqli_query($conn, $sql);

							?>

							<div class="form-group">
								<label for="cod_perfil">Perfil</label>
								<select class="form-control" id="cod_perfil" name="cod_perfil">
									<?php
									while ($row = mysqli_fetch_array($result)) {
										echo '<option value=' . $row['cod_perfil'] . '>' . $row['descripcion'] . '</option>';
									}
									?>
								</select>
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
						<a href="index.php">INICIO</a>
						<i>|</i>
					</li>
					<li>PREGUNTAS FRECUENTES</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- FAQ-help-page -->
	<div class="faqs-w3l">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Preguntas Frecuentes
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<h3 class="w3-head">Preguntas para nuestros vendedores</h3>
			<p>Puedes ingresar a responder nuestra encuentra aquí, <a href="https://docs.google.com/forms/d/e/1FAIpQLSeToPOJtBNP_eBbQbrZZGL1g8APuMOplgmo71_cEi-crEVtcg/viewform" target="_blank">Encuesta vendedor</a> ayudanos a crecer.</p>
			<div class="faq-w3agile">
				<ul class="faq">
					<li class="item1">
						<a href="#" title="click here">¿Realiza ventas a domicilio? </a>
						<ul>
							<li class="subitem1">
								<img src="images/preguntas/1.PNG">
							</li>
						</ul>
					</li>
					<li class="item2">
						<a href="#" title="click here">¿Por qué medio le solicitan los productos? </a>
						<ul>
							<li class="subitem1">
								<img src="images/preguntas/2.PNG">
							</li>
						</ul>
					</li>
					<li class="item3">
						<a href="#" title="click here">¿Cuál es el método de entrega de los productos a domicilio?</a>
						<ul>
							<li class="subitem1">
								<img src="images/preguntas/3.PNG">
							</li>
						</ul>
					</li>
					<li class="item4">
						<a href="#" title="click here">¿Estaría usted interesado en realizar sus ventas por
							internet?</a>
						<ul>
							<li class="subitem1">
								<img src="images/preguntas/4.PNG">
							</li>
						</ul>
					</li>
					<li class="item5">
						<a href="#" title="click here">¿Cuál de las siguientes aplicaciones conoce para el servicio de
							domicilios?</a>
						<ul>
							<li class="subitem1">
								<img src="images/preguntas/5.PNG">
							</li>
						</ul>
					</li>
					<li class="item6">
						<a href="#" title="click here">¿Sabe usted manejar un computador?</a>
						<ul>
							<li class="subitem1">
								<img src="images/preguntas/6.PNG">
							</li>
						</ul>
					</li>
					<li class="item7">
						<a href="#" title="click here">¿Qué herramienta utiliza para el control de inventario de su
							establecimiento?</a>
						<ul>
							<li class="subitem1">
								<img src="images/preguntas/7.PNG">
							</li>
						</ul>
					</li>
				</ul>
			</div><br>
			<h3 class="w3-head">Preguntas para nuestros clientes</h3>
			<p>Puedes ingresar a responder nuestra encuentra aquí, <a href="https://docs.google.com/forms/d/e/1FAIpQLSewHYKG9TmmJdvFssTn6WKcngH28kOScd4H83n7GDUXu1RsqA/viewform" target="_blank">Encuesta cliente</a> ayudanos a crecer.</p>
			<div class="faq-w3agile">
				<ul class="faq">
					<li class="item1">
						<a href="#" title="click here">¿Qué método prefiere al momento de realizar compras? </a>
						<ul>
							<li class="subitem1">
								<img src="images/preguntas/8.PNG">
							</li>
						</ul>
					</li>
					<li class="item2">
						<a href="#" title="click here">¿Si usted decide realizar compras a domicilio que método
							utilizaría?</a>
						<ul>
							<li class="subitem1">
								<img src="images/preguntas/9.PNG">
							</li>
						</ul>
					</li>
					<li class="item3">
						<a href="#" title="click here">¿Qué dificultades encuentra usted en los pedidos a domicilio como
							lo realiza actualmente?</a>
						<ul>
							<li class="subitem1">
								<img src="images/preguntas/10.PNG">
							</li>
						</ul>
					</li>
					<li class="item4">
						<a href="#" title="click here">¿Cuál de las siguientes aplicaciones conoce para el servicio de
							domicilios?</a>
						<ul>
							<li class="subitem1">
								<img src="images/preguntas/11.PNG">
							</li>
						</ul>
					</li>
					<li class="item5">
						<a href="#" title="click here">¿Estaría usted interesado en realizar sus pedidos a domicilio por
							medio de una aplicación web que reemplace las existentes?</a>
						<ul>
							<li class="subitem1">
								<img src="images/preguntas/12.PNG">
							</li>
						</ul>
					</li>
					<li class="item6">
						<a href="#" title="click here">¿Qué medio de pago preferiría utilizar para los domicilios?</a>
						<ul>
							<li class="subitem1">
								<img src="images/preguntas/13.PNG">
							</li>
						</ul>
					</li>
					<li class="item7">
						<a href="#" title="click here">¿Cuál es su dispositivo de preferencia para realizar pedidos a
							domicilio?</a>
						<ul>
							<li class="subitem1">
								<img src="images/preguntas/14.PNG">
							</li>
						</ul>
					</li>

					<li class="item8">
						<a href="#" title="click here">¿Qué tiempo considera razonable para la entrega de un pedido a
							domicilio?</a>
						<ul>
							<li class="subitem1">
								<img src="images/preguntas/15.PNG">
							</li>
						</ul>
					</li>

					<li class="item9">
						<a href="#" title="click here">¿Cuánto estaría dispuesto a pagar por el servicio a
							domicilio?</a>
						<ul>
							<li class="subitem1">
								<img src="images/preguntas/16.PNG">
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //FAQ-help-page -->

	<!-- IMPORTANDO FOOTER -->
	<div class="footer"></div>


	<!-- jquery -->
	<script src="js/jquery-2.1.4.min.js"></script>
	<!-- //jquery -->

	<!-- script for tabs -->
	<script>
		$(function() {

			var menu_ul = $('.faq > li > ul'),
				menu_a = $('.faq > li > a');

			menu_ul.hide();

			menu_a.click(function(e) {
				e.preventDefault();
				if (!$(this).hasClass('active')) {
					menu_a.removeClass('active');
					menu_ul.filter(':visible').slideUp('normal');
					$(this).addClass('active').next().stop(true, true).slideDown('normal');
				} else {
					$(this).removeClass('active');
					$(this).next().stop(true, true).slideUp('normal');
				}
			});

		});
	</script>
	<!-- script for tabs -->

	<!-- for bootstrap working -->
	<script src="js/bootstrap.js"></script>

	<!--IMPORTANDO COMPONENTES-->
	<script>
		$(document).ready(function() {
			$('.menu').load('./templates/header.php');
		});
	</script>

	<script>
		$(document).ready(function() {
			$('.footer').load('./templates/footer.php');
		});
	</script>
</body>

</html>