<?php
session_start();

if($_POST["username"]!=""){
    require("connect.php");
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM studen WHERE IDstd = '$username' AND Birthday= '$password'";
    $result = mysqli_query($connect,$sql);
    $row = mysqli_fetch_assoc($result);

    if($row["IDstd"] == $username){
        if($row["Birthday"] == $password){

            $_SESSION['fname'] = $row["fname"];
            $_SESSION['lname'] = $row["lname"];
            $_SESSION['username'] = $row["IDstd"];
            $_SESSION['password'] = $row["Birthday"];
            $_SESSION['title'] = $row["title"];
            $_SESSION['class'] = $row["IDclass"];
            $_SESSION['classA'] = $row["IDclassA" ];
            $_SESSION['dpm'] = $row["IDdpm"];

            header("location:index.php");
        }else{
            $_SESSION['error'] = "ใส่ username หรือ password ผิดพลาดกรุณากรอกใหม่อีกครั้ง";
            header("location: login.php");
        }
    }else{
    $sqlpsn = "SELECT * FROM personnel WHERE username = '$username' AND password= '$password'";
    $resultpsn =mysqli_query($connect,$sqlpsn);
    $rowpsn = mysqli_fetch_assoc($resultpsn);
    if($rowpsn["username"] == $username){
        if($rowpsn["password"] == $password){
            $_SESSION['fname'] = $rowpsn["fnamepsn"];
            $_SESSION['lname'] = $rowpsn["lnamepsn"];
            $_SESSION['username'] = $rowpsn["username"];
            $_SESSION['password'] = $rowpsn["password"];
            $_SESSION['type'] = $rowpsn["IDtype"];
            $_SESSION['IDpsn'] = $rowpsn["IDpsn"];
            
            header("location:indexpsn.php");
        }
    }else{
        $_SESSION['error'] = "ใส่ username หรือ password ผิดพลาดกรุณากรอกใหม่อีกครั้ง";
        header("location: login.php");
    }
}
}else{
    $_SESSION['error'] = "กรุณากรอกข้อมูล";
        header("location: login.php");
}

?>
