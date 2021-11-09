<?php
    include '../connect.php';

    if(isset($_POST['submit'])){
        $devicetype_id = $_POST['Devcat_ID'];
        $devicetype_name = $_POST['Devcat_NAME'];

        $sql = "UPDATE devicecatagory SET Devcat_NAME='$devicetype_name' WHERE Devcat_ID = '$devicetype_id'";
        $query = $connect->query($sql);
        echo "<script>alert('EDIT SUCCESS');window.location.href='index.php?page=device_type';</script>";
    }else if(isset($_POST['cancel'])){
        header('location:index.php?page=device_type');
    }
?>