<?php
include("../Procesos/control_pago.php");

$tipo = new consultas;
$lista = $tipo->buscar_tipos();
$carrito = new carrito_pago;
if (isset($_GET['cod_carrito'])) {
	$cod_carrito = $_GET['cod_carrito'];
	$valor_total = $_GET['valor_total'];
	$lista_carrito = $carrito->ver_carrito($cod_carrito);
}

if (isset($_POST['pagar'])) {


	$cod_pedido = $_POST['cod_pedido'];
	$fecha_pedido = $_POST['fecha_pedido'];
	$id_usuario = $_POST['id_usuario'];
	$estado_pedido = $_POST['estado_pedido'];
	$valor_con_iva = $valor_total * 1.19;
	//registra el pedido antes de vaciar el carrito
	$carrito->registro_pedido($cod_pedido, $fecha_pedido, $cod_carrito, $id_usuario, $valor_con_iva, $estado_pedido);
	//actualiza inventario del producto
	// $lista_carrito= $carrito->ver_carrito($cod_carrito);

	// foreach ($lista_carrito as $dato) {

	// 	$cod_producto = $dato['cod_producto'];
	// 	$cantidad = $dato['cantidad'];
	// 	$saldos = $carrito->saldo_producto($cod_producto);
	// 	$saldo = $saldos['cantidad_disponible'];
	// 	//var_dump ($cod_producto);
	// 	$nuevo_saldo = $saldo - $cantidad;

	// 	$carrito->actualiza_inventario($cod_producto, $nuevo_saldo);
	// }

	// cierra el carrito 
	$carrito->carrito_cerrar($cod_carrito);
	header("Location: http://localhost/miniMarket/vistas/vista_pedidos.php");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<title>Grocery Shoppy an Ecommerce Category Bootstrap Responsive Web Template | Home :: w3layouts</title>
	<!--/tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Grocery Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
        Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script>
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--//tags -->
	<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="../css/font-awesome.css" rel="stylesheet">
	<!--pop-up-box-->
	<link href="../css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
	<!--//pop-up-box-->
	<!-- price range -->
	<link rel="stylesheet" type="text/css" href="css/jquery-ui1.css">
	<!-- fonts -->
	<link href="../fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>


	<div class="ban-top">
		<div class="container">
			<div class="agileits-navi_search">
				<form action="#" method="post">
					<select id="agileinfo-nav_search" name="agileinfo_search" required="">
						<option value="">Todas las categorias</option>

					</select>
				</form>
			</div>
			<div class="top_nav_left">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav menu__list">
								<li class="active">
									<a class="nav-stylehead" href="../index.html">Inicio
										<span class="sr-only">(current)</span>
									</a>
								</li>

							</ul>
						</div>
					</div>
				</nav>
			</div>
		</div>
	</div>
	<!-- //navigation -->
	<!-- banner -->

	<!-- //banner -->

	<!-- top Products -->
	<div class="">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Realiza tu pago
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<!-- product left -->

			<!-- PRODUCTOS -->

			<!-- codigo php aqui controlando filas y columnas -->

			<div class="container">

				<div class="row">

					<div class="col-6">

						<div class="form">


							<p>Completa la información para realizar el pago</p>

							<form action="" method="post" role="form" class="php-email-form">

								<div class="form-group">
									<label for="name">Nombres</label>
									<input type="text" name="nombres" class="form-control" id="name" value="JUAN DAVID" data-rule="minlen:4" data-msg="Please enter at least 4 chars" readonly="disabled" />
									<div class="validate"></div>
								</div>
								<div class="form-group">
									<label for="primer_ap">Primer apellido</label>
									<input type="text" name="primer_ap" class="form-control" id="primer_ap" value="DIAZ" data-rule="minlen:4" data-msg="Please enter at least 4 chars" readonly="disabled" />
									<div class="validate"></div>
								</div>
								<div class="form-group">
									<label for="segundo_ap">Segundo apellido</label>
									<input type="text" name="segundo_ap" class="form-control" id="segundo_ap" value="VASQUEZ" data-rule="minlen:4" data-msg="Please enter at least 4 chars" readonly="disabled" />
									<div class="validate"></div>
								</div>
								<div class="form-group">
									<label for="fecha_pedido">Fecha</label>

									<input type="text" name="fecha_pedido" class="form-control" id="fecha_pedido" value=<?php echo date("Y") . "-" . date("m") . "-" . date("d");  ?> data-rule="minlen:4" data-msg="Please enter at least 4 chars" readonly="disabled" />
									<div class="validate"></div>
								</div>
								<div class="form-group">


									<label for="m_pago">Medio de pago</label>
									<select class="form-control" name="m_pago" id="m_pago">
										<?php
										foreach ($lista as $dato) {  ?>

											<option><?php echo $dato['descripcion']; ?></option>
										<?php } ?>

									</select>

									<div class="validate"></div>
								</div>
								<input type="hidden" name="cod_pedido" value=<?php echo "PED-" . $cod_carrito; ?>>
								<input type="hidden" name="id_usuario" value="103451">
								<input type="hidden" name="estado_pedido" value="Tramitando">
								<div class="row-cols-2">
									<button type="submit" class="btn btn-primary" name="pagar">Efectuar pago</button>
									<a href="form_pedido.php"><button type="button" class="btn btn-secondary" >Cancelar pago</button></a>
								</div>


							</form>

						</div>

					</div>

					<div class="col-6">
						<div class="card">


							<div class="card-body">
								<div calss="container">

									<div class="row">
										<div class="col-9">
											<h4 class="card-title">Pedido No.</h4><br>

										</div>
										<div class="col-3">

											<h4 class="card-title"><?php echo "PED-" . $cod_carrito; ?></h4>
										</div>

									</div>

								</div>



								<div class="form-group">
									<table class="table">
										<thead>
											<tr>
												<th>Producto</th>
												<th>Cantidad</th>
												<th>Valor total</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($lista_carrito as $dato) { ?>
												<tr>
													<td scope="row"><?php echo $dato['nombre_producto']; ?></td>
													<td><?php echo $dato['cantidad']; ?></td>
													<td><?php echo $dato['valor']; ?></td>


												</tr>
											<?php } ?>
											<tr>
												<td>Sub-total</td>
												<td></td>
												<td><?php echo $valor_total; ?></td>

											</tr>
											<tr>
												<td>Impuestos</td>
												<td>19%</td>
												<td><?php echo $valor_total * 0.19; ?></td>

											</tr>

											<tr>
												<td>Total a pagar</td>
												<td></td>
												<td><?php echo $valor_total * 1.19; ?></td>

											</tr>
										</tbody>
									</table>


								</div>




							</div>
						</div>


					</div>
				</div>

			</div>




		</div>
	</div>


	<!-- //product right -->

	<!-- //top products -->
	<!-- special offers -->
	<div>
		<br>
	</div>										
	<!-- //special offers -->
	<!-- newsletter -->
	<div class="footer-top">
		<div class="container-fluid">
			<div class="col-xs-8 agile-leftmk">
				<h2>Get your Groceries delivered from local stores</h2>
				<p>Free Delivery on your first order!</p>
				<form action="#" method="post">
					<input type="email" placeholder="E-mail" name="email" required="">
					<input type="submit" value="Subscribe">
				</form>
				<div class="newsform-w3l">
					<span class="fa fa-envelope-o" aria-hidden="true"></span>
				</div>
			</div>
			
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- //newsletter -->
	<!-- footer -->
	<footer>
		<div class="container">
			<!-- footer first section -->
			<p class="footer-main">
				<span>"Grocery Shoppy"</span> Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut
				fugit, sed quia consequuntur
				magni dolores eos qui ratione voluptatem sequi nesciunt.Sed ut perspiciatis unde omnis iste natus error
				sit voluptatem
				accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et
				quasi architecto
				beatae vitae dicta sunt explicabo.
			</p>
			<!-- //footer first section -->
			<!-- footer second section -->
			<div class="w3l-grids-footer">
				<div class="col-xs-4 offer-footer">
					<div class="col-xs-4 icon-fot">
						<span class="fa fa-map-marker" aria-hidden="true"></span>
					</div>
					<div class="col-xs-8 text-form-footer">
						<h3>Track Your Order</h3>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="col-xs-4 offer-footer">
					<div class="col-xs-4 icon-fot">
						<span class="fa fa-refresh" aria-hidden="true"></span>
					</div>
					<div class="col-xs-8 text-form-footer">
						<h3>Free & Easy Returns</h3>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="col-xs-4 offer-footer">
					<div class="col-xs-4 icon-fot">
						<span class="fa fa-times" aria-hidden="true"></span>
					</div>
					<div class="col-xs-8 text-form-footer">
						<h3>Online cancellation </h3>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
			<!-- //footer second section -->
			<!-- footer third section -->
		</div>
	</footer>
	<!-- //footer -->
	<!-- copyright -->
	<div class="copy-right">
		<div class="container">
			<p>© 2017 Grocery Shoppy. All rights reserved | Design by
				<a href="http://w3layouts.com"> W3layouts.</a>
			</p>
		</div>
	</div>
	<!-- //copyright -->

	<!-- js-files -->
	<!-- jquery -->
	<script src="js/jquery-2.1.4.min.js"></script>
	<!-- //jquery -->

	<!-- popup modal (for signin & signup)-->
	<script src="js/jquery.magnific-popup.js"></script>
	<script>
		$(document).ready(function() {
			$('.popup-with-zoom-anim').magnificPopup({
				type: 'inline',
				fixedContentPos: false,
				fixedBgPos: true,
				overflowY: 'auto',
				closeBtnInside: true,
				preloader: false,
				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in'
			});

		});
	</script>
	<!-- Large modal -->
	<!-- <script>
		$('#').modal('show');
	</script> -->
	<!-- //popup modal (for signin & signup)-->

	<!-- cart-js -->
	<script src="js/minicart.js"></script>
	<script>
		paypalm.minicartk
			.render(); //use only unique class names other than paypalm.minicartk.Also Replace same class name in css and minicart.min.js

		paypalm.minicartk.cart.on('checkout', function(evt) {
			var items = this.items(),
				len = items.length,
				total = 0,
				i;

			// Count the number of each item in the cart
			for (i = 0; i < len; i++) {
				total += items[i].get('quantity');
			}

			if (total < 3) {
				alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
				evt.preventDefault();
			}
		});
	</script>
	<!-- //cart-js -->

	<!-- price range (top products) -->
	<script src="js/jquery-ui.js"></script>
	<script>
		//<![CDATA[ 
		$(window).load(function() {
			$("#slider-range").slider({
				range: true,
				min: 0,
				max: 9000,
				values: [50, 6000],
				slide: function(event, ui) {
					$("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
				}
			});
			$("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider(
				"values", 1));

		}); //]]>
	</script>
	<!-- //price range (top products) -->

	<!-- flexisel (for special offers) -->
	<script src="js/jquery.flexisel.js"></script>
	<script>
		$(window).load(function() {
			$("#flexiselDemo1").flexisel({
				visibleItems: 3,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
				responsiveBreakpoints: {
					portrait: {
						changePoint: 480,
						visibleItems: 1
					},
					landscape: {
						changePoint: 640,
						visibleItems: 2
					},
					tablet: {
						changePoint: 768,
						visibleItems: 2
					}
				}
			});

		});
	</script>
	<!-- //flexisel (for special offers) -->

	<!-- password-script -->
	<script>
		window.onload = function() {
			document.getElementById("password1").onchange = validatePassword;
			document.getElementById("password2").onchange = validatePassword;
		}

		function validatePassword() {
			var pass2 = document.getElementById("password2").value;
			var pass1 = document.getElementById("password1").value;
			if (pass1 != pass2)
				document.getElementById("password2").setCustomValidity("Passwords Don't Match");
			else
				document.getElementById("password2").setCustomValidity('');
			//empty string means no validation error
		}
	</script>
	<!-- //password-script -->

	<!-- smoothscroll -->
	<script src="js/SmoothScroll.min.js"></script>
	<!-- //smoothscroll -->

	<!-- start-smooth-scrolling -->
	<script src="js/move-top.js"></script>
	<script src="js/easing.js"></script>
	<script>
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event) {
				event.preventDefault();

				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- //end-smooth-scrolling -->

	<!-- smooth-scrolling-of-move-up -->
	<script>
		$(document).ready(function() {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/
			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<!-- //smooth-scrolling-of-move-up -->

	<!-- for bootstrap working -->
	<script src="js/bootstrap.js"></script>
	<!-- //for bootstrap working -->
	<!-- //js-files -->


</body>