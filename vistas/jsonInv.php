<?php
include("C:\wamp64\www\disema\controller\session.php");
require('C:\wamp64\www\disema\controller\db.php');

//generamos la consulta
$sql = "SELECT * FROM inventarios";
mysqli_set_charset($conexion, "utf8"); //formato de datos utf8

if(!$result = mysqli_query($conexion, $sql)) die();

$inventarios = array(); //creamos un array
while($row = mysqli_fetch_array($result)) 
{ 	
	$id=$row['id_material'];
	$nombre=$row['nombre_material'];
	$descripcion= $row['descripcion_m'] ;
	$cantidad=$row['existencias'];
    $fecha=$row['fecha'];
	
	$inventarios[] = array('id_material'=> $id, 'nombre_material'=> $nombre, 'descripcion_m'=> $descripcion,
						'existencias'=> $cantidad, 'fecha'=>$fecha);

}
	
//desconectamos la base de datos
$close = mysqli_close($conexion) 
or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
  

//Creamos el JSON
$json_string = json_encode($inventarios);
echo $json_string;

//Si queremos crear un archivo json, sería de esta forma:
/*
$file = 'usuarios.json';
file_put_contents($file, $json_string);
*/
	

?>