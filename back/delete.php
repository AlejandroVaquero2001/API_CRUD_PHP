<?php
header('Content-Type: application/json');

require_once '../config/config.php';
require_once '../auth.php';

require '../db/database.php';

if (!isset($_POST['id'])) {
    http_response_code(400);
    echo json_encode(["error" => "Falta el ID"]);
    exit;
}

// Cargar y eliminar
$restaurante = R::load('restaurante', $_POST['id']);

if ($restaurante->id == 0) {
    echo json_encode(["error" => "Restaurante no encontrado"]);
    exit;
}

R::trash($restaurante);

echo json_encode(["message" => "Restaurante eliminado"]);