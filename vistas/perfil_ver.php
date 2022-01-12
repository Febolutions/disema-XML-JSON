<?php
include("C:\wamp64\www\disema\controller\session.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Registrar material</title>
        <link rel="stylesheet" href="../css/pageStyles.css">
        <script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="jspdf/dist/jspdf.min.js"></script>
        <script src="js/jspdf.plugin.autotable.min.js"></script>
        <script src="../js/modalRun.js"></script>
</head>

<body>
        <nav class="topnav">
                <a href="home.php">Inicio</a>
                <div class="dropdown"><button class="dropbtn">Perfil<i class="fa fa-caret-down"></i></button>
                        <div class="dropdown-content">
                                <a href="../vistas/perfil_ver.php" class="active">Ver</a>
                                <a href="../vistas/editarPerfil.php">Editar</a>
                        </div>
                </div>
                <div class="dropdown"><button class="dropbtn">Bitácora<i class="fa fa-caret-down"></i></button>
                        <div class="dropdown-content">
                                <a href="../vistas/registrarB.php">Registrar</a>
                                <a href="../vistas/consultarB.php">Consultar</a>
                        </div>
                </div>
                <div class="dropdown"><button class="dropbtn">Inventarios<i class="fa fa-caret-down"></i></button>
                        <div class="dropdown-content">
                                <a href="../vistas/registroM.php" name="registrarMI" class="active">Registrar</a>
                                <a href="../vistas/consultar.php">Consultar</a>
                                <a href="../vistas/descontar.php">Descontar</a>
                                <a href="../vistas/eliminarI.php">Eliminar</a>
                        </div>
                </div>
                <a href="../vistas/xmlInv.php">XML</a>
                <a href="../vistas/jsonInv.php">JSON</a>
                <a href="../vistas/consultarOrden.php">Consultar trabajo</a>
                <a href="../controller/logout.php">Cerrar Sesión</a>
        </nav>
        <div id="divP" class="center">
                <img src="../resources/usuario3.png" alt="user_logo">
                <h1 class="title1">Datos personales</h1>
                <?php
                require('C:\wamp64\www\disema\controller\db.php');

                $usen = $_SESSION['user'];

                $consulta = "SELECT nombres,ap_paterno,ap_materno,RFC,sueldo,fecha_inicio_labores from empleado where user_name='$usen';";
                $resultado = $conexion->query($consulta);
                while ($mostrar = mysqli_fetch_array($resultado)) {
                ?>
                        <label style="color:#FCA30B">Nombre completo: </label><br>
                        <label><?php echo $mostrar['nombres'] ?></label>
                        <label><?php echo $mostrar['ap_paterno'] ?></label>
                        <label><?php echo $mostrar['ap_materno'] ?></label>
                        <p style="color:#FCA30B">RFC:</p>
                        <label><?php echo $mostrar['RFC'] ?></label>
                        <p style="color:#FCA30B">Sueldo:</p>
                        <label>$<?php echo $mostrar['sueldo'] ?></label>
                        <p style="color:#FCA30B">Fecha de inicio laboral:</p>
                        <label><?php echo $mostrar['fecha_inicio_labores'] ?></label>
                <?php
                }
                ?>
        </div>
</body>

</html>