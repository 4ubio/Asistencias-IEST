<?php 
    require '../config/database.php';
    $db = conectardb();

    $query = "SELECT * FROM meetings ORDER BY date_fin DESC";
    $result = mysqli_query($db, $query);
    $result2 = mysqli_query($db, $query);

    $date_of_today = date('Y/m/d');
?>