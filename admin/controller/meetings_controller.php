<?php 
    require '../config/database.php';
    $db = conectardb();

    $query = "SELECT * FROM meetings ORDER BY id DESC";
    $result = mysqli_query($db, $query);
?>