<?php
    include '../import.php';
    include '../connect.php';

    if(!$_SESSION['name']){
        echo "<script>alert('กรุณา Login ก่อนเข้าใช้งาน');window.location.href='../index.php';</script>";
    }
    if(isset($_POST['submit'])){
        $permis_id = $_POST['permission_id'];
        $permis_name = $_POST['permission_name'];

        $sql = "SELECT * FROM permission WHERE Permission_id = '$permis_id'";
        $query = $connect->query($sql);
        $num = mysqli_num_rows($query);

        if($num != 0){
            echo "<script>alert('มีรหัสสิทธิ์นี้อยู่แล้ว');</script>";
        }else if($num == 0){
            $sql = "INSERT INTO permission VALUES('$permis_id','$permis_name')";
            $query = $connect->query($sql);
            echo "<script>alert('เพิ่มข้อมูลสำเร็จ');window.location.href='permission.php';</script>"; 
        }else{
            echo "<script>alert('เพิ่มข้อมูลล้มเหลว');</script>";
        }

    }else if(isset($_POST['cancel'])){
        header('location:permission.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="permis_insert.php" method="post">
        <div class="container">
            <div class="card mt-5 ">
                    <div class="row mt-3 text-center">
                    <h2>เพิ่มสิทธิ์</h2>
                    </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label" for="user">รหัสสิทธิ์</label>
                        <input type="text" class="form-control" name="permission_id">
                    </div>
                    <div class="form-group mt-1 ">
                        <label class="form-label" for="user">ชื่อสิทธิ์</label>
                        <input type="text" class="form-control" name="permission_name">
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-success" name="submit">ยืนยัน</button>
                        <button type="cancel" class="btn btn-outline-danger" name="cancel">ยกเลิก</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>