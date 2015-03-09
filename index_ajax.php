<?php
$titulo = "EJEMPLOS CON AJAX";
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $titulo; ?></title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script>
		$(document).ready(function(){
			$("#miBoton").click(function(){
				$("#div1").load("cargame.php");	
			});
			
			$("#miBoton2").click(function(){
				$.get("Get.php", {nombre: "juan"}, function(respuesta){
					$("#div2").html(respuesta);
				})	
			});
			
			$("#miBoton3").click(function(){
				$.post("Post.php", {nombre: "hola mundo"}, function(respuesta){
					$("#div3").html(respuesta);
				})	
			});
			
			$("#fomulario").submit(function(e){
				e.preventDefault();
				$.ajax({
					url: "formulario.php",
					type: "post",
					data: $("#formulario").serialize(),
					success: function(respuesta){
						$("#div4").html(respuesta);
					}
				});
			});
			
			
		});
		</script>
	</head>
	<body>
		<h1><?php echo $titulo; ?></h1>
		
		<a href="#" id="miBoton">cargar archivo externo</a>
		
		<div id="div1"> 
			Aquí se va a cargar un archivo
		</div>
		<div id="div2"> 
		 Aquí cargo con GET
		</div>
		<input  type="button" id="miBoton2" value="cargar con GET">
		
		<div id="div3"> 
		 Aquí cargo con POST
		</div>
		<input  type="button" id="miBoton3" value="cargar con POST">
		
		
	</body>
</html>
