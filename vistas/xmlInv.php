<?php
include("C:\wamp64\www\disema\controller\session.php");
require('C:\wamp64\www\disema\controller\db.php');

$query = "SELECT * FROM inventarios";
$result = filterRecord($query);

function filterRecord($query)
{
    require('C:\wamp64\www\disema\controller\db.php');
    $filter_result = mysqli_query($conexion, $query);
    return $filter_result;
}

$cadena = mysql_XML($result);


function mysql_XML($resultado)
{
    $contenido = '&lt;br&gt; Reporte &lt;br&gt;';

    while ($row = mysqli_fetch_array($resultado)) {
        $contenido .= "&lt;Inventarios&gt;";
        $contenido .= "&lt;Id_material&gt;" . $row['id_material'] . "&lt;/Id_material&lt;br&gt;";
        $contenido .= "&lt;Material&gt;" . $row['nombre_material'] . "&lt;/Material&lt;br&gt;";
        $contenido .= "&lt;Descripcion&gt;" . $row['descripcion_m'] . "&lt;/Descripcion&lt;br&gt;";
        $contenido .= "&lt;Cantidad&gt;" . $row['existencias'] . "&lt;/Cantidad&lt;br&gt;";
        $contenido .= "&lt;Fecha&gt;" . $row['fecha'] . "&lt;/Fecha&lt;br&gt;";
        $contenido .= "&lt;/Inventarios&lt;br&gt;";
        echo "\n";
    }

    $contenido .= '&lt; /Reporte &lt;br&gt;';
    echo $contenido;
    return $contenido;
}
?>
