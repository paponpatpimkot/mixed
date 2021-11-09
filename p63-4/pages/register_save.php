<?php
    include '../connect.php';
    $id = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $tel = $_POST['telephone'];

    $sql = "SELECT * FROM user WHERE Username = '$id'";
    $query = $connect->query($sql);
    $num = mysqli_num_rows($query);

    if($num != 0){
        echo "<script>alert('This Username already use');window.location.href='register.php';</script>";
    }else if($num == 0){
        $sql = "INSERT INTO user VALUES('','$id','$password','$name','$surname','$tel','2','3')";
        $query = $connect->query($sql);
        echo "<script>alert('Register Success');window.location.href='../index.php';</script>";
    }
?>