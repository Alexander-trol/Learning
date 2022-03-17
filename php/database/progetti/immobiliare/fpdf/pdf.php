<?php
require('fpdf.php');

class PDF extends FPDF
{
// Load data
function LoadData($file)
{
    // Read file lines
    $lines = file($file);
    $data = array();
    foreach($lines as $line)
        $data[] = explode(';',trim($line));
    return $data;
}


// Better table
function ImprovedTable($header, $data)
{
    // Column widths
    $w = array(40, 35, 40, 45);
    // Header
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C');
    $this->Ln();
    // Data
    foreach($data as $row)
    {
        $this->Cell($w[0],6,$row[0],'LR');
        $this->Cell($w[1],6,$row[1],'LR');
        $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
        $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R');
        $this->Ln();
    }
    // Closing line
    $this->Cell(array_sum($w),0,'','T');
}
}

$pdf = new PDF();
// Column headings
$header = array('Country', 'Capital', 'Area (sq km)', 'Pop. (thousands)');
// Data loading
$data = $pdf->LoadData('riepilogo.txt');
$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->ImprovedTable($header,$data);
$pdf->Output();
?>