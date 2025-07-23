<?php
header('Content-Type: application/json');

require '../db/database.php';

require_once 'config.php';
require_once 'auth.php';

$restaurantes = R::findAll('restaurante');

echo json_encode(R::exportAll($restaurantes));