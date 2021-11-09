<?php
 require('connect.php');
session_start();
$id = $_POST['id'];

$namesj = $_POST['namesj'];
$theoreticalhours = $_POST["theoreticalhours"];
$practicehours = $_POST["practicehours"];
$littlekit = $_POST["littlekit"];
$type = $_POST["type"];

$sql = "UPDATE subjects SET namesj = '$namesj',theoreticalhours = '$theoreticalhours', practicehours = '$practicehours', littlekit = '$littlekit', sjtype = '$type' WHERE IDsj = '$id'";
$result = mysqli_query($connect,$sql);
if($result){
    header("location:rjtsj.php");
    exit(0);
}else{
    echo "เกิดช้อผิดพลาด".mysqli_error($connect);
} 
?>

