<?php
    session_start();

    if (!isset($_SESSION['username'])){
        header('location: login.php');
    }

    require("connect.php");
    $username = $_SESSION['username'];
    $id = $_GET["id"];
    $sql = "SELECT * FROM subjects
    WHERE IDsj = '$id'";
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
<form action="updatesj.php" method="POST">
<input type="hidden" value="<?php echo $row["IDsj"];?>" name="id">
<div class="form-group my-3">
            <label for="">ชื่อวิชา</label>
            <input type="text" name="namesj" class="form-control" value="<?php echo $row["namesj"];?>">
        </div>
        <div class="form-group my-3">
            <label for="">ทฤษฎี</label>
            <input type="text" name="theoreticalhours" class="form-control" value="<?php echo $row["theoreticalhours"];?>">
        </div>
        <div class="form-group my-3">
            <label for="">ปฏิบัติ</label>
            <input type="text" name="practicehours" class="form-control" value="<?php echo $row["practicehours"];?>">
        </div>
        <div class="form-group my-3">
            <label for="">หนวยกิต</label>
            <input type="text" name="littlekit" class="form-control" value="<?php echo $row["littlekit"];?>">
        </div>
        <div class="form-group my-3">
            <label for="">สถานะ</label>
            <?php
            if($row["sjtype"] == "0"){
                echo "<input type='radio' name='type' value='0' checked>ปิด";
                echo "<input type='radio' name='type' value='1'>เปิด";
            }else{
                echo "<input type='radio' name='type' value='0'>ปิด";
                echo "<input type='radio' name='type' value='1' checked>เปิด";
            }
            ?> 
        </div>
        <input type="submit" value="บันทึกขอมูล" class="btn btn-success">
        <a href="rjtsj.php" class="btn btn-primary">ย้อนกลับ</a>
</form>
</div>
</body>
</html>