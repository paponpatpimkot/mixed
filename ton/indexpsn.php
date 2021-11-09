<?php
session_start();
require("connect.php");
    $id = $_SESSION['IDpsn'];

    $sqlp = "SELECT * FROM admid WHERE IDam = '5' ";
    $resultp = mysqli_query($connect,$sqlp);
    $rowp = mysqli_fetch_assoc($resultp);

    
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

    <a href="#" class="navbar-brand"><?php echo $_SESSION["fname"]." ".$_SESSION["lname"];?></a>
    <ul class="navbar-nav">
    <?php if($_SESSION['type'] == 3 ){
         header("location:admin.php");
    }
        if($_SESSION['type'] == 2 ){
        header("location:admin.php");
   }
    
        ?>
    <?php if($_SESSION['type'] == 2){?>
        <li class="navbar-item">
             header("location:admin.php");
        </li>
        <?php } ?>
        <?php if($rowp['Nameam'] == '2'){?>
        <li class="navbar-item">
            <a href="petitionpsn.php" class="nav-link">ประวัติคำขอ</a>
        </li>
        <?php }?>
        <li class="navbar-item">
            <a href="logout.php" class="nav-link">ออกจากระบบ</a>
        </li>
    </ul>
</div>
</nav>
<?php
     $sqlpsn = " SELECT DISTINCT scdpsndetail.IDsj,subjects.namesj
     FROM scdpsndetail,subjects,personnel
     WHERE scdpsndetail.IDsj = subjects.IDsj
     AND personnel.IDscdPsn=scdpsndetail.IDscdPsn
     AND personnel.IDpsn ='$id'";
     $resultpsn = mysqli_query($connect,$sqlpsn);

     $sqlrst = "SELECT register.IDsj,subjects.namesj,count(register.IDsj) AS 'total'
     FROM subjects,register
     WHERE register.IDsj = subjects.IDsj
     GROUP BY register.IDsj,subjects.namesj";
     $resultrgt = mysqli_query($connect,$sqlrst);
     $countrgt = mysqli_num_rows($resultrgt);

     $sqltotal = "SELECT COUNT(*) AS 'total' FROM register";
     $resulttotal = mysqli_query($connect,$sqltotal);
     $rowtotal = mysqli_fetch_assoc($resulttotal)
?>

<div class="container">
<?php if($rowp['Nameam'] == '2'){?>
    <div class="text-center h1">
        วิชาทั้งหมด
    </div>
<div class="row mt-5">
    <?Php while($rowpsn = mysqli_fetch_assoc($resultpsn)){?>
            <div class="col-sm-2 ml mx-4 text-center">
                <a href="SJDT.php?id=<?php echo $rowpsn['IDsj']?>" class="btn">  
                        <div>
                            <?php echo "วิชา".$rowpsn['namesj']?>
                        </div>
                    </a> 
                </div>
            <?php }?>          
        </div>
<?php }else{?>
    <div class="text-center h1">
        คำขอทั้งหมด
    </div>
    <table class="table table-bordered table-striped table-hover bg-white mt-5">
        
                <thead>
                    <tr>
                        <th>จำนวนวิชาทั้งหมด <?php echo $countrgt?> วิชา</th>
                        <th>จำนวนคำร้องทั้งหมด <?php echo $rowtotal['total']?> คำร้อง</th>
                    </tr>
                    <tr class="text-center">
                        <th>รหัสวิชา</th>
                        <th>ชื่อวิชา</th>
                        <th>จำนวนคน</th>
                        <th>รายละเอียด</th>

                    </tr>
                </thead>
                <tbody>
                <?php while( $rowrst = mysqli_fetch_assoc($resultrgt)){?>                        
                    <tr>

                        <td class="text-center"><?php echo $rowrst["IDsj"] ?></td>
                        <td><?php echo $rowrst["namesj"] ?></td>
                        <td><?php echo $rowrst["total"] ?></td>

                        <td class="text-center">
                            <a href="registerDT.php?id=<?Php echo $rowrst['IDsj']?>" class="btn btn-success">เลือก</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>    
    <?php }?>
    </div>
</body>
</html>