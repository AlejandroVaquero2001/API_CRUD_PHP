<?php
// Carga el archivo de configuración de entorno (.env)
require_once __DIR__ . '/config.php'; 

// Indica que el contenido devuelto es código JavaScript
header('Content-Type: application/javascript');

// Toma la API key desde las variables de entorno, si existe
$apiKey = isset($_ENV['API_KEY']) ? $_ENV['API_KEY'] : '';

// Imprime un bloque de JavaScript que define una constante CONFIG con los valores necesarios
echo "const CONFIG = {\n";
echo "  API_KEY: '" . $apiKey . "',\n";
echo "  API_BASE: '../back/'\n";
echo "};";