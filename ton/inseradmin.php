<?php
session_start();
require('connect.php');
    $sql = "SELECT * FROM department ORDER BY IDdpm asc";
    $result =mysqli_query($connect,$sql);
    $count = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script> -->
    <link href="material-dashboard-master/assets/css/material-dashboard.min.css?v=2.1.2" rel="stylesheet" />
</head>
<body style="background:#d8d9d8">
<nav class="navbar navbar-expand-sm navbar-light bg-primary">

<div class="container-fluid">

    <a href="indexpsn.php" class="navbar-brand"><?php echo $_SESSION["fname"]." ".$_SESSION["lname"];?></a>
    <ul class="navbar-nav">

        <li class="navbar-item">
            <a href="logout.php" class="nav-link">ออกจากระบบ</a>
        </li>
    </ul>
</div>
</nav>
<div class="container">
<form action="insertData.php" method="POST">
        <div class="form-group my-3">
            <label for="">รหัสประจำตัว</label>
            <input type="text" name="id" class="form-control">
        </div>
        <div class="form-group my-3">
            <label for="">ชื่อ</label>
            <input type="text" name="fname" class="form-control">
        </div>
        <div class="form-group my-3">
            <label for="">นามสกุล</label>
            <input type="text" name="lname" class="form-control">
        </div>
        <div class="form-group my-3">
            <label for="">username</label>
            <input type="text" name="username" class="form-control">
        </div>
        <div class="form-group my-3">
            <label for="">password</label>
            <input type="text" name="password" class="form-control">
        </div>
        <div class="my-3">
                <label class="form-lable">แผนก</label>
                <select class="form-control" name="dpm">
                <option value="">--กรุณาเลือกแผนก--</option>
                <option value="0">--ไม่มี--</option>
                    <?php foreach($result as $row){?>
                    <option value="<?php echo $row["IDdpm"];?>">
                        <?php echo $row["namedpm"];?>
                    </option>
                 
                    <?php }?>
                </select>
            </div> 
            <div class="form-group my-3">
        <label for="">สถานะ</label>
        <input type="radio" name="type" value="1">ปกติ
        <input type="radio" name="type" value="2">แอดมิน
        <input type="radio" name="type" value="3">งานทะเบียน
        </div>
        <input class="btn btn-success" type="submit" value="บันทึก">
    </form>
</div>     
</body>
</html>