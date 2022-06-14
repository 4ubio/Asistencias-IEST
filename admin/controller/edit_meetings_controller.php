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

    $errors = array();
    $name = $meet['name'];
    $salon = $meet['classroom'];
    $speaker = $meet['speaker'];
    $link = $meet['link'];
    $date_ini = $meet['date'];
    $date_fin = $meet['date_fin'];
    $time = $meet['time'];

    if(isset($_POST['edit_meet'])){
        $name = mysqli_real_escape_string( $db, $_POST['name'] );
        $salon = mysqli_real_escape_string( $db, $_POST['salon'] );
        $speaker = mysqli_real_escape_string( $db, $_POST['speaker'] );
        $link = mysqli_real_escape_string( $db, $_POST['link'] );
        $date_ini = mysqli_real_escape_string( $db, $_POST['date_ini'] );
        $date_fin = mysqli_real_escape_string( $db, $_POST['date_fin'] );
        $time = mysqli_real_escape_string( $db, $_POST['time'] );

        if(!$name) {
            $errors[] = "Debe ingresar un nombre a la reunión";
        }

        if(!$salon) {
            $errors[] = "Debe ingresar el salón donde se realizará la reunión";
        }

        if(!$speaker) {
            $errors[] = "Debe ingresar el nombre de quien impartira la reunión";
        }

        if(!$link) {
            $errors[] = "Debe ingresar el enlace del Google Forms que se contestará al terminar la reunión";
        }

        if(!$date_ini) {
            $errors[] = "Debe ingresar la fecha cuando iniciará la reunión";
        }

        if(!$date_fin) {
            $errors[] = "Debe ingresar la fecha cuando finalizará la reunión";
        }

        if(!$time) {
            $errors[] = "Debe ingresar la hora cuando se realizará la reunión";
        }

        if(count($errors) === 0){
            $query = "UPDATE meetings SET name = '${name}', classroom = ${salon}, speaker = '${speaker}', date = '${date_ini}', date_fin = '${date_fin}', time = '${time}', link = '${link}' WHERE id = ${id}";
            $result = mysqli_query($db, $query);

            if($result){
                $url = "meet.php?id=$id&result=1";
                header("Location: $url");
                exit();
            }
        }
        
    }
?>