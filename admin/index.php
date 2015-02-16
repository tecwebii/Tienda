<?php
//INCLUIMOS LA CONEXIÓN A LA BASE DE DATOS
include_once("includes/config.php");
$titulo="Mi tienda - Administrador";

//PAGINACIÓN - DEFINIMOS EL LIMITE DE REGISTROS
$limite_registro=3;
//PAGINACIÓN - LEEMOS EL VALOR DE "PAGINA" EN LA URL
$pagina=$_GET['pagina'];
// SI EXISTE EL VALOR EN LA URL (?pagina=) ENTONCES CALCULAMOS EL NÚMERO DE REGISTRO A PARTIR DEL CUAL EMPEZARÁ A MOSTRARL
if (isset($_GET['pagina'])){
	$inicio= ($pagina - 1) * $limite_registro;
} else {
	//SI NO ENTONCES DEFINIMOS VALORES POR DEFECTO
$inicio=0;
$pagina=1;
}
//DEFINIMOS LA CONSULTA EN BASE A LOS VALORES DE INICIO Y EL LIMITE DE REGISTROS
$consulta = "SELECT * FROM productos LIMIT $inicio, $limite_registro";
//PAGINACIÓN - EJECUTAMOS LA CONSULTA ANTERIOR
$resultado = mysqli_query($conexion,$consulta);
//PAGINACIÓN - DEFINIMOS Y EJECUTAMOS LA CONSULTA PARA SABER CUANTOS REGISTROS TENEMOS EN LA BASE
$consulta_total = mysqli_query($conexion,"SELECT * FROM productos");
//PAGINACIÓN - ALMACENAMOS EN UNA VARIABLE EL TOTAL DE REGISTROS ENCONTRADOS
$total_registros = mysqli_num_rows($consulta_total);
//PAGINACIÓN - ALMACENAMOS EN UNA VARIABLE EL TOTAL DE PAGINAS REDONDEANDO AL NÚMERO ENTERO SUPERIOR EL RESULTADO DEL TOTAL REGISTROS ENTRE LIMITE DE REGISTROS
$paginas_totales =  ceil($total_registros/$limite_registro);


//echo "Pagina: " . $pagina . "<br/>";
//echo "Inicio: " . $inicio . "<br/>";
//echo "Límite de registros: " . $limite_registro . "<br/>";
//echo "Total de registros: " . $total_registros . "<br/>";
//echo "Paginas totales : " . $paginas_totales . "<br/>";


?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo $titulo; ?></title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>


<?php
//INCLUIMOS EL MENÚ
include_once("includes/menu.php");
?>		
		
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
		//SI EL RESULTADO DE LA CONSULTA ES MAYOR A 0 ENTONCES EJECTUAMOS LA FUNCIÓN WHILE
		if(mysqli_num_rows($resultado) > 0){
			//MIENTRAS EL ARREGLO "$RESULTADO" TENGA ELEMENTOS, REPETIRÁ EL CICLO WHILE
			while ($row = mysqli_fetch_assoc($resultado)){
				echo "<tr>";
				echo "<td>" . $row['id'] . "</td>";
				echo "<td>" . $row['clave_producto'] . "</td>";
				echo "<td><a href='editar-producto.php?id=" . $row['id'] . "'>" . $row['nombre_producto'] . "</a></td>";
				echo "<td>" . $row['precio'] . "</td>";
				//ALMACENAMOS EL ID DEL REGISTRO EN CURSO PARA HACER UNA SEGUNDA CONSULTA
				$id_producto = $row['id'];
				//HACEMOS UNA CONSULTA A DOS TABLAS UNIENDOLAS A TRAVÉS DE INNER JOIN
				$consulta_categoria = "SELECT id_categoria, id_cat, nombre_categoria
				FROM Categorias 
				INNER JOIN Productos
				ON id_cat = id_categoria 
				WHERE id = '$id_producto'";
				//EJECUTAMOS LA CONSULTA
				$resultado_categoria = mysqli_query($conexion, $consulta_categoria );
				//MOSTRAMOS LAS CATEGORÍAS ENCONTRADAS A TRAVÉS DE OTRO WHILE
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
		// PAGINACIÓN - MOSTRAMOS A TRAVÉS DE UN CICLO WHILE EL NÚMERO DE PÁGINAS CALCULADO
		for($i=1; $i<$paginas_totales+1; $i++){
			// SI EL VALOR DE $i ES IGUAL AL VALOR DE LA VARIABLE $PAGINA (tomado de la URL) ENTONCES SÓLO SE MUESTRA EL NÚMERO DE LA PÁGINA
			if ($i == $pagina){
			 echo "<strong>" . $i . "</strong>";	
			}else{
				//SI NO ENTONCES LO HACEMOS LINK
			echo "<a href='index.php?pagina=" . $i . "'>" . $i . "</a>";
			}
		}
		
		?>
		
	</body>
</html>