<?php
include_once("config.php");
$email= $_POST['email'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$repetir_contrasena = $_POST['repetir_contrasena'];
$tipo_usuario = $_POST['tipo_usuario'];

if ($contrasena == $repetir_contrasena){

$consulta_usuario_existente = "SELECT nombre_usuario FROM Usuarios WHERE nombre_usuario = '$usuario'";
$resultado_usuario_existente = mysqli_query($conexion, $consulta_usuario_existente);

$total_coincidencias = mysqli_num_rows($resultado_usuario_existente);

if ($total_coincidencias == 0){
	
	$msg_html = "<h1> Registro exitoso </h1>
		<br>
		<p> Muchas gracias por tu tiempo, tu registro en TIENDA fue exitoso aquí están los datos para ingresar a nuestro sitio:</p>
		<p> Usuario: ". $usuario ." </p>
		<p> Contraseña: " . $contrasena . "</p>";
		// Always set content-type when sending HTML email
	$cabeceras = "MIME-Version: 1.0" . "\r\n";
	$cabeceras .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$cabeceras .= "From: no-reply@tienda.com";
	mail($email,'Registro exitoso',$msg_html, $cabeceras);

$contrasena = md5($contrasena);
	
echo $consulta_insertar_usuario = "INSERT INTO Usuarios (nombre_usuario, password_usuario, correo_usuario, tipo_usuario) VALUES ('$usuario', '$contrasena', '$email', '$tipo_usuario')";
mysqli_query($conexion,$consulta_insertar_usuario);
echo "<p>Registro exitoso</p>";
} else{
	echo "<p> El usuario ya existe </p>";
}
} else {
	echo "<p> Las contraseñas no coinciden</p>";
}
?>