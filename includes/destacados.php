<?php
include_once("../admin/includes/config.php");
$consulta_destacados= "SELECT * FROM productos WHERE destacado = 1";
$resultado = mysqli_query($conexion,$consulta_destacados);

while ($row = mysqli_fetch_assoc($resultado)){
	echo "<div>" . $row['nombre_producto'] . "</div>";
}
?>