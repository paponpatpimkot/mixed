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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title; ?></title>

  <center><div class="print"><input type="button" value="พิมพ์" onclick="window.print();" /> 
    <?php
		if(isset($_GET['report'])){
			echo "<a href='report_inv.php'><button>ยืนยัน</button></a>";
		}else{
			echo "<a href='report_day.php?month=".date('n')."&year=".date('Y')."?'><button>ไม่พิมพ์</button></a>";
		}
	?></div></center>
    <br />

    <div class="content"><br />
	<?php
		$result_sell = mysqli_fetch_array($con->query("select * from selling where sell_date = '$_GET[date]'"));
	?>
   <fieldset>
    
<center>
	<h3>รายงานการขายสินค้า</h3>
  ประจำวันที่ <?php echo date_th($_GET[date]); ?>
    </center><br />
    </fieldset>
    <fieldset>
    
     <table width="100%" cellspacing="1">
    	<tr height="35" bgcolor="#ccc">
        	<th>รหัสสินค้า</th>
            <th>สินค้า</th>
            <?php
				if(isset($_GET['date'])){
					echo "<th>จำนวน </th>
            <th align='center'>ยอดขาย </th>";
				}elseif(isset($_GET['month'])){
					echo "<th>จำนวน</th>
            <th align='center'>ยอดขาย</th>";
				}else{
					echo "<th>จำนวน </th>
            <th align='center'>ยอดขาย</th>";
				}
			?>
        </tr>
    <?php
		$amount = 0;
		$total = 0;
		if(isset($_GET['date'])){
			$select_sell = $con->query("select *,sum(selling_list.sell_num) as num,sum(selling_list.sell_total) as price from selling,selling_list,product where selling.sell_id = selling_list.sell_id and selling_list.pro_id = product.pro_id and sell_date = '$_GET[date]' group by selling_list.pro_id having sum(selling_list.sell_price) order by num desc,product.pro_name");
		}elseif(isset($_GET['month'])){
			$select_sell = $con->query("select *,sum(selling_list.sell_num) as num,sum(selling_list.sell_total) as price from selling,selling_list,product where selling.sell_id = selling_list.sell_id and selling_list.pro_id = product.pro_id and month(sell_date) = '$_GET[month]' and year(sell_date) = '$_GET[year]' group by selling_list.pro_id having sum(selling_list.sell_price) order by num desc,product.pro_name");
		}else{
			$select_sell = $con->query("select *,sum(sell_num) as num,sum(selling_list.sell_total) as price from selling,selling_list,product where selling.sell_id = selling_list.sell_id and selling_list.pro_id = product.pro_id and year(sell_date) = '$_GET[year]' group by selling_list.pro_id having sum(selling_list.sell_total) order by num desc,product.pro_name");
		}
		while($result_sell = mysqli_fetch_array($select_sell)){
			$amount = $amount+$result_sell['num'];
			$total = $total+$result_sell['price'];
			echo "<tr>
        	<td align=center>$result_sell[pro_id]</td>
            <td>$result_sell[pro_name]</td>
            <td align='center'>$result_sell[num]</td>
            <td align='center'>".number_format($result_sell['price'],2)."</td>
        </tr>";
		}
	?>
        <tr>
        	<td colspan="2" align="right"><b>รวมทั้งหมด</b></td>
            <td bgcolor="#999999" align="center"><?php echo $amount; ?></td>
            <td bgcolor="#999999" align="center"><?php echo number_format($total,2); ?></td>
        </tr>
    </table>
</body>
</html>