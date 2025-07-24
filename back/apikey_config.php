<?php
require_once __DIR__ . '/config.php'; 

header('Content-Type: application/javascript');

$apiKey = isset($_ENV['API_KEY']) ? $_ENV['API_KEY'] : '';

echo "const CONFIG = {\n";
echo "  API_KEY: '" . $apiKey . "',\n";
echo "  API_BASE: '../back/'\n";
echo "};";