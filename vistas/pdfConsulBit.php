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
        $this->Cell(60, 20, 'Bitacora del empleado', 0, 0, 'C');
        // Salto de línea
        $this->Ln(30);
        $this->SetFont('Arial', 'B', 8);

        $this->Cell(20,6,utf8_decode('ID_BITACORA'),1,0,'C');
        $this->Cell(90,6,utf8_decode('DESCRIPCION'),1,0,'C');
        $this->Cell(15,6,utf8_decode('FECHA'),1,0,'C');
        $this->Cell(15,6,utf8_decode('STATUS'),1,0,'C');
        $this->Cell(15,6,utf8_decode('AREA'),1,0,'C');
        $this->Cell(15,6,utf8_decode('FOLIO_OT'),1,0,'C');
        $this->Cell(15,6,utf8_decode('ID_M'),1,1,'C');
 
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

$consulta="SELECT * from bitacora";
$resultado=$conexion->query($consulta);

$pdf = new VsPDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 8);
while($row=$resultado->fetch_assoc()){
    $pdf->Cell(20,6,$row['id_bitacora'],1,0,'C');
    $pdf->Cell(90,6,$row['descripcion_trabajo'],1,0,'C',0);
    $pdf->Cell(15,6,$row['fecha'],1,0,'C',0);
    $pdf->Cell(15,6,$row['statusOrden'],1,0,'C',0);
    $pdf->Cell(15,6,$row['id_a'],1,0,'C',0);
    $pdf->Cell(15,6,$row['folio_OT'],1,0,'C',0);
    $pdf->Cell(15,6,$row['id_m'],1,1,'C',0);
}
$pdf->Output();
?>
