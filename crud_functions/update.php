<?php
require '../db/database.php';

// Verificar que se hayan enviado todos los campos necesarios
if (!isset($_POST['id'], $_POST['nombre'], $_POST['direccion'], $_POST['telefono'])) {
    http_response_code(400);
    echo json_encode(["error" => "Faltan datos"]);
    exit;
}

// Escapar datos para evitar inyecciones SQL
$id = (int) $_POST['id'];
$nombre = $con->real_escape_string($_POST['nombre']);
$direccion = $con->real_escape_string($_POST['direccion']);
$telefono = $con->real_escape_string($_POST['telefono']);

// Consulta SQL para actualizar el restaurante
$sql = "UPDATE restaurantes 
        SET nombre = '$nombre', direccion = '$direccion', telefono = '$telefono' 
        WHERE id = $id";

// Ejecutar la consulta y responder
if ($con->query($sql)) {
    echo json_encode(["message" => "Restaurante actualizado"]);
} else {
    echo json_encode(["error" => "Error al actualizar: " . $con->error]);
}