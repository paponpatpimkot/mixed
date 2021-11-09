<?php
    include '../connect.php';
    $id = $_GET['User_id'];
    $sql = "DELETE FROM user WHERE User_id = '$id'";
    $query = $connect->query($sql);
    echo "<script>alert('Delete Success');window.location.href='index.php?page=user';</script>";
?>