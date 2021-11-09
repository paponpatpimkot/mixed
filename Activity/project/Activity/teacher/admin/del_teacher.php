<?php
include '../../connect.php';
$username=$_GET['username'];
$sql="DELETE FROM useraccount WHERE username='$username'";

$result=$connect->query($sql);
if($result){
  echo "<script>alert('ลบข้อมูลสำเร็จ');
        window.location.href='teacher.php';
        </script>";
}else{
  echo "<script>alert('ไม่สามารถลบข้อมูลได้');
          window.history.back()</script>";

}
 ?>
