<?php
    if(isset($_POST['submit'])){
        $jobcard_id = $_POST['jobcard_id'];
        $jobcard_name = $_POST['jobcard_name'];

        $sql = "SELECT * FROM jobcard WHERE Jobcard_id = '$jobcard_id'";
        $query = $connect->query($sql);
        $num = mysqli_num_rows($query);

        if($num != 0){
            echo "<script>alert('มีรหัสบัตรงานนี้อยู่แล้ว');</script>";
        }else if($num == 0){
            $sql = "INSERT INTO jobcard VALUES('$jobcard_id','$jobcard_name')";
            $query = $connect->query($sql);
            echo "<script>alert('เพิ่มข้อมูลสำเร็จ');window.location.href='jobcard.php';</script>"; 
        }else{
            echo "<script>alert('เพิ่มข้อมูลล้มเหลว');</script>";
        }

    }else if(isset($_POST['cancel'])){
        header('location:jobcard.php');
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
<form action="jobcard_insert.php" method="post">
        <div class="container">
            <div class="card mt-5 ">
                    <div class="row mt-3 text-center">
                    <h2>เพิ่มบัตรงาน</h2>
                    </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label" for="user">รหัสบัตรงาน</label>
                        <input type="text" class="form-control" name="jobcard_id">
                    </div>
                    <div class="form-group mt-1 ">
                        <label class="form-label" for="user">ชื่อบัตรงาน</label>
                        <input type="text" class="form-control" name="jobcard_name">
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