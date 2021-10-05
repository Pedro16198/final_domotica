<?php
//este archivo de post data es para usar en local, la placa carga datos en la BD de xampp que se guarda en la computadora


$servername = "localhost";

// REPLACE with your Database name
$dbname = "domotica";
// REPLACE with Database user
$username = "root";
// REPLACE with Database user password
$password = "";//anotado

// Keep this API Key value to be compatible with the ESP32 code provided in the project page. 
// If you change this value, the ESP32 sketch needs to match
$api_key_value = "tPmAT5Ab3j7F9";

$api_key=  $temp = $hum = $mov = $gas = $aire = "";

$fecha_medicion = date("Y-m-d H:i:s");
$horaServ = date('H:i');
$nuevaHora = strtotime ( '-4 hour' , strtotime ( $horaServ ) ) ;// corrige la zona horaria
$nuevaHora = date ( 'H:i' , $nuevaHora );//le da formato a la hora
$hora=$nuevaHora;//asignamos a la variable que se guarda en la BD




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = test_input($_POST["api_key"]);
    if($api_key == $api_key_value) {

        $temp = test_input($_POST["temp"]);
        $hum = test_input($_POST["hum"]);
        $mov = test_input($_POST["mov"]);
        $gas = test_input($_POST["gas"]);
        $aire = test_input($_POST["aire"]);
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        //inserción tabla dth11 temperatura
        $sql = "INSERT INTO sensor_temperatura (dato, fecha_medicion, id_usuario)
        VALUES ('" . $temp . "', '" . $fecha_medicion. "', '" . $id_usuario. "')";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        //inserción tabla dth11 humedad
        $sql = "INSERT INTO sensor_humedad (dato, fecha_medicion, id_usuario)
        VALUES ('" . $hum . "', '" . $fecha_medicion. "', '" . $id_usuario. "')";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        //inserción tabla hcsr501
        $sql1 = "INSERT INTO sensor_movimiento (dato, fecha_medicion, id_usuario)
        VALUES ('" . $mov . "', '" . $fecha_medicion. "', '" . $id_usuario. "')";
        
        if ($conn->query($sql1) === TRUE) {
            echo "New record created successfully";
        } 
        else {
            echo "Error: " . $sql1 . "<br>" . $conn->error;
        }
        
        //inserción tabla mq1
        $sql2 = "INSERT INTO sensor_gas (dato, fecha_medicion, id_usuario)
        VALUES ('" . $gas . "', '" . $fecha_medicion. "', '" . $id_usuario. "')";
        
        if ($conn->query($sql2) === TRUE) {
            echo "New record created successfully";
        } 
        else {
            echo "Error: " . $sql2 . "<br>" . $conn->error;
        }
        
        //inserción tabla mq2
        $sql3 = "INSERT INTO sensor_aire (dato, fecha_medicion, id_usuario)
        VALUES ('" . $aire . "', '" . $fecha_medicion. "', '" . $id_usuario. "')";
        
        if ($conn->query($sql3) === TRUE) {
            echo "New record created successfully";
        } 
        else {
            echo "Error: " . $sql3 . "<br>" . $conn->error;
        }
    
        $conn->close();
    }
    else {
        echo "Wrong API Key provided.";
    }

}
else {
    echo "No data posted with HTTP POST.";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>