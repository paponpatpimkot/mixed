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
				$name = $_POST['name'];
				if($name==""){
					sc("กรุณาใส่ชื่อประเภทสินค้า");
				}else{
					$ck1 = mysqli_num_rows($con->query("select * from category where cate_name='$name'"));	
					if($ck1!=0){
						sc("ชื่อนี้มีอยู่ในระบบแล้วกรุณาเปลี่ยนใหม่");
					}else{
						$con->query("insert into category values('','$name');");	
						hd("cate.php");
					}
				}
			}
			
			if(isset($_POST['cancle'])){
				hd("cate.php");
			}
		?>
        <div class="top"></div>
       <div class="headcon"><h4>เพิ่มข้อมูลประเภทสินค้า</h4></div>
        <div class="content"><br>

        	<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        		<table class="tbn">
                	<tr>
                    	<td>ชื่อประเภทสินค้า</td>
                        <td><input class="tb" type="text" name="name"></td>
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