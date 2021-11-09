<?php
 require('connect.php');
session_start();
$id = $_POST['id'];

$fname = $_POST['fname'];
$lname = $_POST["lname"];
$username = $_POST["username"];
$password = $_POST["password"];
$number = $_POST["number"];

$sql = "UPDATE studen SET fname = '$fname',lname = '$lname', IDstd = '$username', Birthday = '$password', number = '$number' WHERE IDstd = '$id'";
$result = mysqli_query($connect,$sql);
if($result){
    header("location:studendata.php");
    exit(0);
}else{
    echo "เกิดช้อผิดพลาด".mysqli_error($connect);
} 
?>

