<?php 
    require_once 'controller/edit_meetings_controller.php';
    require_once 'controller/close_session_controller.php';

    //Verificar si existe una sesión iniciada
    if(!$_SESSION['admin']){
        header('Location: index.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asistencias IEST - Admin</title>

    <link rel="shortcut icon" href="/assets/a.svg">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Zilla+Slab:wght@300;400;700&display=swap" rel="stylesheet">

    <link rel="preload" href="css/normalize.css" as="style">
    <link rel="stylesheet" href="css/normalize.css">

    <link rel="preload" href="css/styles.css" as="style">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <aside class="sidebar">
        <div class="sidebar-logo">
            <div class="container">
                <img src="/assets/anahuac.JPG" alt="logo" class="logo container">
            </div>
            <h1>Administración</h1>
        </div>

        <div class="sidebar-nav">
            <ul class="navigation">
                <li><a class="nav-li active" href="meetings.php">Reuniones</a></li>
                <li><a class="nav-li" href="new_meet.php">Nueva reunión</a></li>
                <li><a class="nav-li" href="teachers.php">Maestros</a></li>
                <li><a class="nav-li" href="meetings.php?logout=1">Cerrar sesión</a></li>
            </ul>
        </div>
    </aside>

    <main class="main-content">
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>

        <h1>Editar reunión</h1>

        <div class="container">
            <form action="" class="form" method="post">
                <h2>Ingrese los siguientes datos:</h2>

                <!--Mostrar todos los errores dentro del arreglo-->
                <?php foreach($errors as $error) : ?>
                    <div class="error__alert">
                        <?php echo $error ?>
                    </div>
                <?php endforeach; ?>

                <input autocomplete="off" name="name" type="text" placeholder="Nombre de la reunión" class="form__field" value="<?php echo $name; ?>">
                <input autocomplete="off" name="salon" type="text" placeholder="Número de salón" class="form__field" value="<?php echo $salon; ?>">
                <input autocomplete="off" name="speaker" type="text" placeholder="Nombre de la persona que imparte la reunión" class="form__field" value="<?php echo $speaker; ?>">
                <input autocomplete="off" name="link" type="text" placeholder="Enlace de evaluación del curso" class="form__field" value="<?php echo $link; ?>">
                <p class="label">Fecha de inicio</p>
                <input name="date_ini" id="date_ini" type="date" class="form__field" value="<?php echo $date_ini; ?>">
                <p class="label">Fecha de fin</p>
                <input name="date_fin" id="date_fin" type="date" class="form__field" value="<?php echo $date_fin; ?>">
                <p class="label">Hora</p>
                <input name="time" type="time" class="form__field" step="300" value="<?php echo $time; ?>">

                <div class="container">
                    <input type="submit" value="Actualizar" class="form__submit" name="edit_meet">
                </div>
            </form>
        </div>
    </main>

    <script src="../js/admin.js"></script>
</body>
</html>