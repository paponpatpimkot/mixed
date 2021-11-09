<?php

include '../navbar.php';
include '../../connect.php';
$stu_id=$_GET['stu_id'];
    $classname=$_GET['class_name'];
$sql="SELECT * FROM student WHERE stu_id='$stu_id'";
$result=$connect->query($sql);
$row=mysqli_fetch_array($result);

 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <link rel="stylesheet" href="../../css/modal.css">
   <link rel="stylesheet" href="../../css/loading.css">
   <link rel="stylesheet" href="../../css/bootstrap.css">
   <body>
 <style>
 body {font-family: 'Itim' , sans-serif;}
 </style>
 <body onload="myFunction()" style="margin:0;">

 <div id="loader"></div>
<br>
   <a href="tcstudent.php?class_id=<?php echo $row['class_id']?>&class_name=<?php echo $classname?>"class="btn"style="margin-left:282px;text-decoration:none;">ย้อนกลับ</a>

     <div class="container" style="width:1000px;">
       <div style="display:none;margin-top:10px;" id="myDiv" class="animate-bottom">
            <table class="table table-light"style="height:200px;">
              <tr class="">
                <th><center>แก้ไขข้อมูลของ <?php echo $row['stu_name']?></center></th>
              </tr>
              <tr class="">
                 <td>
 <form action="edit_student_save.php?stu_id=<?php echo $row['stu_id']?>" method="post" enctype="multipart/form-data">
   <div class="form-row">
     <div class="form-group col-md-6">
       <label style="color:#000000;">รหัสนักศึกษา</label>
       <input type="text" name="stu_id" class="form-control" id="inputstu_id" placeholder="รหัสนักศึกษา" value="<?php echo $row['stu_id']?>">
     </div>
     <div class="form-group col-md-6">
       <label style="color:#000000;">ชื่อ-นามสกุล</label>
       <input type="text" name="stu_name" class="form-control" id="inputstu_name" placeholder="ชื่อ - นามสกุล" value="<?php echo $row['stu_name']?>">
     </div>
   </div>
   <div class="form-group">
     <label stsyle="color:#000000;">รหัสห้อง</label>
     <input type="text" name="class_id" class="form-control" id="inputitclass_room" placeholder="สาขาวิชา ชั้น/ห้อง" value="<?php echo $row['class_id']?>">
   </div>
   <input type="submit" class="btn btn-primary" name="submit" id="submit" value="บันทึกข้อมูล">

   </form>

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
