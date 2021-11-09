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
    <div class="top"></div>
    
    
     <div class="headcon"><h4>จัดการข้อมูลสินค้า</h4></div>
	<div class="content">
    <br>
	<div class="rnow">
    	<div class="prol">
        	<a class="button" href="add_product.php">+ เพิ่มข้อมูลสินค้า</a>
            <a class="button" href="stock.php">+ เพิ่มสินค้าเข้าสต๊อค</a>
            <a class="buttonedit" href="cate.php">จัดการประเภทสินค้า</a>
            <a class="buttonedit" href="unit.php">จัดการหน่วยสินค้า</a>
        </div>

        <div class="pror">
        	<a class="buttonred" href="prohot.php">สินค้าขายดี</a>
            <a class="buttonred" href="prolow.php">สินค้าใกล้หมดสต๊อค <font color=""><?php echo $sh4 ?>!!!</font> รายการ</a>
        </div>
        </div>
        <br>
<br>

<form class="rnow" action="" method="get">

<div class="wrap">
   <div class="search">
      <input type="text" class="searchTerm"  name="search" placeholder="ใส่รหัสสินค้า">
      <button type="submit" class="searchButton">
        <div class="gy"><i class="glyphicon glyphicon-search"></i></div>
     </button>
   </div>
</div>
     
     
            </form>
        <br>
<br>

        <div>
   
  

        </div>
        
        <div>
        
        	<table class="responstable">
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
					if($_GET['search']!=""){
						$sql = $con->query("select * from product p,unit u,category c where p.cate_id=c.cate_id and p.unit_id=u.unit_id and pro_id='$_GET[search]'");
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
                     <td align="center"><?php echo $x;$x++; ?></td>
        	        <td align="center"><?php echo $r['pro_id']; ?></td>
                    <td align=""><?php echo $r['pro_name']; ?></td>
                    <td><?php echo number_format( $r['pro_price'],2); ?></td>
                	<td><?php echo number_format($r['pro_buy'],2); ?></td>
                    <td align="center"><?php echo $r['pro_stock']; ?></td>
                    <td align="center"><?php echo $r['pro_stock_min']; ?></td>
                   <td align=""><?php echo $r['cate_name']; ?></td>
                  <td align="center"><?php echo $r['unit_name']; ?></td>
                    <td align="center"><?php echo $r['pro_status']; ?></td>
                    <td align="center"><a class="buttonee" href="edit_product.php?id=<?php echo $r['pro_id']; ?>">แก้ไข</a></td>
                </tr>
                <?php 
					}
				?>
            </table>
            <div align="center" class=""><br>

            <a  class="shiny-button"<?php if($page!=1){ ?> href="?page=<?php echo $page-1;} ?>"> <b><< |</b></a>
            <?php 
				for($i=1;$i<=$total_page;$i++){
					echo "<a  class=shiny-button href=?page=$i>$i</a>";
					}
			?>
            <a class="shiny-button" 	<?php if($page!=$total_page){ ?>  href="?page=<?php echo $page+1;} ?>"><b> | >> </b></a>
            	</div>
        </div>
    </div>

</body>
</html>