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
		<div class="span12">' ;

		echo "<h3>carrito de compras de ".$_SESSION['nombre'].":</h3>";

echo '</div>

	</div>';
				// muestra una tabla correspondiente a las notas del código recivido
		$query = "SELECT *  FROM tallerd.carrito join tallerd.productos  on carrito.idP=productos.idP   WHERE carrito.idU='".$_SESSION['usuario']."'";

		$resultado=mysqli_query($conexion,$query);
				// hace una tabla en la que organiza los datos recibidos del sql
				// en esta página encontre como organizar la tabla: http://www.elticus.com/?contenido=113
		$row = mysqli_fetch_array($resultado);
		if($row['nombreP']<>""){
			echo" <table border=1 cellpadding=4 cellspacing=0> <tr>   <th>Producto</th>  <th>Información</th> <th>Precio</th> <th>  </th> </tr>";

			echo "<tr><td>  ".$row['foto']." <br>".$row['nombreP']." </td> <td>".$row['info']."</td> <td>".$row['precio']."</td> <td>  <a  class='carrito' href='includes/agregarcarrito.php?producto=".$row['idP']." & compra=2 & pg=carrito'>Comprar </a> </td> </tr>";


			while ($row = mysqli_fetch_array($resultado)) {
				echo "<tr><td>  ".$row['foto']." <br>".$row['nombreP']." </td> <td>".$row['info']."</td> <td>".$row['precio']."</td> <td> <a  class='carrito' href='includes/agregarcarrito.php?producto=".$row['idP']." & compra=2 & pg=carrito'>Comprar </a> </td> </tr>";
			}
		}else{
			echo"<h3>No hay elementos en el carrito de compras</h3>";
		}
		echo "</table>";
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