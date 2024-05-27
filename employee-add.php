 <?php
include("connection.php");
$name = $_POST['name'];
$country = $_POST['country'];
$state = $_POST['state'];
$city = $_POST['city'];
$gender = $_POST['gender'];
$hobbies = $_POST['hobbies'];
$department = $_POST['department'];
$member = $_POST['member'];
$image = $_POST['image'];

$sql = "INSERT INTO employees (name, country, state, city, gender, hobbies, department, member, image)
        VALUES ('$name', '$country', '$state', '$city', '$gender', '$hobbies', '$department', '$member', '$image')";

if(mysqli_query($conn, $sql)) {
    $response = [
        'status' => 'ok',
        'success' => true,
        'message' => 'Record created successfully!'
    ];
    echo json_encode($response);
} else {
    $response = [
        'status' => 'error',
        'success' => false,
        'message' => 'Error: ' . mysqli_error($conn)
    ];
    echo json_encode($response);
}
?> 


