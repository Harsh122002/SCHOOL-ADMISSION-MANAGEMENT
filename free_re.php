<?php
session_start();
$connection = mysqli_connect('localhost', 'root', '', 'db_admission');
if (isset($_SESSION['user_email'])) {
    $userId = $_SESSION['user_email'];

    // SQL query to retrieve email and name based on user ID
    $sql = "SELECT * FROM transactions WHERE email = '$userId'";

    // Execute the query
    $result = mysqli_query($connection, $sql);

    // Check if the query was successful
    if ($result) {
        // Fetch data
        $row = mysqli_fetch_assoc($result);

        if ($row) {

          
            $email_id = $row['email'];
            $user_id = $row['id'];
            $user_name = $row['name'];
            $order_id = $row['order_id'];
            $payment_id = $row['payment_id'];
            $amount = $row['amount'];
            $status = $row['status'];
            $created_at = $row['created_at'];

            // Now, you can use $user_name wherever you need to display the user's name.
        } else {
            echo "User not found in the database.";
        }

        // Free the result set
        mysqli_free_result($result);
    } else {
        // Display an error message if the query fails
        echo "Error: " . mysqli_error($connection);
    }
} else {
    echo "User not logged in.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        table {
            width: 50%;
            margin: 20px auto;
            border-collapse: collapse;
            border: 1px solid #ddd;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .button-container {
            margin-top: 20px;
            text-align: center;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            margin: 5px;
            text-align: center;
            text-decoration: none;
            color: #fff;
            background-color: #007BFF;
            border-radius: 5px;
            cursor: pointer;
        }

        .button:hover {
            background-color: #0056b3;
        }

        /* Add styles for the scroll bar */
        .scroll-table {
            max-height: 300px; /* Adjust the height as needed */
            overflow: auto;
        }
    </style>
</head>
<body>

<div class="section-title">
    <h3>User Details</h3>
</div>

<div class="scroll-table">
    <table>
        <tr>
            <th>User ID</th>
            <td><?php echo isset($user_id) ? htmlentities($user_id) : 'Not Available'; ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?php echo isset($email_id) ? htmlentities($email_id) : 'Not Available'; ?></td>
        </tr>
        <tr>
            <th>User Name</th>
            <td><?php echo isset($user_name) ? htmlentities($user_name) : 'Not Available'; ?></td>
        </tr>
        <tr>
            <th>Order ID</th>
            <td><?php echo isset($order_id) ? htmlentities($order_id) : 'Not Available'; ?></td>
        </tr>
        <tr>
            <th>Payment ID</th>
            <td><?php echo isset($payment_id) ? htmlentities($payment_id) : 'Not Available'; ?></td>
        </tr>
        <tr>
            <th>Amount</th>
            <td><?php echo isset($amount) ? htmlentities($amount) : 'Not Available'; ?></td>
        </tr>
        <tr>
            <th>Status</th>
            <td><?php echo isset($status) ? htmlentities($status) : 'Not Available'; ?></td>
        </tr>
        <tr>
            <th>Created At</th>
            <td><?php echo isset($created_at) ? htmlentities($created_at) : 'Not Available'; ?></td>
        </tr>
    </table>
</div>

<div class="button-container">
    <a class="button" href="as.php">Submit</a>
    <a class="button" href="pdf1.php?id=<?php echo isset($user_id) ? $user_id : ''; ?>" download>Download PDF</a>
</div>

</body>
</html>
