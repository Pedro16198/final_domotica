<?php
include '../funciones.php';
include '../conexion.php';

	switch ($_POST['action']) {
		case 'verificar':
			$user = $_POST['correo'];
			$query = "SELECT * FROM usu_usuarios WHERE mail='$user'";	
			if ($conn->query($query) == TRUE) {
				  $rs = $conn->query($query);
				  if($rs->num_rows != 0){
				  	$row = $rs->fetch_assoc();
				  	echo json_encode("true");
				  }else{echo json_encode("false");}
			} else {
				 echo json_encode("Error: " . $query . "<br>" . $conn->error);
			}
		break;
		case 'confirmar':
			$password = $_POST['password'];
			$pass_cifrado = password_hash($password, PASSWORD_DEFAULT);
			$user = $_POST['correo'];
			$query = "UPDATE usu_usuarios SET password = '$pass_cifrado' WHERE mail='$user'";
			if($conn->query($query) == TRUE){
				$rs = $conn->query($query);
				if($rs){
				  echo json_encode("true");
				}else{
				  echo json_encode("false");
				}
			} else {
				 echo json_encode("Error: " . $query . "<br>" . $conn->error);
			}
		break;
		
		default:
			# code...
			break;
	}