<?php

  include 'navbar.php';
  include '../../connect.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
<body onload="myFunction()" style="margin:0;">

<div id="loader"></div>


  <div class="container" style=";margin-top:30px;">
    <a href="../field.php"class="btn btn-danger"style="margin-bottom:10px;text-decoration:none;">ย้อนกลับ</a>
<a href="add_class.php"class="btn btn-primary"style="margin-bottom:10px;text-decoration:none;">เพิ่มห้อง</a>
  <div style="display:none;margin-top:10px;" id="myDiv" class="animate-bottom">
      <table class ="table table-striped" border="1">
    <tr >
          <th><center>ลำดับที่</th>
          <td><center>รหัสห้อง</td>
          <td><center>ชื่อห้อง</td>
          <td><center>อาจารย์ที่ปรึกษา</td>
          <td><center>การจัดการ</td>
          <td><center>รายละเอียด</td>
    </tr>
        <?php
        $sql= "SELECT * FROM classroom WHERE class_name like 'ทค%' ORDER BY class_name ASC;  ";
        $result=$connect->query($sql);
        $i=1;
        while($row=mysqli_fetch_array($result)){
          ?>
          <tr >
            <td><center><?php echo $i ?></td>
            <td><center><?php echo $row['class_id']?></td>
            <td><center><?php echo $row['class_name']?></td>
            <td><center><?php echo $row['teacher_name']?></td>

            <td><a href = "edit_class.php?class_id=<?php echo $row['class_id']?>"><center>แก้ไข</a> /
            <a href = "del_class.php?class_id=<?php echo $row['class_id']?>">ลบ</a></td>
            <td><a href = "../tcstudent/tcstudent.php?class_id=<?php echo $row['class_id']?>&class_name=<?php echo $row['class_name']?>"><center>รายชื่อนักเรียน</a></td>

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

</body>
</html>
