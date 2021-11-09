<?php
    include 'navbar.php';
    
    if(!$_SESSION['name']){
        echo "<script>alert('กรุณา Login ก่อนเข้าใช้งาน');window.location.href='../index.php';</script>";
    }
    if(isset($_POST['submit'])){
        $type_id = $_POST['type_id'];
        $type_name = $_POST['type_name'];
        $tooltype_id = $_POST['tooltype_id'];

        $sql = "SELECT * FROM type WHERE Type_id = '$type_id'";
        $query = $connect->query($sql);
        $num = mysqli_num_rows($query);

        if($num != 0){
            echo "<script>alert('มีรหัสประเภทเครื่องมือนี้แล้ว');</script>";
        }else if($num == 0){
            $sql = "INSERT INTO type VALUES('$type_id','$type_name','$tooltype_id')";
            $query = $connect->query($sql);
            header('location:type.php');    
        }
    }else if(isset($_POST['cancel'])){
        header('location:type.php');
    }
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
<form action="type_insert.php" method="post">
        <div class="container">
            <div class="card mt-5 ">
                    <div class="row mt-3 text-center">
                    <h2>เพิ่มข้อมูลประเภทเครื่องมือ</h2>
                    </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label" for="user">รหัสประเภทเครื่องมือ</label>
                        <input type="text" class="form-control" name="type_id">
                    </div>
                    <div class="form-group mt-1 ">
                        <label class="form-label" for="user">ชื่อประเภทเครื่องมือ</label>
                        <input type="text" class="form-control" name="type_name">
                    </div>
                    <div class="form-group mt-1 ">
                        <label class="form-label" for="user">ชื่อประเภทเครื่องมือ</label>
                        <select class="form-select" aria-label="tooltype_id" name="tooltype_id" >
                            <?php
                            $sql = "SELECT * FROM tooltype";
                            $query = $connect->query($sql);
                            while($row=$query->fetch_array()){
                                ?><option value="<?php echo $row['ToolType_id'];?>"><?php echo $row['ToolType_name']; ?></option>
                        <?php        
                            }
                        ?>
                        </select>
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