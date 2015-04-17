<?php
$titulo = "Registro Usuario";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta chartset="utf-8">
		<title><?php echo $titulo; ?></title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		
		<script>
		$(document).ready(function(){
			
			$("#nuevo_registro").submit(function(e){
				e.preventDefault();
				$.ajax({
					url: "includes/insertar_usuario.php",
					type: "post",
					data: $("#nuevo_registro").serialize(),
					success: function(respuesta){
						$("#respuesta").html(respuesta);
						$("#respuesta").effect("bounce");
					}
				});
			});
		});
		</script>
	</head>
	<body>
		<h1><?php echo $titulo; ?></h1>
		<form id='nuevo_registro'> 
		
		<label for="email">email</label>
		<input type="text" name="email" value="" id="email"><br>
		
		<label for="usuario">Usuario</label>
		<input type="text" name="usuario" value="" id="usuario"><br>
		
		<label for="contrasena">contraseña</label>
		<input type="text" name="contrasena" value="" id="contrasena"><br>
		
		<label for="repetir_contrasena">Repetir contraseña</label>
		<input type="text" name="repetir_contrasena" value="" id="repetir_contrasena"><br>
		<br>
		
		<label for="repetir_contrasena">Tipo de Usuario</label>
		<select name="tipo_usuario" id="tipo_usuario">
			<option value="1">Cliente</option>
			<option value="2">Administrador</option>	
		</select><br>
		<br>
		
		<input type="submit" value="Registrarse">
		</form>
		<div id="respuesta"> </div>
	</body>
</html>