<?php 
    require_once 'controller/meetings_controller.php';
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
                <li><a class="nav-li" href="">Cerrar sesión</a></li>
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
            <p class="success__alert">Ha registrado correctamente una nueva reunión.</p>
        <?php endif; ?>

        <h1>Bienvenido, Administrador.</h1>
        <h2>Reuniones registradas:</h2>

        <div class="container_meet">
            <?php while($meet = mysqli_fetch_assoc($result)) : ?>
            <a href="meet.php?id=<?php echo $meet['id']; ?>" class="link__meet"><?php echo $meet['name']; ?></a>
            <?php endwhile; ?>
        </div>
    </main>

    <script src="../js/admin.js"></script>
</body>
</html>