<?php
    session_start();

    if (!isset($_SESSION['username'])){
        header('location: login.php');
    }

    $id = $_GET['id'];
    require("connect.php");
    $username = $_SESSION['username'];
    $_SESSION['sj'] = $id;
    $sql = " SELECT sjdetail.IDsj,subjects.namesj,sjdetail.theoreticalhours,sjdetail.practicehours,sjdetail.littlekit 
    FROM sjdetail,subjects 
    WHERE subjects.IDsj=sjdetail.IDsj 
    AND sjdetail.IDsj='$id'";
    $result = mysqli_query($connect,$sql);
    $row = mysqli_fetch_assoc($result);
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
<div class="container mt-5 ">
    <div class="h1">
        รายละเอียดวิชา
    </div>
    <table class="table table-bordered table-striped table-hover bg-white">
        <thead class="text-center">
        <tr>
            <th>รหัสวิชา</th>
            <th>ชื่อวิชา</th>
            <th>ทฤษฎี</th>    
            <th>ปฏิบัติ</th>
            <th>หนวยกิต</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $row["IDsj"];?></td>
            <td><?php echo $row["namesj"];?></td>
            <td><?php echo $row["theoreticalhours"];?></td>
            <td><?php echo $row["practicehours"];?></td>
            <td><?php echo $row["littlekit"];?></td>
        </tr>
    </tbody>
    </table>
    <?php
      $sqlpsn = " SELECT DISTINCT personnel.fnamepsn,personnel.lnamepsn,scdpsndetail.IDsj,personnel.IDpsn
      FROM scdpsndetail,personnel
      WHERE personnel.IDscdPsn=scdpsndetail.IDscdPsn
      AND scdpsndetail.IDsj='$id'";
      $resultpsn = mysqli_query($connect,$sqlpsn);
      
    ?>
    <div class="h1 mt-5">
        เลือกครูผู้สอน
    </div>
    <div class="w-50    ">
<div class="w-75">
    
    <table class="table table-bordered table-striped table-hover table-sm bg-white">
        <thead class="text-center">
        <tr>
            <th>ชื่อครู</th>
            <th class="col col-lg-5">เลือก</th>
        </tr>
    </thead>
    <tbody>
    <?Php while($rowpsn = mysqli_fetch_assoc($resultpsn)){?>
    
        <tr>
            <td><?php echo $rowpsn["fname"]," ",$rowpsn["lname"];?></td>
            <td class="text-center">
                            <a href="scd.php?id=<?php echo $rowpsn["IDpsn"];?>" class="btn btn-success ">
                                เลือก       
                            </a>        
                        </td>
            
        </tr>
        <?php }?>
    </tbody>
    </table>
    
</div>
</div>
</div>
</body>
</html>