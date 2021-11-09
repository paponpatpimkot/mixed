<?php
	require_once "../config.php";
	
	$result_position = mysqli_fetch_array($con->query("select * from employee where emp_id = '$_SESSION[emp_id]'"));
	if(!isset($_SESSION['emp_id']) || $result_position['emp_position'] != "ผู้จัดการ"){
		header("location:../index.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

  
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title; ?></title>
</head>

<body>
<style media="print" type="text/css">
@media print{
	.print{
		display:none;
		}
	}
	.print{
		display:none;
		}
</style>

	<?php
		$result_sell = mysqli_fetch_array($con->query("select * from selling where sell_id = '$_GET[id]'"));
	?>
    <center><div class="print"><input type="button" value="พิมพ์ใบเสร็จ" onclick="window.print();" /> 
    <?php
		if(isset($_GET['report'])){
			echo "<a href='report_inv.php'><button>ไม่พิมพ์ใบเสร็จ</button></a>";
		}else{
			echo "<a href='report_inv.php'><button>ไม่พิมพ์ใบเสร็จ</button></a>";
		}
	?></div></center>
    <br />
    <fieldset>
    
<center>
	<h3>ใบเสร็จรับเงิน</h3>
    เลขที่ใบเสร็จ <?php echo $result_sell['sell_id']; ?> วันที่ <?php echo date_th($result_sell['sell_date']); ?>
    </center><br />
    </fieldset>
    <fieldset>
    <table width="100%" cellspacing="1">
    	<tr height="35" bgcolor="#ccc">
        	<th>รหัสสินค้า</th>
            <th>สินค้า</th>
            <th align="right">ราคา</th>
            <th>จำนวน</th>
            <th align="right">รวม</th>
        </tr>
    <?php
		$amount = 0;
		$select_list = $con->query("select * from selling_list where sell_id = '$_GET[id]'");
		while($result_list = mysqli_fetch_array($select_list)){
			$result_prd = mysqli_fetch_array($con->query("select * from product where pro_id = '$result_list[pro_id]'"));
			$amount = $amount+$result_list['sell_num'];
			echo "<tr>
        	<td>$result_list[pro_id]</td>
            <td>$result_prd[pro_name]</td>
            <td align='right'>".number_format($result_list['sell_price']/$result_list['sell_num'],2)."</td>
            <td align='center'>$result_list[sell_num]</td>
            <td align='right'>".number_format($result_list['sell_price'],2)." </td> 
        </tr>";
		}
	?>
        <tr>
        	<td colspan="3" align="right"><b>รวมทั้งหมด</b></td>
            <td bgcolor="#ccc" align="center"><?php echo $amount; ?>  ชิ้น</td>
            <td bgcolor="#ccc" align="right" width="20%"><?php echo number_format($result_sell['sell_total'],2); ?>  บาท</td>
        </tr>
    </table></fieldset>
    <br />
    
</body>
</html>