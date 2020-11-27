<?php
include("../Procesos/control_pedido.php");

$est = $_GET['est'];

$product = new pedido;
$carrito = new carrito;
$valor_total = 0;
$lista = $product->buscar_inventario($est);




$lista_carrito = array();
$validacion = $carrito->validar_ult_carrito();
$excede = "";


if ($validacion['estado'] == 1) {
	$cod_carrito = $validacion['cod_carrito'];
} else {
	$carrito->crear_carrito(1);
	$validacion = $carrito->validar_ult_carrito();
	$cod_carrito = $validacion['cod_carrito'];
}


if (isset($_GET['cancelar'])) {
	$lista_carrito = $carrito->ver_carrito($cod_carrito);

	foreach ($lista_carrito as $dato) {

		$cod_producto = $dato['cod_producto'];
		$cantidad_carrito = $dato['cantidad'];
		$disponible = $carrito->disponible_producto($cod_producto, $est);
		//echo ($disponible['cantidad_disponible']) ;
		$nueva_cantidad = $disponible['cantidad_disponible'] + $cantidad_carrito;
		$carrito->actualiza_inventario($cod_producto, $est, $nueva_cantidad);
	}

	$carrito->carrito_cancelar($cod_carrito);
	$lista = $product->buscar_inventario($est);
	$lista_carrito = $carrito->ver_carrito($cod_carrito);
	header("Location: http://localhost/miniMarket/formularios/form_pedido.php?est=$est");
}


$lista_carrito = $carrito->ver_carrito($cod_carrito);

if (isset($_GET['codigo']) && $_GET['cantidad'] != "") {
	$cantidad = $_GET['cantidad'];
	$cod_producto = $_GET['codigo'];
	$precio = $_GET['precio'];
	$disponible = $_GET['disponible'];
	$nombre = $_GET['nombre'];

	$valor = $precio * $cantidad;
	//valida que la cantidad no exceda el disponible
	if ($cantidad <= $disponible) {

		//valida si esta relacion ya existe para actualizarla de lo contrario la agrega nueva
		$contar = $carrito->contar_carrito_producto($cod_carrito, $cod_producto);
		if ($contar == 0) {
			$nueva_cantidad = $disponible - $cantidad;
			$carrito->agregar_a_carrito($cod_carrito, $cod_producto, $cantidad, $valor);
			// echo $cod_producto;
			//actualiza el inventario cada vez que se tome un articulo nuevo
			$carrito->actualiza_inventario($cod_producto, $est, $nueva_cantidad);

			$lista_carrito = $carrito->ver_carrito($cod_carrito);
			$lista = $product->buscar_inventario($est);
			//echo "agregado";
		} else {
			//si ya existe la relacion hay que volver a hacer el calculo de las cantidades

			$lista_carrito = $carrito->ver_carrito_producto($cod_carrito, $cod_producto);

			$cantidad_carrito = $lista_carrito['cantidad'];
			$disponible = $carrito->disponible_producto($cod_producto, $est);
			$nueva_cantidad = $disponible['cantidad_disponible'] + $cantidad_carrito;
			$carrito->actualiza_inventario($cod_producto, $est, $nueva_cantidad);

			$carrito->actualizar_carrito($cod_carrito, $cod_producto, $cantidad, $valor);

			//vuelve y busca el disponible en base de datos para restar lo que esta llevando y actualizar de nuevo el inventario

			$disponible = $carrito->disponible_producto($cod_producto, $est);
			$nueva_cantidad = $disponible['cantidad_disponible'] - $cantidad;

			$carrito->actualiza_inventario($cod_producto, $est, $nueva_cantidad);

			$lista_carrito = $carrito->ver_carrito($cod_carrito);
			$lista = $product->buscar_inventario($est);
			// echo "actualizado";
		}
	} else {

		$excede = "excede la cantidad disponible de " . $nombre;
	}
}





?>

<!DOCTYPE html>
<html lang="es">

<head>
	<title>MiniMarket</title>
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

									<a class="nav-stylehead" href="select_est.php">Establecimientos
										<span class="sr-only">(current)</span>
									</a>
								</li>

								<li class="active">
									<a class="nav-stylehead" href="../index.php">Cerrar sesion
										<span class="sr-only">(current)</span>
									</a>

								</li>


							</ul>
						</div>
					</div>
				</nav>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	<!-- //navigation -->
	<!-- banner -->

	<!-- //banner -->








	<!-- top Products -->
	<div class="">
		<div class="container-fluid">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Nuestros productos
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<!-- product left -->
			<div class="side-bar col-md-2">


				<div class="card w-50">
					<div class="card-header py-2">
						<div class="container-fluid">
							<div class="row">
								<div class="col-6">
									<h3 class="agileits-sear-head">Carrito</h3>

								</div>


							</div>
						</div>
					</div>
					<div class="card-body fluid">
						<table class="table table-sm ">
							<thead>
								<tr>
									<th>Producto</th>
									<th>Cantidad</th>
									<th>Valor</th>

								</tr>
							</thead>
							<tbody>
								<?php
								if (!empty($lista_carrito)) {

									foreach ($lista_carrito as $dato) { ?>
										<tr>
											<td><?php echo $dato['nombre_producto']; ?></td>
											<td><?php echo $dato['cantidad']; ?></td>
											<td><?php echo number_format($valor = $dato['valor']);  ?></td>
											<?php $valor_total = $valor_total + $dato['valor']; ?>
										</tr>

									<?php }
								} else { ?>
									<tr>

										<td>
											<p class="font-italic text-black-50">Carrito Vacío</p>
										</td>
										<td></td>
										<td></td>

									</tr>
								<?php } ?>

								<tr>


									<td>
										<h5 class="agileits-sear-head"><b>Total</b></h5>
									</td>
									<td></td>
									<td><b> <?php echo number_format($valor_total) ?> </b></td>
								</tr>
							</tbody>
						</table>

					</div>
					<div class="card-header py-2">

					</div>

					<div class="card-footer">
						<a href="form_pago.php?cod_carrito=<?php echo $cod_carrito . '&est=' . $est . '&valor_total=' . $valor_total; ?>"><button type="button" class="btn-sm btn-outline-success" <?php if ($valor_total > 0) {
																																																		echo "enabled";
																																																	} else {
																																																		echo "disabled";
																																																	} ?>>Confirmar pedido</button></a>
						<a href="form_pedido.php?cancelar=True&est=<?php echo $est ?>"><button type="button" class="btn-sm btn-outline-danger">Cancelar pedido</button></a>

					</div>

				</div>
				<!-- //price range -->
				<!-- food preference -->

				<!-- //cuisine -->
				<!-- deals -->

				<!-- //deals -->
			</div>

			<!-- PRODUCTOS -->

			<div class="agileinfo-ads-display col-md-9">
				<!-- codigo php aqui controlando filas y columnas -->
				<span class="text-danger"><?php echo $excede; ?></span>
				<?php

				$i = 0;
				while ($i <= (count($lista) - 1)) {
				?>


					<!-- INICIO DE SECCION TABLA -->
					<div class="wrapper">

						<!-- primera fila -->
						<div class="product-sec1">

							<?php

							for ($j = 1; $j <= 4; $j++) {

								if ($i <= count($lista) - 1) {
									$dato = $lista[$i];
									$img = $dato['img'];

							?>

									<!-- columnas -->

									<div class="col-md-3 product-men">
										<div class="men-pro-item simpleCart_shelfItem">
											<div class="men-thumb-item">
												<img src=<?php echo "../images/" . $img; ?> alt="">

											</div>
											<div class="item-info-product ">
												<h4>
													<?php echo $dato['nombre_producto']; ?>
												</h4>
												<h4>

													<?php echo "Disponible " . $dato['cantidad_disponible']; ?>
												</h4>



												<div class="info-product-price">
													<span class="item_price"><?php echo "$ " . number_format($dato['precio_ud']); ?></span>

												</div>
												<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
													<form action="" method="GET">
														<fieldset>

															<?php if ($dato['cantidad_disponible'] > 0) {
																$agotado = False; ?>
																<input type="number" min="0" name="cantidad" id="cantidad" style="width : 60px">
															<?php } else {
																$agotado = True; ?>

																<div class="l">
																	<!-- <strong>Agotado</strong> -->
																	<span class="text-danger">Agotado</span>
																</div>
															<?php } ?>



															<!--<input type="number" min="0" name="cantidad" id="cantidad" style="width : 60px"-->
															<input type="hidden" name="codigo" id="codigo" value=<?php echo $dato['cod_producto'] ?>>

															<input type="hidden" name="precio" id="precio" value=<?php echo $dato['precio_ud'] ?>>

															<input type="hidden" name="nombre" id="nombre" value=<?php echo $dato['nombre_producto'] ?>>

															<input type="hidden" name="disponible" id="disponible" value=<?php echo $dato['cantidad_disponible'] ?>>
															<input type="hidden" name="est" id="est" value=<?php echo $est ?>>
															<?php if ($agotado == False) {
																echo '<a href="form_pedido.php?cod=codigo&cantidad=cantidad&precio=precio&disponible=disponible&nombre=nombre&est=est"> <button class="btn btn-primary"  title="Carrito" ><i class="fa fa-shopping-cart"> </i></button></a>';
															} ?>

														</fieldset>
													</form>
												</div>

											</div>
										</div>
									</div>

							<?php
									$i = $i + 1;
								}
							} ?>
							<div class="clearfix"></div>
						</div>

						<!-- FIN DE LA TABLA -->
					</div>
					<!-- FIN DE SECCION TABLA -->
				<?php } ?>




			</div>
			<!-- //product right -->
		</div>
	</div>
	<!-- //top products -->
	<!-- special offers -->

	<div class="footer"></div>
	<!-- JS -->
	<script src="../js/jquery-2.1.4.min.js"></script>
	<script src="../js/jquery.magnific-popup.js"></script>
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

	<!-- cart-js -->
	<script src="../js/minicart.js"></script>
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
	<script src="..7js/jquery-ui.js"></script>
	<script>
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

		});
	</script>
	<!-- //price range (top products) -->

	<!-- flexisel (for special offers) -->
	<script src="../js/jquery.flexisel.js"></script>
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
		}
	</script>
	<!-- //password-script -->

	<!-- smoothscroll -->
	<!-- <script src="../js/SmoothScroll.min.js"></script> -->
	<!-- //smoothscroll -->

	<!-- start-smooth-scrolling -->
	<script src="../js/move-top.js"></script>
	<script src="../js/easing.js"></script>
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
			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<!-- //smooth-scrolling-of-move-up -->

	<!-- for bootstrap working -->
	<script src="js/bootstrap.js"></script>
	<!-- //for bootstrap working -->

	<!-- // JS  -->

	<!-- IMPORTS -->


	<script>
		$(document).ready(function() {
			$('.footer').load('../templates/footer.php');
		});
	</script>



</body>

</html>