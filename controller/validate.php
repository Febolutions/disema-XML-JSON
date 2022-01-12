<?php
include("../controller/db.php");
session_start();

$username = $_POST['username'];
$password = $_POST['password'];


$md5pass = md5($password);
 
$username = $conexion->real_escape_string($username);
 
$query = "SELECT user_name, contrasenna FROM empleado WHERE user_name = '$username' AND contrasenna='$md5pass';";
$result = $conexion->query($query);
 
if($result->num_rows == 1) 
{
	$_SESSION['user'] = $username;
	header('Location: http://localhost/disema/vistas/home');  
}
else{ 
	header('Location: http://localhost/disema/vistas/login?fallo=true');
}
?>