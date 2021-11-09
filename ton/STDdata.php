<?php 

require("connect.php");
session_start();
$id = $_GET['id'];

$sqlstd = " SELECT *
    FROM studen
    WHERE IDstd = '$id' ";
    $resultstd = mysqli_query($connect,$sqlstd);
    $rowstd = mysqli_fetch_assoc($resultstd);

    $sqlrst = "SELECT register.IDsj,subjects.namesj
     FROM subjects,register
     WHERE register.IDsj = subjects.IDsj
     AND   register.IDstd = '$id' ";
     $resultrgt = mysqli_query($connect,$sqlrst);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="material-dashboard-master/assets/css/material-dashboard.min.css?v=2.1.2" rel="stylesheet" />
</head>
<body>
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
</div>
    <div class="container">
        <div class="text-center h2">วิชาที่นักศึกษาส่งคำร้อง</div>
        <div class="h3"><?php echo $rowstd['title']." ".$rowstd['fname']." ".$rowstd['lname']?></div>
    <table class="table table-bordered table-striped table-hover bg-white">
        <tr>     
            <th class="text-center">รหัสวิชา</th>
            <th class="text-center">ชื่อวิชา</th>
        </tr>
        <?php while( $rowrst = mysqli_fetch_assoc($resultrgt)){?>  
        <tr>
        <td class="text-center"><?php echo $rowrst["IDsj"] ?></td>
                        <td><?php echo $rowrst["namesj"] ?></td>
        </tr>
        <?php }?>
    </table>
    </div>

</body>
</html>