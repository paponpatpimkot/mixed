
<?php
/*include '../connect.php';
$Education_Years=$_POST['education_year'];
$eventdate=$_POST['eventdate'];
$datename=$_POST['checkname'];
SESSION_START();
error_reporting(0);
@$data=$_POST['wed'];
@$id=$_POST['id'];
$date_check=date('Y-m-d');

for ($i=0; $i <= count($_POST['wed']); $i++) {
  echo @$id[$i];
  echo "<br>";
  echo @$data[$i];
  echo "<br>";
  echo $Education_Years;
  echo "<br>";
  echo $datename;
  echo "<br>";
  echo $eventdate;
  echo "<br>";
  echo "<br>";
  $sql="UPDATE checked SET
  checked_date='$date_check',
  eventdate='$eventdate',
  checked_name='$datename',
  stu_id='{$id[$i]}',
  checked_status='{$data[$i]}',
  education_year='$Education_Years'
  WHERE stu_id ='.{$id[$i]}.'";
  $result=$connect->query($sql);
}
//header("Refresh:0 url=../teacher/field.php");
if($result){
  echo "<script>alert('แก้ไขข้อมูลสำเร็จ');
        </script>";
}else {
  echo "<script>alert('ERROR : ไม่สามารถแก้ไขช้อมูลได้');
</script>";
    }
*/?>
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
echo @$id[$i];
for ($i=0; $i <= count($_POST['wed']); $i++) {
$sql="DELETE FROM checked WHERE eventdate='$eventdate' AND stu_id='{$id[$i]}' ";

$result=$connect->query($sql);
  //echo @$id[$i];
  //echo @$data[$i];
  //echo "<br>";
  $insert_data = "INSERT INTO checked VALUES('$date_check',
                                             '$eventdate',
                                             '$datename',
                                             '{$id[$i]}',
                                             '{$data[$i]}',
                                             '$Education_Years')";
  $check_query=$connect->query($insert_data);
}
header("Refresh:0 url=../teacher/teacher/index.php");
?>
