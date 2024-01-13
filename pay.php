<?php
session_start();
$connection = mysqli_connect('localhost', 'root', '', 'testing');
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];

    // SQL query to retrieve email and name based on user ID
    $sql = "SELECT user_email, user_name FROM register_user WHERE register_user_id = '$userId'";

    // Execute the query
    $result = mysqli_query($connection, $sql);

    // Check if the query was successful
    if ($result) {
        // Fetch data
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            $email_id = $row['user_email'];
            $user_name = $row['user_name'];

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

// Close the connection
mysqli_close($connection);

// $connection = mysqli_connect('localhost', 'root', '', 'db_admission');
// $sql = "SELECT email, name FROM transactions WHERE email = '$email_id'";
// $result = mysqli_query($connection, $sql);

// if(isset($result)){
//     header("location:student.php");
// }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Razorpay Integration</title>
    
    <!-- Add your custom styles here -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        form {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 20px;
            max-width: 400px;
            width: 100%;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            color: #333;
        }

        input {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #CFCBCA;
            border: none;
            padding: 10px 20px;
            color: #333;
            cursor: pointer;
            display: block;
            width: 100%;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #333;
            color: #fff;
        }
    </style>
</head>
<body>
    <form action="charge.php" method="POST">
        <h2>Payment Form</h2>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?php echo print $user_name; ?>" required><br>

        <label for="email">Email:</label>
        <input type="text" name="email" value="<?php print $email_id; ?>" readonly>

        <label for="amount"> Admission Free Amount:</label>
        <input type="text" name="amount" id="amount" value=5000 readonly><br>

        <!-- Add other necessary fields here -->

        <button type="submit">Pay Now</button>
    </form>
</body>
</html>
