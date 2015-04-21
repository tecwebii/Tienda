<?php
session_start();
include_once("../admin/includes/config.php");
$consulta_destacados= "SELECT * FROM productos WHERE destacado = 1";
$resultado = mysqli_query($conexion,$consulta_destacados);

while ($row = mysqli_fetch_assoc($resultado)){
	echo "<div>" . $row['nombre_producto'] . "</div>";
	//MOSTRAMOS EL BOTÓN DE AGREGAR A CARRITO

	if(isset($_SESSION['nombre_usuario'])){
	echo "<a href='includes/agregar_carrito.php?id=".$row['id']."'>Agregar a carrito</a>";
	}

}
?>