<?php
session_start();
require('connect.php');
$idstd = $_SESSION['username'];
$id = $_GET['id'];

$sql = "INSERT INTO register(IDsj,IDstd) VALUES('$id','$idstd')";

$result = mysqli_query($connect,$sql);

if($result){
    $_SESSION['success'] = "ยื่นคำร้องเสร็จสิ้น";
    header("location:index.php");
    exit(0);
}else{
    echo mysqli_errors($connect);
}
?>