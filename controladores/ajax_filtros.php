<?php
include '../funciones.php';
include '../conexion.php';
	
	if(!empty($_POST['sensor'])){
		$sensor = $_POST['sensor'];
	}else{
		$sensor = '';
	}
	if(!empty($_POST['fecha'])){
		$fecha = $_POST['fecha'];
	}else{
		$fecha = '';
	}
	switch ($_POST['sensor']) {
		case 'temperatura':
			$query = "SELECT * FROM sensor_temperatura WHERE 1=1 ";
			if(!empty($fecha)){
				$query .= "AND DATE(fecha_medicion) = '$fecha'";
			}
			break;
		case 'humedad':
			$query = "SELECT * FROM sensor_humedad WHERE 1=1 ";
			if(!empty($fecha)){
				$query .= "AND DATE(fecha_medicion) = '$fecha'";
			}
			break;
		case 'movimiento':
			$query = "SELECT * FROM sensor_movimiento WHERE 1=1 ";
			if(!empty($fecha)){
				$query .= "AND DATE(fecha_medicion) = '$fecha'";
			}
			break;
		case 'gas':
			$query = "SELECT * FROM sensor_gas WHERE 1=1 ";
			if(!empty($fecha)){
				$query .= "AND DATE(fecha_medicion) = '$fecha'";
			}
			break;
		case 'aire':
			$query = "SELECT * FROM sensor_aire WHERE 1=1 ";
			if(!empty($fecha)){
				$query .= "AND DATE(fecha_medicion) = '$fecha'";
			}
			break;
		default:
			$query = '';
			break;
	}
	// $result = mysqli_query($conn, $query);
	if($query != ''){
		if ($conn->query($query) == TRUE) {
			$rs = $conn->query($query);
			if($rs->num_rows != 0){
				$row = $rs->fetch_all();
			  	echo json_encode($row);
			}else{echo json_encode("false");}
		} else {
			 echo json_encode("Error: " . $query . "<br>" . $conn->error);
		}
	}else{ echo json_encode('false');}