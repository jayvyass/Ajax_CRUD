<?php
include ("connection.php" );
$name = $_POST['name'];
$country = $_POST['country'];
$state = $_POST['state'];
$city = $_POST['city'];
$gender = $_POST['gender'];
$hobbies = $_POST['hobbies'];
$department = $_POST['department'];
$member = $_POST['member'];
$image = $_POST['image'];
$id = $_POST['employee_id'];

$sql = "UPDATE `employees` SET `name` = '$name', `country` = '$country', `state` = '$state', `city` = '$city', `gender` = '$gender', `hobbies` = '$hobbies', `department` = '$department', `image` = '$image', `member` = '$member' WHERE `id`= ".$id;

if(mysqli_query($conn , $sql)){
    $response = [
        'status'=>'ok',
        'success'=>true,
        'message'=>'Record updated succesfully!'
    ];
    print_r(json_encode($response));
}else{
    $response = [
        'status'=>'ok',
        'success'=>false,
        'message'=>'Record updated failed!'
    ];
    print_r(json_encode($response));
} 
?>