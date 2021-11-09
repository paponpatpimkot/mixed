<?php
session_start();
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
<div class="row mt-5">
    <?php if($_SESSION['type'] == 2){?>
            <div class="alert alert-info col-sm-2 ml mx-5 text-center">
                <a href="admindata.php" class="btn">
                        <div>
                            <img src="Proto/1.png" class="w-25">
                        </div>
                        <div>
                            แก้ไขข้อมูล admin
                        </div>
                    </a> 
                </div>
            
            <div class="alert alert-info col-sm-2 mx-5">
            <a href="config.php" class="btn">
                        <div>
                            <img src="Proto/1.png" class="w-25">
                        </div>
                        <div>
                            แก้ไขข้อมูลต่างๆ
                        </div>
                    </a> 
            </div>
            <div class="alert alert-info col-sm-2 mx-5">
            <a href="studendata.php" class="btn">
                        <div>
                            <img src="Proto/1.png" class="w-25">
                        </div>
                        <div>
                            แก้ไขรหัสนักเรียน
                        </div>
                    </a> 
            </div>
            <?php }?>
            <?php if($_SESSION['type'] == 3){?>
                <div class="alert alert-info col-sm-2 ml mx-5 text-center">
                <a href="rjtsj.php" class="btn">
                        <div>
                            <img src="Proto/1.png" class="w-25">
                        </div>
                        <div>
                            ข้อมูลวิชา
                        </div>
                    </a> 
                </div>
                <div class="alert alert-info col-sm-2 ml mx-5 text-center">
                <a href="rjtstd.php" class="btn">
                        <div>
                            <img src="Proto/1.png" class="w-25">
                        </div>
                        <div>
                            ข้อมูลนักศึกษาที่ยังแก้ไม่เสร็จ
                        </div>
                    </a> 
                </div>
                <div class="alert alert-info col-sm-2 ml mx-5 text-center">
                <a href="rjtT.php" class="btn">
                        <div>
                            <img src="Proto/1.png" class="w-25">
                        </div>
                        <div>
                            ช่วงเวลา
                        </div>
                    </a> 
                </div>
                <?php }?>
           
        </div>
        
</body>
</html>