<?php
include_once("admin/includes/config.php");
$palabra_clave = $_GET['palabra_clave'];
$categoria_selecciona =  $_GET['categoria_clave'];

$consulta_busqueda="SELECT * FROM Productos WHERE nombre_producto LIKE '%" . $palabra_clave . "%'";

//$consulta_busqueda="SELECT * FROM Productos INNER JOIN Relacion_producto_categoria ON id = id_producto WHERE id_categoria = '$categoria_seleccionada' AND nombre_producto LIKE '%" . $palabra_clave . "%'";


$resultado= mysqli_query($conexion, $consulta_busqueda);
?>

<h3> Resultado de tu búsqueda</h3>

<?php while ($row = mysqli_fetch_assoc($resultado)){
	echo "<div>" . $row['nombre_producto'] . "</div>";
} ?>