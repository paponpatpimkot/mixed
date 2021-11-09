<?php 
    $id = $_GET['id'];
    $sql = "DELETE FROM devicecatagory WHERE Devcat_ID = '$id'";
    $query = $connect -> query($sql);
    echo "<script>alert('DELETE SUCCESSFULLY');window.location.href='index.php?page=device_type';</script>";
?>