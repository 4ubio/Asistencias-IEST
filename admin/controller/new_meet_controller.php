<?php 
    require '../config/database.php';
    $db = conectardb();

    $errors = array();
    $name = "";
    $salon = "";
    $speaker = "";
    $link = "";
    $date = "";
    $time = "";

    if(isset($_POST['new_meet'])){
        $name = mysqli_real_escape_string( $db, $_POST['name'] );
        $salon = mysqli_real_escape_string( $db, $_POST['salon'] );
        $speaker = mysqli_real_escape_string( $db, $_POST['speaker'] );
        $link = mysqli_real_escape_string( $db, $_POST['link'] );
        $date = mysqli_real_escape_string( $db, $_POST['date'] );
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

        if(!$date) {
            $errors[] = "Debe ingresar la fecha cuando se realizará la reunión";
        }

        if(!$time) {
            $errors[] = "Debe ingresar la hora cuando se realizará la reunión";
        }

        if(count($errors) === 0){
            $query = "INSERT INTO meetings (name, classroom, speaker, date, time, link) VALUES ('$name', '$salon', '$speaker', '$date', '$time', '$link')";
            $result = mysqli_query($db, $query);

            if($result){
                header('Location: meetings.php?result=1');
                exit();
            }
        }
        
    }
?>