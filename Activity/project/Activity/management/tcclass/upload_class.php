<?php
include '../../connect.php';
move_uploaded_file($_FILES["class_csv"]["tmp_name"],$_FILES["class_csv"]["name"]);
$csv = fopen($_FILES["class_csv"]["name"], "r");
while (($Arr = fgetcsv($csv, 1000, ",")) !== FALSE)
{
  $classroom = $Arr[0];
  $class_name = $Arr[1];
  $teacher_name = $Arr[2];
  $sql ="INSERT INTO classroom (class_id,class_name,teacher_name) VALUES('$classroom','$class_name','$teacher_name')";
  $result=$connect->query($sql);
}
fclose($csv);
if($result){
       echo "<script>alert('เพิ่มรายชื่อห้องเรียนสำเร็จแล้ว');
               window.location.href='class/itclassroom.php';
             </script>";
     }else{
       echo"<script>alert('ERROR : ไม่สามารถเพิ่มรายชื่อห้องได้');
       window.location.href='class/itclassroom.php';
       </script>";
       }
?>
