<?php 
    require '../config/database.php';
    $db = conectardb();

    $id = $_GET['id_iest'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header('location: /admin/teachers.php');
    }

    $query1 = "SELECT * FROM teachers WHERE id_iest = ${id}";
    $result1 = mysqli_query($db, $query1);

    if (!$result1->num_rows) {
        header('location: /admin/teachers.php');
    }

    $teacher = mysqli_fetch_assoc($result1);

    if(isset($_POST['delete_teacher'])){
        $query= "DELETE FROM teachers WHERE id_iest = ${id}";
        $result = mysqli_query($db, $query);

        if($result){
            header('Location: teachers.php?result=2');
            exit();
        }
    }
?>