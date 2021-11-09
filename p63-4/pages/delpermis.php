<?php
    include '../connect.php';
    $id = $_GET['id'];
    $sql = "DELETE FROM permission WHERE Permission_id = '$id'";
    $query = $connect -> query($sql);
    echo "<script>alert('DELETE SUCCESSFULLY');window.location.href='index.php?page=permission';</script>"
?>