<?php
    session_start();

    if (!isset($_SESSION['username'])){
        header('location: login.php');
    }

    require("connect.php");
    $username = $_SESSION['username'];

    $sql = "SELECT * FROM personnel ORDER BY IDpsn";
    $result = mysqli_query($connect,$sql);
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
            <a href="login.php" class="nav-link">ออกจากระบบ</a>
        </li>
    </ul>
</div>
</nav>

    <div class="container">
            
            <table class="table table-bordered table-striped table-hover mt-5 bg-white">
                <thead>
                    <tr class="text-center">
                        <th>รหัสประจำตัว</th>
                        <th>ชื่อ-สกุล</th>
                        <th class="col col-lg-2">สถานะ</th>
                        <th class="col col-lg-2">แก้ไขข้อมูล</th>
                        <th class="col col-lg-2">ลบข้อมูล</th>
                    </tr>
                </thead>
                <tbody>
                <?php while($row = mysqli_fetch_assoc($result)){?>
                 
                    <tr>
  
                        <td><?php echo $row["IDpsn"] ?></td>
                        <td><?php echo $row["fname"]?>  <?php echo $row["lname"] ?></td>
                        <td class="text-center"><?php if($row["IDtype"] == 1 ){?>
                            ครู
                        <?php }else if($row["IDtype"] == 2 ){ ?>
                            แอดมิน
                            <?php }else{ ?>
                                งานทะเบียน
                                <?php }?>
                        </td>
                        <td class="text-center">
                            <a href="editadmin.php?id=<?php echo $row["IDpsn"];?>" class="btn btn-success ">
                                แก้ไข
                            
                            </a>
                            
                        </td>
                        <td class="text-center">
                            <a href="deleteQueryString.php?idpsn=<?php echo $row["IDpsn"];?>" class="btn btn-danger"
                    onclick="return confirm('คุณต้องการลบช้อมูลหรอไม่')"
                    >ลบข้อมูล</a>
                </td>
                    </tr>
                    
                    <?php } ?>
                </tbody>
            </table>      
            <a href="inseradmin.php" class="btn btn-success">เพิ่มข้อมูล</a>
    </div>
    
</body>
</html>