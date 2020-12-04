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

        $this->Cell(200, 10, 'Reporte de Pagos', 5, 6, 'C');

        $this->Ln(5);

        $this->Cell(15, 10, utf8_decode('Id'), 1, 0, 'C', 0);
        $this->Cell(25, 10, utf8_decode('Valor'), 1, 0, 'C', 0);
        $this->Cell(30, 10, utf8_decode('Fecha'), 1, 0, 'C', 0);
        $this->Cell(40, 10, utf8_decode('Tipo Pago'), 1, 0, 'C', 0);
        $this->Cell(60, 10, utf8_decode('Banco'), 1, 0, 'C', 0);
        $this->Cell(25, 10, 'Estado', 1, 1, 'C', 0);
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

$consulta =  "SELECT * FROM pago";
$resultado = $mysqli->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);

while ($row = $resultado->fetch_assoc()) {
    if ($row['id_tipo_pago'] == 1) {
        $row['id_tipo_pago'] = 'Efectivo';
    }
    if ($row['id_tipo_pago'] == 2) {
        $row['id_tipo_pago'] = 'PSE';
    }
    if ($row['id_tipo_pago'] == 3) {
        $row['id_tipo_pago'] = 'Transferencia';
    }
    if ($row['id_tipo_pago'] == 4) {
        $row['id_tipo_pago'] = 'TC';
    }
    $pdf->Cell(15, 10, $row['cod_pago'], 1, 0, 'C', 0);
    $pdf->Cell(25, 10, utf8_decode($row['valor']), 1, 0, 'C', 0);
    $pdf->Cell(30, 10, utf8_decode($row['fecha_pago']), 1, 0, 'C', 0);
    $pdf->Cell(40, 10, utf8_decode($row['id_tipo_pago']), 1, 0, 'C', 0);
    $pdf->Cell(60, 10, utf8_decode($row['banco']), 1, 0, 'C', 0);
    $pdf->Cell(25, 10, $row['estado'], 1, 1, 'C', 0);
}

$pdf->Output();
