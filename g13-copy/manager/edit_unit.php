<?php require_once("chk_position.php") ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
		<?php
    		include("header.php");
			$r = mysqli_fetch_array($con->query("select * from unit where unit_id='$_GET[id]'"));
			if(isset($_POST['done'])){
				$name = $_POST['name'];
				if($name==""){
					sc("กรุณาใส่ชื่อหน่วยสินค้า");
				}else{
					$ck1 = mysqli_num_rows($con->query("select * from unit where unit_name='$name'"));	
					if($ck1!=0){
						sc("ชื่อนี้มีอยู่ในระบบแล้วกรุณาเปลี่ยนใหม่");
					}else{
						$con->query("update unit set unit_name='$name' where unit_id='$r[unit_id]'");	
						hd("unit.php");
					}
				}
			}
			
			if(isset($_POST['cancle'])){
				hd("unit.php");
			}
		?>
        <div class="top"></div>
        <div class="headcon"><h4>แก้ไขมูลหน่วยสินค้า</h4></div>
        <div class="content"><br>

        	<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        		<table class="tbn">
                	<tr>
                    	<td>ชื่อหน่วยสินค้า</td>
                        <td><input type="text" class="tb" name="name" value="<?php echo $r['unit_name']; ?>"></td>
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