<?php
    require('connect.php');
    session_start();
    $id = $_POST['id'];
    $type = $_POST['type'];

    $sql = "UPDATE petition SET type = '$type' WHERE IDptt = '$id'";
$result = mysqli_query($connect,$sql);
if($type == 4){
    header("location:rjtstd.php");
    exit(0);
}
if($result){
    header("location:indexpsn.php");
    exit(0);
}else{
    echo "เกิดช้อผิดพลาด".mysqli_error($connect);
} 
?>