	<?php
	// revisa si se reciven datos
	if(isset($_POST) and $_POST["tarea"] <> ""){
		include_once("database.php");
		$tarea=$_POST["tarea"];
		$descripcion=$_POST["descripcion"];
		$prioridad=$_POST["prioridad"];
		$ani=$_POST["an_i"];
		$mesi=$_POST["mes_i"];
		$diai=$_POST["dia_i"];
		$anf=$_POST["an_f"];
		$mesf=$_POST["mes_f"];
		$diaf=$_POST["dia_f"];
		$creacion= $ani."/".$mesi."/".$diai;
		$finalizacion=$anf."/".$mesf."/".$diaf;

		// prioridad=3; dia=31*prioridad; mes= 12*dia; año=10*mes;
		// PRIORIDAD=3 dia=93 mes=1116 año=11160

		$prioridadD=$prioridad+$diaf*3 +$mesf*93 +$anf*1116;

		echo"prioridad: ". $prioridadD;
			// registra una tarea con los datos obtenidos
		$query ="INSERT INTO taller1.tareas(`tarea`, `descripcion`, `creacion`, `finalizacion`, `prioridad`, `prioridadD`) VALUES ('".$tarea."','".$descripcion."','".$creacion."','".$finalizacion."','".$prioridad."','".$prioridadD."')";
		mysqli_query($conexion,$query);
		
			// vuelve a las tareas
		header ("Location: ../tareas.php");	
		
		
	}
	?>