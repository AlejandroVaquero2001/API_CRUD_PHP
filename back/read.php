<?php
header('Content-Type: application/json');

require '../db/database.php';
require_once 'config.php';
require_once 'auth.php';

/**
 * Función para obtener todos los restaurantes.
 *
 * @return array Lista de restaurantes
 */
function obtenerRestaurantes() {
    $restaurantes = R::findAll('restaurante');
    return R::exportAll($restaurantes);
}

echo json_encode(obtenerRestaurantes());