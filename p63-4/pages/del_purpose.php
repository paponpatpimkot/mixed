<?php
    include 'navbar.php';

    $id = $_GET['id'];
    $sql = "DELETE FROM purpose WHERE PurID = '$id'";
    $query = $connect -> query($sql);
    echo "<script>alert('DELETE SUCCESSFULLY');window.location.href='purpose.php';</script>"
?>