<?php
    include '../connect.php';
    date_default_timezone_set('Asia/Bangkok');
    $uid = $_SESSION['uid'];
    $brid = $_SESSION['brid'];
    $re = $_SESSION['re'];
    $date = date("Y-m-d H:i:s");
    $deviceid = $_POST['device_id'];
    $staff = $_SESSION['staff'];
    
    $sql = "SELECT * FROM borrowdetail WHERE Borrow_id = '$brid' AND Barcode = '$deviceid'";
    $query = $connect->query($sql);
    $num = mysqli_num_rows($query);
    
    if($num == 0){
        echo "<script>alert('ผู้ใช้งานไม่ได้ทำการยืมอุปกรณ์นี้');window.location.href='index.php?page=return2';</script>";
    }else if($num != 0){
        $sql1 =  "UPDATE deviceitem SET Sitems_ID=1,Sreturn_ID=1 WHERE Barcode= '$deviceid'";
        $query1 = $connect->query($sql1);
        
        $sql3 = "SELECT * FROM device 
        LEFT JOIN deviceitem ON device.Device_id = deviceitem.Device_id
        WHERE Barcode = '$deviceid'";
        $query3 = $connect->query($sql3);
        $fetch = mysqli_fetch_array($query3);
        $qy = $fetch['QTY'];
        $qty = intval($qy)+1;
        $dv = $fetch['Device_id'];
        $sql3 = "UPDATE device SET QTY = $qty WHERE Device_id = '$dv'";
        $query = $connect->query($sql3);
        
        $sql2 = "SELECT * FROM borrowdetail
        LEFT JOIN deviceitem ON deviceitem.Barcode = borrowdetail.Barcode
        LEFT JOIN device ON device.Device_id = deviceitem.Device_id
        LEFT JOIN location ON deviceitem.Location_ID = location.Location_ID
        WHERE Borrow_id = '$brid' AND Sitems_ID = 0 AND Sreturn_ID = 2";
        $query2 = $connect->query($sql2);
        $num2 = mysqli_num_rows($query2);
        if($num2 == 0){
            $sql3 = "INSERT INTO givback VALUES('$re','$brid','$date','$staff')";
            $query3 = $connect->query($sql3);
            echo "<script>alert('ทำการคืนสำเร็จ');window.location.href='index.php?page=return';</script>";
        }else if($num != 0){
            header('location:index.php?page=return2');
        }
    }
?>