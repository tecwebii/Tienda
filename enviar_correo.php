<?php
include_once("admin/includes/config.php");
	 = $_POST['correo'];
$nombre = $_POST['nombre'];
$asunto = $_POST['asunto'];
$msg = $_POST['mensaje'];
$msg_html = "<h1> Nueva petición de contacto </h1>
	<br>
	<p>".$_POST['nombre']." escribió:</p>
	<p>" . $_POST['mensaje'] . "</p>";
$cabeceras = "From: no-reply@mitienda.com";
if (mail($para,$asunto,$msg_html, $cabeceras)){
	echo "Mensaje enviado exitosamente";
	$consulta_insertar = "INSERT INTO contactos (nombre_completo,asunto,correo,mensaje) VALUES ('$nombre','$asunto','$para','$msg')";
	mysqli_query($conexion,$consulta_insertar);
} else{
	echo "Ocurrió un error";
}
	
?>