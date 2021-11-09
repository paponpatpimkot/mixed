<?php
	require_once("chk_position.php");
	include("header.php");
	$sh1 = mysqli_fetch_array($con->query("select sum(sell_total)as total from selling where sell_date = '".date('Y-m-d')."'"));
	$sh2 = mysqli_fetch_array($con->query("select sum(sell_total)as total from selling where sell_date  between '".date('Y-m-01')."' and '".date('Y-m-31')."'"));
	$sh3 = mysqli_fetch_array($con->query("select sum(sell_total)as total from selling where sell_date  between '".date('Y-01-01')."' and '".date('Y-12-31')."'"));
	$sh4 = mysqli_num_rows($con->query("select * from product where pro_stock<pro_stock_min"));
	$sss = mysqli_fetch_array($con->query("select *,sum(sell_total)as total from selling s,employee e where s.emp_id=e.emp_id and e.emp_position<>'ผู้จัดการ' and  s.sell_date  between '".date('Y-m-01')."' and '".date('Y-m-31')."' group by e.emp_id order by total DESC limit 1"));
	$ckemp = mysqli_num_rows($con->query("select *,sum(sell_total)as total from selling s,employee e where s.emp_id=e.emp_id and e.emp_position<>'ผู้จัดการ' and  s.sell_date  between '".date('Y-m-01')."' and '".date('Y-m-31')."' group by e.emp_id order by total DESC limit 1"));
?>

  รายงานรวม<br>
    ยอดขายวันนี้ <?php echo number_format($sh1['total'],2)."บาท"; ?>
    <a href='report_day.php?month=<?php echo date('n'); ?>&year=<?php echo date('Y'); ?>'>ดูรายละเอียด</a><br>
		ยอดขายเดือนนี้ <?php echo number_format($sh2['total'],2)."บาท"; ?>
      <a href='report_month.php?year=<?php echo date('Y'); ?>'>ดูรายละเอียด</a><br>
    ยอดขายปีน<?php echo number_format($sh3['total'],2)." บาท"; ?>
      <a href="report_year.php">ดูรายละเอียด</a><br>
    สินค้าใกล้หมดสต๊อค<?php echo $sh4."&nbsp;รายการ" ?>
			<a href="prolow.php">ดูรายละเอียด</a><br>
  	พนักงานดีเด่น<?php if($ckemp==0){ ?>ยังไม่พบข้อมูล
        <?php }else{ ?>
        <?php echo $sss['emp_fname']." ".$sss['emp_lname'] ?><br><?php echo "ยอดขาย".number_format($sss['total'])." บาท" ?>
        <?php } ?><br>
      สินค้าขายดี
				<a href="prohot.php">ดูรายละเอียด</a>

