<?php require_once("chk_position.php") ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>


</head>
<body onload="document.ppp.search.focus();">
	<?php
		include('header.php');
			$sh4 = mysqli_num_rows($con->query("select * from product where pro_stock<pro_stock_min"));
	?>



    จัดการข้อมูลสินค้า
	        	<a href="add_product.php">+ เพิ่มข้อมูลสินค้า</a>
            <a href="stock.php">+ เพิ่มสินค้าเข้าสต๊อค</a>
            <a href="cate.php">จัดการประเภทสินค้า</a>
            <a href="unit.php">จัดการหน่วยสินค้า</a>
          	<a href="prohot.php">สินค้าขายดี</a>
            <a href="prolow.php">สินค้าใกล้หมดสต๊อค <?php echo $sh4 ?>!!!รายการ</a>
						<form class="rnow" action="" method="get" name="ppp">
              <input type="text" name="search" placeholder="ใส่รหัสสินค้า" value="<?php echo @$_GET['search']; ?>">
          		<button type="submit">ค้นหาสินค้า</button>
          <?php
		  	$s1 = $con->query("select * from category");
		  ?>
          <select name="cate">
			<?php if($_GET['cate']==""){ ?>
					<option value="">ค้นหาจากประเภทสินค้า</option>
			<?php }else{
						$s11 = mysqli_fetch_array($con->query("select * from category where cate_id='$_GET[cate]'"));
			?>			<option value='<?php echo $_GET[cate]; ?>'><?php echo $s11['cate_name']; ?></option>
							<option value="">------------</option>
			<?php }
            	while($rr=mysqli_fetch_array($s1)){
			?>
				<option value="<?php echo $rr['cate_id']; ?>"><?php echo $rr['cate_name']; ?></option>
			<?php
				}
			?>
          </select>
    </form>
        	<table>
            	<tr>
                	<th>ลำดับ</th>
                    <th>รหัส</th>
                    <th>สินค้า</th>
                    <th>ราคาขาย</th>
                    <th>ทุน(เฉลี่ย)</th>
                    <th>สต๊อค</th>
                    <th>สต๊อคขั้นต่ำ</th>
                    <th>ประเภท</th>
                    <th>หน่วย</th>
                    <th>สถานะ</th>
                	<th>จัดการ</th>
                </tr>
                <?php
					if(@$_GET['search']!=""){
						$row = 10 ;
						$total_data = mysqli_num_rows($con->query("select * from product where  pro_id like '%$_GET[search]%' order by pro_status DESC,pro_id"));
						$total_page = ceil($total_data/$row);
						$page = @$_GET['page'];
						if($page<1){
							$page=1;
						}
						if($page>$total_page){
							$page=$total_page;
						}
						$start = ($page-1)*$row;
						$sql = $con->query("select * from product p,unit u,category c where p.cate_id=c.cate_id and p.unit_id=u.unit_id and pro_id like '%$_GET[search]%' order by pro_status DESC,pro_id limit $start,$row");
					}else if(@$_GET['cate']!=""){
						$row = 10 ;
						$total_data = mysqli_num_rows($con->query("select * from product p,unit u,category c where p.cate_id=c.cate_id and p.unit_id=u.unit_id and p.cate_id='$_GET[cate]'"));
						$total_page = ceil($total_data/$row);
						$page = @$_GET['page'];
						if($page<1){
							$page=1;
						}
						if($page>$total_page){
							$page=$total_page;
						}
						$start = ($page-1)*$row;
							$sql = $con->query("select * from product p,unit u,category c where p.cate_id=c.cate_id and p.unit_id=u.unit_id and p.cate_id='$_GET[cate]' Limit $start,$row");
					}else{
					$row = 10 ;
					$total_data = mysqli_num_rows($con->query("select * from product"));
					$total_page = ceil($total_data/$row);
					$page = @$_GET['page'];
					if($page<1){
						$page=1;
					}
					if($page>$total_page){
						$page=$total_page;
					}
					$start = ($page-1)*$row;
					$sql = $con->query("select * from product p,unit u,category c where p.cate_id=c.cate_id and p.unit_id=u.unit_id order by p.pro_status DESC,p.pro_id Limit $start,$row ");
					}
					$x=1;
					while($r=mysqli_fetch_array($sql)){
				?>
                <tr>
                 <td><?php echo $x;$x++; ?></td>
        	       <td><?php echo $r['pro_id']; ?></td>
                 <td><?php echo $r['pro_name']; ?></td>
                 <td><?php echo number_format( $r['pro_price'],2); ?></td>
                 <td><?php echo number_format($r['pro_buy'],2); ?></td>
                 <td><?php echo $r['pro_stock']; ?></td>
                 <td><?php echo $r['pro_stock_min']; ?></td>
                 <td><?php echo $r['cate_name']; ?></td>
                 <td><?php echo $r['unit_name']; ?></td>
                 <td><?php echo $r['pro_status']; ?></td>
                 <td><a href="edit_product.php?id=<?php echo $r['pro_id']; ?>">แก้ไข</a></td>
                </tr>
                <?php
					}
				?>
            </table>
            <a  <?php if($page!=1){ ?> href="?page=<?php echo $page-1; echo "&cate=".$_GET['cate']."&search=".$_GET['search'];} ?>"> <b><< </b></a>
            <?php
				for($i=1;$i<=$total_page;$i++){
					echo "<a  href=?page=$i&cate=$_GET[cate]&search=$_GET[search]>$i</a>";
					}
			?>
            <a <?php if($page!=$total_page){ ?>  href="?page=<?php echo $page+1;echo "&cate=".$_GET['cate']."&search=".$_GET['search'];} ?>"><b>  >> </b></a>
</body>
</html>
