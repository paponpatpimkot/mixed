<?php
include '../connect.php';
$class_id=$_GET['class_id'];
$Education_Years=$_GET['education_year'];
error_reporting(0);
$datetoday = date('d-m-Y');

header("Content-Type: application/vnd.ms-excel"); // ประเภทของไฟล์
header('Content-Disposition: attachment; filename="'.$class_id.'.xls"'); //กำหนดชื่อไฟล์
header("Content-Type: application/force-download"); // กำหนดให้ถ้าเปิดหน้านี้ให้ดาวน์โหลดไฟล์
header("Content-Type: application/octet-stream");
header("Content-Type: application/download"); // กำหนดให้ถ้าเปิดหน้านี้ให้ดาวน์โหลดไฟล์
header("Content-Transfer-Encoding: binary");
header("Content-Lengtd: ".filesize($class_id.".xls"));

@readfile($filename);

?>
<html xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:x="urn:schemas-microsoft-com:office:excel"
xmlns="http://www.w3.org/TR/REC-html40">
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <?php $sql1 = "SELECT * FROM classroom WHERE class_id='$class_id'";
    $result1 = $connect->query($sql1);
    while ($row1=mysqli_fetch_array($result1)) {
  ?>
    <center><h3> ห้อง : <?php echo $row1['class_name'] ?></h3>
  <?php } ?>
<table border="1">
    <tr>
           <td rowspan="2"><center><br>ลำดับที่</td>
           <td rowspan="2"><center><br>รหัสนักศึกษา</td>
           <td rowspan="2"><center><br>ชื่อ-นามสกุล</td>
           <td colspan="4"><center>ผลกิจกรรมวันพุธ </td>
           <td colspan="4"><center>ผลกิจกรรมวันศุกร์ </td>
           <td rowspan="2"><center><br>ผลการประเมิน </td>
     </tr>

      <tr>
        <td><center>มา</td>
        <td><center>ขาด</td>
        <td><center>รวม</td>
        <td><center>ร้อยละ</td>
        <td><center>มา</td>
        <td><center>ขาด</td>
        <td><center>รวม</td>
        <td><center>ร้อยละ</td>
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
       <tr >

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
   </table>
