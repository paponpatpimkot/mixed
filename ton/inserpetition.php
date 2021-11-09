<?php

session_start();
require('connect.php');

$sql1 = "SELECT * FROM admid WHERE IDam = '3' ";
$result1 = mysqli_query($connect,$sql1);
$row1 = mysqli_fetch_assoc($result1);

$sql2 = "SELECT * FROM admid WHERE IDam = '4' ";
$result2 = mysqli_query($connect,$sql2);
$row2 = mysqli_fetch_assoc($result2);


$IDstd = $_POST['IDstd'];
$IDpsn = $_POST['IDpsn'];
$IDsj = $_POST['IDsj'];
$IDday = $_POST['IDday'];
$starttime = $_POST['starttime'];
$endtime = $_POST['endtime'];
$type = $_POST['type'];

$room = $_POST['room'];
$dpm = $_POST['dpm'];
$class = $_POST['class'];
$year = $row1['Nameam'];
$trem = $row2['Nameam'];
$i = 0;

 $sqlstd = "SELECT * FROM schedulesstd WHERE IDscdStd = '$IDstd' ";
 $resultstd = mysqli_query($connect,$sqlstd);
 $rowstd = mysqli_fetch_assoc($resultstd);

 if($rowstd["IDscdStd"] != $IDstd and $i == 0){
        $sqlscd = "INSERT INTO schedulesstd(IDscdStd,IDdpm,IDclass,term,year) VALUES($IDstd,'$dpm','$class','$year','$trem')";
        $resultscd = mysqli_query($connect,$sqlscd);
        $i = 1 ;
 }

 $sqldt = "SELECT * FROM scdstddetail WHERE IDscdStd = '$IDstd' ";
 $resultdt = mysqli_query($connect,$sqldt);
 if($i==1){

    $sql = "INSERT INTO scdstddetail(IDscdStd,IDsj,IDpsn,IDroom,IDday,starttime,endtime) VALUES($IDstd,'$IDsj','$IDpsn','$room','$IDday','$starttime','$endtime')";
    $result = mysqli_query($connect,$sql);

    $sqlptt = "INSERT INTO petition(IDstd,IDpsn,IDsj,IDday,starttime,endtime,type) VALUES($IDstd,'$IDpsn','$IDsj','$IDday','$starttime','$endtime','$type')";
    $resultptt = mysqli_query($connect,$sqlptt);
    $i=0;
    $_SESSION['success'] = "ลงทะเบียนเสร็จสิ้น";
        header("location: index.php");
 }
 

$STN = str_replace(":","",$starttime);
$NTN = str_replace(":","",$endtime);

$sqldtt = "SELECT * FROM scdstddetail WHERE IDscdStd = '$IDstd' AND IDday = '$IDday' ";
$resultdtt = mysqli_query($connect,$sqldtt);
$count = mysqli_num_rows($resultdtt);
$num = 0;

if($resultdtt){
    while($rowdt = mysqli_fetch_assoc($resultdt)){
        $STO = str_replace(":","",$rowdt['starttime']);
        $NTO = str_replace(":","",$rowdt['endtime']);
        if(($STO <= $STN and $NTO < $STN) and ($STO >= $STN and $NTO > $STN) ){
            $num=$num+1;
        }
    }
    if($count == $num){
        $sql = "INSERT INTO scdstddetail(IDscdStd,IDsj,IDpsn,IDroom,IDday,starttime,endtime) VALUES($IDstd,'$IDsj','$IDpsn','$room','$IDday','$starttime','$endtime')";
    $result = mysqli_query($connect,$sql);

    $sqlptt = "INSERT INTO petition(IDstd,IDpsn,IDsj,IDday,starttime,endtime,type) VALUES($IDstd,'$IDpsn','$IDsj','$IDday','$starttime','$endtime','$type')";
    $resultptt = mysqli_query($connect,$sqlptt);
    $_SESSION['success'] = "ลงทะเบียนเสร็จสิ้น";
        header("location: index.php");
    }else{
        $_SESSION['error'] = "คุณเลือกเวลาในกันเรียนชนกันกรุณาเลือกไหม่";
        header("location: index.php");
    }
    
}else{
    $sql = "INSERT INTO scdstddetail(IDscdStd,IDsj,IDpsn,IDroom,IDday,starttime,endtime) VALUES($IDstd,'$IDsj','$IDpsn','$room','$IDday','$starttime','$endtime')";
    $result = mysqli_query($connect,$sql);

    $sqlptt = "INSERT INTO petition(IDstd,IDpsn,IDsj,IDday,starttime,endtime,type) VALUES($IDstd,'$IDpsn','$IDsj','$IDday','$starttime','$endtime','$type')";
    $resultptt = mysqli_query($connect,$sqlptt);

    $_SESSION['success'] = "ลงทะเบียนเสร็จสิ้น";
        header("location: index.php");
}

?>