<?php
require_once 'config.php';

// Obtener los encabezados HTTP de la petición
$headers = array_change_key_case(getallheaders(), CASE_UPPER);

// Verificar si se envió la cabecera 'X-API-KEY' y si es válida
if (!isset($headers['X-API-KEY']) || $headers['X-API-KEY'] !== $_ENV['API_KEY']) {
    http_response_code(401); // No autorizado
    echo json_encode(["error" => "No autorizado - clave inválida"]);
    exit;
}