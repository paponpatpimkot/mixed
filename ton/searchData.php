<?php
    session_start();

    if (!isset($_SESSION['username'])){
        header('location: login.php');
    }

    require("connect.php");
    $username = $_SESSION['username'];
    $IDsj = $_POST['IDsj'];
    $sql = "SELECT * FROM subjects WHERE IDsj LIKE '%$IDsj%' ORDER BY IDsj ASC";
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
<nav class="navbar navbar-expand-sm sticky-top navbar-light bg-primary">

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

    <form action="searchData.php" class = "form-group" method = "POST">
                <label class="h3">ค้นหาวิชาที่เปิดสอน</label>
            <table>
                <tr>
                    <td> <input type="text" placeholder = "รหัสวิชา " name="IDsj" class="form-control"></td>
                    <td><input type="submit" value = "search" class="btn btn-primary my-2" style="float: right;"></td>
                </tr>
            </table>
            </form>
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr class="text-center">
                        <th>รหัสวิชา</th>
                        <th>ชื่อวิชา</th>
                        <th class="col col-lg-2">เลือกวิชาที่ต้องการ</th>
                    </tr>
                </thead>
                <tbody>
                <?php while($row = mysqli_fetch_assoc($result)){?>
                 
                    <tr>
  
                        <td><?php echo $row["IDsj"] ?></td>
                        <td><?php echo $row["namesj"] ?></td>
                        <?php if($row['sjtype'] == 1){?>
                        <td class="text-center">
                            <a href="sjdata.php?id=<?php echo $row["IDsj"];?>" class="btn btn-success ">
                                เลือก
                            </a>        
                        </td>
                        <?php }else{?>
                            <td class="text-center ">
                            <a href="sjdata.php?id=<?php echo $row["IDsj"];?>" class="btn btn-success disabled">
                                เลือก
                            </a>        
                        </td>
                            <?php }?>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>      

    </div>
    
</body>
</html>