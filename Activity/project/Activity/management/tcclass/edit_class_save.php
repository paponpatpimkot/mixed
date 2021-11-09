<?php
include '../../connect.php';

  $class_id=$_GET['class_id'];
  $classname=$_POST['class_name'];
  $teachername=$_POST['teacher_name'];
  $sql="UPDATE classroom SET class_id='$class_id',class_name='$classname',teacher_name='$teachername' WHERE class_id='$class_id'";
  $result=$connect->query($sql);
if($result){
  echo "<script>alert('แก้ไขข้อมูลสำเร็จ');
        window.location.href='../tcclass/tcclassroom.php';
        </script>";
}else {
  echo "<script>alert('ERROR : ไม่สามารถแก้ไขช้อมูลได้');
  window.history.back()</script>";
    }
?>
