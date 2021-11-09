<?php
    include '../connect.php';
    if(isset($_POST['submit'])){
        $barcode = $_POST['barcode'];
        $device_id = $_POST['device_id'];
        $location = $_POST['location'];
        $date = $_POST['date'];
        $status = $_POST['status'];

        $sql = "UPDATE deviceitem SET Location_ID = '$location',Date_in ='$date',Sitems_ID='$status'
        WHERE Barcode = '$barcode'";
        $query = $connect->query($sql);
        echo "<script>alert('Update Success');window.location.href='index.php?page=device_barcode';</script>";
    }
?>