<?php 

require("connect.php");
session_start();
$id = $_GET['id'];

$sql = "SELECT register.IDsj,register.IDstd,studen.fname,studen.title,studen.lname,department.namedpm,personnel.titlepsn,
personnel.fnamepsn,personnel.lnamepsn,classa.nameclassA,class.nameclass,studen.IDg
FROM register,studen,department,personnel,classa,class
WHERE register.IDstd = studen.IDstd
AND studen.IDdpm = department.IDdpm
AND studen.IDdpm = personnel.IDdpm
AND studen.IDclassA = personnel.IDclassA
AND studen.IDclass = personnel.IDclass
AND register.IDsj = '$id' 
AND studen.IDclassA = classa.IDclassA
AND studen.IDclass = class.IDclass";

$resul = mysqli_query($connect,$sql);


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

<table class="table table-bordered table-striped table-hover bg-white mt-5">
            <thead>
                <tr class="text-center">
                    <th>รหัสประจำตัว</th>
                    <th>ชื่อ</th>
                    <th>แผนก</th>
                    <th>ระดับชั้น</th>
                    <th>ชื่อครูที่ปรึษา</th>
                    <th>ข้อมูลนักศึกษา</th>
           
                </tr>
            </thead>
            <tbody>
            <?php while($row = mysqli_fetch_assoc($resul)){?>                        
                <tr>

                    <td><?php echo $row["IDstd"] ?></td>
                    <td> <?php echo $row['title']." ".$row['fname']." &nbsp; ".$row['lname'] ?></td>
                    <td><?php echo $row["namedpm"] ?></td>
                    <td> <?php echo $row['nameclassA'].".".$row['nameclass']."/".$row['IDg']?></td>
                    <td> <?php echo $row['titlepsn']." ".$row['fnamepsn']." &nbsp; ".$row['lnamepsn'] ?></td>
                    <td class="text-center">
                            <a href="STDdata.php?id=<?php echo $row["IDstd"];?>" class="btn btn-success ">
                                เลือก       
                            </a>        
                        </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        </div>
</body>
</html>