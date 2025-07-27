<?php
header('Content-Type: application/json');

require_once 'config.php';
require_once 'auth.php';
require '../db/database.php';

/**
 * Función para eliminar un restaurante existente.
 *
 * @param int $id ID del restaurante a eliminar
 * @return bool True si se eliminó, false si no existe io no se pudo eliminar
 */
function eliminarRestaurante($id) {
    $restaurante = R::load('restaurante', $id);
    if ($restaurante->id == 0) {
        return false;
    }
    R::trash($restaurante);
    return true;
}

if (!isset($_POST['id'])) {
    http_response_code(400);
    echo json_encode(["error" => "Falta el ID"]);
    exit;
}

$id = intval($_POST['id']);
if (eliminarRestaurante($id)) {
    echo json_encode(["message" => "Restaurante eliminado"]);
} else {
    echo json_encode(["error" => "Restaurante no encontrado"]);
}