<?php
    include 'navbarsetting.php';

    $id = $_GET['id'];
    $sql = "SELECT * FROM brands WHERE Brand_id = '$id'";
    $query = $connect->query($sql);
    $fetch = mysqli_fetch_array($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT BRAND</title>
</head>
<body>
<form action="update_brands.php" method="POST">
        <div class="container">
            <div class="card mt-5 ">
                    <div class="row mt-3 mx-auto">
                        <h2>EDIT BRAND</h2>
                    </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label" for="user">Brand ID</label>
                        <input type="text" class="form-control" name="Brand_id"  readonly value="<?php echo $fetch['Brand_id'];?>">
                    </div>
                    <div class="form-group mt-1 ">
                        <label class="form-label" for="user">Brand Name</label>
                        <input type="text" class="form-control" name="Brand_name" value="<?php echo $fetch['Brand_name'];?>">
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-success" name="submit">Apply</button>
                        <button type="cancel" class="btn btn-outline-danger" name="cancel">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>