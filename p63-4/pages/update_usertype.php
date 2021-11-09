<?php
    include 'navbar.php';
        
    if(isset($_POST['submit'])){
        $ustype_id = $_POST['UserType_id'];
        $ustype_name = $_POST['UserType_name'];

        $sql = "UPDATE usertype SET UserType_name='$ustype_name' WHERE UserType_id = '$ustype_id'";
        $query = $connect->query($sql);
        echo "<script>alert('EDIT SUCCESS');window.location.href='index.php?page=setting';</script>";
    }else if(isset($_POST['cancel'])){
        header('location:index.php?page=setting');
    }
?>