<?php
include '../funciones.php';
include '../conexion.php';

	switch ($_POST['sensor']) {
		case 'temperatura':
			$query = "SELECT * FROM sensor_temperatura";
			break;
		case 'humedad':
			$query = "SELECT * FROM sensor_humedad ORDER BY id_humedad DESC LIMIT 0,1";
			break;
		case 'movimiento':
			$query = "SELECT * FROM sensor_movimiento ORDER BY id_movimiento DESC LIMIT 0,1";
			break;
		case 'gas':
			$query = "SELECT * FROM sensor_gas ORDER BY id_gas DESC LIMIT 0,1";
			break;
		case 'aire':
			$query = "SELECT * FROM sensor_aire ORDER BY id_aire DESC LIMIT 0,1";
			break;
		default:
			# code...
			break;
	}
	// $result = mysqli_query($conn, $query);

	if ($conn->query($query) == TRUE) {
		  $rs = $conn->query($query);
		  if($rs->num_rows != 0){
		  	$row = $rs->fetch_assoc();
		  	echo json_encode($row);
		  }else{echo json_encode("false");}
	} else {
		 echo json_encode("Error: " . $query . "<br>" . $conn->error);
	}