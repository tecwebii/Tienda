<?php
//INCLUIMOS LA CONEXIÓN A LA BASE DE DATOS
include_once("includes/config.php");
$titulo="Mi tienda - Administrador";

//PAGINACIÓN - DEFINIMOS EL LIMITE DE REGISTROS
$limite_registro=3;
//PAGINACIÓN - LEEMOS EL VALOR DE "PAGINA" EN LA URL
$pagina=$_GET['pagina'];
// SI EXISTE EL VALOR EN LA URL (?pagina=) ENTONCES CALCULAMOS EL NÚMERO DE REGISTRO A PARTIR DEL CUAL EMPEZARÁ A MOSTRAR
if (isset($_GET['pagina'])){
	$inicio= ($pagina - 1) * $limite_registro;
} else {
	//SI NO ENTONCES DEFINIMOS VALORES POR DEFECTO
$inicio=0;
$pagina=1;
}
//DEFINIMOS LA CONSULTA EN BASE A LOS VALORES DE INICIO Y EL LIMITE DE REGISTROS
$consulta = "SELECT * FROM contactos LIMIT $inicio, $limite_registro";
//PAGINACIÓN - EJECUTAMOS LA CONSULTA ANTERIOR
$resultado = mysqli_query($conexion,$consulta);
//PAGINACIÓN - DEFINIMOS Y EJECUTAMOS LA CONSULTA PARA SABER CUANTOS REGISTROS TENEMOS EN LA BASE
$consulta_total = mysqli_query($conexion,"SELECT * FROM contactos");
//PAGINACIÓN - ALMACENAMOS EN UNA VARIABLE EL TOTAL DE REGISTROS ENCONTRADOS
$total_registros = mysqli_num_rows($consulta_total);
//PAGINACIÓN - ALMACENAMOS EN UNA VARIABLE EL TOTAL DE PAGINAS REDONDEANDO AL NÚMERO ENTERO SUPERIOR EL RESULTADO DEL TOTAL REGISTROS ENTRE LIMITE DE REGISTROS
$paginas_totales =  ceil($total_registros/$limite_registro);


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
			<th>Nombre</th>
			<th>Asunto</th>
			<th>Correo</th>
			<th>Mensaje</th>
		</tr>
		
		<?php
		//SI EL RESULTADO DE LA CONSULTA ES MAYOR A 0 ENTONCES EJECTUAMOS LA FUNCIÓN WHILE
		if(mysqli_num_rows($resultado) > 0){
			//MIENTRAS EL ARREGLO "$RESULTADO" TENGA ELEMENTOS, REPETIRÁ EL CICLO WHILE
			while ($row = mysqli_fetch_assoc($resultado)){
				echo "<tr>";
				echo "<td>" . $row['id'] . "</td>";
				echo "<td>" . $row['nombre_completo'] . "</td>";
				echo "<td>" . $row['asunto'] . "</td>";
				echo "<td>" . $row['correo'] . "</td>";
				echo "<td>" . $row['mensaje'] . "</td>";
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
			echo "<a href='index_contacto.php?pagina=" . $i . "'>" . $i . "</a>";
			}
		}
		
		?>
		
	</body>
</html>