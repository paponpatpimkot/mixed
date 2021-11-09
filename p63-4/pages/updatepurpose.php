<?php
    include 'navbar.php';

    if(isset($_POST['submit'])){
        $pur_id = $_POST['PurID'];
        $pur_name = $_POST['PurName'];

        $sql = "UPDATE purpose SET PurName='$pur_name' WHERE PurID = '$pur_id'";
        $query = $connect->query($sql);
        echo "<script>alert('แก้ไขข้อมูลสำเร็จ');window.location.href='purpose.php';</script>";
    }else if(isset($_POST['cancel'])){
        header('location:purpose.php');
    }
?>