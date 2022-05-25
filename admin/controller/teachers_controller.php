<?php 
    require '../config/database.php';
    $db = conectardb();

    $query = "SELECT * FROM teachers ORDER BY id_iest ASC";
    $result = mysqli_query($db, $query);
?>