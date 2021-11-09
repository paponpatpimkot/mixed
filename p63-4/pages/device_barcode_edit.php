<?php
    $barcode = $_GET['barcode'];
    $sql = "SELECT * FROM deviceitem 
    LEFT JOIN location ON deviceitem.Location_ID = location.Location_ID
    LEFT JOIN statusitems ON deviceitem.Sitems_ID = statusitems.Sitems_ID
    WHERE Barcode = '$barcode'";
    $query = $connect->query($sql);
    $fetch2 = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT USER</title>
</head>
<body>
<form action="device_barcode_update.php" method="POST">
        <div class="container">
            <div class="card mt-5 ">
                    <div class="row mt-3 mx-auto">
                        <h2>Barcode Edit</h2>
                    </div>
                <div class="card-body">
                    <div class="form-group mt-1 ">
                        <label class="form-label" for="user">Barcode</label>
                        <input type="text" readonly class="form-control" name="barcode" value="<?php echo $fetch2['Barcode'];?>">
                    </div>
                    <div class="form-group mt-1 ">
                        <label class="form-label" for="user">Device ID</label>
                        <input type="text" class="form-control" name="device_id" value="<?php echo $fetch2['Device_id'];?>"readonly>
                    </div>
                    <div class="form-group mt-1">
                        <label class="form-label">Location</label>
                        <select class="form-control" name="location"> 
                        <option value="<?php echo $fetch2['Location_ID']; ?>"><?php echo $fetch2['Location_ID']." -- ".$fetch2['Location_name'];?></option>
                        <?php 
                            $sql = "SELECT * FROM location ";
                            $query = $connect->query($sql);
                            while($row = $query->fetch_array()){
                                ?><option value="<?php echo $row['Location_ID'];?>"><?php echo $row['Location_name'];?></option>
                        <?php
                            }
                        ?>
                        </select>
                    </div >
                    <div class="form-group mt-1 ">
                        <label class="form-label" for="user">Date</label>
                        <input type="date" class="form-control" name="date" value="<?php echo $fetch2['Date_in']; ?>">
                    </div>
                    <div class="form-group mt-1">
                        <label class="form-label">Status</label>
                        <select class="form-control" name="status"> 
                        <option value="<?php echo $fetch2['Sitems_ID']; ?>"><?php echo $fetch2['Sitems_Name'];?></option>
                        <?php 
                            $sql = "SELECT * FROM statusitems";
                            $query = $connect->query($sql);
                            while($row = $query->fetch_array()){
                                ?><option value="<?php echo $row['Sitems_ID'];?>"><?php echo $row['Sitems_Name'];?></option>
                        <?php
                            }
                        ?>
                        </select>
                    </div >
                    
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-success" name="submit">SUBMIT</button>
                        <a href="index.php?page=device_barcode" class="btn btn-outline-danger">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>