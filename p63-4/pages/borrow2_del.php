<?php
    include '../connect.php';
    $id = $_GET['id'];
    $barcode = $_GET['barcode'];
    $br = "BR-"."$id";

    $sql = "SELECT * FROM borrowdetail WHERE Borrow_id = '$br' AND Barcode = '$barcode'";
    $query = $connect->query($sql);
    $fetch = mysqli_fetch_array($query);
    $pcs = $fetch['Pcs'];
    
    $sql = "SELECT * FROM deviceitem LEFT JOIN device ON device.Device_id = deviceitem.Device_id WHERE Barcode = '$barcode' ";
    $query = $connect->query($sql);
    $fetch = mysqli_fetch_array($query);
    $device = $fetch['Device_id'];
    $qy = $fetch['QTY'];
    $qty = intval($qy)+intval($pcs);

    $sql1 = "UPDATE deviceitem SET Sitems_ID = 1 , Sreturn_ID = 1 WHERE Barcode = '$barcode' ";
    $query1 = $connect->query($sql1);

    $sql2 = "UPDATE device SET QTY = $qty WHERE Device_id = '$device' ";
    $query2 = $connect->query($sql2);
    
    $sql3 = "DELETE FROM borrowdetail WHERE Borrow_id = '$br' AND Barcode = '$barcode' ";
    $query3 = $connect->query($sql3);

    header('location:index.php?page=borrow2');
?>