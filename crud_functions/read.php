<?php
require '../db/database.php';

// Consulta SQL para obtener todos los restaurantes y que la conexion esté abierta
$sql = "SELECT * FROM restaurantes";
$result = $con->query($sql);
$restaurantes = [];

// Verificar si la consulta devolvió resultado
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $restaurantes[] = $row;
    }
}

// Responder con los datos en formato JSO
echo json_encode($restaurantes);