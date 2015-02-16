<?php
//DEFINIMOS LA INFORMACIÓN CON LA CUAL NOS CONECTAREMOS A LA BASE DE DATOS
$usuario_bd="root";
$contra_bd="root";
$nombre_bd="Tienda";
$localhost="localhost";
//EJECUTAMOS LA CONEXIÓN
$conexion=mysqli_connect($localhost,$usuario_bd,$contra_bd,$nombre_bd);
//SI LA CONEXIÓN FALLA ENTONCES MOSTRAMOS UN MENSAJE INDICANDO DONDE ESTA EL ERROR
if(!$conexion){
	die("Falló la conexión " . mysqli_connect_error());
}
//echo "conexión exitosa";
?>