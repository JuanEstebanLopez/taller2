<?php session_start();

// $producto
// $compra
// $pg

if(isset($_GET)){
	if(isset($_GET["producto"]) AND isset($_GET["compra"]) AND isset($_GET["pg"])){
		include_once("database.php");
		if($_GET["compra"]<>1){
			

			$query= "INSERT INTO tallerd.compras(`idU`, `idP`,`fecha`) VALUES (".$_SESSION['usuario'].",".$_GET["producto"].", '".date('Y-m-d H:i:s')."')";

			mysqli_query($conexion,$query);

			echo $query;

			$query= "DELETE FROM tallerd.carrito WHERE `idU`= '".$_SESSION['usuario']."' AND `idP`='".$_GET["producto"]."'";

			mysqli_query($conexion,$query);


			$query= "SELECT * from tallerd.productos WHERE  idP='".$_GET["producto"]."'";

			$resultado=mysqli_query($conexion,$query);

			$li=mysqli_fetch_array($resultado)['compras'];
			echo $li;
			$li=$li+1;
			echo $li;

			// actualiza el número de compras
			$query = "UPDATE tallerd.productos SET compras=".$li." WHERE idP='".$_GET["producto"]."'";
			mysqli_query($conexion,$query);			 



		}else{
			

			
			$query= "INSERT INTO tallerd.carrito(`idU`, `idP`) VALUES (".$_SESSION['usuario'].",".$_GET["producto"].")";

			mysqli_query($conexion,$query);

			
			

		// se devuelve al lugar que estaba
		
		}
	}
}
header ("Location: ../".$_GET["pg"].".php?");
?>