<?php  
include("../Procesos/control_pedido.php");
$pedido=new pedido;

$lista_pedidos=$pedido->buscar_pedidos();



?>


<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>MiniMarket</title>
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
	<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="../css/font-awesome.css" rel="stylesheet">
	<link href="../css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" type="text/css" href="../css/jquery-ui1.css">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
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
									<a class="nav-stylehead" href="../Formularios/form_pedido.php">Inicio
										<span class="sr-only">(current)</span>
									</a>
								</li>
								<li class="active">
									<a class="nav-stylehead" href="../about.php">Acerca de Nosotros
										<span class="sr-only">(current)</span>
									</a>
								</li>
								<li class="active">
									<a class="nav-stylehead" href="../faqs.php">Preguntas Frecuentes
										<span class="sr-only">(current)</span>
									</a>
								</li>
								<li class="active">
									<a class="nav-stylehead" href="../contact.php">Contáctanos
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
			<h3 class="tittle-w3l">Tus pedidos
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

            <section class="inner-page pt-4">
            <div class="container">
                <p>
                   Aqui encontraras el listado de tus pedidos
                    <div class="col-lg-12">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Codigo de pedido</th>
                                    <th>Fecha </th>
                                    <th>Valor total</th>
                                    <th>Estado actual</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($lista_pedidos as $dato){ ?>
                                <tr>
                                    <td scope="row"><?php echo $dato['cod_pedido'] ; ?></td>
                                    <td><?php echo $dato['fecha_pedido'] ; ?></td>
                                    <td><?php echo $dato['valor_pedido'] ; ?></td>
                                    <td><?php echo $dato['estado'] ; ?></td>
                                </tr>
                                <?php  } ?>
                            </tbody>
                        </table>

                    </div>
                </p>
            </div>

        </section>




		</div>
	</div>


	<!-- //product right -->

	<!-- //top products -->
	<!-- special offers -->
	<div>
		<br>
	</div>										
	<!-- //special offers -->

	<!-- FOOTER -->
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
				document.getElementById("password2").setCustomValidity("La contraseña no coincide");
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
			$('.menu').load('../templates/header.php');
		});
	</script>

	<script>
		$(document).ready(function() {
			$('.footer').load('../templates/footer.php');
		});
	</script>
</body>

</html>