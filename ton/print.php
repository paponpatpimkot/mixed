<?php
    require("connect.php");
    session_start();
    $type = $_POST['type'];
    $class = $_SESSION['class'];
    $username = $_SESSION['username'];
    $i = 1;
   if($type == 0){
    $_SESSION['error'] = "กรุณาเลือกประเภทนักศึกษา";
    header("location: index.php");
   }
    $sql = "SELECT class.IDclass,class.nameclass,classa.nameclassA,branch.nameb,studen.IDstd,studen.IDclassA,department.namedpm,studen.IDdpm,studen.number
    FROM studen,class,classa,branch,department
    WHERE studen.IDclass=class.IDclass
    AND studen.IDclassA=classa.IDclassA
    AND studen.IDb=branch.IDb
    AND studen.IDdpm=department.IDdpm
    AND studen.IDstd='$username'";
    $result = mysqli_query($connect,$sql);
    $row = mysqli_fetch_assoc($result);
    
    $sqlptt = "SELECT petition.IDsj,subjects.namesj,sjdetail.theoreticalhours,sjdetail.practicehours,sjdetail.littlekit,personnel.fname,personnel.lname,petition.type,petition.IDstd
    FROM petition,subjects,sjdetail,personnel
    WHERE petition.IDsj=subjects.IDsj
    AND subjects.IDsj=sjdetail.IDsj
    AND petition.IDpsn=personnel.IDpsn
    AND petition.IDstd='$username'
    AND petition.type='2'";
    $resultptt = mysqli_query($connect,$sqlptt);

    $sqle = "SELECT petition.IDsj,subjects.namesj,sjdetail.theoreticalhours,sjdetail.practicehours,sjdetail.littlekit,personnel.fname,personnel.lname,petition.type,petition.IDstd
    FROM petition,subjects,sjdetail,personnel
    WHERE petition.IDsj=subjects.IDsj
    AND subjects.IDsj=sjdetail.IDsj
    AND petition.IDpsn=personnel.IDpsn
    AND petition.IDstd='$username'
    AND petition.type='1'";
    $resulte = mysqli_query($connect,$sqle);
    // if($resulte){
    //     $_SESSION['error'] = "คุณยังมีวิชาที่ต้องรออนุมัติ";
    //     header("location: index.php");
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script> 
    <link rel="stylesheet" href="Print.css" media="print">
    <!-- <link href="material-dashboard-master/assets/css/material-dashboard.min.css?v=2.1.2" rel="stylesheet" /> -->
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-light bg-primary">

<div class="container-fluid"  id="print">

    <a href="index.php" class="navbar-brand"><?php echo $_SESSION["fname"]." ".$_SESSION["lname"];?></a>
    <ul class="navbar-nav">
        <li class="navbar-item">
            <a href="petition.php"  class="nav-link">ประวัติคำขอ</a>
        </li>
        <li class="navbar-item">
            <a href="logout.php" class="nav-link">ออกจากระบบ</a>
        </li>
    </ul>
</div>
</nav>
    <div class="container">
        <div class="text-center mt-3 h4">
            วิทยาลัยเทคนิคสัตหีบ
        </div>
        <div>
            <?php if($type == 1){?>
                <div class="text-center h4" >
                   ใบคำร้องขอลงทะเบียนเรียนซ้ำ ปรับระดับคะแนน 
                </div>
                <div class="text-end ">
                    <?php  include('day.php');?>
                </div>
                <div>
                    เรื่อง &nbsp; การลงทะเบียนเรียนซ้ำ ปรับรดับคะแนน <br>
                    เรียน &nbsp; ผู้อำนวยการวิทยาลัยเทคนิคสัตหีบ<br><br> 
                </div>
                <span class="ms-5">
                    เนื่องด้วยข้าพเจ้า <?php echo $_SESSION['title']." ".$_SESSION["fname"]." ".$_SESSION["lname"];?> 
                    <span class="ms-5">
                        รหัสนักศึกษา <?php echo $_SESSION['username']?>
                    </span><br>
                    <span class="">
                        นักศึกษาชั้น <?php echo $row['nameclassA']." ".$row["nameclass"]?>
                    </span>
                    <span class="ms-5">
                        สาขางาน <?php echo $row['nameb']?>
                    </span>    
                </span>
                <span class="ms-5">
                    สอบไม่ผ่านวิชาดังต่อไปนี้  
                </span>
   
            
            <table class="table table-bordered table-striped table-hover bg-white mt-4">
                <thead>
                    <tr class="text-center">
                        <th>ที่</th>
                        <th>รหัสวิชา</th>
                        <th>ชื่อวิชา</th>
                        
                        <?php if($row['IDclassA']==1){?>
                            <th>ช.</th>
                        <?php }else{?>
                            <th>ท.</th>
                            <th>ป.</th>
                        <?php }?>
                        <th>น.</th>
                        <th>ครูผู้นสอน</th>
                        <th>ผลการอนุมัติ</th>
                    </tr>
                </thead>
                <tbody>
                <?php while($rowptt = mysqli_fetch_assoc($resultptt)){?> 
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $rowptt["IDsj"] ?></td>
                        <td><?php echo $rowptt["namesj"] ?></td>
                        <?php if($row['IDclassA']==1){?>
                            <td><?php echo ($rowptt["theoreticalhours"])+($rowptt["practicehours"]) ?></td>
                        <?php }else{?>
                            <td><?php echo $rowptt["theoreticalhours"] ?></td>
                            <td><?php echo $rowptt["practicehours"] ?></td>
                        <?php }?>
                        <td><?php echo $rowptt["littlekit"] ?></td>
                        <td><?php echo $rowptt["fname"]." ".$rowptt["lname"];?></td>
                        <td>
                        <?php if($rowptt["type"]==2){?>
                                อนุมัติแล้ว
                            <?php }?>
                        </td>
                    </tr>
                    <?php $i++; } ?>
                </tbody>
            </table> <br>
            <div class="ms-5">
                จึงเรียนมาเพื่อขอลงทะเบียนเรียนซ้ำในรายวิชาดังกล่าว
            </div><br>
            <div class="text-center mb-5">
                ข้อแสดงความนับถือ
            </div>
            <div class="text-center my-5">
                .............................................................<br>
                (.............................................................)<br>
                นักเรียนนักศึกษา
            </div>
            <div class="d-flex justify-content-between ">
                <div>ลงชื่อ.....................................................................ครูที่ปริกษา</div> 
                <div>ลงชื่อ.....................................................................งานการเงิน</div>
            </div>
            
            <div class="d-flex justify-content-between ">
                <div>ลงชื่อ.....................................................................งานปกตรอง</div> 
                <div>เล่มที่.............................................เลขที่..................................</div>
            </div>
          
            <div class="d-flex justify-content-between ">
                <div>ลงชื่อ.....................................................................งานทะเบียน</div> 
                <div>วันที่............................................................................................</div>
            </div>
            
            <?php }else if($type == 2){?>
                <?php
                $sqlscd = "SELECT schedulesstd.IDclass,schedulesstd.term,schedulesstd.year,studen.IDstd
                FROM schedulesstd,studen
                WHERE studen.IDclass=schedulesstd.IDclass
                AND studen.IDstd='$username'";
                
                $resultscd = mysqli_query($connect,$sqlscd);
                $rowscd = mysqli_fetch_assoc($resultscd);
            ?>
                <div class="text-center h4" >
                   บัตรลงทะเบียนรายวิชา (สำหรับนักศึกษาตกรุ่น) 
                </div>
                <div class="text-center">
                    ภาคเรียนที่<?php echo " ".$rowscd['term']." "?>ปีการศึกษา<?php echo " ".$rowscd['year']." "?>
                </div>
                <div>
                    รหัสประจำตัว<?php echo " ".$_SESSION['username']." "?> ชื่อ<?php echo " ".$_SESSION['title']." ".$_SESSION["fname"]." ".$_SESSION["lname"];?>
                </div>
                <div>
                    ประเพจวิชา<?php echo " " ;
                                if($row['IDdpm']<=9){
                                    echo "วิชาอุตสาหกรรม";
                                }else if($row['IDdpm']<=11){
                                    echo "วิชาอุตสาหกรรมท่องเที่ยว";
                                }else if($row['IDdpm']<=12){
                                    echo "วิชาเทคโนโลยีสารสนเทศและการสื่อสาร";
                                }else if($row['IDdpm']<=14){
                                    echo "วิชาพาณิชยกรรมและบริหารธุรกิจ";
                                }else{
                                    echo "ไม่พบข้อมูล";
                                }
                                
                  ?>
                </div>
                <div>
                    สาขาวิชา<?php echo " ".$row['namedpm']." "?> สาขางาน<?php echo " ".$row['nameb']?>
                </div>
                <div>
                    ระดับชั้น<?php echo " ".$row['nameclassA']." ".$row["nameclass"]." "?> เบอร์โทร<?php echo " ".$row['number']?>
                </div>
                <table class="table table-bordered table-striped table-hover bg-white mt-4">
                <thead>
                    <tr class="text-center">
                        <th>ที่</th>
                        <th>รหัสวิชา</th>
                        <th>ชื่อวิชา</th>
                        
                        <?php if($row['IDclassA']==1){?>
                            <th>ช.</th>
                        <?php }else{?>
                            <th>ท.</th>
                            <th>ป.</th>
                        <?php }?>
                        <th>น.</th>
                        <th>ครูผู้นสอน</th>
                        <th>ผลการอนุมัติ</th>
                    </tr>
                </thead>
                <tbody>
                <?php while($rowptt = mysqli_fetch_assoc($resultptt)){?> 
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $rowptt["IDsj"] ?></td>
                        <td><?php echo $rowptt["namesj"] ?></td>
                        <?php if($row['IDclassA']==1){?>
                            <td><?php echo ($rowptt["theoreticalhours"])+($rowptt["practicehours"]) ?></td>
                        <?php }else{?>
                            <td><?php echo $rowptt["theoreticalhours"] ?></td>
                            <td><?php echo $rowptt["practicehours"] ?></td>
                        <?php }?>
                        <td><?php echo $rowptt["littlekit"] ?></td>
                        <td><?php echo $rowptt["fname"]." ".$rowptt["lname"];?></td>
                        <td>
                        <?php if($rowptt["type"]==2){?>
                                อนุมัติแล้ว
                            <?php }?>
                        </td>
                    </tr>
                    <?php $i++; } ?>
                </tbody>
            </table> <br>
                    <table class="mb-5" style="width: 100%;">
                        <tr>
                            <td>
                                ค่าบำรุงสุขภาพหรือห้องพยาบาล
                            </td> 
                            <td class="text-start">
                                .................บาท
                            </td>
                            <td class="col col-lg-6">
                                
                            </td>
                            <td class="text-end">
                                ลงชื่อ...................................................ผู้ลงทะเบียน
                            </td>
                    </tr>
                    <tr>
                            <td>
                                ค่าบำรุงห้องสมุด
                            </td> 
                            <td class="text-start">
                                .................บาท
                            </td>
                            <td class="col col-lg-6">
                                
                            </td>
                            <td class="text-end">
                                .......................................................ครูที่ปรึษา
                            </td>
                    </tr>
                    <tr>
                            <td>
                                ค่าภาคปฏิบัติหรือวัสดุฝึก
                            </td> 
                            <td class="text-start">
                                .................บาท
                            </td>
                            <td class="col col-lg-6">
                                
                            </td>
                            <td class="text-end">
                                ...................................................งานปกตรอง
                            </td>
                    </tr>
                    <tr>
                            <td>
                                ค่าลงทะเบียน
                            </td> 
                            <td class="text-start">
                                .................บาท
                            </td>
                            <td class="col col-lg-6">
                                
                            </td>
                            <td class="text-end">
                                ...................................................งานทะเบียน
                            </td>
                    </tr>
                    <tr>
                            <td>
                                รวมเป็นเงินทั้งสิ้น
                            </td> 
                            <td class="text-start">
                                .................บาท
                            </td>
                            <td class="col col-lg-6">
                                
                            </td>
                            <td class="text-end">
                               
                            </td>
                    </tr>

                   </table>
                   <div>
                       ใบเสร็จรับบเงินเล่มที่..................เลขที่...............
                   </div>      
                   <div>
                       ลงชื่อ..........................................เจ้าหน้าที่การเงิน
                   </div>   
                   <div>
                       วันที่ ............/............/.....................
                   </div>
                <?php }?>

                <div class="text-center">               
                     <button class="btn btn-primary" type="button" name="button" id="print" onclick="window.print();">พิมพ์</button>
                </div>
        </div>
    </div>
</body>
</html>