<?php 
    require '../config/database.php';
    $db = conectardb();

    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header('location: /admin/meetings.php');
    }

    $query1 = "SELECT * FROM meetings WHERE id = ${id}";
    $result1 = mysqli_query($db, $query1);

    if (!$result1->num_rows) {
        header('location: /admin/meetings.php');
    }

    $meet = mysqli_fetch_assoc($result1);

    if(isset($_POST['delete_meet'])){
        $query= "DELETE FROM meetings WHERE id = ${id}";
        $result = mysqli_query($db, $query);

        if($result){
            header('Location: meetings.php?result=2');
            exit();
        }
    }
?>