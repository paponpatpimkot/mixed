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
			$id = $_POST['id'];
			$name = $_POST['name'];
			$price  = $_POST['price'];
			$min   = $_POST['min'];
			$cate = $_POST['cate'];
			$unit = $_POST['unit'];
			$st = $_POST['st'];
			if($id==""||$name==""||$price==""||$min ==""||$cate==""||$unit==""||$st==""){
				sc("กรุณากรอกข้อมูลให้ครบถ้วน $id $name $price $min $cate $unit $st");
			}else{
				$ck1 = mysqli_num_rows($con->query("select * from product where pro_id ='$id'"));
				if($ck1!=0){
					sc("รหัสสินค้านี้มีอยู่ในระบบแล้ว กรุณาตรวจสอบใหม่อีกครั้ง");
				}else{
					$con->query("insert into product values('$id','$name','$price','','','$min','$cate','$unit','$st');");
					hd('product.php');
				}
			}
		}



		if(isset($_POST['cancle'])){
			hd("product.php");
		}
	?>
    <div class="top"></div>
    <div class="headcon"><h4>เพิ่มข้อมูลสินค้า</h4></div>
	<div class="content"><br>
		<?php
		if(isset($_POST['import'])){
			$file = $_FILES['file']['name'];
			$type = strrchr($file,".");
			if($type!=".csv"&&$type!=".CSV"){
				al("ใช้ได้เฉพาะไฟล์ .CSV");
			}else{
				$name = date('d-m-Y').".".date('H.i.s').$type;
				copy($_FILES['file']['tmp_name'],"../file/".$name);
				$csv = fopen("../file/".$name,"r");
				while($r=fgetcsv($csv)){
					$re = $con->query("insert into product values('$r[0]','".$r['1']."','$r[2]','','','$r[3]','$r[4]','$r[5]','".$r['6']."');");
				}
				if($re){
					hd("product.php");
				}else{
					al("เพิ่ไม่ได้ กรุณาตรวจสอบข้อมูลภายในไฟล์");
				}
			}
		}

			if(isset($_POST['dowload'])){
				header("location:../file/ImportProduct.csv");
			}
		?>
    	<div><br>

        	<form class="rnow" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
             นำเข้าข้อมูล (เฉพาะไฟล์ .CSV)
						 <input type="file" name="file">
						 <input type="submit" name="import" class="btny" value="ยืนยัน">
						 <input type="submit" name="dowload" class="btny" value="โหลดไฟล์นำเข้า">
            </form>
        </div>
    	<div>
        	<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        	<table class="tbn">
            	<tr >
                	<td>รหัสสินค้า</td>
                    <td><input class="tb" type="text" name="id"></td>
                </tr>
                <tr>
                	<td>ชื่อ</td>
                    <td><input  class="tb" type="text" name="name"></td>
                </tr>
                <tr>
                	<td>ราคาขาย</td>
                    <td><input  class="tb" type="text" name="price"></td>
                </tr>
                <tr>
                	<td>สต๊อคขั้นต่ำ</td>
                    <td><input  class="tb" type="text" name="min"></td>
                </tr>
                <tr>
                	<td>ประเภทสินค้า</td>
                    <td>
                    	<select  class="tb" name="cate">
                        	<option value="">--เลือกประเภทสินค้า--</option>
                            <?php
								$sql = $con->query("select * from category");
								while($r1=mysqli_fetch_array($sql)){
							 ?>
                            <option value="<?php echo $r1['cate_id'] ?>"><?php echo $r1['cate_name']; ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                	<td>หน่วย</td>
                    <td>
                    	<select  class="tb" name="unit">
                        	<option value="">--เลือกหน่วยสินค้า--</option>
                            <?php
								$sql = $con->query("select * from unit");
								while($r2=mysqli_fetch_array($sql)){
							 ?>
                            <option value="<?php echo $r2['unit_id'] ?>"><?php echo $r2['unit_name']; ?></option>
                            <?php } ?>
                        </select>
                    </td>
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
</body>
</html>
