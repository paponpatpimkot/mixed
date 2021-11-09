<?php
    include 'navbar.php';

    if(isset($_POST['submit'])){
        $job_id = $_POST['Jobcard_id'];
        $job_name = $_POST['Jobcard_name'];

        $sql = "UPDATE jobcard SET Jobcard_name='$job_name' WHERE Jobcard_id = '$job_id'";
        $query = $connect->query($sql);
        echo "<script>alert('แก้ไขข้อมูลสำเร็จ');window.location.href='jobcard.php';</script>";
    }else if(isset($_POST['cancel'])){
        header('location:jobcard.php');
    }
?>