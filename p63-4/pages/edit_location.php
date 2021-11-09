<?php
    include 'navbarsetting.php';
    
    $id = $_GET['id'];
    $sql = "SELECT * FROM location WHERE Location_ID = '$id'";
    $query = $connect->query($sql);
    $fetch = mysqli_fetch_array($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITLOCATION</title>
</head>
<body>
<form action="updatelocation.php" method="POST">
        <div class="container">
            <div class="card mt-5 ">
                    <div class="row mt-3 mx-auto">
                        <h2>EDIT LOCATION</h2>
                    </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label" for="user">LOCATION ID</label>
                        <input type="text" class="form-control" name="Location_ID" value="<?php echo $fetch['Location_ID'];?>">
                    </div>
                    <div class="form-group mt-1 ">
                        <label class="form-label" for="user">Location name</label>
                        <input type="text" class="form-control" name="Location_name" value="<?php echo $fetch['Location_name'];?>">
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-success" name="submit">Apply</button>
                        <a href="index.php?page=location" class="btn btn-outline-danger">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>