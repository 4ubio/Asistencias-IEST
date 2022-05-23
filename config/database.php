<?php 

function conectardb() : mysqli {
    $db = mysqli_connect('localhost', 'root', '', '');

    if (!$db) {
        echo "Error, no se pudo conectar";
        exit;
    }

    return $db;
}