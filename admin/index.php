<?php 
    require_once 'controller/auth_controller.php';
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
    <header class="header">
        <div class="container">
            <img src="/assets/anahuac.JPG" alt="logo" class="logo">
        </div>
    </header>

    <h1>Administración</h1>
    
    <div class="container">
        <form action="" class="form" method="post">
            <h2>Ingrese sus credenciales de administrador</h2>

            <!--Mostrar todos los errores dentro del arreglo-->
            <?php foreach($errors as $error) : ?>
                <div class="error__alert">
                    <?php echo $error ?>
                </div>
            <?php endforeach; ?>

            <input autocomplete="off" name="user" type="text" placeholder="Usuario" class="form__field" value="<?php echo $user; ?>">
            <input autocomplete="off" name="password" type="password" placeholder="Contraseña" class="form__field" value="<?php echo $password; ?>">
            <div class="container">
                <input type="submit" value="Ingresar" class="form__submit" name="login">
            </div>
        </form>
    </div>
</body>
</html>