<?php 
    require './config/database.php';
    $db = conectardb();

    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header('location: /error.php');
    }

    $query1 = "SELECT * FROM meetings WHERE id = ${id}";
    $result1 = mysqli_query($db, $query1);

    if (!$result1->num_rows) {
        header('location: /error.php');
    }

    $meet = mysqli_fetch_assoc($result1);

    $errors = array();
    $id_iest = "";
    $action = "";
    $date = date('Y/m/d');
    $time = date('H:i',time() - 18000);

    if(isset($_POST['assistance'])){

        $id_iest = mysqli_real_escape_string( $db, $_POST['id_iest'] );
        $action = $_POST['action'];

        //No ingreso ID IEST
        if(!$id_iest) {
            $errors[] = "Debe ingresar su ID IEST";
        //Si ingreso ID IEST
        } else {
            //Verificación de existencia previa de ID
            $idQuery = "SELECT * FROM teachers WHERE id_iest = '$id_iest' LIMIT 1";
            $idResult = mysqli_query($db, $idQuery);

            //No existe registro del maestro
            if(!$idResult->num_rows){
                $errors[] = "El ID IEST no ha sido registrado";
            //Si existe registro del maestro
            } else {
                //Revisar si el maestro ha hecho registro de asistencias previos
                $queryCheck = "SELECT * FROM assistance WHERE id_iest = '$id_iest' AND action = 'entrada' AND id_meet = '$id' AND date = '$date' LIMIT 1";
                $resultCheck = mysqli_query($db, $queryCheck);

                //El maestro intenta registrar entrada pero ya lo ha hecho
                if ($action === 'entrada'){
                    if($resultCheck->num_rows){
                        $errors[] = "Ya ha registrado su entrada por hoy";
                    }
                }

                //El maestro intenta registrar salida...
                if ($action === 'salida'){
                    if(!$resultCheck->num_rows){
                        $errors[] = "No puede registrar salida sin haber registrado entrada"; //...pero no ha registrado entrada
                    }

                    //El maestro intenta registrar salida pero ya lo ha hecho
                    $queryCheck2 = "SELECT * FROM assistance WHERE id_iest = '$id_iest' AND action = 'salida'  AND id_meet = '$id' AND date = '$date' LIMIT 1";
                    $resultCheck2 = mysqli_query($db, $queryCheck2);

                    if($resultCheck2->num_rows){
                        $errors[] = "Ya ha registrado su salida por hoy";
                    }
                }
            }
        }

        //Si no hay errores
        if(count($errors) === 0){
            $query2 = "SELECT * FROM teachers WHERE id_iest = '$id_iest' LIMIT 1";
            $result2 = mysqli_query($db, $query2);
            $teacher = mysqli_fetch_assoc($result2);
            $name = $teacher['name'];

            $query3 = "INSERT INTO assistance (name, id_iest, id_meet, action, date, time) VALUES ('$name', '$id_iest', '$id', '$action', '$date', '$time')";
            $result3 = mysqli_query($db, $query3);

            if($result3){
                if($action === 'entrada'){
                    $url = "assistance.php?id=$id&result=1";
                    header("Location: $url");
                    exit();
                } else if ($action === 'salida'){
                    $url = "assistance_success.php?id=$id";
                    header("Location: $url");
                    exit();
                }
                
            }
        }
    }
?>