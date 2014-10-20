<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf8">
	<link rel="stylesheet" hreF="css/style.css"> 
	<link rel="stylesheet" hreF="bootstrap/css/bootstrap.css"> 
	<link rel="stylesheet" hreF="bootstrap/css/bootstrap-responsive.css"> 
</head>
<body>

	<div class="nav">
		<?php
		$nombre="Perfil";
		include_once("includes/menu.php");
		?>

	</div>


<br>
<br>
<br>

	<div class="section">
		<div class="container">
			<div class="row">
				<!-- <div class="span3"> -->
				<div class="span4">
					<!-- formulario que recibe el nombre y la contraseña con el cual se puede ingresar o registtrar -->
					<form name="formulario prueba" id="formulario_registro" method="GET" action="perfil.php">
						<label>Nombre:  </label><br><input type="text" name="nombre" id="nombre"  class="formulario_datos"><br> 
						<label>Contraseña:	</label><br><input type="password" name="contrasena" id="contrasena"  class="formulario_datos"><br><br>
						<input type="submit" value="entrar" name="entrar" id="entrar" class="formulario_datos"> <input type="submit" value="registrar" name="registrar" id="registrar" class="formulario_datos" style="float:right">
					</form>
				</div> 	
			</div>
			<br>
			<div class="row">
				<div class="span6">
					<?php
					if(isset($_GET["mensaje"])){
						if($_GET["mensaje"]<>""){
							echo "<h3>".$_GET["mensaje"]."</h3>";
						}
					}
					?>
				</div>
			</div>
		</div>

</div>

	<footer>
	</footer>
</body>
</html>