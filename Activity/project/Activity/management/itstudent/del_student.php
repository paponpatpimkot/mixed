<?php
include '../../connect.php';
$stu_id=$_GET['stu_id'];
$sql="DELETE FROM student WHERE stu_id='$stu_id'";

$result=$connect->query($sql);
if($result){
  echo "<script>alert('ลบข้อมูลสำเร็จ');
        window.location.href='../itclass/itclassroom.php';
        </script>";
}else{
  echo "<script>alert('ไม่สามารถลบข้อมูลได้');
        window.location.href='../itclass/itclassroom.php';
        </script>";
}
 ?>
