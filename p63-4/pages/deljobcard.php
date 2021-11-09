<?php
    include 'navbar.php';

    $id = $_GET['id'];
    $sql = "DELETE FROM jobcard WHERE Jobcard_id = '$id'";
    $query = $connect->query($sql);
    echo "<script>alert('ลบข้อมูลสำเร็จ');window.location.href='jobcard.php';</script>"
?>