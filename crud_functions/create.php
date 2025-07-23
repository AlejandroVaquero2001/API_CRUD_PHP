<?php
require '../db/database.php';

if (!isset($_POST['nombre'], $_POST['direccion'], $_POST['telefono'])) {
    http_response_code(400);
    echo json_encode(["error" => "Faltan datos"]);
    exit;
}

// Crear nuevo restaurante
$restaurante = R::dispense('restaurante'); // nombre de la tabla: 'restaurante' (RedBean la pluraliza)
$restaurante->nombre = $_POST['nombre'];
$restaurante->direccion = $_POST['direccion'];
$restaurante->telefono = $_POST['telefono'];

// Guardar en DB
$id = R::store($restaurante);

echo json_encode(["message" => "Restaurante creado", "id" => $id]);