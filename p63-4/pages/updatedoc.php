<?php
    include 'navbar.php';
    
    if(isset($_POST['submit'])){
        $doc_id = $_POST['Document_id'];
        $doc_name = $_POST['Document_name'];

        $sql = "UPDATE document SET Document_id='$doc_id', Document_name='$doc_name' WHERE Document_id = '$doc_id'";
        $query = $connect->query($sql);
        echo "<script>alert('แก้ไขข้อมูลสำเร็จ');window.location.href='document.php';</script>";
    }else if(isset($_POST['cancel'])){
        header('location:document.php');
    }
?>