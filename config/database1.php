<?php 

function conectardb() : mysqli {
    $db = mysqli_connect('sql202.epizy.com', 'epiz_31892826', 'BsPVH1dTi4Zw5I', 'epiz_31892826_asistencias');

    if (!$db) {
        echo "Error, no se pudo conectar";
        exit;
    }

    return $db;
}