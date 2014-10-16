	<?php session_start();

	// revisa si se reciven datos
	if(isset($_GET) and $_GET["nombre"] <> ""){
		//conecta la base de datos
		include_once("database.php");

		$nombre = $_GET["nombre"];
		$contra = $_GET["contrasena"];
		$entrar= $_GET["entrar"];
		$registrar=$_GET["registrar"];
		echo "se registrará: ".$nombre." ".$contra;

		$query= "SELECT * from tallerd.usuarios WHERE  nombre='".$nombre."'";

		
		$result=mysqli_query($conexion,$query);

		$re=mysqli_fetch_array($result)["nombre"];

		//pegunta si el nombre existe ara saber si agregarlo o no
		if($re==""){
			// registra un estudiante con los datos obtenidos
			$query = "INSERT INTO tallerd.usuarios(`nombre`, `contrasena`) VALUES ('".$nombre."','".$contra."')";
			mysqli_query($conexion,$query);
			

			// selecciona el nombre correspondiente al código
				$query= "SELECT * from tallerd.usuarios WHERE  nombre='".$nombre."' AND contrasena='".$contra."'";
				$resultado=mysqli_query($conexion,$query);
				$usu=mysqli_fetch_array($resultado);
				if($usu["nombre"]<>""){
					
					$_SESSION['nombre']=$usu["nombre"];
					$_SESSION['contrasena']=$usu["contrasena"];
					$_SESSION['usuario']=$usu["idU"];	
				}

			// vuelve al perfil
			// header ("Location: ../perfil.php?nombre=".$_GET["nombre"]." & contrasena=".$_GET["contrasena"]."  & c=1);	
				 header ("Location: ../perfil.php");	
			// vuelve al inicio
			// header ("Location: ../index.php?mensaje=El usuario ha sido creado satisfactoriamente.");	
			
		}else{
			header ("Location: ../index.php?mensaje=El usuario ya existe.");	
		}
	}
	?>