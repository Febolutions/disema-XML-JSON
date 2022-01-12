<?php
include("C:\wamp64\www\disema\controller\session.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Editar perfil</title>
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
                                <a href="../vistas/editarPerfil.php" class="active">Editar</a>
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
                                <a href="../vistas/descontar.php">Descontar</a>
                                <a href="../vistas/eliminarI.php">Eliminar</a>
                        </div>
                </div>
                <a href="../vistas/xmlInv.php">XML</a>
                <a href="../vistas/jsonInv.php">JSON</a>
                <a href="../vistas/consultarOrden.php">Consultar trabajo</a>
                <a href="../controller/logout.php">Cerrar Sesión</a>
        </nav>

        <script>
                $(document).ready(function(){
                        var ajax=new XMLHttpRequest();
                        ajax.open("POST", "consultaJSON.php", true);
                        ajax.onreadystatechange=function(){
                                if(ajax.readyState==4){
                                        var array = JSON.parse(ajax.responseText);
                                        $("#ide").val(array[0].empleado_id);
                                        $("#nombre").val(array[0].nombres);
                                        $("#apP").val(array[0].ap_paterno);
                                        $("#apM").val(array[0].ap_materno);
                                        $("#rfc").val(array[0].RFC);
                                }
                        }
                        ajax.setRequestHeader("Content-Type","appliccation/x-www-form-urlencoded");
                        ajax.send();
                })
        </script>
        <div id="divPC" class="center">
                <form name="formul" action="" method="POST">
                        <h1 class="title1">Editar Perfil</h1>
                        <label for="id">ID:</label>
                        <input type="number" id="ide" class="roundedElements inputTextSizeSmall2" readonly>
                        <label for="nameP">Nombre:</label>
                        <input type="number" id="nombre" class="roundedElements inputTextSizeMedium"><br>
                        <label for="apeP">Apellido paterno:</label>
                        <input type="text" id="apP" class="roundedElements inputTextSizeMedium" required><br>
                        <label for="apeM">Apellido Materno:</label>
                        <input type="text" id="apM" class="roundedElements inputTextSizeMedium" require><br>
                        <label>RFC:</label>
                        <input type="text" id="rfc" class="roundedElements inputTextSizeMedium" required><br>
                        <label>Contraseña anterior:</label>
                        <input type="password" name="passw1" class="roundedElements inputTextSizeMedium" require><br>
                        <label>Nueva Contraseña:</label>
                        <input type="password" name="passw" class="roundedElements inputTextSizeMedium" require><br>
                        <input type="submit" value="Actualizar" class="inputBtnSize"><br>
                </form>
        </div>
</body>

</html>