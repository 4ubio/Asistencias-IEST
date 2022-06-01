<?php 
    require '../config/database.php';
    $db = conectardb();

    $errors = array();
    $user = "";
    $password = "";

    if(isset($_POST['login'])){
        $user = mysqli_real_escape_string($db, filter_var($_POST['user']));
        $password = mysqli_real_escape_string($db, $_POST['password']);

        if (!$user) {
            $errors[] = "Ingrese su usuario administrador";
        }

        if (!$password) {
            $errors[] = "Ingrese su contraseña";  
        }

        if (empty($errors)) {

            //Resvisar si el ususario existe
            $query = "SELECT * FROM admins WHERE user = '$user' LIMIT 1";
            $result = mysqli_query($db, $query);

            if($result -> num_rows) {

                //Revisar la contraseña
                $user_auth = mysqli_fetch_assoc($result);
                $auth = password_verify($password, $user_auth['password']);

                if ($auth) {
                    session_start();
                    $_SESSION['admin'] = $user_auth['user'];
                    header('location: /admin/meetings.php');

                } else {
                    $errors[] = "La contraseña es incorrecta";
                }

            } else {
                $errors[] = "El usuario no existe"; 
            }
        }
    
    }
?>