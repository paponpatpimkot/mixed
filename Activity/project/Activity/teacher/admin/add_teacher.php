<?php

  include 'navbar.php';
  include '../../connect.php';
      if(isset($_POST['submit'])){
      $name=$_POST['name'];
      $position=$_POST['position'];
      $username=$_POST['username'];
      $password=$_POST['password'];
      $sql="INSERT INTO useraccount VALUES ('$username','$password','$name','$position')";
      $result=$connect->query($sql);
      if($result){
      echo "<script>alert('เพิ่มข้อมูลสำเร็จแล้ว');
      window.location.href='teacher.php';
      </script>";
    }else{
      echo"<script>alert('ERROR : ไม่สามารถบันทึกข้อมูลได้');
      window.history.back();
      </script>";
  }
}
?>
<body>
  <br>
  <div class="container" style="width:620px;">
  <table class="table">
    <tr class="">
      <th><center>เพิ่มอาจารย์</center></th>
    </tr>
    <tr class="">
       <td>
<form action="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
  <div>
    <div>
      <label>ชื่อ</label>
      <input type="text" name="name" class="form-control" id="inputname">
    </div>
  <div>
    <label>เลือกตำแหน่ง</label>
    <select name="position" class="form-control" value="<?php echo $row['position']?>">
    <option>เลือกตำแหน่ง
            <option value="ผู้ดูแลระบบ">ผู้ดูแลระบบ</option>
            <option value="อาจารย์">อาจารย์</option>
          </option>
    </select>
  </div>
  <div class="form-group">
  <label>ชื่อผู้ใช้</label>
    <input type="text" name="username" class="form-control" id="inputusername" >
  </div><div class="form-group">
    <label>รหัสผ่าน</label>
    <input type="password" name="password" class="form-control" id="inputpassword">
  </div>
</div>
<button type="submit" name="submit" class="btn btn-primary">ยืนยัน</button>
</form>
</div>
