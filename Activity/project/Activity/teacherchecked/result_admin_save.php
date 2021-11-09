
<?php
include '../connect.php';
$Education_Years=$_POST['education_year'];
$eventdate=$_POST['eventdate'];
$datename=$_POST['checkname'];
SESSION_START();
error_reporting(0);
@$data=$_POST['wed'];
@$id=$_POST['id'];
$date_check=date('Y-m-d');

for ($i=0; $i <= count($_POST['wed']); $i++) {
  //echo @$id[$i];
  //echo @$data[$i];
  //echo "<br>";
  $insert_data = "INSERT INTO checked VALUES('$date_check','$eventdate','$datename','{$id[$i]}','{$data[$i]}','$Education_Years')";
  $check_query=$connect->query($insert_data);
}
header("Refresh:0 url=../teacher/admin/index.php");





?>
