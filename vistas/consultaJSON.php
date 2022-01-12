<?php
require('C:\wamp64\www\disema\controller\db.php');
include("C:\wamp64\www\disema\controller\session.php");

try{
    $usen = $_SESSION['user'];
    $consulta = "SELECT empleado_id,nombres,ap_paterno,ap_materno,RFC from empleado where user_name='$usen';";
    $resultado = $conexion->query($consulta);
    $rows=$resultado->fetch_all(MYSQLI_ASSOC);
    printf(json_encode($rows));
}
catch(Exception $e){
    echo "Error de conexion".$e;
    exit;
}
?>