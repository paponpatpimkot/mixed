<?php 
    if(isset($_POST['search'])){
        @$ukeyword = $_POST['ukeyword'];
        $_SESSION['uid'] = $ukeyword;
        $sqlidr = "SELECT * FROM user WHERE Username = '$ukeyword'";
        $queryidr = $connect->query($sqlidr);
        $fetchidr = mysqli_fetch_array($queryidr);
        $numidr = mysqli_num_rows($queryidr);
        if($numidr != 0){
            $sql = "SELECT * FROM givback";
            $query = $connect->query($sql);
            $num = mysqli_num_rows($query);
            $n = $num   +1;
            $re = "RE-"."$n";
            $_SESSION['re'] = $re;
        }else if($numidr == 0){
            echo "<script>alert('กรุณาใส่ Username ให้ถูกต้อง');window.location.href='index.php?page=return'</script>";
        }
    }
    $uc = $_SESSION['uid'];
    $sqlidr = "SELECT * FROM user WHERE Username = '$uc'";
    $queryidr = $connect->query($sqlidr);
    $fetchidr = mysqli_fetch_array($queryidr);
    
?>
<body onload="document.frm.device_id.focus();">
    <div class="card card-nav-tabs">
    <div class="card-header card-header-primary">
        Return Form  : <?php echo " ".$_SESSION['re'];?>
    </div>
    <div class="card-body">
        <h5 class="card-title text-right">Date : <?php echo date("d-m-Y") ?></h5>
        <form action="return2_save.php" method="POST" name="frm">
            <div class="form-row">
                <div class="col">
                    Name : <input type="text" class="form-control pl-3" value="<?php echo $fetchidr['Name']?>" readonly>
                </div>
                <div class="col">
                    Surname : <input type="text" class="form-control pl-3" value="<?php echo $fetchidr['Surname']?>" readonly>
                </div>            
                <div class="col">
                    Telephone :<input type="text" class="form-control pl-3" value="<?php echo $fetchidr['Telephone']?>" readonly>
                </div>           
            </div>  

            <div class="form-row mt-3">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Enter Device ID" name="device_id" id="device_id">
                </div>
                <div class="col">
                    <input type="submit" class="btn btn-primary" value="return" name="return">
                </div>            
            </div>   
    </form>           
       <table class="table text-center">
            <thead class="bg-info text-white">
                <tr>
                    <th>#</th>
                    <th>BARCODE</th>
                    <th>DEVICE NAME</th>
                    <th>LOCATION</th>
                    <th>DESCRIPTION</th>
                </tr>                
            </thead>
            <?php
                $i = 1;
                $sql = "SELECT * FROM borrow
                        WHERE Datetime_borrow = (SELECT MAX(Datetime_borrow) FROM borrow WHERE User_id = '$uc')";
                $query = $connect->query($sql);
                $fetch = mysqli_fetch_array($query);
                @$brid = $fetch['Borrow_id'];

                $_SESSION['brid'] = $brid;
                $sqlgiv = "SELECT * FROM givback WHERE Borrow_id = '$brid'";
                $querygiv = $connect->query($sqlgiv);
                $numgiv = mysqli_num_rows($querygiv);
                    if($numgiv != 0){
                        echo "<script>alert('ผู้ใช้งานนี้คืนอุปกรณ์ครบแล้ว');window.location.href='index.php?page=return';</script>";
                    }else if($numgiv == 0){
                        $sqlshow = "SELECT * FROM borrowdetail
                                    LEFT JOIN deviceitem ON deviceitem.Barcode = borrowdetail.Barcode
                                    LEFT JOIN device ON device.Device_id = deviceitem.Device_id
                                    LEFT JOIN location ON deviceitem.Location_ID = location.Location_ID
                                    WHERE Borrow_id = '$brid' AND Sitems_ID = 0 AND Sreturn_ID = 2
                                    ";
                        $queryshow = $connect->query($sqlshow);
                        $num = mysqli_num_rows($queryshow);
                        while($rowsh = $queryshow->fetch_array()){
                    ?>
            <tbody>
                <tr>
                   <td><?php echo $i;$i++;?></td>
                   <td><?php echo $rowsh['Barcode']; ?></td>
                   <td><?php echo $rowsh['Device_name']; ?></td>
                   <td><?php echo $rowsh['Location_name']; ?></td>
                   <td><?php echo $rowsh['Description']; ?></td>
                </tr>
            <?php
                }
                    }
            ?>
            </tbody>
        </table>
    </div>
</div>
</body>