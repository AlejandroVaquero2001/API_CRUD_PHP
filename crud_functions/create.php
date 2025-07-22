<?php
require_once '../db/database.php';

$nombre = 'Restaurante Ejemplo 3';
$direccion = 'Calle Ejemplo nº3';
$telefono = '+34 000000003';

$sql = "INSERT INTO restaurantes (nombre, direccion, telefono) VALUES ('$nombre', '$direccion', '$telefono')";

if ($con->query($sql)) {
    echo json_encode(["message" => "Restaurante anadido correctamente"]);
} else {
    echo json_encode(["error" => "Error al crear: " . $con->error]);
}