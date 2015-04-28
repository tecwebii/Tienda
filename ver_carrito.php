<?php
session_start();
$carro = $_SESSION['carro'];
$titulo = "Productos Agregados al carrito";
?>

<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo $titulo; ?></title>
	</head>
	<body>
		<h1><?php echo $titulo; ?></h1>
	<?php if($carro){ ?>
		<table>
			<tr>
				<th>PRODUCTO</th>
				<th>PRECIO</th>
				<th>SKU / CLAVE</th>
				<th>CANTIDAD</th>
				<th>BORRAR</th>
				<th>ACTUALIZAR</th>
				<th></th>
			</tr>
		<?php
		$suma=0;
		 foreach($carro as $campo => $valor){
			//echo "CAMPO :" . $campo . ", Valor: " . $valor . "</br>";
			$subtotal = $valor['precio']* $valor['cantidad'];
			$suma=$suma+$subtotal;
			?>
	<form action="includes/agregar_carrito.php" method="POST">
		<tr>
			<td><?php echo $valor['nombre_producto']; ?></td>
			<td><?php echo $valor['precio']; ?></td>
			<td><?php echo $valor['clave_producto']; ?></td>
			<td><?php echo $valor['cantidad']; ?></td>
			<td><a href="includes/borrar_carrito.php?id=<?php echo $valor['id']; ?>"> X </a></td>
			<td>
			<input type="text" name="cantidad" value="<?php echo $valor['cantidad']; ?>" id="cantidad">
			<input type="hidden" name="id" value="<?php echo $valor['id'] ?>" id="id">
		</td>
		<td><input type="submit" value="Actualizar"></td>
		</tr>
		</form>
		<?php }  ?>
		
		</table>
		
		<div>Total de Artículos: <?php echo count($carro); ?> </div>
		<br>
		<div>Total a Pagar: $<?php echo number_format($suma,2); ?> </div>
		<br>
		<div><a href="index.php">CONTINUAR COMPRANDO</a></div>
		<br>
		<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="POST">
		<!-- COSTO DEL ENVÍO -->
		<input type="hidden" name="shipping" value="0">
		<!-- DEFINE LA LEYENDA AL DE REGRESO AL SITIO -->
		<input type="hidden" name="cbt" value="Presione aquí para volver al sitio www.tienda.com.mx">
		<!-- INDICAMOS EL METODO POR EL CUAL ENVIAMOS LA INFORMACIÓN  1 = GET y 2 = POST -->
		<input type="hidden" name="rm" value="2">
		<!-- INDICAMOS EL NOMBRE DE NUESTRO SITIO -->
		<input type="hidden" name="bn" value="Tienda de peliculas">
		<!-- LA CUENTA DE PAYPAL QUE VA A RECIBIR EL PAGO -->
		<input type="hidden" name="business" value="moises.rojas@leon.uia.mx">
		<!-- INDICAMOS EL CONCEPTO DEL CARGO DEL SERVICIO O PRODUCTOS -->
		<input type="hidden" name="item_name" value="peliculas">
		<!-- INDICAMOS EL TOTAL DE PRODUCTOS EN CARRITO -->
		<input type="hidden" name="item_number" value="<?php echo count($carro); ?>">
		<!-- INDICAMOS EL TOTAL A COBRAR -->
		<input type="hidden" name="amount" value="<?php echo $suma; ?>">
		
		<!-- INDICAMOS LAS VARIABLES PERSONALIZADAS CON LAS QUE VAMOS A TRABAJAR -->
		<input type="hidden" name="custom" value="<?php echo $_SESSION['nombre_usuario']; ?>">
		<!-- INDICAMOS LA DIVISA CON LA QUE VAMOS A COBRAR -->
		<input type="hidden" name="currency_code" value="MXN">
		<!-- INDICAMOS EL LOGOTIPO O IMAGEN PARA PERSONALIZAR LA PÁGINA DE PAYPAL -->
		<input type="hidden" name="image_url" value="">
		<!-- SI EL PAGO ES EXITOSO ENVIAMOS A ESTA PÁGINA -->
		<input type="hidden" name="return" value="http://www.tienda.com.mx/ipn_success.php">
		<!-- SI EL PAGO NO ES EXITOSO ENVIAMOS A ESTA PÁGINA -->
		<input type="hidden" name="cancel_return" value="http://www.tienda.com.mx/ipn_error.php">
		<!-- INDICAMOS SI EL USUARIO PUEDE O NO DEJAR COMENTARIOS NO = 0 SI=1 -->
		<input type="hidden" name="no_note" value="0">
		<!-- INDICAMOS SI EL USUARIO PUEDE O NO SELECCIONAR MÉTODO DE ENVÍO NO = 0 SI=1 -->
		<input type="hidden" name="no_shipping" value="0">
		<!-- INDICAMOS QUE VAMOS A PROCESAR UN PAGO -->
		<input type="hidden" name="cmd" value="_xclick">
		
		<input type="submit" value="FINALIZAR COMPRA">
		</form>
		
	<?php } else{ ?>
		<p> No hay productos seleccionados <a href="index.php">Ver Productos</a></p>
	<?php } ?>
		
	</body>
</html>