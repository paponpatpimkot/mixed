<?php
    session_start();
 
    require("connect.php");
    $sql = "SELECT * FROM admid";
    $result = mysqli_query($connect,$sql);
    $num = 1;
    if($_SESSION['type'] == 3){
        header("location:admin.php");
    }
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
    <form action="configupdate.php" method="post">
    
    <table class="table table-bordered table-striped table-hover bg-white">
                <thead>
                    <tr class="text-center">
                        <th>ลำดับ</th>
                        <th>ข้อมูล</th>
                        <th class="col col-lg-2">แก้ไขข้อมูล</th>
                    </tr>
                </thead>
                <tbody>
                <?php while($row = mysqli_fetch_assoc($result)){?>
                    <input type="hidden" value="<?php echo $row['IDam']?>" name="IDam">
                    <tr>
  
                        <td><?php echo $num ?></td>
                       
                        <td><input type="text" value="<?php echo $row['Nameam']?>" name="Nameam"></td>
                        <td class="text-center">
                            <input type="submit" value="แก้ไข" class="btn btn-success ">    
                        </td>
                    </tr>
                    <?php $num++; } ?>
                </tbody>
            </table>
        </form>
</div>
</body>
</html>