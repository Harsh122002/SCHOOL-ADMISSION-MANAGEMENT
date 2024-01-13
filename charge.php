<?php
require_once('C:\xampp\htdocs\students\razorpay-php-testapp-master\razorpay-php\Razorpay.php'); // Include Razorpay PHP SDK

function generatePaymentId() {
    $prefix = 'PAY'; // You can customize the prefix
    $randomPart = uniqid($prefix, true); // Unique ID with microsecond precision

    // Add additional random characters to ensure uniqueness
    $additionalRandomChars = bin2hex(random_bytes(4));

    // Combine the prefix, uniqid, and additional random characters
    $paymentId = $prefix . $randomPart . $additionalRandomChars;

    return $paymentId;
}

// Example usage
$paymentId = generatePaymentId();

// Initialize Razorpay
$razorpay = new Razorpay\Api\Api('rzp_test_04excYMhTTXEIA', 'obz0lpTNYqFBTYGUwD0fv34w');

// Fetch amount from the form
$amount = $_POST['amount'] * 100; // Convert amount to paise
$name=$_POST['name'];
$email=$_POST['email'];
// Create a Razorpay order
$order = $razorpay->order->create(array(
    'amount' => $amount,
    'currency' => 'INR',
));

$orderId = $order->id;

// Store order details in the database (You can enhance this to store other details)
$conn = new mysqli('localhost', 'root', '', 'db_admission');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO transactions (name, email, order_id, payment_id, amount, status) VALUES ('$name', '$email', '$orderId', '$paymentId', '" . $_POST['amount'] . "', 'success')";
$conn->query($sql);

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Razorpay Integration</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<body>

    <!-- <h1>school</h1> -->
    <script>
        var options = {
            key: 'rzp_test_04excYMhTTXEIA',
            amount: <?php echo $amount; ?>,
            currency: 'INR',
            name: 'Your Company Name',
            description: 'Payment for your service',
            order_id: '<?php echo $orderId; ?>',
            handler: function (response) {
    // You can handle the success response here
    console.log(response);

    // Check the structure of the response and find the payment ID
    // For example, if the payment ID is in response.id, update accordingly
    var paymentId = response.id;

    // Update the transaction status in the database
    $.post('update_status.php', { payment_id: paymentId, status: 'Success' })
        .done(function(data) {
            // Successful response from update_status.php
            alert('Payment successful!');
            
            // Redirect to update_status.php with payment_id in the URL
            window.location.href = "free_re.php"; 
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            // Failure in the $.post request
            console.error("Error updating status:", textStatus, errorThrown);
            alert('Error updating status. Please try again.');
        });
},


            prefill: {
                name: 'John Doe',
                email: 'john@example.com',
                contact: '1234567890'
            },
            theme: {
                color: '#F37254'
            }
        };
        var rzp = new Razorpay(options);
        rzp.open();
    </script>
</body>
</html>
