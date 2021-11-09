<?php

include 'navbar.php';
include '../connect.php';
$Education_Years=$_POST['education'];
$name = $_POST['event'];
$classroom=$_POST['classroom'];
$date = $_POST['eventdate'];
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>

    <div class="container" style="width=600px;margin-top:30px;">
    <a href="teacher_examine.php" class="btn btn-danger"style="margin-bottom:10px;text-decoration:none;">ย้อนกลับ</a>
    <form action="teacher_edit_event_save.php" method="post" enctype="multipart/form-data">
    <table class ="table table-striped" border="1">
      <div class="form-row">
      ปีการศึกษา : <input type="text" name="education_year" value="<?php echo $Education_Years?>"class="form-control" id="inputDatename" style="width:90px; height:20px;" >
    </div>
      <tr>
          <th rowspan="2"><center>ลำดับที่</th>
          <th rowspan="2"><center>รหัสนักศึกษา</th>
          <th rowspan="2"><center>ชื่อ-นามสกุล</th>
          <th colspan="2">
            <div class="form-row">
           ประเภทของกิจกรรม : <input type="text" name="checkname" value="<?php echo $name?>"class="form-control" id="inputDatename" style="width:70px; height:20px;" >

           วันของกิจกรรม<input type="date" name="eventdate" class="form-control" style="width:168px; height:20px;" value="<?php echo $date ?>">
         </div><br>
             <div class="form-row">
           วันที่ตรวจสอบข้อมูล : <input type="text" name="checkdate" class="form-control" id="inputDates" class="form-control" id="inputDates" style="width:170px; height:20px;" value="<?php echo date_th(date('d-m-Y'))?>"></th>
           </div>
    </tr>

     <tr><th><center>มา</th>
       <th><center>ขาด</th>
     </tr>
     <?php
     $sql= "SELECT * FROM student WHERE class_id='$classroom'";
     $result=$connect->query($sql);
     $i=1;
     while($row=mysqli_fetch_array($result)){
       ?>
       <tr>

         <td><center><?php echo $i ?></td>
         <td><center><?php echo $row['stu_id']?><input type="hidden" name="id[<?php echo $i?>]" value="<?php echo $row['stu_id']?>"></td>
           <td><center><?php echo $row['stu_name']?></td>
         <td><center>


           <?php

           $sql1 = "SELECT * FROM checked WHERE checked_name LIKE '$name' AND education_year = '".$Education_Years."' AND stu_id = '".$row['stu_id']."' AND eventdate = '".$date."' ";
           $result1 = $connect->query($sql1);
           $row = mysqli_fetch_array($result1);

           if ($row['checked_status']==1) {
             ?>
             <input type="radio" name="wed[<?php echo $i?>]" checked="checked" class="form-control" id="inputwedcomein" value="1" style="width:105px;height:20px" ></td>
         <td><center>
             <input type="radio" name="wed[<?php echo $i?>]" class="form-control" id="inputwedabsent" value="2" style="width:110px;height:20px" ></td>
             <?php
           }elseif ($row['checked_status']==0) {
             ?>
             <input type="radio" name="wed[<?php echo $i?>]"  class="form-control" id="inputwedcomein" value="1" style="width:105px;height:20px" ></td>
         <td><center>
             <input type="radio" name="wed[<?php echo $i?>]" checked="checked" class="form-control" id="inputwedabsent" value="2" style="width:110px;height:20px" ></td>
              <?php
            }else {
              ?>
              </td>
          <td></td>
<?php }?>
       </tr>

           <?php
         $i++;
}
          ?>
  </div>
  </table>
<input type="submit" class="btn btn-primary" name="submit" id="submit" value="บันทึกข้อมูล">
</form>
  </body>
</html>
