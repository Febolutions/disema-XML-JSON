<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="../css/pageStyles.css">
</head>

<body>
    <div id="diviP" class="center">
        <img src="../resources/logo4-03.png" alt="Disema logo">
        <form action="../controller/validate.php" method="POST">
            <?php
            if (isset($_GET["fallo"]) && $_GET["fallo"] == 'true') {
                echo "Nombre de usuario y/o password es incorrecto";
            }
            ?>
            <h1 class="title1">SISTEMA INTEGRAL</h1>
            <label for="fname">Usuario:</label><br>
            <input type="text" id="fname" name="username" class="roundedElements inputTextSizeMedium" required><br>
            <label for="lname">Contraseña:</label><br>
            <input type="password" id="lname" name="password" class="roundedElements inputTextSizeMedium" required><br>
            <input type="submit" name="logueo" value="Iniciar Sesión" class="inputBtnSize"><br>
        </form>
    </div>
</body>

</html>