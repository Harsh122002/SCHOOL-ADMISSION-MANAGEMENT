
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* Set initial widths for each column */
        th:nth-child(1),
        td:nth-child(1) {
            width: 5%;
        }

        th:nth-child(2),
        td:nth-child(2) {
            width: 15%;
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
    <h3>Students list</h3>
</div>

<div class="scroll-table">
    <table class="table">


<?php
$cn = mysqli_connect("localhost", "root", "", "db_admission");
if (!$cn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['email'])) {
    $email = mysqli_real_escape_string($cn, $_GET['email']);
    
    $sql = "SELECT * FROM student WHERE email = '$email'";
    $result = mysqli_query($cn, $sql);
    print '<table class="table">';
    print '<thead><tr><th>ID</th><th>Image</th><th>Student Name</th><th>Father Name</th><th>Birth Date</th><th>Contact</th><th>Email</th><th>Address</th><th>Class</th><th>Shift</th><th>Gender</th><th>Blood Group</th><th>Caste</th><th>District</th><th>State</th><th>Pincode</th><th>Action</th></tr></thead>';
    print '<tbody>';

//     if ($result && mysqli_num_rows($result) > 0) {
//         $row = mysqli_fetch_assoc($result);

//         // Display information
//         echo '<p><strong>ID:</strong> ' . htmlentities($row["id"]) . '</p>';
//         echo '<p><strong>Name:</strong> ' . htmlentities($row["sname"]) . '</p>';
//         echo '<p><strong>Contact:</strong> ' . htmlentities($row["contact"]) . '</p>';
        // Add more fields as needed
        while($row = mysqli_fetch_assoc($result))
        {    $imagePath = ''.$row["photo_path"];

       
        
             print '<tr>';
             print '<td >'.htmlentities($row["id"]).'</td>';
        print '<td><img src="' . $imagePath . '" alt="Student Photo" style="width:100px;"></td>';
             print '<td >'.htmlentities($row["sname"]).'</td>';
             print '<td>'.htmlentities($row["gname"]).'</td>';
        print '<td>'.htmlentities($row["birth_data"]).'</td>';
             print '<td>'.htmlentities($row["contact"]).'</td>';
             print '<td>'.htmlentities($row["email"]).'</td>';
             print '<td >'.htmlentities($row["address"]).'</td>';
             print '<td>'.htmlentities($row["class"]).'</td>';
             print '<td>'.htmlentities($row["shift"]).'</td>';
             print '<td>'.htmlentities($row["gender"]).'</td>';
             print '<td>'.htmlentities($row["blgroup"]).'</td>';
             
             print '<td>'.htmlentities($row["District"]).'</td>';
             print '<td>'.htmlentities($row["State"]).'</td>';
             print '<td>'.htmlentities($row["Pincode"]).'</td>';
             print '<td>'.htmlentities($row["Caste"]).'</td>';
             print '<td>
<a href="edit.php?id=' . $row['id'] . '" class="btn btn-success">update</a>
<a href="?did=' . $row['id'] . '" class="btn btn-danger">delete</a>
<a href="pdf.php?id=' . $row['id'] . '" class="btn btn-success">PDF

</a>
</td>';
   
        print '</tr>';
        }

        print '</tbody></table>';
    
} else {
    echo 'Invalid request.';
}
function delete() {
     global $cn;
     if ($cn && isset($_GET['did'])) {
         $id = $_GET['did'];
         $sql = "DELETE FROM student WHERE id = ?";
         $stmt = mysqli_prepare($cn, $sql);
 
         if ($stmt) {
             mysqli_stmt_bind_param($stmt, "i", $id);
             mysqli_stmt_execute($stmt);
             mysqli_stmt_close($stmt);
         } else {
             echo "Error in preparing statement: " . mysqli_error($cn);
         }
     }
 }
mysqli_close($cn);
?>
</body>
</html>