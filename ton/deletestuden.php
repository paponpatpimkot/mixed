<?php
require('connect.php');
$id = $_GET["id"];

$sql = "DELETE FROM studen WHERE IDstd = '$id'";

$result = mysqli_query($connect,$sql);
echo $id;
if($result){
    header("location:studendata.php");
    exit(0);
}else{
    echo "เกิดช้อผิดพลาด".mysqli_error($connect);
}
?>