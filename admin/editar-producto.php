<?php
//INCLUIMOS LA CONEXIÓN
include_once("includes/config.php");
$titulo="Editar Producto - Administrador";
//CAPTURAMOS EL VALOR DE ID EN LA URL
$id=$_GET['id'];
//DEFINIMOS LA CONSULTA SELECCIONANDO SÓLO EL REGISTRO AL CUAL SE LE DIÓ CLICK EN EL INDEX.PHP
$consulta_editar="SELECT * FROM Productos WHERE id = $id";
//EJECUTAMOS LA CONSULTA
$resultado=mysqli_query($conexion,$consulta_editar);

//CAPTURAMOS LA INFORMACIÓN DE ESE REGISTRO EN VARIABLES
while($row=mysqli_fetch_assoc($resultado)){
	$id=$row['id'];
	$clave=$row['clave_producto'];
	$nombre=$row['nombre_producto'];
	$descripcion=$row['descripcion_producto'];
	$precio=$row['precio'];
	$categoria=$row['categoria'];
}
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo $titulo; ?></title>
	</head>
	<body>
		<h1><?php echo $titulo; ?></h1>
		
		<!-- FORMULARIO PARA ACTULIZAR INFORMACIÓN DEL PRODUCTO -->
		<form action="includes/actualizar-producto.php" method="POST" enctype="multipart/form-data">
			
			
			<label for="clave_producto">Clave del producto</label>
			<!-- COLOCAMOS UNA ETIQUETA PHP EN LA PROPIEDAD VALUE HACIENDO UN ECHO QUE MUESTRE LA INFORMACIÓN ACTUAL EN LA BASE DE DATOS -->
			<input type="text" name="clave_producto" value="<?php echo $clave; ?>" id="clave_producto"><br>
			
			<label for="nombre_producto">Nombre del producto</label>
			<input type="text" name="nombre_producto" value="<?php echo $nombre; ?>" id="nombre_producto"><br>
			
			<label for="descripcion_producto">Descripcion del producto</label>
			<textarea name="descripcion_producto" id="descripcion_producto"><?php echo $descripcion; ?></textarea><br>
			
			<label for="precio">Precio</label>
			<input type="text" name="precio" value="<?php echo $precio ?>" id="precio"><br>
			
			<label for="categoria">Categoria</label>
			<input type="text" name="id_categoria" value="<?php echo $categoria ?>" id="id_categoria"><br>
		
			<input type="hidden" name="id" value="<?php echo $id; ?>">
		
			<p><input type="submit" value="Actualizar Producto"></p>
		</form>
		
	</body>
</html>