<?php
    include '../connect.php';   
    if(isset($_POST['submit'])){
        $permis_name = $_POST['permission_name'];

        $sql = "SELECT * FROM permission WHERE Permission_id = '$permis_id'";
        $query = $connect->query($sql);
        $num = mysqli_num_rows($query);

        if($num != 0){
            echo "<script>alert('มีรหัสสิทธิ์นี้อยู่แล้ว');</script>";
        }else if($num == 0){
            $sql = "SELECT * FROM permission";
            $query = $connect->query($sql);
            $num = mysqli_num_rows($query);
            $n = $num+1;
            $sql = "INSERT INTO permission VALUES('$n','$permis_name')";
            $query = $connect->query($sql);
            echo "<script>alert('เพิ่มข้อมูลสำเร็จ');window.location.href='index.php?page=permission';</script>"; 
        }else{
            echo "<script>alert('เพิ่มข้อมูลล้มเหลว');window.location.href='index.php?page=perrmission';</script>";
        }
    }
?>