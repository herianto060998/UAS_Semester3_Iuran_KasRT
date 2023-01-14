<?php
include '../config.php';
require('../templates/fpdf/fpdf.php');
 
$pdf = new FPDF('L', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 7, 'DATA WARGA', 0, 1, 'C');
$pdf->Cell(10, 7, '', 0, 1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(8, 6, 'No', 1, 0, 'C');
$pdf->Cell(100, 6, 'NIK', 1, 0, 'C');
$pdf->Cell(170, 6, 'Nama', 1, 1, 'C');
$pdf->Cell(180, 6, 'Jenis Kelamin', 1, 1, 'C');
$pdf->Cell(170, 6, 'Alamat', 1, 1, 'C');
$pdf->Cell(170, 6, 'No Rumah', 1, 1, 'C');
$pdf->Cell(170, 6, 'Status', 1, 1, 'C');
$pdf->SetFont('Arial', '', 10);
$sql = "SELECT * FROM warga";
$query_warga = mysqli_query($conn, $sql);
$no = 1;
while ($warga = $query_warga->fetch_object()) {
    $pdf->Cell(8, 6, $no, 1, 0);
    $pdf->Cell(100, 6, $warga->nik, 1, 0);
    $pdf->Cell(170, 6, $warga->nama, 1, 1);
    $pdf->Cell(180, 6, $warga->kelamin, 1, 1);
    $pdf->Cell(170, 6, $warga->alamat, 1, 1);
    $pdf->Cell(170, 6, $warga->no_rumah, 1, 1);
    $pdf->Cell(170, 6, $warga->status, 1, 1);
    $no++;
}

$pdf->Output();
