<?php
include_once("includes/config.php");
$titulo="Mi tienda - Administrador";
$consulta = "SELECT * FROM productos";
$resultado = mysqli_query($conexion,$consulta);
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo $titulo; ?></title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		
<?php include_once("includes/menu.php"); ?>		
		
		<h1><?php echo $titulo; ?></h1>
		<table>
			<tbody>
		<tr><th>ID</th>
			<th>clave / SKU</th>
			<th>Nombre</th>
			<th>Precio</th>
			<th>Borrar</th>
		</tr>
		
		<?php
		if(mysqli_num_rows($resultado) > 0){
			
			while ($row = mysqli_fetch_assoc($resultado)){
				echo "<tr>";
				echo "<td>" . $row['id'] . "</td>";
				echo "<td>" . $row['clave_producto'] . "</td>";
				echo "<td>" . $row['nombre_producto'] . "</td>";
				echo "<td>" . $row['precio'] . "</td>";
				echo "<td><a href='includes/borrar-producto.php?id=" . $row['id'] . "'> Borrar</a></td>";
				echo "</tr>";
			}
			
		} else{
			
			echo "No hay registros";
		}
		
		?>
			</tbody>
		</table>
		
	</body>
</html>