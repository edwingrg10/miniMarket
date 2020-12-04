<?php
require('../../fpdf/fpdf.php');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Logo
        $this->Image('../../images/logo2.png', 70, 2, 33);
        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Movernos a la derecha
        $this->Cell(80);
        // Título
        $this->Cell(60, 10, 'MiniMarketApp', 0, 0, 'C');
        // Salto de línea
        $this->Ln(30);

        $this->Cell(200, 10, 'Reporte de Marcas', 5, 6, 'C');

        $this->Ln(5);

        $this->Cell(65, 10, utf8_decode('Código'), 1, 0, 'C', 0);
        $this->Cell(65, 10, utf8_decode('Descripción'), 1, 0, 'C', 0);
        $this->Cell(60, 10, 'Estado', 1, 1, 'C', 0);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

require '../../conexion/cn.php';

$consulta =  "SELECT * FROM marca";
$resultado = $mysqli->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);

while ($row = $resultado->fetch_assoc()) {
    if ($row['id_estado'] == 1) {
        $row['id_estado'] = 'Activo';
    } else {
        $row['id_estado'] = 'Inactivo';
    }
    $pdf->Cell(65, 10, $row['cod_marca'], 1, 0, 'C', 0);
    $pdf->Cell(65, 10, utf8_decode($row['nombre_marca']), 1, 0, 'C', 0);
    $pdf->Cell(60, 10, $row['id_estado'], 1, 1, 'C', 0);
}

$pdf->Output();
