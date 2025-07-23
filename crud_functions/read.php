<?php
require '../db/database.php';

// Obtener todos los restaurantes
$restaurantes = R::findAll('restaurante');

echo json_encode(R::exportAll($restaurantes));