<?php
$usuario_bd="root";
$contra_bd="root";
$nombre_bd="Tienda";
$localhost="localhost";
$conexion=mysqli_connect($localhost,$usuario_bd,$contra_bd,$nombre_bd);

if(!$conexion){
	die("Falló la conexión " . mysqli_connect_error());
}
echo "conexión exitosa";

?>