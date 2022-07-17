<?php 
    require_once 'controller/register_controller.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asistencias IEST</title>

    <link rel="shortcut icon" href="assets/a.svg">

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
            <img src="assets/anahuac.JPG" alt="logo" class="logo">
        </div>
    </header>

    <?php if(intval($resultGet) === 1) : ?>
        <p class="success__alert">Ha sido registrado correctamente. Por favor, cierre la pestaña y espere a la siguiente reunión.</p>
    <?php endif; ?>
    <?php if(intval($resultGet) === 2) : ?>
        <p class="advice__alert">Por favor, registrese y al finalizar vuelva a escanear el código QR.</p>
    <?php endif; ?>
    <?php if(intval($resultGet) === 3) : ?>
        <p class="success__alert">Ha sido registrado correctamente. Por favor, vuelva a escanear el código QR.</p>
    <?php endif; ?>

    <h1>Registro de maestros</h1>
    
    <div class="container">
        <form action="" class="form" method="post">
            <h2 class="container">Introduzca los siguientes datos: </h2>

            <!--Mostrar todos los errores dentro del arreglo-->
            <?php foreach($errors as $error) : ?>
                <div class="error__alert">
                    <?php echo $error ?>
                </div>
            <?php endforeach; ?>

            <input autocomplete="off" name="id_iest" type="number" placeholder="ID IEST" class="form__field" onkeypress = "return isNumeric(event)" oninput = "maxLengthCheck(this)" min = "1" max = "99999" value="<?php echo $id_iest; ?>">
            <input autocomplete="off" name="user" type="text" placeholder="Usuario SIE" class="form__field" value="<?php echo $user; ?>">
            <input autocomplete="off" name="name" type="text" placeholder="Nombre(s)" class="form__field" value="<?php echo $name; ?>">
            <input autocomplete="off" name="lastname1" type="text" placeholder="Apellido paterno" class="form__field" value="<?php echo $lastname1; ?>">
            <input autocomplete="off" name="lastname2" type="text" placeholder="Apellido materno" class="form__field" value="<?php echo $lastname2; ?>">
            <div class="container">
                <input type="submit" value="Registrar" class="form__submit" name="signup">
            </div>
        </form>
    </div>

    <script src="js/idIest.js"></script>

</body>
</html>