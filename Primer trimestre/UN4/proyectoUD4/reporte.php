<?php
require_once 'FPDF/fpdf.php';
require_once 'config/db.php';
require_once 'models/categoria.php';

class PDF extends FPDF {
    // Encabezado del reporte
    function Header() {
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 10, 'Reporte de Categorias', 0, 1, 'C');
        $this->Ln(10);
    }

    // Pie de página del reporte
    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo(), 0, 0, 'C');
    }
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);

// Conexión a la base de datos
$database = new Database();
$db = $database->getConnection();
$categoria = new Categoria($db);

// Obtener las categorías de la base de datos
$result = $categoria->getAll();

// Verifica si hay datos para mostrar
if ($result->rowCount() > 0) {
    $pdf->Cell(30, 10, 'ID', 1);
    $pdf->Cell(50, 10, 'Nombre', 1);
    $pdf->Cell(80, 10, 'Descripcion', 1);
    $pdf->Cell(30, 10, 'Año', 1);
    $pdf->Ln();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $pdf->Cell(30, 10, $row['id'], 1);
        $pdf->Cell(50, 10, utf8_decode($row['nombre']), 1);
        $pdf->Cell(80, 10, utf8_decode($row['descripcion']), 1);
        $pdf->Cell(30, 10, $row['fecha_creacion'], 1);
        $pdf->Ln();
    }
} else {
    $pdf->Cell(0, 10, 'No hay datos para mostrar.', 1, 1, 'C');
}

// Salida del archivo PDF
$pdf->Output();
