<?php
   
    if(isset($_POST['submit'])){
        $ustype_id = $_POST['usertype_id'];
        $ustype_name = $_POST['usertype_name'];

        $sql = "SELECT * FROM usertype WHERE UserType_id = '$ustype_id'";
        $query = $connect->query($sql);
        $num = mysqli_num_rows($query);

        if($num != 0){
            echo "<script>alert('มีรหัสประเภทผู้ใช้นี้อยู่แล้ว');</script>";
        }else if($num == 0){
            $sql = "INSERT INTO usertype VALUES('$ustype_id','$ustype_name')";
            $query = $connect->query($sql);
            echo "<script>alert('เพิ่มข้อมูลสำเร็จ');window.location.href='user_type.php';</script>"; 
        }else{
            echo "<script>alert('เพิ่มข้อมูลล้มเหลว');</script>";
        }

    }else if(isset($_POST['cancel'])){
        header('location:user_type.php');
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
<form action="ustype_insert.php" method="post">
        <div class="container">
            <div class="card mt-5 ">
                    <div class="row mt-3 text-center">
                    <h2>เพิ่มประเภทผู้ใช้</h2>
                    </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label" for="user">รหัสประเภทผู้ใช้</label>
                        <input type="text" class="form-control" name="usertype_id">
                    </div>
                    <div class="form-group mt-1 ">
                        <label class="form-label" for="user">ชื่อประเภทผู้ใช้</label>
                        <input type="text" class="form-control" name="usertype_name">
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