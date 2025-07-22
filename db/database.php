<?php

//Datos de conexión a la base de datos
$host = 'localhost';
$db_name = 'restaurantes_db';
$username = 'root';
$password = '';

//establecer conexión con la base de datos
$con = new mysqli($host, $username, $password, $db_name);
$con->set_charset("utf8");

// Verificar la conexión
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}else{
    echo "Conexión exitosa a la base de datos";
}
