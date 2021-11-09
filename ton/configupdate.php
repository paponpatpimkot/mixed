<?php
 require('connect.php');
session_start();
$IDam = $_POST['IDam'];
$Nameam = $_POST['Nameam'];

$sql = "UPDATE admid SET Nameam = '$Nameam' WHERE IDam = '$IDam'";
$result = mysqli_query($connect,$sql);
echo $IDam;
if($result){
    header("location:config.php");
    exit(0);
}else{
    echo "เกิดช้อผิดพลาด".mysqli_error($connect);
} 
?>
