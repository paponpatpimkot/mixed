<?php
    session_start();

    if (!isset($_SESSION['username'])){
        header('location: login.php');
    }

    require("connect.php");
    $username = $_SESSION['IDpsn'];

    $sql = "SELECT petition.IDstd,petition.IDptt,subjects.namesj,petition.IDday,day.nameday,petition.starttime,petition.endtime,studen.fname,studen.lname,petition.type,petition.IDpsn
    FROM petition,subjects,personnel,studen,day
    WHERE petition.IDsj=subjects.IDsj  
    AND petition.IDstd=studen.IDstd
    AND petition.IDpsn=personnel.IDpsn
    AND day.IDday = petition.IDday
    AND petition.type = '2'
    ORDER BY petition.IDptt";
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

    <a href="admin.php" class="navbar-brand"><?php echo $_SESSION["fname"]." ".$_SESSION["lname"];?></a>
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
        นักศึกษาที่ผ่านการอนุมัติแล้ว
    </div>
<table class="table table-bordered table-striped table-hover bg-white mt-5">
                <thead>
                    <tr class="text-center">
                        <th>รหัสนักศึกษา</th>
                        <th>ชื่อนักศึกษา</th>
                        <th>ชื่อวิชา</th>
                        <th>วัน</th>
                        <th>เวลาเข้าเรียน</th>
                        <th>เวลาเลิกเรียน</th>
                        
                        <th>การอนุมัติ</th>
                    </tr>
                </thead>
                <tbody>
                <?php while($row = mysqli_fetch_assoc($result)){?>   
                    <tr>
                        <td><?php echo $row["IDstd"] ?></td>
                        <td><?php echo $row["fname"]." ".$row["lname"] ?></td>
                        <td><?php echo $row["namesj"] ?></td>
                        <td><?php echo $row["nameday"] ?></td>
                        <td><?php echo $row["starttime"] ?></td>
                        <td><?php echo $row["endtime"] ?></td>
                        <td class="text-center">
                        <form action="updateptt.php" method="post">
                                <input type="hidden" value="4" name="type">
                                <input type="hidden" value="<?php echo $row['IDptt'] ?> " name="id">
                                <input type="submit" value="ให้ผ่าน" class="btn btn-success ">
                            </form>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>    
            <?php }?>  
</div>
</body>
</html>