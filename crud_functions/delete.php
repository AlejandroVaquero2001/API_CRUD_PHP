<?php
require '../db/database.php';

// Verificar que se haya enviado el ID
if (!isset($_POST['id'])) {
    http_response_code(400);
    echo json_encode(["error" => "Falta el ID del restaurante a eliminar"]);
    exit;
}

// Escapar el ID y asegurarse de que sea entero
$id = (int) $_POST['id'];

// Crear consulta SQL
$sql = "DELETE FROM restaurantes WHERE id = $id";

// Ejecutar y responder
if ($con->query($sql)) {
    if ($con->affected_rows > 0) {
        echo json_encode(["message" => "Restaurante eliminado"]);
    } else {
        echo json_encode(["error" => "No se encontró un restaurante con ese ID"]);
    }
} else {
    echo json_encode(["error" => "Error al eliminar: " . $con->error]);
}