<?php
$titulo= "Formulario de contacto";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo $titulo; ?></title>
	    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		
		<script>
		$(document).ready(function(){
			
			$("#formulario_contacto").submit(function(e){
				e.preventDefault();
				$.ajax({
					url: "enviar_correo.php",
					type: "post",
					data: $("#formulario_contacto").serialize(),
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
		<form id="formulario_contacto">
		<label for="nombre_completo">nombre completo</label>
		<input type="text" name="nombre_completo" value="" id="nombre_completo"><br>
			<label for="correo">correo</label>
			<input type="text" name="correo" value="" id="correo"><br>
			<label for="asunto">asunto</label>
			<input type="text" name="asunto" value="" id="asunto"><br>
			<label for="mensaje">asunto</label>
			<textarea name="mensaje" cols="30" rows="10"></textarea><br>
		
			<p><input type="submit" value="Enviar"></p>
		</form>
		<div id="respuesta"></div>
	</body>
</html>