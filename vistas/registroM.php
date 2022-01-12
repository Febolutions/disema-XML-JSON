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
                                <a href="../vistas/perfil_ver.php">Ver</a>
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
                <form action="" method="POST">
                        <h1 class="title1">Registrar Material</h1>
                        <label for="fname">ID_Material:</label>
                        <input type="number" name="id" class="roundedElements inputTextSizeSmall2" required>
                        <label for="lname">Nombre:</label>
                        <input type="text" name="nombre" class="roundedElements inputTextSize" required><br>
                        <label>Descripción:</label>
                        <input type="text" name="descripcion" class="roundedElements inputTextSizeBig" require><br>
                        <label>Cantidad:</label>
                        <input type="number" name="cantidad" class="roundedElements inputTextSizeSmall" required>
                        <label>Fecha (AAAA-MM-DD):</label>
                        <input type="date" name="fecha" class="roundedElements inputTextSizeMedium" require><br>
                        <input type="submit" id="registerI" value="Registrar" class="inputBtnSize"><br>
                        <?php
                        require('C:\wamp64\www\disema\controller\db.php');

                        //Validamos que hayan llegado estas variables, y que no esten vacias:
                        if (isset($_POST["id"], $_POST["nombre"], $_POST["descripcion"], $_POST["cantidad"], $_POST["fecha"]) and $_POST["id"] != "" and $_POST["nombre"] != "" and $_POST["descripcion"] != "" and $_POST["cantidad"] and $_POST["fecha"]) {
                                //traspasamos a variables locales, para evitar complicaciones con las comillas:
                                $id = $_POST["id"];
                                $nombre = $_POST["nombre"];
                                $descripcion = $_POST["descripcion"];
                                $cant = $_POST["cantidad"];
                                $fecha = $_POST["fecha"];

                                $insertar = "INSERT INTO inventarios (id_material,nombre_material,descripcion_m,existencias,fecha) VALUES ($id,'$nombre','$descripcion',$cant,'$fecha')";
                                $resultado = mysqli_query($conexion, $insertar);
                                if ($resultado) {
                        ?>
                                        <script>
                                                alert('Registro exitoso');
                                        </script>
                        <?php
                                }
                        }
                        ?>
                </form>
        </div>
</body>

</html>