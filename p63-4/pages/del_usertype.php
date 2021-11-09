<?php
    include '../connect.php';
    $id = $_GET['id'];
    $sql = "DELETE FROM usertype WHERE UserType_id = '$id'";
    $query = $connect -> query($sql);
    echo "<script>alert('Delete Success');window.location.href='index.php?page=setting';</script>"
?>