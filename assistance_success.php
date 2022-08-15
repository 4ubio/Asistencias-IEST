<?php 
    require_once 'controller/assistance_controller.php';
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
    
    <div class="container">
        <div class="div__success">
            <h2 class="container">Ha registrado su entrada y salida correctamente. Por favor, ingrese al siguiente enlace y conteste la evaluación del curso.</h2>
            <a href="<?php echo $meet['link']; ?>" class="container google_form">Evaluación del curso</a>
        </div>
    </div>
    
    <script src="js/idIest.js"></script>

</body>
</html>