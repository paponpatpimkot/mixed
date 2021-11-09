<?php
    include 'navbar.php';
    
    $id = $_GET['id'];
    $sql = "SELECT * FROM permission WHERE Permission_id = '$id'";
    $query = $connect->query($sql);
    $fetch = mysqli_fetch_array($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITPERMISSION</title>
</head>
<body>
<form action="updatepermis.php" method="POST">
        <div class="container">
            <div class="card mt-5 ">
                    <div class="row mt-3 text-center">
                        <h2>แก้ไขสิทธิ์</h2>
                    </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label" for="user">รหัสสิทธิ์</label>
                        <input type="text" class="form-control" name="Permission_id"  readonly value="<?php echo $fetch['Permission_id'];?>">
                    </div>
                    <div class="form-group mt-1 ">
                        <label class="form-label" for="user">ชื่อสิทธิ์</label>
                        <input type="text" class="form-control" name="Permission_name" value="<?php echo $fetch['Permission_name'];?>">
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