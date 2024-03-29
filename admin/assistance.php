<?php 
    require_once 'controller/edit_meetings_controller.php';
    require_once 'controller/assistance_controller.php';
    require_once 'controller/close_session_controller.php';

    //Verificar si existe una sesión iniciada
    if(!$_SESSION['admin']){
        header('Location: index.php');
        exit();
    }
    $i = 1; 
    $j = 1; 
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

        <h1><?php echo $name ?>: Asistencias</h1>

        <h2>Entradas</h2>

        <div class="table-container">
            <table class="table-menu">
                <h2><?php echo $date_ref_1 ?></h2>
                
                <tr class="headers">
                    <th>N</th>
                    <th>Nombre</th>
                    <th>ID IEST</th>
                    <th>Acción</th>
                    <th>Fecha</th>
                    <th>Hora</th> 
                </tr>

            <?php while($register = mysqli_fetch_assoc($result1)) : ?>

                <?php if($register['date'] === $date_ref_1) :?>
                <tr>
                    <td><?php echo $i; $i++;?></td>
                    <td><?php echo $register['name']?></td>
                    <td><?php echo $register['id_iest'] ?></td>
                    <td><?php echo $register['action'] ?></td>
                    <td><?php echo $register['date'] ?></td>
                    <td><?php echo $register['time'] ?></td>
                </tr>

                <?php else: 
                    $date_ref_1 = $register['date']; 
                    $i = 1; 
                ?>
                
                <table class="table-menu">

                    <h2><?php echo $date_ref_1 ?></h2>

                    <tr class="headers">
                        <th>N</th>
                        <th>Nombre</th>
                        <th>ID IEST</th>
                        <th>Acción</th>
                        <th>Fecha</th>
                        <th>Hora</th> 
                    </tr>

                    <tr>
                        <td><?php echo $i; $i++;?></td>
                        <td><?php echo $register['name']?></td>
                        <td><?php echo $register['id_iest'] ?></td>
                        <td><?php echo $register['action'] ?></td>
                        <td><?php echo $register['date'] ?></td>
                        <td><?php echo $register['time'] ?></td>
                    </tr>

                <?php endif;?>
            <?php endwhile; ?>
            </table>
        </div>

        <h2>Salidas</h2>

        <div class="table-container">
            <table class="table-menu">
                <h2><?php echo $date_ref_2 ?></h2>
                
                <tr class="headers">
                    <th>N</th>
                    <th>Nombre</th>
                    <th>ID IEST</th>
                    <th>Acción</th>
                    <th>Fecha</th>
                    <th>Hora</th> 
                </tr>

            <?php while($register2 = mysqli_fetch_assoc($result2)) : ?>

                <?php if($register2['date'] === $date_ref_2) :?>
                <tr>
                    <td><?php echo $j; $j++;?></td>
                    <td><?php echo $register2['name']?></td>
                    <td><?php echo $register2['id_iest'] ?></td>
                    <td><?php echo $register2['action'] ?></td>
                    <td><?php echo $register2['date'] ?></td>
                    <td><?php echo $register2['time'] ?></td>
                </tr>

                <?php else: 
                    $date_ref_2 = $register2['date']; 
                    $j = 1; 
                ?>
                
                <table class="table-menu">

                    <h2><?php echo $date_ref_2 ?></h2>

                    <tr class="headers">
                        <th>N</th>
                        <th>Nombre</th>
                        <th>ID IEST</th>
                        <th>Acción</th>
                        <th>Fecha</th>
                        <th>Hora</th> 
                    </tr>

                    <tr>
                        <td><?php echo $j; $j++;?></td>
                        <td><?php echo $register2['name']?></td>
                        <td><?php echo $register2['id_iest'] ?></td>
                        <td><?php echo $register2['action'] ?></td>
                        <td><?php echo $register2['date'] ?></td>
                        <td><?php echo $register2['time'] ?></td>
                    </tr>

                <?php endif;?>
            <?php endwhile; ?>
            </table>
        </div>

    </main>

    <script src="../js/admin.js"></script>
</body>
</html>