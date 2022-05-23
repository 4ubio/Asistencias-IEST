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

        <h1>Capacitación CISCO 1</h1>
        
        <div class="container">
            <div class="container__qr">
                <img src="https://chart.googleapis.com/chart?cht=qr&chl=www.google.com&chs=160x160&chld=L|0" alt="qr" class="qr">
                <h3>Código QR para el registro de los maestros</h3>

                <p>Salón: <span><b>666</b></span></p>
                <p>Impartido por: <span><b>Sebastián Rubio Quiroz</b></span></p>
                <p>Fecha: <span><b>23/05/2022</b></span></p>
                <p>Hora: <span><b>16:13</b></span></p>

                <div class="container3">
                    <a href="edit_meet.php" class="link__meet">Editar</a>
                    <a href="assistance_en.php" class="link__meet">Entradas</a>
                    <a href="assistance_ex.php" class="link__meet">Salidas</a>
                </div>
            </div>
        </div>
        
    </main>

    <script src="../js/admin.js"></script>
</body>
</html>