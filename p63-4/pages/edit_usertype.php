<?php
    include 'navbarsetting.php';

    $id = $_GET['id'];
    $sql = "SELECT * FROM usertype WHERE UserType_id = '$id'";
    $query = $connect->query($sql);
    $fetch = mysqli_fetch_array($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="update_usertype.php" method="POST">
        <div class="container">
            <div class="card mt-5 ">
                    <div class="row mt-3 mx-auto">
                        <h2>EDIT USERTYPE</h2>
                    </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label" for="user">USERTYPE ID</label>
                        <input type="text" class="form-control" name="UserType_id"  readonly value="<?php echo $fetch['UserType_id'];?>">
                    </div>
                    <div class="form-group mt-1 ">
                        <label class="form-label" for="user">USERTYPE NAME</label>
                        <input type="text" class="form-control" name="UserType_name" value="<?php echo $fetch['UserType_name'];?>">
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-success" name="submit">SUBMIT</button>
                        <button type="cancel" class="btn btn-outline-danger" name="cancel">CANCEL</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>