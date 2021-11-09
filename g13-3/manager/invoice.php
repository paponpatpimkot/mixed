<?php require_once("../config.php") ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
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
<style>
	.content{
		width:95%;
		margin:auto;
		}
	.a{
		width:95%;
		margin:auto;
		}
	.a th{
		background:#ccc;
		}
</style>
<body>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
	<center><div class="print"><input name="print" onClick="window.print()" type="button" value="พิมพ์"><input class="btnx" type="submit" name="cancle" value="ไม่พิมพ์"></div><br>
    </form>
    <?php
    	if(isset($_POST['cancle'])){
				hd("sell.php");
			}
		?>
</center>
<Fieldset>
	<?php
    	$id = mysqli_fetch_array($con->query("select MAX(sell_id)as id from selling"));
		
		$sql1 = mysqli_fetch_array($con->query("select * from selling s,employee e where s.emp_id = e.emp_id and s.sell_id='$id[id]'"));
		$sum = mysqli_fetch_array($con->query("select SUM(sell_num)as num from selling_list where sell_id ='$id[id]'"));
		$sql2 = $con->query("select * from selling_list s,product p,unit u where s.pro_id=p.pro_id and p.unit_id=u.unit_id and s.sell_id='$id[id]'");
		
	?>
   <div> <center><h4>ใบเสร็จสินค้า</h4><center></div><br>
   <center>เลขที่ใบเสร็จ <?php echo $sql1['sell_id']; ?>  <?php echo "วันที่ออกใบเสร็จ ".date_th($sql1['sell_date']); ?></center>
   </Fieldset>
   <fieldset>
    <div>
    
        <div>
        
        	<table class="a">
            	<tr>
                	<th>ลำดับ</th>
                    <th>รหัส</th>
                    <th>สินค้า</th>
                    <th>ราคา</th>
                    <th>จำนวน</th>
                    <th>หน่วย</th>
                    <th>ราคารวม</th>
                </tr>
                <?php 
					$x=1;
					while($r = mysqli_fetch_array($sql2)){
				 ?>
                <tr>
                	<td align="center"><?php echo $x;$x++;?></td>
                    <td align="center"><?php echo $r['pro_id'];?></td>
                    <td ><?php echo $r['pro_name'];?></td>
                    <td><?php echo number_format($r['sell_price'],2);?></td>
                    <td align="center"><?php echo $r['sell_num'];?></td>
                    <td align="center"><?php echo $r['unit_name'];?></td>
                    <td><?php echo number_format($r['sell_total'],2);?></td>
                </tr>
                <?php } ?>
                <tr>
                	<td></td>
                    <td></td>
                    <td ></td>
                    <td>รวม</td>
                    <td><?php echo $sum['num']; ?></td>
                    <td></td>
                    <td><?php echo number_format($sql1['sell_total'],2); ?></td>
                </tr>
                <tr>
                	<td></td>
                    <td></td>
                    <td></td>
                    <td>ส่วนลด</td>
                    <td></td>
                    <td></td>
                    <td><?php echo number_format($sql1['sell_dis'],2); ?></td>
                </tr>
                <tr>
                	<td></td>
                    <td></td>
                    <td></td>
                    <td>เงินสด</td>
                    <td></td>
                    <td></td>
                    <td><?php echo number_format($sql1['sell_cash'],2); ?></td>
                </tr>
                <tr>
                	<td></td>
                    <td></td>
                    <td></td>
                    <td>เงินทอน</td>
                    <td></td>
                    <td></td>
                    <td><?php $ccc =($sql1['sell_dis']+$sql1['sell_cash'])-$sql1['sell_total'] ;echo number_format($ccc,2); ?></td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>