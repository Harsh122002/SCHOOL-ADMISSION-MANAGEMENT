<?php
require('TCPDF/tcpdf.php');
require('phpqrcode/qrlib.php'); // Include the QR Code library

// Assuming you have a valid database connection already
$cn = mysqli_connect("localhost", "root", "", "db_admission");

if (!$cn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM student WHERE id = " . $_GET['id'];
$table = mysqli_query($cn, $sql);

if ($table) {
    $row = mysqli_fetch_assoc($table);
    $imagePath = ''.$row["photo_path"];
    $sname = $row['sname'];
    $gname = $row['gname'];
    $contact = $row['contact'];
    $email = $row['email'];
    $address = $row['address'];
    $class = $row['class'];
    $shift = $row['shift'];
    $gender = $row['gender'];
    $blgroup = $row['blgroup'];
    $District = $row['District'];
    $State = $row['State'];
    $Pincode = $row['Pincode'];
    $Caste = $row['Caste'];
    $SCHOOL = '<h3>XYZ SCHOOL</h3><p>XYZ ADDRESS, NAME OF CITY.</p><hr>';
    $note='<h5>NOTE:</h5><br><p>Please call in school Admission Dept.<br>Enquiry for your fee Structure<br>Payment Pay above QRcode<br>
    Addmission Contant =xxxxxxxx77<br><br><br>This form is generate by computer therefore nobody no neccessy Signature of head of school</p>';

    // Create PDF instance
    $pdf = new TCPDF();

    // Set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Name School');
    $pdf->SetTitle('Admission Form');

    // Add a page
    $pdf->AddPage();

    // Set font
    $pdf->SetFont('helvetica', 'B', 14);

    // Output school details in the PDF
    $pdf->writeHTML($SCHOOL, true, false, true, false, 'C');

    // Add student photo to the PDF
    if (!empty($imagePath) && file_exists($imagePath)) {
        $pdf->Image($imagePath, $pdf->GetX(), $pdf->GetY(), 30, 30, '', '', '', true, 300);
        $pdf->SetX($pdf->GetX() + 40); // Move the cursor to the right to leave space for the photo
    }

    // Set font for the text after the photo
    $pdf->SetFont('helvetica', '', 12);

    // Output student details in the PDF
    $pdf->Ln(30); // Add vertical space
    $pdf->Cell(0, 10, 'Student Name: ' . $sname, 0, 1);
    $pdf->Cell(0, 10, 'Guardian Name: ' . $gname, 0, 1);
    $pdf->Cell(0, 10, 'Contact: ' . $contact, 0, 1);
    $pdf->Cell(0, 10, 'Email: ' . $email, 0, 1);
    $pdf->Cell(0, 10, 'Address: ' . $address, 0, 1);
    $pdf->Cell(0, 10, 'District: ' . $District, 0, 1);
    $pdf->Cell(0, 10, 'Pincode: ' . $Pincode, 0, 1);
    $pdf->Cell(0, 10, 'State: ' . $State, 0, 1);
    $pdf->Cell(0, 10, 'Class: ' . $class, 0, 1);
    $pdf->Cell(0, 10, 'Shift: ' . $shift, 0, 1);
    $pdf->Cell(0, 10, 'Caste: ' . $Caste, 0, 1);
    $pdf->Ln(2);

    // Add QR Code image to the PDF from the provided link
    $qrCodeLink = 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d0/QR_code_for_mobile_English_Wikipedia.svg/1200px-QR_code_for_mobile_English_Wikipedia.svg.png';
    $pdf->Image($qrCodeLink, $pdf->GetX(), $pdf->GetY(), 30, 30, '', '', '', true, 300);
    $pdf->SetX($pdf->GetX() + 40); // Move the cursor to the right to leave space for the QR Code

    $pdf->Ln(40);
    $pdf->writeHTML($note, true, false, true, false, 'C');

    // Output the PDF to the browser
    $pdf->Output('admission_form.pdf', 'D');

} else {
    echo '<span>' . mysqli_error($cn) . '</span>';
}

mysqli_close($cn);
?>
