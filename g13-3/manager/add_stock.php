<?php require_once("chk_position.php"); if(!isset($_SESSION['inv_no'])){ hd('stock.php'); } ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
	<?php
    	include("header.php");
		$ck1 = mysqli_fetch_array($con->query("select MAX(inv_id)as id from inventory"));
		$c = mysqli_fetch_array($con->query("select SUM(inv_num)as num,SUM(inv_total)as total from inventory_list where inv_id='$ck1[id]'"));
		if(isset($_POST['add'])){
			$id = $_POST['id'];
			$nums = $_POST['nums'];
			$totals = $_POST['totals'];
			if($id==""||$nums==""||$totals==""){
				sc("กรุณากรอกข้อมูลให้ครบถ้วน");
			}else{
					$ck22 = mysqli_num_rows($con->query("select * from product where pro_id='$id'"));
					if($ck22!=1){
						sc("รหัสสินค้าไม่ถูกต้อง");
					}else{
						$ck2 = mysqli_num_rows($con->query("select * from inventory_list where inv_id='$ck1[id]' and pro_id='$id'"));
						if($ck2!=0){
							sc("คุณเพิ่มสินค้ารายการนี้ไปแล้ว");
						}else{
							$price = $totals / $nums;
							$con->query("insert into inventory_list values('$ck1[id]','$id','$price','$nums','$totals');");
							hd("add_stock.php");
						}
					}
			}
		}

		if(isset($_POST['done'])){
			$f = mysqli_fetch_array($con->query("select SUM(inv_num)as num,SUM(inv_total)as total from inventory_list where inv_id='$ck1[id]'"));
			$con->query("update inventory set inv_total='$c[total]' where inv_id = '$ck1[id]'");
			$sql = $con->query("select * from inventory_list where inv_id = '$ck1[id]'");
			while($r=mysqli_fetch_array($sql)){
				$r1 = mysqli_fetch_array($con->query("select * from product where pro_id='$r[pro_id]'"));
				if($r1['pro_buy']==0){
					$con->query("update product set pro_stock=pro_stock+'$r[inv_num]',pro_buy=pro_buy+'$r[inv_price]' where pro_id='$r[pro_id]'");
				}else{
					$con->query("update product set pro_stock=pro_stock+'$r[inv_num]',pro_buy=(pro_buy+'$r[inv_price]')/2 where pro_id='$r[pro_id]'");
				}
			}
			unset($_SESSION['inv_no']);
			hd("stock.php");
		}

		if(isset($_POST['cancle'])){
			$con->query("delete from inventory where inv_id='$ck1[id]'");
			$con->query("delete from inventory_list where inv_id='$ck1[id]'");
			unset($_SESSION['inv_no']);
			hd('stock.php');
		}

		if(isset($_GET['del'])){
			$con->query("delete from inventory_list where inv_id='$ck1[id]' and pro_id='$_GET[del]'");
			hd('stock.php');
		}
	?>
    <div class="top"></div>
    <div class="headcon"><h4>เพิ่มสินค้าเข้าสต๊อค</h4></div>
    <div class="content">
    	<div>
        	<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            	<table class="tbn">
                	<tr>
                    	<td>รหัสสินค้า</td>
                        <td><input  class="tb" type="text" name="id"></td>
                    </tr>
                    <tr>
                    	<td>จำนวน</td>
                        <td><input class="tb" type="text" name="nums"></td>
                    </tr>
                    <tr>
                    	<td>ราคารวม</td>
                        <td><input class="tb" type="text" name="totals"></td>
                    </tr>
                    <tr>
                    	<td align="center"><input class="btny" type="submit" name="add" value="เพิ่ม"></td>
                        <td></td>
                    </tr>
                    <tr>
                    	<td align="center"><input class="buty" type="submit" name="done" value="ยืนยัน"></td>
                        <td><input class="butx" type="submit" name="cancle" value="ยกเลิก"></td>
                    </tr>
                </table>
            </form>
        </div>
    	<div class="content">
        	<table class="responstable">
            	<tr>
                	<th>ลำดับ</th>
                    <th>รหัส</th>
                    <th>สินค้า</th>
                    <th>ราคา</th>
                    <th>จำนวน</th>
                    <th>หน่วย</th>
                    <th>รวม</th>
                    <th>จัดการ</th>
                </tr>
                <?php
					$x=1 ;
					$sql = $con->query("select * from inventory_list i,product p,unit u where i.pro_id=p.pro_id and p.unit_id=u.unit_id and i.inv_id='$ck1[id]'");
                	while($r=mysqli_fetch_array($sql)){
				?>
                <tr>
                	<td align="center"><?php echo $x;$x++; ?></td>
                    <td align="center"><?php echo $r['pro_id'];  ?></td>
                    <td><?php echo $r['pro_name'];  ?></td>
                    <td><?php echo number_format($r['inv_price'],2);  ?></td>
                    <td align="center"><?php echo $r['inv_num'];  ?></td>
                    <td align="center"><?php echo $r['unit_name'];  ?></td>
                    <td><?php echo number_format($r['inv_total'],2);  ?></td>
                    <td align="center"><a class="btnx" href="?del=<?php echo $r['pro_id']; ?>" onClick="return confirm('ยืนยันการลบ')">ลบ</a></td>
                </tr>
                <?php
					 }

				?>
                <tr>
                	<td></td>
                    <td></td>
                    <td></td>
                    <td>รวม</td>
                    <td align="center"><?php echo $c['num'];  ?></td>
                    <td></td>
                    <td><?php echo number_format($c['total'],2);  ?></td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
