<?php
include_once("includes/config.php");
$titulo="Editar Producto - Administrador";
$id=$_GET['id'];
$consulta_editar="SELECT * FROM Productos WHERE id = $id";
$resultado=mysqli_query($conexion,$consulta_editar);

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
		
		<form action="includes/actualizar-producto.php" method="POST">
			
			<label for="clave_producto">Clave del producto</label>
			<input type="text" name="clave_producto" value="<?php echo $clave; ?>" id="clave_producto"><br>
			
			<label for="nombre_producto">Nombre del producto</label>
			<input type="text" name="nombre_producto" value="<?php echo $nombre; ?>" id="nombre_producto"><br>
			
			<label for="descripcion_producto">Descripcion del producto</label>
			<textarea name="descripcion_producto" id="descripcion_producto"><?php echo $descripcion; ?></textarea><br>
			
			<label for="precio">Precio</label>
			<input type="text" name="precio" value="<?php echo $precio ?>" id="precio"><br>
			
			<label for="categoria">Categoria</label>
			<input type="text" name="categoria" value="<?php echo $categoria ?>" id="categoria"><br>
		
			<input type="hidden" name="id" value="<?php echo $id; ?>">
		
			<p><input type="submit" value="Actualizar Producto"></p>
		</form>
		
	</body>
</html>