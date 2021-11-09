<?php require_once("chk_position.php") ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
	<?php
    	include("header.php");
		
		
		
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
				$ck1 = mysqli_num_rows($con->query("select * from employee where emp_user='$us'"));	
				if($ck1!=0){
					sc("ชื่อผู้ใช้งานนี้มีอยู่ในระบบแล้ว กรุณาเปลี่ยนใหม่!!");
				}else{
					$con->query("insert into employee values('','$fn','$ln','$te','$po','$us','$pa','$st')");
					hd('employee.php');	
				}
			}
		}
		?>
        <div class="top"></div>
          <div class="headcon"><h4>เพิ่มข้อมูลพนักงาน</h4></div>
          <div class="content">  
          <br>
      
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        	<table class="tbn">
            	<tr >
                	<td>ชื่อ</td>
                    <td><input class="tb" type="text" name="fn"></td>
                </tr>
                <tr>
                	<td>นามสกุล</td>
                    <td><input  class="tb" type="text" name="ln"></td>
                </tr>
                <tr>
                	<td>เบอร์โทรศัพท์</td>
                    <td><input  class="tb" type="text" name="te"></td>
                </tr>
               
                <tr>
                	<td>เลือกตำแหน่ง</td>
                    <td>
                    	     
        <select class="tb" name="po">
                        	 
                            <option value="ผู้จัดการ">ผู้จัดการ</option>
                            <option value="พนักงานขาย">พนักงานขาย</option>
                            <option value="พนักงานสต๊อค">พนักงานสต๊อค</option>
                        </select
                    ></td>
                </tr>
                <tr>
                	<td>ชื่อผู้ใช้งาน</td>
                    <td><input  class="tb" type="text" name="us"></td>
                </tr>
                <tr>
                	<td>รหัสผ่าน</td>
                    <td><input  class="tb" type="password" name="pa"></td>
                </tr>
                <tr>
                	<td>สถานะ</td>
                    <td>
                    	<select class="tb" name="st">
                       <option value="">--เลือกสถานะ--</option>
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
    </div>
</body>
</html>