<?php
include '../../connect.php';
$classroom=$_GET['class_id'];
$sql="DELETE FROM classroom WHERE class_id='$classroom'";

$result=$connect->query($sql);
if($result){
  echo "<script>alert('ลบข้อมูลสำเร็จ');
        window.location.href='tcclassroom.php';
        </script>";
}else{
  echo "<script>alert('ไม่สามารถลบข้อมูลได้ เนื่องจากมีรายชื่อนักเรียนอยู่ในห้อง');
        window.location.href='tcclassroom.php';
        </script>";
}
 ?>
