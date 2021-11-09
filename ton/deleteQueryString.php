<?php
require('connect.php');
$id = $_GET["idpsn"];

$sql = "DELETE FROM personnel WHERE IDpsn = '$id'";

$result = mysqli_query($connect,$sql);
echo $id;
if($result){
    header("location:admindata.php");
    exit(0);
}else{
    echo "เกิดช้อผิดพลาด".mysqli_error($connect);
}
?>