<?php 
    require_once 'controller/meet_controller.php';
    require_once 'controller/close_session_controller.php';

    //Verificar si existe una sesión iniciada
    if(!$_SESSION['admin']){
        header('Location: index.php');
        exit();
    }
    
    $resultGet = $_GET['result'] ?? null;
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

        <?php if(intval($resultGet) === 1) : ?>
            <p class="success__alert">Ha editado correctamente la reunión.</p>
        <?php endif; ?>

        <h1><?php echo $meet['name']; ?></h1>
        
        <div class="container">
            <div class="container__qr">
                <img src="https://chart.googleapis.com/chart?cht=qr&chl=http://localhost:3000/assistance.php?id=<?php echo $meet['id']; ?>&chs=160x160&chld=L|0" alt="qr" class="qr">
                <h3>Código QR para el registro de los maestros</h3>

                <p>Salón: <span><b><?php echo $meet['classroom']; ?></b></span></p>
                <p>Impartido por: <span><b><?php echo $meet['speaker']; ?></b></span></p>
                <p>Google Forms: <span><b><?php echo $meet['link']; ?></b></span></p>
                <p>Fecha de inicio: <span><b><?php echo $meet['date']; ?></b></span></p>
                <p>Fecha de fin: <span><b><?php echo $meet['date_fin']; ?></b></span></p>
                <p>Hora: <span><b><?php echo $meet['time']; ?></b></span></p>

                <div class="container3">
                    <a href="edit_meet.php?id=<?php echo $meet['id']; ?>" class="link__meet">Editar</a>
                    <a href="assistance_en.php?id=<?php echo $meet['id']; ?>" class="link__meet">Entradas</a>
                    <a href="assistance_ex.php?id=<?php echo $meet['id']; ?>" class="link__meet">Salidas</a>
                </div>
            </div>
        </div>
        
    </main>

    <script src="../js/admin.js"></script>
</body>
</html>