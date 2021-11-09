<?php
    include '../connect.php';

    $id = $_GET['id'];
    $sql = "DELETE FROM brands WHERE Brand_id = '$id'";
    $query = $connect -> query($sql);
    echo "<script>alert('DELETE SUCCESSFULLY');window.location.href='index.php?page=brands';</script>"
?>