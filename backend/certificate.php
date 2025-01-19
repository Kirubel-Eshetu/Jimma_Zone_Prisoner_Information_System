<?php
require_once('tcpdf/tcpdf.php');

// Get prisoner details from the query parameters
$prisonerId = $_GET['prisonerId'];
$fullName = $_GET['fullname'];
$date = $_GET['date'];

// Create a new PDF document
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

// Set document information
$pdf->SetCreator('Biruk Manaye');
$pdf->SetAuthor('Jimma Zone Prison Administration');
$pdf->SetTitle('Certificate of Preparation for Reentry');
$pdf->SetSubject('Certificate');
$pdf->SetKeywords('Certificate, Reentry, Prisoner');

// Add a page to the PDF
$pdf->AddPage();

// Set font
$pdf->SetFont('helvetica', 'B', 16);

// Add title
$pdf->Cell(0, 10, 'Jimma Zone Prisoner Information System', 0, 1, 'C');
$pdf->Cell(0, 10, 'Certificate of Preparation for Reentry', 0, 1, 'C');

// Add prisoner details
$pdf->SetFont('helvetica', '', 12);
$pdf->Cell(0, 10, '', 0, 1); // Add some space
$pdf->MultiCell(0, 10, "This is to certify that the prisoner named below has successfully completed the Preparation for\nReentry program in Jimma Zone Prison Administration:", 0, 'L');
$pdf->Cell(0, 10, 'Prisoner ID: ' . $prisonerId, 0, 1);
$pdf->Cell(0, 10, 'Full Name: ' . $fullName, 0, 1);
$pdf->Cell(0, 10, 'Date of Completion: ' . $date, 0, 1);


$pdf->Output('Certificate_of_Preparation_for_Reentry.pdf', 'I');
?>
