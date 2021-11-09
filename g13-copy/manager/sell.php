<?php require_once("chk_position.php") ?>
<body onLoad="document.s.id.focus();">
	<?php
		include('header.php');?>    
     <?php
		$sh4 = mysqli_num_rows($con->query("select * from product where pro_stock<pro_stock_min"));
		if(isset($_POST['cancle'])){
			unset($_SESSION['inline']);
			unset($_SESSION['pro_id']);
			unset($_SESSION['pro_num']);
		}

		if(isset($_POST['del'])){
			$i = $_POST['i'];
			$_SESSION['pro_id'][$i]="";
			hd('sell.php');
		}

		if(isset($_POST['edit'])){
			$i = $_POST['i'];
			$num = $_POST['enum'];
			$_SESSION['pro_num'] [$i]= $num;
			$ck4 = mysqli_fetch_array($con->query("select * from product where pro_id='".$_SESSION['pro_id'][$i]."'"));
									if($ck4['pro_stock']<$_SESSION['pro_num'][$i] ){
										$_SESSION['pro_num'][$i] = $ck4['pro_stock'];
										al("สินค้าหมดสต๊อค");
									}
		}
	?>

    <?php
				if(isset($_POST['done'])){
			if($_SESSION['total']==0){
				al("กรุณาเพิ่มรายการสินค้าก่อน");
			}else{
				hd("sell_total.php");
			}
		}

    	if(isset($_POST['add'])){
			$id = $_POST['id'];
			if($id==""){
				al("กรุณาใส่รหัสสินค้า");
			}else{
				$ck1 = mysqli_num_rows($con->query("select * from product where pro_id ='$id'"));
				if($ck1!=1){
					al("รหัสสินค้าไม่ถูกต้อง");
				}else{
					$ck2 = 	mysqli_num_rows($con->query("select * from product where pro_id ='$id' and pro_status='ใช้งาน'"));
					if($ck2!=1){
						al("สินค้าอยู่ในสถานะยกเลิก");
					}else{
						$ck3 = mysqli_num_rows($con->query("select * from product where pro_id ='$id' and pro_stock<=0"));
						if($ck3!=0){
							al("สินค้าหมดสต๊อค");
						}else{
							if(!isset($_SESSION['inline'])){
								$_SESSION['inline']  = 0;
								$_SESSION['pro_id'][0] = $id;
								$_SESSION['pro_num'][0] = 1;
							}else{
								$key = array_search($id,$_SESSION['pro_id']);
								if((string)$key!=""){
									$_SESSION['pro_num'][$key] = $_SESSION['pro_num'][$key]+1;
									$ck4 = mysqli_fetch_array($con->query("select * from product where pro_id='".$_SESSION['pro_id'][$key]."'"));
									if($ck4['pro_stock']<$_SESSION['pro_num'][$key] ){
										$_SESSION['pro_num'][$key] = $_SESSION['pro_num'][$key]-1;
										al("สินค้าหมดสต๊อค");
									}
								}else{
									$_SESSION['inline'] = $_SESSION['inline']+1;
									$i = $_SESSION['inline'];
									$_SESSION['pro_id'][$i] = $id;
									$_SESSION['pro_num'][$i]= 1;
									hd('sell.php');
								}

							}
						}
					}
				}
			}
		}
        ?>
		<div class="container w-75 mt-5">
			<div class="d-flex justify-content-end">
				<a href="prolow.php" class="btn btn-warning w-25">สินค้าใกล้หมดสต๊อค <?php echo $sh4 ?>!!!รายการ</a>
			</div>			
        	<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="s">
				<div class="row g-3 align-items-center">
					<div class="col-auto">
						<label class="col-form-label">กรอกรหัสสินค้า</label>
					</div>
					<div class="col-auto">
						<input type="text" name="id" class="form-control">
					</div>
					<div class="col-auto">
						<input type="submit" class="btn btn-primary" name="add" value="เพิ่มสินค้าลงในตะกร้า">
					</div>
				</div>
				<div class="row mt-5">
					<div class="col-10">						
					</div>
					<div class="col-1">
                		<input class="btn btn-primary" type="submit" name="done" value="ชำระเงิน">
					</div>
                	<div class="col-1">
						<input class="btn btn-danger" type="submit" name="cancle" value="ยกเลิก">                                    
					</div>
					
				</div>            	
            </form><br>
        	
        	<table class="table table-striped">

            	<tr class="bg-info text-white">
                  <th>ลำดับ</th>
                  <th>รหัส</th>
                  <th>สินค้า</th>
                  <th>หน่วย</th>
                  <th>ราคา</th>
                  <th>จำนวน</th>
                  <th>ราคารวม</th>
                  <th>จัดการ</th>
                </tr>
                <?php
					$n = 0;
					$_SESSION['total'] = 0;
					$x=1;
					for($i=0;$i<=$_SESSION['inline'];$i++){
						if($_SESSION['pro_id'][$i]!=""){
							$sh =mysqli_fetch_array($con->query("select * from product p,unit u where p.unit_id=u.unit_id and p.pro_id='".$_SESSION['pro_id'][$i]."'"));
							 $tt = $_SESSION['pro_num'][$i] *  $sh['pro_price'];
							$_SESSION['total'] = $tt + $_SESSION['total'];
							$n = $n+$_SESSION['pro_num'][$i];

				?>
                <tr>
                	<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                	<td><?php echo $x;$x++; ?></td>
                  <td><?php echo $sh['pro_id']; ?></td>
                  <td><?php echo $sh['pro_name']; ?></td>
                  <td><?php echo $sh['unit_name']; ?></td>
                  <td><?php echo number_format($sh['pro_price'],2); ?></td>
                  <td><input type="text" value="<?php echo $_SESSION['pro_num'][$i]; ?>" name="enum"></td>
                  <td><?php echo number_format($tt,2) ;?></td>
                  <td>
                    	<input type="hidden" name="i" value="<?php echo $i ;?>">
                     	<input type="submit" name="edit" value="แก้ไข">
                      <input type="submit" name="del" value="&nbsp;ลบ&nbsp;" onClick="return confirm ('ยืนยันการลบ')">
                  </td>
                 </form>
                </tr>
                <?php
						}
					}

				 ?>
                <tr>
                  <td colspan="5" align="right"><b>รวมทั้งหมด</b></td>
            			<td bgcolor="#999999" align="center"><?php echo $n; ?></td>
            			<td bgcolor="#999999" align=""><?php echo number_format($total,2); ?></td>
            			<td bgcolor="#999999" align="center">บาท</td>
                </tr>
            </table>
		</div>
</body>

