<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
<form action="index.php?page=device_insert" method="post">
<?php
    if(isset($_POST['submit'])){
        $device_id = $_POST['device_id'];
        $device_name = $_POST['device_name'];
        $type_id = $_POST['type_id'];
        $brand_id = $_POST['brand_id'];
        $qty = $_POST['qty'];
        $devcat = $_POST['dev_cat'];
        $description = $_POST['description'];
        $date_in = $_POST['date_in'];
        $mechanical_inf = $_POST['mechanical_inf'];
        $electical_inf = $_POST['electical_inf'];
        $location_id = $_POST['location_id'];
        $tou  = $_POST['tou'];
        $sql = "SELECT * FROM device WHERE Device_id = '$device_id'";
        $query = $connect->query($sql);
        $num = mysqli_num_rows($query);

        $qtyint = intval($qty);
        
        if($num == 0){
            if($tou == 'borrow'){
                $sql = "INSERT INTO device VALUES('$device_id','$device_name','$type_id','$brand_id','$qty','$devcat',' ','$description','$mechanical_inf','$electical_inf','$qty','$date_in','$tou')";
                $query = $connect->query($sql);
                for($x = 1;$x <= $qtyint ;$x++){
                    $barcode = $device_id."-".$x;
                    $sql = "INSERT INTO deviceitem VALUES('$barcode','$device_id','$location_id','$date_in','1','1')";
                    $query = $connect->query($sql);
                }
            }else if($tou == 'disposable'){
                $sql = "INSERT INTO device VALUES('$device_id','$device_name','$type_id','$brand_id','$qty','$devcat',' ','$description','$mechanical_inf','$electical_inf',1,'$date_in','$tou')";
                $query = $connect->query($sql);

                $barcode = $device_id."-".'1';
                $sql = "INSERT INTO deviceitem VALUES('$barcode','$device_id','$location_id','$date_in','1','1')";
                $query = $connect->query($sql);
            }
        }else if($num != 0){
            echo "<script>alert('มีรหัสอุปกรณ์นี่้แล้ว');</script>";
        }
    }
?>
        <div class="container">
            <div class="card mt-5 " >
                    <div class="row mt-3 mx-auto">
                    <h2>Add Device</h2>
                    </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label" >Device ID</label>
                        <input type="text" class="form-control" name="device_id">
                    </div>
                    <div class="form-group mt-1 ">
                        <label class="form-label" >Device Name</label>
                        <input type="text" class="form-control" name="device_name">
                    </div>
                    <div class="form-group mt-1">
                        <label class="form-label">Type</label>
                        <select class="form-control" name="type_id">
                        <?php 
                            $sql = "SELECT * FROM type";
                            $query = $connect->query($sql);
                            while($row = $query->fetch_array()){
                                ?><option value="<?php echo $row['Type_id'];?>"><?php echo $row['Type_name'];?></option>
                        <?php
                            }
                        ?>
                        </select>
                    </div >
                    <div class="form-group mt-1">
                        <label class="form-label">Brands</label>
                        <select class="form-control" name="brand_id"> 
                        <?php 
                            $sql = "SELECT * FROM brands ";
                            $query = $connect->query($sql);
                            while($row = $query->fetch_array()){
                                ?><option value="<?php echo $row['Brand_id'];?>"><?php echo $row['Brand_name'];?></option>
                        <?php
                            }
                        ?>
                        </select>
                    </div >
                    <div class="form-group mt-1">
                        <label class="form-label">Location</label>
                        <select class="form-control" name="location_id"> 
                        <?php 
                            $sql = "SELECT * FROM location ";
                            $query = $connect->query($sql);
                            while($row = $query->fetch_array()){
                                ?><option value="<?php echo $row['Location_ID'];?>"><?php echo $row['Location_ID']." -- ".$row['Location_name'];?></option>
                        <?php
                            }
                        ?>
                        </select>
                    </div>
                    <div class="form-group mt-1">
                        <label class="form-label">Device Catagory</label>
                        <select class="form-control" name="dev_cat"> 
                        <?php 
                            $sql = "SELECT * FROM devicecatagory ";
                            $query = $connect->query($sql);
                            while($row = $query->fetch_array()){
                                ?><option value="<?php echo $row['Devcat_ID'];?>"><?php echo $row['Devcat_NAME'];?></option>
                        <?php
                            }
                        ?>
                        </select>
                    </div>
                    <div class="form-group mt-1">
                            <label class="form-label">Type of usage</label>
                            <select class="form-control" name="tou">
                                <option value="borrow">Borrow</option>
                                <option value="disposable">Disposable use</option>
                            </select>
                    </div>
                    <div class="form-group mt-1 ">
                        <label class="form-label" >Amount</label>
                        <input type="text" class="form-control" name="qty">
                    
                    <div class="form-group mt-1 ">
                        <label class="form-label" >Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
                    <div class="form-group mt-1 ">
                        <label class="form-label" >Import Date</label>
                        <input type="date" class="form-control" id="date_in" name="date_in" value="<?php
                            echo date("Y-m-d");
                        ?>">
                    </div>
                    <div class="form-group mt-1 ">
                        <label class="form-label" >Mechanic Info</label>
                        <textarea class="form-control" id="mechanical_inf" rows="3" name="mechanical_inf"></textarea>
                    </div>
                    <div class="form-group mt-1 ">
                        <label class="form-label" >Eletronic Info</label>
                        <textarea class="form-control" id="electical_inf" rows="3" name="electical_inf"></textarea>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-success" name="submit">Apply</button>
                        <a href="index.php?page=device" class="btn btn-outline-danger" role="button">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>