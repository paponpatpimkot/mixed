<?php
    $id = $_GET['id2'];
    $sql = "SELECT * FROM device WHERE Device_id = '$id'";
    $query = $connect->query($sql);
    $fetch = mysqli_fetch_array($query);
    
    if(isset($_POST['submit'])){
        $barcode = $_POST['barcode'];
        $sql = "SELECT * FROM deviceitem
        LEFT JOIN device ON device.Device_id = deviceitem.Device_id
        WHERE Barcode = '$barcode'
        ";
        $query = $connect->query($sql);
        $fetch1 = mysqli_fetch_array($query);
        $num = mysqli_num_rows($query);
        if($num == 0){
            echo "<script>alert('Not have this Barcode in system');</script>";
        }else if($num != 0){
            $device = $fetch1['Device_id'];
            $qy = $fetch1['QTY'];
            $qty = intval($qy)-1;

            $sql = "DELETE FROM deviceitem WHERE Barcode = '$barcode'";
            $query = $connect->query($sql);

            $sql = "UPDATE device SET QTY=$qty WHERE Device_id ='$device'";
            $query = $connect->query($sql);

            echo "<script>alert('DELETE this Barcode Success')</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <form action="index.php?page=device_reduce&id2=<?php echo $id ;?>" method="post">
        <div class="container">
            <div class="card mt-5 " >
                    <div class="row mt-3 mx-auto">
                    <h2>Reduce Device</h2>
                    </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label" >Device ID</label>
                        <input type="text" class="form-control" name="device_id" value="<?php echo $fetch['Device_id'];?>" readonly>
                    </div>
                    <div class="form-group mt-1 ">
                        <label class="form-label" >Device Name</label>
                        <input type="text" class="form-control" name="device_name" value="<?php echo $fetch['Device_name'];?>" readonly>
                    </div>
                    <div class="form-group mt-1 ">
                        <label class="form-label" >Barcode</label>
                        <input type="text" class="form-control" name="barcode">
                    </div>
                    <div class="form-group mt-3">
                        <button class="btn btn-success" type="submit" name="submit">Apply</button>
                        <a href="index.php?page=device" class="btn btn-outline-danger" role="button">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>