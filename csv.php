<?php
include "connection.php";

// Fetch data from database
$query = "SELECT  name, country, state, city, gender, hobbies, department, image, member FROM employees";
$result = mysqli_query($conn, $query);

// Create CSV content
$csvData = "Name,Country,State,City,Gender,Hobbies,Department,Image,Member\n";
while ($row = mysqli_fetch_assoc($result)) {
    $csvData .= implode(',', $row) . "\n";
}

// Set the Content-Type header to indicate CSV file
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="employee_data.csv"');

// Output the CSV data
echo $csvData;

// Close connection and exit
mysqli_close($conn);
exit;
?>
