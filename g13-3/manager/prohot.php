<?php require_once("chk_position.php") ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
	<?php
    	include("header.php");

	?>
    <div class="top"></div>
    <div class="headcon"><h4>สินค้าขายดีประจำเดือน</h4></div>
    <div class="content"><br>

    	<table class="responstable">
        	<tr>
                	<th>ลำดับ</th>
                    <th>รหัส</th>
                    <th>สินค้า</th>
                    <th>ราคาขาย</th>
                    <th>สต๊อค</th>
                    <th>หน่วย</th>
                    <th>ขายไป</th>
                    <th>สถานะ</th>
              </tr>
              <?php 
			  	$x=1;
			  	$sql = $con->query("select *,sum(sell_num)as num from selling ss,selling_list s,product p,unit u where s.pro_id=p.pro_id and p.unit_id=u.unit_id and ss.sell_id=s.sell_id and ss.sell_date between '".date('Y-m-01')."' and '".date('Y-m-31')."' group by p.pro_id order by num DESC limit 10");
				while($r = mysqli_fetch_array($sql)){
			  ?>
              <tr>
              	<td align="center"><?php echo $x;$x++; ?></td>
            	<td align="center"><?php echo $r['pro_id']; ?></td>
                <td><?php echo $r['pro_name']; ?></td>
                <td><?php echo number_format($r['pro_price'],2); ?></td>
                <td align="center"><?php echo $r['pro_stock']; ?></td>
                <td align="center"><?php echo $r['unit_name']; ?></td>
                <td align="center"><?php echo $r['num']; ?></td>
                <td align="center"><?php echo $r['pro_status']; ?></td>
              </tr>
              <?php } ?>
        </table>
    </div>
</body>
</html>