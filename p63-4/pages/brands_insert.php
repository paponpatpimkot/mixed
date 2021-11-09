<?php
    include '../connect.php';

    if(isset($_POST['submit'])){ 
        $Brand_id = $_POST['Brand_id'];
        $Brand_name = $_POST['Brand_name'];

        $sql = "SELECT * FROM brands WHERE Brand_id = '$Brand_id' ";
        $query = $connect->query($sql);
        $num = mysqli_num_rows($query);

        if($num != 0){
            echo "<script>alert('ALREADY HAVE BRAND');window.location.href='index.php?page=brands';</script>";
        }else if($num == 0){
            $sql = "INSERT INTO brands VALUES('$Brand_id','$Brand_name')";
            $query = $connect->query($sql);
            echo "<script>alert('ADD SUCCESS');window.location.href='index.php?page=brands';</script>";
        }
    }
?>