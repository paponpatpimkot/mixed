<?php
require('connect.php');

$id = $_POST['id'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$username = $_POST['username'];
$password = $_POST['password'];
$dpm = $_POST['dpm'];
$type = $_POST['type'];

echo $id,$fname,$lname,$username,$password,$dpm,$type;
$sql = "INSERT INTO personnel(IDpsn,fname,lname,username,password,IDdpm,IDtype) VALUES($id,'$fname','$lname','$username','$password','$dpm','$type')";

$result = mysqli_query($connect,$sql);

if($result){
    header("location:admindata.php");
    exit(0);
}else{
    echo mysqli_errors($connect);
}
?>