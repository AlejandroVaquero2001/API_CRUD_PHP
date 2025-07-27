<?php
require_once __DIR__ . '/../libs/rb-mysql.php';

// Conectar con MySQL
R::setup('mysql:host=db;dbname=restaurantes_db', 'root', 'root');


// Verificar conexión
if (!R::testConnection()) {
    die(json_encode(["error" => "No se pudo conectar a la base de datos"]));
}