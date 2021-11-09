<?php
    session_start();

    if (!isset($_SESSION['username'])){
        header('location: login.php');
    }

    require("connect.php");
    $username = $_SESSION['username'];

    $sql = "SELECT scdstddetail.IDscdStd,subjects.namesj,scdstddetail.IDday,scdstddetail.starttime,scdstddetail.endtime,personnel.fnamepsn,personnel.lnamepsn,day.nameday,room.nameroom
    FROM scdstddetail,subjects,personnel,day,room
    WHERE scdstddetail.IDsj=subjects.IDsj 
    AND scdstddetail.IDpsn=personnel.IDpsn
    AND day.IDday = scdstddetail.IDday
    AND scdstddetail.IDroom = room.IDroom
    AND scdstddetail.IDscdStd= $username
    ORDER BY IDday";
    $result = mysqli_query($connect,$sql);
    $count = mysqli_num_rows($result);

    $sqlp = "SELECT * FROM admid WHERE IDam = '5' ";
        $resultp = mysqli_query($connect,$sqlp);
        $rowp = mysqli_fetch_assoc($resultp);

        $sql5 = "SELECT * FROM studen WHERE IDstd = '$username' ";
        $resul5 = mysqli_query($connect,$sql5);
        $row5 = mysqli_fetch_assoc($resul5);
        if($row5['IDclass'] != '5' and $row5['IDclass'] != '3'){
            header("location:petitionpage.php");
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
    <script src="js/bootstrap.js"></script>
</head>
<body style="background:#d8d9d8">
<nav class="navbar navbar-expand-sm navbar-light bg-primary">

<div class="container-fluid">
    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbartoggle">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a href="index.php" class="navbar-brand"><?php echo $_SESSION["fname"]." ".$_SESSION["lname"];?></a>
    <ul class="navbar-nav">
    <?php if($rowp['Nameam'] == '2'){?>
        <li class="navbar-item">
            <a href="scdstddetail.php"  class="nav-link">ประวัติคำขอ</a>
        </li>
            <?php }?>
        
        <li class="navbar-item dropdown">
                       <a href="#" class="nav-link dropdown-toggle" 
                       data-bs-toggle="dropdown">อื่นๆ</a>
                       <ul class="dropdown-menu">
                           <li><a href="editpassword.php" class="dropdown-item">เปลี่ยน password</a></li>
                           
                       </ul>
                   </li>
                   <li class="navbar-item">
            <a href="logout.php" class="nav-link">ออกจากระบบ</a>
        </li>
        
    </ul>
</div>

</nav>

    <div class="container">
    <?php if(isset($_SESSION['success'])) : ?>
                        <div class="alert alert-success h5 text-center">
                            <?php
                                echo $_SESSION['success'];
                                unset($_SESSION['success']);
                            ?>
                        </div>    
                    <?php endif ?>
    <?php if(isset($_SESSION['error'])) : ?>
                        <div class="alert alert-danger h5 text-center">
                            <?php
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                            ?>
                        </div>    
                    <?php endif ?>
            <?php if($rowp['Nameam'] == '2'){?>
            <form action="searchData.php" class = "form-group" method = "POST">
                <label class="h3">ค้นหาวิชาที่เปิดสอน</label>
            <table>
                <tr>
                    <td> <input type="text" placeholder = "รหัสวิชา " name="IDsj" class="form-control"></td>
                    <td><input type="submit" value = "search" class="btn btn-primary my-2" style="float: right;"></td>
                </tr>
            </form>
                <?php }else{?>
                    <form action="petitionpage.php" class = "form-group" method = "POST">
                <label class="h3">ค้นหาวิชาที่ต้องการส่งคำร้อง</label>
            <table>
                <tr>
                    <td> <input type="text" placeholder =   "รหัสวิชา " name="IDsj" class="form-control"></td>
                    <td><input type="submit" value = "search" class="btn btn-primary my-2" style="float: right;"></td>
                </tr>
            </form>
                    <?php }?>
                    <?php if($rowp['Nameam'] == '2'){?>
            <form action="print.php" class = "form-group" method = "POST">
                <tr>
               
                    <td> 
                        <select name="type" class="form-control">
                            <option value="0">--คลิกเพื่อเลือกประเภท--</option>
                            <option value="1">นักศึกษาปกติ</option>
                            <option value="2">นักศึกษาตกรุ่น</option>
                        </select>
                    </td>
                    <td><input type="submit" value = "Print" class="btn btn-success my-2" style="float: right;"></td>
                </tr>
            </form>
                    <?php }?>
                    <?php if($rowp['Nameam'] == '1'){?>
                        <tr>
                            <td><a href="choosergt.php" class="btn btn-success">ปริ้นใบคำร้อง</a></td>
                            
                        </tr>
                        <?php }?>
            </table>

            <?php if($rowp['Nameam'] == '2'){?>
            <?php if($count==0){?>
    <div class="h1 mt-5 text-center">
        ไม่มีประวัติคำร้อง
    </div>
    <?php }else{?>
    <div class="h1 mt-5 text-center">
        ประวัติคำร้อง
    </div>
<table class="table table-bordered table-striped table-hover bg-white mt-5">
                <thead>
                    <tr class="text-center">
                        <th>ชื่อวิชา</th>
                        <th>วัน</th>
                        <th>เวลาเข้าเรียน</th>
                        <th>เวลาเลิกเรียน</th>
                        <th>ห้อง</th>
                        <th>ชื่อครูผู้สอน</th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php while($row = mysqli_fetch_assoc($result)){?>
                 
                    <tr>
  
                        <td><?php echo $row["namesj"] ?></td>
                        <td><?php echo $row["nameday"] ?></td>
                        <td><?php echo $row["starttime"] ?></td>
                        <td><?php echo $row["endtime"] ?></td>
                        <td><?php echo $row["nameroom"] ?></td>
                        <td><?php echo $row["fnamepsn"]." ".$row["lnamepsn"] ?></td>
                       
                    </tr>
                    <?php } ?>
                </tbody>
            </table>    
            <?php }?> 
            <?php }?>
    </div>
    
        
    
</div>
</body>
</html>