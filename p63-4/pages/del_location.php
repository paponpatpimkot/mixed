<?php
    include '../connect.php';

    $id = $_GET['id'];
    $sql = "DELETE FROM location WHERE Location_ID = '$id'";
    $query = $connect -> query($sql);
    echo "<script>alert('DELETE SUCCESSFULLY');window.location.href='index.php?page=location';</script>"
?>