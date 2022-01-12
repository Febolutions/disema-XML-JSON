<?php
require('C:\wamp64\www\disema\pdf\fpdf.php');
require('C:\wamp64\www\disema\controller\db.php');

class VsPDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Logo
        $this->Image('C:\wamp64\www\disema\resources\logo_color-01.png', 10, 8, 30);
        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Movernos a la derecha
        $this->Cell(65);
        // Título
        $this->Cell(60, 20, 'Reporte de Inventarios', 0, 0, 'C');
        // Salto de línea
        $this->Ln(30);

        $this->Cell(15,8,utf8_decode('ID'),1,0,'C');
        $this->Cell(40,8,utf8_decode('Nombre'),1,0,'C');
        $this->Cell(95,8,utf8_decode('Descripción'),1,0,'C');
        $this->Cell(15,8,utf8_decode('Cant.'),1,0,'C');
        $this->Cell(30,8,utf8_decode('Fecha'),1,0,'C');
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

$consulta="SELECT * from inventarios";
$resultado=$conexion->query($consulta);

$pdf = new VsPDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 9.5);
while($row=$resultado->fetch_assoc()){
    $pdf->Cell(15,8,$row['id_material'],1,0,'C');
    $pdf->Cell(40,8,$row['nombre_material'],1,0,'C',0);
    $pdf->Cell(95,8,$row['descripcion_m'],1,0,'C',0);
    $pdf->Cell(15,8,$row['existencias'],1,0,'C',0);
    $pdf->Cell(30,8,$row['fecha'],1,1,'C',0);
}
$pdf->Output();
?>
