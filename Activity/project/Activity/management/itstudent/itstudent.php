<?php

  include 'navbar.php';
  include '../../connect.php';
  $classroom=$_GET['class_id'];
  $classname=$_GET['class_name'];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>

<body onload="myFunction()" style="margin:0;">

<div id="loader"></div>
<div class="container" style="width=600px;margin-top:30px;">
  <a href="../itclass/itclassroom.php"class="btn btn-danger"style="margin-bottom:10px;text-decoration:none;">ย้อนกลับ</a>
  <a href="add_student.php?class_id=<?php echo $classroom?>&class_name=<?php echo $classname?>"class="btn btn-primary"style="margin-bottom:10px;text-decoration:none;">เพิ่มรายชื่อนักเรียน</a>
  <a href = "del_allstudent.php?class_id=<?php echo $classroom?>" class="btn btn-warning" style="margin-bottom:10px; margin-left:742px;text-decoration:none;">ลบรายชื่อทั้งหมด</a>
<div style="display:none;margin-top:10px;" id="myDiv" class="animate-bottom">
  <table class ="table table-striped" border="1">
  <tr >
        <th><center>ลำดับที่</th>
        <th><center>รหัสนักศึกษา</th>
        <th><center>ชื่อ</th>
        <th><center>รหัสห้อง</th>
        <th><center>การจัดการ</th>
  </tr>
      <?php
      $sql= "SELECT * FROM student WHERE class_id='$classroom'";
      $result=$connect->query($sql);
      $i=1;
      while($row=mysqli_fetch_array($result)){
        ?>
        <tr >
          <td><center><?php echo $i ?></td>
          <td><center><?php echo $row['stu_id']?></td>
          <td><center><?php echo $row['stu_name']?></td>
          <td><center><?php echo $classname ?></td>

          <td><center><a href = "edit_stu.php?stu_id=<?php echo $row['stu_id']?>&class_name=<?php echo $classname?>">แก้ไข</a> /
          <a href = "del_student.php?stu_id=<?php echo $row['stu_id']?>">ลบ</a>
        </tr>

            <?php
          $i++;
}
           ?>
</div>
</table>
</body>
</html>

<script>
var myVar;

function myFunction() {
  myVar = setTimeout(showPage, 0000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}
</script>
