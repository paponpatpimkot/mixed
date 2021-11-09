<?php
    include '../connect.php';
    
        if(isset($_POST['submit'])){

        $Location_ID = $_POST['Location_ID'];
        $Location_name = $_POST['Location_name'];

        $sql = "SELECT * FROM location WHERE Location_ID ='$Location_ID'";
        $query = $connect->query($sql);
        $num = mysqli_num_rows($query);

        if($num != 0){
            echo "<script>alert('ALREADY HAVE LOCATION');window.location.href='index.php?page=location';</script>";
        }else if($num == 0){
            $sql = "INSERT INTO location VALUES('$Location_ID','$Location_name')";
            $query = $connect->query($sql);
            echo "<script>alert('ADD SUCCESS');window.location.href='index.php?page=location';</script>";
        }
    }
?>