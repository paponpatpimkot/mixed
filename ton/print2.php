<?php
session_start();
$username = $_SESSION['username'];
$id = $_GET['id'];
require("connect.php");
     $sql = "SELECT * FROM subjects 
     WHERE IDsj = '$id' ";
     $result = mysqli_query($connect,$sql);
     $row = mysqli_fetch_assoc($result);

     $sqlam = "SELECT * FROM admid
     WHERE IDam = '3' ";
     $resultam = mysqli_query($connect,$sqlam);
     $rowam = mysqli_fetch_assoc($resultam);

     $sqlstd = "SELECT studen.title,studen.fname,studen.lname,classa.nameclassA,class.nameclass,studen.IDg,branch.nameb,department.namedpm
     FROM studen,classa,class,branch,department
     WHERE studen.IDstd = '$username' 
     AND studen.IDb = branch.IDb
     AND studen.IDclass = class.IDclass
     AND studen.IDclassA = classa.IDclassA
     AND studen.IDdpm = department.IDdpm";
     $resultstd = mysqli_query($connect,$sqlstd);
     $rowstd = mysqli_fetch_assoc($resultstd);

     $sqlpsn = "SELECT personnel.titlepsn,personnel.fnamepsn,personnel.lnamepsn,classa.nameclassA,class.nameclass,personnel.IDg,department.namedpm
     FROM personnel,studen,class,classa,department
     WHERE studen.IDclassA = personnel.IDclassA 
     AND personnel.IDclassA = classa.IDclassA 
     AND personnel.IDclass = class.IDclass 
     AND studen.IDclass = personnel.IDclass 
     AND studen.IDg = personnel.IDg 
     AND personnel.IDdpm = department.IDdpm
     AND studen.IDstd = '$username'"; 
     $resultpsn = mysqli_query($connect,$sqlpsn);
     $rowpsn = mysqli_fetch_assoc($resultpsn);

     $sqlam6 = "SELECT * FROM admid 
     WHERE IDam = '6' ";
     $resultam6 = mysqli_query($connect,$sqlam6);
     $rowam6 = mysqli_fetch_assoc($resultam6);

     $sqlam7 = "SELECT * FROM admid 
     WHERE IDam = '7' ";
     $resultam7 = mysqli_query($connect,$sqlam7);
     $rowam7 = mysqli_fetch_assoc($resultam7);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">  
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="material-dashboard-master/assets/css/material-dashboard.min.css?v=2.1.2" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="Print.css" media="print">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-light bg-primary" id="print">

<div class="container-fluid">
    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbartoggle">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a href="index.php" class="navbar-brand"><?php echo $_SESSION["fname"]." ".$_SESSION["lname"];?></a>
    <ul class="navbar-nav">
        
        
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
    <div class="container mt-5">
        <table class="">
            <tr>
                <td class="col col-lg-1 text-start"><img src="Proto/2.jpg.crdownload" alt="" width="100" height="100">
                <div class="h2" style="margin-left: 360px;">บันทึกข้อความ</div></td>
            </tr>
            <tr>
                <th class="col col-lg-1 h3">ส่วนราชการ &nbsp;&nbsp;<span class="h5">วิทยาลัยเทคนิคสัตหีบ</span></th>

            </tr>
            <tr>
            
                <th class="col col-lg-1 h3">ที่
                    <span class="text-end h5" style="margin-left: 700px;">
                        <?php  include('day.php');?>
                    </span></th>

              
                   
              
            </tr>
            <tr>
                <td></td>
            </tr>
        </table>
        <div class="mx-2">
            <span class="h3">เรื่อง</span> ขอความอนุเคราะห์เปิดสอนรายวิชา <?php echo $row['namesj']?> รหัสวิชา <?php echo $id?>
        </div>
        <div class="mx-5">
        &nbsp;&nbsp; ในภาคเรียนฤดูร้อน ปีการศึกษา <?php echo $rowam['Nameam']?>
        </div>
        <div>_____________________________________________________________________________________________________________________________</div>
        <div class="mx-2">
            เรียน  &nbsp; ผู้อำนวยการวิทยาลัยเทคนิคสัตหีบ
        </div>
         <br>
         <div style="margin-left: 100px;">ด้วยข้าพเจ้า <?php echo $rowstd['title']." ".$rowstd['fname']." &nbsp; ".$rowstd['lname']." &nbsp; รหัสประจำตัว ".$username?></div>
         <div>นักศึกษาชั้น <?php echo $rowstd['nameclassA'].".".$rowstd['nameclass']." กลุ่ม ".$rowstd['IDg']." สาขาวิชา ".$rowstd['nameb']." มีความประสงค์ขอความอนุเคราะห์ให้"?></div>
         <div>วิทยาลัยเทคนิคสัตหีบ เปิดทำการเรียนการสอนในรายวิชา <?php echo $row['namesj']?></div>
         <div>รหัสวิชา <?php echo $id;?> ในภาคเรียนฤดูร้อน ปีการศึกษา <?php echo $rowam['Nameam']?> นี้</div>
        <table class="mb-5">
            <tr>
                <td class="col col-lg-2 text-center">จึงเรียนมาเพื่อโปรดพิจารณา</td>
                <td class="col col-lg-2"></td>
            </tr>
            <tr>
                <td>ความเห็นเห็นของผู้เกี่ยวข้อง</td>
                <td>(ลงชื่อ)...........................................</td>
            </tr>
            <tr>
                <td>เรียน ผู้อำนวยการวิทยาลัยเทคนิคสัตหีบ</td>
                <td><?php echo $rowstd['title']." ".$rowstd['fname']." &nbsp; ".$rowstd['lname']?></td>
            </tr>
            <tr>
                <td><div style="margin-left: 30px;">...................................................</div></td>
                <td>นักศึกษาชั้น <?php echo $rowstd['nameclassA'].".".$rowstd['nameclass']."/".$rowstd['IDg']." แผนกวิชา ".$rowstd['namedpm'] ?></td>
            </tr>
            <tr>
                <td>...........................................................</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>เรียน ผู้อำนวยการวิทยาลัยเทคนิคสัตหีบ</td>
            </tr>
            <tr>
                <td>(ลงชื่อ)................................................</td>
                <td></td>
            </tr>
            <tr>
                <td>ครูผู้สอนวิชา <?php echo $row['namesj']?></td>
                <td><div style="margin-left: 30px;">..................................................</div></td>
            </tr>
            <tr>
                <td>เรียน ผู้อำนวยการวิทยาลัยเทคนิคสัตหีบ</td>
                <td>.................................................................</td>
            </tr>
            <tr>
                <td><div style="margin-left: 30px;">..................................................</div></td>
                <td><div style="margin-left: 60px;">(<?php echo $rowam6['Nameam'] ?>)</div></td>
            </tr>
            <tr>
                <td>.................................................................</td>
                <td>หัวหน้างานพัฒนาหลักสูตรการเรียนการสอน</td>
            </tr>
            <tr>
                <td><?php echo $rowpsn['titlepsn']." ".$rowpsn['fnamepsn']." &nbsp; ".$rowpsn['lnamepsn']?></td>
                <td></td>
            </tr>
            <tr>
                <td>ครูที่ปริกษาชั้น <?php echo $rowpsn['nameclassA'].".".$rowpsn['nameclass']."/".$rowpsn['IDg']." แผนกวิชา ".$rowpsn['namedpm'] ?><?php ?></td>
                <td>เรียน ผู้อำนวยการวิทยาลัยเทคนิคสัตหีบ</td>
            </tr>
            <tr>
                <td>เรียน ผู้อำนวยการวิทยาลัยเทคนิคสัตหีบ</td>
                <td><div style="margin-left: 30px;">..................................................</div></td>
            </tr>
            <tr>
                <td><div style="margin-left: 30px;">..................................................</div></td>
                <td>.................................................................</td>
            </tr>
            <tr>
                <td>.................................................................</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td><div style="margin-left: 60px;">(<?php echo $rowam7['Nameam'] ?>)</div></td>
            </tr>
            <tr>
                <td>นาย/นาง/นางสาว......................................</td>
                <td>ครูนำนาญการพิเศษ ปฏิบัติราชการแทน</td>
            </tr>
            <tr>
                <td>หัวหน้าสาขาวิชา........................................</td>
                <td><div style="margin-left: 60px;">รองผู้อำนวยการฝ่ายวิชาการ</div></td>
            </tr>
        </table>
        <div class="text-center">               
                     <button class="btn btn-primary" type="button" name="button" id="print" onclick="window.print();">พิมพ์</button>
                </div>
    </div>
</body>
</html>