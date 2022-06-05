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

    $errors = array();
    $id_iest = $teacher['id_iest'];
    $old_id_iest = $teacher['id_iest'];
    $email = $teacher['email'];
    $old_email = $teacher['email'];
    $name = $teacher['name'];

    if(isset($_POST['update_teacher'])){
        $id_iest = mysqli_real_escape_string( $db, $_POST['id_iest'] );
        $email = mysqli_real_escape_string( $db, $_POST['mail'] );
        $name = mysqli_real_escape_string( $db, $_POST['name'] );
        
        if(!$id_iest) {
            $errors[] = "Debe ingresar el ID IEST";
        }

        if(!$email) {
            $errors[] = "Debe ingresar el correo electrónico institucional";
        } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Correo electrónico inválido";
        } else if(!(strpos($email, "@iest.edu.mx"))) {
            $errors[] = "Correo electrónico inválido. Debe ingresar el correo electrónico institucional";
        }

        if(!$name) {
            $errors[] = "Debe ingresar el nombre completo";
        }

        //Verificación de existencia previa de ID y Email

        $emailQuery = "SELECT * FROM teachers WHERE email = '$email' LIMIT 1";
        $emailResult = mysqli_query($db, $emailQuery);

        $idQuery = "SELECT * FROM teachers WHERE id_iest = '$id_iest' LIMIT 1";
        $idResult = mysqli_query($db, $idQuery);

        if(($idResult->num_rows) > 0){
            if(strcmp($old_id_iest, $id_iest) !== 0){
                $errors[] = "El ID IEST ingresado ya está siendo ocupado";
            }
        }
        
        if(($emailResult->num_rows) > 0){
            if(strcmp($old_email, $email) !== 0){
                $errors[] = "El correo electrónico ingresado ya está siendo ocupado";
            }
        }

        //Si no hay errores
        if(count($errors) === 0){
            $query2= "UPDATE teachers SET id_iest = ${id_iest}, name = '${name}', email = '${email}' WHERE id_iest = ${old_id_iest}";
            $result2 = mysqli_query($db, $query2);

            $query3= "UPDATE assistance SET name = '${name}' WHERE id_iest = ${id_iest}";
            $result3 = mysqli_query($db, $query3);

            if($result2 && $result3){
                header('Location: teachers.php?result=1');
                exit();
            }
        }
    }
?>