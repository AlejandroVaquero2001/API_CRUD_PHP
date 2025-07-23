<?php
require_once '../db/database.php';

// Verificar que se hayan enviado todos los campos necesarios
if (!isset($_POST['nombre'], $_POST['direccion'], $_POST['telefono'])) {
    http_response_code(400); 
    echo json_encode(["error" => "Faltan datos"]);
    exit;
}

// Escapar datos para evitar inyecciones SQL
$nombre = $con->real_escape_string($_POST['nombre']);
$direccion = $con->real_escape_string($_POST['direccion']);
$telefono = $con->real_escape_string($_POST['telefono']);

// Consulta SQL para insertar un nuevo restaurante
$sql = "INSERT INTO restaurantes (nombre, direccion, telefono)
        VALUES ('$nombre', '$direccion', '$telefono')";


// Ejecutar la consulta y responder
if ($con->query($sql)) {
    echo json_encode(["message" => "Restaurante anadido correctamente"]);
} else {
    echo json_encode(["error" => "Error al crear: " . $con->error]);
}