<?php 
    require '../config/database.php';
    $db = conectardb();

    $query = "SELECT * FROM teachers ORDER BY name ASC";
    $result = mysqli_query($db, $query);
?>