<?php
header('Content-Type: application/json');

require_once 'config.php';
require_once 'auth.php';
require '../db/database.php';

/**
 * Función para crear un nuevo restaurante.
 *
 * @param  string $nombre
 * @param  string $direccion
 * @param  string $telefono
 * @return int    ID del restaurante creado
 */
function crearRestaurante($nombre, $direccion, $telefono) {
    $restaurante = R::dispense('restaurante');
    $restaurante->nombre = $nombre;
    $restaurante->direccion = $direccion;
    $restaurante->telefono = $telefono;
    return R::store($restaurante);
}

if (!isset($_POST['nombre'], $_POST['direccion'], $_POST['telefono'])) {
    http_response_code(400);
    echo json_encode(["error" => "Faltan datos"]);
    exit;
}

$id = crearRestaurante($_POST['nombre'], $_POST['direccion'], $_POST['telefono']);

echo json_encode(["message" => "Restaurante creado", "id" => $id]);