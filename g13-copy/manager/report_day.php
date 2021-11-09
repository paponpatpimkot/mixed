<?php require_once("chk_position.php") ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
	<?php 
		include('header.php');
	?>
    <div class="top"></div>
    
    
    <div class="headcon"><h4>ดูรายงานยอดขายรายวัน</h4>
    </div>
    <div class="content">
    <form action="" class="rnow" method="get">
    	<label>เดือน</label>
        <select class="tb" name="month">
        	<option value="<?php echo $_GET['month']; ?>"><?php echo month_th($_GET['month']); ?></option>
        <?php
			for($i=1;$i<=12;$i++){
				echo "<option value='$i'>".month_th($i)."</option>";
			}
		?>
        </select>
        <label>ปี</label>
        <select class="tb" name="year">
        	<option value="<?php echo $_GET['year']; ?>"><?php echo $_GET['year']+543; ?></option>
        <?php
			$select_year = $con->query("select year(sell_date) as year from selling group by year(sell_date) order by year desc");
			while($result_year = mysqli_fetch_array($select_year)){
				echo "<option value='$result_year[year]'>"; echo $result_year['year']+543; echo"</option>";
			}
		?>
        </select>
        <input type="submit" class="btny" value="ค้นหา" />
    </form>
   	<br />
    <table class="responstaba" cellspacing="1">
    	<tr>
        	<th>วันที่</th>
            <th align="right">ยอดขาย</th>
            <th></th>
        </tr>
    <?php
		$total = 0;
		$select_sell = $con->query("select *,day(sell_date) as day,sum(sell_total) as total from selling where month(sell_date) = '$_GET[month]' and year(sell_date) = '$_GET[year]' group by day(sell_date) having sum(sell_total)");
		while($result_sell = mysqli_fetch_array($select_sell)){
			$total = $total+$result_sell['total'];
			echo "<tr>
        	<td align=center>".date_th($result_sell['sell_date'])."</td>
            <td align=center>".number_format($result_sell['total'],2)."</td>
			<td align=center><a  href='report_hotd.php?date=$result_sell[sell_date]&order=price'>รายงานสินค้า</a></td>
        </tr>";
		}
	?>
        <tr>
        	<td align="right">รวมทั้งหมด</td>
            <td align="center"><?php echo number_format($total,2); ?></td>
            <td>บาท</td>
        </tr>
    </table>
    </div>
    
    
</body>
</html>