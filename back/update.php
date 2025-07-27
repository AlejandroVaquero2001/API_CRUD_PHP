<?php
header('Content-Type: application/json');

require '../db/database.php';
require_once 'config.php';
require_once 'auth.php';

/**
 * Función para actualizar un restaurante existente.
 *
 * @param int $id
 * @param string $nombre
 * @param string $direccion
 * @param string $telefono
 * @return bool True si se actualizó, false si no existe o no se pudo actualizar
 */
function actualizarRestaurante($id, $nombre, $direccion, $telefono) {
    $restaurante = R::load('restaurante', $id);
    if ($restaurante->id == 0) {
        return false;
    }
    $restaurante->nombre = $nombre;
    $restaurante->direccion = $direccion;
    $restaurante->telefono = $telefono;
    R::store($restaurante);
    return true;
}

if (!isset($_POST['id'], $_POST['nombre'], $_POST['direccion'], $_POST['telefono'])) {
    http_response_code(400);
    echo json_encode(["error" => "Faltan datos"]);
    exit;
}

$id = intval($_POST['id']);
$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];

if (actualizarRestaurante($id, $nombre, $direccion, $telefono)) {
    echo json_encode(["message" => "Restaurante actualizado"]);
} else {
    echo json_encode(["error" => "Restaurante no encontrado"]);
}