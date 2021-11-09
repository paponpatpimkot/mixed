<?php
    include 'navbarsetting.php';

    $id = $_GET['id'];
    $sql = "SELECT * FROM devicecatagory WHERE Devcat_ID = '$id'";
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
<form action="updatedevice_type.php" method="POST">
        <div class="container">
            <div class="card mt-5 ">
                    <div class="row mt-3 mx-auto">
                        <h2>EDIT DEVICE TYPE</h2>
                    </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label" for="user">DEVICE TYPE ID</label>
                        <input type="text" class="form-control" name="Devcat_ID"  readonly value="<?php echo $fetch['Devcat_ID'];?>">
                    </div>
                    <div class="form-group mt-1 ">
                        <label class="form-label" for="user">DEVICE TYPE NAME</label>
                        <input type="text" class="form-control" name="Devcat_NAME" value="<?php echo $fetch['Devcat_NAME'];?>">
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