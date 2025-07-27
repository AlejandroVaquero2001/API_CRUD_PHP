<?php
header('Content-Type: application/json');


require '../db/database.php';

require_once 'config.php';
require_once 'auth.php';

if (!isset($_POST['id'], $_POST['nombre'], $_POST['direccion'], $_POST['telefono'])) {
    http_response_code(400);
    echo json_encode(["error" => "Faltan datos"]);
    exit;
}

// Cargar restaurante existente
$restaurante = R::load('restaurante', $_POST['id']);

if ($restaurante->id == 0) {
    echo json_encode(["error" => "Restaurante no encontrado"]);
    exit;
}

// Actualizar campos
$restaurante->nombre = $_POST['nombre'];
$restaurante->direccion = $_POST['direccion'];
$restaurante->telefono = $_POST['telefono'];

R::store($restaurante);

echo json_encode(["message" => "Restaurante actualizado"]);