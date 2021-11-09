<?php
session_start();
require("connect.php");
    $psn = $_SESSION['IDpsn'];
    $id = $_GET['id'];
    $sql = "SELECT petition.IDday,petition.IDptt,petition.IDstd,studen.fname,studen.lname,department.namedpm,subjects.namesj,petition.starttime,petition.endtime,petition.type,petition.IDpsn,class.nameclass,day.IDday,day.nameday
    FROM petition,studen,department,subjects,class,day
    WHERE petition.IDstd=studen.IDstd
    AND studen.IDdpm=department.IDdpm
    AND petition.IDsj=subjects.IDsj
    AND studen.IDclass=class.IDclass
    AND petition.IDday=day.IDday
    AND petition.IDpsn=$psn
    AND petition.type='1'
    AND petition.IDsj='$id' ";

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
        <li class="navbar-item">
            <a href="petitionpsn.php" class="nav-link">ประวัติคำขอ</a>
        </li>
        <li class="navbar-item">
            <a href="logout.php" class="nav-link">ออกจากระบบ</a>
        </li>
       
    </ul>
</div>
</nav>


<div class="container-fluid">

<?php if($count==0){?>
    <div class="h1 mt-5 text-center">
        ไม่มีข้อมูลคำขอ
    </div>
    <?php }else{?>
          
            <table class="table table-bordered table-striped table-hover bg-white mt-5">
                <thead>
                    <tr class="text-center">
                        <th>รหัสนักศึกษา</th>
                        <th>ชื่อนักศึกษา</th>
                        <th>ระดับชั้น</th>
                        <th>ชื่อแผนก</th>
                        <th>ชื่อวิชา</th>
                        <th>วัน</th>
                        <th>เวลาเข้าเรียน</th>
                        <th>เวลาเลิกเรียน</th>
                        <th colspan="2">ผลการอนุมัติ</th>
                    </tr>
                </thead>
                <tbody>
                <?php while($row = mysqli_fetch_assoc($result)){?>
                 
                    <tr>
  
                        <td><?php echo $row["IDstd"] ?></td>
                        <td><?php echo $row["fname"]." ".$row["lname"] ?></td>
                        <td><?php echo $row["nameclass"] ?></td>
                        <td><?php echo $row["namedpm"] ?></td>
                        <td><?php echo $row["namesj"] ?></td>
                        <td><?php echo $row["nameday"] ?></td>
                        <td><?php echo $row["starttime"] ?></td>
                        <td><?php echo $row["endtime"] ?></td>
                        <td class="text-center">
                            <form action="updateptt.php" method="post">
                                <input type="hidden" value="2" name="type">
                                <input type="hidden" value="<?php echo $row['IDptt'] ?> " name="id">
                                <input type="submit" value="อนุมัติ" class="btn btn-success ">
                            </form>
                            
                        </td>
                        <td class="text-center">
                        <form action="updateptt.php" method="post">
                                <input type="hidden" value="3" name="type">
                                <input type="hidden" value="<?php echo $row['IDptt'] ?> " name="id">
                                <input type="submit" value="ไม่อนุมัติ" class="btn btn-danger ">
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