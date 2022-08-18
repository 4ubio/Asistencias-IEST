<?php 
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header('location: /admin/meetings.php');
    }

    //Entradas

    $query1 = "SELECT * FROM assistance WHERE id_meet = ${id} AND action = 'entrada' ORDER BY date ASC, time ASC";
    $result1 = mysqli_query($db, $query1);

    $query_date = "SELECT MIN(date) FROM assistance WHERE id_meet = ${id} AND action = 'entrada'";
    $result_date_1 = mysqli_query($db, $query_date);
    $fetch_date_1 = mysqli_fetch_assoc($result_date_1);
    $date_ref_1= $fetch_date_1['MIN(date)'];

    if (($result1->num_rows) < 0) {
        header('location: /admin/meetings.php');
    }

    //Salidas

    $query2 = "SELECT * FROM assistance WHERE id_meet = ${id} AND action = 'salida' ORDER BY date ASC, time ASC";
    $result2 = mysqli_query($db, $query2);

    $query_date = "SELECT MIN(date) FROM assistance WHERE id_meet = ${id} AND action = 'salida'";
    $result_date_2 = mysqli_query($db, $query_date);
    $fetch_date_2 = mysqli_fetch_assoc($result_date_2);
    $date_ref_2= $fetch_date_2['MIN(date)'];

    if (($result2->num_rows) < 0) {
        header('location: /admin/meetings.php');
    }
?>