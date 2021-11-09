<?php require_once("chk_position.php") ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
	<?php
    	include("header.php");
		if(isset($_POST['done'])){
			$p1 = $_POST['p1'];
			$p2 = $_POST['p2'];
			$p3 = $_POST['p3'];
			if($p1==""||$p2==""||$p3==""){
				echo"<script>alert('กรุณากรอกข้อมูลให้ครบถ้วน');</script>";
			}else{
				$ck1 = mysqli_num_rows($con->query("select * from employee where emp_id='$_SESSION[emp_id]' and emp_pass='$p1'"));	
				if($ck1!=1){
					al('รหัสผ่านเดิมไม่ถูกต้อง');
				}else{
					if($p2!=$p3){
						al('รหัสผ่านไม่เหมือนกัน');
					}else{
						$con->query("update employee set emp_pass = '$p3' where emp_id='$_SESSION[emp_id]'");	
						hd('profile.php');
					}	
				}
			}
		}
		
		if(isset($_POST['cancle'])){
			hd('profile.php');
		}
	?>
    <DIV CLASS="top"></DIV>
    <div class="headcon"><h4>เปลี่ยนรหัสผ่าน</h4></div>
    <div class="content"><br>

    	<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        	<table class="tbn">
            	<tr>
                	<td>รหัสผ่านเดิม</td>
                    <td><input class="tb" type="password" name="p1"></td>
                </tr>
                <tr>
                	<td>รหัสผ่านใหม่</td>
                    <td><input class="tb" type="password"  name="p2"></td>
                </tr>
                <tr>
                	<td>ยืนยันรหัสผ่านใหม่</td>
                    <td><input class="tb" type="password"  name="p3"></td>
                </tr>
                <tr>
                	<td align="center"><input class="buty" type="submit" name="done" value="ยืนยัน"></td>
                    <td><input class="butx" type="submit" name="cancle" value="ยกเลิก"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>