<?php 
    require_once 'controller/teachers_controller.php';
    require_once 'controller/close_session_controller.php';

    //Verificar si existe una sesión iniciada
    if(!$_SESSION['admin']){
        header('Location: index.php');
        exit();
    }
    
    $resultGet = $_GET['result'] ?? null;
    $i = 1; 
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
                <li><a class="nav-li" href="new_meet.php">Nueva reunión</a></li>
                <li><a class="nav-li active" href="teachers.php">Maestros</a></li>
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

        <h1>Maestros registrados</h1>

        <?php if(intval($resultGet) === 1) : ?>
            <p class="success__alert">Maestro actualizado correctamente.</p>
        <?php elseif(intval($resultGet) === 2) : ?>
            <p class="success__alert">Maestro eliminado correctamente.</p>
        <?php endif; ?>

        <div class="table-container">
            <table class="table-menu">
                <tr class="headers">
                    <th>N</th>
                    <th>ID IEST</th>
                    <th>Correo</th>
                    <th>Nombre</th>
                    <th>Fecha de registro</th>
                    <th>Editar</th>
                </tr>
                
                <?php while($teacher = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td><?php echo $i; $i++;?></td>
                    <td><?php echo $teacher['id_iest'] ?></td>
                    <td><?php echo $teacher['email'] ?></td>
                    <td><?php echo $teacher['name'] ?></td>
                    <td><?php echo $teacher['register_date'] ?></td>
                    <td>
                        <a href="edit_teacher.php?id_iest=<?php echo $teacher['id_iest']; ?>"><button class="link__meet">Editar</button></a>
                        <a href="delete_teacher.php?id_iest=<?php echo $teacher['id_iest']; ?>"><button class="link__meet delete">Eliminar</button></a>
                    </td>
                </tr>
                <?php endwhile; ?>

            </table>
        </div>
    </main>

    <script src="../js/admin.js"></script>
</body>
</html>