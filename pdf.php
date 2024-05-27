<?php
require_once('library/tcpdf.php');
include "connection.php";

// Create new TCPDF instance
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle('Employee List');
$pdf->SetHeaderData('', 0, 'Employee List', '');
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->AddPage();

// Fetch data from database
$query = "SELECT id, name, country, state, city, gender, hobbies, department, image, member FROM employees";
$result = mysqli_query($conn, $query);

// Generate HTML table with employee data
$html = '<table border="1">
         <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Country</th>
            <th>State</th>
            <th>City</th>
            <th>Gender</th>
            <th>Hobbies</th>
            <th>Department</th>
            <th>Image</th>
            <th>Member</th>
         </tr>';

while ($row = mysqli_fetch_assoc($result)) {
    $html .= '<tr>';
    $html .= '<td>' . $row['id'] . '</td>';
    $html .= '<td>' . $row['name'] . '</td>';
    $html .= '<td>' . $row['country'] . '</td>';
    $html .= '<td>' . $row['state'] . '</td>';
    $html .= '<td>' . $row['city'] . '</td>';
    $html .= '<td>' . $row['gender'] . '</td>';
    $html .= '<td>' . $row['hobbies'] . '</td>';
    $html .= '<td>' . $row['department'] . '</td>';
    $html .= '<td><img src="http://localhost/validation/ajax/uploads/' . $row['image'] . '" style="width: 50px; height: 50px;"></td>';
    $html .= '<td>' . $row['member'] . '</td>';
    $html .= '</tr>';
}

$html .= '</table>';

// Write HTML content to PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Close and output PDF document
$pdfData = $pdf->Output('employee_data.pdf', 'S');

// Set the Content-Type header to indicate PDF file
header('Content-Type: application/pdf');

// Output the PDF data
echo $pdfData;

// Close connection and exit
mysqli_close($conn);
exit;
?>


