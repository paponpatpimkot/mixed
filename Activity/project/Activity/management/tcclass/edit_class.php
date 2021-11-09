<?php

include 'navbar.php';
include '../../connect.php';
$class_id=$_GET['class_id'];
$sql="SELECT * FROM classroom WHERE class_id='$class_id'";
$result=$connect->query($sql);
$row=mysqli_fetch_array($result);

 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>

 <body onload="myFunction()" style="margin:0;">

 <div id="loader"></div>
<br>
   <a href="tcclassroom.php?class_id=<?php echo $row['class_name']?>"class="btn"style="margin-left:282px;text-decoration:none;">ย้อนกลับ</a>

     <div class="container" style="width:1000px;">
       <div style="display:none;margin-top:10px;" id="myDiv" class="animate-bottom">
            <table class="table table-light"style="height:200px;">
              <tr class="">
                <th><center>แก้ไขข้อมูลของห้อง <?php echo $row['class_name']?></center></th>
              </tr>
              <tr class="">
                 <td>
 <form action="edit_class_save.php?class_id=<?php echo $row['class_id']?>" method="post" enctype="multipart/form-data">
   <div class="form-row">
     <div class="form-group col-md-6">
       <label style="color:#000000;">รหัสห้อง</label>
       <input type="text" name="class_id" class="form-control" id="inputclass_id" placeholder="รหัสห้อง" value="<?php echo $row['class_id']?>">
     </div>
     <div class="form-group col-md-6">
       <label style="color:#000000;">ชื่อห้อง</label>
       <input type="text" name="class_name" class="form-control" id="inputclass_name" placeholder="ชื่อห้อง" value="<?php echo $row['class_name']?>">
     </div>
   </div>
   <div class="form-group">
     <label stsyle="color:#000000;">ชื่ออาจารย์ที่ปรึกษา</label>
     <input type="text" name="teacher_name" class="form-control" id="inputTeacher_name" placeholder="ชื่ออาจารย์ที่ปรึกษา" value="<?php echo $row['teacher_name']?>">
   </div>
   <input type="submit" class="btn" name="submit" id="submit" value="บันทึกข้อมูล">

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
