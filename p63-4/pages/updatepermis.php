<?php
    include 'navbar.php';

    if(isset($_POST['submit'])){
        $per_id = $_POST['Permission_id'];
        $per_name = $_POST['Permission_name'];

        $sql = "UPDATE permission SET Permission_name='$per_name' WHERE Permission_id = '$per_id'";
        $query = $connect->query($sql);
        echo "<script>alert('แก้ไขข้อมูลสำเร็จ');window.location.href='permission.php';</script>";
    }else if(isset($_POST['cancel'])){
        header('location:permission.php');
    }
?>