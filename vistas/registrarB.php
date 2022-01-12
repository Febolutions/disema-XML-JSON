<?php
include("C:\wamp64\www\disema\controller\session.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Registrar Bitacora</title>
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
                                <a href="../vistas/registrarB.php" class="active">Registrar</a>
                                <a href="../vistas/consultarB.php">Consultar</a>
                        </div>
                </div>
                <div class="dropdown"><button class="dropbtn">Inventarios<i class="fa fa-caret-down"></i></button>
                        <div class="dropdown-content">
                                <a href="../vistas/registroM.php" name="registrarMI">Registrar</a>
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
        <div id="divPC" class="center">
                <form name="formul" action="" method="POST">
                        <h1 class="title1">Registrar Bitacora</h1>
                        <label for="id">ID BITACORA:</label>
                        <input type="number" name="idB" class="roundedElements inputTextSizeSmall2"><br>
                        <label for="desc">Descripcion del trabajo:</label>
                        <input type="text" name="descT" class="roundedElements inputTextSize" required><br>
                        <label for="fech">Fecha:</label>
                        <input type="date" name="fecha" class="roundedElements inputTextSizeMedium" required><br>
                        <label for="stat">Status de la orden:</label>
                        <input type="text" name="status" class="roundedElements inputTextSizeMedium" require><br>
                        <label>ID_AREA:</label>
                        <input type="number" name="idA" class="roundedElements inputTextSizeMedium" required><br>
                        <label>Folio de la orden de trabajo:</label>
                        <input type="number" name="fot" class="roundedElements inputTextSizeMedium" require><br>
                        <label>ID MATERIAL:</label>
                        <input type="number" name="idM" class="roundedElements inputTextSizeMedium" require><br>

                        <input type="submit" value="Registrar" class="inputBtnSize"><br>

                        <?php
                        require('C:\wamp64\www\disema\controller\db.php');

                        //Validamos que hayan llegado estas variables, y que no esten vacias:
                        if (isset($_POST["idB"], $_POST["descT"], $_POST["fecha"], $_POST["status"], $_POST["idA"], $_POST["fot"], $_POST["idM"]) and $_POST["idB"] != "" and $_POST["descT"] != "" and $_POST["fecha"] != "" and $_POST["status"] != "" and $_POST["idA"] != "" and $_POST["fot"] != "" and $_POST["idM"] != "") {
                                //traspasamos a variables locales, para evitar complicaciones con las comillas:
                                $idB = $_POST["idB"];
                                $desc = $_POST["descT"];
                                $fecha = $_POST["fecha"];
                                $status = $_POST["status"];
                                $idA = $_POST["idA"];
                                $folio = $_POST["fot"];
                                $idM = $_POST["idM"];

                                $insertar = "INSERT INTO bitacora (id_bitacora,descripcion_trabajo,fecha,statusOrden,id_a,folio_OT,id_m) VALUES ($idB,'$desc','$fecha','$status',$idA,$folio,$idM)";
                                $resultado = mysqli_query($conexion, $insertar);
                                if ($resultado) {
                        ?>
                                        <script>
                                                alert('Registro exitoso')
                                        </script>
                        <?php
                                }
                        }
                        ?>
                </form>
        </div>
</body>

</html>