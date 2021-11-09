<?php include 'navbar.php' ?>
<?php include '../../connect.php' ?>
    <?php
          if(isset($_POST['submit'])){
          $classroom=$_POST['class_id'];
          $classname=$_POST['class_name'];
          $teachername=$_POST['teacher_name'];
      $sql="INSERT INTO classroom VALUES ('$classroom','$classname','$teachername')";
          $result=$connect->query($sql);
          if($result){
          echo "<script>alert('เพิ่มข้อมูลสำเร็จแล้ว');
          window.location.href='tcclassroom.php';
          </script>";
        }else{
          echo"<script>alert('ERROR : ไม่สามารถบันทึกข้อมูลได้');
          window.history.back();
          </script>";
      }
    }
    ?>
<br><br>
  <!DOCTYPE html>
  <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title></title>
    </head>

    <div class="container" style="width:1000px;">
          <a href="tcclassroom.php"class="btn btn-danger"style="margin-bottom:10px;text-decoration:none;">ย้อนกลับ</a>
    <table class="table table-light ">
      <tr class="">
        <th><center>เพิ่มชั้นเรียน</center></th>
      </tr>
      <tr class="">
         <td>
  <form action="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label style="color:#000;">รหัสห้อง</label>
        <input type="text" name="class_id" class="form-control" id="inputClass_id" placeholder="กรุณากรอกรหัสห้อง">
      </div>
      <div class="form-group col-md-6">
        <label style="color:#000;">ชื่อห้อง</label>
        <input type="text" name="class_name" class="form-control" id="inputClass_name" placeholder="กรุณากรอกชื่อห้อง">
      </div>
      <div class="form-group col-md-12">
        <label style="color:#000;">ชื่ออาจารย์ที่ปรึกษา</label>
        <input type="text" name="teacher_name" class="form-control" id="inputTeacher_name" placeholder="กรุณากรอกชื่ออาจารย์ที่ปรึกษา">
      </div>
    </div>
    <button type="submit" name="submit" class="btn">เพิ่มห้อง</button>
  </form>
    <tr class="">
      <th><center>เพิ่มรายชื่อห้องที่ละหลายห้อง</center></th>
    </tr>
    <tr class="">
       <td>
  <form action="../upload_class.php" method="post" enctype="multipart/form-data" name="form1">
    <div class="form-group">
      <label style="color:#000;">นำไฟล์ CSV เข้า</label>
  <input name="class_csv" type="file" class="form-control" id="class_csv" style="width:450px;">
  <input name="btnSubmit" name="btnSubmit" type="submit" id="btnSubmit" class="btn" value="นำไฟล์เข้า" style="float:right;margin-top:-42px;margin-right:15px;">
  </div>


</div>
</form>
