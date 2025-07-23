<?php
require '../db/database.php';

$restaurantes = R::findAll('restaurante');

echo json_encode(R::exportAll($restaurantes));