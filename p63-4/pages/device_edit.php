<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <form action="device_edit_save.php" method="post">
<?php
        $id2 = $_GET['id2'];
        $sql2 = "SELECT * FROM device WHERE Device_id = '$id2'";
        $query2 = $connect->query($sql2);
        $fetch = mysqli_fetch_array($query2);
        
?>
        <div class="container">
            <div class="card mt-5 " >
                    <div class="row mt-3 mx-auto">
                    <h2>Increase Device</h2>
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
                        <label class="form-label">Last Barcode number</label>
                        <input type="text" class="form-control" value="<?php echo $fetch['lastnumber'];?>" readonly>
                    </div>
                    <div class="form-group mt-1 ">
                        <label class="form-label" >Amount</label>
                        <input type="text" class="form-control" name="qty">
                    <div class="form-group mt-1 ">
                        <label class="form-label" >Import Date</label>
                        <input type="date" class="form-control" id="date_in" name="date_in" value="<?php
                            echo date("Y-m-d");
                        ?>">
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-success" name="submit">ยืนยัน</button>
                        <button type="cancel" class="btn btn-outline-danger" name="cancel">ยกเลิก</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>