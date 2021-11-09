<?php
    include 'navbar.php';

    if(isset($_POST['submit'])){
        $Brand_id = $_POST['Brand_id'];
        $Brand_name = $_POST['Brand_name'];

        $sql = "UPDATE brands SET Brand_id='$Brand_id', Brand_name='$Brand_name' WHERE Brand_id = '$Brand_id'";
        $query = $connect->query($sql);
        echo "<script>alert('EDIT SUCCESS');window.location.href='index.php?page=brands';</script>";
    }else if(isset($_POST['cancel'])){
        header('location:index.php?page=brands');
    }
?>