<?php include 'navbar.php' ?>
<?php include '../../connect.php' ?>
<?php
$classroom=$_GET['class_id'];
$classname=$_GET['class_name'];
  ?>
    <div class="container">
      <?php
            if(isset($_POST['submit'])){

            $stu_id=$_POST['stu_id'];
            $stu_name=$_POST['stu_name'];
            $classroom=$_POST['class_id'];
            $sql="INSERT INTO student VALUES ('$stu_id','$stu_name','$classroom')";
            $result=$connect->query($sql);
            if($result){
              echo "<script>alert('เพิ่มข้อมูลสำเร็จแล้ว');
              window.location.href='../itclass/itclassroom.php';
              </script>";
          }else{
            echo"<script>alert('ERROR : ไม่สามารถบันทึกข้อมูลได้');
            window.history.back();
            </script>";
        }
      }
      ?>
      <html lang="en" dir="ltr">
        <head>
          <meta charset="utf-8">
          <title></title>
        </head>

        <br>
        <div class="container" style="width:1000px;">
            <a href="itstudent.php?class_id=<?php echo $classroom?>&class_name=<?php echo $classname?>"class="btn btn-danger"style="margin-bottom:10px;text-decoration:none;">ย้อนกลับ</a>
        <table class="table table-light ">
          <tr class="">
            <th><center>เพิ่มนักเรียน</center></th>
          </tr>
          <tr class="">
             <td>
      <form action="<?php $_SERVER['PHP_SELF']?>"  method="post" enctype="multipart/form-data">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label style="color:#000000;">รหัสประจำตัวนักศึกษา</label>
            <input type="text" name="stu_id" class="form-control" id="inputStu_id" placeholder="กรุณากรอกรหัสประจำตัวนักศึกษา">
          </div>
          <div class="form-group col-md-6">
            <label style="color:#000000;">ชื่อ-นามสกุล</label>
            <input type="text" name="stu_name" class="form-control" id="inputStu_name" placeholder="กรุณากรอกชื่อ-นามสกุลของนักศึกษา">
          </div>
        </div>
        <div class="form-group col-md-14">
          <label style="color:#000000;">รหัสห้อง</label><br>
          <input type="text" style="width:210px" name="class_id" class="form-control" id="inputItclassroom" placeholder="กรุณากรอก สาขาวิชา ชั้น/ปี">
              </div>


        </div>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">เพิ่มรายชื่อ</button>
      </form>
        <tr class="">
          <th><center>เพิ่มนักเรียนผ่านไฟล์ CSV</center></th>
        </tr>
        <tr class="">
           <td>
      <form action="upload_stu.php" method="post" enctype="multipart/form-data" name="form1">
        <div class="form-group">
          <label style="color:#ffffff;">นำไฟล์ CSV เข้า</label>
      <input name="stu_csv" type="file" class="form-control" id="stu_csv" style="width:450px;">
      <input name="btnSubmit" name="btnSubmit" type="submit" id="btnSubmit" class="btn btn-primary" value="นำเข้า" style="float:right;margin-top:-42px;margin-right:15px;">
      </div>

      </form>
</div>
</div>
</form>
