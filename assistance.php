<?php 
    require_once 'controller/assistance_controller.php';
    $resultGet = $_GET['result'] ?? null;
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

    <h1><?php echo $meet['name']; ?></h1>

    <?php if(intval($resultGet) === 1) : ?>
        <p class="success__alert">Ha registrado su entrada correctamente. Al terminar la reunión, registre su salida.</p>
    <?php endif; ?>
    
    <div class="container">
        <form action="" class="form" method="post">
            <h2 class="container">Introduzca los siguientes datos para registrar su entrada o salida: </h2>
            
            <!--Mostrar todos los errores dentro del arreglo-->
            <?php foreach($errors as $error) : ?>
                <div class="error__alert">
                    <?php echo $error ?>
                </div>
            <?php endforeach; ?>

            <div class="form__action">
                <legend class="form__legend">Seleccione una acción: </legend>

                <select name="action" id="" class="form__select">
                    <option value="entrada">Entrada</option>
                    <option value="salida">Salida</option>
                </select>
            </div>
            
            <input autocomplete="off" name="id_iest" type="number" placeholder="ID IEST" class="form__field" onkeypress = "return isNumeric(event)" oninput = "maxLengthCheck(this)" min = "1" max = "99999" value="<?php echo $id_iest; ?>">

            <div class="container">
                <input type="submit" value="Registrar" class="form__submit" name="assistance">
            </div>
        </form>
    </div>

    <script src="js/idIest.js"></script>

</body>
</html>