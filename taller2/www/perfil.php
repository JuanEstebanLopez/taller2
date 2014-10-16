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

	if(isset($_GET)){
		if(isset($_GET["registrar"])){
	 	// si se recibe registrar manda a registrar el usuario
			echo "hhhhh";
			header ("Location: includes/crearusuario.php?nombre=".$_GET["nombre"]." & contrasena=".$_GET["contrasena"]." & registrar=".$_GET["registrar"]." & entrar=".$_GET["entrar"]  );
		}else if(isset($_GET["entrar"])){

		// revisa si se reciven datos
			if($_GET["nombre"]<>""){

				$nombre = $_GET["nombre"];
				$contrasena=$_GET["contrasena"];


			// selecciona el nombre correspondiente al código
				$query= "SELECT * from tallerd.usuarios WHERE  nombre='".$nombre."' AND contrasena='".$contrasena."'";
				$resultado=mysqli_query($conexion,$query);
				$usu=mysqli_fetch_array($resultado);
				if($usu["nombre"]<>""){
					$_SESSION['nombre']=$usu["nombre"];
					$_SESSION['contrasena']=$usu["contrasena"];
					$_SESSION['usuario']=$usu["idU"];	

					header("Location: perfil.php");
				}else{ 
				// si no se recive ningún dato va a la tabla de notas de todos los estudiantes
					header ("Location: index.php?mensaje=El usuario o la contraseña es incorrecto.");
				}
			}
		}
	}

	if($_SESSION['usuario']<>""){

		echo '<div class="container contenido">
		<div class="row">
			<div class="span12">' ;

		echo "<h3>Compras de ".$_SESSION['nombre'].": </h3>";

		echo '</div>

		</div>';
			$query = "SELECT *  FROM tallerd.compras join tallerd.productos  on compras.idP=productos.idP   WHERE compras.idU='".$_SESSION['usuario']."'";

			$resultado=mysqli_query($conexion,$query);
				// hace una tabla en la que organiza los datos recibidos del sql
				// en esta página encontre como organizar la tabla: http://www.elticus.com/?contenido=113
			$row = mysqli_fetch_array($resultado);
		if($row['nombreP']<>""){
			echo" <table border=1 cellpadding=4 cellspacing=0> <tr>   <th>Producto</th>  <th>Información</th> <th>Precio</th> <th>Fecha de compra</th> </tr>";
			echo "<tr><td>  ".$row['foto']." <br>".$row['nombreP']." </td> <td>".$row['info']."</td> <td>".$row['precio']."</td> <td>".$row['fecha']."</td> </tr>";
			while ($row = mysqli_fetch_array($resultado)) {
				echo "<tr><td>  ".$row['foto']." <br>".$row['nombreP']." </td> <td>".$row['info']."</td> <td>".$row['precio']."</td> <td>".$row['fecha']."</td> </tr>";
			}
		}else{
			echo"<h3>Todavía no se han realizado compras</h3>";
		}
		echo "</table>";
	}else{ 
		// si no no hay sesión vuelve al inicio
		// header ("Location: index.php?mensaje=No se ha iniciado sesión");
	}
	echo "</div>";

		?>	

	</div>


	<footer>
	</footer>
</body>
</html>