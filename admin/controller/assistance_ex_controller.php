<?php 
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header('location: /admin/meetings.php');
    }

    $query = "SELECT * FROM assistance WHERE id_meet = ${id} AND action = 'salida' ORDER BY date ASC, time ASC";
    $result = mysqli_query($db, $query);

    $query_date = "SELECT MIN(date) FROM assistance WHERE id_meet = ${id} AND action = 'salida'";
    $result2 = mysqli_query($db, $query_date);
    $fetch_date = mysqli_fetch_assoc($result2);
    $date_ref = $fetch_date['MIN(date)'];

    if (($result->num_rows) < 0) {
        header('location: /admin/meetings.php');
    }
?>