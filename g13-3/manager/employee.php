<?php
	require_once("chk_position.php");
	include("header.php");
	if(isset($_GET['del'])){
		$con->query("delete from employee where emp_id = '".$_GET['del']."'");
		hd("employee.php");
	}
?>
<html>
	<head>
	<meta charset="utf-8">
	<title>Untitled Document</title>
	</head>
<body>		
    <div class="container mt-5">
		<div class="row">
			<div class="col-md-4">
				<a href="add_employee.php">+ เพิ่มข้อมูลพนักงาน</a>
			</div>
			<div class="col-md-8 d-flex justify-content-end">				
					<form action="" method="get" name="fs">	
						<div class="row">			
							<div class="col-auto">
								<input class="form-control" type="text" name="search" placeholder="ใส่ชื่อพนักงาน" value="<?php echo @$_GET['search']; ?>">
							</div>
							<div class="col-auto">
								<div class="row">
									<div class="col-auto">
										<button type="submit" class="btn btn-success">ค้นหา</button><br>							
									</div>
								<div class="col-auto">
									<select class="form-control" name="ps">
										<?php if($_GET['ps']==""){ ?>
										<option value="">&nbsp;ค้นหาจากตำแหน่ง</option>
										<?php }else{ ?>
										<option value='<?php echo $_GET[ps]; ?>'><?php echo $_GET[ps]; ?></option>
										<option value="">------------</option>
										<?php } ?>
										<option value="ผู้จัดการ">ผู้จัดการ</option>
										<option value="พนักงานขาย">พนักงานขาย</option>
										<option value="พนักงานสต๊อค">พนักงานสต๊อค</option>
									</select>
								</div>
							</div>
						</div>
					</form>
				
			</div>
		</div>
			<table class="table table-striped">
			<tr class="bg-info text-white">
				<th >ลำดับ</th>
			<th>ชื่อ</th>
			<th>เบอร์โทร</th>
			<th>ตำแหน่ง</th>
			<th>ชื่อผู้ใช้งาน</th>
			<th>สถานะ</th>
			<th>จัดการ</th>
		</tr>
				<?php
							$x=1;
							if($_GET['search']!=""||$_GET['ps']!=""){
											$row = 10;
											if($_GET['search']!=""&&$_GET['ps']!=""){
												$total_data = mysqli_num_rows($con->query("select * from employee where emp_fname LIKE '%$_GET[search]%' and emp_position='$_GET[ps]'"));
											}elseif($_GET['search']!=""&&$_GET['ps']==""){
												$total_data = mysqli_num_rows($con->query("select * from employee where emp_fname LIKE '%$_GET[search]%'"));
											}elseif($_GET['search']==""&&$_GET['ps']!=""){
												$total_data = mysqli_num_rows($con->query("select * from employee where emp_position='$_GET[ps]'"));
											}
											$total_page = ceil($total_data/$row);
											$page = @$_GET['page'];
											if($page<1){
												$page=1;
											}
											if($page>$total_page){
												$page=$total_page;
											}
											$start = ($page-1)*$row;
											if($_GET['search']!=""&&$_GET['ps']!=""){
												$string = "select * from employee where emp_fname LIKE '%$_GET[search]%' and emp_position='$_GET[ps]' order by emp_status DESC,emp_position,emp_fname limit $start,$row";
											}elseif($_GET['search']!=""&&$_GET['ps']==""){
												$string = "select * from employee where emp_fname LIKE '%$_GET[search]%' order by emp_status DESC,emp_position,emp_fname limit $start,$row";
											}elseif($_GET['search']==""&&$_GET['ps']!=""){
												$string = "select * from employee where emp_position='$_GET[ps]' order by emp_status DESC,emp_position,emp_fname limit $start,$row";
											}
											$sql = $con->query($string);
										}else{
										$row = 10;
										$total_data = mysqli_num_rows($con->query("select * from employee"));
										$total_page = ceil($total_data/$row);
										$page = @$_GET['page'];
										if($page<1){
											$page=1;
										}
										if($page>$total_page){
											$page=$total_page;
										}
										$start = ($page-1)*$row;
										$sql = $con->query("select * from employee order by emp_status DESC,emp_position,emp_fname limit $start,$row");
										}
										while($r=mysqli_fetch_array($sql)){ ?>
					<tr>
						<td><?php echo $x;$x++; ?></td>
					<td><?php echo $r['emp_fname']." ".$r['emp_lname']; ?></td>
					<td align="center">
													<?php
														if($r['emp_tel']!=""){
															echo $r['emp_tel'];
														}else{
															echo "(ไม่พบข้อมูล)";
														}
													?>
										</td>
					<td><?php echo $r['emp_position']; ?></td>
					<td><?php echo $r['emp_user']; ?></td>
					<td><?php echo $r['emp_status']; ?></td>
					<td>
							<a class="buttonee" href="edit_employee.php?id=<?php echo $r['emp_id']; ?>">แก้ไข</a>
							<?php if($r['emp_id']!=$_SESSION['emp_id']){ ?>
							<a class="buttonxx" href="?del=<?php echo $r['emp_id']; ?>" onClick="return confirm('ยืนยันการลบ')">&nbsp;ลบ&nbsp;</a>
							<?php } ?>
						</td>
					</tr>
					<?php } ?>
				</table>
				<nav aria-label="Page navigation example" class="d-flex justify-content-center">
					<ul class="pagination">
						<li class="page-item">
							<a class="page-link" href="#" aria-label="Previous"
								<?php if($page!=1){ ?> href="?page=<?php echo $page-1;echo "&ps=".$_GET['ps']."&search=".$_GET['search'];} ?>">
								<span aria-hidden="true">&laquo;</span>
							</a>
						</li>
						<li class="page-item d-flex justify-content-between">
							<?php
								for($i=1;$i<=$total_page;$i++){
									echo "<a class='page-link' href=?page=$i&ps=$_GET[ps]&search=$_GET[search]>$i</a>";
								}
							?>
						</li>						
						<li class="page-item">
							<a class="page-link" href="#" aria-label="Next"
							 <?php if($page!=$total_page){ ?>  href="?page=<?php echo $page+1;echo "&ps=".$_GET['ps']."&search=".$_GET['search'];} ?>">
							<span aria-hidden="true">&raquo;</span>
							</a>
						</li>
					</ul>
				</nav>											
	</div>
</body>
</html>
