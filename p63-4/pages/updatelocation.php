<?php
    include 'navbar.php';

    if(isset($_POST['submit'])){
        $lo_id = $_POST['Location_ID'];
        $lo_name = $_POST['Location_name'];

        $sql = "UPDATE location SET Location_ID='$lo_id', Location_name='$lo_name' WHERE Location_ID = '$lo_id'";
        $query = $connect->query($sql);
        echo "<script>alert('EDIT SUCCESS');window.location.href='index.php?page=location';</script>";
    }else if(isset($_POST['cancel'])){
        header('location:index.php?page=location');
    }
?>