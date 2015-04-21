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
		<p>Si tienes productos</p>
		<?php echo $carro[1]['nombre_producto'];
		
	<?php } else{ ?>
		<p> No hay productos seleccionados <a href="index.php">Ver Productos</a></p>
	<?php } ?>
		
	</body>
</html>