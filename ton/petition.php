<?php
    session_start();

    if (!isset($_SESSION['username'])){
        header('location: login.php');
    }

    require("connect.php");
    $username = $_SESSION['username'];

    $sql = "SELECT petition.IDstd,petition.IDptt,subjects.namesj,petition.IDday,petition.starttime,petition.endtime,personnel.fname,personnel.lname,petition.type,day.nameday
    FROM petition,subjects,personnel,day
    WHERE petition.IDsj=subjects.IDsj 
    AND petition.IDpsn=personnel.IDpsn
    AND day.IDday = petition.IDday
    AND petition.IDstd= $username
    ORDER BY IDptt";
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

    <a href="index.php" class="navbar-brand"><?php echo $_SESSION["fname"]." ".$_SESSION["lname"];?></a>
    <ul class="navbar-nav">
        
        <li class="navbar-item">
            <a href="logout.php" class="nav-link">ออกจากระบบ</a>
        </li>
    </ul>
</div>
</nav>
<div class="container">
<?php if($count==0){?>
    <div class="h1 mt-5 text-center">
        ไม่มีประวัติคำขอ
    </div>
    <?php }else{?>
    <div class="h1 mt-5 text-center">
        ประวัติคำขอ
    </div>
<table class="table table-bordered table-striped table-hover bg-white mt-5">
                <thead>
                    <tr class="text-center">
                        <th>ชื่อวิชา</th>
                        <th>วัน</th>
                        <th>เวลาเข้าเรียน</th>
                        <th>เวลาเลิกเรียน</th>
                        <th>ชื่อครูผู้สอน</th>
                        <th>ผลการอนุมัติ</th>
                    </tr>
                </thead>
                <tbody>
                <?php while($row = mysqli_fetch_assoc($result)){?>
                 
                    <tr>
  
                        <td><?php echo $row["namesj"] ?></td>
                        <td><?php echo $row["nameday"] ?></td>
                        <td><?php echo $row["starttime"] ?></td>
                        <td><?php echo $row["endtime"] ?></td>
                        <td><?php echo $row["fname"]." ".$row["lname"] ?></td>
                        <td>
                        <?php if($row["type"]==1){?>
                                รออนุมัติ
                            <?php }else if($row["type"]==2){?>
                                    อนุมัติแล้ว
                                <?php }else{?>
                                        ไม่อนุมัติ
                                    <?php }?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>    
            <?php }?>  
</div>
</body>
</html>