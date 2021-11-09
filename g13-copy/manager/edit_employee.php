<?php require_once("chk_position.php") ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
	<?php
    	include("header.php");
		$r = mysqli_fetch_array($con->query("select * from employee where emp_id='".$_GET['id']."'"));
		
		if(isset($_POST['cancle'])){
			hd("employee.php");
		}
	?>
    <div>
    	<?php
			if(isset($_POST['done'])){
			$fn = $_POST['fn'];
			$ln = $_POST['ln'];
			$te = $_POST['te'];
			$po = $_POST['po'];
			$us = $_POST['us'];
			$pa = $_POST['pa'];
			$st = $_POST['st'];
			if($fn==""||$ln==""||$po==""||$us==""||$pa==""||$st==""){
				sc("กรุณากรอกข้อมูลให้ครบถ้วน");
			}else{
				$ck1 = mysqli_num_rows($con->query("select * from employee where emp_user='$us' and emp_user<>'$r[emp_user]'"));	
				if($ck1!=0){
					sc("ชื่อผู้ใช้งานนี้มีอยู่ในระบบแล้ว กรุณาเปลี่ยนใหม่!!");
				}else{
					$con->query("update employee set emp_fname='$fn',emp_lname='$ln',emp_tel='$te',emp_position='$po',emp_user='$us',emp_pass='$pa',emp_status='$st' where emp_id='$r[emp_id]'");
					hd('employee.php');	
				}
			}
		}
		?>
        <div class="top"></div>
          <div class="headcon"><h4>แก้ไขข้อมูลพนักงาน</h4></div>
          <div class="content"><br>

    	<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <table class="tbn">
                <tr>
                    <td>ชื่อ</td>
                    <td><input class="tb" type="text" name="fn" value="<?php echo $r['emp_fname'] ?>"></td>
                </tr>
                <tr>
                    <td>นามสกุล</td>
                    <td><input class="tb"  type="text" name="ln" value="<?php echo $r['emp_lname'] ?>"></td>
                </tr>
                <tr>
                    <td>เบอร์โทร</td>
                    <td><input class="tb"  type="text" name="te" value="<?php echo $r['emp_tel'] ?>"></td>
                </tr>
                <tr>
                    <td>ตำแหน่ง</td>
                    <td>
                    	<select  class="tb"  name="po">
                        	<option value="<?php echo $r['emp_position'] ?>"><?php echo $r['emp_position'] ?></option>
                            <option value="ผู้จัดการ">ผู้จัดการ</option>
                            <option value="พนักงานขาย">พนักงานขาย</option>
                            <option value="พนักงานสต๊อค">พนักงานสต๊อค</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>ชื่อผู้ใช้งาน</td>
                    <td><input class="tb"  type="text" name="us" value="<?php echo $r['emp_user'] ?>"></td>
                </tr>
                <tr>
                    <td>รหัสผ่าน</td>
                    <td><input class="tb"  type="password" name="pa" value="<?php echo $r['emp_pass'] ?>"></td>
                </tr>
                <tr>
                    <td>สถานะ</td>
                    <td>
                    	<select class="tb"  name="st">
                        	<option  value="<?php echo $r['emp_status'] ?>"><?php echo $r['emp_status']; ?></option>
                            <option value="ใช้งาน">ใช้งาน</option>
                            <option value="ยกเลิก">ยกเลิก</option>
                        </select>
                    </td>
                </tr>
                <tr>
                	<td align="center"><input class="buty" type="submit" name="done" value="ยืนยัน"></td>
                    <td><input class="butx" type="submit" name="cancle" value="ยกเลิก"></td>
                </tr>
            </table>
           </form>
    </div>
    </div>
</body>
</html>