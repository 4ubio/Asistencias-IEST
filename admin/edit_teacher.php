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
                <li><a class="nav-li" href="new_meet.php">Nueva reunión</a></li>
                <li><a class="nav-li active" href="teachers.php">Maestros</a></li>
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

        <h1>Editar maestro</h1>

        <div class="container">
            <form action="" class="form">
                <h2>Ingrese los siguientes datos:</h2>
                <input autocomplete="off" name="id_iest" type="number" placeholder="ID IEST" class="form__field" onkeypress = "return isNumeric(event)" oninput = "maxLengthCheck(this)" min = "1" max = "99999" value="">
                <input autocomplete="off" name="mail" type="email" placeholder="Correo institucional" class="form__field" value="">
                <input autocomplete="off" name="name" type="text" placeholder="Nombre completo" class="form__field" value="">
                <div class="container">
                    <input type="submit" value="Actualizar" class="form__submit">
                </div>
            </form>
        </div>
    </main>

    <script src="../js/admin.js"></script>
    <script src="../js/idIest.js"></script>
</body>
</html>