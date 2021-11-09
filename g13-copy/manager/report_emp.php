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
	<H4>รายงานยอดขายของพนักงาน</H4>
     </div>
    <div class="content">
    <form class="rnow" action="" method="get">
    	<label>แสดงรายงาน เดือน</label>
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
        	<th>ชื่อ</th>
            <th>ยอดขาย</th>
        </tr>
    <?php
		$select_sell = $con->query("select *,sum(sell_total) as total from selling,employee where month(sell_date) = '$_GET[month]' and year(sell_date) = '$_GET[year]' and selling.emp_id = employee.emp_id group by selling.emp_id having sum(sell_total)");
		while($result_sell = mysqli_fetch_array($select_sell)){
			echo "<tr>
        	<td>$result_sell[emp_fname] $result_sell[emp_lname]</td>
            <td>".number_format($result_sell['total'],2)." บาท</td>
        </tr>";
		}
	?>
    </table>
    </div>
</body>
</html>