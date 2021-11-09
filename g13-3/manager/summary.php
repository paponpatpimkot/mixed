<?php
    require_once("chk_position.php");
	include("header.php");
    $std_id='6530002';
    $sql=$con->query("SELECT * FROM equipment eq,slip s,slip_list sl WHERE s.slip_id=sl.slip_id and eq.eq_id=sl.eq_id and s.std_id='$std_id'");    
?>
<div class="container w-50 mt-5">
    <table class="table table-striped">
        <tr>
            <th>ลำดับที่</th>
            <th>ชื่ออุปกรณ์</th>
            <th>จำนวน</th>
            <th>ขนาด</th>
        </tr>
        <?php 
            $i=1;
            while($row=mysqli_fetch_array($sql)){ 
        ?>
        <tr>
            <td><?php echo $i;?></td>                        
            <td><?php echo $row['eq_name']?></td>        
            <td><?php echo $row['qty']?></td>
            <td><?php echo $row['size']?></td>
        </tr>
        <?php 
            $i++;
            }
        ?>
    </table>
</div>