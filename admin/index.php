<?php
include_once("includes/config.php");
$titulo="Mi tienda - Administrador";

$limite_registro=3;
$pagina=$_GET['pagina'];

if (isset($_GET['pagina'])){
	$inicio= ($pagina - 1) * $limite_registro;
} else {
$inicio=0;
$pagina=1;
}

$consulta = "SELECT * FROM productos LIMIT $inicio, $limite_registro";
$resultado = mysqli_query($conexion,$consulta);

$consulta_total = mysqli_query($conexion,"SELECT * FROM productos");
$total_registros = mysqli_num_rows($consulta_total);

$paginas_totales =  ceil($total_registros/$limite_registro);

echo "Pagina: " . $pagina . "<br/>";
echo "Inicio: " . $inicio . "<br/>";
echo "Límite de registros: " . $limite_registro . "<br/>";
echo "Total de registros: " . $total_registros . "<br/>";
echo "Paginas totales : " . $paginas_totales . "<br/>";


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
			<th>Categoria</th>
			<th>Borrar</th>
		</tr>
		
		<?php
		if(mysqli_num_rows($resultado) > 0){
			
			while ($row = mysqli_fetch_assoc($resultado)){
				echo "<tr>";
				echo "<td>" . $row['id'] . "</td>";
				echo "<td>" . $row['clave_producto'] . "</td>";
				echo "<td><a href='editar-producto.php?id=" . $row['id'] . "'>" . $row['nombre_producto'] . "</a></td>";
				echo "<td>" . $row['precio'] . "</td>";
				$id_producto = $row['id'];
				$consulta_categoria = "SELECT id, id_categoria, id_cat, nombre_categoria
				FROM Categorias 
				INNER JOIN Productos
				ON id_cat = id_categoria 
				WHERE id = '$id_producto'";
				$resultado_categoria = mysqli_query($conexion, $consulta_categoria );
				while ($row2 = mysqli_fetch_assoc($resultado_categoria)){
				echo "<td>" . $row2['nombre_categoria'] . "</td>";
				}
				echo "<td><a href='includes/borrar-producto.php?id=" . $row['id'] . "'> Borrar</a></td>";
				echo "</tr>";
			}
			
		} else{
			
			echo "No hay registros";
		}
		
		?>
			</tbody>
		</table>
		
		<?php
		for($i=1; $i<$paginas_totales+1; $i++){
			if ($i == $pagina){
			 echo "<strong>" . $i . "</strong>";	
			}else{
			echo "<a href='index.php?pagina=" . $i . "'>" . $i . "</a>";
			}
		}
		
		?>
		
	</body>
</html>