<?php
include("../Procesos/control_pago.php");

$tipo = new consultas;
$lista = $tipo->buscar_tipos();
$carrito = new carrito_pago;



if (isset($_GET['cod_carrito'])) {
	$cod_carrito = $_GET['cod_carrito'];
	$valor_total = $_GET['valor_total'];
	$est=$_GET['est'];
	$id=$_GET['id'];
	$lista_carrito = $carrito->ver_carrito($cod_carrito);
	$lista_n=$tipo->buscar_usuario($id);
	// var_dump($lista);
	$pnombre=$lista_n['primer_nombre'];
	
	$papellido=$lista_n['primer_apellido'];
	$sapellido=$lista_n['segundo_apellido'];
	$direccion=$lista_n['direccion'];


}

if (isset($_POST['pagar'])) {


	$cod_pedido = $_POST['cod_pedido'];
	$fecha_pedido = $_POST['fecha_pedido'];
	$id_usuario = $_POST['id_usuario'];
	$estado_pedido = $_POST['estado_pedido'];
	$medio_pago = $_POST['m_pago'];
	if ($medio_pago==2){
		$estado_pedido="Pagado y tramitando";
	}

	$tipo_cliente = $_POST['tipo_cliente'];
	$banco = $_POST['authorizerId'];

	$valor_con_iva = $valor_total * 1.19;
	//registra el pedido antes de vaciar el carrito

	$carrito->registro_pedido($cod_pedido, $fecha_pedido, $cod_carrito, $id, $valor_con_iva, $estado_pedido,$est);
	$carrito->registro_pago($valor_con_iva, $fecha_pedido, $estado_pedido, $cod_pedido, $medio_pago, $tipo_cliente, $banco);

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
		header("Location: http://localhost/miniMarket/vistas/vista_pedidos.php?id=$id");
}
?>

<!DOCTYPE html>
<html lang="es">

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
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
					<img src="../images/logo2.png" alt=" ">
				</a>
			</h1>
		</div>

		<div class="clearfix"></div>
	</div>



	<!-- CARRITO-->
	<div style="margin-top: -80px; padding: 20px;">
		<div class="top_nav_right">
			<div class="wthreecartaits wthreecartaits2 cart cart box_1">
				<form action="#" method="post" class="last">
					<input type="hidden" name="cmd" value="_cart">
					<input type="hidden" name="display" value="1">

				</form>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>

	<!-- MENU -->
	<div class="menu"></div>









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

					<div class="col-sm-6">

						<div class="form-group">


							<p>Completa la informacion para realizar el pago</p>

							<form action="" method="post"  >

								<div class="form-group">
									<label for="name">Nombres</label>
									<input type="text" name="nombres" class="form-control" id="name" value=<?php  echo $pnombre ; ?> data-rule="minlen:4" data-msg="Please enter at least 4 chars" readonly="disabled" />
									<div class="validate"></div>
								</div>
								<div class="form-group">
									<label for="primer_ap">Primer apellido</label>
									<input type="text" name="primer_ap" class="form-control" id="primer_ap" value=<?php  echo $papellido ; ?> data-rule="minlen:4" data-msg="Please enter at least 4 chars" readonly="disabled" />
									<div class="validate"></div>
								</div>
								<div class="form-group">
									<label for="segundo_ap">Segundo apellido</label>
									<input type="text" name="segundo_ap" class="form-control" id="segundo_ap" value=<?php  echo $sapellido ; ?> data-rule="minlen:4" data-msg="Please enter at least 4 chars" readonly="disabled" />
									<div class="validate"></div>
								</div>
								<div class="form-group">
									<label for="segundo_ap">Direecion de envio</label>
									
									<input type="text" name="segundo_ap" class="" id="direccion" value=<?php  echo $direccion ; ?>  data-msg="Please enter at least 4 chars" readonly="" />
									<div class="validate"></div>
								</div>
								<div class="form-group">
									<label for="segundo_ap">Direecion de envio</label>
									
									<input type="text" name="segundo_ap" class="" id="direccion"   data-msg="Please enter at least 4 chars" readonly="" />
									<div class="validate"></div>
								</div>




								<div class="form-group">
									<label for="fecha_pedido">Fecha</label>

									<input type="text" name="fecha_pedido" class="form-control" id="fecha_pedido" value=<?php echo date("Y") . "-" . date("m") . "-" . date("d");  ?> data-rule="minlen:4" data-msg="Please enter at least 4 chars" readonly="disabled" />
									<div class="validate"></div>
								</div>
								<div class="form-group">


									<label for="m_pago">Medio de pago</label>
									<select class="form-control" name="m_pago" id="m_pago" onchange="ShowSelectedPago();">
										<?php
										foreach ($lista as $dato) {  ?>
											<option value=<?php echo $dato['id_tipo_pago']; ?>><?php echo $dato['descripcion'];
																							} ?></option>
									</select>

								</div>
								<div class="form-group" id="transferencia" style="visibility: hidden;">
									<label for="tipo_cliente">Bancolombia Cta Ahorros - Escanea el CÃ³digo</label>
									
									<img src="../images/QR.png">
								</div>
								<div class="form-group" id="tipoPersona" style="visibility: hidden;">
									<label for="tipo_cliente">Tipo Cliente</label>
									<select class="form-control" name="tipo_cliente" id="tipo_cliente">
										<option value="">Seleccionar</option>
										<option value="natural">Natural</option>
										<option value="juridica">Juridica</option>
									</select>
								</div>
								<div class="form-group" id="banco" style="visibility: hidden;">
									<label for="authorizerId">Entidad financiera autorizadora</label>
									<select type="text" class="form-control" name="authorizerId">
										<option value="">Seleccionar</option>
										<option value="BANCO AGRARIO">BANCO AGRARIO</option>
										<option value="BANCO AV VILLAS">BANCO AV VILLAS</option>
										<option value="BANCO BBVA COLOMBIA S.A.">BANCO BBVA COLOMBIA S.A.</option>
										<option value="BANCO CAJA SOCIAL">BANCO CAJA SOCIAL</option>
										<option value="BANCO COLPATRIA">BANCO COLPATRIA</option>
										<option value="BANCO COOPERATIVO COOPCENTRAL">BANCO COOPERATIVO COOPCENTRAL</option>
										<option value="BANCO CORPBANCA S.A">BANCO CORPBANCA S.A</option>
										<option value="BANCO DAVIVIENDA">BANCO DAVIVIENDA</option>
										<option value="BANCO DE BOGOTA">BANCO DE BOGOTA</option>
										<option value="BANCO DE OCCIDENTE">BANCO DE OCCIDENTE</option>
										<option value="BANCO FALABELLA">BANCO FALABELLA</option>
										<option value="BANCO GNB SUDAMERIS">BANCO GNB SUDAMERIS</option>
										<option value="BANCO PICHINCHA S.A.">BANCO PICHINCHA S.A.</option>
										<option value="BANCO POPULAR">BANCO POPULAR</option>
										<option value="BANCO PROCREDIT">BANCO PROCREDIT</option>
										<option value="BANCOLOMBIA">BANCOLOMBIA</option>
										<option value="BANCOOMEVA S.A.">BANCOOMEVA S.A.</option>
										<option value="CITIBANK">CITIBANK</option>
										<option value="HELM BANK S.A.">HELM BANK S.A.</option>
										<option value="NEQUI">NEQUI</option>
									</select>
								</div>
								<div class="form-group" id="imagen" style="visibility: hidden;">
									<img src="../images/pagos-pse.jpg">
								</div>
						</div>
						<input type="hidden" name="cod_pedido" value=<?php echo "PED-" . $cod_carrito; ?>>
						<input type="hidden" name="id_usuario" value="103451">
						<input type="hidden" name="estado_pedido" value="Tramitando">
						<div class="row-cols-2">
							<button type="submit" class="btn btn-primary" name="pagar">Efectuar pago</button>
							<a href="form_pedido.php?est=<?php echo $est."&id=".$id ?>"><button type="button" class="btn btn-secondary">Cancelar</button></a>
						</div>


						</form>
						

					</div>

					<div class="col-sm-6">
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
												<td><?php echo "$ ".number_format( $dato['valor']); ?></td>


											</tr>
										<?php } ?>
										<tr>
											<td>Sub-total</td>
											<td></td>
											<td><?php echo "$ ". number_format( $valor_total); ?></td>

										</tr>
										<tr>
											<td>Impuestos</td>
											<td>19%</td>
											<td><?php echo "$ ". number_format( $valor_total * 0.19); ?></td>

										</tr>

										<tr>
											<td>Total a pagar</td>
											<td></td>
											<td><?php echo "$ ". number_format($valor_total * 1.19); ?></td>

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
	</div>


	<!-- //product right -->

	<!-- //top products -->
	<!-- FOOTER -->
	<div class="footer"></div>

	<script>
		function ShowSelectedPago() {
			var cod = document.getElementById("m_pago").value;

			if (cod == "2") {
				document.getElementById("tipoPersona").style.visibility = "visible";
				document.getElementById("banco").style.visibility = "visible";
				document.getElementById("imagen").style.visibility = "visible";
				document.getElementById("transferencia").style.visibility = "hidden";
			} else if (cod == "3") {
    			document.getElementById("transferencia").style.visibility = "visible";
				document.getElementById("tipoPersona").style.visibility = "hidden";
				document.getElementById("banco").style.visibility = "hidden";
				document.getElementById("imagen").style.visibility = "hidden";
			} else {
				document.getElementById("tipoPersona").style.visibility = "hidden";
				document.getElementById("banco").style.visibility = "hidden";
				document.getElementById("imagen").style.visibility = "hidden";
				document.getElementById("transferencia").style.visibility = "hidden";
				}

		}
	</script>

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