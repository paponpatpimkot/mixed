<?php require_once("chk_position.php"); if(isset($_SESSION['inv_no'])){ hd('add_stock.php'); } ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body onload="document.ooo.no.focus();">
	<?php
    	include("header.php");

		if(isset($_POST['done'])){
			$no = $_POST['no'];
			$from = $_POST['from'];
			$note = $_POST['note'];
			if($no==""||$from==""){
				sc("กรุณากรอกข้อมูลให้ครบถ้วน");
			}else{
				$con->query("insert into inventory values('','$no','$_SESSION[emp_id]','$from','','$note','".date('Y-m-d')."')");
				$_SESSION['inv_no'] = $no;
				hd('add_stock.php');
			}
		}
	?>
    <div class="top"></div>
    <div class="headcon"><h4>เพิ่มสินค้าเข้าสต๊อค</h4></div>
    <div class="content"><br>

    	<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="ooo">
        	<table class="tbn">
            	<tr>
                	<td>รหัสใบเสร็จ</td>
                    <td><input type="text" class="tb" name="no"></td>
                </tr>
                <tr>
                	<td>ซื้อมาจาก</td>
                    <td><input type="text" class="tb" name="from"></td>
                </tr>
                <tr>
                	<td>โน๊ต</td>
                    <td><input type="text" class="tb" name="note">*** ไม่บังคับ</td>
                </tr>
                <tr>
                    <td></td>
                	<td><input class="buty" type="submit" name="done" value="ยืนยัน"></td>
                </tr>
            </table>
        </form>

    <div>
    	<table class="responstable">
        	<tr>
            	<th>ลำดับ</th>
                <th>เลขที่ใบเสร็จ</th>
                <th>ผู้บันทึก</th>
                <th>ยอดรวม</th>
                <th>วันที่</th>
                <th>ดูรายละเอียด</th>
            </tr>
            <?php
				$x= 1 ;
				$sql = $con->query("select * from inventory i,employee e where i.emp_id = e.emp_id and i.inv_total<>0");
				while($r=mysqli_fetch_array($sql)){
			?>
            <tr>
            	<td align="center"><?php echo $x;$x++; ?></td>
                <td align="center"><?php echo $r['inv_no']; ?></td>
                <td><?php echo $r['emp_fname']." ".$r['emp_lname']; ?></td>
                <td align="right"><?php echo number_format($r['inv_total'],2) ?></td>
                <td align="center"><?php echo date_th($r['inv_date']);?></td>
                <td align="center"><a class="buttonee" href=stock_dtail.php?inv_id=<?php echo $r['inv_id']; ?>>&nbsp; ดู &nbsp;</a></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
