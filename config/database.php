<?php 

function conectardb() : mysqli {
    $db = mysqli_connect('localhost', 'root', '', 'Asistencias_IEST');

    if (!$db) {
        echo "Error, no se pudo conectar";
        exit;
    }

    return $db;
}