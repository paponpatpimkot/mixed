<?php
include '../../connect.php';
$classroom=$_GET['class_id'];
$sql="DELETE FROM student WHERE class_id='$classroom'";

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
