<?php 
    require_once 'controller/new_meet_controller.php';
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
                <li><a class="nav-li" href="meetings.php">Reuniones</a></li>
                <li><a class="nav-li active" href="new_meet.php">Nueva reunión</a></li>
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

        <h1>Nueva reunión</h1>

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
                <input autocomplete="off" name="salon" type="number" placeholder="Número de salón" class="form__field" value="<?php echo $salon; ?>">
                <input autocomplete="off" name="speaker" type="text" placeholder="Nombre de la persona que imparte la reunión" class="form__field" value="<?php echo $speaker; ?>">
                <input autocomplete="off" name="link" type="text" placeholder="Enlace de Google Forms" class="form__field" value="<?php echo $link; ?>">
                <input name="date" id="date" type="date" class="form__field" value="<?php echo $date; ?>">
                <input name="time" type="time" class="form__field" value="<?php echo $time; ?>">

                <div class="container">
                    <input type="submit" value="Crear" class="form__submit" name="new_meet">
                </div>
            </form>
        </div>
    </main>

    <script src="../js/admin.js"></script>
    <script src="../js/date.js"></script>
</body>
</html>