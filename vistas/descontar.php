<?php
include("C:\wamp64\www\disema\controller\session.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Descontar material</title>
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
                <a href="../vistas/consultarB.php">Consultar</a>
            </div>
        </div>
        <div class="dropdown"><button class="dropbtn">Inventarios<i class="fa fa-caret-down"></i></button>
            <div class="dropdown-content">
                <a href="../vistas/registroM.php" name="registrarMI">Registrar</a>
                <a href="../vistas/consultar.php">Consultar</a>
                <a href="../vistas/descontar.php" class="active">Descontar</a>
                <a href="../vistas/eliminarI.php">Eliminar</a>
            </div>
        </div>
        <a href="../vistas/xmlInv.php">XML</a>
        <a href="../vistas/jsonInv.php">JSON</a>
        <a href="../vistas/consultarOrden.php">Consultar trabajo</a>
        <a href="../controller/logout.php">Cerrar Sesión</a>
    </nav>
    <div id="divPC" class="center">
        <h2>Descontar material</h2>
        <form name="first" action="" method="POST" onSubmit="return validarForm(this)">
            <label>ID:</label>
            <input name="id_m" type="number" class="inputTextSizeSmall roundedElements">
            <input type="submit" name="buscar" value="Buscar" class="inputBtnSize"><br>
            <table id="tablaD">
                <tr>
                    <!--creamos los títulos de nuestras dos columnas de nuestra tabla -->
                    <th><strong>ID</strong></th>
                    <th><strong>Material</strong></th>
                    <th><strong>Descripción</strong></th>
                    <th><strong>En existencia</strong></th>
                </tr>
                <?php
                require('C:\wamp64\www\disema\controller\db.php');
                if (isset($_POST['buscar']) && $_POST['buscar'] == 'Buscar') {
                    $buscar = $_POST["id_m"];
                    $consulta2 = "SELECT id_material,nombre_material,descripcion_m,existencias from inventarios where id_material=$buscar";
                    $resultado2 = $conexion->query($consulta2);
                    while ($show = mysqli_fetch_array($resultado2)) {
                ?>
                        <tr>
                            <td name="idm"><?php echo $show['id_material'] ?></td>
                            <td><?php echo $show['nombre_material'] ?></td>
                            <td><?php echo $show['descripcion_m'] ?></td>
                            <td name="cantE"><?php echo $show['existencias'] ?></td>
                        </tr>
                    <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td><?php echo " " ?></td>
                        <td><?php echo " " ?></td>
                        <td><?php echo " " ?></td>
                        <td><?php echo " " ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>
            <script>
                document.first.id_m.value = <?php echo $buscar ?>
            </script>
            <form name="second" action="" method="POST" onSubmit="return validar(this)">
                <label>Cantidad a descontar:</label>
                <input name="descuentos" type="text" class="inputTextSizeSmall roundedElements"><br>
                <input type="submit" name="descuento" value="Descontar" class="inputBtnSize"><br>
                <?php
                require('C:\wamp64\www\disema\controller\db.php');

                if (isset($_POST['descuento']) && $_POST['descuento'] == 'Descontar') {
                    $cant = $_POST['descuentos'];
                    $idm = $_POST['id_m'];

                    $cantidad = "SELECT existencias FROM inventarios WHERE id_material='$idm'";
                    $cantidades = $conexion->query($cantidad);
                    $row = mysqli_fetch_array($cantidades);
                    $max = $row[0];
                    $restar = $max - $cant;

                    $actualizar = "UPDATE inventarios SET existencias='$restar' WHERE id_material='$idm'";
                    $resultado = $conexion->query($actualizar);

                    if ($resultado) {
                ?>
                        <script>
                            alert('El material se ha descontado: <?php echo $restar ?>');
                        </script>
                    <?php
                    } else {
                    ?>
                        <script>
                            alert('No se ha podido realizar la operacion');
                        </script>
                <?php
                    }
                }
                ?>
            </form>
            <script type="text/javascript">
                function validar(formulario) {
                    if (formulario.cant.value.length == 0) { //¿Tiene 0 caracteres?
                        formulario.cant.focus(); // Damos el foco al control
                        alert('Debes rellenar este campo'); //Mostramos el mensaje
                        return false;
                    } //devolvemos el foco  
                    return true; //Si ha llegado hasta aquí, es que todo es correcto 
                }
            </script>
        </form>


        <script type="text/javascript">
            function validarForm(formulario) {
                if (formulario.id_m.value.length == 0) { //¿Tiene 0 caracteres?
                    formulario.id_m.focus(); // Damos el foco al control
                    alert('Debes rellenar este campo'); //Mostramos el mensaje
                    return false;
                } //devolvemos el foco  
                return true; //Si ha llegado hasta aquí, es que todo es correcto 
            }
        </script>
    </div>
</body>

</html>