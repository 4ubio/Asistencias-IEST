<?php 
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header('location: /admin/meetings.php');
    }

    $query = "SELECT * FROM assistance WHERE id_meet = ${id} AND action = 'salida' ORDER BY time ASC";
    $result = mysqli_query($db, $query);

    if (($result->num_rows) < 0) {
        header('location: /admin/meetings.php');
    }
?>