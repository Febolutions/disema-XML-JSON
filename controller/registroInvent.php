<?php
require('C:\wamp64\www\disema\controller\db.php');
include("C:\wamp64\www\disema\controller\session.php");

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
        $html = file_get_contents('http://localhost/disema/vistas/successR'); //Convierte la información de la URL en cadena
        echo $html;
    }
} else {
    $html = file_get_contents('http://localhost/disema/vistas/failedS'); //Convierte la información de la URL en cadena
    echo $html;
}
?>