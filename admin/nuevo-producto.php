<?php
$titulo="Nuevo Producto - Administrador";
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo $titulo; ?></title>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
		  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
		  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
		
		<script>
		  $(function() {
		    $( "#fecha_lanzamiento" ).datepicker(
				{
				  showOn: "both",
				  buttonText: "Calendario",
				  dateFormat: "yy-mm-dd",
				  yearRange: "1982:2015",
				  showOtherMonths: true,
				  changeMonth: true,
				  changeYear: true,
				  dayNames: [ "Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado" ],
				  dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
				  monthNamesShort: [ "Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic" ]
				}
		    );
		  });
		  </script>
		
	</head>
	<body>
		<h1><?php echo $titulo; ?></h1>
		
		<form action="includes/insertar-producto.php" method="POST" enctype="multipart/form-data">
			
			<label for="clave_producto">Clave del producto</label>
			<input type="text" name="clave_producto" value="" id="clave_producto"><br>
			
			<label for="nombre_producto">Nombre del producto</label>
			<input type="text" name="nombre_producto" value="" id="nombre_producto"><br>
			
			<label for="fecha_lanzamiento">Fecha de lanzamiento</label>
			<input type="text" name="fecha_lanzamiento" value="" id="fecha_lanzamiento"><br>
			
			<label for="imagen_producto">Portada</label>
			<input type="file" name="imagen_producto" id="imagen_producto"><br>
			
			<label for="descripcion_producto">Descripcion del producto</label>
			<textarea name="descripcion_producto" id="descripcion_producto"></textarea><br>
			
			<label for="precio">Precio</label>
			<input type="text" name="precio" value="" id="precio"><br>
			
		
			
			<label for="categoria">Categoria</label>
			<input type="text" name="categoria" value="" id="categoria"><br>
		
			<p><input type="submit" value="Agregar Producto"></p>
		</form>
		
	</body>
</html>