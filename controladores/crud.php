<?php
include '../funciones.php';
include '../conexion.php';
// $objeto = new Conexion();
// $conexion = $objeto->Conectar();

$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$apellido = (isset($_POST['apellido'])) ? $_POST['apellido'] : '';
$telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : '';
$dni = (isset($_POST['dni'])) ? $_POST['dni'] : '';
$pass = (isset($_POST['password'])) ? $_POST['password'] : '';
$id_rol = (isset($_POST['id_rol'])) ? $_POST['id_rol'] : '';
$mail = (isset($_POST['mail'])) ? $_POST['mail'] : '';
$password = password_hash($password, PASSWORD_DEFAULT);

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id_usuario = (isset($_POST['id_usuario'])) ? $_POST['id_usuario'] : '';

switch($opcion){
    case 1:
        $consulta = "INSERT INTO usu_usuarios (nombre, apellido, mail, telefono, documento, password, id_rol) VALUES('$nombre', '$apellido', '$mail', '$telefono', '$dni', '$password', '$id_rol') ";			
        $resultado = $conn->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM usu_usuarios ORDER BY id_usuario DESC LIMIT 1";
        $resultado = $conn->prepare($consulta);
        $resultado->execute();
        $resultSet = $resultado->get_result();
        $data=$resultado->fetch_all(PDO::FETCH_ASSOC);       
        break;    
    case 2:        
        $consulta = "UPDATE usu_usuarios SET nombre='$nombre', apellido='$apellido', mail = '$mail', telefono='$telefono', documento='$dni', password='$password', id_rol='$id_rol' WHERE id_usuario = '$id_usuario' ";		
        $resultado = $conn->prepare($consulta);
        // var_dump($conn->errorInfo());die;
        // var_dump($id_usuario);
        $resultado->execute();
        // $resultado->close();        
        
        $consulta = "SELECT * FROM usu_usuarios WHERE id_usuario='$id_usuario' ";       
        $resultado = $conn->prepare($consulta);
        $resultado->execute();
        $resultSet = $resultado->get_result();
        $data=$resultSet->fetch_all(PDO::FETCH_ASSOC);
        break;
    case 3:        
        $consulta = "DELETE FROM usu_usuarios WHERE id_usuario='$id_usuario' ";		
        $resultado = $conn->prepare($consulta);
        $resultado->execute();                           
        break;
    case 4:    
        // $consulta = "
        // SELECT users.*, roles.nombre AS rol FROM usu_usuarios users
        // LEFT JOIN usu_roles AS roles ON users.id_rol = roles.id_rol
        // ";
    $consulta = "SELECT * FROM usu_usuarios";
        $resultado = $conn->prepare($consulta);
        $resultado->execute();
        //grab a result set
        $resultSet = $resultado->get_result();
        // var_dump($resultSet);        
        $data = $resultSet->fetch_all(PDO::FETCH_ASSOC);
        // var_dump($data);die;
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conn=null;
?>