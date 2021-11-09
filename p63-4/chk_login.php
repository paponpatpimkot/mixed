<?php
    include 'connect.php';
        $username=$_POST['username'];
        $password=$_POST['password'];
        if(($username=='')||($password=='')){
            echo "<scrip>alert('กรุณากรอก  username หรือ password')</script>";
        }
            $sql="SELECT * FROM user WHERE Username='$username' AND Password='$password'";
            $result=$connect->query($sql);
            $num_row=mysqli_num_rows($result);     
            $fetch = mysqli_fetch_array($result);   
        
        if($num_row == 0){            
            echo "<script>alert('username หรือ password ไม่ถูกต้อง');window.history.back();</script>";
        }else if($num_row != 0){
            $permis = $fetch['Permission_id'];
            if($permis == '1'){
                $_SESSION['Username'] = $username;
                $_SESSION['name'] = $fetch['Name']."  ".$fetch['Surname'];
                header('location:pages/index.php');
            }else if($permis == '2'){
                $_SESSION['Username'] = $username;
                $_SESSION['name'] = $fetch['Name']."  ".$fetch['Surname'];
                header('location:pages/index.php');
            }else if($permis == '3'){
                echo "<script>alert('ไม่มีสิทธิ์ในการเข้าใช้งานระบบตอนนี้');window.location.href='index.php';</script>";
            }
        }
?>
