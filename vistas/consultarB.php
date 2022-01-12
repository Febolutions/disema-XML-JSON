<?php
include("C:\wamp64\www\disema\controller\session.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consultar material</title>
    <link rel="stylesheet" href="../css/pageStyles.css">
    <script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="jspdf/dist/jspdf.min.js"></script>
    <script src="js/jspdf.plugin.autotable.min.js"></script>
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
                <a href="../vistas/consultarB.php" class="active">Consultar</a>
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
    <div class="center">
        <h2>Consultar Bitácora</h2>
        <table id="tablaD">
            <tr>
                <th>ID_BITACORA</th>
                <th>DESCRIPCIÓN DEL TRABAJO</th>
                <th>FECHA</th>
                <th>STATUS</th>
                <th>AREA</th>
                <th>FOLIO_ORDEN</th>
                <th>ID MATERIAL</th>
            </tr>

            <?php

            require('C:\wamp64\www\disema\controller\db.php');
            $consulta = "SELECT * from bitacora ORDER BY id_bitacora";
            $resultado = $conexion->query($consulta);

            while ($mostrar = mysqli_fetch_array($resultado)) {
            ?>

                <tr>
                    <td><?php echo $mostrar['id_bitacora'] ?></td>
                    <td><?php echo $mostrar['descripcion_trabajo'] ?></td>
                    <td><?php echo $mostrar['fecha'] ?></td>
                    <td><?php echo $mostrar['statusOrden'] ?></td>
                    <td><?php echo $mostrar['id_a'] ?></td>
                    <td><?php echo $mostrar['folio_OT'] ?></td>
                    <td><?php echo $mostrar['id_m'] ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
        <a id="tagPDF" href="pdfConsulBit.php">Generar Reporte</a>
    </div>
</body>

</html>