<?php
    include '../connect.php';   
    if(isset($_POST['submit'])){
        $devicetype_id = $_POST['Devcat_ID'];
        $devicetype_name = $_POST['Devcat_NAME'];

        $sql = "SELECT * FROM devicecatagory WHERE Devcat_ID = '$devicetype_id'";
        $query = $connect->query($sql);
        $num = mysqli_num_rows($query);

        if($num != 0){
            echo "<script>alert('ALREADY HAVE ID');</script>";
        }else if($num == 0){
            $sql = "SELECT * FROM devicecatagory";
            $query = $connect->query($sql);
            $num = mysqli_num_rows($query);
            $sql = "INSERT INTO devicecatagory VALUES('$devicetype_id','$devicetype_name')";
            $query = $connect->query($sql);
            echo "<script>alert('ADD SUCCESS');window.location.href='index.php?page=device_type';</script>"; 
        }else{
            echo "<script>alert('ADD FAILED');window.location.href='index.php?page=device_type';</script>";
        }
    }
?>