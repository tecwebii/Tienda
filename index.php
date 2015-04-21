<?php
include_once("admin/includes/config.php");
$consulta_productos = "SELECT nombre_producto FROM Productos GROUP BY nombre_producto";
$resultado_productos = mysqli_query($conexion, $consulta_productos);
$titulo = "Mi tienda de peliculas";

$arreglo = array();

while ($row = mysqli_fetch_assoc($resultado_productos)){
	array_push($arreglo, $row['nombre_producto']);
}

$total_resultados = mysqli_num_rows($resultado_productos);
//echo $arreglo[2];

for ($i=0; $i < $total_resultados; $i++){
	$sugerencias = $sugerencias . "'" . $arreglo[$i] . "',";
}
//echo $sugerencias;
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo $titulo; ?></title>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
		  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
		  <script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
		<script>
		  $(function() {
		    var availableTags = [
		     <?php echo $sugerencias; ?>
		    ];
		    $( "#palabra_clave" ).autocomplete({
		      source: availableTags
		    });
		  });
		  </script>
	</head>
	<body>
		<h1><?php echo $titulo; ?></h1>
		
		<div id="login"> 
		<?php include_once("includes/login.php"); ?>
		</div>
		
		<form action="buscador.php" method="GET">
			<input type="text" name="palabra_clave" id="palabra_clave" placeholder="Busco...">
			<input type="submit" value="Buscar">
		</form>
		
		<h3>PRODUCTOS DESTACADOS</h3>
		<div id="destacado"> 
		<?php include_once("includes/destacados.php"); ?>
		</div>
		
	</body>
</html>