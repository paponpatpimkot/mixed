<?php
	require_once("chk_position.php");
	include("header.php");	
    $gid=1;
    $eq=$con->query("SELECT * FROM equipment eq,uniform_list u where eq.eq_id=u.eq_id and g_id='$gid'");
?>
<html>
	<head>
	<meta charset="utf-8">
	<title>Untitled Document</title>
	</head>
<body>		
    <div class="container mt-5 w-50">	        	        
        <div class="card">
        <form action="select_eq2.php?std_id=6530002" method="POST">
            <div class="card-header bg-success text-white text-center">
                <h5>รายการชุดเครื่องแบบที่คุณจะได้รับ กรุณาระบุขนาด</h5>
            </div>
            <div class="card-body">
                
                <table class="table table-striped">
                    <tr>
                        <th>ลำดับที่</th>
                        <th>ชื่ออุปกรณ์</th>
                        <th>จำนวน</th>
                        <th>ขนาด</th>
                    </tr>
                    <?php 
                        $i=1;
                        while($row=mysqli_fetch_array($eq)){ 
                    ?>
                    <tr>
                        <td><?php echo $i;?></td>                        
                        <td><?php echo $row['eq_name']?></td>
                        <input type="hidden" name="eq_id[<?php echo $i?>]" value="<?php echo $row['eq_id']?>">
                        <td><?php echo $row['qty']?></td>
                        <input type="hidden" name="qty[<?php echo $i?>]" value="<?php echo $row['qty']?>">
                 <?php 
                   if($row['type']==1){ ?>
                        <td>                            
                                <select name="size[<?php echo $i?>]" class="form-control">
                                    <option value="0">ระบุขนาด</option>
                                    <option value="s">s</option>
                                    <option value="m">m</option>
                                    <option value="L">L</option>
                                    <option value="xl">xL</option>
                                </select>
                        </td>
                    <?php }elseif($row['type']==2){?>
                        <td>                            
                                <select name="size[<?php echo $i?>]" class="form-control">
                                    <option value="0">ระบุขนาด</option>
                                    <option value="39">39</option>
                                    <option value="40">40</option>
                                    <option value="41">41</option>
                                    <option value="42">42</option>
                                </select>
                        </td>
                    <?php }elseif($row['type']==3){ ?>
                        <td></td>
                    <?php } ?>
                    </tr>
                    <?php                         
                        $i++;                    
                        } 
                    ?>
                </table>                
            </div>
            <div class="card-footer d-flex justify-content-center">
                    <input type="submit" class="btn btn-primary w-25" value="ตกลง" name="add_uniform">                
            </div>
            </form>
        </div>        									
	</div>
</body>
</html>
