<?php

include 'navbar.php';
include '../../connect.php';
$username=$_GET['username'];
$sql="SELECT * FROM useraccount WHERE username='$username'";
$result=$connect->query($sql);
$row=mysqli_fetch_array($result);

 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
 <style>
 body {font-family: 'Itim' , sans-serif;}
 </style>
 <body onload="myFunction()" style="margin:0;">

 <div id="loader"></div>
<br>
   <a href="teacher.php?"class="btn btn-danger"style="margin-left:282px;text-decoration:none;">ย้อนกลับ</a>

     <div class="container" style="width:1000px;">
       <div style="display:none;margin-top:10px;" id="myDiv" class="animate-bottom">
            <table class="table table-light"style="height:200px;">
              <tr class="">
                <th><center>แก้ไขข้อมูลของ <?php echo $row['name']?></center></th>
              </tr>
              <tr class="">
                 <td>
 <form action="edit_teacher_save.php?username=<?php echo $row['username']?>" method="post" enctype="multipart/form-data">
   <div class="form-row">
     <div class="form-group col-md-6">
       <label style="color:#000000;">ชื่อผู้ใช้งาน</label>
       <input type="text" name="username" class="form-control" id="inputusername" placeholder="username" value="<?php echo $row['username']?>">
     </div>
     <div class="form-group col-md-6">
       <label style="color:#000000;">รหัสผ่าน</label>
       <input type="password" name="password" class="form-control" id="inputpassword" placeholder="password" value="<?php echo $row['password']?>">
     </div>
   </div>
   <div class="form-group">
     <label stsyle="color:#000000;">ชื่ออาจารย์</label>
     <input type="text" name="name" class="form-control" id="inputTeacher_name" placeholder="ชื่ออาจารย์" value="<?php echo $row['name']?>">
   </div>
   <div class="form-group">
     <label>ตำแหน่ง</label>
     <select name="position" class="form-control"value="<?php echo $row['position']?>">
     <option value="<?php echo $row['position']?>"selected>
           <?php
   if($row['position']==0){
     echo $row['position'];
   }elseif($row['position']==1){
       echo "ผู้จัดการ";
     }elseif($row['position']==2){
       echo "พนักงานสินเชื่อ";
     }
     ?>
   </option>
             <option value="1">ผู้ดูแลระบบ</option>
             <option value="2">อาจารย์</option>
    </select>
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
