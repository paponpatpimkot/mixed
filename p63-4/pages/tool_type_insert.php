<?php
    include '../import.php';
    include '../connect.php';

    if(!$_SESSION['name']){
        echo "<script>alert('กรุณา Login ก่อนเข้าใช้งาน');window.location.href='../index.php';</script>";
    }
    if(isset($_POST['submit'])){
        $tooltype_id = $_POST['tooltype_id'];
        $tooltype_name = $_POST['tooltype_name'];

        $sql = "SELECT * FROM tooltype WHERE tooltype_id = '$tooltype_id'";
        $query = $connect->query($sql);
        $num = mysqli_num_rows($query);

        if($num != 0){
            echo "<script>alert('มีรหัสประเภทเครื่องมือนี้อยู่แล้ว');</script>";
        }else if($num == 0){
            $sql = "INSERT INTO tooltype VALUES('$tooltype_id','$tooltype_name')";
            $query = $connect->query($sql);
            echo "<script>alert('เพิ่มข้อมูลสำเร็จ');window.location.href='tool_type.php';</script>"; 
        }else{
            echo "<script>alert('เพิ่มข้อมูลล้มเหลว');</script>";
        }

    }else if(isset($_POST['cancel'])){
        header('location:tool_type.php');
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
<form action="tool_type_insert.php" method="post">
        <div class="container">
            <div class="card mt-5 ">
                    <div class="row mt-3 text-center">
                    <h2>เพิ่มข้อมูลประเภทเครื่องมือ</h2>
                    </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label" for="user">รหัสประเภทเครื่องมือ</label>
                        <input type="text" class="form-control" name="tooltype_id">
                    </div>
                    <div class="form-group mt-1 ">
                        <label class="form-label" for="user">ชื่อประเภทเครื่องมือ</label>
                        <input type="text" class="form-control" name="tooltype_name">
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