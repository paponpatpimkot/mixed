<?php
	require_once("chk_position.php");
	include("header.php");
	if(isset($_GET['del'])){
		$con->query("delete from employee where emp_id = '".$_GET['del']."'");
		hd("employee.php");
	}
    if(isset($_POST['eq_run'])){        
        $eq_name=$_POST['eq_name'];
        if($eq_name==''){
            echo "<script>alert('กรอกชื่ออุปกรณ์ก่อน')</script>";
        }else{
        $r=$con->query("INSERT INTO equipment VALUES('','$eq_name')");
        }    
    }
    $eq=$con->query("SELECT * FROM equipment");
?>
<html>
	<head>
	<meta charset="utf-8">
	<title>Untitled Document</title>
	</head>
<body>		
    <div class="container mt-5">		
        <form action="equipment.php" method="post">
            <div class="row w-50">
                <div class="col-md-3">
                    <label for="">ชื่ออุปกรณ์</label>                    
                </div>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="eq_name">
                </div>
                <div class="col-md-2">
                    <input type="submit" class="btn btn-primary" value="เพิ่มข้อมูล" name="eq_run">
                </div>
            </div>
        </form>
        <table class="table table-striped">
            <tr>
                <th>ลำดับที่</th>
                <th>ชื่ออุปกรณ์</th>
            </tr>
            <?php 
                $i=1;
                while($row=mysqli_fetch_array($eq)){ 
            ?>
            <tr>
                <td><?php echo $i;$i++; ?></td>
                <td><?php echo $row['eq_name']?></td>
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
