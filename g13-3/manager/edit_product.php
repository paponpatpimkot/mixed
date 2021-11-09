<?php require_once("chk_position.php") ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
	<?php
    	include("header.php");
		$row = mysqli_fetch_array($con->query("select * from product p,unit u,category c where p.cate_id=c.cate_id and p.unit_id=u.unit_id  and  pro_id='$_GET[id]'"));
		
		if(isset($_POST['done'])){
			
			$name = $_POST['name'];
			$price  = $_POST['price'];
			$min   = $_POST['min'];
			$cate = $_POST['cate']; 
			$unit = $_POST['unit']; 
			$st = $_POST['st'];
			if($name==""||$price==""||$min ==""||$cate==""||$unit==""||$st==""){
				sc("กรุณากรอกข้อมูลให้ครบถ้วน $id $name $price $min $cate $unit $st");
			}else{
					$con->query("update product set pro_name ='$name',pro_price='$price',pro_stock_min='$min',cate_id='$cate',unit_id='$unit',pro_status='$st' where pro_id='$row[pro_id]'");	
					hd('product.php');
				
			}
		}
		
		if(isset($_POST['cancle'])){
			hd("product.php");
		}
	?>
      <div class="top"></div>
    <div class="headcon"><h4>เพิ่มข้อมูลสินค้า</h4></div>
	<div class="content"><br>

    	<div>
        	<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        	<table class="tbn">
                <tr>
                	<td>ชื่อ</td>
                    <td><input class="tb" type="text" name="name" value="<?php echo $row['pro_name']; ?>"></td>
                </tr>
                <tr>
                	<td>ราคาขาย</td>
                    <td><input class="tb" type="text" name="price" value="<?php echo $row['pro_price']; ?>"></td>
                </tr>
                <tr>
                	<td>สต๊อคขั้นต่ำ</td>
                    <td><input class="tb" type="text" name="min"  value="<?php echo $row['pro_stock_min']; ?>"></td>
                </tr>
                <tr>
                	<td>ประเภทสินค้า</td>
                    <td>
                    	<select class="tb" name="cate">
                        	<option  value="<?php echo $row['cate_id']; ?>"><?php echo $row['cate_name'] ?></option>
                            <?php 
								$sql = $con->query("select * from category where cate_id <> '$row[cate_id]'");
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
                    	<select class="tb" name="unit">
                        	<option  value="<?php echo $row['unit_id']; ?>"><?php echo $row['unit_name']; ?></option>
                            <?php 
								$sql = $con->query("select * from unit where unit_id <> '$row[unit_id]'");
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
                        	<option value="<?php echo $row['pro_status']; ?>"><?php echo $row['pro_status']; ?></option>
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