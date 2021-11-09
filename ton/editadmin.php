<?php
    session_start();

    if (!isset($_SESSION['username'])){
        header('location: login.php');
    }

    require("connect.php");
    $username = $_SESSION['username'];
    $id = $_GET["id"];
    $sql = "SELECT * FROM personnel WHERE IDpsn = $id";
    $result = mysqli_query($connect,$sql);
    $row = mysqli_fetch_assoc($result)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลพนักงาน</title>
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
<form action="updateadmin.php" method="POST">
<input type="hidden" value="<?php echo $row["IDpsn"];?>" name="id">
<div class="form-group my-3">
            <label for="">ชื่อ</label>
            <input type="text" name="fname" class="form-control" value="<?php echo $row["fname"];?>">
        </div>
        <div class="form-group my-3">
            <label for="">นามสกุล</label>
            <input type="text" name="lname" class="form-control" value="<?php echo $row["lname"];?>">
        </div>
        <div class="form-group my-3">
            <label for="">Username</label>
            <input type="text" name="username" class="form-control" value="<?php echo $row["username"];?>">
        </div>
        <div class="form-group my-3">
            <label for="">Passwoed</label>
            <input type="text" name="password" class="form-control" value="<?php echo $row["password"];?>">
        </div>
        <div class="form-group my-3">
            <label for="">สถานะ</label>
            <?php
            if($row["IDtype"] == "1"){
                echo "<input type='radio' name='type' value='1' checked>ปกติ";
                echo "<input type='radio' name='type' value='2'>แอดมิน";
                echo "<input type='radio' name='type' value='3'>งานทะเบียน";
            }else if($row["IDtype"] == "2"){
                echo "<input type='radio' name='type' value='1'>ปกติ";
                echo "<input type='radio' name='type' value='2' checked>แอดมิน";
                echo "<input type='radio' name='type' value='3'>งานทะเบียน";
            }else{
                echo "<input type='radio' name='type' value='1'>ปกติ";
                echo "<input type='radio' name='type' value='2'>แอดมิน";
                echo "<input type='radio' name='type' value='3' checked>งานทะเบียน";
            }
            ?> 
        </div>
        <input type="submit" value="บันทึกขอมูล" class="btn btn-success">
        <a href="admindata.php" class="btn btn-primary">ย้อนกลับ</a>
</form>
</div>
</body>
</html>