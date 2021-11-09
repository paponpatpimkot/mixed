<?php
    include '../connect.php';

    $device_id = $_POST['device_id'];
    $device_name = $_POST['device_name'];
    $type_id = $_POST['type_id'];
    $brand_id = $_POST['brand_id'];
    $devcat_id = $_POST['devcat_id'];
    $desc = $_POST['desc'];
    $mec_info = $_POST['mec_info'];
    $ele_info = $_POST['ele_info'];
    $tou = $_POST['tou'];
    $sql = "UPDATE device SET 
    Device_name = '$device_name',Type_id = '$type_id',Brand_id = '$brand_id',Devcat_ID = '$devcat_id', Description='$desc',
    Mechanical_inf = '$mec_info',Electrical_inf = '$ele_info',type = '$tou'
    WHERE Device_id = '$device_id'
    ";
    $query = $connect->query($sql);
    echo "<script>alert('Edit Success');window.location.href='index.php?page=device';</script>";
?>