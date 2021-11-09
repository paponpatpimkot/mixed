<?php require_once("chk_position.php") ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<?php
	include('header.php');
	$row = mysqli_fetch_array($con->query("select * from inventory i,employee e where i.emp_id=e.emp_id and i.inv_id='$_GET[inv_id]'"));

	$sql2 = $con->query("select * from inventory i,employee e,inventory_list il where i.emp_id = e.emp_id and il.inv_id = i.inv_id and i.inv_total<>0");
	$sa=mysqli_fetch_array($sql2);

	$sql = $con->query("select * from inventory where inv_id='$_GET[inv_id]'");
	$inv_id = mysqli_fetch_array($sql);

	if(isset($_GET['edit'])){
		$i = 0;
		$sql=$con->query("select * from inventory_list where inv_id = '$_GET[inv_id]'");
		while ($up=mysqli_fetch_array($sql)) {

			$p_id =  $_GET['pro_id'.$i];
			$p_num =  $_GET['num'.$i];
			$p_price =  $_GET['price'.$i];
			$inv_price = $p_price/$p_num;
			$con->query("update inventory_list set inv_num='$p_num',inv_total='$p_price',inv_price='$inv_price' where inv_id='$_GET[inv_id]' and pro_id='$p_id'");
			$ckp = mysqli_fetch_array($con->query("select * from product where pro_id='$p_id'"));
			$con->query("update product set pro_stock=(pro_stock-'$up[inv_num]')+'$p_num' where pro_id='$p_id'");

			$i++;
		}
		$cktotal = mysqli_fetch_array($con->query("select *,sum(inv_total)as sums from inventory_list where inv_id='$_GET[inv_id]'"));
		$con->query("update inventory set inv_total='$cktotal[sums]' where inv_id='$_GET[inv_id]'");
		header("location:stock_dtail.php?inv_id=$_GET[inv_id]");
	}

	if(isset($_GET['del'])){
		$id = $_GET['del'];
		$ckinv = mysqli_fetch_array($con->query("select * from inventory_list where inv_id = '$_GET[inv_id]' and pro_id = '$id'"));
		$con->query("update product set pro_stock=pro_stock-'$ckinv[inv_num]' where pro_id='$id'");
		$con->query("delete from inventory_list where inv_id = '$_GET[inv_id]' and pro_id = '$id'");
		$cktotal = mysqli_fetch_array($con->query("select *,sum(inv_total)as sums from inventory_list where inv_id='$_GET[inv_id]'"));
		$con->query("update inventory set inv_total='$cktotal[sums]' where inv_id='$_GET[inv_id]'");
		header("location:stock_dtail.php?inv_id=$_GET[inv_id]");
	}
?>
	<div class="top"></div>
	<div class="headcon">
		<h4>รายละเอียดใบเสร็จเลขที่ : <?php echo $inv_id['inv_no']; ?></h4>

	</div>

<div class="content">
<br>
<table class="tbn">
<tr>
	<th align="left">ผู้บันทึกข้อมูล</th>
    <td ><?php echo $row["emp_fname"]." ".$row["emp_lname"] ;?></td>
</tr>
<tr>
    <th align="left">ซื้อมาจาก</th>
   <td><?php echo $row["inv_from"]; ?></td>
</tr>
<tr>
    <th align="left">วันที่</th>
   <td><?php echo date_th($row["inv_date"]); ?></td>
</tr>
<tr>
    <th align="left">ยอดรวม</th>
   <td><?php echo number_format($row["inv_total"],2); ?></td>
</tr>
<tr>
    <th align="left">โน๊ต</th>
   <td><?php if($row["inv_note"]!=""){echo $row["inv_note"];}else{ echo "(ไม่พบข้อมูล)"; } ?></td>
</tr>
<tr>
	<th align="left">
	<a href="stock.php" class="buty">กลับไปหน้าสต๊อค</a>
	</th><td></td>
</tr>
</table><br>
<table class="responstable">
<tr>          <th>ลำดับ</th>
										<th>รหัส</th>
                    <th>ชื่อสินค้า</th>
        						<th>ราคา</th>
                    <th>จำนวน</th>
										<th>หน่วย</th>
                    <th>รวม</th>
										<th>จัดการ</th>
</tr>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="get">
<?php
$x = 1;
$i = 0;
$sql=$con->query("select * from inventory,inventory_list,employee,product,unit where unit.unit_id = product.unit_id and inventory_list.pro_id = product.pro_id and employee.emp_id = inventory.emp_id and inventory.inv_id = inventory_list.inv_id  and inventory.inv_id = '$_GET[inv_id]' ");
while($show=mysqli_fetch_array($sql)){
	$_SESSION['p_id'][$i] = $show[pro_id];
?>
<input type="hidden" name="pro_id<?php echo $i ?>" value="<?php echo $_SESSION['p_id'][$i]; ?>">
<input type="hidden" name="inv_id" value="<?php echo $_GET[inv_id]; ?>">
				<tr>
					<td align='center'><?php echo $x;$x++; ?></td>
					<td align='center'> <?php echo $show[pro_id]; ?></td>
					<td align=><?php echo $show[pro_name]; ?></td>
					<td align='right'><?php echo number_format($show[inv_price],2); ?></td>
					<td align='center'><input typt='text' name='num<?php echo $i; ?>' value='<?php echo $show[inv_num]; ?>' size='4'></td>
					<td align='center'><?php echo $show[unit_name]; ?></td>
					<td align='center'><input type='text' name='price<?php echo $i; ?>' value='<?php echo $show[inv_total]; ?>' size='4'></td>
					<td align='center'>
						<a><input type="submit" name="edit" value="แก้ไข" class="buttonee"</a>
						<a href="?del=<?php echo $show['pro_id']; ?>&inv_id=<?php echo $_GET['inv_id']; ?>" onClick="return confirm('ยืนยันการลบ')">ลบ</a>
					</td>
			</tr>
<?php $i++;} ?>
</form>
</table>
<br>
<table class="tbn">

	</table>
</div>

</body>
</html>
