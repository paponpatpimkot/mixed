<?php
include 'navbar.php';
include '../../connect.php';
$sql="SELECT * FROM useraccount";
$result=$connect->query($sql);
$row=mysqli_fetch_array($result);

 ?>
 <body>
     <br>
     <div class="container" style="width:620px;">
     <table class="table">

         <th><center>แก้ไขข้อมูลส่วนตัว</center></th>

       <tr>
          <td>
 <link rel="stylesheet" href="../../css/bootstrap.css">
 <form action="edit_teacher_save.php?username=<?php echo $row['username']?>" method="post" enctype="multipart/form-data">
     <div>
       <label>ชื่อ - นามสกุล</label>
       <input type="text" name="name" class="form-control" value="<?php echo $row['name'] ?>">
     </div>
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
   <div>
   <label>ยูสเซอร์ไอดี</label>
     <input type="text" name="username" class="form-control" value="<?php echo $row['username'] ?>">
   </div><div class="form-group">
     <label>รหัสผ่าน</label>
      <input type="password" name="password" class="form-control" value="<?php echo $row['password'] ?>">
      </div>
            <input type="submit" class="btn btn-primary" name="submit"  value="แก้ไขข้อมูลส่วนตัว">
          </div>
        </form>
