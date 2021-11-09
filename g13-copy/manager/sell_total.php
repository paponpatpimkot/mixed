<?php require_once("chk_position.php") ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
	<?php 
		include('header.php');
		
		if(isset($_POST['cancle'])){
			hd("sell.php");
		}
	?>
    <div class="top"></div>
    <div class="headcon"><h4>ชำระเงิน</h4></div>
    <div class="content" align="center"><br>

    	<?php 
			if(!isset($_POST['cal'])){
				$dis = 0;
				$change = 0;
				$tt =  $_SESSION['total'] - $dis;
			}
			
			if(isset($_POST['cal'])||isset($_POST['done'])){
				$dis = $_POST['dis'];
				$cash = $_POST['cash'];
				if($dis!=""){
					$tt =$_SESSION['total'] - $dis;
				}
				if($cash!=""){
					if($cash<$tt){
						$change = $cash - $tt;
						al("จำนวนเงินไม่ถูกต้อง");
					}else{
						$change = $cash - $tt;
					}
				}
				
			}
			
			if(isset($_POST['done'])){
				$dis = $_POST['dis'];
				$cash = $_POST['cash'];
				
				if($change<0||$cash<$tt){
					al("กรุณาใส่จำนวนเงินให้ถูกต้อง");
				}else{
					$con->query("insert into selling values('','".$_SESSION['emp_id']."','$_SESSION[total]','$dis','$cash','".date('Y-m-d')."');");
					$id = mysqli_fetch_array($con->query("select MAX(sell_id)as id from selling"));
					for($i=0;$i<=$_SESSION['inline'];$i++){
						if($_SESSION['pro_id'][$i]!=""){
							$sh =mysqli_fetch_array($con->query("select * from product p,unit u where p.unit_id=u.unit_id and p.pro_id='".$_SESSION['pro_id'][$i]."'"));
							$ts = $_SESSION['pro_num'][$i] * $sh['pro_price'];
							$con->query("insert into selling_list values('$id[id]','$sh[pro_id]','$sh[pro_price]','".$_SESSION['pro_num'][$i]."','$ts');");
							$con->query("update product set pro_stock=pro_stock-'".$_SESSION['pro_num'][$i]."' where pro_id ='".$_SESSION['pro_id'][$i]."'");
						}
					}
					unset($_SESSION['inline']);
			unset($_SESSION['pro_id']);
			unset($_SESSION['pro_num']);
			
					hd('invoice.php');
				}
			}
		?>
    	<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        	<table class="tbnnnn"> 
            	<tr>
                	<td><font size="+3">ราคารวม</font></td>
                    <td><font size="+3"><?php echo number_format($_SESSION['total'],2); ?></font></td>
                    <td><font size="+3">บาท</font></td>
                </tr>
                <tr>
                	<td><font size="+3">ส่วนลด</font></td>
                    <td><input type="text" value="<?php echo $dis ?>" name="dis" class="tblogin"></td>
                    <td><font size="+3">บาท</font></td>
                </tr>
                <tr>
                	<td ><font size="+3">ยอดสุทธิ</font></td>
                    <td><font size="+3"><?php echo number_format($tt,2); ?></font></td>
                    <td><font size="+3">บาท</font></td>
                </tr>
                <tr>
                	<td><font size="+3">เงินสด</font></td>
                    <td><input type="text" class="tblogin" name="cash" value="<?php echo $cash ?>"></td>
                    <td><font size="+3">บาท</font>&nbsp;&nbsp;&nbsp;<input  class="btne" type="submit" name="cal" value="คำนวณ"></td>
                </tr>
                <tr>
                	<td><font size="+3">เงินทอน</font></td>
                    <td><font size="+3"><?php echo number_format($change,2); ?></font></td>
                    <td><font size="+3">บาท</font></td>
                </tr>
                <tr>
                	<td></td>
                    <td align=""><input class="buty" type="submit" name="done" value="เสร็จสิ้น">&nbsp;&nbsp;&nbsp;<input type="submit" class="butx" name="cancle"  value="ยกเลิก"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>