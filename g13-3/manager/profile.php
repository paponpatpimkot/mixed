<?php require_once("chk_position.php") ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	include ('header.php');
?>
<div class="top"></div>
<div class="headcon"><h4>ข้อมูลส่วนตัว</h4></div>
<div class="content">
<?php
$sql=$con->query("select * from employee where emp_id = ".$_SESSION['emp_id']." ");
while($row=mysqli_fetch_array($sql)){
?>
<br>
<table class="tbn">
<tr>
	<th align="left">ชื่อ</th>
    <td ><?php echo  $row["emp_fname"] ;?></td>
</tr>
<tr>
    <th align="left">นามสกุล</th>
    <td><?php echo  $row["emp_lname"]; ?></td>
 </tr>
 <tr>
    <th align="left">เบอร์โทร</th>
   	<td><?php echo  $row["emp_tel"]; ?></td>
 </tr>
 <tr>  
    <th align="left">ตำแหน่ง</th>
    <td><?php echo  $row["emp_position"]; ?></td>
 </tr>
 <tr>
    <th align="left">รหัสผ่าน</th>
   <td>******** <a href="changepass.php"><font color="#FF0000" class="buttonred">เปลี่ยนรหัสผ่าน</font></a></td>
</tr>
<tr>
    <th align="left">สถานะ</th>
   <td><?php echo  $row["emp_status"]; ?></td>
</tr>
<tr>
	

</tr>
</table>
<?php } ?>
</div>
</body>
</html>