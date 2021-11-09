<?php
include 'navbar.php';
include '../connect.php';
$class_id=$_POST['classroom'];
$Education_Years=$_POST['education'];
error_reporting(0);
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <div class="container" style="width=600px;margin-top:30px;">

     <a href="select.php"class="btn btn-danger"style="margin-bottom:10px;text-decoration:none;">ย้อนกลับ</a>
      <a href="export_excel.php?class_id=<?php echo $class_id ?>&education_year=<?php echo $Education_Years ?>"
        class="btn btn-primary"style="margin-bottom:10px;text-decoration:none;">Export to Excel</a>
<?php $sql1 = "SELECT * FROM classroom WHERE class_id='$class_id'";
  $result1 = $connect->query($sql1);
  while ($row1=mysqli_fetch_array($result1)) {
?>
  <center><h3> ห้อง : <?php echo $row1['class_name'] ?></h3>
<?php } ?>

     <form action="#" id="print-content" method="post" enctype="multipart/form-data">
     <table class ="table table-striped" border="1">
     <tr style="background:#2E64FE; color:white;">
           <th rowspan="2"><center><br>ลำดับที่</th>
           <th rowspan="2"><center><br>รหัสนักศึกษา</th>
           <th rowspan="2"><center><br>ชื่อ-นามสกุล</th>
           <th colspan="4"><center>ผลกิจกรรมวันพุธ </th>
           <th colspan="4"><center>ผลกิจกรรมวันศุกร์ </th>
           <th rowspan="2"><center><br>ผลการประเมิน </th>
     </tr>

      <tr style="background:#2E64FE; color:white;">
        <th><center>มา</th>
        <th><center>ขาด</th>
        <th><center>รวม</th>
          <th><center>ร้อยละ</th>
        <th><center>มา</th>
        <th><center>ขาด</th>
        <th><center>รวม</th>
          <th><center>ร้อยละ</th>

      </tr>
         <?php
         $sql= "SELECT * FROM student,education_years WHERE class_id='$class_id' and education_year='$Education_Years'";
         $result=$connect->query($sql);
         $i=1;

         while($row=mysqli_fetch_array($result)){
      $comewed = "SELECT * FROM checked WHERE stu_id = '".$row['stu_id']."' AND checked_name LIKE '%วันพุธ%' AND education_year = '$Education_Years' AND checked_status = '1'";
      $comewed1 = $connect->query($comewed);
      $comewed2 = mysqli_num_rows($comewed1);

      $notcomewed = "SELECT * FROM checked WHERE stu_id = '".$row['stu_id']."' AND checked_name LIKE '%วันพุธ%' AND education_year = '$Education_Years' AND checked_status = '0'";
      $notcomewed1 = $connect->query($notcomewed);
      $notcomewed2 = mysqli_num_rows($notcomewed1);

      $allwed = "SELECT * FROM checked WHERE stu_id = '".$row['stu_id']."' AND checked_name LIKE '%วันพุธ%' AND education_year = '$Education_Years' AND checked_status LIKE '%%'";
      $allwed1 = $connect->query($allwed);
      $allwed2 = mysqli_num_rows($allwed1);

      $comefri = "SELECT * FROM checked WHERE stu_id = '".$row['stu_id']."' AND checked_name LIKE '%วันศุกร์%' AND education_year = '$Education_Years' AND checked_status = '1'";
      $comefri1 = $connect->query($comefri);
      $comefri2 = mysqli_num_rows($comefri1);

      $notcomefri = "SELECT * FROM checked WHERE stu_id = '".$row['stu_id']."' AND checked_name LIKE '%วันศุกร์%' AND education_year = '$Education_Years' AND checked_status = '0'";
      $notcomefri1 = $connect->query($notcomefri);
      $notcomefri2 = mysqli_num_rows($notcomefri1);

      $allfri = "SELECT * FROM checked WHERE stu_id = '".$row['stu_id']."' AND checked_name LIKE '%วันศุกร์%' AND education_year = '$Education_Years' AND checked_status LIKE '%%'";
      $allfri1 = $connect->query($allfri);
      $allfri2 = mysqli_num_rows($allfri1);


      $resultwed = number_format(($comewed2 * 100) / $allwed2,2);
      $resultfri = number_format(($comefri2 * 100) / $allfri2,2);
       ?>
       <tr style="background:#ffe6b3">

              <td><center><?php echo $i ?></td>
              <td><center><?php echo $row['stu_id']?></td>
              <td><?php echo $row['stu_name']?></td>
                <td><?php echo $comewed2 ?></td>
                <td><?php echo $notcomewed2 ?></td>
                <td><?php echo $allwed2 ?></td>
                <td><?php echo $resultwed ?></td>
                <td><?php echo $comefri2 ?></td>
                <td><?php echo $notcomefri2 ?></td>
                <td><?php echo $allfri2 ?></td>
                <td><?php echo $resultfri?></td>
                <td><?php
                       if($resultwed>=60&&$resultfri>=60){
                         echo "ผ่านกิจกรรม";
                       }else{
                         echo "<span style=\"color: red;\">ไม่ผ่านกิจกรรม</span>";
                       }
                       ?></td>
            </tr>

               <?php
             $i++;
   }
              ?>
   </div>
   </table>
   </body>
   </html>
</form>
</body>
</body>
 </html>
