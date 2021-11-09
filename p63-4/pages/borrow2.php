<?php 
    //เก็บ SESSION หลัง Search
    if(isset($_POST['search'])){
        @$ukeyword = $_POST['ukeyword'];
        @$purid = $_POST['purid'];
        @$jobcard = $_POST['jobcard'];
        $_SESSION['uid'] = $ukeyword;
        $_SESSION['purid'] = $purid;
        $_SESSION['jobcard'] = $jobcard;
    }
    $u = $_SESSION['uid'];
    $p = $_SESSION['purid'];
    $j = $_SESSION['jobcard'];

    $sqlid = "SELECT * FROM user WHERE Username = '$u'";
    $queryid = $connect->query($sqlid);
    $fetchid = mysqli_fetch_array($queryid);
    $numid = mysqli_num_rows($queryid);
   
    //เช็ค User
    if($numid != 0){
        $sql = "SELECT * FROM borrow
        WHERE Datetime_borrow = (SELECT MAX(Datetime_borrow) FROM borrow WHERE User_id = '$u')";
        $query = $connect->query($sql);
        $fetch = mysqli_fetch_array($query);
        $num = mysqli_num_rows($query);
        @$brr = $fetch['Borrow_id'];
        if($num != 0){
            $sql = "SELECT * FROM givback WHERE Borrow_id = '$brr'";
            $query = $connect->query($sql);
            $num = mysqli_num_rows($query);
            if($num != 0){
                    $sql = "SELECT * FROM borrow";
                    $query = $connect->query($sql);
                    $num = mysqli_num_rows($query);
                    $n = $num+1;
                    $br = "BR-"."$n";
            }else if($num == 0){
                    echo "<script>alert('Please return Device before borrowing');window.location.href='index.php?page=borrow';</script>"; 
            }
        }else if($num == 0){
            $sql = "SELECT * FROM borrow";
            $query = $connect->query($sql);
             $num = mysqli_num_rows($query);
            $n = $num+1;
            $br = "BR-"."$n";
        }
    }else if($numid == 0){
        echo "<script>alert('กรุณาใส่ Username ให้ถูกต้อง');window.location.href='index.php?page=borrow'</script>";
    }

    //ปุ่ม ADD 
if(isset($_POST['Add'])){
        $barcode = $_POST['barcode'];
        $sql = "SELECT * FROM deviceitem 
        LEFT JOIN device ON device.Device_id = deviceitem.Device_id
        WHERE Barcode = '$barcode'";
        $query = $connect->query($sql);
        $fetch = mysqli_fetch_array($query);
        $num = mysqli_num_rows($query);
        if($num == 0){
            echo "<script>alert('Did not have this barcode in system');</script>";
        }else if($num != 0){
            $check = $fetch['Sitems_ID'];
            if($check != 1){
                echo "<script>alert('This barcode already use');</script>";
            }else if($check == 1){
                $type = $fetch['type'];
                if($type == 'borrow'){
                    $sql2 = "INSERT INTO borrowdetail VALUES('$br','$barcode',1)";
                    $query2 = $connect->query($sql2);

                    $sql2 = "UPDATE deviceitem SET Sitems_ID = 0 ,Sreturn_ID = 2 WHERE Barcode = '$barcode'";
                    $query2 = $connect->query($sql2);

                    $sql3 = "SELECT * FROM deviceitem
                    LEFT JOIN device ON device.Device_id = deviceitem.Device_id
                    WHERE Barcode = '$barcode'";
                    $query3 = $connect->query($sql3);
                    $fetch3 = mysqli_fetch_array($query3);
                    $device = $fetch3['Device_id'];
                    $qy = $fetch3['QTY'];
                    $qty = intval($qy)-1;
                    $sql3 = "UPDATE device SET QTY = $qty WHERE Device_id = '$device'";
                    $query3 = $connect->query($sql3);
                    
                }else if($type == 'disposable'){
                    $count = $fetch['QTY'];
                    if($count == 0){
                        echo "<script>alert('Did not have this device in stock');</script>";
                    }else if($count >= 1){
                        $sql1 = "SELECT * FROM borrowdetail WHERE Borrow_id = '$br' AND Barcode = '$barcode'";
                        $query1 = $connect->query($sql1);
                        $num1 = mysqli_num_rows($query1);

                        if($num1 == 0){
                            $sql2 = "INSERT INTO borrowdetail VALUES('$br','$barcode',1)";
                            $query2 = $connect->query($sql2);$sql2 = "INSERT INTO borrowdetail VALUES('$br','$barcode',1)";
                            $query2 = $connect->query($sql2);
                        }else if($num1 != 0){
                            $fetch1 = mysqli_fetch_array($query1);
                            $pc = $fetch1['Pcs'];
                            $pcs = intval($pc)+1;
                            $sql2 = "UPDATE borrowdetail SET Pcs = $pcs WHERE Borrow_id = '$br' AND Barcode = '$barcode'";
                            $query2 = $connect->query($sql2);
                        }
                        $sql3 = "SELECT * FROM deviceitem
                        LEFT JOIN device ON device.Device_id = deviceitem.Device_id
                        WHERE Barcode = '$barcode'";
                        $query3 = $connect->query($sql3);
                        $fetch3 = mysqli_fetch_array($query3);
                        $device = $fetch3['Device_id'];
                        $qy = $fetch3['QTY'];
                        $qty = intval($qy)-1;
                        $sql3 = "UPDATE device SET QTY = $qty WHERE Device_id = '$device'";
                        $query3 = $connect->query($sql3);
                        if($count <= 10){
                            echo "<script>alert('This device have $qty left');</script>";
                        }
                    }
                }
            }
        }
    }

?>
<body onload="document.frm.device_id.focus();">
    <div class="card card-nav-tabs">
    <div class="card-header card-header-info">
        Borrow & Return Form  : <?php echo " ".$br;?>
    </div>
    
    <div class="card-body">
        <h5 class="card-title text-right">Date : <?php echo date("d-m-Y") ?></h5>
        <form action="<?php $_SERVER['PHP_SELF']?>" method="POST" name="frm">
            <div class="form-row">
                <div class="col">
                    Name : <input type="text" class="form-control pl-3" value="<?php echo $fetchid['Name']?>" readonly>
                </div>
                <div class="col">
                    Surname : <input type="text" class="form-control pl-3" value="<?php echo $fetchid['Surname']?>" readonly>
                </div>            
                <div class="col">
                    Telephone :<input type="text" class="form-control pl-3" value="<?php echo $fetchid['Telephone']?>" readonly>
                </div>           
            </div>  

            <div class="form-row mt-3">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Enter Barcode" name="barcode" id="barcode">
                </div>
                <div class="col">
                    <input type="submit" class="btn btn-primary" value="Add" name="Add">
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
                    <th>PCS</th>
                    <th>Manage</th>
                </tr>                
            </thead>
            <?php
                $sql = "SELECT * FROM borrowdetail
                LEFT JOIN deviceitem ON borrowdetail.Barcode = deviceitem.Barcode
                LEFT JOIN device ON deviceitem.Device_id = device.Device_id
                LEFT JOIN location ON deviceitem.Location_ID = location.Location_ID
                WHERE Borrow_id ='$br'
                ";
                $query = $connect->query($sql);
                $i=1;
                while($row=$query->fetch_array()){ ?>
            <tbody>
                <tr>
                    <td><?php echo $i;$i++?></td>
                    <td><?php echo $row['Barcode'];?></td>
                    <td><?php echo $row['Device_name'];?></td>
                    <td><?php echo $row['Location_name'];?></td>
                    <td><?php echo $row['Description'];?></td>
                    <td><?php echo $row['Pcs'];?></td>
                    <td><a href="borrow2_del.php?barcode=<?php echo $row['Barcode'];?>&id=<?php echo $n;?>"><i style="color:white"><button class="btn btn-danger" role="Button">Delete</button></i></a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <i style="color:white;"><a href="borrow2_save.php?id=<?php echo $n ?>&date=<?php echo date("Y-m-d H:i:s") ?>&userid=<?php echo $u;?>&purpose=<?php echo $p; ?>&jobcard=<?php echo $j;?>"><button class="btn btn-success" style="margin-left:90%;">Apply</button></a></i>
    </div>
</div>
</body>