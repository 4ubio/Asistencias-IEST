<?php 
    $resultGet = $_GET['result'] ?? null;

    if (intval($resultGet) === 2) {
        $r = 3;
    } else {
        $r = 1;
    }

    require './config/database.php';
    $db = conectardb();

    $errors = array();
    $id_iest = "";
    $user = "";
    $name = "";
    $lastname1 = "";
    $lastname2 = "";
    $date = date('Y/m/d');

    if(isset($_POST['signup'])){
        $id_iest = mysqli_real_escape_string( $db, $_POST['id_iest'] );
        $user = mysqli_real_escape_string( $db, $_POST['user'] );
        $name = mysqli_real_escape_string( $db, $_POST['name'] );
        $lastname1 = mysqli_real_escape_string( $db, $_POST['lastname1'] );
        $lastname2 = mysqli_real_escape_string( $db, $_POST['lastname2'] );
        
        if(!$id_iest) {
            $errors[] = "Debe ingresar su ID IEST";
        } else {
            $idQuery = "SELECT * FROM teachers WHERE id_iest = '$id_iest' LIMIT 1";
            $idResult = mysqli_query($db, $idQuery);

            if(($idResult->num_rows) > 0){
                $errors[] = "El ID IEST ingresado ya está siendo ocupado";
            }
        }

        if(!$user) {
            $errors[] = "Debe ingresar su usuario SIE";
        } else {
            if (preg_match('/[\'^£$%&*()}{@#~¿?!¡><>,;|=_+¬-]/', $user)) {
                $errors[] = "No debe ingresar caracteres especiales en el campo usuario";
            } else {
                $email = $user . "@iest.edu.mx";

                $emailQuery = "SELECT * FROM teachers WHERE email = '$email' LIMIT 1";
                $emailResult = mysqli_query($db, $emailQuery);
    
                if(($emailResult->num_rows) > 0){
                    $errors[] = "El usuario SIE ingresado ya está siendo ocupado";
                }
            }
        }

        if(!$name) {
            $errors[] = "Debe ingresar su nombre o nombres";
        } else {
            $n = $name;
            $name = mb_strtoupper($name,'utf-8');
            if (preg_match('/[\'^£$%&*()}{@#~¿?!¡><>,;|=_+¬-]/', $name)) {
                $errors[] = "No debe ingresar caracteres especiales en el campo nombre";
            }
            $name = $n;
        }

        if(!$lastname1) {
            $errors[] = "Debe ingresar su apellido paterno";
        } else {
            $l1 = $lastname1;
            $lastname1 = mb_strtoupper($lastname1,'utf-8');
            if (preg_match('/[\'^£$%&*()}{@#~¿?!¡><>,;|=_+¬-]/', $lastname1)) {
                $errors[] = "No debe ingresar caracteres especiales en el campo apellido paterno";
            }
            $lastname1 = $l1;
        }

        if(!$lastname2) {
            $errors[] = "Debe ingresar su apellido materno";
        } else {
            $l2 = $lastname2;
            $lastname2 = mb_strtoupper($lastname2,'utf-8');
            if (preg_match('/[\'^£$%&*()}{@#~¿?!¡><>,;|=_+¬-]/', $lastname2)) {
                $errors[] = "No debe ingresar caracteres especiales en el campo apellido materno";
            }
            $lastname2 = $l2;
        }

        //Si no hay errores
        if(count($errors) === 0){
            $fullname = $name . " " . $lastname1 . " " . $lastname2;
            $fullname = mb_strtoupper($fullname,'utf-8');

            $query = "INSERT INTO teachers (id_iest, name, email, register_date) VALUES ('$id_iest', '$fullname', '$email', '$date')";
            $result = mysqli_query($db, $query);

            if($result){
                $url = "register.php?result=$r";
                header("Location: $url");
                exit();
            }
        }
    }
?>