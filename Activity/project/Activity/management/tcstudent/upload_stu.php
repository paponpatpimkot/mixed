<?php
include '../../connect.php';
move_uploaded_file($_FILES["stu_csv"]["tmp_name"],$_FILES["stu_csv"]["name"]);
$csv = fopen($_FILES["stu_csv"]["name"], "r");
while (($Arr = fgetcsv($csv, 1000, ",")) !== FALSE)
{
  $stu_id = $Arr[0];
  $stu_name = $Arr[1];
  $classroom = $Arr[2];

  $sql ="INSERT INTO student (stu_id,stu_name,class_id) VALUES('$stu_id','$stu_name','$classroom')";
  $result=$connect->query($sql);
}
fclose($csv);
if($result){
       echo "<script>alert('เพิ่มรายชื่อนักศึกษาสำเร็จแล้ว');
               window.location.href='../tcclass/tcclassroom.php';
             </script>";
     }else{
       echo"<script>alert('ERROR : ไม่สามารถเพิ่มรายชื่อนักศึกษาได้');
       window.location.href='../tcclass/tcclassroom.php';
       </script>";
       }
?>
