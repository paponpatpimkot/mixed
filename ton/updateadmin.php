<?php
 require('connect.php');
session_start();
$id = $_POST['id'];

$fname = $_POST['fname'];
$lname = $_POST["lname"];
$username = $_POST["username"];
$password = $_POST["password"];
$type = $_POST["type"];

$sql = "UPDATE personnel SET fname = '$fname',lname = '$lname', username = '$username', password = '$password', IDtype = '$type' WHERE IDpsn = '$id'";
$result = mysqli_query($connect,$sql);
if($result){
    header("location:admindata.php");
    exit(0);
}else{
    echo "เกิดช้อผิดพลาด".mysqli_error($connect);
} 
?>

