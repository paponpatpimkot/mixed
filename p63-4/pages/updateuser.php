<?php
    include '../connect.php';
    if(isset($_POST['submit'])){
        $id = $_POST['Username'];
        $name = $_POST['Name'];
        $surname = $_POST['Surname'];
        $telephone = $_POST['Telephone'];
        $usertype = $_POST['usertype'];
        $permission = $_POST['Permission'];
        $pr = intval($permission);
       
       $sql = "UPDATE user SET Name='$name',Surname ='$surname',Telephone='$telephone',UserType_id='$usertype',Permission_id='$permission'
        WHERE Username = '$id' ";
        $query = $connect->query($sql);
        if($pr == 2){
                $sql4 = "SELECT * FROM staff";
                $query4 = $connect->query($sql4);
                $num4 = mysqli_num_rows($query4);
                $stf = $num4+1;

                $sql5 = "SELECT * FROM user WHERE Username = '$id'";
                $query5 = $connect->query($sql5);
                $fetch = mysqli_fetch_array($query5);
                $usid = $fetch['User_id'];
                $sql = "INSERT INTO staff VALUES('$stf','$usid')";
                $query = $connect->query($sql);
        }
        echo "<script>alert('Update Success');window.location.href='index.php?page=user';</script>"; 
    }else if(isset($_POST['cancel'])){
        header('location:index.php?page=user');
    }
?>