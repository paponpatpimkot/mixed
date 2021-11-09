<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
<form action="index.php?page=device_delall" method="post">
<?php
    if(isset($_POST['submit'])){
        $device = $_POST['device_id'];
        $sql = "SELECT * FROM device WHERE Device_id = '$device'";
        $query = $connect->query($sql);
        $num = mysqli_num_rows($query);

        if($num == 0){
            echo "<script>alert('There is no device in the system.');</script>";
        }else if($num != 0){
            $sql = "DELETE FROM device WHERE Device_id = '$device'";
            $query = $connect->query($sql);
            $sql = "DELETE FROM deviceitem WHERE Device_id = '$device'";
            $query = $connect->query($sql);
            echo "<script>alert('Delete Success');window.location.href='index.php?page=device';</script>";
        }
    }
?>
        <div class="container">
            <div class="card mt-5 " >
                    <div class="row mt-3 mx-auto">
                    <h2>Delete Device</h2>
                    </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label" >Device ID</label>
                        <input type="text" class="form-control" name="device_id">
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-success" name="submit">Apply</button>
                        <a href="index.php?page=device" class="btn btn-danger" role="button">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>