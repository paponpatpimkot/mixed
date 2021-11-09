<?php
    include '../connect.php';

    $barcode = $_GET['barcode'];
    $sql = "DELETE FROM deviceitem WHERE Barcode = '$barcode'";
    $query = $connect->query($sql);
    
    echo "<script>alert('Delete Success');window.location.href='index.php?page=device_barcode';</script>"
?>