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
    
    
     <div class="headcon"><h4>
ดูรายงานยอดขายรายเดือน</h4>
    </div>
    <div class="content">
    <form class="rnow" action="" method="get">
    	<label>เดือน</label>
        <select class="tb" name="year">
        	<option value="<?php echo $_GET['year']; ?>"><?php echo $_GET['year']+543; ?></option>
        <?php
			$select_year = $con->query("select year(sell_date) as year from selling group by year(sell_date) order by year desc");
			while($result_year = mysqli_fetch_array($select_year)){
				echo "<option value='$result_year[year]'>"; echo $result_year['year']+543; echo"</option>";
			}
		?>
        </select>
        <input class="btny" type="submit" value="ค้นหา" />
    </form>
   	<br />
    <table class="responstaba" cellspacing="1">
    	<tr>
        	<th>เดือน</th>
            <th align="right">ยอดขาย</th>
            <th></th>
        </tr>
    <?php
		$total = 0;
		$select_sell = $con->query("select *,month(sell_date) as month,sum(sell_total) as total from selling where year(sell_date) = '$_GET[year]' group by month(sell_date) having sum(sell_total)");
		while($result_sell = mysqli_fetch_array($select_sell)){
			$total = $total+$result_sell['total'];
			echo "<tr>
        	<td align=center>".month_th($result_sell['month'])."</td>
            <td align='center'>".number_format($result_sell['total'],2)."</td>
			<td align=center><a href='report_hotm.php?month=$result_sell[month]&year=$_GET[year]&order=price'>รายงานสินค้า</a></td>
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