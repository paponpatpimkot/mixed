<?php
    include 'navbar.php';
    
    $id = $_GET['id'];
    $sql = "SELECT * FROM purpose WHERE PurID = '$id'";
    $query = $connect->query($sql);
    $fetch = mysqli_fetch_array($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT PURPOSE</title>
</head>
<body>
<form action="updatepurpose.php" method="POST">
        <div class="container">
            <div class="card mt-5 ">
                    <div class="row mt-3 text-center">
                        <h2>EDIT PURPOSE</h2>
                    </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label" for="user">LOCATION ID</label>
                        <input type="text" class="form-control" name="PurID" readonly value="<?php echo $fetch['PurID'];?>">
                    </div>
                    <div class="form-group mt-1 ">
                        <label class="form-label" for="user">ชื่อบัตรงาน</label>
                        <input type="text" class="form-control" name="PurName" value="<?php echo $fetch['PurName'];?>">
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