<?php
$conn = new mysqli('localhost', 'root', '', 'db_admission');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the variable from the query parameter
// $paymentId = isset($_GET['data']) ? $_GET['data'] : '';

// // Use the $paymentId variable as needed
// echo "Payment ID: " . htmlspecialchars($paymentId);
$paymentId = $_POST['payment_id'];
$status = $_POST['status'];
echo $paymentId;
$sql = "UPDATE transactions SET status = '$status' WHERE payment_id = '$paymentId'";
$conn->query($sql);
header("location:index.php");
$conn->close();
?>
