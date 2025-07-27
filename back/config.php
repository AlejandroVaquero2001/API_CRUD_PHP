<?php

/**
 * Función para cargar las variables de entorno desde un archivo .env.
 *  Evitando hardcodeo de datos sensibles.
 *
 * @param  mixed $ruta donde se encuentra el archivo .env, omitido por el .gitignore
 * @return void
 */
function cargarEnv($ruta = __DIR__ . '/../.env') {
    if (!file_exists($ruta)) return;

    $lineas = file($ruta, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lineas as $linea) {
        if (strpos(trim($linea), '#') === 0) continue;
        list($clave, $valor) = explode('=', $linea, 2);
        $_ENV[trim($clave)] = trim($valor);
    }
}

cargarEnv();