<?php
include '../../connect.php';
  $username=$_GET['username'];
  $user=$_POST['username'];
  $password=$_POST['password'];
  $name=$_POST['name'];
  $position=$_POST['position'];
  $sql="UPDATE useraccount SET username='$user',password='$password',name='$name',position='$position' WHERE username='$username'";
  $result=$connect->query($sql);
if($result){
  echo "<script>alert('แก้ไขข้อมูลสำเร็จแล้ว');
  window.location.href='index.php'</script>";
}else {
  echo "<script>alert('ERROR : ไม่สามารถแก้ไขช้อมูลได้');
  window.history.back()</script>";
}
?>
