<?php
	require_once('config.php');
	if(isset($_SESSION['emp_id'])){
		hd("index.php");
	}
?>
<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Untitled Document</title>
</head>
<body>
	<?php
		if(isset($_POST['done'])){
			$user = $_POST['user'];
			$pass = $_POST['pass'];
			if($user==""||$pass==""){
				echo"<script>alert('กรุณาใส่ข้อมูลให้ครบถ้วน');window.history.back();</script>";
			}else{
				$ck1 = mysqli_num_rows($con->query("select * from employee where emp_user='$user' and emp_pass='$pass'"));
				if($ck1!=1){
					echo"<script>alert('ชื่อผู้ใช้งาน หรือ รหัสผ่านไม่ถูกต้อง');window.history.back();</script>";
				}else{
					$ck2 = mysqli_num_rows($con->query("select * from employee where emp_user='$user' and emp_pass='$pass' and emp_status='ใช้งาน'"));
					if($ck2!=1){
						echo"<script>alert('บัญชีของคุณอยู่ในสถานะยกเลิก กรุณาติดต่อผู้จัดการ');window.history.back();</script>";
					}else{
							$ck3 = mysqli_fetch_array($con->query("select * from employee where emp_user='$user' and emp_pass='$pass'"));
							$_SESSION['emp_id'] = $ck3['emp_id'] ;
							$_SESSION['emp_fname'] = $ck3['emp_fname'];
							$_SESSION['emp_lname'] = $ck3['emp_lname'];
							$_SESSION['emp_position'] = $ck3['emp_position'];
							hd("index.php");
					}
				}
			}
		}

	?>  	
	  <div class="container w-25" style="margin-top:150px">
		  <div class="card">
			  	<div class="card-header bg-primary text-white">Sign In</div>
			  	<div class="card-body">
					<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
						<div class="mb-3">							
							<input class="form-control" type="text" name="user" placeholder="username">
						</div>
						<div class="mb-3">							
							<input class="form-control"  type="password" name="pass" placeholder="password">							
						</div>
						<input class="btn btn-primary" type="submit" name="done" value="เข้าสู่ระบบ">
					</form>
				</div>
		  </div>
	  </div>
</body>
</html>
