<?php require_once("chk_position.php") ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
	<?php
		include('header.php');
		$sh4 = mysqli_num_rows($con->query("select * from product where pro_stock<pro_stock_min"));
	?>
    จัดการข้อมูลสินค้า
	 	<a href='report_inv.php'>ดูรายงานยอดขายตามใบเสร็จ</a>
    <a href='report_emp.php?month=<?php echo date('n'); ?>&year=<?php echo date('Y'); ?>'>ดูรายงานยอดขายของพนักงาน</a>
    <a href='report_day.php?month=<?php echo date('n'); ?>&year=<?php echo date('Y'); ?>'>ดูรายงานยอดขายรายวัน</a>
    <a href='report_month.php?year=<?php echo date('Y'); ?>'>ดูรายงานยอดขายรายเดือน</a>
    <a href='report_year.php'>ดูรายงานยอดขายรายปี</a>
    <a href="report_stock.php">ดูรายงานสินค้าคงคลัง</a>
</body>
</html>
