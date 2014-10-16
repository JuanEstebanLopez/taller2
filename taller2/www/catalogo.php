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


	<?php session_start();
	echo '<div class="nav">';

	if(isset($_SESSION['nombre'])){
		$nombre=$_SESSION['nombre'];
	}else{
		$nombre="Perfil";
	}
	include_once("includes/menu.php");

	echo "</div>";


	include_once("includes/database.php");


	echo '<div class="section">';

	if($_SESSION['usuario']<>""){

		echo '<div class="container contenido">
		<div class="row">
			<div>' ;

				echo "<h3>Productos:</h3>";

				echo '</div>
			</div>
		</div>';
		// ordena los productos por tipo
		$query = "SELECT *  FROM tallerd.productos ORDER BY productos.idT ";
		// ordena los productos por lo más comprados
		// $query = "SELECT *  FROM tallerd.productos ORDER BY productos.compras DESC ";
		$resultado=mysqli_query($conexion,$query);

		$tipo=0;
		$conta=3;
		while ($row = mysqli_fetch_array($resultado)) {
			if($tipo<$row['idT']){
				if($tipo>0){

					if($conta%3<>0){
						if($conta>3){
							echo '</div>';
							$conta=3;
						}
					}

					echo "</div></div>";
				}

				echo '<div class="container"><div class="span10 categorias">
				
				<div id="cate'.$row['idT'].'">

					<br>'.$row["tipo"].' <br>
				</div>';

				$tipo=$row["idT"];
				
			}	

			if($conta%3==0){
				if($conta>3){
					echo '</div>';
				}
				echo '<div class="row">';	

			}

			$nombre=$row["nombreP"];
			$foto=$row["foto"];
			$info=$row["info"];
			$compras=$row["compras"];
			$precio=$row["precio"];
			$producto=$row["idP"];
			$compra=1;
			$pg="catalogo";

			include("includes/producto.php");
			$conta=$conta+1;

		}
		echo "</div>";

	}else{ 
				// si no no hay sesión vuelve al inicio
		header ("Location: index.php?mensaje=No se ha iniciado sesión");
	}
	echo "</div>";

	?>	



</div>


<footer>
</footer>
</body>
</html>