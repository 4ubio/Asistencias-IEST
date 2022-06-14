<?php 
    require './config/database.php';
    $db = conectardb();

    $errors = array();
    $id_iest = "";
    $email = "";
    $name = "";
    $lastname = "";

    if(isset($_POST['signup'])){
        $id_iest = mysqli_real_escape_string( $db, $_POST['id_iest'] );
        $email = mysqli_real_escape_string( $db, $_POST['mail'] );
        $name = mysqli_real_escape_string( $db, $_POST['name'] );
        $lastname = mysqli_real_escape_string( $db, $_POST['lastname'] );
        
        if(!$id_iest) {
            $errors[] = "Debe ingresar su ID IEST";
        }

        if(!$email) {
            $errors[] = "Debe ingresar su correo electrónico institucional";
        } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Correo electrónico inválido";
        } else if(!(strpos($email, "@iest.edu.mx"))) {
            $errors[] = "Correo electrónico inválido. Debe ingresar su correo electrónico institucional";
        }

        if(!$name) {
            $errors[] = "Debe ingresar su nombre o nombres";
        }

        if(!$lastname) {
            $errors[] = "Debe ingresar sus apellidos";
        }

        //Verificación de existencia previa de ID y Email

        $emailQuery = "SELECT * FROM teachers WHERE email = '$email' LIMIT 1";
        $emailResult = mysqli_query($db, $emailQuery);

        $idQuery = "SELECT * FROM teachers WHERE id_iest = '$id_iest' LIMIT 1";
        $idResult = mysqli_query($db, $idQuery);

        if(($idResult->num_rows) > 0){
            $errors[] = "El ID IEST ingresado ya está siendo ocupado";
        }
        
        if(($emailResult->num_rows) > 0){
            $errors[] = "El correo electrónico ingresado ya está siendo ocupado";
        }

        //Si no hay errores
        if(count($errors) === 0){
            $fullname = $name . " " . $lastname;
            $fullname = strtoupper($fullname);

            $query = "INSERT INTO teachers (id_iest, name, email) VALUES ('$id_iest', '$fullname', '$email')";
            $result = mysqli_query($db, $query);

            if($result){
                header('Location: register.php?result=1');
                exit();
            }
        }
    }
?>