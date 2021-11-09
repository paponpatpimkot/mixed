<?php
include '../../connect.php';

  $stu_id=$_GET['stu_id'];
  $stu_name=$_POST['stu_name'];
  $classroom=$_POST['class_id'];
  $sql="UPDATE student SET stu_id='$stu_id',stu_name='$stu_name',class_id='$classroom' WHERE stu_id='$stu_id'";
  $result=$connect->query($sql);
if($result){
  echo "<script>alert('แก้ไขข้อมูลสำเร็จ');
        window.location.href='../itclass/itclassroom.php';
        </script>";
}else {
  echo "<script>alert('ERROR : ไม่สามารถแก้ไขช้อมูลได้');
  window.history.back()</script>";
    }
?>
