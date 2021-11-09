<?php
    include '../connect.php';
    $user = $_SESSION['Username'];
    $old_pass = $_POST['old_pass'];
    $new_pass = $_POST['new_pass'];
    $new_pass2 = $_POST['new_pass2'];
    
    if(($old_pass == '')||($new_pass == '')||($new_pass2 == '')){
        echo "<script>alert('Please enter info');window.location.href='index.php?page=edit_password';</script>";
    }else{
        $sql = "SELECT * FROM user WHERE Username = '$user' AND Password = '$old_pass'";
        $query = $connect->query($sql);
        $num = mysqli_num_rows($query);
        
        if($num == 0){
            echo "<script>alert('Please enter the old password correctly.');window.location.href='index.php?page=edit_password';</script>";
        }else if($num != 0){
            if($new_pass != $new_pass2){
                echo "<script>alert('Please enter the confirm password exactly.');window.location.href='index.php?page=edit_password';</script>";
            }else{
                $sql = "UPDATE user SET Password = '$new_pass' WHERE Username = '$user'";
                $query = $connect->query($sql);
                echo "<script>alert('Update Success');window.location.href='index.php?page=dashboard';</script>";
            }
        }
    }
?>