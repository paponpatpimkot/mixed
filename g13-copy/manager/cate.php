<?php require_once("chk_position.php") ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body onload="document.fs.search.focus();">
		<?php
    		include("header.php");
		?>
        <div class="top"></div>
        <div class="headcon"><h4>จัดการข้อมูลประเภทสินค้า</h4></div>
        <div class="content"><br>

        	<div class="rnow"><a class="button" href="add_cate.php">+ เพิ่มข้อมูลประเภทสินค้า</a></div><br>
					<div class="wrap">
						<form class="rnow" action="" method="get" name="fs">
							 <div class="search">
									<input type="text" class="searchTerm"  name="search" placeholder="ใส่ชื่อพนักงาน" value="<?php echo @$_GET['search']; ?>">
									<button type="submit" class="searchButton">
										<div class="gy"><i class="glyphicon glyphicon-search"></i></div>
								 </button><br>
							 </div>
		 				</form>
					</div>
            <div>
            	<table class="responstable">
                	<tr>
                    	<th>ลำดับ</th>
                        <th>ประเภท</th>
                        <th>จัดการ</th>
                    </tr>
            <?php
						$x=1;
						$row = 10;
						if($_GET['search']!=""){
							$total_data = mysqli_num_rows($con->query("select * from category where cate_name LIKE '%$_GET[search]%'"));
							$total_page = ceil($total_data/$row);
							$page = @$_GET['page'];
							if($page<1){
								$page=1;
							}
							if($page>$total_page){
								$page=$total_page;
							}
							$start = ($page-1)*$row;
							$sql = $con->query("select * from category where cate_name LIKE '%$_GET[search]%' order by cate_name  limit $start,$row");
						}else{
						$total_data = mysqli_num_rows($con->query("select * from category"));
						$total_page = ceil($total_data/$row);
						$page = @$_GET['page'];
						if($page<1){
							$page=1;
						}
						if($page>$total_page){
							$page=$total_page;
						}
						$start = ($page-1)*$row;
						$sql = $con->query("select * from category order by cate_name limit $start,$row");
						}
						while($r = mysqli_fetch_array($sql)){
					?>
                    <tr>
                    	<td align="center"><?php echo $x;$x++; ?></td>
                      	<td align="center"><?php echo $r['cate_name'] ?></td>
                       	<td align="center"><a class="buttonee" href="edit_cate.php?id=<?php echo $r['cate_id']; ?>">แก้ไข</a></td>
                    </tr>
                    <?php } ?>
                </table>
								<div align="center" class=""><br>

		            <a  class="shiny-button"<?php if($page!=1){ ?> href="?page=<?php echo $page-1;echo "&search=".$_GET['search'];} ?>"> <b><< </b></a>
		            <?php
						for($i=1;$i<=$total_page;$i++){
							echo "<a  class=shiny-button href=?page=$i&search=$_GET[search]>$i</a>";
							}
					?>
		            <a class="shiny-button" 	<?php if($page!=$total_page){ ?>  href="?page=<?php echo $page+1;echo "&search=".$_GET['search'];} ?>"><b>  >> </b></a>
		            	</div>
            </div>
        </div>
</body>
</html>
