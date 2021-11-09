<?php require_once("chk_position.php") ?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet"  type="text/css" href="../css/css.css"/>

<title>Untitled Document</title>
</head>
<body>
	<?php
    	include("header.php");
		$sh4 = mysqli_num_rows($con->query("select * from product"));
	?>
    <div class="top"></div>
    <div class="headcon"><h4>สินค้าคงคลัง <?php echo $sh4." รายการ"; ?></h4></div>
    <div class="content"><br>

    	<table class="responstable">
        	<tr>
                	<th>ลำดับ</th>
                    <th>รหัส</th>
                    <th>สินค้า</th>
                    <th>ราคาขาย</th>
                    <th>
                    	
                    	สต๊อค
                    <?php 
						if(isset($_GET['down'])){
					?>
                    	<a href="?up=T" class="glyphicon glyphicon-chevron-up "></a>
                    <?php
						}else if(isset($_GET['up'])||!isset($_GET['up'])){
					?>
                        <a href="?down=T" class="glyphicon glyphicon-chevron-down "></a>
                    <?php 
						}
					?>
                    </th>
                    <th>ประเภท</th>
                    <th>หน่วย</th>
                    <th>สถานะ</th>
              </tr>
              <?php 
			  	$x=1;
				if($_GET['down']=="T"){
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
			  	$sql = $con->query("select * from product p,unit u,category c where p.cate_id=c.cate_id and p.unit_id=u.unit_id order by p.pro_stock ,p.pro_id Limit $start,$row");
				}else if($_GET['up']=="T"||$_GET['down']==""){
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
			  	$sql = $con->query("select * from product p,unit u,category c where p.cate_id=c.cate_id and p.unit_id=u.unit_id order by p.pro_stock DESC,p.pro_id Limit $start,$row");
				}
				while($r = mysqli_fetch_array($sql)){
			  ?>
              <tr>
              	<td align="center"><?php echo $x;$x++; ?></td>
            	<td align="center"><?php echo $r['pro_id']; ?></td>
                <td><?php echo $r['pro_name']; ?></td>
                <td><?php echo number_format($r['pro_price'],2); ?></td>
                <td align="center"><?php echo $r['pro_stock']; ?></td>
                <td align="center"><?php echo $r['cate_name']; ?></td>
                <td align="center"><?php echo $r['unit_name']; ?></td>
                <td align="center"><?php echo $r['pro_status']; ?></td>
              </tr>
              <?php } ?>
        </table>
        <div align="center" class=""><br>

            <a  class="shiny-button"<?php if($page!=1){ ?> href="?page=<?php echo $page-1; echo "&up=".$_GET['up']."&down=".$_GET['down'];} ?>"> <b><< </b></a>
            <?php 
				for($i=1;$i<=$total_page;$i++){
					echo "<a  class=shiny-button href=?page=$i&up=$_GET[up]&down=$_GET[down]>$i</a>";
					}
			?>
            <a class="shiny-button" 	<?php if($page!=$total_page){ ?>  href="?page=<?php echo $page+1;echo "&up=".$_GET['up']."&down=".$_GET['down'];} ?>"><b>  >> </b></a>
        </div>
    </div>
</body>
</html>