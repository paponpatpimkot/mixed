<?php
    require('connect.php');
    session_start();
    $id = $_POST['id'];
    $passwordO = $_POST['passwordO'];
    $passwordN = $_POST['passwordN'];

    $sqlse = "SELECT * FROM studen WHERE IDstd = '$id'";
    $resultse = mysqli_query($connect,$sqlse);
    $rowse = mysqli_fetch_assoc($resultse);
        if($rowse['Birthday'] == $passwordO){
            $sql = "UPDATE studen SET Birthday = '$passwordN' WHERE IDstd = '$id'";
            $result = mysqli_query($connect,$sql);
            header("location:index.php");
        }else{
            $_SESSION['error'] = "รหัสผ่านไม่ถูกต้อง";
            header("location: editpassword.php");
        } 
?>