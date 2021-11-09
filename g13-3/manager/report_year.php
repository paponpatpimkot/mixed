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
    
    
    
<div class="headcon">
	<H4>ดูรายงานยอดขายรายปี</H4>
    </div>
    <div class="content">
    <br />

    <table class="responstaba" cellspacing="1">
    	<tr>
        	<th>ปี</th>
            <th align="right">ยอดขาย</th>
            <th></th>
        </tr>
    <?php
		$total = 0;
		$select_sell = $con->query("select *,year(sell_date) as year,sum(sell_total) as total from selling group by year(sell_date) having sum(sell_total)");
		while($result_sell = mysqli_fetch_array($select_sell)){
			$total = $total+$result_sell['total'];
			echo "<tr>
        	<td align='center'>"; echo $result_sell['year']+543; echo"</td>
            <td align='center'>".number_format($result_sell['total'],2)."</td>
			<td align='center'><a href='report_prd.php?year=$result_sell[year]&order=price'>รายงานสินค้า</a></td>
        </tr>";
		}
	?>
        <tr>
        	<td align="right"><b>รวมทั้งหมด</b></td>
            <td align="center"><?php echo number_format($total,2); ?></td>
            <td>บาท</td>
        </tr>
    </table>
    </div>
</body>
</html>