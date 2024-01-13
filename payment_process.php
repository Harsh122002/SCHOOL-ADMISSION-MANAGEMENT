<?php
require 'C:\xampp\htdocs\students\TCPDF\tcpdf_autoconfig.php'; // adjust the path as needed
use \TCPDF as TCPDF;

// Get the payment ID from the POST request
$paymentId = isset($_POST['payment_id']) ? $_POST['payment_id'] : '';

if ($paymentId) {
    // Generate PDF
    $pdf = new TCPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(40, 10, 'Payment ID: ' . $paymentId);
    $pdfContent = $pdf->Output('payment_receipt.pdf', 'S'); // Get PDF content

    // Save PDF content to a file or database as needed
    // For example, save to a file
    file_put_contents('path/to/save/payment_receipt.pdf', $pdfContent);

    // Save payment ID to the database (replace with your database code)
    // $pdo = new PDO(...); // Replace with your database connection code
    // $stmt = $pdo->prepare("INSERT INTO payments (payment_id) VALUES (:payment_id)");
    // $stmt->bindParam(':payment_id', $paymentId);
    // $stmt->execute();

    // Respond to the AJAX request
    echo 'success';
} else {
    echo 'error';
}
