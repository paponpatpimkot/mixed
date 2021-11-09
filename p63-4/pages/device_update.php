<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <form action="device_update_save.php" method="post">
<?php
        $id2 = $_GET['id2'];
        $sql2 = "SELECT * FROM device 
        LEFT JOIN type ON device.Type_id = type.Type_id
        LEFT JOIN brands ON device.Brand_id = brands.Brand_id
        LEFT JOIN devicecatagory ON device.Devcat_ID = devicecatagory.Devcat_ID
        WHERE Device_id = '$id2'
        ";
        $query2 = $connect->query($sql2);
        $fetch2 = mysqli_fetch_array($query2);
?>
        <div class="container">
            <div class="card mt-5 " >
                    <div class="row mt-3 mx-auto">
                    <h2>Edit Device Information</h2>
                    </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label" >Device ID</label>
                        <input type="text" class="form-control" name="device_id" value="<?php echo $fetch2['Device_id'];?>" readonly>
                    </div>
                    <div class="form-group mt-1 ">
                        <label class="form-label" >Device Name</label>
                        <input type="text" class="form-control" name="device_name" value="<?php echo $fetch2['Device_name'];?>" >
                    </div>
                    <div class="form-group mt-1">
                        <label class="form-label">Type</label>
                        <select class="form-control" name="type_id"> 
                        <option value="<?php echo $fetch2['Type_id'];?>"><?php echo $fetch2['Type_id']." -- ".$fetch2['Type_name'];?>
                        <?php 
                            $sql = "SELECT * FROM type ";
                            $query = $connect->query($sql);
                            while($row = $query->fetch_array()){
                                ?><option value="<?php echo $row['Type_id'];?>"><?php echo $row['Type_id']." -- ".$row['Type_name'];?></option>
                        <?php
                            }
                        ?>
                        </select>
                    </div>
                    <div class="form-group mt-1">
                            <label class="form-label">Type of usage</label>
                            <select class="form-control" name="tou">
                                <?php 
                                    if($fetch2['type'] == 'borrow'){
                                ?>
                                    <option value="borrow" selected>Borrow</option>
                                    <option value="disposable">Disposable Use</option>
                                <?php
                                    }else if($fetch2['type'] == 'disposable'){
                                ?>
                                    <option value="borrow">Borrow</option>
                                    <option value="disposable" selected>Disposable use</option>
                                <?php
                                    }
                                ?>
                            </select>
                    </div>
                    <div class="form-group mt-1">
                        <label class="form-label">Brand</label>
                        <select class="form-control" name="brand_id"> 
                        <option value="<?php echo $fetch2['Brand_id']; ?>"><?php echo $fetch2['Brand_id']." -- ".$fetch2['Brand_name'];?></option>
                        <?php 
                            $sql = "SELECT * FROM brands ";
                            $query = $connect->query($sql);
                            while($row = $query->fetch_array()){
                                ?><option value="<?php echo $row['Brand_id'];?>"><?php echo $row['Brand_id']." -- ".$row['Brand_name'];?></option>
                        <?php
                            }
                        ?>
                        </select>
                    </div>
                    <div class="form-group mt-1">
                        <label class="form-label">Catagory</label>
                        <select class="form-control" name="devcat_id"> 
                        <option value="<?php echo $fetch2['Devcat_ID']; ?>"><?php echo $fetch2['Devcat_ID']." -- ".$fetch2['Devcat_NAME'];?></option>
                        <?php 
                            $sql = "SELECT * FROM devicecatagory ";
                            $query = $connect->query($sql);
                            while($row = $query->fetch_array()){
                                ?><option value="<?php echo $row['Devcat_ID'];?>"><?php echo $row['Devcat_ID']." -- ".$row['Devcat_NAME'];?></option>
                        <?php
                            }
                        ?>
                        </select>
                    </div> 
                    <div class="form-group mt-1 ">
                        <label class="form-label" >Import Date</label>
                        <input type="date" class="form-control" id="date_in" name="date_in" value="<?php
                            echo date("Y-m-d");
                        ?>">
                    </div>
                    <div class="form-group mt-1">
                        <lable class="form-label">Description</label>
                        <textarea class="form-control" name='desc' id="desc" row="3"><?php echo $fetch2['Description'];?></textarea>
                    </div>
                    <div class="form-group mt-1">
                        <label class="form-label">Mechanical Info</label>
                        <textarea class="form-control" name="mec_info" row='3'><?php echo $fetch2['Mechanical_inf'];?></textarea>
                    </div>
                    <div class="form-group mt-1">
                        <label class="form-label">Electrical Info</label>
                        <textarea class="form-control" name="ele_info" row='3'><?php echo $fetch2['Electrical_inf'];?></textarea>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-success" name="submit">Apply</button>
                        <a href='index.php?page=device' class="btn btn-outline-danger">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>